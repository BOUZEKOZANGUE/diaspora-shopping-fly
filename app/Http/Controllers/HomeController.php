<?php
namespace App\Http\Controllers;

use App\Models\Fly;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Prépare les données des prochains départs pour les vues
     *
     * @return \Illuminate\Support\Collection
     */
    private function getUpcomingDepartures()
    {
        // Récupérer les prochains voyages (max 5) qui sont confirmés ou en préparation et à venir
        $upcomingFlys = Fly::where('departure_date', '>=', now())
                        ->whereIn('status', ['confirmed', 'pending'])
                        ->orderBy('departure_date')
                        ->take(5)
                        ->get();

        // Formater les données pour la navigation
        $upcomingDepartures = $upcomingFlys->map(function($fly) {
            // Déterminer si c'est un aller ou retour (en fonction du nom de la destination)
            $isToAfrica = stripos($fly->destination, 'cameroun') !== false ||
                        stripos($fly->destination, 'cameroon') !== false;

            $isFromAfrica = stripos($fly->departure, 'cameroun') !== false ||
                            stripos($fly->departure, 'cameroon') !== false;

            $direction = $isToAfrica ? 'Europe → Cameroun' : ($isFromAfrica ? 'Cameroun → Europe' : "{$fly->departure} → {$fly->destination}");

            // Formater la date
            $date = Carbon::parse($fly->departure_date)->format('d/m/Y');

            // Déterminer si le voyage est presque plein (place limitée)
            $capacityPercentage = $fly->max_capacity > 0 ? ($fly->current_capacity / $fly->max_capacity) * 100 : 0;
            $isLimited = $capacityPercentage > 75; // Si plus de 75% de la capacité est utilisée

            return [
                'id' => $fly->id,
                'direction' => $direction,
                'date' => $date,
                'is_limited' => $isLimited,
                'remaining' => $fly->max_capacity - $fly->current_capacity,
                'departure_date' => $fly->departure_date, // Date complète pour d'autres besoins
                'departure' => $fly->departure,
                'destination' => $fly->destination
            ];
        });

        // Si aucun voyage n'est disponible, fournir des exemples de repli
        if ($upcomingDepartures->isEmpty()) {
            $upcomingDepartures = collect([
                [
                    'id' => 0,
                    'direction' => 'Europe → Cameroun',
                    'date' => Carbon::now()->addDays(10)->format('d/m/Y'),
                    'is_limited' => false,
                    'remaining' => 30,
                    'departure_date' => Carbon::now()->addDays(10),
                    'departure' => 'France',
                    'destination' => 'Cameroun'
                ],
                [
                    'id' => 0,
                    'direction' => 'Cameroun → Europe',
                    'date' => Carbon::now()->addDays(14)->format('d/m/Y'),
                    'is_limited' => true,
                    'remaining' => 5,
                    'departure_date' => Carbon::now()->addDays(14),
                    'departure' => 'Cameroun',
                    'destination' => 'France'
                ]
            ]);
        }

        return $upcomingDepartures;
    }

    /**
     * Prépare les données pour l'affichage sur la page d'accueil
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('dashboard');
        }

        // Récupérer les prochains départs
        $upcomingDepartures = $this->getUpcomingDepartures();

        // Vérifier si un vol spécifique est demandé via l'URL
        $selectedDepartureId = $request->query('departure');
        $selectedDeparture = null;

        if ($selectedDepartureId) {
            $selectedDeparture = Fly::find($selectedDepartureId);
        }

        // Données pour la landing page
        $advantages = [
            [
                'icon' => 'shield-alt',
                'title' => 'Sécurité Garantie',
                'description' => 'Vos colis sont assurés et suivis en temps réel'
            ],
            [
                'icon' => 'clock',
                'title' => 'Rapidité',
                'description' => 'Livraison express en 48-72h'
            ],
            [
                'icon' => 'dollar-sign',
                'title' => 'Prix Compétitifs',
                'description' => 'Tarifs adaptés à tous les budgets'
            ]
        ];

        $services = [
            [
                'icon' => 'plane-departure',
                'title' => 'Transport Aérien',
                'description' => 'Envoi express de colis par avion'
            ],
            [
                'icon' => 'map-marker-alt',
                'title' => 'Livraison à Domicile',
                'description' => 'Service de porte-à-porte'
            ],
            [
                'icon' => 'box',
                'title' => 'Emballage Sécurisé',
                'description' => 'Protection optimale de vos colis'
            ]
        ];

        $testimonials = [
            [
                'name' => 'Marie K.',
                'location' => 'Paris',
                'text' => 'Service excellent ! Mon colis est arrivé en temps record à Douala.',
                'rating' => 5
            ],
            [
                'name' => 'Jean P.',
                'location' => 'Bruxelles',
                'text' => 'Très professionnel et prix compétitifs. Je recommande !',
                'rating' => 5
            ],
            [
                'name' => 'Sophie M.',
                'location' => 'Yaoundé',
                'text' => 'Un service client exceptionnel et un suivi impeccable.',
                'rating' => 5
            ]
        ];

        // Préparer les données de prochains départs pour l'affichage
        $nextDepartures = [];
        foreach ($upcomingDepartures->take(2) as $departure) {
            $fromCode = stripos($departure['direction'], 'cameroun') !== false ? 'CM' : 'FR';
            $toCode = $fromCode === 'CM' ? 'FR' : 'CM';

            $departureDate = Carbon::createFromFormat('d/m/Y', $departure['date']);

            $nextDepartures[] = [
                'from' => $fromCode,
                'to' => $toCode,
                'date' => $departureDate->format('d F Y'),
                'deadline' => $departureDate->subDay()->format('d F, H:i'),
                'status' => $departure['is_limited'] ? 'Places limitées' : 'Prochain vol',
                'status_class' => $departure['is_limited'] ? 'yellow' : 'green',
                'fly_id' => $departure['id'] // Ajouter l'ID du vol pour les liens
            ];
        }

        $aboutPoints = [
            'Plus de 10 ans d\'expérience',
            'Plus de 50,000 colis livrés',
            'Réseau international fiable',
            'Service client 24/7'
        ];

        return view('home', compact(
            'advantages',
            'services',
            'testimonials',
            'nextDepartures',
            'aboutPoints',
            'upcomingDepartures',
            'selectedDeparture'
        ));
    }

    /**
     * Affiche le tableau de bord de l'utilisateur
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        // Récupérer les prochains départs pour la barre de navigation
        $upcomingDepartures = $this->getUpcomingDepartures();

        $stats = [
            'total_packages' => Package::where('user_id', Auth::id())->count(),
            'pending_packages' => Package::where('user_id', Auth::id())
                                      ->where('status', 'pending')
                                      ->count(),
            'delivered_packages' => Package::where('user_id', Auth::id())
                                        ->where('status', 'delivered')
                                        ->count()
        ];

        $packages = Package::where('user_id', Auth::id())
                          ->latest()
                          ->paginate(5);

       return view('dashboard', compact('stats', 'packages', 'upcomingDepartures'));
    }

    /**
     * Prépare le formulaire d'expédition
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function expeditionForm(Request $request)
    {
        // Récupérer les prochains départs pour la barre de navigation
        $upcomingDepartures = $this->getUpcomingDepartures();

        // Récupérer le vol sélectionné si présent
        $selectedFlyId = $request->query('fly_id');
        $selectedFly = null;

        if ($selectedFlyId) {
            $selectedFly = Fly::find($selectedFlyId);
        }

        return view('expeditions.form', compact('upcomingDepartures', 'selectedFly'));
    }

    /**
     * Enregistre une nouvelle demande d'expédition
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeExpedition(Request $request)
    {
        // Validation des données du formulaire d'expédition
        $validatedData = $request->validate([
            'fly_id' => 'nullable|exists:flys,id',
            'sender_name' => 'required|string|max:255',
            'sender_phone' => 'required|string|max:255',
            'sender_email' => 'nullable|email|max:255',
            'recipient_name' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:255',
            'recipient_address' => 'nullable|string|max:255',
            'package_description' => 'required|string',
            'package_weight' => 'required|numeric|min:0.1',
            'has_commercial_items' => 'boolean',
            'has_alcohol' => 'boolean',
            'has_medicine' => 'boolean',
            'special_instructions' => 'nullable|string'
        ]);

        // Créer un nouveau colis
        $package = new Package();

        // Remplir les données du colis à partir des données validées
        $package->fill($validatedData);

        // Ajouter l'ID de l'utilisateur si connecté
        if (Auth::check()) {
            $package->user_id = Auth::id();
        }

        // Définir le statut initial
        $package->status = 'pending';

        // Sauvegarder le colis
        $package->save();

        // Redirection avec message de succès
        return redirect()->route('home')->with('success', 'Votre demande d\'expédition a été enregistrée avec succès. Nous vous contacterons prochainement.');
    }
}
