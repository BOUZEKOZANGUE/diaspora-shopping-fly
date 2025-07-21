<x-app-layout>
    <x-slot name="header">
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-4xl mx-auto px-4 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="{{ route('dashboard') }}"
                           class="flex items-center text-gray-600 hover:text-gray-900 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Retour au Dashboard
                        </a>
                    </div>

                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                  clip-rule="evenodd"/>
                        </svg>
                        Expédition créée avec succès
                    </div>
                </div>

                <div class="mt-6">
                    <h1 class="text-2xl font-bold text-gray-900">Confirmation d'Expédition</h1>
                    <p class="text-gray-600 mt-1">Votre colis a été enregistré et est prêt pour l'expédition</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4">
            @if (session('shipment_created'))
                @php
                    $shipment = session('shipment_created');
                @endphp

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Informations principales -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Numéro de suivi -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <div class="text-center">
                                <h2 class="text-lg font-semibold text-gray-900 mb-4">Numéro de Suivi</h2>
                                <div class="inline-flex items-center bg-blue-50 border border-blue-200 rounded-lg px-6 py-4">
                                    <span class="text-2xl font-mono font-bold text-blue-900">
                                        {{ $shipment['package']['tracking'] }}
                                    </span>
                                    <button onclick="copyToClipboard('{{ $shipment['package']['tracking'] }}')"
                                            class="ml-3 text-blue-600 hover:text-blue-800">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"/>
                                            <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Détails du colis -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Détails du Colis</h3>
                            </div>
                            <div class="p-6">
                                <dl class="grid grid-cols-2 gap-4">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Poids</dt>
                                        <dd class="text-lg font-semibold text-gray-900">
                                            {{ number_format($shipment['package']['weight'], 1) }} kg
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Prix</dt>
                                        <dd class="text-lg font-semibold text-gray-900">
                                            {{ number_format($shipment['package']['price'], 2) }} €
                                        </dd>
                                    </div>
                                    <div class="col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Destination</dt>
                                        <dd class="text-gray-900 mt-1">
                                            {{ str_replace("\n", ', ', $shipment['package']['destination']) }}
                                        </dd>
                                    </div>
                                    <div class="col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Description</dt>
                                        <dd class="text-gray-900 mt-1">{{ $shipment['package']['description'] }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <!-- Informations des personnes -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Expéditeur -->
                            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                                <div class="px-6 py-4 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">Expéditeur</h3>
                                </div>
                                <div class="p-6 space-y-3">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Nom</dt>
                                        <dd class="text-gray-900">{{ $shipment['user']['name'] }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                                        <dd class="text-gray-900">{{ $shipment['user']['email'] }}</dd>
                                    </div>
                                    @if (isset($shipment['user']['phone']))
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Téléphone</dt>
                                            <dd class="text-gray-900">{{ $shipment['user']['phone'] }}</dd>
                                        </div>
                                    @endif
                                    @if (isset($shipment['user']['password']))
                                        <div class="p-3 bg-yellow-50 border border-yellow-200 rounded">
                                            <p class="text-sm text-yellow-800 font-medium">Nouveau compte créé</p>
                                            <p class="text-xs text-yellow-700 mt-1">
                                                Mot de passe: <span class="font-mono font-bold">{{ $shipment['user']['password'] }}</span>
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Destinataire -->
                            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                                <div class="px-6 py-4 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">Destinataire</h3>
                                </div>
                                <div class="p-6 space-y-3">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Nom</dt>
                                        <dd class="text-gray-900">{{ $shipment['recipient']['name'] }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Téléphone</dt>
                                        <dd class="text-gray-900">{{ $shipment['recipient']['phone'] }}</dd>
                                    </div>
                                    @if (isset($shipment['recipient']['email']) && $shipment['recipient']['email'])
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                                            <dd class="text-gray-900">{{ $shipment['recipient']['email'] }}</dd>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Actions</h3>
                            </div>
                            <div class="p-6 space-y-4">
                                @if (session('pdf_path'))
                                    <a href="{{ route('admin.shipments.temp.pdf.download', session('pdf_filename')) }}"
                                       target="_blank"
                                       class="w-full flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-md transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                        Télécharger PDF
                                    </a>
                                @endif

                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $shipment['user']['phone']) }}?text={{ rawurlencode('Bonjour ' . $shipment['user']['name'] . ', votre colis avec le numéro de suivi ' . $shipment['package']['tracking'] . ' a été créé avec succès.') }}"
                                   target="_blank"
                                   class="w-full flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-md transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
                                    </svg>
                                    Notifier par WhatsApp
                                </a>

                                <a href="{{ route('admin.shipments.create-existing') }}"
                                   class="w-full flex items-center justify-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-md transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Nouveau Colis
                                </a>
                            </div>
                        </div>

                        <!-- Statut de livraison -->
                        <div class="mt-6 bg-white rounded-lg shadow-sm border border-gray-200">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Statut</h3>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Colis Enregistré</p>
                                            <p class="text-xs text-gray-500">{{ now()->format('d/m/Y à H:i') }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                                                <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1V8a1 1 0 00-1-1h-3z"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-500">En Transit</p>
                                            <p class="text-xs text-gray-400">2-5 jours ouvrés</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.75 2.524 9.026 9.026 0 00-.3 1.573z"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-500">Livré</p>
                                            <p class="text-xs text-gray-400">Destination finale</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <div class="mx-auto w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Aucune donnée d'expédition</h3>
                    <p class="text-gray-600 mb-4">Les informations de l'expédition ne sont pas disponibles.</p>
                    <a href="{{ route('admin.shipments.create-existing') }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                        Créer un Nouveau Colis
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Notification -->
    <div id="success-notification"
         class="fixed top-4 right-4 bg-white rounded-lg shadow-lg border border-gray-200 p-4 transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="ml-2 text-sm font-medium text-gray-900">Numéro copié !</span>
            <button onclick="hideNotification()" class="ml-4 text-gray-400 hover:text-gray-600">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>

    <script>
        // Envoi automatique des notifications au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('shipment_created'))
                // Envoi automatique du WhatsApp
                sendWhatsAppMessage();

                // Envoi automatique de l'email
                sendEmailNotification();
            @endif
        });

        // Fonction pour envoyer le message WhatsApp automatiquement
        function sendWhatsAppMessage() {
            const phoneNumber = "{{ preg_replace('/[^0-9]/', '', $shipment['user']['phone']) }}";
            const message = `*DIASPORA SHOPPING & FLY*
_Votre partenaire de confiance_

Bonjour *{{ $shipment['user']['name'] }}*,

Votre expédition est confirmée avec succès !

*VOTRE COLIS*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Numéro de suivi : *{{ $shipment['package']['tracking'] }}*
- Montant : *{{ number_format($shipment['package']['price'], 2) }} EUR*
- Poids : *{{ $shipment['package']['weight'] }} kg*
- Destination : _{{ str_replace("\n", ' ', $shipment['package']['destination']) }}_

*DESTINATAIRE*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Nom : *{{ $shipment['recipient']['name'] }}*
- Contact : *{{ $shipment['recipient']['phone'] }}*

@if(isset($shipment['user']['password']))
*VOTRE ESPACE CLIENT*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Site web : *{{ url('/') }}*
- Email : *{{ $shipment['user']['email'] }}*
- Mot de passe : *{{ $shipment['user']['password'] }}*

_Connectez-vous pour suivre vos expéditions en temps réel._
@else
*VOTRE ESPACE CLIENT*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Site web : *{{ url('/') }}*

_Connectez-vous avec vos identifiants habituels._
@endif

*GARANTIES*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
✓ Colis sécurisé et traçable 24h/24
✓ Notifications à chaque étape
✓ Livraison rapide garantie

*IMPORTANT :* N'oubliez pas d'informer votre destinataire.

Merci de votre confiance,
*DIASPORA SHOPPING & FLY*`;

            const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

            // Ouvrir WhatsApp dans un nouvel onglet
            window.open(whatsappUrl, '_blank');

            console.log('Message WhatsApp envoyé automatiquement');
        }

        // Fonction pour envoyer l'email automatiquement
        function sendEmailNotification() {
            // Appel AJAX pour envoyer l'email
            fetch('{{ route("admin.shipments.send-email-notification") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    shipment_data: @json($shipment)
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Email envoyé automatiquement');
                    showCustomNotification('Email de confirmation envoyé !', 'success');
                } else {
                    console.log('Erreur lors de l\'envoi de l\'email');
                    showCustomNotification('Erreur lors de l\'envoi de l\'email', 'error');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                showCustomNotification('Erreur de connexion', 'error');
            });
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                showNotification();
            }).catch(function() {
                // Fallback pour navigateurs plus anciens
                const textArea = document.createElement('textarea');
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                showNotification();
            });
        }

        function showNotification() {
            const notification = document.getElementById('success-notification');
            notification.classList.remove('translate-x-full');
            notification.classList.add('translate-x-0');

            setTimeout(() => {
                hideNotification();
            }, 3000);
        }

        function hideNotification() {
            const notification = document.getElementById('success-notification');
            notification.classList.remove('translate-x-0');
            notification.classList.add('translate-x-full');
        }

        // Fonction pour afficher des notifications personnalisées
        function showCustomNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 left-4 bg-white rounded-lg shadow-lg border-l-4 ${type === 'success' ? 'border-green-500' : 'border-red-500'} p-4 z-50 transform -translate-x-full transition-transform duration-300`;

            notification.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-5 h-5 ${type === 'success' ? 'text-green-500' : 'text-red-500'}" fill="currentColor" viewBox="0 0 20 20">
                        ${type === 'success' ?
                            '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>' :
                            '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>'
                        }
                    </svg>
                    <span class="ml-2 text-sm font-medium text-gray-900">${message}</span>
                </div>
            `;

            document.body.appendChild(notification);

            // Afficher la notification
            setTimeout(() => {
                notification.classList.remove('-translate-x-full');
                notification.classList.add('translate-x-0');
            }, 100);

            // Masquer après 4 secondes
            setTimeout(() => {
                notification.classList.remove('translate-x-0');
                notification.classList.add('-translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 4000);
        }
    </script>
</x-app-layout>
