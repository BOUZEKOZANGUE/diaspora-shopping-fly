<x-app-layout>
    <!-- Header avec design amélioré -->
    <x-slot name="header">
        <div class="relative bg-gradient-to-r from-[#0077be] to-[#005c91] overflow-hidden">
            {{-- Navigation supérieure - Améliorée pour mobile --}}
            <div class="absolute top-0 left-0 right-0 h-16 bg-black/10 backdrop-blur-sm z-10">
                <div class="max-w-7xl mx-auto px-4 h-full">
                    <div class="flex items-center justify-between h-full">
                        {{-- Bouton retour avec animation améliorée --}}
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-3 py-1.5 text-sm text-white hover:bg-white/20 rounded-lg transition-all duration-300 group">
                            <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span class="hidden sm:inline">Retour aux expéditions</span>
                        </a>

                        {{-- Indicateur de livraison express --}}
                        <div class="flex items-center px-3 py-1.5 bg-[#FFD700]/20 text-[#FFD700] rounded-full">
                            <svg class="w-4 h-4 mr-1 sm:mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <span class="text-xs sm:text-sm">Express 5-7j</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contenu principal du header --}}
            <div class="pt-20 pb-16 sm:pt-24 sm:pb-20 px-4 max-w-7xl mx-auto">
                <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    {{-- Section titre et description --}}
                    <div class="flex items-center space-x-4">
                        <div
                            class="p-3 sm:p-4 bg-gradient-to-br from-white/20 to-white/5 backdrop-blur-xl rounded-2xl shadow-xl border border-white/10">
                            <svg class="w-10 h-10 sm:w-14 sm:h-14 text-white" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white">
                                {{ __('Nouveau Client + Colis') }}</h1>
                            <p class="mt-1 sm:mt-2 text-sm sm:text-base md:text-lg text-white/80">Création d'un nouveau
                                client et son expédition</p>
                        </div>
                    </div>

                    {{-- Tags informatifs --}}
                    <div class="flex space-x-3 sm:space-x-4 mt-2 sm:mt-0">
                        <div
                            class="px-3 py-1.5 sm:px-4 sm:py-2 bg-white/10 backdrop-blur-lg rounded-xl flex items-center space-x-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#FFD700]" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z" />
                                <path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                            </svg>
                            <span class="text-xs sm:text-sm text-white font-medium">Express 5-7j</span>
                        </div>
                        <div
                            class="px-3 py-1.5 sm:px-4 sm:py-2 bg-[#FFD700]/20 backdrop-blur-lg rounded-xl flex items-center space-x-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#FFD700]" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                            </svg>
                            <span class="text-xs sm:text-sm text-[#FFD700] font-medium">Assurance</span>
                        </div>
                    </div>
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
                    class="absolute top-20 right-0 w-48 h-48 sm:w-72 sm:h-72 bg-[#FFD700]/10 rounded-full filter blur-3xl">
                </div>
                <div
                    class="absolute bottom-0 left-1/4 w-32 h-32 sm:w-48 sm:h-48 bg-blue-400/10 rounded-full filter blur-2xl">
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Progress indicator for form -->
            <div class="mb-8 relative hidden sm:block">
                <div class="h-1 bg-gray-200 rounded-full overflow-hidden">
                    <div class="w-0 h-full bg-[#0077be] transition-all duration-500" id="progress-bar"></div>
                </div>
                <div class="mt-4 grid grid-cols-4 gap-2">
                    <div class="progress-step active" data-step="1">
                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be] text-white">
                                <i class="fas fa-user text-sm"></i>
                            </div>
                            <span class="mt-2 text-xs text-[#0077be] font-medium">Expéditeur</span>
                        </div>
                    </div>
                    <div class="progress-step" data-step="2">
                        <div class="flex flex-col items-center">
                            <div
                                class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-200 text-gray-500">
                                <i class="fas fa-user-check text-sm"></i>
                            </div>
                            <span class="mt-2 text-xs text-gray-500 font-medium">Destinataire</span>
                        </div>
                    </div>
                    <div class="progress-step" data-step="3">
                        <div class="flex flex-col items-center">
                            <div
                                class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-200 text-gray-500">
                                <i class="fas fa-box text-sm"></i>
                            </div>
                            <span class="mt-2 text-xs text-gray-500 font-medium">Détails</span>
                        </div>
                    </div>
                    <div class="progress-step" data-step="4">
                        <div class="flex flex-col items-center">
                            <div
                                class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-200 text-gray-500">
                                <i class="fas fa-map-marker-alt text-sm"></i>
                            </div>
                            <span class="mt-2 text-xs text-gray-500 font-medium">Destination</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <!-- Form avec navigation multi-étapes -->
                        <form action="{{ route('admin.shipments.store') }}" method="POST" class="space-y-5"
                            enctype="multipart/form-data" id="shipping-form">
                            @csrf

                            <!-- Navigation par onglets pour mobile -->
                            <div class="sm:hidden border-b border-gray-200 bg-gray-50">
                                <div class="flex overflow-x-auto hide-scrollbar" id="mobile-tabs">
                                    <button type="button"
                                        class="step-tab active whitespace-nowrap py-3 px-4 border-b-2 border-[#0077be] font-medium text-[#0077be] text-sm"
                                        data-step="1">
                                        <i class="fas fa-user mr-1"></i> Expéditeur
                                    </button>
                                    <button type="button"
                                        class="step-tab whitespace-nowrap py-3 px-4 border-b-2 border-transparent font-medium text-gray-500 text-sm"
                                        data-step="2">
                                        <i class="fas fa-user-check mr-1"></i> Destinataire
                                    </button>
                                    <button type="button"
                                        class="step-tab whitespace-nowrap py-3 px-4 border-b-2 border-transparent font-medium text-gray-500 text-sm"
                                        data-step="3">
                                        <i class="fas fa-box mr-1"></i> Colis
                                    </button>
                                    <button type="button"
                                        class="step-tab whitespace-nowrap py-3 px-4 border-b-2 border-transparent font-medium text-gray-500 text-sm"
                                        data-step="4">
                                        <i class="fas fa-map-marker-alt mr-1"></i> Destination
                                    </button>
                                </div>
                            </div>
                            <!-- Étapes du formulaire -->
                            <div class="p-6 space-y-6">
                                <!-- Étape 1: Informations Expéditeur -->
                                <div class="form-step active" data-step="1">
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-lg font-semibold text-[#0077be]">
                                                <i class="fas fa-user mr-2"></i>
                                                Informations Expéditeur
                                            </h3>
                                            <span class="hidden sm:flex items-center text-xs text-[#0077be]">
                                                <i class="fas fa-info-circle mr-1"></i>
                                                Étape 1/4
                                            </span>
                                        </div>

                                        {{-- // Message d'information --}}
                                        <div class="p-4 bg-blue-50 rounded-xl text-sm text-blue-800 mb-4">
                                            <div class="flex items-start">
                                                <i class="fas fa-info-circle mt-0.5 mr-2"></i>
                                                <div>
                                                    <p class="font-medium mb-1">Informations importantes :</p>
                                                    <ul class="list-disc ml-4 space-y-1">
                                                        <li>Le numéro de téléphone doit être au format international
                                                            pour WhatsApp (ex: +33612345678)</li>
                                                        <li>Un email DSF sera automatiquement généré pour le client</li>
                                                        <li>L'email de notification vous permettra de recevoir une copie
                                                            des informations</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ✅ NOUVEAU : Section d'alerte pour les doublons -->
                                        @if ($errors->has('phone') && str_contains($errors->first('phone'), 'déjà utilisé'))
                                            <div
                                                class="p-4 bg-red-50 border border-red-200 rounded-xl text-sm text-red-800 mb-4">
                                                <div class="flex items-start">
                                                    <i
                                                        class="fas fa-exclamation-triangle mt-0.5 mr-2 text-red-500"></i>
                                                    <div>
                                                        <p class="font-medium mb-1">Client existant détecté !</p>
                                                        <p>{{ $errors->first('phone') }}</p>
                                                        <a href="{{ route('admin.shipments.create-existing') }}"
                                                            class="inline-flex items-center mt-2 px-3 py-1.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-xs">
                                                            <i class="fas fa-arrow-right mr-1"></i>
                                                            Utiliser le formulaire "Client existant"
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($errors->has('notification_email') && str_contains($errors->first('notification_email'), 'déjà utilisé'))
                                            <div
                                                class="p-4 bg-red-50 border border-red-200 rounded-xl text-sm text-red-800 mb-4">
                                                <div class="flex items-start">
                                                    <i
                                                        class="fas fa-exclamation-triangle mt-0.5 mr-2 text-red-500"></i>
                                                    <div>
                                                        <p class="font-medium mb-1">Email déjà utilisé !</p>
                                                        <p>{{ $errors->first('notification_email') }}</p>
                                                        <a href="{{ route('admin.shipments.create-existing') }}"
                                                            class="inline-flex items-center mt-2 px-3 py-1.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-xs">
                                                            <i class="fas fa-arrow-right mr-1"></i>
                                                            Utiliser le formulaire "Client existant"
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($errors->has('duplicate_user'))
                                            <div
                                                class="p-4 bg-orange-50 border border-orange-200 rounded-xl text-sm text-orange-800 mb-4">
                                                <div class="flex items-start">
                                                    <i class="fas fa-user-check mt-0.5 mr-2 text-orange-500"></i>
                                                    <div>
                                                        <p class="font-medium mb-1">Attention !</p>
                                                        <p>{{ $errors->first('duplicate_user') }}</p>
                                                        <a href="{{ route('admin.shipments.create-existing') }}"
                                                            class="inline-flex items-center mt-2 px-3 py-1.5 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors text-xs">
                                                            <i class="fas fa-search mr-1"></i>
                                                            Rechercher le client existant
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- ✅ FIN de la section d'alerte -->

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <!-- Nom complet -->
                                            <div class="md:col-span-2">
                                                <label for="sender_name"
                                                    class="block text-sm font-medium text-gray-700">Nom complet de
                                                    l'expéditeur <span class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-user-circle text-gray-400"></i>
                                                    </div>
                                                    <input type="text" id="sender_name" name="sender_name"
                                                        required value="{{ old('sender_name') }}"
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="Jean Dupont">
                                                </div>
                                                @error('sender_name')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Téléphone WhatsApp -->
                                            <div>
                                                <label for="phone"
                                                    class="block text-sm font-medium text-gray-700">Téléphone WhatsApp
                                                    <span class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fab fa-whatsapp text-green-500"></i>
                                                    </div>
                                                    <input type="tel" id="phone" name="phone" required
                                                        value="{{ old('phone') }}"
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="+33612345678"
                                                        pattern="^\+[0-9]{1,3}[0-9]{6,14}$">
                                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                                        id="phone-validation">
                                                        <!-- Validation dynamique par JS -->
                                                    </div>
                                                </div>
                                                <p class="mt-1 text-xs text-gray-500">Format: +33612345678 (avec code
                                                    pays)</p>
                                                @error('phone')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Email de notification (optionnel) -->
                                            <div>
                                                <label for="notification_email"
                                                    class="block text-sm font-medium text-gray-700">Email de
                                                    notification
                                                    <span class="text-gray-500">(optionnel)</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-envelope text-gray-400"></i>
                                                    </div>
                                                    <input type="email" id="notification_email"
                                                        name="notification_email"
                                                        value="{{ old('notification_email') }}"
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="jean.dupont@example.com">
                                                </div>
                                                <p class="mt-1 text-xs text-gray-500">Recevra une copie des
                                                    informations du colis</p>
                                                @error('notification_email')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Boutons de navigation -->
                                    <div class="mt-8 flex justify-end">
                                        <button type="button"
                                            class="next-step px-5 py-2.5 bg-[#0077be] hover:bg-[#005c91] text-white font-medium rounded-xl transition-colors duration-200 flex items-center">
                                            Suivant
                                            <i class="fas fa-arrow-right ml-2"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Étape 2: Informations Destinataire -->
                                <div class="form-step" data-step="2">
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-lg font-semibold text-[#0077be]">
                                                <i class="fas fa-user-check mr-2"></i>
                                                Informations Destinataire
                                            </h3>
                                            <span class="hidden sm:flex items-center text-xs text-[#0077be]">
                                                <i class="fas fa-info-circle mr-1"></i>
                                                Étape 2/4
                                            </span>
                                        </div>

                                        <div class="p-4 bg-blue-50 rounded-xl text-sm text-blue-800 mb-4">
                                            <div class="flex items-start">
                                                <i class="fas fa-info-circle mt-0.5 mr-2"></i>
                                                <p>Le destinataire recevra une notification WhatsApp et par email (si
                                                    fourni) avec le numéro de suivi.</p>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label for="recipient_name"
                                                    class="block text-sm font-medium text-gray-700">Nom complet du
                                                    destinataire <span class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-user-circle text-gray-400"></i>
                                                    </div>
                                                    <input type="text" id="recipient_name" name="recipient_name"
                                                        required value="{{ old('recipient_name') }}"
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="Marie Martin">
                                                </div>
                                                @error('recipient_name')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="recipient_phone"
                                                    class="block text-sm font-medium text-gray-700">Téléphone WhatsApp
                                                    <span class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fab fa-whatsapp text-green-500"></i>
                                                    </div>
                                                    <input type="tel" id="recipient_phone" name="recipient_phone"
                                                        required value="{{ old('recipient_phone') }}"
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="+33612345678"
                                                        pattern="^\+[0-9]{1,3}[0-9]{6,14}$">
                                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                                        id="recipient-phone-validation">
                                                        <!-- Validation dynamique par JS -->
                                                    </div>
                                                </div>
                                                <p class="mt-1 text-xs text-gray-500">Format: +33612345678 (avec code
                                                    pays)</p>
                                                @error('recipient_phone')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="md:col-span-2">
                                                <label for="recipient_email"
                                                    class="block text-sm font-medium text-gray-700">Email destinataire
                                                    <span class="text-gray-500">(optionnel)</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-envelope text-gray-400"></i>
                                                    </div>
                                                    <input type="email" name="recipient_email" id="recipient_email"
                                                        value="{{ old('recipient_email') }}"
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="marie.martin@example.com">
                                                </div>
                                                <p class="mt-1 text-xs text-gray-500">Le destinataire recevra une
                                                    notification par email</p>
                                                @error('recipient_email')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Boutons de navigation -->
                                    <div class="mt-8 flex justify-between">
                                        <button type="button"
                                            class="prev-step px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-xl transition-colors duration-200 flex items-center">
                                            <i class="fas fa-arrow-left mr-2"></i>
                                            Précédent
                                        </button>
                                        <button type="button"
                                            class="next-step px-5 py-2.5 bg-[#0077be] hover:bg-[#005c91] text-white font-medium rounded-xl transition-colors duration-200 flex items-center">
                                            Suivant
                                            <i class="fas fa-arrow-right ml-2"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Étape 3: Détails du Colis AVEC CAMÉRA -->
                                <div class="form-step" data-step="3">
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-lg font-semibold text-[#0077be]">
                                                <i class="fas fa-box mr-2"></i>
                                                Détails du Colis
                                            </h3>
                                            <span class="hidden sm:flex items-center text-xs text-[#0077be]">
                                                <i class="fas fa-info-circle mr-1"></i>
                                                Étape 3/4
                                            </span>
                                        </div>

                                        <div class="p-4 bg-orange-50 rounded-xl text-sm text-orange-800 mb-4">
                                            <div class="flex items-start">
                                                <i class="fas fa-exclamation-triangle mt-0.5 mr-2"></i>
                                                <p><strong>Important :</strong> Au moins une image ou une vidéo du colis
                                                    est obligatoire pour la création.</p>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <!-- Poids avec calculateur -->
                                            <div>
                                                <label for="weight"
                                                    class="block text-sm font-medium text-gray-700">Poids réel (kg)
                                                    <span class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-weight-hanging text-gray-400"></i>
                                                    </div>
                                                    <input type="number" step="0.1" min="0.1"
                                                        id="weight" name="weight" required
                                                        value="{{ old('weight') }}"
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="5.0">
                                                    <div
                                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                        <span class="text-gray-500 text-sm">kg</span>
                                                    </div>
                                                </div>
                                                <!-- Affichage du poids facturé -->
                                                <div id="billed-weight-display" class="mt-2 hidden">
                                                    <div class="p-2 bg-blue-50 rounded-lg border border-blue-200">
                                                        <div class="flex items-center justify-between text-sm">
                                                            <span class="text-blue-700">Poids facturé :</span>
                                                            <span class="font-semibold text-blue-800"
                                                                id="billed-weight-value">0 kg</span>
                                                        </div>
                                                        <p class="text-xs text-blue-600 mt-1">Calculé selon notre
                                                            barème de transport</p>
                                                    </div>
                                                </div>
                                                @error('weight')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="price"
                                                    class="block text-sm font-medium text-gray-700">Prix (€) <span
                                                        class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-euro-sign text-gray-400"></i>
                                                    </div>
                                                    <input type="number" step="0.01" min="0.01"
                                                        id="price" name="price" required
                                                        value="{{ old('price') }}"
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="49.99">
                                                    <div
                                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                        <span class="text-gray-500 text-sm">€</span>
                                                    </div>
                                                </div>
                                                @error('price')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="md:col-span-2">
                                                <label for="description_colis"
                                                    class="block text-sm font-medium text-gray-700">Description du
                                                    colis <span class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <textarea id="description_colis" name="description_colis" rows="3" required maxlength="500"
                                                        class="w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="Décrivez le contenu du colis...">{{ old('description_colis') }}</textarea>
                                                </div>
                                                <div class="flex justify-between mt-1">
                                                    <p class="text-xs text-gray-500">Soyez précis pour faciliter le
                                                        dédouanement</p>
                                                    <span id="char-count" class="text-xs text-gray-500">0/500</span>
                                                </div>
                                                @error('description_colis')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Section Médias AMÉLIORÉE avec caméra -->
                                            <div class="md:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700 mb-4">
                                                    <i class="fas fa-camera mr-2 text-[#0077be]"></i>
                                                    Photos et Vidéos du colis <span class="text-red-500">*</span>
                                                </label>

                                                <!-- Zone de médias avec drag & drop améliorée -->
                                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 bg-gray-50 hover:bg-gray-100 transition-colors duration-200 media-required"
                                                    id="media-drop-zone">
                                                    <div class="text-center">
                                                        <i
                                                            class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                                        <p class="text-sm text-gray-600 mb-4">Glissez-déposez vos
                                                            fichiers ici ou utilisez les boutons ci-dessous</p>

                                                        <!-- Boutons d'action médias -->
                                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                                                            <button type="button" id="take-photo-btn"
                                                                class="flex flex-col items-center p-3 bg-[#0077be] text-white rounded-lg hover:bg-[#005c91] transition-colors">
                                                                <i class="fas fa-camera text-lg mb-1"></i>
                                                                <span class="text-xs">Prendre Photo</span>
                                                            </button>

                                                            <button type="button" id="record-video-btn"
                                                                class="flex flex-col items-center p-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                                                                <i class="fas fa-video text-lg mb-1"></i>
                                                                <span class="text-xs">Filmer</span>
                                                            </button>

                                                            <button type="button" id="select-images-btn"
                                                                class="flex flex-col items-center p-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                                                                <i class="fas fa-image text-lg mb-1"></i>
                                                                <span class="text-xs">Choisir Images</span>
                                                            </button>

                                                            <button type="button" id="select-videos-btn"
                                                                class="flex flex-col items-center p-3 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition-colors">
                                                                <i class="fas fa-file-video text-lg mb-1"></i>
                                                                <span class="text-xs">Choisir Vidéos</span>
                                                            </button>
                                                        </div>

                                                        <!-- Inputs cachés -->
                                                        <input type="file" id="images-input" name="images[]"
                                                            multiple accept="image/*" capture="environment"
                                                            class="hidden">
                                                        <input type="file" id="videos-input" name="videos[]"
                                                            multiple accept="video/*" capture="environment"
                                                            class="hidden">

                                                        <p class="text-xs text-gray-500">
                                                            <strong>Images:</strong> JPEG, PNG, JPG, GIF (max 10MB
                                                            chacune) •
                                                            <strong>Vidéos:</strong> MP4, AVI, MOV, WebM (max 50MB
                                                            chacune)
                                                        </p>
                                                    </div>
                                                </div>

                                                <!-- Sections de prévisualisation -->
                                                <div id="images-section" class="mt-6 hidden">
                                                    <div class="flex items-center justify-between mb-3">
                                                        <h4 class="font-medium text-gray-700 flex items-center">
                                                            <i class="fas fa-images text-[#0077be] mr-2"></i>
                                                            Images sélectionnées
                                                            <span id="images-count"
                                                                class="ml-2 px-2 py-1 bg-[#0077be] text-white text-xs rounded-full">0</span>
                                                        </h4>
                                                        <span class="text-xs text-gray-500">Max 10 images</span>
                                                    </div>
                                                    <div id="image-preview"
                                                        class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                                    </div>
                                                </div>

                                                <div id="videos-section" class="mt-6 hidden">
                                                    <div class="flex items-center justify-between mb-3">
                                                        <h4 class="font-medium text-gray-700 flex items-center">
                                                            <i class="fas fa-video text-red-500 mr-2"></i>
                                                            Vidéos sélectionnées
                                                            <span id="videos-count"
                                                                class="ml-2 px-2 py-1 bg-red-500 text-white text-xs rounded-full">0</span>
                                                        </h4>
                                                        <span class="text-xs text-gray-500">Max 5 vidéos</span>
                                                    </div>
                                                    <div id="video-preview"
                                                        class="grid grid-cols-1 sm:grid-cols-2 gap-4"></div>
                                                </div>

                                                @error('images')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                                @error('videos')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                                @error('media')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="md:col-span-2">
                                                <div class="flex space-x-4">
                                                    <label class="flex items-center text-sm">
                                                        <input type="checkbox" name="fragile" value="1"
                                                            {{ old('fragile') ? 'checked' : '' }}
                                                            class="rounded text-[#0077be] focus:ring-[#0077be] mr-2">
                                                        Contenu fragile
                                                    </label>
                                                    <label class="flex items-center text-sm">
                                                        <input type="checkbox" name="assurance" value="1"
                                                            {{ old('assurance') ? 'checked' : '' }}
                                                            class="rounded text-[#0077be] focus:ring-[#0077be] mr-2">
                                                        Assurance premium
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Boutons de navigation -->
                                    <div class="mt-8 flex justify-between">
                                        <button type="button"
                                            class="prev-step px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-xl transition-colors duration-200 flex items-center">
                                            <i class="fas fa-arrow-left mr-2"></i>
                                            Précédent
                                        </button>
                                        <button type="button"
                                            class="next-step px-5 py-2.5 bg-[#0077be] hover:bg-[#005c91] text-white font-medium rounded-xl transition-colors duration-200 flex items-center">
                                            Suivant
                                            <i class="fas fa-arrow-right ml-2"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Modaux pour la caméra -->
                                <!-- Modal Caméra Photo -->
                                <div id="camera-modal"
                                    class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
                                    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
                                        <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                                            <h3 class="font-semibold text-gray-800">Prendre une photo</h3>
                                            <button type="button" id="close-camera-btn"
                                                class="text-gray-400 hover:text-gray-600">
                                                <i class="fas fa-times text-xl"></i>
                                            </button>
                                        </div>
                                        <div class="p-4">
                                            <!-- Loading spinner -->
                                            <div id="camera-loading" class="text-center py-8 hidden">
                                                <div
                                                    class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-[#0077be]">
                                                </div>
                                                <p class="mt-2 text-gray-600">Accès à la caméra...</p>
                                            </div>

                                            <!-- Caméra -->
                                            <div class="relative bg-gray-900 rounded-lg overflow-hidden aspect-video">
                                                <video id="camera-video" autoplay muted playsinline
                                                    class="w-full h-full object-cover"></video>
                                                <canvas id="camera-canvas" class="hidden"></canvas>
                                            </div>

                                            <!-- Contrôles -->
                                            <div class="flex justify-center space-x-4 mt-4">
                                                <button type="button" id="switch-camera-btn"
                                                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                                                    <i class="fas fa-sync-alt mr-2"></i>Changer
                                                </button>
                                                <button type="button" id="capture-photo-btn"
                                                    class="px-6 py-2 bg-[#0077be] text-white rounded-lg hover:bg-[#005c91] transition-colors">
                                                    <i class="fas fa-camera mr-2"></i>Capturer
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Caméra Vidéo -->
                                <div id="video-modal"
                                    class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
                                    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
                                        <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                                            <h3 class="font-semibold text-gray-800">Enregistrer une vidéo</h3>
                                            <button type="button" id="close-video-btn"
                                                class="text-gray-400 hover:text-gray-600">
                                                <i class="fas fa-times text-xl"></i>
                                            </button>
                                        </div>
                                        <div class="p-4">
                                            <!-- Loading spinner -->
                                            <div id="video-loading" class="text-center py-8 hidden">
                                                <div
                                                    class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-red-500">
                                                </div>
                                                <p class="mt-2 text-gray-600">Accès à la caméra...</p>
                                            </div>

                                            <!-- Caméra vidéo -->
                                            <div class="relative bg-gray-900 rounded-lg overflow-hidden aspect-video">
                                                <video id="video-camera" autoplay muted playsinline
                                                    class="w-full h-full object-cover"></video>

                                                <!-- Indicateur d'enregistrement -->
                                                <div id="recording-indicator" class="absolute top-4 left-4 hidden">
                                                    <div
                                                        class="flex items-center space-x-2 bg-red-500 text-white px-3 py-1 rounded-full">
                                                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                                        <span class="text-sm font-medium">REC</span>
                                                        <span id="recording-time" class="text-sm">00:00</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Contrôles vidéo -->
                                            <div class="flex justify-center space-x-4 mt-4">
                                                <button type="button" id="switch-video-camera-btn"
                                                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                                                    <i class="fas fa-sync-alt mr-2"></i>Changer
                                                </button>
                                                <button type="button" id="start-recording-btn"
                                                    class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                                                    <i class="fas fa-circle mr-2"></i>Démarrer
                                                </button>
                                                <button type="button" id="stop-recording-btn"
                                                    class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors hidden">
                                                    <i class="fas fa-stop mr-2"></i>Arrêter
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Étape 4: Destination -->
                                <div class="form-step" data-step="4">
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-lg font-semibold text-[#0077be]">
                                                <i class="fas fa-map-marker-alt mr-2"></i>
                                                Destination
                                            </h3>
                                            <span class="hidden sm:flex items-center text-xs text-[#0077be]">
                                                <i class="fas fa-info-circle mr-1"></i>
                                                Étape 4/4
                                            </span>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label for="country"
                                                    class="block text-sm font-medium text-gray-700">Pays <span
                                                        class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-globe-europe text-gray-400"></i>
                                                    </div>
                                                    <select id="country" name="country" required
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]">
                                                        <option value="">Sélectionnez un pays</option>
                                                        <option value="France"
                                                            {{ old('country') == 'France' ? 'selected' : '' }}>France
                                                        </option>
                                                        <option value="Cameroun"
                                                            {{ old('country') == 'Cameroun' ? 'selected' : '' }}>
                                                            Cameroun</option>
                                                        <option value="Belgique"
                                                            {{ old('country') == 'Belgique' ? 'selected' : '' }}>
                                                            Belgique</option>
                                                    </select>
                                                </div>
                                                @error('country')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="city"
                                                    class="block text-sm font-medium text-gray-700">Ville <span
                                                        class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-city text-gray-400"></i>
                                                    </div>
                                                    <input type="text" id="city" name="city" required
                                                        value="{{ old('city') }}"
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="Paris">
                                                </div>
                                                @error('city')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="md:col-span-2">
                                                <label for="destination_address"
                                                    class="block text-sm font-medium text-gray-700">Adresse complète
                                                    <span class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute top-3 left-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-map-marker-alt text-gray-400"></i>
                                                    </div>
                                                    <textarea id="destination_address" name="destination_address" rows="3" required
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="25 Rue du Commerce, 75015 Paris, France">{{ old('destination_address') }}</textarea>
                                                </div>
                                                @error('destination_address')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="md:col-span-2">
                                                <div id="service-points-container"
                                                    class="p-4 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200 space-y-2 hidden">
                                                    <h4 class="font-medium text-gray-700 flex items-center">
                                                        <i class="fas fa-map-pin text-[#0077be] mr-2"></i>
                                                        Points de service disponibles
                                                    </h4>
                                                    <div id="service-points-list" class="text-sm text-gray-600">
                                                        <!-- Populated by JS -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Boutons de navigation -->
                                    <div class="mt-8 flex justify-between">
                                        <button type="button"
                                            class="prev-step px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-xl transition-colors duration-200 flex items-center">
                                            <i class="fas fa-arrow-left mr-2"></i>
                                            Précédent
                                        </button>
                                        <button type="submit" id="submit_button" disabled
                                            class="px-6 py-2.5 bg-[#0077be] hover:bg-[#005c91] disabled:bg-gray-400 disabled:cursor-not-allowed text-white font-medium rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center">
                                            <span id="submit-text">
                                                <i class="fas fa-paper-plane mr-2" id="submit-icon"></i>
                                                Créer le colis
                                            </span>
                                            <div id="loading-spinner" class="hidden ml-2">
                                                <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-white">
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Panneau latéral avec améliorations responsive -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Résumé rapide - Mobile uniquement -->
                    <div class="bg-white rounded-2xl shadow-lg p-5 lg:hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-semibold text-gray-800">Résumé</h3>
                            <span class="text-xs text-gray-500">Mise à jour en temps réel</span>
                        </div>
                        <div id="mobile-summary" class="space-y-3 text-sm">
                            <div class="p-3 bg-gray-50 rounded-lg flex justify-between items-center">
                                <span class="text-gray-600">Expéditeur</span>
                                <span class="font-medium text-gray-800" id="summary-sender">-</span>
                            </div>
                            <div class="p-3 bg-gray-50 rounded-lg flex justify-between items-center">
                                <span class="text-gray-600">Destinataire</span>
                                <span class="font-medium text-gray-800" id="summary-recipient">-</span>
                            </div>
                            <div class="p-3 bg-gray-50 rounded-lg flex justify-between items-center">
                                <span class="text-gray-600">Destination</span>
                                <span class="font-medium text-gray-800" id="summary-destination">-</span>
                            </div>
                        </div>
                    </div>

                    <!-- Calculateur de prix AMÉLIORÉ -->
                    <div class="bg-white rounded-2xl shadow-lg p-5">
                        <div class="flex items-center space-x-3 text-[#0077be] mb-4">
                            <div class="p-2 bg-blue-100 rounded-full">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <h3 class="text-lg font-bold">Calculateur</h3>
                        </div>

                        <div id="pricing-calculator" class="space-y-4">
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-700">Poids réel</span>
                                <span class="font-medium" id="calc-weight">0 kg</span>
                            </div>

                            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                                <span class="text-blue-700">Poids facturé</span>
                                <span class="font-medium text-blue-800" id="calc-billed-weight">0 kg</span>
                            </div>

                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-700">Prix de base</span>
                                <span class="font-medium" id="calc-base-price">0.00 €</span>
                            </div>

                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-700">Assurance</span>
                                <span class="font-medium" id="calc-insurance">0.00 €</span>
                            </div>

                            <div class="border-t border-gray-200 pt-3 mt-3">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-gray-700">Total estimé</span>
                                    <span class="text-lg font-bold text-[#0077be]" id="calc-total">0.00 €</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Support Contact -->
                    <div
                        class="bg-gradient-to-br from-[#0077be] to-[#005c91] text-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-5 space-y-5">
                            <div class="flex items-center space-x-3 border-b border-white/20 pb-4">
                                <div class="p-2 bg-white/10 rounded-full">
                                    <i class="fas fa-headset text-xl"></i>
                                </div>
                                <h3 class="text-lg font-bold">Support 24/7</h3>
                            </div>

                            <!-- Points de service -->
                            <div id="service_points" class="space-y-3 max-h-60 overflow-y-auto pr-1 hide-scrollbar">
                                <div class="text-center text-sm text-white/80 py-3">
                                    <p>Sélectionnez un pays pour voir les points de service disponibles</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-2 border-t border-white/10">
                                <a href="tel:+33123456789"
                                    class="flex items-center text-sm text-white hover:text-[#FFD700] transition-colors">
                                    <i class="fas fa-phone-alt mr-2"></i>
                                    +33 1 23 45 67 89
                                </a>
                                <a href="https://wa.me/33123456789" target="_blank"
                                    class="flex items-center text-sm text-white hover:text-[#FFD700] transition-colors">
                                    <i class="fab fa-whatsapp mr-2"></i>
                                    WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Articles Interdits -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-5">
                            <div class="flex items-center justify-between text-[#0077be] cursor-pointer"
                                id="forbidden-toggle">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-red-100 rounded-full">
                                        <i class="fas fa-exclamation-triangle text-red-500"></i>
                                    </div>
                                    <h3 class="text-lg font-bold">Articles Interdits</h3>
                                </div>
                                <i class="fas fa-chevron-down transition-transform duration-300"
                                    id="forbidden-icon"></i>
                            </div>

                            <div class="mt-4 space-y-3 hidden" id="forbidden-content">
                                <div class="flex items-start space-x-3 p-3 bg-red-50 rounded-xl">
                                    <i class="fas fa-ban text-red-500 mt-1"></i>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Matières dangereuses</h4>
                                        <p class="text-sm text-gray-600">Explosifs, produits inflammables</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 p-3 bg-red-50 rounded-xl">
                                    <i class="fas fa-ban text-red-500 mt-1"></i>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Liquides</h4>
                                        <p class="text-sm text-gray-600">Parfums, alcools, produits chimiques</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 p-3 bg-red-50 rounded-xl">
                                    <i class="fas fa-ban text-red-500 mt-1"></i>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Articles contrefaits</h4>
                                        <p class="text-sm text-gray-600">Produits de luxe contrefaits, copies</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 p-3 bg-red-50 rounded-xl">
                                    <i class="fas fa-ban text-red-500 mt-1"></i>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Denrées périssables</h4>
                                        <p class="text-sm text-gray-600">Aliments frais, viandes, produits laitiers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS COMPLETS AVEC CAMÉRA ET CALCULATEUR -->
    <style>
        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-5px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(5px);
            }
        }

        .animate-shake {
            animation: shake 0.5s cubic-bezier(.36, .07, .19, .97) both;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .media-counter {
            @apply inline-flex items-center justify-center;
        }

        .media-counter.warning {
            @apply bg-orange-500 text-white;
        }

        .media-counter.danger {
            @apply bg-red-500 text-white animate-pulse;
        }

        .media-required {
            @apply border-red-300 bg-red-50;
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .notification {
            @apply fixed top-4 right-4 z-50 bg-gray-800 text-white px-6 py-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300;
        }

        .notification.show {
            @apply translate-x-0;
        }

        .notification.success {
            @apply bg-green-500;
        }

        .notification.error {
            @apply bg-red-500;
        }

        .notification.info {
            @apply bg-blue-500;
        }
    </style>
    <!-- Script JavaScript Complet avec Caméra, Calculateur et toutes les fonctionnalités -->
    <script>
        // Variables globales pour la gestion des médias et de la caméra
        let currentStream = null;
        let mediaRecorder = null;
        let recordedChunks = [];
        let currentFacingMode = 'environment';
        let recordingInterval = null;
        let recordingStartTime = null;

        // Variables pour les médias sélectionnés
        window.selectedImages = [];
        window.selectedVideos = [];

        document.addEventListener('DOMContentLoaded', function() {
            // Vérifier la disponibilité de la caméra
            checkCameraAvailability();

            // Initialisation des gestionnaires d'événements
            initializeEventListeners();
            initializeMediaHandlers();
            initializeFormSteps();
            initializeFieldValidation();
            initializePricingCalculator();

            // Initialisation finale
            setTimeout(finalizeInitialization, 100);
        });

        // Vérification des formats vidéo supportés
        function checkVideoFormatsSupport() {
            const formats = [
                'video/mp4; codecs="avc1.42E01E, mp4a.40.2"',
                'video/mp4; codecs="avc1.42E01E"',
                'video/mp4',
                'video/webm; codecs="vp9, opus"',
                'video/webm; codecs="vp8, opus"',
                'video/webm'
            ];

            console.log('=== Support des formats vidéo ===');
            formats.forEach(format => {
                const supported = MediaRecorder.isTypeSupported(format);
                console.log(`${format}: ${supported ? '✅' : '❌'}`);
            });
        }

        // Fonction pour vérifier la disponibilité de la caméra
        function checkCameraAvailability() {
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                const takePhotoBtn = document.getElementById('take-photo-btn');
                const recordVideoBtn = document.getElementById('record-video-btn');

                if (takePhotoBtn) {
                    takePhotoBtn.disabled = true;
                    takePhotoBtn.innerHTML =
                        '<i class="fas fa-camera-slash text-lg mb-1"></i><span class="text-xs">Non disponible</span>';
                    takePhotoBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }

                if (recordVideoBtn) {
                    recordVideoBtn.disabled = true;
                    recordVideoBtn.innerHTML =
                        '<i class="fas fa-video-slash text-lg mb-1"></i><span class="text-xs">Non disponible</span>';
                    recordVideoBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            } else {
                // Vérifier les capacités vidéo
                setTimeout(checkVideoFormatsSupport, 1000);
            }
        }

        // Initialisation des gestionnaires d'événements principaux
        function initializeEventListeners() {
            // Validation des numéros de téléphone WhatsApp
            const phoneInputs = [
                document.getElementById('phone'),
                document.getElementById('recipient_phone')
            ];

            phoneInputs.forEach(input => {
                if (!input) return;

                input.addEventListener('input', function() {
                    validateWhatsAppNumber(this);
                });

                input.addEventListener('blur', function() {
                    validateWhatsAppNumber(this, true);
                });
            });

            // Points de service
            const countrySelect = document.getElementById('country');
            const cityInput = document.getElementById('city');

            if (countrySelect && cityInput) {
                countrySelect.addEventListener('change', updateServicePoints);
                cityInput.addEventListener('input', handleCityInput);
                cityInput.addEventListener('change', updateServicePoints);

                // Valeur par défaut pour le pays
                if (countrySelect.value === '') {
                    countrySelect.value = 'France';
                    countrySelect.dispatchEvent(new Event('change'));
                }
            }

            // Accordéon articles interdits
            const forbiddenToggle = document.getElementById('forbidden-toggle');
            const forbiddenContent = document.getElementById('forbidden-content');
            const forbiddenIcon = document.getElementById('forbidden-icon');

            if (forbiddenToggle && forbiddenContent && forbiddenIcon) {
                forbiddenToggle.addEventListener('click', function() {
                    forbiddenContent.classList.toggle('hidden');
                    forbiddenIcon.classList.toggle('rotate-180');
                });
            }
        }

        // Initialisation de la navigation multi-étapes
        function initializeFormSteps() {
            const formSteps = document.querySelectorAll('.form-step');
            const nextButtons = document.querySelectorAll('.next-step');
            const prevButtons = document.querySelectorAll('.prev-step');
            const progressBar = document.getElementById('progress-bar');
            const progressSteps = document.querySelectorAll('.progress-step');
            const tabButtons = document.querySelectorAll('.step-tab');

            // Fonction de mise à jour de la barre de progression
            function updateProgress(step) {
                const percent = ((step - 1) / (formSteps.length - 1)) * 100;
                if (progressBar) progressBar.style.width = `${percent}%`;

                // Mise à jour des étapes de progression
                progressSteps.forEach((progStep, idx) => {
                    const stepNum = parseInt(progStep.dataset.step);
                    if (stepNum <= step) {
                        progStep.classList.add('active');
                        const icon = progStep.querySelector('.w-8');
                        icon.classList.remove('bg-gray-200', 'text-gray-500');
                        icon.classList.add('bg-[#0077be]', 'text-white');

                        const text = progStep.querySelector('span');
                        text.classList.remove('text-gray-500');
                        text.classList.add('text-[#0077be]');
                    } else {
                        progStep.classList.remove('active');
                        const icon = progStep.querySelector('.w-8');
                        icon.classList.add('bg-gray-200', 'text-gray-500');
                        icon.classList.remove('bg-[#0077be]', 'text-white');

                        const text = progStep.querySelector('span');
                        text.classList.add('text-gray-500');
                        text.classList.remove('text-[#0077be]');
                    }
                });

                // Mise à jour des onglets mobiles
                tabButtons.forEach(tab => {
                    const tabStep = parseInt(tab.dataset.step);
                    if (tabStep === step) {
                        tab.classList.add('active', 'border-[#0077be]', 'text-[#0077be]');
                        tab.classList.remove('border-transparent', 'text-gray-500');
                    } else {
                        tab.classList.remove('active', 'border-[#0077be]', 'text-[#0077be]');
                        tab.classList.add('border-transparent', 'text-gray-500');
                    }
                });
            }

            // Afficher une étape spécifique
            function showStep(step) {
                formSteps.forEach(formStep => {
                    formStep.classList.remove('active');
                    formStep.style.display = 'none';
                });

                const currentStep = document.querySelector(`.form-step[data-step="${step}"]`);
                currentStep.classList.add('active');
                currentStep.style.display = 'block';

                updateProgress(step);
                updateSummary();

                // Scroll vers le haut sur mobile
                if (window.innerWidth < 640) {
                    document.getElementById('shipping-form').scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }

            // Initialisation - afficher la première étape
            formSteps.forEach(step => {
                step.style.display = 'none';
            });
            showStep(1);

            // Gestionnaires des boutons "Suivant"
            nextButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = parseInt(this.closest('.form-step').dataset.step);
                    const nextStep = currentStep + 1;

                    // Validation avant de continuer
                    if (validateCurrentStep(currentStep)) {
                        if (nextStep <= formSteps.length) {
                            showStep(nextStep);
                        }
                    }
                });
            });

            // Gestionnaires des boutons "Précédent"
            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = parseInt(this.closest('.form-step').dataset.step);
                    const prevStep = currentStep - 1;

                    if (prevStep >= 1) {
                        showStep(prevStep);
                    }
                });
            });

            // Navigation par onglets mobiles
            tabButtons.forEach(tab => {
                tab.addEventListener('click', function() {
                    const step = parseInt(this.dataset.step);
                    showStep(step);
                });
            });
        }

        // Validation d'une étape
        function validateCurrentStep(step) {
            const currentFormStep = document.querySelector(`.form-step[data-step="${step}"]`);
            const requiredFields = currentFormStep.querySelectorAll(
                'input[required], select[required], textarea[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value) {
                    isValid = false;
                    showFieldError(field, 'Ce champ est requis');
                } else {
                    clearFieldError(field);
                }
            });

            // Validation spéciale pour les médias à l'étape 3
            if (step === 3) {
                if (window.selectedImages.length === 0 && window.selectedVideos.length === 0) {
                    isValid = false;
                    showMediaError();
                } else {
                    clearMediaError();
                }
            }

            return isValid;
        }

        // Afficher une erreur de champ
        function showFieldError(field, message) {
            field.classList.add('border-red-500');
            field.classList.add('animate-shake');
            setTimeout(() => field.classList.remove('animate-shake'), 500);

            const parentNode = field.closest('.floating-label') || field.parentNode;
            let errorMsg = parentNode.querySelector('.error-message');

            if (!errorMsg) {
                errorMsg = document.createElement('p');
                errorMsg.className = 'text-red-500 text-xs mt-1 error-message';
                errorMsg.innerText = message;
                parentNode.appendChild(errorMsg);
            }
        }

        // Supprimer l'erreur d'un champ
        function clearFieldError(field) {
            field.classList.remove('border-red-500');
            const parentNode = field.closest('.floating-label') || field.parentNode;
            const errorMsg = parentNode.querySelector('.error-message');
            if (errorMsg) errorMsg.remove();
        }

        // Afficher erreur médias
        function showMediaError() {
            const mediaDropZone = document.getElementById('media-drop-zone');
            mediaDropZone.classList.add('media-required');

            let mediaError = document.querySelector('.media-error-message');
            if (!mediaError) {
                mediaError = document.createElement('p');
                mediaError.className = 'text-red-500 text-sm mt-2 media-error-message';
                mediaError.innerHTML =
                    '<i class="fas fa-exclamation-triangle mr-1"></i>Veuillez ajouter au moins une image ou une vidéo du colis.';
                mediaDropZone.parentNode.appendChild(mediaError);
            }
        }

        // Supprimer erreur médias
        function clearMediaError() {
            const mediaDropZone = document.getElementById('media-drop-zone');
            mediaDropZone.classList.remove('media-required');

            const mediaError = document.querySelector('.media-error-message');
            if (mediaError) mediaError.remove();
        }

        // Validation des numéros WhatsApp
        function validateWhatsAppNumber(input, showError = false) {
            const phoneValidationDiv = input.id === 'phone' ?
                document.getElementById('phone-validation') :
                document.getElementById('recipient-phone-validation');

            const whatsappRegex = /^\+[0-9]{1,3}[0-9]{6,14}$/;

            if (input.value.trim() === '') {
                phoneValidationDiv.innerHTML = '';
                return;
            }

            if (whatsappRegex.test(input.value)) {
                phoneValidationDiv.innerHTML = '<i class="fas fa-check-circle text-green-500"></i>';
                input.classList.remove('border-red-500');
                input.classList.add('border-green-500');
                clearFieldError(input);
            } else {
                phoneValidationDiv.innerHTML = '<i class="fas fa-times-circle text-red-500"></i>';
                input.classList.remove('border-green-500');

                if (showError) {
                    showFieldError(input, 'Format invalide pour WhatsApp. Utilisez le format +33612345678');
                }
            }
        }

        // Gestion des points de service
        const servicePoints = {
            'France': {
                'Paris': ['Gare du Nord', 'Gare de Lyon', 'République'],
                // 'Lyon': ['Part-Dieu', 'Perrache', 'Bellecour'],
                // 'Marseille': ['Gare Saint-Charles', 'Vieux Port']
            },
            'Cameroun': {
                'Douala': ['Aeroport International de Douala', 'Logpom'],
                'Yaoundé': ['Aeroport International de Nsimalen', 'Centre-ville']
            },
            'Belgique': {
                'Bruxelles': ['Gare Centrale', 'Avenue Louise', 'Grand Place'],
                'Liège': ['Guillemins', 'Saint-Lambert']
            }
        };

        // Mise à jour des points de service
        function updateServicePoints() {
            const countrySelect = document.getElementById('country');
            const servicePointsDiv = document.getElementById('service_points');
            const servicePointsContainer = document.getElementById('service-points-container');
            const servicePointsList = document.getElementById('service-points-list');

            if (!countrySelect || !servicePointsDiv) return;

            const country = countrySelect.value;

            // Mise à jour des points de service dans la sidebar
            if (servicePoints[country]) {
                servicePointsDiv.innerHTML = Object.entries(servicePoints[country])
                    .map(([city, points]) => `
                        <div class="p-3 bg-white/10 rounded-xl">
                            <h4 class="font-semibold text-[#ffd700] mb-1">${city}</h4>
                            <div class="text-sm text-white/90">${points.join(', ')}</div>
                        </div>
                    `).join('');
            } else {
                servicePointsDiv.innerHTML =
                    '<div class="text-center text-sm text-white/80 py-3"><p>Aucun point de service disponible</p></div>';
            }

            updateCityServicePoints();
        }

        function updateCityServicePoints() {
            const countrySelect = document.getElementById('country');
            const cityInput = document.getElementById('city');
            const servicePointsContainer = document.getElementById('service-points-container');
            const servicePointsList = document.getElementById('service-points-list');

            if (!countrySelect || !cityInput || !servicePointsContainer || !servicePointsList) return;

            const country = countrySelect.value;
            const city = cityInput.value.trim();

            if (country && city && servicePoints[country] && servicePoints[country][city]) {
                const points = servicePoints[country][city];
                servicePointsList.innerHTML = points.map(point =>
                    `<div class="flex items-start">
                        <i class="fas fa-circle text-[#0077be] text-[6px] mt-1.5 mr-1.5"></i>
                        <span>${point}</span>
                    </div>`
                ).join('');

                if (servicePointsContainer.classList.contains('hidden')) {
                    servicePointsContainer.classList.remove('hidden');
                    servicePointsContainer.classList.add('animate-fade-in');
                    setTimeout(() => {
                        servicePointsContainer.classList.remove('animate-fade-in');
                    }, 300);
                }
            } else {
                servicePointsContainer.classList.add('hidden');
            }
        }

        // Gestion de l'input ville avec auto-complétion
        function handleCityInput(e) {
            const countrySelect = document.getElementById('country');
            const cityValue = e.target.value.trim();
            const country = countrySelect?.value;

            if (country && cityValue && servicePoints[country]) {
                updateCityServicePoints();

                if (cityValue.length >= 2) {
                    const cityValueLower = cityValue.toLowerCase();
                    const cities = Object.keys(servicePoints[country]);

                    for (const city of cities) {
                        if (city.toLowerCase().startsWith(cityValueLower)) {
                            if (e.inputType !== 'deleteContentBackward' && e.inputType !== 'deleteContentForward') {
                                e.target.value = city;
                                e.target.setSelectionRange(cityValue.length, city.length);
                                break;
                            }
                        }
                    }
                }
            }
        }

        // Initialisation de la validation des champs
        function initializeFieldValidation() {
            // Compteur de caractères pour la description
            const descriptionColis = document.getElementById('description_colis');
            const charCount = document.getElementById('char-count');

            if (descriptionColis && charCount) {
                function updateCount() {
                    const count = descriptionColis.value.length;
                    charCount.textContent = `${count}/500`;

                    charCount.classList.remove('text-orange-500', 'text-red-500');
                    if (count > 450) {
                        charCount.classList.add('text-orange-500');
                        if (count > 480) {
                            charCount.classList.add('text-red-500');
                            charCount.classList.remove('text-orange-500');
                        }
                    }
                }

                descriptionColis.addEventListener('input', updateCount);
                updateCount();
            }

            // Formatage des nombres
            const priceInput = document.getElementById('price');
            if (priceInput) {
                priceInput.addEventListener('blur', function() {
                    if (this.value) {
                        const value = parseFloat(this.value);
                        if (!isNaN(value)) {
                            this.value = value.toFixed(2);
                        }
                    }
                });
            }

            // Validation du formulaire final
            const form = document.getElementById('shipping-form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    if (window.selectedImages.length === 0 && window.selectedVideos.length === 0) {
                        e.preventDefault();
                        showNotification('Veuillez ajouter au moins une image ou une vidéo du colis.', 'error');
                        return false;
                    }

                    const submitButton = document.getElementById('submit_button');
                    const submitText = document.getElementById('submit-text');
                    const submitIcon = document.getElementById('submit-icon');
                    const loadingSpinner = document.getElementById('loading-spinner');

                    if (submitButton) submitButton.disabled = true;
                    if (submitText) submitText.innerHTML = 'Création en cours...';
                    if (submitIcon) submitIcon.classList.add('hidden');
                    if (loadingSpinner) loadingSpinner.classList.remove('hidden');
                });
            }
        }

        // Calculateur de poids de transport
        function calculateBilledWeight(actualWeight) {
            if (actualWeight <= 0) return 0;
            if (actualWeight <= 1.2) return 1;
            if (actualWeight <= 2.2) return 2;
            if (actualWeight <= 3.2) return 3;
            if (actualWeight <= 4.2) return 4;
            if (actualWeight <= 5.2) return 5;
            if (actualWeight <= 6.2) return 6;
            if (actualWeight <= 7.2) return 7;
            if (actualWeight <= 8.2) return 8;
            if (actualWeight <= 9.2) return 9;
            if (actualWeight <= 10.2) return 10;
            return Math.ceil(actualWeight - 0.2);
        }

        // Initialisation du calculateur de prix
        function initializePricingCalculator() {
            const weightInput = document.getElementById('weight');
            const priceInput = document.getElementById('price');
            const assuranceCheckbox = document.querySelector('input[name="assurance"]');

            if (weightInput) {
                weightInput.addEventListener('input', function() {
                    const actualWeight = parseFloat(this.value);
                    const billedWeightDisplay = document.getElementById('billed-weight-display');
                    const billedWeightValue = document.getElementById('billed-weight-value');

                    if (!isNaN(actualWeight) && actualWeight > 0) {
                        const billedWeight = calculateBilledWeight(actualWeight);
                        if (billedWeightValue) billedWeightValue.textContent = billedWeight + ' kg';
                        if (billedWeightDisplay) {
                            billedWeightDisplay.classList.remove('hidden');
                            billedWeightDisplay.classList.add('animate-fade-in');
                            setTimeout(() => {
                                billedWeightDisplay.classList.remove('animate-fade-in');
                            }, 300);
                        }
                    } else {
                        if (billedWeightDisplay) billedWeightDisplay.classList.add('hidden');
                    }

                    updatePricingCalculator();
                });

                weightInput.addEventListener('blur', function() {
                    if (this.value) {
                        const value = parseFloat(this.value);
                        if (!isNaN(value)) {
                            this.value = value.toFixed(1);
                        }
                    }
                });
            }

            // Event listeners pour le calculateur
            if (priceInput) priceInput.addEventListener('input', updatePricingCalculator);
            if (assuranceCheckbox) assuranceCheckbox.addEventListener('change', updatePricingCalculator);
        }

        // Mise à jour du calculateur de prix
        function updatePricingCalculator() {
            const weightInput = document.getElementById('weight');
            const priceInput = document.getElementById('price');
            const assuranceCheckbox = document.querySelector('input[name="assurance"]');

            const weight = parseFloat(weightInput?.value) || 0;
            const basePrice = parseFloat(priceInput?.value) || 0;
            const hasAssurance = assuranceCheckbox?.checked || false;
            const billedWeight = calculateBilledWeight(weight);

            const calcElements = {
                'calc-weight': `${weight.toFixed(1)} kg`,
                'calc-billed-weight': `${billedWeight} kg`,
                'calc-base-price': `${basePrice.toFixed(2)} €`
            };

            let insuranceAmount = 0;
            if (hasAssurance && basePrice > 0) {
                insuranceAmount = Math.max(5, basePrice * 0.05); // 5€ ou 5% de la valeur
            }

            calcElements['calc-insurance'] = `${insuranceAmount.toFixed(2)} €`;
            calcElements['calc-total'] = `${(basePrice + insuranceAmount).toFixed(2)} €`;

            Object.entries(calcElements).forEach(([id, value]) => {
                const element = document.getElementById(id);
                if (element) element.textContent = value;
            });
        }

        // Validation du formulaire
        function validateForm() {
            const submitButton = document.getElementById('submit_button');
            const mediaDropZone = document.getElementById('media-drop-zone');

            const hasImages = window.selectedImages.length > 0;
            const hasVideos = window.selectedVideos.length > 0;
            const hasMedia = hasImages || hasVideos;

            if (hasMedia) {
                if (submitButton) submitButton.disabled = false;
                if (mediaDropZone) mediaDropZone.classList.remove('media-required');
            } else {
                if (submitButton) submitButton.disabled = true;
                if (mediaDropZone) {
                    mediaDropZone.classList.add('media-required');
                }
            }
        }

        // Mise à jour du résumé mobile
        function updateSummary() {
            const senderName = document.getElementById('sender_name')?.value || '-';
            const recipientName = document.getElementById('recipient_name')?.value || '-';
            const country = document.getElementById('country')?.value || '';
            const city = document.getElementById('city')?.value || '';

            const summaryElements = {
                'summary-sender': senderName,
                'summary-recipient': recipientName,
                'summary-destination': country && city ? `${city}, ${country}` : '-'
            };

            Object.entries(summaryElements).forEach(([id, value]) => {
                const element = document.getElementById(id);
                if (element) element.textContent = value;
            });
        }

        // Initialisation des gestionnaires de médias et caméra
        function initializeMediaHandlers() {
            const takePhotoBtn = document.getElementById('take-photo-btn');
            const recordVideoBtn = document.getElementById('record-video-btn');
            const selectImagesBtn = document.getElementById('select-images-btn');
            const selectVideosBtn = document.getElementById('select-videos-btn');
            const cameraModal = document.getElementById('camera-modal');
            const videoModal = document.getElementById('video-modal');
            const closeCameraBtn = document.getElementById('close-camera-btn');
            const closeVideoBtn = document.getElementById('close-video-btn');
            const capturePhotoBtn = document.getElementById('capture-photo-btn');
            const switchCameraBtn = document.getElementById('switch-camera-btn');
            const switchVideoCameraBtn = document.getElementById('switch-video-camera-btn');
            const startRecordingBtn = document.getElementById('start-recording-btn');
            const stopRecordingBtn = document.getElementById('stop-recording-btn');
            const imageInput = document.getElementById('images-input');
            const videoInput = document.getElementById('videos-input');
            const mediaDropZone = document.getElementById('media-drop-zone');

            // Gestionnaires pour les boutons de caméra
            takePhotoBtn?.addEventListener('click', async function() {
                try {
                    await openCamera();
                    cameraModal?.classList.remove('hidden');
                } catch (error) {
                    console.error('Erreur lors de l\'ouverture de la caméra:', error);
                    showNotification('Impossible d\'accéder à la caméra. Vérifiez les permissions.', 'error');
                }
            });

            recordVideoBtn?.addEventListener('click', async function() {
                try {
                    await openVideoCamera();
                    videoModal?.classList.remove('hidden');
                } catch (error) {
                    console.error('Erreur lors de l\'ouverture de la caméra vidéo:', error);
                    showNotification('Impossible d\'accéder à la caméra. Vérifiez les permissions.', 'error');
                }
            });

            // Gestionnaires pour la sélection de fichiers
            selectImagesBtn?.addEventListener('click', () => imageInput?.click());
            selectVideosBtn?.addEventListener('click', () => videoInput?.click());

            imageInput?.addEventListener('change', function(e) {
                handleImageFiles(Array.from(e.target.files));
            });

            videoInput?.addEventListener('change', function(e) {
                handleVideoFiles(Array.from(e.target.files));
            });

            // Gestionnaires pour les modaux
            closeCameraBtn?.addEventListener('click', function() {
                closeCamera();
                cameraModal?.classList.add('hidden');
            });

            closeVideoBtn?.addEventListener('click', function() {
                closeVideoCamera();
                videoModal?.classList.add('hidden');
            });

            // Gestionnaires pour les actions de caméra
            capturePhotoBtn?.addEventListener('click', capturePhoto);
            switchCameraBtn?.addEventListener('click', switchCamera);
            switchVideoCameraBtn?.addEventListener('click', switchVideoCamera);
            startRecordingBtn?.addEventListener('click', startRecording);
            stopRecordingBtn?.addEventListener('click', stopRecording);

            // Gestionnaires de drag & drop
            if (mediaDropZone) {
                mediaDropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    this.classList.add('border-[#0077be]', 'bg-blue-50');
                });

                mediaDropZone.addEventListener('dragleave', function(e) {
                    e.preventDefault();
                    this.classList.remove('border-[#0077be]', 'bg-blue-50');
                });

                mediaDropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    this.classList.remove('border-[#0077be]', 'bg-blue-50');

                    const files = Array.from(e.dataTransfer.files);
                    const images = files.filter(file => file.type.startsWith('image/'));
                    const videos = files.filter(file => file.type.startsWith('video/'));

                    if (images.length > 0) handleImageFiles(images);
                    if (videos.length > 0) handleVideoFiles(videos);
                });
            }

            // Fermer les modaux en cliquant à l'extérieur
            cameraModal?.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeCamera();
                    this.classList.add('hidden');
                }
            });

            videoModal?.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeVideoCamera();
                    this.classList.add('hidden');
                }
            });
        }

        // Ouvrir la caméra pour photo
        async function openCamera() {
            const cameraLoading = document.getElementById('camera-loading');

            try {
                if (cameraLoading) cameraLoading.classList.remove('hidden');

                const constraints = {
                    video: {
                        facingMode: currentFacingMode,
                        width: {
                            ideal: 1280
                        },
                        height: {
                            ideal: 720
                        }
                    }
                };

                currentStream = await navigator.mediaDevices.getUserMedia(constraints);
                const cameraVideo = document.getElementById('camera-video');
                if (cameraVideo) {
                    cameraVideo.srcObject = currentStream;
                }

                if (cameraLoading) cameraLoading.classList.add('hidden');
            } catch (error) {
                if (cameraLoading) cameraLoading.classList.add('hidden');
                console.error('Erreur d\'accès à la caméra:', error);
                throw error;
            }
        }

        // Ouvrir la caméra pour vidéo
        async function openVideoCamera() {
            const videoLoading = document.getElementById('video-loading');

            try {
                if (videoLoading) videoLoading.classList.remove('hidden');

                const constraints = {
                    video: {
                        facingMode: currentFacingMode,
                        width: {
                            ideal: 1280
                        },
                        height: {
                            ideal: 720
                        }
                    },
                    audio: true
                };

                currentStream = await navigator.mediaDevices.getUserMedia(constraints);
                const videoCameraElement = document.getElementById('video-camera');
                if (videoCameraElement) {
                    videoCameraElement.srcObject = currentStream;
                }

                if (videoLoading) videoLoading.classList.add('hidden');
            } catch (error) {
                if (videoLoading) videoLoading.classList.add('hidden');
                console.error('Erreur d\'accès à la caméra vidéo:', error);
                throw error;
            }
        }

        // Fermer la caméra
        function closeCamera() {
            if (currentStream) {
                currentStream.getTracks().forEach(track => track.stop());
                currentStream = null;
            }
        }

        // Fermer la caméra vidéo
        function closeVideoCamera() {
            if (mediaRecorder && mediaRecorder.state !== 'inactive') {
                mediaRecorder.stop();
            }
            if (currentStream) {
                currentStream.getTracks().forEach(track => track.stop());
                currentStream = null;
            }
            resetRecordingUI();
        }

        // Changer de caméra (photo)
        async function switchCamera() {
            currentFacingMode = currentFacingMode === 'user' ? 'environment' : 'user';
            closeCamera();
            await openCamera();
        }

        // Changer de caméra (vidéo)
        async function switchVideoCamera() {
            currentFacingMode = currentFacingMode === 'user' ? 'environment' : 'user';
            closeVideoCamera();
            await openVideoCamera();
        }

        // Capturer une photo
        function capturePhoto() {
            const cameraVideo = document.getElementById('camera-video');
            const cameraCanvas = document.getElementById('camera-canvas');
            const cameraModal = document.getElementById('camera-modal');

            if (!cameraVideo || !cameraCanvas) return;

            const context = cameraCanvas.getContext('2d');
            cameraCanvas.width = cameraVideo.videoWidth;
            cameraCanvas.height = cameraVideo.videoHeight;
            context.drawImage(cameraVideo, 0, 0, cameraCanvas.width, cameraCanvas.height);

            cameraCanvas.toBlob(function(blob) {
                if (blob) {
                    const fileName = `photo_${Date.now()}.jpg`;
                    const file = new File([blob], fileName, {
                        type: 'image/jpeg'
                    });

                    if (window.selectedImages.length < 10) {
                        window.selectedImages.push(file);
                        displayImagePreview(file, window.selectedImages.length - 1);
                        updateImageInput();
                        updateMediaDisplay();
                        validateForm();

                        closeCamera();
                        cameraModal?.classList.add('hidden');

                        showNotification('Photo capturée avec succès !', 'success');
                    } else {
                        showNotification('Maximum 10 images autorisées.', 'error');
                    }
                }
            }, 'image/jpeg', 0.8);
        }

        // Démarrer l'enregistrement vidéo en MP4
        function startRecording() {
            if (!currentStream) return;

            recordedChunks = [];

            // Configuration pour MP4 avec priorité sur les codecs compatibles
            const options = [{
                    mimeType: 'video/mp4; codecs="avc1.42E01E, mp4a.40.2"'
                },
                {
                    mimeType: 'video/mp4; codecs="avc1.42E01E"'
                },
                {
                    mimeType: 'video/mp4'
                },
                {
                    mimeType: 'video/webm; codecs="vp9, opus"'
                },
                {
                    mimeType: 'video/webm; codecs="vp8, opus"'
                },
                {
                    mimeType: 'video/webm'
                }
            ];

            let selectedOption = null;

            for (const option of options) {
                if (MediaRecorder.isTypeSupported(option.mimeType)) {
                    selectedOption = option;
                    console.log('Format vidéo sélectionné:', option.mimeType);
                    break;
                }
            }

            if (!selectedOption) {
                selectedOption = {};
                console.warn('Aucun format préféré supporté, utilisation du format par défaut');
            }

            try {
                mediaRecorder = new MediaRecorder(currentStream, selectedOption);
            } catch (e) {
                console.error('Erreur MediaRecorder avec options:', e);
                try {
                    mediaRecorder = new MediaRecorder(currentStream);
                    console.log('MediaRecorder créé sans options spécifiques');
                } catch (e2) {
                    console.error('Impossible de créer MediaRecorder:', e2);
                    showNotification('Erreur lors de l\'initialisation de l\'enregistrement', 'error');
                    return;
                }
            }

            mediaRecorder.ondataavailable = function(event) {
                if (event.data.size > 0) {
                    recordedChunks.push(event.data);
                }
            };

            mediaRecorder.onstop = function() {
                const mimeType = mediaRecorder.mimeType || selectedOption.mimeType || 'video/mp4';
                let extension = '.mp4';
                let finalMimeType = 'video/mp4';

                if (mimeType.includes('mp4')) {
                    extension = '.mp4';
                    finalMimeType = 'video/mp4';
                } else if (mimeType.includes('webm')) {
                    extension = '.webm';
                    finalMimeType = mimeType;
                }

                const blob = new Blob(recordedChunks, {
                    type: finalMimeType
                });
                const fileName = `video_${Date.now()}${extension}`;
                const file = new File([blob], fileName, {
                    type: finalMimeType
                });

                processRecordedVideo(file);
            };

            mediaRecorder.onerror = function(event) {
                console.error('Erreur MediaRecorder:', event.error);
                showNotification('Erreur lors de l\'enregistrement: ' + event.error.message, 'error');
            };

            try {
                mediaRecorder.start(1000);
                recordingStartTime = Date.now();

                const startRecordingBtn = document.getElementById('start-recording-btn');
                const stopRecordingBtn = document.getElementById('stop-recording-btn');
                const recordingIndicator = document.getElementById('recording-indicator');

                startRecordingBtn?.classList.add('hidden');
                stopRecordingBtn?.classList.remove('hidden');
                recordingIndicator?.classList.remove('hidden');

                recordingInterval = setInterval(updateRecordingTime, 1000);

                showNotification('Enregistrement vidéo démarré', 'success');
            } catch (e) {
                console.error('Erreur lors du démarrage:', e);
                showNotification('Impossible de démarrer l\'enregistrement', 'error');
            }
        }

        // Traiter la vidéo enregistrée
        function processRecordedVideo(file) {
            if (window.selectedVideos.length < 5) {
                const maxSize = 50 * 1024 * 1024; // 50MB
                if (file.size > maxSize) {
                    showNotification('Vidéo trop volumineuse (max 50MB). Réduisez la durée d\'enregistrement.', 'error');
                    return;
                }

                window.selectedVideos.push(file);
                displayVideoPreview(file, window.selectedVideos.length - 1);
                updateVideoInput();
                updateMediaDisplay();
                validateForm();

                closeVideoCamera();
                const videoModal = document.getElementById('video-modal');
                videoModal?.classList.add('hidden');

                showNotification('Vidéo enregistrée avec succès !', 'success');
            } else {
                showNotification('Maximum 5 vidéos autorisées.', 'error');
            }
        }

        // Arrêter l'enregistrement vidéo
        function stopRecording() {
            if (mediaRecorder && mediaRecorder.state !== 'inactive') {
                mediaRecorder.stop();
            }
            resetRecordingUI();
        }

        // Réinitialiser l'interface d'enregistrement
        function resetRecordingUI() {
            const startRecordingBtn = document.getElementById('start-recording-btn');
            const stopRecordingBtn = document.getElementById('stop-recording-btn');
            const recordingIndicator = document.getElementById('recording-indicator');

            startRecordingBtn?.classList.remove('hidden');
            stopRecordingBtn?.classList.add('hidden');
            recordingIndicator?.classList.add('hidden');

            if (recordingInterval) {
                clearInterval(recordingInterval);
                recordingInterval = null;
            }
            recordingStartTime = null;
        }

        // Mettre à jour le temps d'enregistrement
        function updateRecordingTime() {
            const recordingTime = document.getElementById('recording-time');
            if (recordingStartTime && recordingTime) {
                const elapsed = Date.now() - recordingStartTime;
                const minutes = Math.floor(elapsed / 60000);
                const seconds = Math.floor((elapsed % 60000) / 1000);
                const timeString = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                recordingTime.textContent = timeString;
            }
        }

        // Gestion des fichiers images
        function handleImageFiles(files) {
            const maxImages = 10;
            const maxSize = 10 * 1024 * 1024; // 10MB

            files.forEach(file => {
                if (window.selectedImages.length >= maxImages) {
                    showNotification(`Maximum ${maxImages} images autorisées.`, 'error');
                    return;
                }

                if (file.size > maxSize) {
                    showNotification(`L'image "${file.name}" est trop volumineuse. Taille maximale : 10MB`,
                        'error');
                    return;
                }

                if (!file.type.startsWith('image/')) {
                    showNotification(`Le fichier "${file.name}" n'est pas une image valide.`, 'error');
                    return;
                }

                window.selectedImages.push(file);
                displayImagePreview(file, window.selectedImages.length - 1);
            });

            updateImageInput();
            updateMediaDisplay();
            validateForm();
        }

        // Gestion des fichiers vidéos
        function handleVideoFiles(files) {
            const maxVideos = 5;
            const maxSize = 50 * 1024 * 1024; // 50MB

            files.forEach(file => {
                if (window.selectedVideos.length >= maxVideos) {
                    showNotification(`Maximum ${maxVideos} vidéos autorisées.`, 'error');
                    return;
                }

                if (file.size > maxSize) {
                    showNotification(`La vidéo "${file.name}" est trop volumineuse. Taille maximale : 50MB`,
                        'error');
                    return;
                }

                if (!file.type.startsWith('video/')) {
                    showNotification(`Le fichier "${file.name}" n'est pas une vidéo valide.`, 'error');
                    return;
                }

                window.selectedVideos.push(file);
                displayVideoPreview(file, window.selectedVideos.length - 1);
            });

            updateVideoInput();
            updateMediaDisplay();
            validateForm();
        }

        // Afficher la prévisualisation d'une image
        function displayImagePreview(file, index) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewItem = document.createElement('div');
                previewItem.className = 'media-preview-item relative group';
                previewItem.innerHTML = `
                    <div class="aspect-square rounded-lg overflow-hidden bg-gray-100 border-2 border-gray-200">
                        <img src="${e.target.result}" alt="Prévisualisation" class="w-full h-full object-cover">
                    </div>
                    <div class="overlay"></div>
                    <button type="button" class="delete-btn absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 transition-colors" onclick="removeImage(${index})">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="absolute bottom-2 left-2 bg-black/70 text-white text-xs px-2 py-1 rounded">
                        ${(file.size / 1024 / 1024).toFixed(1)}MB
                    </div>
                `;
                const imagePreview = document.getElementById('image-preview');
                if (imagePreview) {
                    imagePreview.appendChild(previewItem);
                }
            };
            reader.readAsDataURL(file);
        }

        // Afficher la prévisualisation d'une vidéo avec support MP4
        function displayVideoPreview(file, index) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewItem = document.createElement('div');
                previewItem.className = 'media-preview-item relative group';

                const isMP4 = file.type.includes('mp4');
                const formatIcon = isMP4 ? 'fas fa-film' : 'fas fa-video';
                const formatLabel = isMP4 ? 'MP4' : file.type.split('/')[1].toUpperCase();

                previewItem.innerHTML = `
                    <div class="aspect-video rounded-lg overflow-hidden bg-gray-100 border-2 border-gray-200">
                        <video src="${e.target.result}" class="w-full h-full object-cover" controls preload="metadata"></video>
                    </div>
                    <div class="overlay"></div>
                    <button type="button" class="delete-btn absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 transition-colors" onclick="removeVideo(${index})">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="absolute bottom-2 left-2 bg-black/70 text-white text-xs px-2 py-1 rounded flex items-center">
                        <i class="${formatIcon} mr-1"></i>
                        ${formatLabel} • ${(file.size / 1024 / 1024).toFixed(1)}MB
                    </div>
                    <div class="absolute top-2 left-2 bg-green-500 text-white text-xs px-2 py-1 rounded">
                        <i class="fas fa-video mr-1"></i>
                        Enregistré
                    </div>
                `;
                const videoPreview = document.getElementById('video-preview');
                if (videoPreview) {
                    videoPreview.appendChild(previewItem);
                }
            };
            reader.readAsDataURL(file);
        }

        // Mettre à jour l'affichage des médias
        function updateMediaDisplay() {
            const imagesSection = document.getElementById('images-section');
            const videosSection = document.getElementById('videos-section');
            const imagesCount = document.getElementById('images-count');
            const videosCount = document.getElementById('videos-count');

            if (imagesCount) {
                imagesCount.textContent = window.selectedImages.length;
                imagesCount.className = 'media-counter ml-2 px-2 py-1 bg-[#0077be] text-white text-xs rounded-full';
                if (window.selectedImages.length >= 8) {
                    imagesCount.classList.add('warning');
                }
                if (window.selectedImages.length >= 10) {
                    imagesCount.classList.add('danger');
                    imagesCount.classList.remove('warning');
                }
            }

            if (imagesSection) {
                if (window.selectedImages.length > 0) {
                    imagesSection.classList.remove('hidden');
                } else {
                    imagesSection.classList.add('hidden');
                }
            }

            if (videosCount) {
                videosCount.textContent = window.selectedVideos.length;
                videosCount.className = 'media-counter ml-2 px-2 py-1 bg-red-500 text-white text-xs rounded-full';
                if (window.selectedVideos.length >= 4) {
                    videosCount.classList.add('warning');
                }
                if (window.selectedVideos.length >= 5) {
                    videosCount.classList.add('danger');
                    videosCount.classList.remove('warning');
                }
            }

            if (videosSection) {
                if (window.selectedVideos.length > 0) {
                    videosSection.classList.remove('hidden');
                } else {
                    videosSection.classList.add('hidden');
                }
            }
        }

        // Mettre à jour l'input des images
        function updateImageInput() {
            const imageInput = document.getElementById('images-input');
            if (imageInput) {
                const dt = new DataTransfer();
                window.selectedImages.forEach(file => dt.items.add(file));
                imageInput.files = dt.files;
            }
        }

        // Mettre à jour l'input des vidéos
        function updateVideoInput() {
            const videoInput = document.getElementById('videos-input');
            if (videoInput) {
                const dt = new DataTransfer();
                window.selectedVideos.forEach(file => dt.items.add(file));
                videoInput.files = dt.files;
            }
        }

        // Fonctions globales pour la suppression
        window.removeImage = function(index) {
            window.selectedImages.splice(index, 1);
            const imagePreview = document.getElementById('image-preview');
            if (imagePreview) {
                imagePreview.innerHTML = '';
                window.selectedImages.forEach((file, newIndex) => {
                    displayImagePreview(file, newIndex);
                });
            }
            updateImageInput();
            updateMediaDisplay();
            validateForm();
        };

        window.removeVideo = function(index) {
            window.selectedVideos.splice(index, 1);
            const videoPreview = document.getElementById('video-preview');
            if (videoPreview) {
                videoPreview.innerHTML = '';
                window.selectedVideos.forEach((file, newIndex) => {
                    displayVideoPreview(file, newIndex);
                });
            }
            updateVideoInput();
            updateMediaDisplay();
            validateForm();
        };

        // Fonction pour afficher des notifications
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;

            notification.innerHTML = `
                <div class="flex items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'} mr-2"></i>
                    <span>${message}</span>
                    <button type="button" class="ml-4 text-white/80 hover:text-white" onclick="this.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.classList.add('show');
            }, 100);

            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 5000);
        }

        // Initialisation finale
        function finalizeInitialization() {
            updateMediaDisplay();
            validateForm();
            updatePricingCalculator();

            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                console.log('📷 Caméra disponible - Fonctionnalités photo/vidéo activées');
            } else {
                console.warn('📷 Caméra non disponible - Seule l\'upload de fichiers est possible');
            }
        }
    </script>
</x-app-layout>
