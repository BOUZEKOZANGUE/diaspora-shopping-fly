<x-app-layout>
    <!-- Header with improved responsive design -->
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

                        {{-- Indicateur de livraison express - Adapté pour mobile --}}
                        <div class="flex items-center px-3 py-1.5 bg-[#FFD700]/20 text-[#FFD700] rounded-full">
                            <svg class="w-4 h-4 mr-1 sm:mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <span class="text-xs sm:text-sm">Express 5-7j</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contenu principal du header avec meilleure adaptation mobile --}}
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

                    {{-- Tags informatifs - Redessinés pour mobile --}}
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
                        <!-- Form with multi-step navigation -->
                        <form action="{{ route('admin.shipments.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                            @csrf

                            <!-- Step tabs navigation for mobile -->
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

                            <!-- Form steps -->
                            <div class="p-6 space-y-6">
                                <!-- Step 1: Sender Information -->
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

                                        <div class="p-4 bg-blue-50 rounded-xl text-sm text-blue-800 mb-4">
                                            <div class="flex items-start">
                                                <i class="fas fa-info-circle mt-0.5 mr-2"></i>
                                                <p>Le numéro de téléphone doit être au format international pour
                                                    WhatsApp (ex: +33612345678)</p>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label for="sender_name"
                                                    class="block text-sm font-medium text-gray-700">Nom complet <span
                                                        class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-user-circle text-gray-400"></i>
                                                    </div>
                                                    <input type="text" id="sender_name" name="sender_name"
                                                        required
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="John Doe">
                                                </div>
                                            </div>
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
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="+33612345678"
                                                        pattern="^\+[0-9]{1,3}[0-9]{6,14}$">
                                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                                        id="phone-validation">
                                                        <!-- Dynamically populated by JS -->
                                                    </div>
                                                </div>
                                                <p class="mt-1 text-xs text-gray-500">Format: +33612345678 (avec code
                                                    pays)</p>
                                            </div>

                                            <div class="md:col-span-2">
                                                <label for="email"
                                                    class="block text-sm font-medium text-gray-700">Email <span
                                                        class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-envelope text-gray-400"></i>
                                                    </div>
                                                    <input type="email" id="email" name="email" required
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="john.doe@example.com">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation buttons -->
                                    <div class="mt-8 flex justify-end">
                                        <button type="button"
                                            class="next-step px-5 py-2.5 bg-[#0077be] hover:bg-[#005c91] text-white font-medium rounded-xl transition-colors duration-200 flex items-center">
                                            Suivant
                                            <i class="fas fa-arrow-right ml-2"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Step 2: Recipient Information -->
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
                                                <p>Le numéro de téléphone doit être au format international pour
                                                    WhatsApp (ex: +33612345678)</p>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label for="recipient_name"
                                                    class="block text-sm font-medium text-gray-700">Nom complet <span
                                                        class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-user-circle text-gray-400"></i>
                                                    </div>
                                                    <input type="text" id="recipient_name" name="recipient_name"
                                                        required
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="Jane Doe">
                                                </div>
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
                                                        required
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="+33612345678"
                                                        pattern="^\+[0-9]{1,3}[0-9]{6,14}$">
                                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                                        id="recipient-phone-validation">
                                                        <!-- Dynamically populated by JS -->
                                                    </div>
                                                </div>
                                                <p class="mt-1 text-xs text-gray-500">Format: +33612345678 (avec code
                                                    pays)</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation buttons -->
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

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label for="weight"
                                                    class="block text-sm font-medium text-gray-700">Poids (kg) <span
                                                        class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-weight-hanging text-gray-400"></i>
                                                    </div>
                                                    <input type="number" step="0.1" min="0.1"
                                                        id="weight" name="weight" required
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="5.0">
                                                    <div
                                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                        <span class="text-gray-500 text-sm">kg</span>
                                                    </div>
                                                </div>
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
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="49.99">
                                                    <div
                                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                        <span class="text-gray-500 text-sm">€</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="md:col-span-2">
                                                <label for="description_colis"
                                                    class="block text-sm font-medium text-gray-700">Description du
                                                    colis <span class="text-red-500">*</span></label>
                                                <div class="mt-1 relative rounded-xl shadow-sm">
                                                    <textarea id="description_colis" name="description_colis" rows="3" required
                                                        class="w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="Décrivez le contenu du colis..."></textarea>
                                                </div>
                                                <div class="flex justify-between mt-1">
                                                    <p class="text-xs text-gray-500">Soyez précis pour faciliter le
                                                        dédouanement</p>
                                                    <span id="description-character-count"
                                                        class="text-xs text-gray-500">0/500</span>
                                                </div>
                                            </div>

                                            <!-- Section Upload d'Images -->
                                            <div class="md:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700 mb-3">
                                                    <i class="fas fa-camera mr-2 text-[#0077be]"></i>
                                                    Photos du colis
                                                </label>

                                                <!-- Zone de drop pour les images -->
                                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 bg-gray-50 hover:bg-gray-100 transition-colors duration-200"
                                                    id="image-drop-zone">
                                                    <div class="text-center">
                                                        <i
                                                            class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                                        <p class="text-sm text-gray-600 mb-2">Glissez-déposez vos
                                                            images ici ou</p>
                                                        <button type="button" id="select-images-btn"
                                                            class="inline-flex items-center px-4 py-2 bg-[#0077be] text-white rounded-lg hover:bg-[#005c91] transition-colors">
                                                            <i class="fas fa-camera mr-2"></i>
                                                            Prendre/Choisir des photos
                                                        </button>
                                                        <input type="file" id="images-input" name="images[]"
                                                            multiple accept="image/*" capture="environment"
                                                            class="hidden">
                                                        <p class="text-xs text-gray-500 mt-2">JPEG, PNG, JPG, GIF
                                                            jusqu'à 2MB chacune</p>
                                                    </div>
                                                </div>

                                                <!-- Prévisualisation des images -->
                                                <div id="image-preview"
                                                    class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 hidden">
                                                </div>
                                            </div>

                                            <!-- Section Upload de Vidéos -->
                                            <div class="md:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700 mb-3">
                                                    <i class="fas fa-video mr-2 text-[#0077be]"></i>
                                                    Vidéos du colis
                                                </label>

                                                <!-- Zone de drop pour les vidéos -->
                                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 bg-gray-50 hover:bg-gray-100 transition-colors duration-200"
                                                    id="video-drop-zone">
                                                    <div class="text-center">
                                                        <i class="fas fa-video text-4xl text-gray-400 mb-4"></i>
                                                        <p class="text-sm text-gray-600 mb-2">Glissez-déposez vos
                                                            vidéos ici ou</p>
                                                        <button type="button" id="select-videos-btn"
                                                            class="inline-flex items-center px-4 py-2 bg-[#0077be] text-white rounded-lg hover:bg-[#005c91] transition-colors">
                                                            <i class="fas fa-video mr-2"></i>
                                                            Filmer/Choisir des vidéos
                                                        </button>
                                                        <input type="file" id="videos-input" name="videos[]"
                                                            multiple accept="video/*" capture="environment"
                                                            class="hidden">
                                                        <p class="text-xs text-gray-500 mt-2">MP4, AVI, MOV, WMV
                                                            jusqu'à 10MB chacune</p>
                                                    </div>
                                                </div>

                                                <!-- Prévisualisation des vidéos -->
                                                <div id="video-preview"
                                                    class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4 hidden"></div>
                                            </div>

                                            <div class="md:col-span-2">
                                                <div class="flex space-x-4">
                                                    <label class="flex items-center text-sm">
                                                        <input type="checkbox" name="fragile"
                                                            class="rounded text-[#0077be] focus:ring-[#0077be] mr-2">
                                                        Contenu fragile
                                                    </label>
                                                    <label class="flex items-center text-sm">
                                                        <input type="checkbox" name="assurance"
                                                            class="rounded text-[#0077be] focus:ring-[#0077be] mr-2">
                                                        Assurance premium
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation buttons -->
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
                                </div>>

                                <!-- Step 4: Destination -->
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
                                                        <option value="France">France</option>
                                                        <option value="Cameroun">Cameroun</option>
                                                        <option value="Belgique">Belgique</option>
                                                    </select>
                                                </div>
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
                                                        class="pl-10 w-full rounded-xl border-2 border-gray-200 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]"
                                                        placeholder="Paris">
                                                </div>
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
                                                        placeholder="25 Rue du Commerce, 75015 Paris, France"></textarea>
                                                </div>
                                            </div>

                                            <div class="md:col-span-2">
                                                <div id="service-point-container"
                                                    class="p-4 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200 space-y-2 hidden">
                                                    <h4 class="font-medium text-gray-700 flex items-center">
                                                        <i class="fas fa-map-pin text-[#0077be] mr-2"></i>
                                                        Point de service disponible
                                                    </h4>
                                                    <div id="service-point-list" class="text-sm text-gray-600">
                                                        <!-- Populated by JS -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation buttons -->
                                    <div class="mt-8 flex justify-between">
                                        <button type="button"
                                            class="prev-step px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-xl transition-colors duration-200 flex items-center">
                                            <i class="fas fa-arrow-left mr-2"></i>
                                            Précédent
                                        </button>
                                        <button type="submit"
                                            class="px-6 py-2.5 bg-[#0077be] hover:bg-[#005c91] text-white font-medium rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center">
                                            <i class="fas fa-paper-plane mr-2"></i>
                                            Créer le colis
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Side Panel with Responsive Improvements -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Quick Summary - Mobile Only -->
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

                    <!-- Support Contact - Improved responsive design -->
                    <div
                        class="bg-gradient-to-br from-[#0077be] to-[#005c91] text-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-5 space-y-5">
                            <div class="flex items-center space-x-3 border-b border-white/20 pb-4">
                                <div class="p-2 bg-white/10 rounded-full">
                                    <i class="fas fa-headset text-xl"></i>
                                </div>
                                <h3 class="text-lg font-bold">Support 24/7</h3>
                            </div>

                            <!-- Service Points - Enhanced UI -->
                            <div id="service_points" class="space-y-3 max-h-60 overflow-y-auto pr-1 hide-scrollbar">
                                <!-- Populated by JS -->
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

                    <!-- Forbidden Items Section - Enhanced with accordion -->
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

                    <!-- Pricing Calculator - New component -->
                    <div class="bg-white rounded-2xl shadow-lg p-5 hidden lg:block">
                        <div class="flex items-center space-x-3 text-[#0077be] mb-4">
                            <div class="p-2 bg-blue-100 rounded-full">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <h3 class="text-lg font-bold">Estimation</h3>
                        </div>

                        <div id="pricing-calculator" class="space-y-4">
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-700">Poids</span>
                                <span class="font-medium" id="calc-weight">0 kg</span>
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
                </div>
            </div>
        </div>
    </div>

    <!-- Improved scripts with form validation and multi-step functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Multi-step form navigation
            const formSteps = document.querySelectorAll('.form-step');
            const nextButtons = document.querySelectorAll('.next-step');
            const prevButtons = document.querySelectorAll('.prev-step');
            const progressBar = document.getElementById('progress-bar');
            const progressSteps = document.querySelectorAll('.progress-step');
            const tabButtons = document.querySelectorAll('.step-tab');

            // Progress bar update function
            function updateProgress(step) {
                const percent = ((step - 1) / (formSteps.length - 1)) * 100;
                progressBar.style.width = `${percent}%`;

                // Update progress steps
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

                // Update mobile tabs
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

            // Show a specific step
            function showStep(step) {
                formSteps.forEach(formStep => {
                    formStep.classList.remove('active');
                    formStep.style.display = 'none';
                });

                const currentStep = document.querySelector(`.form-step[data-step="${step}"]`);
                currentStep.classList.add('active');
                currentStep.style.display = 'block';

                updateProgress(step);

                // Scroll to top of form on mobile
                if (window.innerWidth < 640) {
                    const form = document.getElementById('shipping-form');
                    form.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }

            // Initialize the form - show first step
            formSteps.forEach(step => {
                step.style.display = 'none';
            });
            showStep(1);

            // Next button click handlers
            nextButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = parseInt(this.closest('.form-step').dataset.step);
                    const nextStep = currentStep + 1;

                    // Simple validation before proceeding
                    const currentFields = this.closest('.form-step').querySelectorAll(
                        'input[required], select[required], textarea[required]');
                    let isValid = true;

                    currentFields.forEach(field => {
                        if (!field.value) {
                            isValid = false;
                            field.classList.add('border-red-500');

                            // Add shake animation
                            field.classList.add('animate-shake');
                            setTimeout(() => {
                                field.classList.remove('animate-shake');
                            }, 500);

                            // Show validation message
                            let errorMsg = field.parentNode.querySelector('.error-message');
                            if (!errorMsg) {
                                errorMsg = document.createElement('p');
                                errorMsg.className =
                                    'text-red-500 text-xs mt-1 error-message';
                                errorMsg.innerText = 'Ce champ est requis';
                                field.parentNode.appendChild(errorMsg);
                            }
                        } else {
                            field.classList.remove('border-red-500');
                            const errorMsg = field.parentNode.querySelector(
                                '.error-message');
                            if (errorMsg) errorMsg.remove();
                        }
                    });

                    if (isValid && nextStep <= formSteps.length) {
                        showStep(nextStep);
                        updateSummary();
                    }
                });
            });

            // Previous button click handlers
            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = parseInt(this.closest('.form-step').dataset.step);
                    const prevStep = currentStep - 1;

                    if (prevStep >= 1) {
                        showStep(prevStep);
                    }
                });
            });

            // Mobile tab navigation
            tabButtons.forEach(tab => {
                tab.addEventListener('click', function() {
                    const step = parseInt(this.dataset.step);
                    showStep(step);
                });
            });

            // Phone number format validation for WhatsApp
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

                    // Remove error message if exists
                    const errorMsg = input.parentNode.parentNode.querySelector('.error-message');
                    if (errorMsg) errorMsg.remove();
                } else {
                    phoneValidationDiv.innerHTML = '<i class="fas fa-times-circle text-red-500"></i>';
                    input.classList.remove('border-green-500');

                    if (showError) {
                        input.classList.add('border-red-500');

                        // Show error message if not already shown
                        let errorMsg = input.parentNode.parentNode.querySelector('.error-message');
                        if (!errorMsg) {
                            errorMsg = document.createElement('p');
                            errorMsg.className = 'text-red-500 text-xs mt-1 error-message';
                            errorMsg.innerText = 'Format invalide pour WhatsApp. Utilisez le format +33612345678';
                            input.parentNode.parentNode.appendChild(errorMsg);
                        }
                    }
                }
            }

            // Description character counter
            const descriptionTextarea = document.getElementById('description_colis');
            const characterCount = document.getElementById('description-character-count');

            if (descriptionTextarea && characterCount) {
                descriptionTextarea.addEventListener('input', function() {
                    const count = this.value.length;
                    characterCount.textContent = `${count}/200`;

                    if (count > 200) {
                        characterCount.classList.add('text-red-500');
                        characterCount.classList.remove('text-gray-500');
                    } else {
                        characterCount.classList.remove('text-red-500');
                        characterCount.classList.add('text-gray-500');
                    }
                });
            }

            // Service points display
            const servicePoints = {
                'France': {
                    'Paris': ['Gare du Nord', 'Gare de Lyon'],
                    'Lyon': ['Part-Dieu', 'Perrache']
                },
                'Cameroun': {
                    'Douala': ['Aeroport International de Douala'],
                    'Yaoundé': ['Aeroport International de Nsimalen']
                },
                'Belgique': {
                    'Bruxelles': ['Gare Centrale', 'Avenue Louise'],
                    'Liège': ['Guillemins']
                }
            };

            const countrySelect = document.getElementById('country');
            const cityInput = document.getElementById('city');
            const servicePointsDiv = document.getElementById('service_points');
            const servicePointContainer = document.getElementById('service-point-container');
            const servicePointList = document.getElementById('service-point-list');

            if (countrySelect && servicePointsDiv) {
                countrySelect.addEventListener('change', function() {
                    const country = this.value;

                    // Update the sidebar service points
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
                });

                if (cityInput) {
                    cityInput.addEventListener('input', updateCityServicePoints);
                    cityInput.addEventListener('change', updateCityServicePoints);
                }

                function updateCityServicePoints() {
                    const country = countrySelect.value;
                    const city = cityInput.value.trim();

                    if (servicePointContainer && servicePointList) {
                        if (country && city && servicePoints[country] && servicePoints[country][city]) {
                            const points = servicePoints[country][city];
                            servicePointList.innerHTML = `
                                <p>Points de service à ${city}:</p>
                                <ul class="list-disc ml-5 mt-1">
                                    ${points.map(point => `<li>${point}</li>`).join('')}
                                </ul>
                            `;
                            servicePointContainer.classList.remove('hidden');
                        } else {
                            servicePointContainer.classList.add('hidden');
                        }
                    }
                }
            }

            // Mobile summary updates
            function updateSummary() {
                const senderName = document.getElementById('sender_name').value || '-';
                const recipientName = document.getElementById('recipient_name').value || '-';
                const country = document.getElementById('country').value || '';
                const city = document.getElementById('city').value || '';

                document.getElementById('summary-sender').textContent = senderName;
                document.getElementById('summary-recipient').textContent = recipientName;

                if (country && city) {
                    document.getElementById('summary-destination').textContent = `${city}, ${country}`;
                } else {
                    document.getElementById('summary-destination').textContent = '-';
                }

                // Update pricing calculator
                updatePricingCalculator();
            }

            // Pricing calculator
            const weightInput = document.getElementById('weight');
            const priceInput = document.getElementById('price');
            const assuranceCheckbox = document.querySelector('input[name="assurance"]');

            function updatePricingCalculator() {
                const weight = parseFloat(weightInput.value) || 0;
                const basePrice = parseFloat(priceInput.value) || 0;
                const hasAssurance = assuranceCheckbox?.checked || false;

                const calcWeight = document.getElementById('calc-weight');
                const calcBasePrice = document.getElementById('calc-base-price');
                const calcInsurance = document.getElementById('calc-insurance');
                const calcTotal = document.getElementById('calc-total');

                if (calcWeight) calcWeight.textContent = `${weight.toFixed(1)} kg`;
                if (calcBasePrice) calcBasePrice.textContent = `${basePrice.toFixed(2)} €`;

                let insuranceAmount = 0;
                if (hasAssurance && basePrice > 0) {
                    insuranceAmount = Math.max(5, basePrice * 0.05); // 5€ ou 5% de la valeur
                }

                if (calcInsurance) calcInsurance.textContent = `${insuranceAmount.toFixed(2)} €`;
                if (calcTotal) calcTotal.textContent = `${(basePrice + insuranceAmount).toFixed(2)} €`;
            }

            if (weightInput) weightInput.addEventListener('input', updatePricingCalculator);
            if (priceInput) priceInput.addEventListener('input', updatePricingCalculator);
            if (assuranceCheckbox) assuranceCheckbox.addEventListener('change', updatePricingCalculator);

            // Forbidden items accordion
            const forbiddenToggle = document.getElementById('forbidden-toggle');
            const forbiddenContent = document.getElementById('forbidden-content');
            const forbiddenIcon = document.getElementById('forbidden-icon');

            if (forbiddenToggle && forbiddenContent && forbiddenIcon) {
                forbiddenToggle.addEventListener('click', function() {
                    forbiddenContent.classList.toggle('hidden');
                    forbiddenIcon.classList.toggle('rotate-180');
                });
            }

            // Add shake animation style
            const style = document.createElement('style');
            style.textContent = `
                @keyframes shake {
                    0%, 100% { transform: translateX(0); }
                    10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                    20%, 40%, 60%, 80% { transform: translateX(5px); }
                }
                .animate-shake {
                    animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
                }
                .hide-scrollbar::-webkit-scrollbar {
                    display: none;
                }
                .hide-scrollbar {
                    -ms-overflow-style: none;
                    scrollbar-width: none;
                }
            `;
            document.head.appendChild(style);

            // Initialize form
            updateSummary();
        });


        document.addEventListener('DOMContentLoaded', function() {
            // Variables pour la gestion des médias
            const imageInput = document.getElementById('images-input');
            const videoInput = document.getElementById('videos-input');
            const selectImagesBtn = document.getElementById('select-images-btn');
            const selectVideosBtn = document.getElementById('select-videos-btn');
            const imageDropZone = document.getElementById('image-drop-zone');
            const videoDropZone = document.getElementById('video-drop-zone');
            const imagePreview = document.getElementById('image-preview');
            const videoPreview = document.getElementById('video-preview');

            let selectedImages = [];
            let selectedVideos = [];

            // Gestionnaire pour le bouton de sélection d'images
            if (selectImagesBtn && imageInput) {
                selectImagesBtn.addEventListener('click', function() {
                    imageInput.click();
                });

                imageInput.addEventListener('change', function(e) {
                    handleImageFiles(e.target.files);
                });
            }

            // Gestionnaire pour le bouton de sélection de vidéos
            if (selectVideosBtn && videoInput) {
                selectVideosBtn.addEventListener('click', function() {
                    videoInput.click();
                });

                videoInput.addEventListener('change', function(e) {
                    handleVideoFiles(e.target.files);
                });
            }

            // Gestionnaire drag & drop pour les images
            if (imageDropZone) {
                imageDropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    this.classList.add('border-[#0077be]', 'bg-blue-50');
                });

                imageDropZone.addEventListener('dragleave', function(e) {
                    e.preventDefault();
                    this.classList.remove('border-[#0077be]', 'bg-blue-50');
                });

                imageDropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    this.classList.remove('border-[#0077be]', 'bg-blue-50');

                    const files = Array.from(e.dataTransfer.files).filter(file =>
                        file.type.startsWith('image/')
                    );

                    if (files.length > 0) {
                        handleImageFiles(files);
                    }
                });
            }

            // Gestionnaire drag & drop pour les vidéos
            if (videoDropZone) {
                videoDropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    this.classList.add('border-[#0077be]', 'bg-blue-50');
                });

                videoDropZone.addEventListener('dragleave', function(e) {
                    e.preventDefault();
                    this.classList.remove('border-[#0077be]', 'bg-blue-50');
                });

                videoDropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    this.classList.remove('border-[#0077be]', 'bg-blue-50');

                    const files = Array.from(e.dataTransfer.files).filter(file =>
                        file.type.startsWith('video/')
                    );

                    if (files.length > 0) {
                        handleVideoFiles(files);
                    }
                });
            }

            // Fonction pour gérer les fichiers images
            function handleImageFiles(files) {
                Array.from(files).forEach(file => {
                    // Vérifier la taille (2MB max)
                    if (file.size > 2 * 1024 * 1024) {
                        alert(`L'image "${file.name}" est trop volumineuse. Taille maximale : 2MB`);
                        return;
                    }

                    // Vérifier le type
                    if (!file.type.startsWith('image/')) {
                        alert(`Le fichier "${file.name}" n'est pas une image valide.`);
                        return;
                    }

                    selectedImages.push(file);
                    displayImagePreview(file, selectedImages.length - 1);
                });

                updateImageInput();
                toggleImagePreview();
            }

            // Fonction pour gérer les fichiers vidéos
            function handleVideoFiles(files) {
                Array.from(files).forEach(file => {
                    // Vérifier la taille (10MB max)
                    if (file.size > 10 * 1024 * 1024) {
                        alert(`La vidéo "${file.name}" est trop volumineuse. Taille maximale : 10MB`);
                        return;
                    }

                    // Vérifier le type
                    if (!file.type.startsWith('video/')) {
                        alert(`Le fichier "${file.name}" n'est pas une vidéo valide.`);
                        return;
                    }

                    selectedVideos.push(file);
                    displayVideoPreview(file, selectedVideos.length - 1);
                });

                updateVideoInput();
                toggleVideoPreview();
            }

            // Afficher la prévisualisation d'une image
            function displayImagePreview(file, index) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'relative group';
                    previewItem.innerHTML = `
                <div class="aspect-square rounded-lg overflow-hidden bg-gray-100 border-2 border-gray-200">
                    <img src="${e.target.result}" alt="Prévisualisation" class="w-full h-full object-cover">
                </div>
                <button type="button" class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 transition-colors opacity-0 group-hover:opacity-100" onclick="removeImage(${index})">
                    <i class="fas fa-times"></i>
                </button>
                <div class="absolute bottom-2 left-2 bg-black/70 text-white text-xs px-2 py-1 rounded">
                    ${(file.size / 1024 / 1024).toFixed(1)}MB
                </div>
            `;
                    imagePreview.appendChild(previewItem);
                };
                reader.readAsDataURL(file);
            }

            // Afficher la prévisualisation d'une vidéo
            function displayVideoPreview(file, index) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'relative group';
                    previewItem.innerHTML = `
                <div class="aspect-video rounded-lg overflow-hidden bg-gray-100 border-2 border-gray-200">
                    <video src="${e.target.result}" class="w-full h-full object-cover" controls></video>
                </div>
                <button type="button" class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 transition-colors opacity-0 group-hover:opacity-100" onclick="removeVideo(${index})">
                    <i class="fas fa-times"></i>
                </button>
                <div class="absolute bottom-2 left-2 bg-black/70 text-white text-xs px-2 py-1 rounded">
                    ${(file.size / 1024 / 1024).toFixed(1)}MB
                </div>
            `;
                    videoPreview.appendChild(previewItem);
                };
                reader.readAsDataURL(file);
            }

            // Mettre à jour l'input des images
            function updateImageInput() {
                const dt = new DataTransfer();
                selectedImages.forEach(file => dt.items.add(file));
                imageInput.files = dt.files;
            }

            // Mettre à jour l'input des vidéos
            function updateVideoInput() {
                const dt = new DataTransfer();
                selectedVideos.forEach(file => dt.items.add(file));
                videoInput.files = dt.files;
            }

            // Afficher/masquer la prévisualisation des images
            function toggleImagePreview() {
                if (selectedImages.length > 0) {
                    imagePreview.classList.remove('hidden');
                } else {
                    imagePreview.classList.add('hidden');
                }
            }

            // Afficher/masquer la prévisualisation des vidéos
            function toggleVideoPreview() {
                if (selectedVideos.length > 0) {
                    videoPreview.classList.remove('hidden');
                } else {
                    videoPreview.classList.add('hidden');
                }
            }

            // Fonctions globales pour la suppression (accessibles depuis le HTML)
            window.removeImage = function(index) {
                selectedImages.splice(index, 1);
                imagePreview.innerHTML = '';
                selectedImages.forEach((file, newIndex) => {
                    displayImagePreview(file, newIndex);
                });
                updateImageInput();
                toggleImagePreview();
            };

            window.removeVideo = function(index) {
                selectedVideos.splice(index, 1);
                videoPreview.innerHTML = '';
                selectedVideos.forEach((file, newIndex) => {
                    displayVideoPreview(file, newIndex);
                });
                updateVideoInput();
                toggleVideoPreview();
            };

            // Validation avant soumission du formulaire
            const form = document.getElementById('shipping-form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    // Vérifier que les fichiers ne dépassent pas les limites
                    for (let file of selectedImages) {
                        if (file.size > 2 * 1024 * 1024) {
                            e.preventDefault();
                            alert('Une ou plusieurs images dépassent la taille maximale de 2MB.');
                            return;
                        }
                    }

                    for (let file of selectedVideos) {
                        if (file.size > 10 * 1024 * 1024) {
                            e.preventDefault();
                            alert('Une ou plusieurs vidéos dépassent la taille maximale de 10MB.');
                            return;
                        }
                    }
                });
            }

            // Mettre à jour le compteur de caractères pour 500 caractères
            const descriptionTextarea = document.getElementById('description_colis');
            const characterCount = document.getElementById('description-character-count');

            if (descriptionTextarea && characterCount) {
                descriptionTextarea.addEventListener('input', function() {
                    const count = this.value.length;
                    characterCount.textContent = `${count}/500`;

                    if (count > 500) {
                        characterCount.classList.add('text-red-500');
                        characterCount.classList.remove('text-gray-500');
                        this.classList.add('border-red-500');
                    } else if (count > 450) {
                        characterCount.classList.add('text-orange-500');
                        characterCount.classList.remove('text-gray-500', 'text-red-500');
                        this.classList.remove('border-red-500');
                    } else {
                        characterCount.classList.remove('text-red-500', 'text-orange-500');
                        characterCount.classList.add('text-gray-500');
                        this.classList.remove('border-red-500');
                    }
                });
            }
        });
    </script>
</x-app-layout>
