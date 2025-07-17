<x-app-layout>
    <!-- Header Section -->
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-br from-[#0077be] via-[#005c91] to-[#004a7a] text-white rounded-3xl shadow-2xl">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-grid-white/[0.03] bg-[size:30px_30px]"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

            <!-- Content -->
            <div class="relative p-6 sm:p-8 lg:p-12">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                    <!-- Package Info -->
                    <div class="flex-1 animate-fade-in">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="flex-shrink-0 p-4 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                                <svg class="w-8 h-8 lg:w-10 lg:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold truncate">
                                    #{{ $package->tracking_number }}
                                </h1>
                                <p class="text-white/80 text-sm sm:text-base font-medium mt-1">
                                    Suivi de colis Diaspora Shopping & Fly
                                </p>
                            </div>
                        </div>

                        <!-- Status Badge -->
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full border border-white/20">
                            <div class="w-2 h-2 rounded-full bg-[#ffd700] animate-pulse"></div>
                            <span class="text-sm font-medium status-badge">{{ ucfirst($package->status) }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3 animate-fade-in">
                        <button onclick="history.back()"
                            class="group px-4 py-2.5 bg-white/10 hover:bg-white/20 backdrop-blur-sm rounded-xl border border-white/20 transition-all duration-300 flex items-center gap-2">
                            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span class="hidden sm:inline">Retour</span>
                        </button>

                        <!-- Bouton WhatsApp Client -->
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $package->user->phone) }}?text={{ rawurlencode(
                            '*DIASPORA SHOPPING & FLY*
_Votre partenaire de confiance_

Bonjour *' . $package->user->name . '*,

Vous demandez les informations de suivi de votre colis ?

*VOTRE COLIS*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Numero de suivi : *' . $package->tracking_number . '*
- Statut actuel : *' . ucfirst($package->status) . '*
- Poids : *' . $package->weight . ' kg*
- Prix : *' . number_format($package->price, 2) . ' EUR*

*DESTINATAIRE*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Nom : *' . $package->recipient->name . '*
- Contact : *' . $package->recipient->phone . '*
- Destination : _' . str_replace("\n", ' ', $package->destination_address) . '_

*SUIVI EN LIGNE*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
Suivez votre colis 24h/24 sur notre site :
*' . url('/tracking/' . $package->tracking_number) . '*

*VOTRE ESPACE CLIENT*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Site web : *' . url('/') . '*
- Email : *' . ($package->user->generated_email ?? $package->user->email) . '*

_Connectez-vous pour acceder a toutes vos expeditions._

*INFORMATIONS IMPORTANTES*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
✓ Colis securise et tracable 24h/24
✓ Notifications automatiques
✓ Support client disponible

Besoin d\'aide ? Repondez a ce message !

Merci de votre confiance,
*DIASPORA SHOPPING & FLY*') }}"
                            target="_blank"
                            class="group px-4 py-2.5 bg-[#25D366] hover:bg-[#128C7E] text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106" />
                            </svg>
                            <span class="hidden lg:inline">WhatsApp Client</span>
                        </a>

                        <button onclick="editPackage()"
                            class="group px-6 py-2.5 bg-[#28a745] hover:bg-[#218838] text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <span>Modifier</span>
                        </button>

                        <button onclick="shareTracking()"
                            class="group px-6 py-2.5 bg-[#ffd700] hover:bg-[#ffed4a] text-[#0077be] font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                            <span>Partager</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Main Content -->
    <div class="py-6 sm:py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-6 sm:space-y-8">

            <!-- Status Overview Card -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
                <div class="p-6 sm:p-8">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                        <!-- Status Info -->
                        <div class="flex items-center gap-6">
                            <div class="relative flex-shrink-0">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gradient-to-br from-[#0077be] to-[#005c91] flex items-center justify-center shadow-lg">
                                    @switch($package->status)
                                        @case('delivered')
                                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        @break

                                        @case('in_transit')
                                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        @break

                                        @default
                                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                    @endswitch
                                </div>
                                <div class="absolute -bottom-2 -right-2 w-6 h-6 rounded-full border-4 border-white bg-[#ffd700] flex items-center justify-center">
                                    <div class="w-2 h-2 rounded-full bg-[#0077be] animate-pulse"></div>
                                </div>
                            </div>

                            <div class="min-w-0 flex-1">
                                <h2 class="text-2xl sm:text-3xl font-bold text-[#0077be] mb-1">
                                    {{ ucfirst($package->status) }}
                                </h2>
                                <p class="text-gray-600 text-sm sm:text-base">
                                    Dernière mise à jour : {{ $package->updated_at->format('d/m/Y à H:i') }}
                                </p>
                            </div>
                        </div>

                        <!-- Package Metrics -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-2 gap-4">
                            <div class="bg-gradient-to-br from-[#0077be]/5 to-[#0077be]/10 rounded-2xl p-4 text-center transform hover:scale-105 transition-all duration-300">
                                <p class="text-xs sm:text-sm font-medium text-[#0077be]/70 mb-1">Poids</p>
                                <p class="text-xl sm:text-2xl font-bold text-[#0077be]">{{ $package->weight }} kg</p>
                            </div>
                            <div class="bg-gradient-to-br from-[#ffd700]/20 to-[#ffd700]/30 rounded-2xl p-4 text-center transform hover:scale-105 transition-all duration-300">
                                <p class="text-xs sm:text-sm font-medium text-[#0077be]/70 mb-1">Prix</p>
                                <p class="text-xl sm:text-2xl font-bold text-[#0077be]">{{ number_format($package->price, 2) }} €</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons Card -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <h3 class="flex items-center gap-3 text-lg font-semibold text-[#0077be] mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span>Actions Rapides</span>
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- WhatsApp Client -->
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $package->user->phone) }}?text={{ rawurlencode(
                            '*DIASPORA SHOPPING & FLY*
_Votre partenaire de confiance_

Bonjour *' . $package->user->name . '*,

Vous demandez les informations de suivi de votre colis ?

*VOTRE COLIS*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Numero de suivi : *' . $package->tracking_number . '*
- Statut actuel : *' . ucfirst($package->status) . '*
- Poids : *' . $package->weight . ' kg*
- Prix : *' . number_format($package->price, 2) . ' EUR*

*DESTINATAIRE*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Nom : *' . $package->recipient->name . '*
- Contact : *' . $package->recipient->phone . '*
- Destination : _' . str_replace("\n", ' ', $package->destination_address) . '_

*SUIVI EN LIGNE*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
Suivez votre colis 24h/24 sur notre site :
*' . url('/tracking/' . $package->tracking_number) . '*

*VOTRE ESPACE CLIENT*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Site web : *' . url('/') . '*
- Email : *' . $package->user->email . '*

_Connectez-vous pour acceder a toutes vos expeditions._

*INFORMATIONS IMPORTANTES*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
✓ Colis securise et tracable 24h/24
✓ Notifications automatiques
✓ Support client disponible

Besoin d\'aide ? Repondez a ce message !

Merci de votre confiance,
*DIASPORA SHOPPING & FLY*') }}"
                            target="_blank"
                            class="group p-4 bg-gradient-to-r from-[#25D366] to-[#128C7E] text-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold">Envoyer au Client</h4>
                                <p class="text-xs text-white/80">{{ $package->user->name }}</p>
                            </div>
                        </a>

                        <!-- WhatsApp Destinataire -->
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $package->recipient->phone) }}?text={{ rawurlencode(
                            '*DIASPORA SHOPPING & FLY*
_Votre partenaire de confiance_

Bonjour *' . $package->recipient->name . '*,

Un colis vous est destine !

*DETAILS DU COLIS*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Numero de suivi : *' . $package->tracking_number . '*
- Statut actuel : *' . ucfirst($package->status) . '*
- Expediteur : *' . $package->user->name . '*

*VOTRE LIVRAISON*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Adresse : _' . str_replace("\n", ' ', $package->destination_address) . '_

*SUIVI EN LIGNE*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
Suivez votre colis 24h/24 :
*' . url('/tracking/' . $package->tracking_number) . '*

*INFORMATIONS IMPORTANTES*
━━━━━━━━━━━━━━━━━━━━━━━━━━━
✓ Tenez-vous pret pour la reception
✓ Une piece d\'identite sera requise
✓ Notifications par SMS automatiques

Questions ? Repondez a ce message !

Cordialement,
*DIASPORA SHOPPING & FLY*') }}"
                            target="_blank"
                            class="group p-4 bg-gradient-to-r from-[#0077be] to-[#005c91] text-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold">Notifier Destinataire</h4>
                                <p class="text-xs text-white/80">{{ $package->recipient->name }}</p>
                            </div>
                        </a>

                        <!-- Copier lien de suivi -->
                        <button onclick="copyTrackingLink()"
                            class="group p-4 bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center gap-3">
                            <div class="w-12 h-12 bg-[#0077be]/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-[#0077be] group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold">Copier Lien</h4>
                                <p class="text-xs text-gray-500">Suivi Public</p>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Information Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">

                <!-- Package Media Section -->
                <div class="lg:col-span-1 xl:col-span-1">
                    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden h-full transform hover:shadow-2xl transition-all duration-300">
                        <div class="p-6">
                            <h3 class="flex items-center gap-3 text-lg sm:text-xl font-semibold text-[#0077be] mb-6">
                                <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Contenu du colis</span>
                                @if ($package->hasMedia())
                                    <span class="text-xs bg-[#0077be]/10 text-[#0077be] px-2 py-1 rounded-full">
                                        {{ $package->getMediaCount()['total'] }} fichier(s)
                                    </span>
                                @endif
                            </h3>

                            <!-- Media Display Area -->
                            <div class="space-y-4">
                                @if ($package->hasMedia())
                                    <!-- Galerie d'images -->
                                    @if (!empty($package->images))
                                        <div class="space-y-3">
                                            <h4 class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Images ({{ count($package->images) }})
                                            </h4>
                                            <div class="grid grid-cols-2 gap-3">
                                                @foreach ($package->getImageUrls() as $index => $imageUrl)
                                                    <div class="aspect-square rounded-2xl overflow-hidden bg-gray-100 border-2 border-gray-200 group cursor-pointer hover:border-[#0077be]/50 transition-all duration-300 media-item transform hover:scale-105"
                                                        onclick="showImageModal('{{ $imageUrl }}', 'Image du colis {{ $index + 1 }}')">
                                                        <img src="{{ $imageUrl }}"
                                                            alt="Image du colis {{ $index + 1 }}"
                                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                                            loading="lazy">
                                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300 flex items-center justify-center">
                                                            <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity"
                                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Galerie de vidéos -->
                                    @if (!empty($package->videos))
                                        <div class="space-y-3">
                                            <h4 class="text-sm font-medium text-gray-700 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                </svg>
                                                Vidéos ({{ count($package->videos) }})
                                            </h4>
                                            <div class="space-y-3">
                                                @foreach ($package->getVideoUrls() as $index => $videoUrl)
                                                    <div class="aspect-video rounded-2xl overflow-hidden bg-gray-100 border-2 border-gray-200 group media-item transform hover:scale-105 transition-all duration-300">
                                                        <video src="{{ $videoUrl }}"
                                                            class="w-full h-full object-cover" controls
                                                            preload="metadata" poster="">
                                                            Votre navigateur ne supporte pas la lecture de vidéos.
                                                        </video>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <!-- Placeholder when no media -->
                                    <div class="aspect-square rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-dashed border-gray-200 flex items-center justify-center group hover:border-[#0077be]/30 transition-colors">
                                        <div class="text-center p-6">
                                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-3 group-hover:text-[#0077be]/50 transition-colors"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p class="text-sm text-gray-500 font-medium">Aucun média disponible</p>
                                            <p class="text-xs text-gray-400 mt-1">Photos/vidéos du contenu du colis</p>
                                        </div>
                                    </div>
                                @endif

                                <!-- Package Description -->
                                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-4 transform hover:scale-105 transition-all duration-300">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Description
                                    </h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        {{ $package->description_colis ?? 'Aucune description disponible' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sender Information -->
                <div class="lg:col-span-1 xl:col-span-1">
                    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden h-full transform hover:shadow-2xl transition-all duration-300">
                        <div class="p-6">
                            <h3 class="flex items-center gap-3 text-lg sm:text-xl font-semibold text-[#0077be] mb-6">
                                <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Expéditeur</span>
                            </h3>

                            <div class="space-y-4">
                                <div class="flex items-center gap-3 p-3 bg-gradient-to-r from-[#0077be]/5 to-transparent rounded-xl transform hover:scale-105 transition-all duration-300">
                                    <div class="w-10 h-10 bg-[#0077be]/10 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-xs text-gray-500 font-medium">Nom complet</p>
                                        <p class="text-sm font-semibold text-gray-800 truncate">{{ $package->user->name }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-gradient-to-r from-[#0077be]/5 to-transparent rounded-xl transform hover:scale-105 transition-all duration-300">
                                    <div class="w-10 h-10 bg-[#0077be]/10 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-xs text-gray-500 font-medium">Téléphone</p>
                                        <p class="text-sm font-semibold text-gray-800">{{ $package->user->phone }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-gradient-to-r from-[#0077be]/5 to-transparent rounded-xl transform hover:scale-105 transition-all duration-300">
                                    <div class="w-10 h-10 bg-[#0077be]/10 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-xs text-gray-500 font-medium">Email</p>
                                        <p class="text-sm font-semibold text-gray-800 truncate">
                                            {{ $package->user->generated_email ?? $package->user->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recipient Information -->
                <div class="lg:col-span-1 xl:col-span-1">
                    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden h-full transform hover:shadow-2xl transition-all duration-300">
                        <div class="p-6">
                            <h3 class="flex items-center gap-3 text-lg sm:text-xl font-semibold text-[#0077be] mb-6">
                                <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Destinataire</span>
                            </h3>

                            <div class="space-y-4">
                                <div class="flex items-center gap-3 p-3 bg-gradient-to-r from-[#ffd700]/20 to-transparent rounded-xl transform hover:scale-105 transition-all duration-300">
                                    <div class="w-10 h-10 bg-[#ffd700]/30 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-xs text-gray-500 font-medium">Nom complet</p>
                                        <p class="text-sm font-semibold text-gray-800 truncate">{{ $package->recipient->name }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-gradient-to-r from-[#ffd700]/20 to-transparent rounded-xl transform hover:scale-105 transition-all duration-300">
                                    <div class="w-10 h-10 bg-[#ffd700]/30 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-xs text-gray-500 font-medium">Téléphone</p>
                                        <p class="text-sm font-semibold text-gray-800">{{ $package->recipient->phone }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-gradient-to-r from-[#ffd700]/20 to-transparent rounded-xl transform hover:scale-105 transition-all duration-300">
                                    <div class="w-10 h-10 bg-[#ffd700]/30 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-xs text-gray-500 font-medium">Adresse de livraison</p>
                                        <p class="text-sm font-semibold text-gray-800 leading-relaxed">{{ $package->destination_address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Package Details -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden transform hover:shadow-2xl transition-all duration-300">
                <div class="p-6 sm:p-8">
                    <h3 class="flex items-center gap-3 text-xl font-semibold text-[#0077be] mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>Informations détaillées</span>
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                        <div class="bg-gradient-to-br from-[#0077be]/5 to-[#0077be]/10 rounded-2xl p-4 sm:p-6 transform hover:scale-105 transition-all duration-300">
                            <div class="flex items-center gap-3 mb-3">
                                <svg class="w-6 h-6 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16l3-1m-3 1l-3-1" />
                                </svg>
                                <h4 class="font-semibold text-gray-700">Poids</h4>
                            </div>
                            <p class="text-2xl font-bold text-[#0077be]">{{ $package->weight }} kg</p>
                        </div>

                        <div class="bg-gradient-to-br from-[#ffd700]/20 to-[#ffd700]/30 rounded-2xl p-4 sm:p-6 transform hover:scale-105 transition-all duration-300">
                            <div class="flex items-center gap-3 mb-3">
                                <svg class="w-6 h-6 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h4 class="font-semibold text-gray-700">Prix</h4>
                            </div>
                            <p class="text-2xl font-bold text-[#0077be]">{{ number_format($package->price, 2) }} €</p>
                        </div>

                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-4 sm:p-6 transform hover:scale-105 transition-all duration-300">
                            <div class="flex items-center gap-3 mb-3">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <h4 class="font-semibold text-gray-700">Créé le</h4>
                            </div>
                            <p class="text-lg font-bold text-green-600">{{ $package->created_at->format('d/m/Y') }}</p>
                            <p class="text-sm text-gray-500">{{ $package->created_at->format('H:i') }}</p>
                        </div>

                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-4 sm:p-6 transform hover:scale-105 transition-all duration-300">
                            <div class="flex items-center gap-3 mb-3">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                <h4 class="font-semibold text-gray-700">Statut</h4>
                            </div>
                            <p class="text-lg font-bold text-purple-600">{{ ucfirst($package->status) }}</p>
                            <p class="text-sm text-gray-500">Actuel</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .bg-grid-white {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='1' height='1' fill='white' opacity='0.1'/%3E%3C/svg%3E");
        }

        /* Smooth animations */
        .media-item {
            position: relative;
            overflow: hidden;
        }

        .media-item img,
        .media-item video {
            transition: transform 0.3s ease;
        }

        /* Loading states */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid #0077be;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Hover effects */
        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Focus states for accessibility */
        button:focus {
            outline: 2px solid #0077be;
            outline-offset: 2px;
        }

        /* Print styles */
        @media print {
            .print-hide {
                display: none !important;
            }

            body * {
                visibility: hidden;
            }

            .print-show,
            .print-show * {
                visibility: visible;
            }

            .print-show {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }

        /* Mobile optimizations */
        @media (max-width: 640px) {
            .grid-cols-2 {
                grid-template-columns: 1fr;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Modal overlay */
        .modal-overlay {
            backdrop-filter: blur(10px);
            animation: fadeIn 0.3s ease-out;
        }

        /* Responsive video */
        video {
            max-width: 100%;
            height: auto;
        }
    </style>

    <!-- JavaScript -->
    <script>
        // Edit package function
        function editPackage() {
            // Redirect to edit page
            window.location.href = '/admin/packages/{{ $package->id }}/edit';
        }

        // Share tracking function
        function shareTracking() {
            const trackingLink = window.location.origin + '/tracking/' + '{{ $package->tracking_number }}';
            const packageInfo = {
                title: 'Suivi de colis Diaspora Shopping & Fly #{{ $package->tracking_number }}',
                text: 'Suivez votre colis Diaspora Shopping & Fly en temps réel',
                url: trackingLink,
            };

            if (navigator.share && /mobile/i.test(navigator.userAgent)) {
                navigator.share(packageInfo).catch(console.error);
            } else {
                navigator.clipboard.writeText(trackingLink).then(() => {
                    showNotification('Lien de suivi copié dans le presse-papier !', 'success');
                }).catch(() => {
                    const textArea = document.createElement('textarea');
                    textArea.value = trackingLink;
                    document.body.appendChild(textArea);
                    textArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textArea);
                    showNotification('Lien de suivi copié !', 'success');
                });
            }
        }

        // Copy tracking link function
        function copyTrackingLink() {
            const trackingLink = window.location.origin + '/tracking/' + '{{ $package->tracking_number }}';

            navigator.clipboard.writeText(trackingLink).then(() => {
                showNotification('Lien de suivi copié dans le presse-papier !', 'success');
            }).catch(() => {
                const textArea = document.createElement('textarea');
                textArea.value = trackingLink;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                showNotification('Lien de suivi copié !', 'success');
            });
        }

        // Image modal function
        function showImageModal(src, alt) {
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm modal-overlay';
            modal.innerHTML = `
                <div class="relative max-w-4xl max-h-[90vh] p-4 w-full">
                    <div class="relative bg-white rounded-2xl overflow-hidden shadow-2xl">
                        <img src="${src}" alt="${alt}" class="w-full h-auto max-h-[80vh] object-contain">
                        <button onclick="this.closest('.modal-overlay').remove()"
                                class="absolute top-4 right-4 w-10 h-10 bg-black/50 hover:bg-black/70 rounded-full flex items-center justify-center text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        <div class="absolute bottom-4 left-4 bg-black/70 text-white px-3 py-2 rounded-lg">
                            <p class="text-sm font-medium">${alt}</p>
                        </div>
                    </div>
                </div>
            `;

            document.body.appendChild(modal);

            // Close on click outside
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.remove();
                }
            });

            // Close on escape key
            document.addEventListener('keydown', function escapeHandler(e) {
                if (e.key === 'Escape') {
                    modal.remove();
                    document.removeEventListener('keydown', escapeHandler);
                }
            });
        }

        // Notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-2xl shadow-lg transform translate-x-full transition-transform duration-300 max-w-sm ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                'bg-[#0077be] text-white'
            }`;
            notification.innerHTML = `
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        ${type === 'success' ?
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>' :
                            type === 'error' ?
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>' :
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>'
                        }
                    </svg>
                    <span class="font-medium">${message}</span>
                    <button onclick="this.closest('.fixed').remove()" class="ml-2 hover:opacity-70">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            `;

            document.body.appendChild(notification);

            // Show notification
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);

            // Hide notification after 5 seconds
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.remove();
                        }
                    }, 300);
                }
            }, 5000);
        }

        // Page initialization
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.animate-fade-in');
            elements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });

            // Lazy loading for images
            const images = document.querySelectorAll('img[loading="lazy"]');
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.classList.add('loading');

                        img.onload = () => {
                            img.classList.remove('loading');
                        };

                        img.onerror = () => {
                            img.classList.remove('loading');
                            img.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTIxIDVIMTdMMTUgM0g5TDcgNUgzQzEuOSA1IDEgNS45IDEgN1YxOUMxIDIwLjEgMS45IDIxIDMgMjFIMjFDMjIuMSAyMSAyMyAyMC4xIDIzIDE5VjdDMjMgNS45IDIyLjEgNSAyMSA1Wk0xMiAxN0M5LjI0IDE3IDcgMTQuNzYgNyAxMkM3IDkuMjQgOS4yNCA3IDEyIDdDMTQuNzYgNyAxNyA5LjI0IDE3IDEyQzE3IDE0Ljc2IDE0Ljc2IDE3IDEyIDE3Wk0xMiA5QzEwLjM0IDkgOSAxMC4zNCA5IDEyQzkgMTMuNjYgMTAuMzQgMTUgMTIgMTVDMTMuNjYgMTUgMTUgMTMuNjYgMTUgMTJDMTUgMTAuMzQgMTMuNjYgOSAxMiA5WiIgZmlsbD0iIzlDQTNBRiIvPgo8L3N2Zz4K';
                        };

                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));

            // Video optimization
            const videos = document.querySelectorAll('video');
            videos.forEach(video => {
                video.addEventListener('loadstart', () => {
                    video.closest('.media-item')?.classList.add('loading');
                });

                video.addEventListener('canplay', () => {
                    video.closest('.media-item')?.classList.remove('loading');
                });

                video.addEventListener('error', () => {
                    video.closest('.media-item')?.classList.remove('loading');
                    showNotification('Erreur lors du chargement de la vidéo', 'error');
                });
            });

            // Auto-refresh tracking status every 30 seconds (if package is not delivered)
            @if ($package->status !== 'delivered')
                const autoRefresh = setInterval(() => {
                    fetch(window.location.href, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            const newStatus = doc.querySelector('.status-badge')?.textContent?.trim();
                            const currentStatus = document.querySelector('.status-badge')?.textContent?.trim();

                            if (newStatus && newStatus !== currentStatus) {
                                showNotification('Statut du colis mis à jour !', 'success');
                                setTimeout(() => {
                                    window.location.reload();
                                }, 2000);
                            }
                        })
                        .catch(error => {
                            console.log('Auto-refresh failed:', error);
                        });
                }, 30000);
            @endif

            // Show initial notification if package just delivered
            @if ($package->status === 'delivered' && session('just_delivered'))
                showNotification('🎉 Votre colis a été livré avec succès !', 'success');
            @endif
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (document.querySelector('.modal-overlay')) {
                if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
                    e.preventDefault();
                    // Image gallery navigation could be implemented here
                }
            }
        });

        // Error handling for network issues
        window.addEventListener('online', () => {
            showNotification('Connexion rétablie', 'success');
        });

        window.addEventListener('offline', () => {
            showNotification('Connexion perdue. Certaines fonctionnalités peuvent être limitées.', 'error');
        });
    </script>
</x-app-layout>
