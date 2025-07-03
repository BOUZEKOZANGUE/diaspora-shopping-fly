<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 flex items-center justify-center bg-[#0077be] text-white rounded-lg shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 12h-6l-2 3h-4l-2-3H2"/>
                        <path d="M5.45 5.11L2 12v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/>
                        <line x1="6" y1="16" x2="6" y2="12"/>
                        <line x1="10" y1="16" x2="10" y2="12"/>
                        <line x1="14" y1="16" x2="14" y2="12"/>
                        <line x1="18" y1="16" x2="18" y2="12"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-[#0077be]">{{ __('Colis créé avec succès') }}</h2>
            </div>
            <div>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                    <span class="relative flex h-2 w-2 mr-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    Traitement terminé
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Carte principale avec onglets -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
                <!-- En-tête avec succès -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-5">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 bg-white bg-opacity-20 p-2 rounded-full">
                            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Colis enregistré avec succès!</h3>
                            <p class="text-green-100 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Créé le {{ date('d/m/Y à H:i') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Navigation par onglets -->
                <div class="border-b border-gray-200">
                    <nav class="flex -mb-px overflow-x-auto hide-scrollbar" id="tab-navigation">
                        <button class="tab-button active whitespace-nowrap px-6 py-4 border-b-2 border-[#0077be] font-medium text-[#0077be]" data-target="details-tab">
                            <i class="fas fa-box mr-2"></i>Détails du colis
                        </button>
                        <button class="tab-button whitespace-nowrap px-6 py-4 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="sender-tab">
                            <i class="fas fa-user mr-2"></i>Expéditeur
                        </button>
                        <button class="tab-button whitespace-nowrap px-6 py-4 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="recipient-tab">
                            <i class="fas fa-user-check mr-2"></i>Destinataire
                        </button>
                        <button class="tab-button whitespace-nowrap px-6 py-4 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="notifications-tab">
                            <i class="fas fa-bell mr-2"></i>Notifications
                        </button>
                    </nav>
                </div>

                <!-- Contenu des onglets -->
                <div class="tab-content">
                    <!-- Onglet Détails du colis -->
                    <div id="details-tab" class="tab-pane active px-6 py-8 space-y-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-semibold text-gray-900 flex items-center">
                                <i class="fas fa-box mr-2 text-[#0077be]"></i>
                                Détails du Colis
                            </h4>
                            <div class="flex items-center">
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full flex items-center">
                                    <i class="fas fa-truck-loading mr-1"></i>
                                    En attente d'expédition
                                </span>
                            </div>
                        </div>

                        <!-- Numéro de suivi avec QR Code -->
                        <div class="bg-gray-50 rounded-xl p-6 flex flex-col md:flex-row gap-6 items-center">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-500">Numéro de suivi</p>
                                <div class="flex items-center mt-1">
                                    <p class="text-xl font-mono font-semibold text-[#0077be]">{{ session('shipment_created.package.tracking') }}</p>
                                    <button class="ml-2 text-gray-400 hover:text-gray-600" onclick="copyToClipboard('{{ session('shipment_created.package.tracking') }}')">
                                        <i class="far fa-copy"></i>
                                    </button>
                                </div>
                                <p class="mt-2 text-xs text-gray-500 flex items-center">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Le client peut suivre son colis avec ce numéro
                                </p>
                            </div>
                            <div class="bg-white p-2 rounded-lg border">
                                <!-- Placeholder for QR code (would be generated on backend) -->
                                <img src="/api/placeholder/100/100" alt="QR Code" class="w-24 h-24">
                            </div>
                        </div>

                        <!-- Détails principaux du colis -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-gray-50 rounded-xl p-6">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-500">Prix</p>
                                    <span class="flex-shrink-0 bg-blue-50 p-1 rounded-full">
                                        <i class="fas fa-euro-sign text-blue-500 text-xs"></i>
                                    </span>
                                </div>
                                <p class="mt-2 text-2xl font-semibold text-gray-900">{{ number_format(session('shipment_created.package.price'), 2) }} €</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-6">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-500">Poids</p>
                                    <span class="flex-shrink-0 bg-blue-50 p-1 rounded-full">
                                        <i class="fas fa-weight-hanging text-blue-500 text-xs"></i>
                                    </span>
                                </div>
                                <p class="mt-2 text-2xl font-semibold text-gray-900">{{ session('shipment_created.package.weight') }} kg</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-6">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-500">Statut</p>
                                    <span class="flex-shrink-0 bg-blue-50 p-1 rounded-full">
                                        <i class="fas fa-check-circle text-blue-500 text-xs"></i>
                                    </span>
                                </div>
                                <p class="mt-2 text-2xl font-semibold text-green-600">Enregistré</p>
                            </div>
                        </div>

                        <!-- Description et adresse -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 rounded-xl p-6">
                                <p class="text-sm font-medium text-gray-500">Description</p>
                                <p class="mt-1 text-base text-gray-900">{{ session('shipment_created.package.description') }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-6">
                                <p class="text-sm font-medium text-gray-500">Adresse de destination</p>
                                <p class="mt-1 text-base text-gray-900">{{ session('shipment_created.package.destination') }}</p>
                                <a href="https://maps.google.com/?q={{ urlencode(session('shipment_created.package.destination')) }}"
                                   target="_blank"
                                   class="mt-2 inline-flex items-center text-sm text-[#0077be] hover:underline">
                                    <i class="fas fa-map-marker-alt mr-1"></i> Voir sur la carte
                                </a>
                            </div>
                        </div>

                        <!-- Chronologie de suivi -->
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h5 class="font-medium text-gray-900 mb-4">Historique du colis</h5>
                            <div class="relative">
                                <div class="absolute top-0 bottom-0 left-[1.125rem] w-0.5 bg-gray-200"></div>
                                <div class="space-y-6 relative z-10">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 bg-green-500 rounded-full h-6 w-6 flex items-center justify-center mt-0.5 ring-4 ring-white">
                                            <i class="fas fa-check text-white text-xs"></i>
                                        </div>
                                        <div class="ml-4">
                                            <h6 class="text-sm font-medium text-gray-900">Création du colis</h6>
                                            <p class="text-xs text-gray-500">{{ date('d/m/Y H:i') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start opacity-50">
                                        <div class="flex-shrink-0 bg-gray-300 rounded-full h-6 w-6 flex items-center justify-center mt-0.5 ring-4 ring-white">
                                            <i class="fas fa-box text-white text-xs"></i>
                                        </div>
                                        <div class="ml-4">
                                            <h6 class="text-sm font-medium text-gray-900">En attente de traitement</h6>
                                            <p class="text-xs text-gray-500">-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Onglet Expéditeur -->
                    <div id="sender-tab" class="tab-pane hidden px-6 py-8 space-y-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-semibold text-gray-900 flex items-center">
                                <i class="fas fa-user mr-2 text-[#0077be]"></i>
                                Informations Expéditeur
                            </h4>

                            <div class="flex items-center">
                                @if(session('shipment_created.user.password'))
                                <span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-3 py-1 rounded-full">
                                    <i class="fas fa-user-plus mr-1"></i>
                                    Nouveau client
                                </span>
                                @else
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">
                                    <i class="fas fa-user-check mr-1"></i>
                                    Client existant
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <div class="bg-gray-50 rounded-xl p-6 lg:col-span-2">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Nom</p>
                                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ session('shipment_created.user.name') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Téléphone</p>
                                        <div class="flex items-center mt-1">
                                            <p class="text-lg font-semibold text-gray-900">{{ session('shipment_created.user.phone') }}</p>
                                            <a href="tel:{{ session('shipment_created.user.phone') }}" class="ml-2 text-[#0077be]">
                                                <i class="fas fa-phone-alt"></i>
                                            </a>
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', session('shipment_created.user.phone')) }}" class="ml-2 text-green-600" target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="md:col-span-2">
                                        <p class="text-sm font-medium text-gray-500">Email</p>
                                        <div class="flex items-center mt-1">
                                            <p class="text-lg font-semibold text-[#0077be]">{{ session('shipment_created.user.email') }}</p>
                                            <a href="mailto:{{ session('shipment_created.user.email') }}" class="ml-2 text-[#0077be]">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                            <button class="ml-2 text-gray-400 hover:text-gray-600" onclick="copyToClipboard('{{ session('shipment_created.user.email') }}')">
                                                <i class="far fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                @if(session('shipment_created.user.password'))
                                <div class="mt-6 p-4 bg-yellow-50 rounded-lg border border-yellow-100">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 bg-yellow-100 p-1.5 rounded-full">
                                            <i class="fas fa-key text-yellow-600"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="text-sm font-medium text-gray-900">Informations de connexion temporaires</h5>
                                            <p class="text-xs text-gray-600 mb-2">Ces informations ont été envoyées au client par email</p>
                                            <div class="bg-white p-3 rounded border border-yellow-200">
                                                <div class="grid grid-cols-2 gap-2">
                                                    <div>
                                                        <p class="text-xs font-medium text-gray-500">Identifiant</p>
                                                        <p class="text-sm text-gray-900">{{ session('shipment_created.user.email') }}</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs font-medium text-gray-500">Mot de passe temporaire</p>
                                                        <div class="flex items-center">
                                                            <p class="font-mono text-sm bg-yellow-50 p-1 rounded text-yellow-800">{{ session('shipment_created.user.password') }}</p>
                                                            <button class="ml-2 text-gray-400 hover:text-gray-600" onclick="copyToClipboard('{{ session('shipment_created.user.password') }}')">
                                                                <i class="far fa-copy"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            {{-- <div class="bg-gray-50 rounded-xl p-6">
                                <p class="text-sm font-medium text-gray-500 mb-3">Actions client</p>
                                <div class="space-y-3">
                                    <a href="{{ route('admin.users.show', ['id' => 1]) }}" class="flex items-center p-3 bg-white hover:bg-gray-50 rounded-lg border border-gray-200 text-gray-700 hover:text-[#0077be] transition-colors">
                                        <i class="fas fa-user-circle text-lg text-[#0077be] mr-3"></i>
                                        <span>Voir le profil client</span>
                                    </a>
                                    <a href="{{ route('admin.users.index', ['id' => 1]) }}" class="flex items-center p-3 bg-white hover:bg-gray-50 rounded-lg border border-gray-200 text-gray-700 hover:text-[#0077be] transition-colors">
                                        <i class="fas fa-history text-lg text-[#0077be] mr-3"></i>
                                        <span>Historique des envois</span>
                                    </a>
                                    <a href="{{ route('admin.clients.edit', ['id' => 1]) }}" class="flex items-center p-3 bg-white hover:bg-gray-50 rounded-lg border border-gray-200 text-gray-700 hover:text-[#0077be] transition-colors">
                                        <i class="fas fa-edit text-lg text-[#0077be] mr-3"></i>
                                        <span>Modifier les informations</span>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <!-- Onglet Destinataire -->
                    <div id="recipient-tab" class="tab-pane hidden px-6 py-8 space-y-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-semibold text-gray-900 flex items-center">
                                <i class="fas fa-user-check mr-2 text-[#0077be]"></i>
                                Informations Destinataire
                            </h4>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <div class="bg-gray-50 rounded-xl p-6 lg:col-span-2">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Nom</p>
                                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ session('shipment_created.recipient.name') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Téléphone</p>
                                        <div class="flex items-center mt-1">
                                            <p class="text-lg font-semibold text-gray-900">{{ session('shipment_created.recipient.phone') }}</p>
                                            <a href="tel:{{ session('shipment_created.recipient.phone') }}" class="ml-2 text-[#0077be]">
                                                <i class="fas fa-phone-alt"></i>
                                            </a>
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', session('shipment_created.recipient.phone')) }}" class="ml-2 text-green-600" target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <p class="text-sm font-medium text-gray-500">Adresse de livraison</p>
                                    <div class="mt-2 bg-white p-4 rounded-lg border border-gray-200">
                                        <p class="text-gray-900">{{ session('shipment_created.package.destination') }}</p>
                                        <a href="https://maps.google.com/?q={{ urlencode(session('shipment_created.package.destination')) }}"
                                           target="_blank"
                                           class="mt-2 inline-flex items-center text-sm text-[#0077be] hover:underline">
                                            <i class="fas fa-map-marker-alt mr-1"></i> Voir sur la carte
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-6">
                                <p class="text-sm font-medium text-gray-500 mb-3">Information de livraison</p>
                                <div class="space-y-4">
                                    <div class="bg-white p-3 rounded-lg border border-gray-200">
                                        <p class="text-sm font-medium text-gray-700">Statut de livraison</p>
                                        <p class="mt-1 text-base text-blue-600 flex items-center">
                                            <i class="fas fa-clock mr-2"></i>
                                            En attente d'expédition
                                        </p>
                                    </div>

                                    <div class="bg-white p-3 rounded-lg border border-gray-200">
                                        <p class="text-sm font-medium text-gray-700">Date de livraison estimée</p>
                                        <p class="mt-1 text-base text-gray-900">{{ date('d/m/Y', strtotime('+3 days')) }}</p>
                                    </div>

                                    <button type="button" class="w-full flex items-center justify-center px-4 py-2 bg-[#0077be] hover:bg-[#005c91] text-white font-medium rounded-xl transition-colors duration-200">
                                        <i class="fas fa-truck mr-2"></i>
                                        Mettre à jour le statut
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Onglet Notifications -->
                    <div id="notifications-tab" class="tab-pane hidden px-6 py-8 space-y-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-semibold text-gray-900 flex items-center">
                                <i class="fas fa-bell mr-2 text-[#0077be]"></i>
                                Notifications
                            </h4>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <div class="bg-gray-50 rounded-xl p-6 lg:col-span-2">
                                <h5 class="font-medium text-gray-900 mb-4">Statut des notifications</h5>

                                <div class="space-y-4">
                                    <div class="flex items-start p-4 bg-green-50 rounded-lg border border-green-100">
                                        <div class="flex-shrink-0 bg-green-100 p-2 rounded-full">
                                            <i class="far fa-envelope text-green-600"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h6 class="text-sm font-medium text-gray-900">Email de confirmation</h6>
                                            <p class="text-sm text-gray-600">Envoyé à {{ session('shipment_created.user.email') }} le {{ date('d/m/Y à H:i') }}</p>
                                        </div>
                                        <button class="ml-auto flex-shrink-0 text-gray-400 hover:text-gray-600" title="Renvoyer l'email">
                                            <i class="fas fa-redo-alt"></i>
                                        </button>
                                    </div>

                                    @if(session('whatsapp_link'))
                                    <div class="flex items-start p-4 bg-gray-100 rounded-lg border border-gray-200">
                                        <div class="flex-shrink-0 bg-gray-200 p-2 rounded-full">
                                            <i class="fab fa-whatsapp text-gray-600"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h6 class="text-sm font-medium text-gray-900">Notification WhatsApp</h6>
                                            <p class="text-sm text-gray-600">En attente d'envoi à {{ session('shipment_created.user.phone') }}</p>
                                        </div>
                                        <a href="{{ session('whatsapp_link') }}" target="_blank" class="ml-auto flex-shrink-0 text-green-600 hover:text-green-700" title="Envoyer via WhatsApp">
                                            <i class="fas fa-paper-plane"></i>
                                        </a>
                                    </div>
                                    @endif

                                    <div class="flex items-start p-4 bg-blue-50 rounded-lg border border-blue-100">
                                        <div class="flex-shrink-0 bg-blue-100 p-2 rounded-full">
                                            <i class="fas fa-file-pdf text-blue-600"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h6 class="text-sm font-medium text-gray-900">Bordereau de livraison</h6>
                                            <p class="text-sm text-gray-600">PDF généré et prêt à être téléchargé</p>
                                        </div>
                                        <a href="{{ route('admin.shipments.pdf.new-user.download', ['tracking' => session('shipment_created.package.tracking')]) }}" class="ml-auto flex-shrink-0 text-blue-600 hover:text-blue-700" title="Télécharger le PDF">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>

                                    <div class="flex items-start p-4 bg-gray-100 rounded-lg border border-gray-200">
                                        <div class="flex-shrink-0 bg-gray-200 p-2 rounded-full">
                                            <i class="fas fa-mobile-alt text-gray-600"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h6 class="text-sm font-medium text-gray-900">SMS de confirmation</h6>
                                            <p class="text-sm text-gray-600">Non configuré</p>
                                        </div>
                                        <button class="ml-auto flex-shrink-0 text-gray-400 hover:text-gray-600" title="Configurer les SMS">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                @if(session('whatsapp_link') && session('pdf_path'))
                                <div class="bg-gray-50 rounded-xl p-6">
                                    <div class="flex items-center space-x-3 mb-4">
                                        <i class="fab fa-whatsapp text-2xl text-green-600"></i>
                                        <h5 class="font-medium text-gray-900">Envoyer par WhatsApp</h5>
                                    </div>

                                    <div class="space-y-4">
                                        <a id="download-pdf-btn" href="{{ url('/storage/temp/' . session('pdf_filename')) }}" download class="w-full flex items-center justify-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded-lg transition-colors duration-200">
                                            <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                                            Télécharger PDF
                                        </a>

                                        <a href="{{ session('whatsapp_link') }}" target="_blank" id="whatsapp-message-link" class="w-full flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                                            <i class="fab fa-whatsapp mr-2"></i>
                                            Envoyer via WhatsApp
                                        </a>
                                    </div>

                                    <div class="mt-4 text-sm text-gray-600">
                                        <p class="mb-2 font-medium text-gray-700">Comment procéder:</p>
                                        <ol class="space-y-1 ml-4 list-decimal">
                                            <li>Téléchargez d'abord le PDF</li>
                                            <li>Cliquez pour ouvrir WhatsApp</li>
                                            <li>Joignez le PDF téléchargé</li>
                                            <li>Envoyez le message prérédigé</li>
                                        </ol>
                                    </div>
                                </div>
                                @endif

                                <div class="bg-gray-50 rounded-xl p-6">
                                    <div class="flex items-center space-x-3 mb-4">
                                        <i class="fas fa-history text-xl text-blue-600"></i>
                                        <h5 class="font-medium text-gray-900">Historique des notifications</h5>
                                    </div>

                                    <div class="space-y-3 max-h-60 overflow-y-auto pr-2">
                                        <div class="bg-white p-3 rounded-lg border border-gray-200">
                                            <p class="text-sm font-medium text-gray-900">Email de confirmation</p>
                                            <p class="text-xs text-gray-500">{{ date('d/m/Y H:i') }}</p>
                                        </div>

                                        <div class="bg-white p-3 rounded-lg border border-gray-200">
                                            <p class="text-sm font-medium text-gray-900">PDF généré</p>
                                            <p class="text-xs text-gray-500">{{ date('d/m/Y H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <a href="{{ route('admin.shipments.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-xl font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Retour à la liste
                        </a>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('admin.shipments.pdf.new-user', ['tracking' => session('shipment_created.package.tracking')]) }}"
                           class="inline-flex items-center px-4 py-2 border border-[#0077be] rounded-xl font-medium text-[#0077be] hover:bg-[#0077be] hover:text-white transition-colors duration-200">
                            <i class="fas fa-eye mr-2"></i>
                            Voir le PDF
                        </a>
                        <a href="{{ route('admin.shipments.pdf.new-user.download', ['tracking' => session('shipment_created.package.tracking')]) }}"
                           class="inline-flex items-center px-4 py-2 bg-[#0077be] border border-transparent rounded-xl font-medium text-white hover:bg-[#005c91] transition-colors duration-200">
                            <i class="fas fa-download mr-2"></i>
                            Télécharger le PDF
                        </a>
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-xl font-medium text-white hover:bg-gray-700 transition-colors duration-200">
                                <i class="fas fa-ellipsis-h mr-2"></i>
                                Plus d'actions
                            </button>
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10 py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Modifier le colis</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Créer une étiquette</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dupliquer le colis</a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Annuler l'envoi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Autres actions recommandées -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-800 text-white">
                    <h3 class="font-medium">Actions recommandées</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-blue-50 rounded-xl p-6 flex flex-col">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0 bg-blue-100 p-2 rounded-full">
                                <i class="fas fa-box text-blue-600"></i>
                            </div>
                            <h4 class="ml-3 font-medium text-gray-900">Créer un autre colis</h4>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Enregistrer un nouveau colis pour le même client ou un autre expéditeur.</p>
                        <a href="{{ route('admin.shipments.create') }}" class="mt-auto inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>
                            Nouveau colis
                        </a>
                    </div>

                    <div class="bg-yellow-50 rounded-xl p-6 flex flex-col">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0 bg-yellow-100 p-2 rounded-full">
                                <i class="fas fa-print text-yellow-600"></i>
                            </div>
                            <h4 class="ml-3 font-medium text-gray-900">Imprimer les documents</h4>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Générez et imprimez les documents d'expédition nécessaires.</p>
                        <a href="#" class="mt-auto inline-flex items-center justify-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <i class="fas fa-print mr-2"></i>
                            Imprimer
                        </a>
                    </div>

                    <div class="bg-green-50 rounded-xl p-6 flex flex-col">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0 bg-green-100 p-2 rounded-full">
                                <i class="fas fa-truck text-green-600"></i>
                            </div>
                            <h4 class="ml-3 font-medium text-gray-900">Planifier l'enlèvement</h4>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Programmer la collecte du colis chez l'expéditeur.</p>
                        <a href="#" class="mt-auto inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            Planifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour copier dans le presse-papier
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                // Créer une notification temporaire
                const notification = document.createElement('div');
                notification.className = 'fixed top-4 right-4 bg-gray-800 text-white px-4 py-2 rounded-lg shadow-lg z-50';
                notification.innerText = 'Copié dans le presse-papier';
                document.body.appendChild(notification);

                // Supprimer la notification après 2 secondes
                setTimeout(() => {
                    notification.remove();
                }, 2000);
            });
        }

        // Gestion des onglets
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des onglets
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabPanes = document.querySelectorAll('.tab-pane');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Désactiver tous les onglets
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active');
                        btn.classList.remove('border-[#0077be]');
                        btn.classList.remove('text-[#0077be]');
                        btn.classList.add('border-transparent');
                        btn.classList.add('text-gray-500');
                    });

                    // Cacher tous les contenus
                    tabPanes.forEach(pane => {
                        pane.classList.add('hidden');
                        pane.classList.remove('active');
                    });

                    // Activer l'onglet cliqué
                    button.classList.add('active');
                    button.classList.add('border-[#0077be]');
                    button.classList.add('text-[#0077be]');
                    button.classList.remove('border-transparent');
                    button.classList.remove('text-gray-500');

                    // Afficher le contenu correspondant
                    const targetId = button.getAttribute('data-target');
                    const targetPane = document.getElementById(targetId);
                    targetPane.classList.remove('hidden');
                    targetPane.classList.add('active');
                });
            });

            // Gestion du téléchargement PDF et WhatsApp
            const downloadPdfBtn = document.getElementById('download-pdf-btn');
            const whatsappMessageLink = document.getElementById('whatsapp-message-link');

            if (downloadPdfBtn && whatsappMessageLink) {
                downloadPdfBtn.addEventListener('click', function() {
                    // Indiquer que l'étape 1 est complétée
                    setTimeout(() => {
                        downloadPdfBtn.classList.add('bg-green-100');
                        downloadPdfBtn.classList.add('text-green-800');
                        downloadPdfBtn.classList.remove('bg-gray-100');
                        downloadPdfBtn.classList.remove('text-gray-800');

                        // Ajouter une icône de confirmation
                        const icon = downloadPdfBtn.querySelector('i');
                        icon.classList.remove('fa-file-pdf');
                        icon.classList.add('fa-check-circle');

                        // Attirer l'attention sur l'étape suivante
                        whatsappMessageLink.classList.add('animate-pulse');
                        setTimeout(() => {
                            whatsappMessageLink.classList.remove('animate-pulse');
                        }, 2000);
                    }, 500);
                });
            }

            // Masquer la barre de défilement des onglets tout en permettant le défilement
            const tabNav = document.getElementById('tab-navigation');
            if (tabNav) {
                tabNav.addEventListener('wheel', (e) => {
                    e.preventDefault();
                    tabNav.scrollLeft += e.deltaY;
                });
            }
        });

        // Ajout des styles pour masquer la barre de défilement
        const style = document.createElement('style');
        style.textContent = `
            .hide-scrollbar::-webkit-scrollbar {
                display: none;
            }
            .hide-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        `;
        document.head.appendChild(style);
    </script>
</x-app-layout>

