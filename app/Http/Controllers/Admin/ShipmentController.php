<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Package;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\ColisConfirmation;
use App\Notifications\RecipientNotification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ShipmentController extends Controller
{
    /**
     * Liste des expéditions avec recherche et filtres
     */
    public function index(Request $request)
    {
        $query = Package::with(['user', 'recipient'])
            ->latest();

        // Filtrage par statut
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Recherche globale
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('tracking_number', 'LIKE', "%{$search}%")
                    ->orWhereHas('user', function($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%")
                            ->orWhere('email', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('recipient', function($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%")
                            ->orWhere('phone', 'LIKE', "%{$search}%");
                    });
            });
        }

        $packages = $query->paginate(15)
            ->withQueryString();

        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Affiche les détails d'une expédition
     */
    public function show(Package $shipment)
    {
        $shipment->load(['user', 'recipient', 'trackings']);
        return view('admin.shipments.show', compact('shipment'));
    }

    /**
     * Affiche le formulaire de création pour nouveau client
     */
    public function create()
    {
        return view('admin.shipments.create');
    }

    /**
     * Affiche le formulaire de création pour client existant
     */
    public function createForExisting()
    {
        // Récupérer les utilisateurs avec pagination
        $users = User::orderBy('name')
                    ->select(['id', 'name', 'email', 'phone'])
                    ->paginate(10); // 10 utilisateurs par page

        return view('admin.shipments.create-existing', compact('users'));
    }

    /**
     * Recherche des utilisateurs pour l'autocomplétion
     */
    public function searchUsers(Request $request)
    {
        $term = trim($request->input('term'));

        if (empty($term)) {
            return response()->json([
                'results' => []
            ]);
        }

        try {
            $users = User::where('name', 'LIKE', $term . '%')
                ->orWhere('email', 'LIKE', '%' . $term . '%')
                ->orWhere('phone', 'LIKE', $term . '%')
                ->orWhere(function($query) use ($term) {
                    $terms = explode(' ', $term);
                    foreach($terms as $t) {
                        $query->orWhere('name', 'LIKE', '%' . $t . '%');
                    }
                })
                ->select(['id', 'name', 'email', 'phone'])
                ->orderBy('name')
                ->limit(10)
                ->get()
                ->map(function($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'phone' => $user->phone,
                    ];
                });

            return response()->json([
                'results' => $users
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur recherche utilisateurs: ' . $e->getMessage());
            return response()->json([
                'error' => 'Erreur lors de la recherche'
            ], 500);
        }
    }

    /**
     * Enregistre un nouveau client et son colis
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'notification_email' => 'nullable|email', // ✅ Email de notification optionnel
            'weight' => 'required|numeric|min:0.1',
            'price' => 'required|numeric|min:0',
            'country' => 'required|string|in:France,Cameroun,Belgique',
            'city' => 'required|string|max:255',
            'destination_address' => 'required|string',
            'description_colis' => 'required|string',
            'recipient_name' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:20',
            'recipient_email' => 'nullable|email', // Email destinataire optionnel
            'images' => 'nullable|array|max:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB max par image
            'videos' => 'nullable|array|max:5',
            'videos.*' => 'mimes:mp4,mov,avi,wmv|max:10240', // 10MB max par vidéo
        ], [
            'images.*.image' => 'Chaque fichier image doit être un fichier image valide.',
            'images.*.mimes' => 'Les images doivent être au format JPEG, PNG, JPG ou GIF.',
            'images.*.max' => 'Chaque image ne doit pas dépasser 10MB.',
            'videos.*.mimes' => 'Les vidéos doivent être au format MP4, MOV, AVI ou WMV.',
            'videos.*.max' => 'Chaque vidéo ne doit pas dépasser 10MB.',
        ]);

        // Validation : au moins une image ou une vidéo doit être fournie
        if (empty($request->file('images')) && empty($request->file('videos'))) {
            return back()
                ->withInput()
                ->withErrors(['media' => 'Veuillez ajouter au moins une image ou une vidéo du colis.']);
        }

        try {
            DB::beginTransaction();

            // Création du nouvel utilisateur
            $defaultPassword = $this->generateSecurePassword();
            $dsfEmail = $this->generateDsfEmail($validated['sender_name']);

            $user = User::create([
                'name' => $validated['sender_name'],
                'email' => $dsfEmail,
                'phone' => $validated['phone'],
                'password' => Hash::make($defaultPassword),
            ]);

            // Traitement des médias
            $mediaData = $this->handleMediaUpload($request);

            // Mise à jour des données validées
            $validated['destination_address'] = sprintf(
                "%s\n%s, %s",
                $validated['destination_address'],
                $validated['city'],
                $validated['country']
            );

            // Ajouter les médias aux données
            $validated['images'] = $mediaData['images'];
            $validated['videos'] = $mediaData['videos'];

            // Création du colis
            $package = $this->createPackage($user->id, $validated);

            $shipmentData = [
                'user' => [
                    'name' => $user->name,
                    'email' => $dsfEmail,
                    'password' => $defaultPassword,
                    'phone' => $user->phone,
                    'notification_email' => $validated['notification_email'] ?? null // ✅ Email de notification
                ],
                'recipient' => [
                    'name' => $package->recipient->name,
                    'phone' => $package->recipient->phone,
                    'email' => $validated['recipient_email'] ?? null
                ],
                'package' => [
                    'tracking' => $package->tracking_number,
                    'price' => $package->price,
                    'destination' => $package->destination_address,
                    'weight' => $package->weight,
                    'description' => $package->description_colis,
                    'media_count' => $package->getMediaCount()
                ]
            ];

            session()->flash('shipment_created', $shipmentData);

            DB::commit();

            // ENVOI AUTOMATIQUE DES NOTIFICATIONS
            $this->sendAllNotifications($shipmentData, $package, $validated, true, $defaultPassword);

            return redirect()->route('admin.shipments.success');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur création colis: ' . $e->getMessage());

            // Nettoyer les fichiers uploadés en cas d'erreur
            $this->cleanupUploadedFiles($request);

            return back()
                ->withInput()
                ->with('error', 'Erreur lors de la création : ' . $e->getMessage());
        }
    }

    /**
     * Enregistre un colis pour un client existant
     */
    public function storeForExisting(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'weight' => 'required|numeric|min:0.1',
            'price' => 'required|numeric|min:0',
            'country' => 'required|string|in:France,Cameroun,Belgique',
            'city' => 'required|string|max:255',
            'destination_address' => 'required|string',
            'description_colis' => 'required|string',
            'recipient_name' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:20',
            'recipient_email' => 'nullable|email', // Email destinataire optionnel
            'images' => 'nullable|array|max:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB max par image
            'videos' => 'nullable|array|max:5',
            'videos.*' => 'mimes:mp4,mov,avi,wmv|max:10240', // 10MB max par vidéo
        ], [
            'images.*.image' => 'Chaque fichier image doit être un fichier image valide.',
            'images.*.mimes' => 'Les images doivent être au format JPEG, PNG, JPG ou GIF.',
            'images.*.max' => 'Chaque image ne doit pas dépasser 10MB.',
            'videos.*.mimes' => 'Les vidéos doivent être au format MP4, MOV, AVI ou WMV.',
            'videos.*.max' => 'Chaque vidéo ne doit pas dépasser 10MB.',
        ]);

        // Validation : au moins une image ou une vidéo doit être fournie
        if (empty($request->file('images')) && empty($request->file('videos'))) {
            return back()
                ->withInput()
                ->withErrors(['media' => 'Veuillez ajouter au moins une image ou une vidéo du colis.']);
        }

        try {
            DB::beginTransaction();

            // Récupérer l'utilisateur sélectionné
            $user = User::findOrFail($validated['user_id']);

            // Traitement des médias
            $mediaData = $this->handleMediaUpload($request);

            // Mise à jour des données validées
            $validated['destination_address'] = sprintf(
                "%s\n%s, %s",
                $validated['destination_address'],
                $validated['city'],
                $validated['country']
            );

            // Ajouter les médias aux données
            $validated['images'] = $mediaData['images'];
            $validated['videos'] = $mediaData['videos'];

            // Création du colis
            $package = $this->createPackage($user->id, $validated);

            $shipmentData = [
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone
                ],
                'recipient' => [
                    'name' => $package->recipient->name,
                    'phone' => $package->recipient->phone,
                    'email' => $validated['recipient_email'] ?? null
                ],
                'package' => [
                    'tracking' => $package->tracking_number,
                    'price' => $package->price,
                    'destination' => $package->destination_address,
                    'weight' => $package->weight,
                    'description' => $package->description_colis,
                    'media_count' => $package->getMediaCount()
                ]
            ];

            session()->flash('shipment_created', $shipmentData);

            DB::commit();

            // ENVOI AUTOMATIQUE DES NOTIFICATIONS
            $this->sendAllNotifications($shipmentData, $package, $validated, false);

            return redirect()->route('admin.shipments.success');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur création colis existant: ' . $e->getMessage());

            // Nettoyer les fichiers uploadés en cas d'erreur
            $this->cleanupUploadedFiles($request);

            return back()
                ->withInput()
                ->with('error', 'Erreur lors de la création : ' . $e->getMessage());
        }
    }

    /**
     * ====================================================================
     * MÉTHODES DE NOTIFICATION AUTOMATIQUE - ✅ MODIFIÉES
     * ====================================================================
     */

    /**
     * ✅ MÉTHODE PRINCIPALE MODIFIÉE - Envoie toutes les notifications automatiquement
     */
    private function sendAllNotifications($shipmentData, $package, $validated, $isNewUser = false, $password = null)
    {
        try {
            Log::info('🚀 Début envoi notifications automatiques', [
                'tracking' => $package->tracking_number,
                'is_new_user' => $isNewUser,
                'has_password' => !empty($password)
            ]);

            // Vérifier si les notifications sont activées
            if (!env('NOTIFICATIONS_ENABLED', true)) {
                Log::info('❌ Notifications désactivées');
                return;
            }

            // 1. ENVOI EMAIL À L'EXPÉDITEUR
            if (env('EMAIL_ENABLED', true)) {
                $this->sendEmailToSender($shipmentData, $isNewUser);

                // ✅ NOUVEAU : Email spécial pour les identifiants si nouveau utilisateur
                if ($isNewUser && $password && !empty($shipmentData['user']['email'])) {
                    $this->sendCredentialsEmail($shipmentData['user']['email'], $shipmentData, $password);
                }

                // ✅ NOUVEAU : Email de notification si fourni
                if (!empty($shipmentData['user']['notification_email'])) {
                    $this->sendNotificationEmail($shipmentData['user']['notification_email'], $shipmentData, $password);
                }
            }

            // 2. ENVOI EMAIL AU DESTINATAIRE (si email fourni)
            if (env('EMAIL_ENABLED', true) && !empty($shipmentData['recipient']['email'])) {
                $this->sendEmailToRecipient($shipmentData);
            }

            // 3. ✅ ENVOI WHATSAPP À L'EXPÉDITEUR AVEC IDENTIFIANTS
            if (env('WHATSAPP_ENABLED', true)) {
                $this->sendWhatsAppToSender($shipmentData, $package, $validated, $isNewUser, $password);
            }

            // 4. ENVOI WHATSAPP AU DESTINATAIRE
            if (env('WHATSAPP_ENABLED', true)) {
                $this->sendWhatsAppToRecipient($shipmentData, $package, $validated);
            }

            // 5. GÉNÉRATION DU PDF POUR TÉLÉCHARGEMENT
            $this->preparePdfForDownload($shipmentData, $isNewUser);

            Log::info('✅ Toutes les notifications ont été envoyées avec succès');

        } catch (\Exception $e) {
            Log::error('❌ Erreur lors de l\'envoi des notifications: ' . $e->getMessage());
            // On ne fait pas échouer la création du colis à cause des notifications
        }
    }

    /**
     * Envoie l'email de confirmation à l'expéditeur
     */
    private function sendEmailToSender($shipmentData, $isNewUser)
    {
        try {
            $user = User::where('email', $shipmentData['user']['email'])->first();
            if ($user) {
                $user->notify(new ColisConfirmation($shipmentData));
                Log::info('📧 Email expéditeur envoyé', ['email' => $user->email]);
            }
        } catch (\Exception $e) {
            Log::error('❌ Erreur envoi email expéditeur: ' . $e->getMessage());
        }
    }

    /**
     * Envoie l'email de notification au destinataire
     */
    private function sendEmailToRecipient($shipmentData)
    {
        try {
            $recipientEmail = $shipmentData['recipient']['email'];

            // Envoie l'email au destinataire
            Mail::send(
                'emails.recipient-notification',
                ['shipment' => $shipmentData],
                function ($message) use ($recipientEmail, $shipmentData) {
                    $message->to($recipientEmail)
                           ->subject('Diaspora Shopping & Fly - Un colis vous a été envoyé')
                           ->from(config('mail.from.address'), 'Diaspora Shopping & Fly');
                }
            );

            Log::info('📧 Email destinataire envoyé', ['email' => $recipientEmail]);
        } catch (\Exception $e) {
            Log::error('❌ Erreur envoi email destinataire: ' . $e->getMessage());
        }
    }

    /**
     * ✅ NOUVELLE MÉTHODE : Envoie l'email avec les identifiants de connexion
     */
    private function sendCredentialsEmail($userEmail, $shipmentData, $password)
    {
        try {
            Mail::send(
                'emails.credentials-notification',
                [
                    'user' => $shipmentData['user'],
                    'password' => $password,
                    'package' => $shipmentData['package']
                ],
                function ($message) use ($userEmail, $shipmentData) {
                    $message->to($userEmail)
                           ->subject('Diaspora Shopping & Fly - Vos identifiants de connexion')
                           ->from(config('mail.from.address'), 'Diaspora Shopping & Fly');
                }
            );

            Log::info('📧 Email identifiants envoyé', ['email' => $userEmail]);

        } catch (\Exception $e) {
            Log::error('❌ Erreur envoi email identifiants: ' . $e->getMessage());
        }
    }

    /**
     * ✅ MÉTHODE CORRIGÉE : Envoie l'email de notification à l'adresse fournie
     */
    private function sendNotificationEmail($notificationEmail, $shipmentData, $password = null)
    {
        try {
            // ✅ Utiliser le bon template selon si c'est un nouveau utilisateur ou pas
            $view = $password ? 'emails.notification-with-credentials' : 'emails.notification-simple';

            Mail::send(
                $view,
                [
                    'shipment' => $shipmentData,
                    'user' => $shipmentData['user'],
                    'password' => $password,
                    'package' => $shipmentData['package']
                ],
                function ($message) use ($notificationEmail, $shipmentData, $password) {
                    $subject = $password ?
                        'Diaspora Shopping & Fly - Copie avec identifiants de connexion' :
                        'Diaspora Shopping & Fly - Copie de confirmation de colis';

                    $message->to($notificationEmail)
                        ->subject($subject)
                        ->from(config('mail.from.address'), 'Diaspora Shopping & Fly');
                }
            );

            Log::info('📧 Email notification envoyé', [
                'email' => $notificationEmail,
                'template' => $view
            ]);

        } catch (\Exception $e) {
            Log::error('❌ Erreur envoi email notification: ' . $e->getMessage());
        }
    }

    /**
     * ✅ MÉTHODE MODIFIÉE : Envoie WhatsApp à l'expéditeur
     */
    private function sendWhatsAppToSender($shipmentData, $package, $validated, $isNewUser, $password = null)
    {
        try {
            $senderPhone = $this->formatPhoneForWhatsApp($shipmentData['user']['phone'], $validated['country']);

            // ✅ Message amélioré avec identifiants
            $message = $this->createWhatsAppMessageForSender($shipmentData, $isNewUser, $password);

            $this->sendWhatsAppMessage($senderPhone, $message, 'expéditeur');

            // ✅ OPTIONNEL : SMS de sauvegarde si c'est un nouveau client
            if ($isNewUser && $password) {
                $this->sendBackupSMS($senderPhone, $shipmentData, $password);
            }

        } catch (\Exception $e) {
            Log::error('❌ Erreur envoi WhatsApp expéditeur: ' . $e->getMessage());
        }
    }

    /**
     * Envoie WhatsApp au destinataire
     */
    private function sendWhatsAppToRecipient($shipmentData, $package, $validated)
    {
        try {
            $recipientPhone = $this->formatPhoneForWhatsApp($shipmentData['recipient']['phone'], $validated['country']);
            $message = $this->createWhatsAppMessageForRecipient($shipmentData);

            $this->sendWhatsAppMessage($recipientPhone, $message, 'destinataire');

        } catch (\Exception $e) {
            Log::error('❌ Erreur envoi WhatsApp destinataire: ' . $e->getMessage());
        }
    }

    /**
     * Envoie effectivement le message WhatsApp via API
     */
    private function sendWhatsAppMessage($phone, $message, $recipient_type)
    {
        try {
            // Configuration WhatsApp API
            $whatsappApiUrl = env('WHATSAPP_API_URL');
            $whatsappToken = env('WHATSAPP_API_TOKEN');

            if (!$whatsappApiUrl || !$whatsappToken) {
                Log::warning('⚠️ Configuration WhatsApp manquante - envoi simulé', [
                    'phone' => $phone,
                    'type' => $recipient_type
                ]);

                // Simulation d'envoi réussi pour les tests
                session()->flash("whatsapp_link_$recipient_type",
                    "https://wa.me/$phone?text=" . rawurlencode($message)
                );

                return;
            }

            // Exemple d'envoi via WhatsApp Business API (Meta)
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $whatsappToken,
                'Content-Type' => 'application/json'
            ])->post($whatsappApiUrl, [
                'messaging_product' => 'whatsapp',
                'to' => $phone,
                'type' => 'text',
                'text' => [
                    'body' => $message
                ]
            ]);

            if ($response->successful()) {
                Log::info("✅ WhatsApp envoyé avec succès au $recipient_type", [
                    'phone' => $phone,
                    'response' => $response->json()
                ]);
            } else {
                Log::error("❌ Erreur envoi WhatsApp au $recipient_type", [
                    'phone' => $phone,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);

                // En cas d'erreur API, créer un lien WhatsApp manuel
                session()->flash("whatsapp_link_$recipient_type",
                    "https://wa.me/$phone?text=" . rawurlencode($message)
                );
            }

        } catch (\Exception $e) {
            Log::error("❌ Exception envoi WhatsApp au $recipient_type: " . $e->getMessage());

            // En cas d'exception, créer un lien WhatsApp manuel
            session()->flash("whatsapp_link_$recipient_type",
                "https://wa.me/$phone?text=" . rawurlencode($message)
            );
        }
    }

    /**
     * ✅ MÉTHODE MODIFIÉE : Crée le message WhatsApp pour l'expéditeur
     */
    private function createWhatsAppMessageForSender($shipmentData, $isNewUser = false, $password = null)
    {
        $message = "🚚 *Diaspora Shopping & Fly - Confirmation d'expédition*\n\n";
        $message .= "Bonjour *{$shipmentData['user']['name']}*,\n\n";
        $message .= "Votre colis a été enregistré avec succès ✅\n\n";

        // ✅ SECTION IDENTIFIANTS DE CONNEXION (AMÉLIORÉE)
        if ($isNewUser && $password) {
            $message .= "🔐 *VOS IDENTIFIANTS DE CONNEXION Diaspora Shopping & Fly :*\n";
            $message .= "• Email : *{$shipmentData['user']['email']}*\n";
            $message .= "• Mot de passe : *{$password}*\n";
            $message .= "• Lien de connexion : " . url('/login') . "\n\n";
            $message .= "⚠️ *IMPORTANT : Gardez ces informations précieusement !*\n";
            $message .= "Vous pourrez suivre tous vos colis depuis votre espace client.\n\n";
            $message .= "💡 *Avec votre espace client, vous pouvez :*\n";
            $message .= "• ✅ Suivre tous vos colis en temps réel\n";
            $message .= "• ✅ Consulter l'historique de vos expéditions\n";
            $message .= "• ✅ Recevoir des notifications automatiques\n";
            $message .= "• ✅ Créer de nouvelles expéditions facilement\n\n";
        }

        $message .= "📦 *DÉTAILS DU COLIS :*\n";
        $message .= "• Numéro de suivi : *{$shipmentData['package']['tracking']}*\n";
        $message .= "• Prix : *" . number_format($shipmentData['package']['price'], 2) . " EUR*\n";
        $message .= "• Poids : *{$shipmentData['package']['weight']} kg*\n";
        $message .= "• Destination : " . str_replace("\n", " ", $shipmentData['package']['destination']) . "\n\n";

        // Informations sur les médias
        $mediaCount = $shipmentData['package']['media_count'];
        if ($mediaCount['total'] > 0) {
            $message .= "📸 *MÉDIAS DU COLIS :* ";
            if ($mediaCount['images'] > 0) {
                $message .= "{$mediaCount['images']} image(s)";
            }
            if ($mediaCount['videos'] > 0) {
                if ($mediaCount['images'] > 0) $message .= " et ";
                $message .= "{$mediaCount['videos']} vidéo(s)";
            }
            $message .= "\n\n";
        }

        $message .= "🔍 *SUIVI DE VOTRE COLIS :*\n";
        $message .= "Lien de suivi : " . url('/tracking/' . $shipmentData['package']['tracking']) . "\n\n";

        $message .= "Merci de faire confiance à Diaspora Shopping & Fly ! 🙏\n";
        $message .= "_Votre colis sera traité dans les plus brefs délais._\n\n";

        // ✅ Support contact
        $message .= "❓ *Besoin d'aide ?*\n";
        $message .= "📞 +33 1 23 45 67 89\n";
        $message .= "💬 WhatsApp Support : wa.me/33123456789";

        return $message;
    }

    /**
     * Crée le message WhatsApp pour le destinataire
     */
    private function createWhatsAppMessageForRecipient($shipmentData)
    {
        $message = "📦 *Diaspora Shopping & Fly - Colis en route pour vous!*\n\n";
        $message .= "Bonjour *{$shipmentData['recipient']['name']}*,\n\n";
        $message .= "Un colis vous a été envoyé par *{$shipmentData['user']['name']}* 🎁\n\n";
        $message .= "📋 *Informations du colis:*\n";
        $message .= "• Numéro de suivi: *{$shipmentData['package']['tracking']}*\n";
        $message .= "• Poids: *{$shipmentData['package']['weight']} kg*\n";
        $message .= "• Destination: " . str_replace("\n", " ", $shipmentData['package']['destination']) . "\n\n";

        $message .= "🔍 *Suivez votre colis en temps réel:*\n";
        $message .= url('/tracking/' . $shipmentData['package']['tracking']) . "\n\n";

        $message .= "📱 Vous recevrez des notifications à chaque étape de la livraison.\n\n";
        $message .= "*Diaspora Shopping & Fly* - Votre satisfaction, notre priorité! ✨\n";
        $message .= "_Nous vous tiendrons informé(e) de l'avancement de votre colis._";

        return $message;
    }

    /**
     * ✅ NOUVELLE MÉTHODE : SMS de sauvegarde en cas d'échec WhatsApp
     */
    private function sendBackupSMS($phone, $shipmentData, $password = null)
    {
        try {
            // Cette méthode peut être implémentée plus tard avec un service SMS
            // comme Twilio, Amazon SNS, etc.

            $smsMessage = "Diaspora Shopping & Fly - Colis {$shipmentData['package']['tracking']} créé. ";

            if ($password) {
                $smsMessage .= "Identifiants: {$shipmentData['user']['email']} / {$password}. ";
            }

            $smsMessage .= "Suivi: " . url('/tracking/' . $shipmentData['package']['tracking']);

            // TODO: Implémenter l'envoi SMS réel
            Log::info('📱 SMS de sauvegarde préparé pour: ' . $phone, ['message' => $smsMessage]);

            // ✅ Stocker le lien SMS en session pour affichage optionnel
            session()->flash('sms_backup_message', $smsMessage);

        } catch (\Exception $e) {
            Log::error('❌ Erreur préparation SMS de sauvegarde: ' . $e->getMessage());
        }
    }

    /**
     * Prépare le PDF pour téléchargement
     */
    private function preparePdfForDownload($shipmentData, $isNewUser)
    {
        try {
            $view = $isNewUser ? 'admin.shipments.pdf.pdf-new-user' : 'admin.shipments.pdf.pdf-existing-user';
            $pdfFile = $this->generatePdfForWhatsApp($shipmentData, $view);

            session()->flash('pdf_path', $pdfFile);
            session()->flash('pdf_filename', basename($pdfFile));

        } catch (\Exception $e) {
            Log::error('❌ Erreur préparation PDF: ' . $e->getMessage());
        }
    }

    /**
     * ====================================================================
     * MÉTHODES DE GESTION DES MÉDIAS
     * ====================================================================
     */

    /**
     * Gère l'upload des images et vidéos
     */
    private function handleMediaUpload(Request $request)
    {
        $uploadedImages = [];
        $uploadedVideos = [];

        try {
            // Traitement des images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    if ($image->isValid()) {
                        // Générer un nom unique
                        $filename = $this->generateMediaFilename($image, 'image');

                        // Stocker dans le dossier packages/images
                        $path = $image->storeAs('packages/images', $filename, 'public');

                        if ($path) {
                            $uploadedImages[] = $path;
                            Log::info("📷 Image uploadée: " . $path);
                        }
                    }
                }
            }

            // Traitement des vidéos
            if ($request->hasFile('videos')) {
                foreach ($request->file('videos') as $video) {
                    if ($video->isValid()) {
                        // Générer un nom unique
                        $filename = $this->generateMediaFilename($video, 'video');

                        // Stocker dans le dossier packages/videos
                        $path = $video->storeAs('packages/videos', $filename, 'public');

                        if ($path) {
                            $uploadedVideos[] = $path;
                            Log::info("📹 Vidéo uploadée: " . $path);
                        }
                    }
                }
            }

            return [
                'images' => $uploadedImages,
                'videos' => $uploadedVideos
            ];

        } catch (\Exception $e) {
            Log::error('❌ Erreur lors de l\'upload des médias: ' . $e->getMessage());

            // Nettoyer les fichiers partiellement uploadés
            foreach ($uploadedImages as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            foreach ($uploadedVideos as $videoPath) {
                Storage::disk('public')->delete($videoPath);
            }

            throw $e;
        }
    }

    /**
     * Génère un nom de fichier unique pour les médias
     */
    private function generateMediaFilename($file, $type)
    {
        $timestamp = Carbon::now()->format('YmdHis');
        $random = Str::random(8);
        $extension = $file->getClientOriginalExtension();

        return "{$type}_{$timestamp}_{$random}.{$extension}";
    }

    /**
     * Nettoie les fichiers uploadés en cas d'erreur
     */
    private function cleanupUploadedFiles(Request $request)
    {
        try {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    if ($image->isValid()) {
                        $tempPath = $image->getPathname();
                        if (file_exists($tempPath)) {
                            unlink($tempPath);
                        }
                    }
                }
            }

            if ($request->hasFile('videos')) {
                foreach ($request->file('videos') as $video) {
                    if ($video->isValid()) {
                        $tempPath = $video->getPathname();
                        if (file_exists($tempPath)) {
                            unlink($tempPath);
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error('❌ Erreur lors du nettoyage des fichiers: ' . $e->getMessage());
        }
    }

    /**
     * Affiche une image du colis
     */
    public function showMedia(Package $package, $type, $index)
    {
        try {
            if ($type === 'image') {
                $media = $package->images;
            } elseif ($type === 'video') {
                $media = $package->videos;
            } else {
                abort(404);
            }

            if (!$media || !isset($media[$index])) {
                abort(404);
            }

            $path = storage_path('app/public/' . $media[$index]);

            if (!file_exists($path)) {
                abort(404);
            }

            return response()->file($path);

        } catch (\Exception $e) {
            Log::error('❌ Erreur affichage média: ' . $e->getMessage());
            abort(404);
        }
    }

    /**
     * Supprime un média spécifique d'un colis
     */
    public function deleteMedia(Package $package, $type, $index)
    {
        try {
            DB::beginTransaction();

            if ($type === 'image') {
                $media = $package->images ?? [];
            } elseif ($type === 'video') {
                $media = $package->videos ?? [];
            } else {
                return response()->json(['error' => 'Type de média invalide'], 400);
            }

            if (!isset($media[$index])) {
                return response()->json(['error' => 'Média non trouvé'], 404);
            }

            // Supprimer le fichier du stockage
            $filePath = $media[$index];
            Storage::disk('public')->delete($filePath);

            // Retirer l'élément du tableau
            array_splice($media, $index, 1);

            // Mettre à jour le package
            if ($type === 'image') {
                $package->images = $media;
            } else {
                $package->videos = $media;
            }

            $package->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Média supprimé avec succès'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('❌ Erreur suppression média: ' . $e->getMessage());

            return response()->json([
                'error' => 'Erreur lors de la suppression'
            ], 500);
        }
    }

    /**
     * Ajoute des médias à un colis existant
     */
    public function addMedia(Request $request, Package $package)
    {
        $validated = $request->validate([
            'images' => 'nullable|array|max:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
            'videos' => 'nullable|array|max:5',
            'videos.*' => 'mimes:mp4,mov,avi,wmv|max:10240',
        ]);

        if (empty($request->file('images')) && empty($request->file('videos'))) {
            return back()->withErrors(['media' => 'Veuillez sélectionner au moins un fichier.']);
        }

        try {
            DB::beginTransaction();

            // Traitement des nouveaux médias
            $mediaData = $this->handleMediaUpload($request);

            // Fusionner avec les médias existants
            $existingImages = $package->images ?? [];
            $existingVideos = $package->videos ?? [];

            $package->images = array_merge($existingImages, $mediaData['images']);
            $package->videos = array_merge($existingVideos, $mediaData['videos']);

            $package->save();

            DB::commit();

            return back()->with('success', 'Médias ajoutés avec succès.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('❌ Erreur ajout médias: ' . $e->getMessage());

            $this->cleanupUploadedFiles($request);

            return back()->with('error', 'Erreur lors de l\'ajout des médias.');
        }
    }

    /**
     * ====================================================================
     * MÉTHODES UTILITAIRES
     * ====================================================================
     */

    /**
     * Formater le numéro de téléphone pour WhatsApp selon le pays
     */
    private function formatPhoneForWhatsApp($phone, $country = 'France')
    {
        // Supprimer les caractères non numériques
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Formater selon le pays
        switch ($country) {
            case 'France':
                // Format français: +33 6/7 XX XX XX XX
                if (strlen($phone) == 10 && substr($phone, 0, 1) == '0') {
                    $phone = '33' . substr($phone, 1);
                }
                break;

            case 'Cameroun':
                // Format camerounais: +237 XX XX XX XX
                if (strlen($phone) == 9) {
                    $phone = '237' . $phone;
                } elseif (strlen($phone) == 10 && substr($phone, 0, 1) == '0') {
                    $phone = '237' . substr($phone, 1);
                }
                break;

            case 'Belgique':
                // Format belge: +32 4XX XX XX XX
                if (strlen($phone) == 10 && substr($phone, 0, 1) == '0') {
                    $phone = '32' . substr($phone, 1);
                } elseif (strlen($phone) == 9) {
                    $phone = '32' . $phone;
                }
                break;
        }

        return $phone;
    }

    /**
     * Génère un email DSF unique
     */
    private function generateDsfEmail(string $name): string
    {
        $baseName = Str::slug($name);
        $uniqueNumber = sprintf('%04d', mt_rand(0, 9999));
        $email = "dsf.{$baseName}{$uniqueNumber}@dsf-express.com";

        while (User::where('email', $email)->exists()) {
            $uniqueNumber = sprintf('%04d', mt_rand(0, 9999));
            $email = "dsf.{$baseName}{$uniqueNumber}@dsf-express.com";
        }

        return $email;
    }

    /**
     * Génère un mot de passe sécurisé
     */
    private function generateSecurePassword(): string
    {
        return 'DSF' . Str::random(4) . rand(1000, 9999);
    }

    /**
     * Génère un numéro de suivi unique
     */
    private function generateTrackingNumber(): string
    {
        $date = Carbon::now()->format('ymd');
        $random = strtoupper(Str::random(4));
        $number = "DSF-{$date}-{$random}";

        while (Package::where('tracking_number', $number)->exists()) {
            $random = strtoupper(Str::random(4));
            $number = "DSF-{$date}-{$random}";
        }

        return $number;
    }

    /**
     * Crée un nouveau colis avec ses relations
     */
    private function createPackage($userId, array $data)
    {
        // Création du colis avec les médias
        $package = Package::create([
            'user_id' => $userId,
            'tracking_number' => $this->generateTrackingNumber(),
            'weight' => $data['weight'],
            'destination_address' => $data['destination_address'],
            'description_colis' => $data['description_colis'],
            'price' => $data['price'],
            'status' => 'registered',
            'images' => $data['images'] ?? [],
            'videos' => $data['videos'] ?? []
        ]);

        // Création du destinataire associé
        $package->recipient()->create([
            'name' => $data['recipient_name'],
            'phone' => $data['recipient_phone']
        ]);

        return $package->load('recipient');
    }

    /**
     * ====================================================================
     * MÉTHODES PDF ET DOCUMENTS
     * ====================================================================
     */

    /**
     * Génère le PDF et le sauvegarde temporairement pour WhatsApp
     */
    private function generatePdfForWhatsApp($shipmentData, $view)
    {
        // Créer le dossier temporaire si n'existe pas
        $tempDir = storage_path('app/public/temp');
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0755, true);
        }

        // Générer le PDF
        $pdf = PDF::loadView($view, ['shipment' => $shipmentData]);

        // Sauvegarder le PDF dans un fichier temporaire
        $filename = 'DSF-' . $shipmentData['package']['tracking'] . '-' . time() . '.pdf';
        $pdfPath = $tempDir . '/' . $filename;
        $pdf->save($pdfPath);

        // Planifier la suppression du fichier après 24 heures
        $this->scheduleFileDeletion($pdfPath);

        return $pdfPath;
    }

    /**
     * Planifie la suppression du fichier PDF temporaire
     */
    private function scheduleFileDeletion($filePath)
    {
        try {
            DB::table('temp_files')->insert([
                'path' => $filePath,
                'expires_at' => Carbon::now()->addHours(24),
                'created_at' => Carbon::now()
            ]);
        } catch (\Exception $e) {
            Log::error('❌ Erreur lors de la planification de suppression du fichier: ' . $e->getMessage());
        }
    }

    /**
     * Permet d'accéder au fichier PDF temporaire
     */
    public function getTempPdf($filename)
    {
        $path = storage_path('app/public/temp/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    /**
     * Affiche la page de succès
     */
    public function success()
    {
        if (!session('shipment_created')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.shipments.success');
    }

    /**
     * Supprime une expédition
     */
    public function destroy(Package $shipment)
    {
        try {
            DB::beginTransaction();

            // Les médias et le destinataire seront supprimés automatiquement
            // grâce à la méthode boot() du modèle Package
            $shipment->delete();

            DB::commit();

            return redirect()
                ->route('admin.shipments.index')
                ->with('success', 'Expédition supprimée avec succès.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('❌ Erreur suppression expédition: ' . $e->getMessage());
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }

    /**
     * ====================================================================
     * MÉTHODES PDF ET RAPPORTS
     * ====================================================================
     */

    /**
     * Génère le PDF de confirmation
     */
    public function generatePdf($tracking = null)
    {
        $shipment = $this->getShipmentData($tracking);

        if (!$shipment) {
            abort(404);
        }

        // Détermine si c'est un nouvel utilisateur
        $isNewUser = isset($shipment['user']['password']);

        // Sélectionne le template approprié
        $view = $isNewUser ? 'admin.shipments.pdf.pdf-new-user' : 'admin.shipments.pdf.pdf-existing-user';

        $pdf = PDF::loadView($view, ['shipment' => $shipment]);

        return $pdf->stream("DSF-{$shipment['package']['tracking']}.pdf");
    }

    /**
     * Télécharge le PDF de confirmation
     */
    public function downloadPdf($tracking = null)
    {
        $shipment = $this->getShipmentData($tracking);

        if (!$shipment) {
            abort(404);
        }

        // Détermine si c'est un nouvel utilisateur
        $isNewUser = isset($shipment['user']['password']);

        // Sélectionne le template approprié
        $view = $isNewUser ? 'admin.shipments.pdf.pdf-new-user' : 'admin.shipments.pdf.pdf-existing-user';

        $pdf = PDF::loadView($view, ['shipment' => $shipment]);

        return $pdf->download("DSF-{$shipment['package']['tracking']}.pdf");
    }

    /**
     * Génère une étiquette d'expédition
     */
    public function generateLabel($tracking)
    {
        $shipment = $this->getShipmentData($tracking);

        if (!$shipment) {
            abort(404);
        }

        $pdf = PDF::loadView('admin.shipments.pdf.label', ['shipment' => $shipment]);

        return $pdf->stream("DSF-{$shipment['package']['tracking']}-label.pdf");
    }

    /**
     * Récupère les données d'expédition
     */
    private function getShipmentData($tracking = null)
    {
        $shipment = session('shipment_created');

        if (!$shipment && $tracking) {
            $package = Package::with(['user', 'recipient'])
                ->where('tracking_number', $tracking)
                ->firstOrFail();

            $shipment = [
                'user' => [
                    'name' => $package->user->name,
                    'email' => $package->user->email,
                    'phone' => $package->user->phone
                ],
                'recipient' => [
                    'name' => $package->recipient->name,
                    'phone' => $package->recipient->phone
                ],
                'package' => [
                    'tracking' => $package->tracking_number,
                    'price' => $package->price,
                    'destination' => $package->destination_address,
                    'weight' => $package->weight,
                    'description' => $package->description_colis,
                    'media_count' => $package->getMediaCount()
                ]
            ];
        }

        return $shipment;
    }

    /**
     * ====================================================================
     * MÉTHODES D'ACTIONS EN MASSE
     * ====================================================================
     */

    /**
     * Met à jour le statut de plusieurs expéditions
     */
    public function bulkStatusUpdate(Request $request)
    {
        $validated = $request->validate([
            'shipments' => 'required|array',
            'shipments.*' => 'exists:packages,id',
            'status' => 'required|in:registered,in_transit,delivered'
        ]);

        try {
            DB::beginTransaction();

            Package::whereIn('id', $validated['shipments'])
                ->update(['status' => $validated['status']]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Statuts mis à jour avec succès'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour des statuts'
            ], 500);
        }
    }

    /**
     * ====================================================================
     * API ET MÉTHODES AVANCÉES POUR MÉDIAS
     * ====================================================================
     */

    /**
     * Retourne les URLs des médias d'un package en JSON
     */
    public function getPackageMedia(Package $package)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => [
                    'images' => $package->getImageUrls(),
                    'videos' => $package->getVideoUrls(),
                    'count' => $package->getMediaCount()
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('❌ Erreur récupération médias: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des médias'
            ], 500);
        }
    }

    /**
     * Upload d'un média unique (pour AJAX)
     */
    public function uploadSingleMedia(Request $request, Package $package)
    {
        $validated = $request->validate([
            'file' => 'required|file|max:10240',
            'type' => 'required|in:image,video'
        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('file');
            $type = $validated['type'];

            // Validation spécifique selon le type
            if ($type === 'image') {
                $request->validate([
                    'file' => 'image|mimes:jpeg,png,jpg,gif'
                ]);
            } else {
                $request->validate([
                    'file' => 'mimes:mp4,mov,avi,wmv'
                ]);
            }

            // Générer le nom de fichier et stocker
            $filename = $this->generateMediaFilename($file, $type);
            $folderPath = $type === 'image' ? 'packages/images' : 'packages/videos';
            $path = $file->storeAs($folderPath, $filename, 'public');

            if (!$path) {
                throw new \Exception('Erreur lors de la sauvegarde du fichier');
            }

            // Mettre à jour le package
            if ($type === 'image') {
                $images = $package->images ?? [];
                $images[] = $path;
                $package->images = $images;
            } else {
                $videos = $package->videos ?? [];
                $videos[] = $path;
                $package->videos = $videos;
            }

            $package->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Fichier uploadé avec succès',
                'data' => [
                    'path' => $path,
                    'url' => Storage::url($path),
                    'type' => $type,
                    'index' => count($type === 'image' ? $package->images : $package->videos) - 1
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('❌ Erreur upload média unique: ' . $e->getMessage());

            // Nettoyer le fichier si l'upload a échoué
            if (isset($path) && $path) {
                Storage::disk('public')->delete($path);
            }

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'upload: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Réorganise l'ordre des médias
     */
    public function reorderMedia(Request $request, Package $package)
    {
        $validated = $request->validate([
            'type' => 'required|in:images,videos',
            'order' => 'required|array',
            'order.*' => 'integer|min:0'
        ]);

        try {
            DB::beginTransaction();

            $type = $validated['type'];
            $newOrder = $validated['order'];

            $currentMedia = $type === 'images' ? ($package->images ?? []) : ($package->videos ?? []);

            // Vérifier que tous les indices sont valides
            foreach ($newOrder as $index) {
                if (!isset($currentMedia[$index])) {
                    throw new \Exception('Index de média invalide: ' . $index);
                }
            }

            // Réorganiser selon le nouvel ordre
            $reorderedMedia = [];
            foreach ($newOrder as $index) {
                $reorderedMedia[] = $currentMedia[$index];
            }

            // Mettre à jour le package
            if ($type === 'images') {
                $package->images = $reorderedMedia;
            } else {
                $package->videos = $reorderedMedia;
            }

            $package->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Ordre des médias mis à jour avec succès'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('❌ Erreur réorganisation médias: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la réorganisation: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * ====================================================================
     * MÉTHODES DE MAINTENANCE ET NETTOYAGE
     * ====================================================================
     */

    /**
     * Nettoie les anciens fichiers temporaires
     */
    public function cleanupTempFiles()
    {
        try {
            $expiredFiles = DB::table('temp_files')
                ->where('expires_at', '<', Carbon::now())
                ->get();

            foreach ($expiredFiles as $file) {
                if (file_exists($file->path)) {
                    unlink($file->path);
                }

                DB::table('temp_files')
                    ->where('id', $file->id)
                    ->delete();
            }

            Log::info('🧹 Nettoyage des fichiers temporaires terminé. ' . count($expiredFiles) . ' fichiers supprimés.');

            return response()->json([
                'success' => true,
                'message' => count($expiredFiles) . ' fichiers temporaires supprimés'
            ]);

        } catch (\Exception $e) {
            Log::error('❌ Erreur lors du nettoyage des fichiers temporaires: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du nettoyage'
            ], 500);
        }
    }

    /**
     * Obtient les statistiques sur l'utilisation du stockage
     */
    public function getStorageStats()
    {
        try {
            $packages = Package::all();
            $totalImages = 0;
            $totalVideos = 0;
            $totalSize = 0;

            foreach ($packages as $package) {
                if ($package->images) {
                    $totalImages += count($package->images);
                    foreach ($package->images as $imagePath) {
                        $fullPath = storage_path('app/public/' . $imagePath);
                        if (file_exists($fullPath)) {
                            $totalSize += filesize($fullPath);
                        }
                    }
                }

                if ($package->videos) {
                    $totalVideos += count($package->videos);
                    foreach ($package->videos as $videoPath) {
                        $fullPath = storage_path('app/public/' . $videoPath);
                        if (file_exists($fullPath)) {
                            $totalSize += filesize($fullPath);
                        }
                    }
                }
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'total_packages' => $packages->count(),
                    'total_images' => $totalImages,
                    'total_videos' => $totalVideos,
                    'total_size_bytes' => $totalSize,
                    'total_size_mb' => round($totalSize / (1024 * 1024), 2),
                    'average_media_per_package' => $packages->count() > 0 ? round(($totalImages + $totalVideos) / $packages->count(), 2) : 0
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('❌ Erreur calcul statistiques stockage: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du calcul des statistiques'
            ], 500);
        }
    }

    /**
     * ====================================================================
     * MÉTHODES DE TEST ET DEBUG POUR LES NOTIFICATIONS
     * ====================================================================
     */

    /**
     * Méthode de test pour les notifications (développement uniquement)
     */
    public function testNotifications(Request $request)
    {
        if (!app()->environment('local')) {
            abort(403, 'Cette fonction n\'est disponible qu\'en développement');
        }

        try {
            $package = Package::with(['user', 'recipient'])->first();

            if (!$package) {
                return response()->json(['error' => 'Aucun colis trouvé pour les tests']);
            }

            $shipmentData = [
                'user' => [
                    'name' => $package->user->name,
                    'email' => $package->user->email,
                    'phone' => $package->user->phone
                ],
                'recipient' => [
                    'name' => $package->recipient->name,
                    'phone' => $package->recipient->phone,
                    'email' => 'test@example.com' // Email de test
                ],
                'package' => [
                    'tracking' => $package->tracking_number,
                    'price' => $package->price,
                    'destination' => $package->destination_address,
                    'weight' => $package->weight,
                    'description' => $package->description_colis,
                    'media_count' => $package->getMediaCount()
                ]
            ];

            // Test des messages WhatsApp
            $senderMessage = $this->createWhatsAppMessageForSender($shipmentData, false);
            $recipientMessage = $this->createWhatsAppMessageForRecipient($shipmentData);

            return response()->json([
                'success' => true,
                'data' => [
                    'sender_message' => $senderMessage,
                    'recipient_message' => $recipientMessage,
                    'sender_phone' => $this->formatPhoneForWhatsApp($package->user->phone, 'France'),
                    'recipient_phone' => $this->formatPhoneForWhatsApp($package->recipient->phone, 'France')
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('❌ Erreur test notifications: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du test: ' . $e->getMessage()
            ], 500);
        }
    }
}
