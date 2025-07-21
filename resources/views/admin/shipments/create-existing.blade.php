<x-app-layout>
    <!-- Hero Section avec design amélioré -->
    <x-slot name="header">
        <div class="relative bg-gradient-to-r from-[#0077be] to-[#005c91] overflow-hidden">
            {{-- Navigation supérieure optimisée pour mobile --}}
            <div class="absolute top-0 left-0 right-0 h-16 bg-black/15 backdrop-blur-sm z-10">
                <div class="max-w-7xl mx-auto px-4 h-full">
                    <div class="flex items-center justify-between h-full">
                        {{-- Bouton retour avec meilleure responsive --}}
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-3 py-1.5 text-sm text-white bg-white/10 hover:bg-white/20 active:bg-white/30 rounded-lg transition-all group">
                            <svg class="w-5 h-5 mr-1 sm:mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                            </svg>
                            <span class="hidden sm:inline">Retour au dashboard</span>
                        </a>

                        {{-- Indicateur express avec meilleure lisibilité sur mobile --}}
                        <div
                            class="flex items-center px-3 py-1.5 bg-[#FFD700]/30 text-[#FFD700] rounded-full text-xs sm:text-sm font-medium backdrop-blur-sm shadow-sm">
                            <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" />
                            </svg>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Contenu principal optimisé pour mobile --}}
            <div class="pt-20 sm:pt-24 pb-16 sm:pb-20 px-4 max-w-7xl mx-auto">
                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between">
                    {{-- Section titre avec nouvelle icône de colis --}}
                    <div class="flex-1">
                        <div class="flex items-center space-x-4">
                            <div
                                class="p-3 sm:p-4 bg-gradient-to-br from-white/20 to-white/5 backdrop-blur-xl rounded-2xl shadow-lg border border-white/10">
                                <svg class="w-8 h-8 sm:w-12 sm:h-12 md:w-14 md:h-14 text-white" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M19 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.89 21 5 21H19C20.11 21 21 20.11 21 19V5C21 3.89 20.11 3 19 3ZM19 19H5V5H19V19ZM13.96 12.29L11.21 15.83L9.25 13.47L6.5 17H17.5L13.96 12.29Z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white">
                                    {{ __('Création de Colis') }}</h1>
                                <p class="mt-1 sm:mt-2 text-sm sm:text-base md:text-lg text-white/80">Expédition pour
                                    utilisateur existant</p>
                            </div>
                        </div>

                        {{-- Tags avec icônes plus pertinentes et meilleure adaptabilité --}}
                        <div class="flex flex-wrap gap-2 sm:gap-3 mt-4 sm:mt-6">
                            <span
                                class="flex items-center px-3 py-1 sm:px-4 sm:py-1.5 bg-white/10 backdrop-blur-lg rounded-full text-xs sm:text-sm text-white font-medium">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm4.2 14.2L11 13V7h1.5v5.2l4.5 2.7-.8 1.3z" />
                                </svg>
                                Suivi en temps réel
                            </span>
                            <span
                                class="flex items-center px-3 py-1 sm:px-4 sm:py-1.5 bg-[#FFD700]/20 text-[#FFD700] backdrop-blur-lg rounded-full text-xs sm:text-sm font-medium">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                                </svg>
                                Sécurité garantie
                            </span>
                        </div>
                    </div>

                    {{-- Bouton création pour mobile et desktop --}}
                    <div class="mt-6 md:mt-0">
                        <a href="{{ route('admin.shipments.create') }}"
                            class="inline-flex items-center px-4 py-2 sm:px-6 sm:py-3 bg-[#FFD700] hover:bg-[#FFD700]/90 active:bg-[#FFD700]/80 text-gray-900 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all text-sm sm:text-base">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                            Nouveau client + colis
                        </a>
                    </div>
                </div>
            </div>

            {{-- Les éléments décoratifs et la vague restent avec taille adaptative --}}
            <div class="absolute inset-0 z-0">
                <div
                    class="absolute top-20 right-0 w-48 h-48 sm:w-72 sm:h-72 bg-[#FFD700]/10 rounded-full filter blur-3xl">
                </div>
                <div
                    class="absolute bottom-0 left-1/4 w-32 h-32 sm:w-48 sm:h-48 bg-blue-400/10 rounded-full filter blur-2xl">
                </div>
            </div>

            <div class="absolute bottom-0 left-0 right-0">
                <svg class="w-full h-10 sm:h-16" viewBox="0 0 1440 54" fill="none" preserveAspectRatio="none">
                    <path
                        d="M0 54L60 50C120 46 240 38 360 34.7C480 31.3 600 32.7 720 34.7C840 36.7 960 39.3 1080 41.3C1200 43.3 1320 44.7 1380 45.3L1440 46V54H1380C1320 54 1200 54 1080 54C960 54 840 54 720 54C600 54 480 54 360 54C240 54 120 54 60 54H0Z"
                        fill="#f9fafb" />
                </svg>
            </div>
        </div>
    </x-slot>

    <!-- Contenu Principal avec meilleure structure responsive -->
    <main class="relative bg-gray-50 -mt-4 sm:-mt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
            @if ($errors->any())
                <div class="mb-6 animate-fade-in-down">
                    <div class="bg-white border-l-4 border-red-500 rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 sm:h-6 sm:w-6 text-red-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-base sm:text-lg font-semibold text-gray-900">Veuillez corriger les
                                        erreurs suivantes</h3>
                                    <div class="mt-2 text-xs sm:text-sm text-gray-600">
                                        <ul class="list-disc list-inside space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Structure en onglets pour mobile - amélioré -->
            <div class="block md:hidden mb-4 bg-white rounded-xl shadow-md overflow-hidden">
                <div class="flex border-b">
                    <button id="tab-users-btn" type="button"
                        class="tab-btn w-1/2 py-3 px-3 font-medium text-[#0077be] border-b-2 border-[#0077be] bg-white/90 transition-all duration-200">
                        <i class="fas fa-users mr-1.5"></i>
                        Utilisateurs
                    </button>
                    <button id="tab-form-btn" type="button"
                        class="tab-btn w-1/2 py-3 px-3 font-medium text-gray-500 border-b-2 border-transparent transition-all duration-200">
                        <i class="fas fa-box mr-1.5"></i>
                        Formulaire
                    </button>
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Sidebar - Liste des Utilisateurs avec amélioration UX -->
                <div id="users-tab" class="w-full md:w-96 md:flex-shrink-0">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col">
                        <div class="bg-gradient-to-r from-[#0077be] to-[#005c91] p-4">
                            <h2 class="text-base sm:text-lg font-semibold text-white flex items-center">
                                <i class="fas fa-users mr-2"></i>
                                Sélection de l'Utilisateur
                            </h2>
                        </div>

                        <!-- Barre de recherche améliorée -->
                        <div class="p-3 border-b border-gray-200">
                            <div
                                class="relative rounded-xl bg-gray-50 overflow-hidden focus-within:ring-2 focus-within:ring-[#0077be]">
                                <input type="text" id="user_search"
                                    class="w-full pl-10 pr-10 py-2.5 border-none bg-transparent focus:ring-0 text-sm"
                                    placeholder="Rechercher un utilisateur..." aria-label="Rechercher un utilisateur">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                <div id="search_spinner" class="absolute right-3 top-2.5 hidden">
                                    <svg class="animate-spin h-5 w-5 text-[#0077be]" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                    </svg>
                                </div>
                                <button id="clear-search" type="button"
                                    class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600 hidden"
                                    aria-label="Effacer la recherche">
                                    <i class="fas fa-times-circle"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Liste des utilisateurs améliorée -->
                        <div class="overflow-y-auto flex-grow" style="max-height: calc(100vh - 300px)">
                            <div class="divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <div class="user-item p-3.5 hover:bg-[#0077be]/5 active:bg-[#0077be]/10 cursor-pointer transition-all duration-200"
                                        data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}"
                                        data-user-email="{{ $user->email }}" data-user-phone="{{ $user->phone }}">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 rounded-xl bg-[#0077be]/90 text-white flex items-center justify-center font-bold text-base shadow-md">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="font-medium text-gray-900 truncate">{{ $user->name }}</p>
                                                <div class="flex flex-wrap gap-x-3 gap-y-0.5 mt-0.5">
                                                    @if ($user->email)
                                                        <p class="text-xs text-gray-500 truncate">
                                                            <i class="fas fa-envelope mr-1"></i>
                                                            {{ $user->email }}
                                                        </p>
                                                    @endif
                                                    @if ($user->phone)
                                                        <p class="text-xs text-gray-500 whitespace-nowrap">
                                                            <i class="fas fa-phone mr-1"></i>
                                                            {{ $user->phone }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="selected-check hidden text-[#0077be]">
                                                <i class="fas fa-check-circle text-lg"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Pagination améliorée -->
                        <div class="p-3 border-t border-gray-200 bg-gray-50 text-xs">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
                <!-- Formulaire Principal optimisé -->
                <div id="form-tab" class="w-full flex-1 hidden md:block">
                    <!-- CORRECTION IMPORTANTE : Ajout de enctype="multipart/form-data" pour l'upload de fichiers -->
                    <form action="{{ route('admin.shipments.store-existing') }}" method="POST" class="space-y-5"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" required>

                        <!-- Carte Utilisateur Sélectionné avec amélioration UX -->
                        <div id="selected_user_info" class="hidden animate-fade-in">
                            <div
                                class="bg-white rounded-2xl shadow-lg overflow-hidden mb-5 transform transition-all duration-300 hover:shadow-xl">
                                <div class="p-4 sm:p-5 sm:border-b sm:border-gray-100">
                                    <div class="flex items-center justify-between flex-wrap sm:flex-nowrap gap-3">
                                        <div class="flex items-center space-x-3 sm:space-x-4">
                                            <div id="user_avatar"
                                                class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-[#0077be]/90 text-white flex items-center justify-center font-bold text-xl shadow-md">
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <h3 id="user_name"
                                                    class="text-base sm:text-lg font-semibold text-gray-900 truncate">
                                                </h3>
                                                <p id="user_email" class="text-xs sm:text-sm text-gray-500 truncate">
                                                </p>
                                                <p id="user_phone" class="text-xs sm:text-sm text-gray-500"></p>
                                            </div>
                                        </div>
                                        <button type="button" id="clear_selection"
                                            class="text-gray-400 hover:text-red-500 active:text-red-600 transition-colors p-1.5 rounded-full hover:bg-red-50"
                                            aria-label="Effacer la sélection">
                                            <i class="fas fa-times-circle text-xl"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="px-4 sm:px-6 py-2 sm:py-3 bg-[#0077be]/5">
                                    <p class="text-xs sm:text-sm text-[#0077be] flex items-center">
                                        <i class="fas fa-info-circle mr-1.5"></i>
                                        Utilisateur sélectionné pour le colis
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Message si aucun utilisateur sélectionné avec meilleure visibilité -->
                        <div id="no_user_selected"
                            class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-lg mb-5">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-yellow-800">Attention</h3>
                                    <div class="mt-1 text-sm text-yellow-700">
                                        <p>Pour créer un colis, veuillez d'abord sélectionner un utilisateur dans la
                                            liste ci-contre.</p>
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" id="show-users-tab"
                                            class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded-md text-yellow-700 bg-yellow-100 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                            <i class="fas fa-users mr-1"></i>
                                            Voir la liste
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Détails du Colis avec conception améliorée -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="p-4 sm:p-6">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-900 flex items-center mb-4">
                                    <span
                                        class="flex items-center justify-center w-7 h-7 rounded-full bg-[#0077be]/10 text-[#0077be] mr-2">
                                        <i class="fas fa-box text-sm"></i>
                                    </span>
                                    Détails du Colis
                                </h3>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                                    <div class="space-y-4">
                                        <div class="floating-label">
                                            <div class="relative">
                                                <textarea name="description_colis" id="description_colis" rows="3" placeholder=" " required
                                                    class="w-full px-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20 text-sm resize-none"
                                                    maxlength="500">{{ old('description_colis') }}</textarea>
                                                <label for="description_colis" class="text-xs sm:text-sm">Description
                                                    du colis</label>
                                                <div class="absolute bottom-2 right-3 text-xs text-gray-400">
                                                    <span id="char-count">0</span>/500
                                                </div>
                                            </div>
                                            @error('description_colis')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <!-- Calculateur de Poids de Transport -->
                                        <div class="floating-label">
                                            <div class="relative">
                                                <input type="number" name="weight" id="weight" step="0.1"
                                                    placeholder=" " required min="0.1"
                                                    value="{{ old('weight') }}"
                                                    class="w-full px-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20 pr-12 text-sm">
                                                <div
                                                    class="absolute right-3 top-0 bottom-0 flex items-center pointer-events-none">
                                                    <span class="text-gray-500 text-xs sm:text-sm">kg</span>
                                                </div>
                                                <label for="weight" class="text-xs sm:text-sm">Poids réel</label>
                                            </div>
                                            @error('weight')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                            <!-- Affichage du poids facturé -->
                                            <div id="billed-weight-display"
                                                class="mt-2 p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-200 hidden">
                                                <div class="flex justify-between items-center">
                                                    <span class="text-sm text-gray-700 flex items-center">
                                                        <i class="fas fa-calculator text-[#0077be] mr-2"></i>
                                                        Poids facturé :
                                                    </span>
                                                    <span id="billed-weight-value"
                                                        class="font-bold text-lg text-[#0077be]">-- kg</span>
                                                </div>
                                                <div class="mt-1 text-xs text-gray-500">
                                                    Selon barème transport (tranches de 1kg + 0,2kg)
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Champ Prix -->
                                        <div class="floating-label">
                                            <div class="relative">
                                                <input type="number" name="price" id="price" step="0.01"
                                                    placeholder=" " required min="0.01"
                                                    value="{{ old('price') }}"
                                                    class="w-full px-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20 pr-12 text-sm">
                                                <div
                                                    class="absolute right-3 top-0 bottom-0 flex items-center pointer-events-none">
                                                    <span class="text-gray-500 text-xs sm:text-sm">€</span>
                                                </div>
                                                <label for="price" class="text-xs sm:text-sm">Prix</label>
                                            </div>
                                            @error('price')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Section Médias Unifiée AVEC CAMÉRA EN TEMPS RÉEL -->
                                    <div class="lg:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-3">
                                            <i class="fas fa-camera mr-2 text-[#0077be]"></i>
                                            Photos et Vidéos du colis
                                            <span class="text-red-500">*</span>
                                            <span class="text-xs text-gray-500 font-normal">(Au moins un média
                                                requis)</span>
                                        </label>

                                        <!-- Boutons d'action pour médias -->
                                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mb-4">
                                            <button type="button" id="take-photo-btn"
                                                class="inline-flex items-center justify-center px-3 py-2 bg-[#0077be] text-white text-xs sm:text-sm rounded-lg hover:bg-[#005c91] transition-colors">
                                                <i class="fas fa-camera mr-1 sm:mr-2"></i>
                                                <span class="hidden sm:inline">Prendre </span>Photo
                                            </button>
                                            <button type="button" id="record-video-btn"
                                                class="inline-flex items-center justify-center px-3 py-2 bg-red-500 text-white text-xs sm:text-sm rounded-lg hover:bg-red-600 transition-colors">
                                                <i class="fas fa-video mr-1 sm:mr-2"></i>
                                                <span class="hidden sm:inline">Filmer </span>Vidéo
                                            </button>
                                            <button type="button" id="select-images-btn"
                                                class="inline-flex items-center justify-center px-3 py-2 bg-gray-600 text-white text-xs sm:text-sm rounded-lg hover:bg-gray-700 transition-colors">
                                                <i class="fas fa-folder-open mr-1 sm:mr-2"></i>
                                                Images
                                            </button>
                                            <button type="button" id="select-videos-btn"
                                                class="inline-flex items-center justify-center px-3 py-2 bg-gray-600 text-white text-xs sm:text-sm rounded-lg hover:bg-gray-700 transition-colors">
                                                <i class="fas fa-file-video mr-1 sm:mr-2"></i>
                                                Vidéos
                                            </button>
                                        </div>

                                        <!-- Zone de drop unifiée -->
                                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 bg-gray-50 hover:bg-gray-100 transition-colors duration-200"
                                            id="media-drop-zone">
                                            <div class="text-center">
                                                <div class="flex justify-center space-x-4 mb-3">
                                                    <i class="fas fa-camera text-2xl text-gray-400"></i>
                                                    <i class="fas fa-video text-2xl text-gray-400"></i>
                                                    <i class="fas fa-cloud-upload-alt text-2xl text-gray-400"></i>
                                                </div>
                                                <p class="text-sm text-gray-600 mb-2">Glissez-déposez vos médias ici ou
                                                    utilisez les boutons ci-dessus</p>
                                                <p class="text-xs text-gray-500">Images: JPEG, PNG, JPG, GIF • Vidéos:
                                                    MP4, AVI, MOV, WMV</p>
                                                <p class="text-xs text-gray-500">Taille max: 10MB par fichier • Max: 10
                                                    images + 5 vidéos</p>
                                            </div>
                                        </div>

                                        <!-- Inputs file cachés -->
                                        <input type="file" id="images-input" name="images[]" multiple
                                            accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden">
                                        <input type="file" id="videos-input" name="videos[]" multiple
                                            accept="video/mp4,video/mov,video/avi,video/wmv" class="hidden">

                                        <!-- Prévisualisation unifiée des médias -->
                                        <div id="media-preview" class="mt-4 space-y-4">
                                            <!-- Section Images -->
                                            <div id="images-section" class="hidden">
                                                <h4 class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                                    <i class="fas fa-images text-[#0077be] mr-2"></i>
                                                    Images (<span id="images-count">0</span>/10)
                                                </h4>
                                                <div id="image-preview"
                                                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                                                </div>
                                            </div>

                                            <!-- Section Vidéos -->
                                            <div id="videos-section" class="hidden">
                                                <h4 class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                                    <i class="fas fa-video text-red-500 mr-2"></i>
                                                    Vidéos (<span id="videos-count">0</span>/5)
                                                </h4>
                                                <div id="video-preview" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Messages d'erreur -->
                                        @error('images')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                        @error('images.*')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                        @error('videos')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                        @error('videos.*')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                        @error('media')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Destinataire avec meilleure organisation -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="p-4 sm:p-6">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-900 flex items-center mb-4">
                                    <span
                                        class="flex items-center justify-center w-7 h-7 rounded-full bg-[#0077be]/10 text-[#0077be] mr-2">
                                        <i class="fas fa-user-check text-sm"></i>
                                    </span>
                                    Destinataire
                                </h3>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                                    <div class="space-y-4">
                                        <div class="floating-label">
                                            <div class="relative">
                                                <input type="text" name="recipient_name" id="recipient_name"
                                                    placeholder=" " required value="{{ old('recipient_name') }}"
                                                    class="w-full pl-10 pr-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20 text-sm">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <i class="fas fa-user-circle text-gray-400"></i>
                                                </div>
                                                <label for="recipient_name" class="text-xs sm:text-sm pl-6">Nom
                                                    complet</label>
                                            </div>
                                            @error('recipient_name')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="floating-label">
                                            <div class="relative">
                                                <input type="tel" name="recipient_phone" id="recipient_phone"
                                                    placeholder=" " required value="{{ old('recipient_phone') }}"
                                                    class="w-full pl-10 pr-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20 text-sm"
                                                    pattern="^\+[1-9]\d{1,14}$">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <i class="fab fa-whatsapp text-green-500"></i>
                                                </div>
                                                <label for="recipient_phone" class="text-xs sm:text-sm pl-6">Téléphone
                                                    (WhatsApp)</label>
                                            </div>
                                            <div class="flex items-center mt-1">
                                                <span class="text-xs text-gray-500 pl-1">Format:</span>
                                                <span
                                                    class="text-xs font-medium text-gray-700 ml-1 bg-gray-100 px-1.5 py-0.5 rounded">+33612345678</span>
                                            </div>
                                            @error('recipient_phone')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="floating-label">
                                            <div class="relative">
                                                <select name="country" id="country" required
                                                    class="w-full pl-10 pr-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20 text-sm">
                                                    <option value="">Sélectionnez un pays</option>
                                                    <option value="France"
                                                        {{ old('country') == 'France' ? 'selected' : '' }}>France
                                                    </option>
                                                    <option value="Cameroun"
                                                        {{ old('country') == 'Cameroun' ? 'selected' : '' }}>
                                                        Cameroun
                                                    </option>
                                                    <option value="Belgique"
                                                        {{ old('country') == 'Belgique' ? 'selected' : '' }}>
                                                        Belgique
                                                    </option>
                                                </select>
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <i class="fas fa-globe-europe text-gray-400"></i>
                                                </div>
                                                <label for="country" class="text-xs sm:text-sm pl-6">Pays</label>
                                            </div>
                                            @error('country')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="floating-label">
                                            <div class="relative">
                                                <input type="text" name="city" id="city" placeholder=" "
                                                    required value="{{ old('city') }}"
                                                    class="w-full pl-10 pr-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20 text-sm">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <i class="fas fa-city text-gray-400"></i>
                                                </div>
                                                <label for="city" class="text-xs sm:text-sm pl-6">Ville</label>
                                            </div>
                                            @error('city')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="floating-label">
                                            <div class="relative">
                                                <textarea name="destination_address" id="destination_address" rows="3" placeholder=" " required
                                                    class="w-full pl-10 pr-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20 text-sm">{{ old('destination_address') }}</textarea>
                                                <div
                                                    class="absolute top-2.5 left-0 pl-3 flex items-start pointer-events-none">
                                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                                </div>
                                                <label for="destination_address"
                                                    class="text-xs sm:text-sm pl-6">Adresse
                                                    complète</label>
                                            </div>
                                            <p class="mt-1 text-xs text-gray-500 pl-1">Incluez le numéro, la rue, le
                                                code postal et tout complément d'adresse</p>
                                            @error('destination_address')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Points de service disponibles -->
                                <div id="service-points-container" class="mt-5 hidden">
                                    <div class="p-3 bg-[#0077be]/5 rounded-lg border border-[#0077be]/10">
                                        <h4 class="text-sm font-medium text-gray-700 flex items-center">
                                            <i class="fas fa-map-pin text-[#0077be] mr-2"></i>
                                            Points de service disponibles
                                        </h4>
                                        <div id="service-points-list"
                                            class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-1 text-xs">
                                            <!-- Points de service dynamiques ici -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bouton de soumission amélioré -->
                        <div class="flex justify-end">
                            <button type="submit" id="submit_button" disabled
                                class="group inline-flex items-center px-5 py-2.5 sm:px-6 sm:py-3 bg-[#0077be] text-white font-medium rounded-xl shadow-lg hover:bg-[#005c91] active:bg-[#004e7a] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0077be] transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-[#0077be] text-sm sm:text-base">
                                <span class="flex items-center">
                                    <span id="submit-text" class="mr-2">Créer le colis</span>
                                    <svg id="loading-spinner"
                                        class="animate-spin -ml-1 mr-2 h-4 w-4 text-white hidden"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z">
                                        </path>
                                    </svg>
                                    <i id="submit-icon"
                                        class="fas fa-arrow-right transition-transform group-hover:translate-x-1"></i>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal Caméra Photo -->
    <div id="camera-modal"
        class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl overflow-hidden max-w-2xl w-full max-h-[90vh] flex flex-col">
            <div class="bg-[#0077be] text-white p-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold flex items-center">
                    <i class="fas fa-camera mr-2"></i>
                    Prendre une photo
                </h3>
                <button type="button" id="close-camera-btn" class="text-white hover:text-gray-200 p-1">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="flex-1 relative bg-black flex items-center justify-center min-h-[300px]">
                <video id="camera-video" autoplay playsinline class="max-w-full max-h-full rounded"></video>
                <canvas id="camera-canvas" class="hidden"></canvas>

                <!-- Overlay de guidage -->
                <div class="absolute inset-4 border-2 border-white/30 rounded-lg pointer-events-none">
                    <div class="absolute top-2 left-2 w-4 h-4 border-l-2 border-t-2 border-white"></div>
                    <div class="absolute top-2 right-2 w-4 h-4 border-r-2 border-t-2 border-white"></div>
                    <div class="absolute bottom-2 left-2 w-4 h-4 border-l-2 border-b-2 border-white"></div>
                    <div class="absolute bottom-2 right-2 w-4 h-4 border-r-2 border-b-2 border-white"></div>
                </div>

                <!-- Messages d'état -->
                <div id="camera-status" class="absolute top-4 left-4 right-4 text-center">
                    <div class="bg-black/50 text-white px-3 py-1 rounded-full text-sm hidden" id="camera-loading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>Initialisation de la caméra...
                    </div>
                </div>
            </div>

            <div class="p-4 bg-gray-50 flex justify-center space-x-4">
                <button type="button" id="capture-photo-btn"
                    class="inline-flex items-center px-6 py-3 bg-[#0077be] text-white rounded-lg hover:bg-[#005c91] transition-colors shadow-lg">
                    <i class="fas fa-camera mr-2"></i>
                    Capturer
                </button>
                <button type="button" id="switch-camera-btn"
                    class="inline-flex items-center px-4 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    <i class="fas fa-sync-alt mr-2"></i>
                    <span class="hidden sm:inline">Changer </span>Caméra
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Caméra Vidéo -->
    <div id="video-modal"
        class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl overflow-hidden max-w-2xl w-full max-h-[90vh] flex flex-col">
            <div class="bg-[#0077be] text-white p-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold flex items-center">
                    <i class="fas fa-video mr-2"></i>
                    Enregistrer une vidéo
                </h3>
                <button type="button" id="close-video-btn" class="text-white hover:text-gray-200 p-1">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="flex-1 relative bg-black flex items-center justify-center min-h-[300px]">
                <video id="video-camera" autoplay playsinline muted class="max-w-full max-h-full rounded"></video>

                <!-- Indicateur d'enregistrement -->
                <div id="recording-indicator"
                    class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm hidden">
                    <i class="fas fa-circle mr-1 animate-pulse"></i>
                    REC <span id="recording-time">00:00</span>
                </div>

                <!-- Overlay de guidage pour vidéo -->
                <div class="absolute inset-4 border-2 border-red-500/30 rounded-lg pointer-events-none">
                    <div class="absolute top-2 left-2 w-4 h-4 border-l-2 border-t-2 border-red-500"></div>
                    <div class="absolute top-2 right-2 w-4 h-4 border-r-2 border-t-2 border-red-500"></div>
                    <div class="absolute bottom-2 left-2 w-4 h-4 border-l-2 border-b-2 border-red-500"></div>
                    <div class="absolute bottom-2 right-2 w-4 h-4 border-r-2 border-b-2 border-red-500"></div>
                </div>

                <!-- Messages d'état vidéo -->
                <div id="video-status" class="absolute top-4 left-4 right-4 text-center">
                    <div class="bg-black/50 text-white px-3 py-1 rounded-full text-sm hidden" id="video-loading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>Initialisation de la caméra...
                    </div>
                </div>
            </div>

            <div class="p-4 bg-gray-50 flex justify-center space-x-4">
                <button type="button" id="start-recording-btn"
                    class="inline-flex items-center px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors shadow-lg">
                    <i class="fas fa-play mr-2"></i>
                    Démarrer
                </button>
                <button type="button" id="stop-recording-btn"
                    class="inline-flex items-center px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors shadow-lg hidden">
                    <i class="fas fa-stop mr-2"></i>
                    Arrêter
                </button>
                <button type="button" id="switch-video-camera-btn"
                    class="inline-flex items-center px-4 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    <i class="fas fa-sync-alt mr-2"></i>
                    <span class="hidden sm:inline">Changer </span>Caméra
                </button>
            </div>
        </div>
    </div>
    <style>
        /* Amélioration du système de labels flottants */
        .floating-label {
            position: relative;
        }

        .floating-label input,
        .floating-label textarea,
        .floating-label select {
            height: auto;
            padding-top: 1.25rem;
            padding-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .floating-label label {
            position: absolute;
            left: 1rem;
            top: 0.5rem;
            font-size: 0.7rem;
            color: #6b7280;
            pointer-events: none;
            transition: all 0.15s ease-out;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 0 4px;
            border-radius: 2px;
        }

        /* Correction de l'alignement des labels avec icônes */
        .floating-label .pl-10+label {
            left: 2.5rem;
        }

        /* Meilleure visibilité des placeholders */
        .floating-label input::placeholder,
        .floating-label textarea::placeholder,
        .floating-label select::placeholder {
            color: transparent;
        }

        /* Améliorations des contrastes et focus */
        .floating-label input:focus,
        .floating-label textarea:focus,
        .floating-label select:focus {
            border-color: #0077be !important;
            box-shadow: 0 0 0 2px rgba(0, 119, 190, 0.2);
        }

        /* Styles pour les modaux de caméra */
        #camera-modal video,
        #video-modal video {
            max-width: 100%;
            max-height: 400px;
            border-radius: 8px;
            object-fit: cover;
        }

        /* Animation d'apparition améliorée */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(5px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }

        /* Animation d'apparition du haut vers le bas */
        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-down {
            animation: fadeInDown 0.4s ease-out;
        }

        /* Animation d'erreur améliorée */
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
                transform: translateX(-4px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(4px);
            }
        }

        .animate-shake {
            animation: shake 0.6s cubic-bezier(.36, .07, .19, .97) both;
        }

        /* Animation pour les utilisateurs */
        .user-item {
            transition: all 0.2s ease-out;
        }

        .user-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Animation pulse pour l'enregistrement */
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .5;
            }
        }

        /* Réservation d'espace pour les éléments qui apparaissent dynamiquement */
        #selected_user_info {
            min-height: 0;
            transition: min-height 0.3s ease-out;
        }

        #selected_user_info.hidden {
            display: block;
            visibility: hidden;
            opacity: 0;
            min-height: 0;
            max-height: 0;
            overflow: hidden;
            margin: 0;
        }

        #selected_user_info:not(.hidden) {
            min-height: 120px;
            visibility: visible;
            opacity: 1;
        }

        #no_user_selected {
            transition: all 0.3s ease-out;
        }

        #no_user_selected.hidden {
            display: block;
            visibility: hidden;
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        /* Amélioration des barres de défilement pour tous les éléments */
        * {
            scrollbar-width: thin;
            scrollbar-color: #0077be #f1f1f1;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb {
            background: #0077be;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #005c91;
        }

        /* Styles pour la validation côté client */
        .has-media .border-red-500 {
            border-color: #10b981 !important;
        }

        .media-required {
            border-color: #ef4444 !important;
            background-color: #fef2f2 !important;
        }

        /* Styles pour les prévisualisations de médias */
        .media-preview-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .media-preview-item:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .media-preview-item .overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .media-preview-item:hover .overlay {
            opacity: 1;
        }

        .media-preview-item .delete-btn {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.2s ease;
        }

        .media-preview-item:hover .delete-btn {
            opacity: 1;
            transform: scale(1);
        }

        /* Amélioration de la responsivité pour les écrans les plus petits */
        @media (max-width: 640px) {

            .floating-label input,
            .floating-label textarea,
            .floating-label select {
                padding-top: 1.2rem;
                padding-bottom: 0.4rem;
                font-size: 0.8125rem;
            }

            .floating-label label {
                font-size: 0.65rem;
                top: 0.4rem;
            }

            .grid.grid-cols-1.lg\:grid-cols-2 {
                grid-gap: 0.75rem;
            }

            #camera-modal .max-w-2xl,
            #video-modal .max-w-2xl {
                max-width: 95vw;
                margin: 0 10px;
            }

            #camera-modal video,
            #video-modal video {
                max-height: 250px;
            }

            .mb-6 {
                margin-bottom: 1rem;
            }

            .space-y-4 {
                margin-top: 0.75rem;
            }

            button,
            .button {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }
        }

        /* Meilleure adaptation pour les très petits écrans */
        @media (max-width: 360px) {
            .text-xs {
                font-size: 0.65rem;
            }

            .sm\:h-14,
            .sm\:w-14 {
                height: 2.5rem;
                width: 2.5rem;
            }

            .px-3 {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            .floating-label textarea,
            .floating-label input,
            .floating-label select {
                font-size: 13px;
            }

            .floating-label label {
                font-size: 10px;
            }

            .p-3 {
                padding: 0.625rem;
            }

            .p-4 {
                padding: 0.75rem;
            }
        }

        /* Correction du contraste des boutons désactivés */
        button:disabled {
            opacity: 0.65;
        }

        /* Styles pour les notifications */
        .notification {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 60;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            color: white;
            transform: translateX(100%);
            transition: all 0.3s ease;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification.success {
            background-color: #10b981;
        }

        .notification.error {
            background-color: #ef4444;
        }

        .notification.info {
            background-color: #3b82f6;
        }

        /* Styles pour les zones de drop actives */
        #media-drop-zone.drag-over {
            border-color: #0077be;
            background-color: #eff6ff;
            transform: scale(1.02);
        }

        /* Styles pour les compteurs de médias */
        .media-counter {
            font-weight: 600;
            color: #0077be;
        }

        .media-counter.warning {
            color: #f59e0b;
        }

        .media-counter.danger {
            color: #ef4444;
        }
    </style>
    <script>
        // Variables globales pour la gestion des médias et de la caméra
        let currentStream = null;
        let mediaRecorder = null;
        let recordedChunks = [];
        let currentFacingMode = 'environment'; // 'user' pour caméra avant, 'environment' pour arrière
        let recordingInterval = null;
        let recordingStartTime = null;
        let currentSelection = null;
        let originalUsersList = null;

        // Variables pour les médias sélectionnés
        window.selectedImages = [];
        window.selectedVideos = [];

        document.addEventListener('DOMContentLoaded', function() {
            // Éléments DOM principaux
            const userSearch = document.getElementById('user_search');
            const clearSearch = document.getElementById('clear-search');
            const usersList = document.querySelector('.divide-y');
            const selectedUserInfo = document.getElementById('selected_user_info');
            const noUserSelected = document.getElementById('no_user_selected');
            const userIdInput = document.getElementById('user_id');
            const clearSelection = document.getElementById('clear_selection');
            const submitButton = document.getElementById('submit_button');
            const searchSpinner = document.getElementById('search_spinner');
            const tabUsersBtn = document.getElementById('tab-users-btn');
            const tabFormBtn = document.getElementById('tab-form-btn');
            const usersTab = document.getElementById('users-tab');
            const formTab = document.getElementById('form-tab');
            const countrySelect = document.getElementById('country');
            const cityInput = document.getElementById('city');
            const servicePointsContainer = document.getElementById('service-points-container');
            const servicePointsList = document.getElementById('service-points-list');
            const descriptionColis = document.getElementById('description_colis');
            const charCount = document.getElementById('char-count');
            const showUsersTabBtn = document.getElementById('show-users-tab');
            const phoneInput = document.getElementById('recipient_phone');
            const priceInput = document.getElementById('price');
            const weightInput = document.getElementById('weight');
            const form = document.querySelector('form');
            const submitText = document.getElementById('submit-text');
            const submitIcon = document.getElementById('submit-icon');
            const loadingSpinner = document.getElementById('loading-spinner');

            // Éléments DOM pour la caméra et les médias
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
            const cameraVideo = document.getElementById('camera-video');
            const videoCameraElement = document.getElementById('video-camera');
            const cameraCanvas = document.getElementById('camera-canvas');
            const recordingIndicator = document.getElementById('recording-indicator');
            const recordingTime = document.getElementById('recording-time');
            const imageInput = document.getElementById('images-input');
            const videoInput = document.getElementById('videos-input');
            const mediaDropZone = document.getElementById('media-drop-zone');
            const imagePreview = document.getElementById('image-preview');
            const videoPreview = document.getElementById('video-preview');
            const imagesSection = document.getElementById('images-section');
            const videosSection = document.getElementById('videos-section');
            const imagesCount = document.getElementById('images-count');
            const videosCount = document.getElementById('videos-count');

            // Amélioration de la gestion des labels flottants
            document.querySelectorAll('.floating-label input, .floating-label textarea, .floating-label select')
                .forEach(element => {
                    element.setAttribute('placeholder', ' ');

                    if (element.value) {
                        element.classList.add('has-value');
                    }

                    element.addEventListener('focus', function() {
                        this.classList.add('focused');
                    });

                    element.addEventListener('blur', function() {
                        this.classList.remove('focused');
                        if (this.value) {
                            this.classList.add('has-value');
                        } else {
                            this.classList.remove('has-value');
                        }
                    });

                    if (element.value) {
                        element.classList.add('has-value');
                    }
                });

            // Sauvegarder la liste originale des utilisateurs
            if (usersList) {
                originalUsersList = usersList.innerHTML;
            }

            // Vérifier la disponibilité de la caméra
            checkCameraAvailability();

            // Initialisation des gestionnaires d'événements
            initializeEventListeners();
            initializeUsersList();
            initializeMediaHandlers();

            // Initialisation des sélecteurs de pays/ville
            if (countrySelect && countrySelect.value === '') {
                countrySelect.value = 'France';
                countrySelect.dispatchEvent(new Event('change'));
            }

            // Initialiser les capacités vidéo MP4
            setTimeout(initializeVideoCapabilities, 1000);
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

        // Initialisation des capacités vidéo
        function initializeVideoCapabilities() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                checkVideoFormatsSupport();

                const mp4Supported = MediaRecorder.isTypeSupported('video/mp4');
                if (mp4Supported) {
                    console.log('📹 Enregistrement MP4 natif disponible');
                } else {
                    console.log('📹 Enregistrement WebM disponible (conversion MP4 possible côté serveur)');
                }
            }
        }

        // Fonction pour vérifier la disponibilité de la caméra
        function checkCameraAvailability() {
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                const takePhotoBtn = document.getElementById('take-photo-btn');
                const recordVideoBtn = document.getElementById('record-video-btn');

                if (takePhotoBtn) {
                    takePhotoBtn.disabled = true;
                    takePhotoBtn.innerHTML = '<i class="fas fa-camera-slash mr-2"></i>Caméra non disponible';
                    takePhotoBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }

                if (recordVideoBtn) {
                    recordVideoBtn.disabled = true;
                    recordVideoBtn.innerHTML = '<i class="fas fa-video-slash mr-2"></i>Caméra non disponible';
                    recordVideoBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }
        }

        // Initialisation des gestionnaires d'événements principaux
        function initializeEventListeners() {
            // Gestionnaires pour les onglets mobile
            const tabUsersBtn = document.getElementById('tab-users-btn');
            const tabFormBtn = document.getElementById('tab-form-btn');

            if (tabUsersBtn && tabFormBtn) {
                tabUsersBtn.addEventListener('click', () => activateTab('users'));
                tabFormBtn.addEventListener('click', () => activateTab('form'));
            }

            // Gestionnaires pour la recherche d'utilisateurs
            const userSearch = document.getElementById('user_search');
            const clearSearch = document.getElementById('clear-search');

            if (userSearch) {
                let searchTimeout;
                userSearch.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.trim();
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => searchUsers(searchTerm), 300);

                    if (searchTerm.length > 0) {
                        clearSearch?.classList.remove('hidden');
                    } else {
                        clearSearch?.classList.add('hidden');
                    }
                });

                userSearch.addEventListener('focus', function() {
                    this.select();
                });

                userSearch.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        userSearch.value = '';
                        clearSearch?.classList.add('hidden');
                        searchUsers('');
                    }
                });
            }

            if (clearSearch) {
                clearSearch.addEventListener('click', function() {
                    userSearch.value = '';
                    clearSearch.classList.add('hidden');
                    searchUsers('');
                    userSearch.focus();
                });
            }

            // Gestionnaire pour effacer la sélection d'utilisateur
            const clearSelection = document.getElementById('clear_selection');
            if (clearSelection) {
                clearSelection.addEventListener('click', clearUserSelection);
            }

            // Gestionnaires pour les points de service
            const countrySelect = document.getElementById('country');
            const cityInput = document.getElementById('city');

            if (countrySelect && cityInput) {
                countrySelect.addEventListener('change', updateServicePoints);
                cityInput.addEventListener('input', handleCityInput);
                cityInput.addEventListener('change', updateServicePoints);

                if (countrySelect.value) {
                    setTimeout(updateServicePoints, 300);
                }
            }

            // Gestionnaires pour la validation des champs
            initializeFieldValidation();
        }

        // Activation des onglets mobile
        function activateTab(tabName) {
            const tabUsersBtn = document.getElementById('tab-users-btn');
            const tabFormBtn = document.getElementById('tab-form-btn');
            const usersTab = document.getElementById('users-tab');
            const formTab = document.getElementById('form-tab');

            if (tabName === 'users') {
                tabUsersBtn?.classList.add('text-[#0077be]', 'border-[#0077be]', 'bg-white/90');
                tabUsersBtn?.classList.remove('text-gray-500', 'border-transparent');
                tabFormBtn?.classList.remove('text-[#0077be]', 'border-[#0077be]', 'bg-white/90');
                tabFormBtn?.classList.add('text-gray-500', 'border-transparent');

                usersTab?.classList.remove('hidden');
                formTab?.classList.add('hidden');
            } else {
                tabFormBtn?.classList.add('text-[#0077be]', 'border-[#0077be]', 'bg-white/90');
                tabFormBtn?.classList.remove('text-gray-500', 'border-transparent');
                tabUsersBtn?.classList.remove('text-[#0077be]', 'border-[#0077be]', 'bg-white/90');
                tabUsersBtn?.classList.add('text-gray-500', 'border-transparent');

                formTab?.classList.remove('hidden');
                usersTab?.classList.add('hidden');
            }
        }
        // Initialisation de la liste des utilisateurs
        function initializeUsersList() {
            document.querySelectorAll('.user-item').forEach(item => {
                item.addEventListener('click', () => {
                    selectUser(item);
                    if (window.innerWidth < 768) {
                        activateTab('form');
                    }
                });
            });
        }

        // Sélection d'un utilisateur
        function selectUser(userElement) {
            if (currentSelection) {
                currentSelection.classList.remove('bg-[#0077be]/10');
                currentSelection.querySelector('.selected-check').classList.add('hidden');
            }

            currentSelection = userElement;
            userElement.classList.add('bg-[#0077be]/10');
            userElement.querySelector('.selected-check').classList.remove('hidden');

            const userId = userElement.dataset.userId;
            const userName = userElement.dataset.userName;
            const userEmail = userElement.dataset.userEmail;
            const userPhone = userElement.dataset.userPhone;
            const initials = userName.split(' ')
                .map(n => n[0])
                .join('')
                .toUpperCase()
                .slice(0, 2);

            const userIdInput = document.getElementById('user_id');
            const selectedUserInfo = document.getElementById('selected_user_info');
            const noUserSelected = document.getElementById('no_user_selected');

            if (userIdInput) userIdInput.value = userId;

            const userAvatar = document.getElementById('user_avatar');
            const userNameEl = document.getElementById('user_name');
            const userEmailEl = document.getElementById('user_email');
            const userPhoneEl = document.getElementById('user_phone');

            if (userAvatar) userAvatar.textContent = initials;
            if (userNameEl) userNameEl.textContent = userName;
            if (userEmailEl) userEmailEl.textContent = userEmail || 'Pas d\'email';
            if (userPhoneEl) userPhoneEl.textContent = userPhone || 'Pas de téléphone';

            selectedUserInfo?.classList.remove('hidden');
            noUserSelected?.classList.add('hidden');

            validateForm();
        }

        // Recherche d'utilisateurs
        function searchUsers(term) {
            const searchSpinner = document.getElementById('search_spinner');
            const clearSearch = document.getElementById('clear-search');
            const usersList = document.querySelector('.divide-y');

            showSpinner();
            clearSearch?.classList.add('hidden');

            if (!term || term.length < 2) {
                if (originalUsersList && usersList) {
                    usersList.innerHTML = originalUsersList;
                    initializeUsersList();
                }
                hideSpinner();
                if (term.length === 0) {
                    clearSearch?.classList.add('hidden');
                }
                return;
            }

            const items = document.querySelectorAll('.user-item');
            const results = [];
            const termLower = term.toLowerCase();

            items.forEach(item => {
                const userName = item.dataset.userName.toLowerCase();
                const userEmail = (item.dataset.userEmail || '').toLowerCase();
                const userPhone = (item.dataset.userPhone || '').toLowerCase();

                if (userName.includes(termLower) ||
                    userEmail.includes(termLower) ||
                    userPhone.includes(termLower)) {
                    results.push(item.cloneNode(true));
                }
            });

            updateUsersList(results);

            if (term.length > 0) {
                clearSearch?.classList.remove('hidden');
            }

            hideSpinner();
        }

        // Mise à jour de la liste des utilisateurs
        function updateUsersList(items) {
            const usersList = document.querySelector('.divide-y');
            if (!usersList) return;

            usersList.innerHTML = '';

            if (items && items.length > 0) {
                items.forEach(item => {
                    usersList.appendChild(item);
                });
                initializeUsersList();
            } else {
                usersList.innerHTML = `
                    <div class="p-6 text-center">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 mb-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <p class="text-gray-500">Aucun utilisateur trouvé</p>
                        <p class="text-xs text-gray-400 mt-1">Essayez d'autres termes de recherche</p>
                    </div>
                `;
            }
        }

        // Gestion du spinner de recherche
        function showSpinner() {
            const searchSpinner = document.getElementById('search_spinner');
            searchSpinner?.classList.remove('hidden');
        }

        function hideSpinner() {
            const searchSpinner = document.getElementById('search_spinner');
            searchSpinner?.classList.add('hidden');
        }

        // Réinitialisation de la sélection d'utilisateur
        function clearUserSelection() {
            if (currentSelection) {
                currentSelection.classList.remove('bg-[#0077be]/10');
                currentSelection.querySelector('.selected-check').classList.add('hidden');
            }
            currentSelection = null;

            const userIdInput = document.getElementById('user_id');
            const selectedUserInfo = document.getElementById('selected_user_info');
            const noUserSelected = document.getElementById('no_user_selected');
            const submitButton = document.getElementById('submit_button');

            if (userIdInput) userIdInput.value = '';
            selectedUserInfo?.classList.add('hidden');
            noUserSelected?.classList.remove('hidden');
            if (submitButton) submitButton.disabled = true;
        }

        // Gestion des points de service
        const servicePoints = {
            'France': {
                'Paris': ['Gare du Nord', 'Gare de Lyon', 'République'],
                // 'Lyon': ['Part-Dieu', 'Perrache', 'Bellecour'],
                // 'Marseille': ['Gare Saint-Charles', 'Vieux Port']
            },
            'Cameroun': {
                'Douala': ['Aeroport International de Douala', 'Logpom Montana city'],
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
                updateServicePoints();

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
                    charCount.textContent = count;

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

            // Validation du numéro de téléphone
            const phoneInput = document.getElementById('recipient_phone');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    const value = e.target.value;

                    if (value && !value.startsWith('+')) {
                        e.target.value = '+' + value;
                    }

                    if (value.length > 3) {
                        if (!/^\+[1-9]\d{1,14}$/.test(value)) {
                            phoneInput.classList.add('border-orange-400');
                            phoneInput.classList.remove('border-green-400');
                        } else {
                            phoneInput.classList.remove('border-orange-400');
                            phoneInput.classList.add('border-green-400');
                        }
                    } else {
                        phoneInput.classList.remove('border-orange-400', 'border-green-400');
                    }
                });
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

            // Calculateur de poids avec affichage du poids facturé
            const weightInput = document.getElementById('weight');
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

            // Validation du formulaire
            const form = document.querySelector('form');
            if (form) {
                const requiredFields = form.querySelectorAll('[required]');

                requiredFields.forEach(field => {
                    field.addEventListener('invalid', function(e) {
                        e.preventDefault();
                        field.classList.add('border-red-500');
                        field.classList.add('animate-shake');
                        setTimeout(() => field.classList.remove('animate-shake'), 500);

                        const parentNode = field.closest('.floating-label') || field.parentNode;
                        let errorMsg = parentNode.querySelector('.error-message');

                        if (!errorMsg) {
                            errorMsg = document.createElement('p');
                            errorMsg.className = 'text-red-500 text-xs mt-1 error-message';

                            if (field.type === 'email') {
                                errorMsg.innerText = 'Veuillez entrer une adresse email valide';
                            } else if (field.type === 'tel') {
                                errorMsg.innerText = 'Veuillez entrer un numéro de téléphone valide';
                            } else if (field.type === 'number') {
                                errorMsg.innerText = 'Veuillez entrer une valeur numérique';
                            } else {
                                errorMsg.innerText = 'Ce champ est requis';
                            }

                            parentNode.appendChild(errorMsg);
                        }

                        if (window.innerWidth < 768 && !isElementInViewport(field)) {
                            activateTab('form');
                            setTimeout(() => {
                                field.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'center'
                                });
                            }, 300);
                        }

                        field.focus();
                    });

                    field.addEventListener('input', function() {
                        field.classList.remove('border-red-500');
                        const parentNode = field.closest('.floating-label') || field.parentNode;
                        const errorMsg = parentNode.querySelector('.error-message');
                        if (errorMsg) errorMsg.remove();
                    });
                });

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
                    if (submitText) submitText.textContent = 'Création en cours...';
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

        // Validation du formulaire
        function validateForm() {
            const userIdInput = document.getElementById('user_id');
            const submitButton = document.getElementById('submit_button');
            const mediaDropZone = document.getElementById('media-drop-zone');

            const hasUser = userIdInput && userIdInput.value !== '';
            const hasImages = window.selectedImages.length > 0;
            const hasVideos = window.selectedVideos.length > 0;
            const hasMedia = hasImages || hasVideos;

            if (hasUser && hasMedia) {
                if (submitButton) submitButton.disabled = false;
                if (mediaDropZone) mediaDropZone.classList.remove('media-required');
            } else {
                if (submitButton) submitButton.disabled = true;
                if (hasUser && !hasMedia && mediaDropZone) {
                    mediaDropZone.classList.add('media-required');
                }
            }
        }

        // Fonction utilitaire pour vérifier si un élément est visible
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Ajustements pour les petits écrans
        function adjustForSmallScreens() {
            if (window.innerWidth < 360) {
                document.querySelectorAll('.text-xs').forEach(el => {
                    el.style.fontSize = '0.65rem';
                });

                document.querySelectorAll('.p-4').forEach(el => {
                    el.classList.remove('p-4');
                    el.classList.add('p-3');
                });
            }
        }

        // Initialiser les ajustements responsive
        adjustForSmallScreens();
        window.addEventListener('resize', adjustForSmallScreens);
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
                    this.classList.add('drag-over');
                });

                mediaDropZone.addEventListener('dragleave', function(e) {
                    e.preventDefault();
                    this.classList.remove('drag-over');
                });

                mediaDropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    this.classList.remove('drag-over');

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
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
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
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
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
                    const file = new File([blob], fileName, { type: 'image/jpeg' });

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

        // CORRECTION: Démarrer l'enregistrement vidéo en MP4
        function startRecording() {
            if (!currentStream) return;

            recordedChunks = [];

            // Configuration pour MP4 avec priorité sur les codecs compatibles
            const options = [
                { mimeType: 'video/mp4; codecs="avc1.42E01E, mp4a.40.2"' }, // H.264 + AAC (meilleure compatibilité)
                { mimeType: 'video/mp4; codecs="avc1.42E01E"' },             // H.264 seulement
                { mimeType: 'video/mp4' },                                    // MP4 générique
                { mimeType: 'video/webm; codecs="vp9, opus"' },              // WebM VP9 (fallback)
                { mimeType: 'video/webm; codecs="vp8, opus"' },              // WebM VP8 (fallback)
                { mimeType: 'video/webm' }                                    // WebM générique (fallback)
            ];

            let selectedOption = null;

            // Trouver le premier format supporté
            for (const option of options) {
                if (MediaRecorder.isTypeSupported(option.mimeType)) {
                    selectedOption = option;
                    console.log('Format vidéo sélectionné:', option.mimeType);
                    break;
                }
            }

            // Si aucun format n'est supporté, utiliser le défaut
            if (!selectedOption) {
                selectedOption = {};
                console.warn('Aucun format préféré supporté, utilisation du format par défaut');
            }

            try {
                mediaRecorder = new MediaRecorder(currentStream, selectedOption);
            } catch (e) {
                console.error('Erreur MediaRecorder avec options:', e);
                // Fallback sans options
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
                    console.log('Chunk vidéo reçu:', event.data.size, 'bytes');
                }
            };

            mediaRecorder.onstop = function() {
                console.log('Arrêt de l\'enregistrement, chunks collectés:', recordedChunks.length);

                // Déterminer le type MIME et l'extension
                const mimeType = mediaRecorder.mimeType || selectedOption.mimeType || 'video/mp4';
                console.log('Type MIME final:', mimeType);

                let extension = '.mp4';
                let finalMimeType = 'video/mp4';

                // Conversion en MP4 si nécessaire
                if (mimeType.includes('mp4')) {
                    extension = '.mp4';
                    finalMimeType = 'video/mp4';
                } else if (mimeType.includes('webm')) {
                    // Pour WebM, on garde le format mais on peut le convertir côté serveur si nécessaire
                    extension = '.webm';
                    finalMimeType = mimeType;
                    console.log('Enregistrement en WebM, conversion MP4 possible côté serveur');
                }

                // Créer le blob avec le bon type MIME
                const blob = new Blob(recordedChunks, { type: finalMimeType });
                console.log('Blob vidéo créé:', blob.size, 'bytes, type:', blob.type);

                const fileName = `video_${Date.now()}${extension}`;
                const file = new File([blob], fileName, { type: finalMimeType });

                processRecordedVideo(file);
            };

            mediaRecorder.onerror = function(event) {
                console.error('Erreur MediaRecorder:', event.error);
                showNotification('Erreur lors de l\'enregistrement: ' + event.error.message, 'error');
            };

            // Démarrer l'enregistrement
            try {
                mediaRecorder.start(1000); // Collecter les données toutes les secondes
                recordingStartTime = Date.now();
                console.log('Enregistrement démarré');

                // Mettre à jour l'interface
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
            console.log('Traitement de la vidéo:', file.name, file.size, 'bytes');

            if (window.selectedVideos.length < 5) {
                // Vérifier la taille (limite à 50MB pour les vidéos)
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
                console.log('Vidéo ajoutée aux sélections');
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
                    showNotification(`L'image "${file.name}" est trop volumineuse. Taille maximale : 10MB`, 'error');
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
            const maxSize = 50 * 1024 * 1024; // 50MB pour les vidéos

            files.forEach(file => {
                if (window.selectedVideos.length >= maxVideos) {
                    showNotification(`Maximum ${maxVideos} vidéos autorisées.`, 'error');
                    return;
                }

                if (file.size > maxSize) {
                    showNotification(`La vidéo "${file.name}" est trop volumineuse. Taille maximale : 50MB`, 'error');
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

                // Déterminer l'icône selon le format
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

            // Mise à jour du compteur et affichage des images
            if (imagesCount) {
                imagesCount.textContent = window.selectedImages.length;
                imagesCount.className = 'media-counter';
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

            // Mise à jour du compteur et affichage des vidéos
            if (videosCount) {
                videosCount.textContent = window.selectedVideos.length;
                videosCount.className = 'media-counter';
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

        // Fonctions globales pour la suppression (accessibles depuis le HTML)
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

            // Animation d'entrée
            setTimeout(() => {
                notification.classList.add('show');
            }, 100);

            // Suppression automatique
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 5000);
        }

        // Connecter le bouton "Voir la liste" à l'onglet utilisateurs sur mobile
        const showUsersTabBtn = document.getElementById('show-users-tab');
        const tabUsersBtn = document.getElementById('tab-users-btn');
        if (showUsersTabBtn && tabUsersBtn) {
            showUsersTabBtn.addEventListener('click', function() {
                activateTab('users');
            });
        }

        // Initialisation finale
        function finalizeInitialization() {
            // Mise à jour initiale de l'affichage des médias
            updateMediaDisplay();

            // Validation initiale du formulaire
            validateForm();

            // Affichage d'un message de bienvenue si la caméra est disponible
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                console.log('📷 Caméra disponible - Fonctionnalités photo/vidéo activées');
            } else {
                console.warn('📷 Caméra non disponible - Seule l\'upload de fichiers est possible');
            }
        }

        // Appeler l'initialisation finale
        setTimeout(finalizeInitialization, 100);
    </script>

</x-app-layout>
