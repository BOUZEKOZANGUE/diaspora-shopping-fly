<x-app-layout>
    <x-slot name="header">
        <div class="relative bg-gradient-to-r from-[#0077be] to-[#005c91] overflow-hidden">
            {{-- Navigation supérieure --}}
            <div class="absolute top-0 left-0 right-0 h-16 bg-black/10 backdrop-blur-sm z-10">
                <div class="max-w-7xl mx-auto px-4 h-full">
                    <div class="flex items-center justify-between h-full">
                        {{-- Bouton retour --}}
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-3 py-1.5 text-sm text-white hover:bg-white/20 rounded-lg transition-all duration-300 group">
                            <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="hidden sm:inline">Retour au Dashboard</span>
                        </a>

                        {{-- Badge de succès --}}
                        <div class="flex items-center px-3 py-1.5 bg-green-500/30 text-green-100 rounded-full">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-medium">Colis créé avec succès</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contenu principal du header --}}
            <div class="pt-20 pb-16 px-4 max-w-7xl mx-auto">
                <div class="relative z-10 text-center">
                    {{-- Icône de succès --}}
                    <div
                        class="mx-auto mb-6 w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center shadow-2xl">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        Expédition Créée avec Succès !
                    </h1>
                    <p class="text-lg text-white/90 max-w-2xl mx-auto">
                        Votre colis a été enregistré dans notre système et est prêt pour l'expédition
                    </p>
                </div>
            </div>

            {{-- Vague de séparation --}}
            <div class="absolute bottom-0 left-0 right-0">
                <svg class="w-full h-12 sm:h-16" viewBox="0 0 1440 54" fill="none" preserveAspectRatio="none">
                    <path
                        d="M0 54L60 50C120 46 240 38 360 34.7C480 31.3 600 32.7 720 34.7C840 36.7 960 39.3 1080 41.3C1200 43.3 1320 44.7 1380 45.3L1440 46V54H1380C1320 54 1200 54 1080 54C960 54 840 54 720 54C600 54 480 54 360 54C240 54 120 54 60 54H0Z"
                        fill="#f9fafb" />
                </svg>
            </div>

            {{-- Éléments décoratifs --}}
            <div class="absolute inset-0 z-0">
                <div
                    class="absolute top-20 right-0 w-48 h-48 md:w-72 md:h-72 bg-green-400/20 rounded-full filter blur-3xl">
                </div>
                <div
                    class="absolute bottom-0 left-1/4 w-32 h-32 md:w-48 md:h-48 bg-blue-400/10 rounded-full filter blur-2xl">
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 -mt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('shipment_created'))
                @php
                    $shipment = session('shipment_created');
                @endphp

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    {{-- Carte principale avec informations du colis --}}
                    <div class="lg:col-span-2 space-y-6">
                        {{-- Informations principales --}}
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-[#0077be] to-[#005c91] p-6">
                                <div class="flex items-center justify-between text-white">
                                    <div>
                                        <h2 class="text-xl font-bold">Informations de l'Expédition</h2>
                                        <p class="text-blue-100 text-sm">Numéro de suivi et détails</p>
                                    </div>
                                    <div class="p-3 bg-white/10 rounded-xl">
                                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                {{-- Numéro de suivi en évidence --}}
                                <div
                                    class="text-center p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl border-2 border-dashed border-[#0077be]/30">
                                    <h3 class="text-sm font-medium text-gray-600 mb-2">Numéro de Suivi</h3>
                                    <div class="text-3xl font-bold text-[#0077be] mb-3 font-mono tracking-wide">
                                        {{ $shipment['package']['tracking'] }}
                                    </div>
                                    <button onclick="copyToClipboard('{{ $shipment['package']['tracking'] }}')"
                                        class="inline-flex items-center px-3 py-1 text-xs bg-[#0077be] text-white rounded-full hover:bg-[#005c91] transition-colors">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                                            <path
                                                d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                                        </svg>
                                        Copier
                                    </button>
                                </div>

                                {{-- Détails du colis --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-4">
                                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                            <div
                                                class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-orange-600" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Poids</p>
                                                <p class="font-semibold text-gray-900">
                                                    {{ number_format($shipment['package']['weight'], 1) }} kg</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                            <div
                                                class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-green-600" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Prix</p>
                                                <p class="font-semibold text-gray-900">
                                                    {{ number_format($shipment['package']['price'], 2) }} €</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-y-4">
                                        @if (isset($shipment['package']['media_count']))
                                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                                <div
                                                    class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                                    <svg class="w-5 h-5 text-purple-600" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-600">Médias</p>
                                                    <p class="font-semibold text-gray-900">
                                                        @if ($shipment['package']['media_count']['images'] > 0)
                                                            {{ $shipment['package']['media_count']['images'] }} image(s)
                                                        @endif
                                                        @if ($shipment['package']['media_count']['videos'] > 0)
                                                            @if ($shipment['package']['media_count']['images'] > 0)
                                                                +
                                                            @endif
                                                            {{ $shipment['package']['media_count']['videos'] }} vidéo(s)
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                            <div
                                                class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-blue-600" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">Statut</p>
                                                <p class="font-semibold text-green-600">Enregistré</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <h4 class="text-sm font-medium text-gray-700 mb-2">Description du colis</h4>
                                    <p class="text-gray-600">{{ $shipment['package']['description'] }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Informations des personnes --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Expéditeur --}}
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4">
                                    <h3 class="text-lg font-semibold text-white flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Expéditeur
                                    </h3>
                                </div>
                                <div class="p-4 space-y-3">
                                    <div>
                                        <p class="text-sm text-gray-600">Nom</p>
                                        <p class="font-semibold text-gray-900">{{ $shipment['user']['name'] }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Email</p>
                                        <p class="font-medium text-gray-700">{{ $shipment['user']['email'] }}</p>
                                    </div>
                                    @if (isset($shipment['user']['phone']))
                                        <div>
                                            <p class="text-sm text-gray-600">Téléphone</p>
                                            <p class="font-medium text-gray-700">{{ $shipment['user']['phone'] }}</p>
                                        </div>
                                    @endif
                                    @if (isset($shipment['user']['password']))
                                        <div class="p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                            <p class="text-sm text-yellow-800 font-medium">Nouveau compte créé</p>
                                            <p class="text-xs text-yellow-700 mt-1">Mot de passe: <span
                                                    class="font-mono font-bold">{{ $shipment['user']['password'] }}</span>
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Destinataire --}}
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                <div class="bg-gradient-to-r from-green-600 to-green-700 p-4">
                                    <h3 class="text-lg font-semibold text-white flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                                        </svg>
                                        Destinataire
                                    </h3>
                                </div>
                                <div class="p-4 space-y-3">
                                    <div>
                                        <p class="text-sm text-gray-600">Nom</p>
                                        <p class="font-semibold text-gray-900">{{ $shipment['recipient']['name'] }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Téléphone</p>
                                        <p class="font-medium text-gray-700">{{ $shipment['recipient']['phone'] }}</p>
                                    </div>
                                    @if (isset($shipment['recipient']['email']) && $shipment['recipient']['email'])
                                        <div>
                                            <p class="text-sm text-gray-600">Email</p>
                                            <p class="font-medium text-gray-700">{{ $shipment['recipient']['email'] }}
                                            </p>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-sm text-gray-600">Destination</p>
                                        <p class="font-medium text-gray-700 text-sm leading-relaxed">
                                            {{ str_replace("\n", ', ', $shipment['package']['destination']) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Panneau latéral avec actions --}}
                    <div class="lg:col-span-1 space-y-6">
                        {{-- Actions principales --}}
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-[#0077be] to-[#005c91] p-4">
                                <h3 class="text-lg font-semibold text-white flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Actions Rapides
                                </h3>
                            </div>

                            <div class="p-4 space-y-3">
                                {{-- Bouton PDF --}}
                                @if (session('pdf_path'))
                                    <a href="{{ route('admin.shipments.temp.pdf.download', session('pdf_filename')) }}"
                                        target="_blank"
                                        class="w-full flex items-center justify-center px-4 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-xl transition-colors group">
                                        <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Télécharger le PDF
                                    </a>
                                @endif

                                {{-- Bouton WhatsApp unique pour l'expéditeur --}}
                                {{-- Bouton WhatsApp unique pour l'expéditeur --}}
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $shipment['user']['phone']) }}?text={{ rawurlencode(
                                    '*DIASPORA SHOPPING & FLY*
                                _Votre partenaire de confiance_

                                Bonjour *' .
                                        $shipment['user']['name'] .
                                        '*,

                                Votre expedition est confirmee avec succes !

                                *VOTRE COLIS*
                                ━━━━━━━━━━━━━━━━━━━━━━━━━━━
                                - Numero de suivi : *' .
                                        $shipment['package']['tracking'] .
                                        '*
                                - Montant : *' .
                                        number_format($shipment['package']['price'], 2) .
                                        ' EUR*
                                - Poids : *' .
                                        $shipment['package']['weight'] .
                                        ' kg*
                                - Destination : _' .
                                        str_replace("\n", ' ', $shipment['package']['destination']) .
                                        '_

                                *DESTINATAIRE*
                                ━━━━━━━━━━━━━━━━━━━━━━━━━━━
                                - Nom : *' .
                                        $shipment['recipient']['name'] .
                                        '*
                                - Contact : *' .
                                        $shipment['recipient']['phone'] .
                                        '*' .
                                        (isset($shipment['user']['password'])
                                            ? '

                                *VOTRE ESPACE CLIENT*
                                ━━━━━━━━━━━━━━━━━━━━━━━━━━━
                                - Site web : *' .
                                                url('/') .
                                                '*
                                - Email : *' .
                                                $shipment['user']['email'] .
                                                '*
                                - Mot de passe : *' .
                                                $shipment['user']['password'] .
                                                '*

                                _Connectez-vous pour suivre vos expeditions en temps reel._'
                                            : '

                                *VOTRE ESPACE CLIENT*
                                ━━━━━━━━━━━━━━━━━━━━━━━━━━━
                                - Site web : *' .
                                                url('/') .
                                                '*

                                _Connectez-vous avec vos identifiants habituels._') .
                                        '

                                *GARANTIES*
                                ━━━━━━━━━━━━━━━━━━━━━━━━━━━
                                ✓ Colis securise et tracable 24h/24
                                ✓ Notifications a chaque etape
                                ✓ Livraison rapide garantie

                                *IMPORTANT :* N\'oubliez pas d\'informer votre destinataire.

                                Merci de votre confiance,
                                *DIASPORA SHOPPING & FLY*',
                                ) }}"
                                    target="_blank"
                                    class="w-full flex items-center justify-center px-4 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-xl transition-colors group">
                                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106" />
                                    </svg>
                                    <span class="flex flex-col items-center">
                                        <span>Envoyer confirmation WhatsApp</span>
                                        <span class="text-xs opacity-75">{{ $shipment['user']['name'] }}</span>
                                    </span>
                                </a>

                                {{-- Bouton suivi --}}
                                {{-- <a href="{{ url('/tracking/' . $shipment['package']['tracking']) }}" target="_blank"
                                    class="w-full flex items-center justify-center px-4 py-3 bg-[#0077be] hover:bg-[#005c91] text-white font-medium rounded-xl transition-colors group">
                                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Suivre le Colis
                                </a> --}}

                                {{-- Bouton nouveau colis --}}
                                <a href="{{ route('admin.shipments.create-existing') }}"
                                    class="w-full flex items-center justify-center px-4 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-xl transition-colors group">
                                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Nouveau Colis
                                </a>
                            </div>
                        </div>

                        {{-- Informations de suivi --}}
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-green-600 to-green-700 p-4">
                                <h3 class="text-lg font-semibold text-white flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Étapes de Livraison
                                </h3>
                            </div>

                            <div class="p-4">
                                <div class="space-y-4">
                                    {{-- Étape 1 - Complétée --}}
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-white" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <h4 class="text-sm font-medium text-gray-900">Colis Enregistré</h4>
                                            <p class="text-xs text-gray-500 mt-1">{{ now()->format('d/m/Y à H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    {{-- Étape 2 - En cours --}}
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-white animate-spin" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <h4 class="text-sm font-medium text-gray-900">Préparation</h4>
                                            <p class="text-xs text-gray-500 mt-1">En cours de traitement</p>
                                        </div>
                                    </div>

                                    {{-- Étape 3 - À venir --}}
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-gray-500" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                                    <path
                                                        d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1V8a1 1 0 00-1-1h-3z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <h4 class="text-sm font-medium text-gray-500">En Transit</h4>
                                            <p class="text-xs text-gray-400 mt-1">2-5 jours ouvrés</p>
                                        </div>
                                    </div>

                                    {{-- Étape 4 - À venir --}}
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-gray-500" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.75 2.524 9.026 9.026 0 00-.3 1.573z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <h4 class="text-sm font-medium text-gray-500">Livré</h4>
                                            <p class="text-xs text-gray-400 mt-1">Destination finale</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Conseils utiles --}}
                        <div
                            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-200">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-[#0077be]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="text-sm font-medium text-[#0077be] mb-2">Conseils Utiles</h4>
                                    <ul class="text-xs text-gray-600 space-y-1">
                                        <li>• Conservez votre numéro de suivi</li>
                                        <li>• Notifiez le destinataire de l'envoi</li>
                                        <li>• Suivez l'évolution en temps réel</li>
                                        <li>• Contactez-nous en cas de problème</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Notification de succès flottante --}}
                <div id="success-notification"
                    class="fixed top-4 right-4 bg-white rounded-lg shadow-xl border-l-4 border-green-500 p-4 transform translate-x-full transition-transform duration-300 z-50">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Numéro copié !</p>
                        </div>
                        <div class="ml-auto pl-3">
                            <button onclick="hideNotification()" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @else
                {{-- Message d'erreur si pas de données --}}
                <div class="text-center py-12">
                    <div class="mx-auto w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Aucune donnée d'expédition</h3>
                    <p class="text-gray-600 mb-6">Les informations de l'expédition ne sont pas disponibles.</p>
                    <a href="{{ route('admin.shipments.create-existing') }}"
                        class="inline-flex items-center px-6 py-3 bg-[#0077be] hover:bg-[#005c91] text-white font-medium rounded-xl transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Créer un Nouveau Colis
                    </a>
                </div>
            @endif
        </div>
    </div>

    <style>
        /* Animations personnalisées */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .animate-slide-in {
            animation: slideIn 0.6s ease-out forwards;
        }

        .animate-pulse-gentle {
            animation: pulse 2s ease-in-out infinite;
        }

        /* Styles pour les boutons hover */
        .group:hover .group-hover\:scale-110 {
            transform: scale(1.1);
        }

        /* Responsive improvements */
        @media (max-width: 640px) {
            .text-3xl {
                font-size: 1.75rem;
            }

            .text-4xl {
                font-size: 2rem;
            }

            .grid-cols-1.md\:grid-cols-2 {
                gap: 1rem;
            }

            .space-y-6>*+* {
                margin-top: 1rem;
            }
        }

        /* Amélioration de l'accessibilité */
        .focus\:ring-2:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }

        /* Animation de chargement pour les boutons */
        .loading {
            position: relative;
            color: transparent;
        }

        .loading::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation d'entrée des cartes
            const cards = document.querySelectorAll('.bg-white');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('animate-slide-in');
                }, index * 100);
            });

            // Auto-hide de la notification après 3 secondes
            setTimeout(() => {
                hideNotification();
            }, 10000);
        });

        // Fonction pour copier le numéro de suivi
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                showNotification();
            }).catch(function(err) {
                console.error('Erreur lors de la copie: ', err);
                // Fallback pour les navigateurs plus anciens
                const textArea = document.createElement('textarea');
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                showNotification();
            });
        }

        // Afficher la notification de succès
        function showNotification() {
            const notification = document.getElementById('success-notification');
            notification.classList.remove('translate-x-full');
            notification.classList.add('translate-x-0');
        }

        // Masquer la notification
        function hideNotification() {
            const notification = document.getElementById('success-notification');
            notification.classList.remove('translate-x-0');
            notification.classList.add('translate-x-full');
        }

        // Amélioration de l'UX des boutons
        document.querySelectorAll('a[href]').forEach(link => {
            link.addEventListener('click', function(e) {
                // Ajouter un effet de chargement pour les liens externes
                if (this.target === '_blank') {
                    this.classList.add('loading');
                    setTimeout(() => {
                        this.classList.remove('loading');
                    }, 2000);
                }
            });
        });

        // Gestion de la responsive pour les très petits écrans
        function adjustForSmallScreens() {
            if (window.innerWidth < 375) {
                document.querySelectorAll('.text-lg').forEach(el => {
                    el.classList.remove('text-lg');
                    el.classList.add('text-base');
                });

                document.querySelectorAll('.px-6').forEach(el => {
                    el.classList.remove('px-6');
                    el.classList.add('px-4');
                });
            }
        }

        // Appliquer les ajustements au chargement et au redimensionnement
        adjustForSmallScreens();
        window.addEventListener('resize', adjustForSmallScreens);

        // Preloader pour les liens de téléchargement
        document.querySelectorAll('a[href*="pdf"]').forEach(link => {
            link.addEventListener('click', function() {
                const originalText = this.innerHTML;
                this.innerHTML = `
                    <svg class="w-5 h-5 mr-2 animate-spin" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                    </svg>
                    Génération du PDF...
                `;

                setTimeout(() => {
                    this.innerHTML = originalText;
                }, 3000);
            });
        });

        // Animation pour le numéro de suivi
        const trackingNumber = document.querySelector('.font-mono');
        if (trackingNumber) {
            trackingNumber.addEventListener('mouseenter', function() {
                this.classList.add('animate-pulse-gentle');
            });

            trackingNumber.addEventListener('mouseleave', function() {
                this.classList.remove('animate-pulse-gentle');
            });
        }
    </script>
</x-app-layout>
