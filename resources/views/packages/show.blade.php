@props(['package'])

<x-app-layout>
    @push('styles')
        @vite('resources/css/app.css')
    @endpush

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush

    <div x-data="{
            isVisible: false,
            showImageModal: false,
            currentImageIndex: 0,
            currentVideoIndex: 0,
            showVideoModal: false
         }"
         x-init="setTimeout(() => { isVisible = true }, 100)"
         class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50/30">

        <!-- Header Modern avec Glass Effect -->
        <header class="sticky top-0 z-30 bg-white/80 backdrop-blur-2xl border-b border-gray-200/60 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16 sm:h-20">
                    <!-- Bouton retour et titre -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('dashboard') }}"
                           class="group flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-[#0077BE] to-[#0077BE] hover:from-[#0077BE] hover:to--[#0077BE] text-white rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 transform group-hover:-translate-x-0.5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                        </a>
                        <div>
                            <h1 class="text-lg sm:text-xl font-bold text-gray-900">Détails du Colis</h1>
                            <p class="text-xs sm:text-sm text-gray-500 hidden sm:block">Diaspora Shopping & Fly Logistics</p>
                        </div>
                    </div>

                    <!-- Status Badge -->
                    <div class="flex items-center space-x-2 bg-gradient-to-r from-green-50 to-emerald-50 px-3 py-2 sm:px-4 sm:py-2 rounded-full border border-green-200/60">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-xs sm:text-sm font-medium text-green-700">Suivi actif</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Container principal -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">

            <!-- Hero Section avec numéro de suivi -->
            <div class="text-center mb-8 sm:mb-12">
                <div class="inline-flex items-center space-x-2 bg-gradient-to-r from-blue-50 to-indigo-50 px-4 py-2 rounded-full mb-4 border border-blue-200/60">
                    <svg class="w-4 h-4 text-[#0077BE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm font-medium text-[#0077BE]">Suivi en temps réel</span>
                </div>

                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Votre Expédition</h2>

                <!-- Numéro de suivi moderne -->
                <div class="bg-white/90 backdrop-blur-sm border border-gray-200/60 rounded-2xl p-4 sm:p-6 inline-block shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer"
                     onclick="copyTrackingNumber()">
                    <p class="text-xs sm:text-sm font-medium text-gray-600 mb-2">Numéro de suivi</p>
                    <div class="flex items-center space-x-3">
                        <p class="text-xl sm:text-2xl font-mono font-bold text-gray-900 tracking-wider">{{ $package->tracking_number }}</p>
                        <svg class="w-5 h-5 text-gray-400 hover:text-[#0077BE] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Cliquez pour copier</p>
                </div>
            </div>

            <!-- Layout principal responsive -->
            <div class="grid grid-cols-1 xl:grid-cols-4 gap-6 lg:gap-8">

                <!-- Colonne principale (3/4) -->
                <div class="xl:col-span-3 space-y-6 lg:space-y-8">

                    <!-- Section Médias du Colis - Toujours visible -->
                    <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-lg border border-gray-200/60 overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50/50 p-4 sm:p-6 border-b border-gray-100">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900 flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                Médias du Colis
                                <span class="ml-auto bg-purple-100 text-purple-700 text-xs font-medium px-3 py-1 rounded-full">
                                    {{ (count($package->images ?? []) + count($package->videos ?? [])) ?: 'Aucun' }} fichier(s)
                                </span>
                            </h3>
                        </div>

                        <div class="p-4 sm:p-6 space-y-6">
                            <!-- Images -->
                            @if($package->images && count($package->images) > 0)
                            <div>
                                <h4 class="text-base sm:text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 text-[#0077BE] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Photos ({{ count($package->images) }})
                                </h4>

                                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
                                    @foreach($package->getImageUrls() as $index => $imageUrl)
                                    <div class="group relative cursor-pointer transform transition-all duration-300 hover:scale-105"
                                         @click="currentImageIndex = {{ $index }}; showImageModal = true">
                                        <div class="aspect-square rounded-xl sm:rounded-2xl overflow-hidden bg-gray-100 border-2 border-gray-200 group-hover:border-blue-400 transition-all duration-300 shadow-md group-hover:shadow-xl">
                                            <img src="{{ $imageUrl }}"
                                                 alt="Image du colis {{ $index + 1 }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        </div>

                                        <!-- Overlay avec icône d'agrandissement -->
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-all duration-300 rounded-xl sm:rounded-2xl flex items-center justify-center">
                                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white/20 backdrop-blur-sm rounded-full p-2 sm:p-3">
                                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Numéro de l'image -->
                                        <div class="absolute top-2 left-2 bg-black/70 text-white text-xs font-medium px-2 py-1 rounded-full">
                                            {{ $index + 1 }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div>
                                <h4 class="text-base sm:text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Photos (0)
                                </h4>

                                <div class="text-center py-8 border-2 border-dashed border-gray-300 rounded-xl bg-gray-50">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-gray-500 text-sm font-medium">Aucune photo disponible</p>
                                    <p class="text-gray-400 text-xs mt-1">Les photos du colis apparaîtront ici</p>
                                </div>
                            </div>
                            @endif

                            <!-- Vidéos -->
                            @if($package->videos && count($package->videos) > 0)
                            <div>
                                <h4 class="text-base sm:text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                    Vidéos ({{ count($package->videos) }})
                                </h4>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                                    @foreach($package->getVideoUrls() as $index => $videoUrl)
                                    <div class="group relative">
                                        <div class="aspect-video rounded-xl sm:rounded-2xl overflow-hidden bg-gray-100 border-2 border-gray-200 group-hover:border-red-400 transition-all duration-300 shadow-md group-hover:shadow-xl">
                                            <video src="{{ $videoUrl }}"
                                                   class="w-full h-full object-cover cursor-pointer"
                                                   controls
                                                   preload="metadata"
                                                   poster="">
                                                <source src="{{ $videoUrl }}" type="video/mp4">
                                                Votre navigateur ne supporte pas la lecture vidéo.
                                            </video>
                                        </div>

                                        <!-- Numéro de la vidéo -->
                                        <div class="absolute top-2 left-2 bg-black/70 text-white text-xs font-medium px-2 py-1 rounded-full flex items-center space-x-1">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                            <span>{{ $index + 1 }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div>
                                <h4 class="text-base sm:text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                    Vidéos (0)
                                </h4>

                                <div class="text-center py-8 border-2 border-dashed border-gray-300 rounded-xl bg-gray-50">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-gray-500 text-sm font-medium">Aucune vidéo disponible</p>
                                    <p class="text-gray-400 text-xs mt-1">Les vidéos du colis apparaîtront ici</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Timeline de progression moderne -->
                    <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-lg border border-gray-200/60 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50/50 p-4 sm:p-6 border-b border-gray-100">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900 flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                Suivi de Livraison
                            </h3>
                        </div>

                        <div class="p-4 sm:p-8">
                            @php
                                $statusSteps = [
                                    'registered' => ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Enregistré', 'desc' => 'Colis pris en charge', 'color' => 'blue'],
                                    'processing' => ['icon' => 'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16', 'label' => 'Préparation', 'desc' => 'En cours de préparation', 'color' => 'orange'],
                                    'in_transit' => ['icon' => 'M8 17l4 4 4-4m-4-5v9', 'label' => 'En Transit', 'desc' => 'En cours de livraison', 'color' => 'purple'],
                                    'delivered' => ['icon' => 'M5 13l4 4L19 7', 'label' => 'Livré', 'desc' => 'Livraison effectuée', 'color' => 'green'],
                                ];
                                $currentStatus = $package->status;
                                $statusIndex = array_search($currentStatus, array_keys($statusSteps));
                                $progressPercentage = $statusIndex !== false ? ($statusIndex / (count($statusSteps) - 1)) * 100 : 0;
                            @endphp

                            <!-- Timeline responsive -->
                            <div class="relative">
                                <!-- Ligne de progression -->
                                <div class="absolute top-8 sm:top-10 left-8 sm:left-12 right-8 sm:right-12 h-1 bg-gray-200 rounded-full hidden sm:block">
                                    <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full transition-all duration-2000 ease-out"
                                         style="width: {{ $progressPercentage }}%"></div>
                                </div>

                                <!-- Étapes -->
                                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                                    @foreach ($statusSteps as $status => $info)
                                        @php
                                            $stepIndex = array_search($status, array_keys($statusSteps));
                                            $isCompleted = $stepIndex <= $statusIndex;
                                            $isCurrent = $status === $currentStatus;
                                        @endphp

                                        <div class="text-center relative">
                                            <!-- Connecteur mobile (vertical) -->
                                            @if($stepIndex < count($statusSteps) - 1)
                                            <div class="absolute top-16 left-1/2 transform -translate-x-1/2 w-1 h-8 bg-gray-200 sm:hidden {{ $isCompleted ? 'bg-gradient-to-b from-blue-500 to-indigo-600' : '' }}"></div>
                                            @endif

                                            <!-- Cercle de statut -->
                                            <div class="relative w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-3 sm:mb-4">
                                                <div class="w-full h-full rounded-full border-4 flex items-center justify-center transition-all duration-700 transform {{ $isCompleted ? 'bg-gradient-to-br from-blue-500 to-indigo-600 border-blue-500 text-white shadow-lg scale-110' : 'bg-white border-gray-300 text-gray-400 hover:border-gray-400' }}">
                                                    <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $info['icon'] }}"/>
                                                    </svg>
                                                </div>

                                                @if($isCurrent)
                                                    <div class="absolute -inset-2 rounded-full border-2 border-blue-300 animate-ping"></div>
                                                    <div class="absolute -inset-1 rounded-full border border-blue-400 animate-pulse"></div>
                                                @endif
                                            </div>

                                            <!-- Labels -->
                                            <div class="space-y-1">
                                                <h4 class="font-bold text-sm sm:text-base {{ $isCompleted ? 'text-gray-900' : 'text-gray-500' }}">
                                                    {{ $info['label'] }}
                                                </h4>
                                                <p class="text-xs sm:text-sm {{ $isCompleted ? 'text-gray-600' : 'text-gray-400' }}">
                                                    {{ $info['desc'] }}
                                                </p>

                                                @if($isCurrent)
                                                    <div class="mt-2">
                                                        <span class="inline-flex items-center px-2 py-1 bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-700 text-xs font-semibold rounded-full border border-blue-200">
                                                            <div class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-1.5 animate-pulse"></div>
                                                            En cours
                                                        </span>
                                                    </div>
                                                @elseif($isCompleted && $stepIndex < $statusIndex)
                                                    <div class="mt-2">
                                                        <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                            </svg>
                                                            Terminé
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations détaillées en grille -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Informations du colis -->
                        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/60 p-4 sm:p-6">
                            <h4 class="text-base sm:text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <div class="w-6 h-6 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-2 shadow-md">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                Détails
                            </h4>

                            <div class="space-y-3">
                                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-gray-50 to-gray-100/50 rounded-xl border border-gray-200/60">
                                    <span class="text-sm font-medium text-gray-600">Poids</span>
                                    <span class="font-bold text-gray-900">{{ $package->weight }} kg</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-gray-50 to-gray-100/50 rounded-xl border border-gray-200/60">
                                    <span class="text-sm font-medium text-gray-600">Prix</span>
                                    <span class="font-bold text-gray-900">{{ number_format($package->price, 2) }} €</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200/60">
                                    <span class="text-sm font-medium text-blue-600">Service</span>
                                    <span class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-3 py-1 rounded-full text-sm font-bold shadow-md">Express</span>
                                </div>
                            </div>
                        </div>

                        <!-- Planning et dates -->
                        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/60 p-4 sm:p-6">
                            <h4 class="text-base sm:text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <div class="w-6 h-6 bg-gradient-to-br from-orange-500 to-red-500 rounded-lg flex items-center justify-center mr-2 shadow-md">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                Planning
                            </h4>

                            <div class="space-y-3">
                                <div class="p-3 bg-gradient-to-r from-gray-50 to-gray-100/50 rounded-xl border border-gray-200/60">
                                    <p class="text-sm font-medium text-gray-600 mb-1">Créé le</p>
                                    <p class="font-bold text-gray-900">{{ $package->created_at->format('d/m/Y à H:i') }}</p>
                                </div>
                                <div class="p-3 bg-gradient-to-r from-orange-50 to-red-50 rounded-xl border border-orange-200/60">
                                    <p class="text-sm font-medium text-orange-600 mb-1">Livraison prévue</p>
                                    <p class="font-bold text-gray-900">
                                        {{ $package->estimated_delivery_date ? $package->estimated_delivery_date->format('d/m/Y') : 'Calcul en cours...' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Adresse et description -->
                    <div class="space-y-6">
                        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/60 p-4 sm:p-6">
                            <h4 class="text-base sm:text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <div class="w-6 h-6 bg-gradient-to-br from-red-500 to-pink-500 rounded-lg flex items-center justify-center mr-2 shadow-md">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                </div>
                                Adresse de Livraison
                            </h4>
                            <div class="p-4 bg-gradient-to-r from-red-50 to-pink-50 rounded-xl border border-red-200/60">
                                <p class="text-gray-900 font-medium">{{ $package->destination_address }}</p>
                            </div>
                        </div>

                        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/60 p-4 sm:p-6">
                            <h4 class="text-base sm:text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <div class="w-6 h-6 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-lg flex items-center justify-center mr-2 shadow-md">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                Description du Contenu
                            </h4>
                            <div class="p-4 bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl border border-purple-200/60">
                                <p class="text-gray-700 font-medium">{{ $package->description_colis }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar (1/4) -->
                <div class="xl:col-span-1 space-y-6">

                    <!-- Support contact moderne -->
                    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/60 overflow-hidden sticky top-24">
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50/50 p-4 sm:p-6 border-b border-gray-100">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center">
                                <div class="w-6 h-6 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-2 shadow-md">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                </div>
                                Support 24/7
                            </h3>
                            <p class="text-sm text-gray-600 mt-1">Assistance immédiate</p>
                        </div>

                        <div class="p-4 sm:p-6 space-y-3">
                            <!-- WhatsApp -->
                            <a href="https://wa.me/votre_numero?text=Suivi%20colis%20{{ $package->tracking_number }}"
                               target="_blank"
                               class="group flex items-center space-x-3 p-3 sm:p-4 bg-gradient-to-r from-green-50 to-emerald-50 hover:from-green-100 hover:to-emerald-100 rounded-xl transition-all duration-300 border border-green-200/60 hover:border-green-300 transform hover:scale-105">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:shadow-xl transition-shadow">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-sm">WhatsApp</h4>
                                    <p class="text-xs text-gray-600">Réponse immédiate</p>
                                </div>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-green-600 group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>

                            <!-- Telegram -->
                            <a href="https://t.me/votre_compte?start={{ $package->tracking_number }}"
                               target="_blank"
                               class="group flex items-center space-x-3 p-3 sm:p-4 bg-gradient-to-r from-blue-50 to-indigo-50 hover:from-blue-100 hover:to-indigo-100 rounded-xl transition-all duration-300 border border-blue-200/60 hover:border-blue-300 transform hover:scale-105">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:shadow-xl transition-shadow">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-sm">Telegram</h4>
                                    <p class="text-xs text-gray-600">Chat sécurisé</p>
                                </div>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>

                            <!-- Email -->
                            <a href="mailto:support@dsf.com?subject=Suivi%20colis%20{{ $package->tracking_number }}"
                               class="group flex items-center space-x-3 p-3 sm:p-4 bg-gradient-to-r from-gray-50 to-slate-50 hover:from-gray-100 hover:to-slate-100 rounded-xl transition-all duration-300 border border-gray-200/60 hover:border-gray-300 transform hover:scale-105">
                                <div class="w-10 h-10 bg-gradient-to-br from-gray-600 to-slate-700 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:shadow-xl transition-shadow">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-sm">Email</h4>
                                    <p class="text-xs text-gray-600">support@dsf.com</p>
                                </div>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-gray-600 group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>

                            <!-- Note d'aide -->
                            <div class="mt-4 p-3 bg-gradient-to-r from-amber-50 to-orange-50 rounded-xl border border-amber-200/60">
                                <div class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 text-amber-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <h5 class="font-semibold text-amber-800 text-xs mb-1">Conseil</h5>
                                        <p class="text-amber-700 text-xs">Mentionnez votre numéro de suivi pour un support plus rapide</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Historique de suivi compact -->
                    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/60 overflow-hidden">
                        <div class="bg-gradient-to-r from-indigo-50 to-purple-50/50 p-4 sm:p-6 border-b border-gray-100">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center">
                                <div class="w-6 h-6 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center mr-2 shadow-md">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                Historique
                            </h3>
                        </div>

                        <div class="p-4 sm:p-6">
                            @if(isset($package->tracking_updates) && count($package->tracking_updates) > 0)
                                <div class="space-y-4">
                                    @foreach ($package->tracking_updates as $index => $update)
                                        <div class="relative pl-6 {{ $index === 0 ? 'pb-3' : 'pb-4' }}">
                                            @if($index < count($package->tracking_updates) - 1)
                                                <div class="absolute left-2 top-8 bottom-0 w-0.5 bg-gray-200"></div>
                                            @endif
                                            <div class="absolute left-0 top-1">
                                                <div class="w-4 h-4 rounded-full {{ $index === 0 ? 'bg-gradient-to-br from-blue-500 to-indigo-600 shadow-lg' : 'bg-gray-300' }}">
                                                    @if($index === 0)
                                                        <div class="absolute inset-0 rounded-full bg-blue-400 animate-ping opacity-40"></div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex items-center justify-between mb-1">
                                                    <h5 class="font-semibold text-gray-900 text-sm">{{ $update->status }}</h5>
                                                    @if($index === 0)
                                                        <span class="bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-700 text-xs font-semibold px-2 py-1 rounded-full border border-blue-200">Nouveau</span>
                                                    @endif
                                                </div>
                                                <p class="text-gray-600 text-sm mb-1">{{ $update->location }}</p>
                                                <p class="text-gray-500 text-xs">{{ $update->timestamp->format('d/m/Y à H:i') }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-6">
                                    <div class="w-12 h-12 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center mx-auto mb-3">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <h5 class="font-semibold text-gray-700 mb-1 text-sm">En attente</h5>
                                    <p class="text-gray-500 text-xs">Les mises à jour apparaîtront ici</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Informations utiles -->
                    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/60 overflow-hidden">
                        <div class="bg-gradient-to-r from-rose-50 to-pink-50/50 p-4 sm:p-6 border-b border-gray-100">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center">
                                <div class="w-6 h-6 bg-gradient-to-br from-rose-500 to-pink-500 rounded-lg flex items-center justify-center mr-2 shadow-md">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </div>
                                Bon à savoir
                            </h3>
                        </div>

                        <div class="p-4 sm:p-6 space-y-3">
                            <div class="flex items-start space-x-3 p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-200/60">
                                <svg class="w-4 h-4 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <div>
                                    <h5 class="font-semibold text-blue-900 text-xs">Service Express</h5>
                                    <p class="text-blue-700 text-xs">Livraison 2-3 jours ouvrés</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-200/60">
                                <svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.25-4.5a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <h5 class="font-semibold text-green-900 text-xs">Suivi temps réel</h5>
                                    <p class="text-green-700 text-xs">Mises à jour automatiques</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-3 bg-gradient-to-r from-purple-50 to-indigo-50 rounded-lg border border-purple-200/60">
                                <svg class="w-4 h-4 text-purple-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <div>
                                    <h5 class="font-semibold text-purple-900 text-xs">Livraison sécurisée</h5>
                                    <p class="text-purple-700 text-xs">Signature obligatoire</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions en bas -->
            <div class="mt-8 sm:mt-12 flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('dashboard') }}"
                   class="group inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold rounded-2xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5 mr-3 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Retour au tableau de bord
                </a>

                <button onclick="window.print()"
                        class="group inline-flex items-center px-6 py-3 sm:px-6 sm:py-4 bg-white/90 backdrop-blur-sm border-2 border-gray-300 hover:border-gray-400 text-gray-700 hover:text-gray-900 font-bold rounded-2xl transition-all duration-300 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    Imprimer
                </button>
            </div>
        </div>

        <!-- Modal pour les images -->
        <div x-show="showImageModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/80 backdrop-blur-md z-50 flex items-center justify-center p-4"
             @click="showImageModal = false"
             @keydown.escape.window="showImageModal = false">

            <div class="relative max-w-5xl max-h-full" @click.stop>
                <!-- Bouton de fermeture -->
                <button @click="showImageModal = false"
                        class="absolute top-4 right-4 z-10 w-12 h-12 bg-black/70 hover:bg-black/90 text-white rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                @if($package->images && count($package->images) > 1)
                <!-- Navigation précédente -->
                <button @click="currentImageIndex = currentImageIndex > 0 ? currentImageIndex - 1 : {{ count($package->images) - 1 }}"
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 z-10 w-12 h-12 bg-black/70 hover:bg-black/90 text-white rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-sm"
                        x-show="currentImageIndex > 0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <!-- Navigation suivante -->
                <button @click="currentImageIndex = currentImageIndex < {{ count($package->images) - 1 }} ? currentImageIndex + 1 : 0"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 z-10 w-12 h-12 bg-black/70 hover:bg-black/90 text-white rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-sm"
                        x-show="currentImageIndex < {{ count($package->images) - 1 }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                @endif

                <!-- Image -->
                @if($package->images)
                @foreach($package->getImageUrls() as $index => $imageUrl)
                <img x-show="currentImageIndex === {{ $index }}"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     src="{{ $imageUrl }}"
                     alt="Image {{ $index + 1 }}"
                     class="max-w-full max-h-full object-contain rounded-2xl shadow-2xl">
                @endforeach
                @endif

                <!-- Compteur -->
                @if($package->images && count($package->images) > 1)
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-black/70 text-white px-4 py-2 rounded-full backdrop-blur-sm">
                    <span x-text="`${currentImageIndex + 1} / {{ count($package->images) }}`" class="text-sm font-medium"></span>
                </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Configuration GSAP pour les animations
                gsap.registerPlugin(ScrollTrigger);

                // Animation d'entrée progressive
                const tl = gsap.timeline();

                tl.from('header', {
                    duration: 0.8,
                    y: -60,
                    opacity: 0,
                    ease: 'power3.out'
                })
                .from('.max-w-7xl > *', {
                    duration: 0.8,
                    y: 40,
                    opacity: 0,
                    stagger: 0.1,
                    ease: 'power3.out'
                }, '-=0.4');

                // Animation de la barre de progression
                const progressBar = document.querySelector('.bg-gradient-to-r.from-blue-500.to-indigo-600');
                if (progressBar) {
                    gsap.from(progressBar, {
                        width: '0%',
                        duration: 2.5,
                        ease: 'power2.out',
                        delay: 1
                    });
                }

                // Animation des cercles de statut
                gsap.from('.w-16.h-16, .w-20.h-20', {
                    duration: 0.8,
                    scale: 0,
                    stagger: 0.15,
                    ease: 'back.out(2)',
                    delay: 1.5
                });

                // Animation des cards au scroll
                gsap.utils.toArray('.bg-white\\/90, .bg-white').forEach((element, index) => {
                    gsap.fromTo(element, {
                        y: 60,
                        opacity: 0
                    }, {
                        y: 0,
                        opacity: 1,
                        duration: 0.8,
                        ease: 'power2.out',
                        scrollTrigger: {
                            trigger: element,
                            start: 'top 80%',
                            end: 'bottom 20%',
                            toggleActions: 'play none none reverse'
                        }
                    });
                });

                // Animation des images au hover
                document.querySelectorAll('.group.relative.cursor-pointer').forEach(img => {
                    img.addEventListener('mouseenter', () => {
                        gsap.to(img.querySelector('img'), {
                            scale: 1.1,
                            duration: 0.4,
                            ease: 'power2.out'
                        });
                    });

                    img.addEventListener('mouseleave', () => {
                        gsap.to(img.querySelector('img'), {
                            scale: 1,
                            duration: 0.4,
                            ease: 'power2.out'
                        });
                    });
                });

                // Animation des boutons de contact
                const contactButtons = document.querySelectorAll('a[href^="https://wa.me"], a[href^="https://t.me"], a[href^="mailto:"]');
                contactButtons.forEach(button => {
                    button.addEventListener('mouseenter', () => {
                        gsap.to(button, {
                            scale: 1.05,
                            duration: 0.3,
                            ease: 'power2.out'
                        });
                    });

                    button.addEventListener('mouseleave', () => {
                        gsap.to(button, {
                            scale: 1,
                            duration: 0.3,
                            ease: 'power2.out'
                        });
                    });
                });

                // Animation des indicateurs de statut
                const statusIndicators = document.querySelectorAll('.animate-ping');
                statusIndicators.forEach(indicator => {
                    gsap.to(indicator, {
                        scale: 1.5,
                        opacity: 0,
                        duration: 2,
                        repeat: -1,
                        ease: 'power2.out'
                    });
                });

                // Smooth scroll pour les ancres
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                });
            });

            // Fonction pour copier le numéro de suivi
            function copyTrackingNumber() {
                const trackingNumber = '{{ $package->tracking_number }}';
                navigator.clipboard.writeText(trackingNumber).then(() => {
                    // Feedback visuel amélioré
                    const trackingDiv = event.target.closest('div');
                    const originalBg = trackingDiv.className;

                    // Animation de succès
                    gsap.to(trackingDiv, {
                        scale: 1.1,
                        duration: 0.2,
                        ease: 'power2.out',
                        onComplete: () => {
                            gsap.to(trackingDiv, {
                                scale: 1,
                                duration: 0.2,
                                ease: 'power2.out'
                            });
                        }
                    });

                    // Changer temporairement l'apparence
                    trackingDiv.classList.add('bg-green-100', 'border-green-300');

                    // Créer un message de confirmation
                    const message = document.createElement('div');
                    message.className = 'absolute top-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full';
                    message.textContent = '✓ Copié !';
                    trackingDiv.style.position = 'relative';
                    trackingDiv.appendChild(message);

                    // Animation du message
                    gsap.from(message, {
                        scale: 0,
                        opacity: 0,
                        duration: 0.3,
                        ease: 'back.out(2)'
                    });

                    setTimeout(() => {
                        gsap.to(message, {
                            scale: 0,
                            opacity: 0,
                            duration: 0.3,
                            ease: 'power2.in',
                            onComplete: () => {
                                message.remove();
                                trackingDiv.className = originalBg;
                            }
                        });
                    }, 2000);
                }).catch(err => {
                    console.error('Erreur lors de la copie:', err);
                });
            }

            // Navigation clavier pour la modal
            document.addEventListener('keydown', function(e) {
                if (Alpine.store || window.Alpine) {
                    const data = document.querySelector('[x-data]').__x?.$data;
                    if (data && data.showImageModal) {
                        if (e.key === 'ArrowLeft') {
                            e.preventDefault();
                            if (data.currentImageIndex > 0) {
                                data.currentImageIndex--;
                            }
                        } else if (e.key === 'ArrowRight') {
                            e.preventDefault();
                            if (data.currentImageIndex < {{ count($package->images ?? []) - 1 }}) {
                                data.currentImageIndex++;
                            }
                        }
                    }
                }
            });

            // Préchargement des images pour une navigation fluide
            @if($package->images)
            const imageUrls = @json($package->getImageUrls());
            imageUrls.forEach(url => {
                const img = new Image();
                img.src = url;
            });
            @endif
        </script>
    @endpush

    @push('styles')
        <style>
            /* Optimisations CSS personnalisées */
            html {
                scroll-behavior: smooth;
            }

            /* Effet glassmorphism ultra moderne */
            .backdrop-blur-2xl {
                backdrop-filter: blur(32px);
                -webkit-backdrop-filter: blur(32px);
            }

            .backdrop-blur-md {
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }

            /* Animations personnalisées avancées */
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }

            @keyframes shimmer {
                0% { background-position: -200% 0; }
                100% { background-position: 200% 0; }
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            .shimmer {
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
                background-size: 200% 100%;
                animation: shimmer 2s infinite;
            }

            /* États de focus ultra accessibles */
            .focus-ring:focus {
                outline: 3px solid #60a5fa;
                outline-offset: 2px;
                border-radius: 16px;
            }

            /* Transitions ultra fluides */
            * {
                transition-property: all;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 300ms;
            }

            /* Optimisations pour les performances */
            .will-change-transform {
                will-change: transform;
            }

            .gpu-accelerated {
                transform: translateZ(0);
                backface-visibility: hidden;
                perspective: 1000px;
            }

            /* Amélioration de la lisibilité */
            .text-shadow-sm {
                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            }

            .text-shadow {
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            /* Scrollbar personnalisée moderne */
            ::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }

            ::-webkit-scrollbar-track {
                background: rgba(0, 0, 0, 0.05);
                border-radius: 4px;
            }

            ::-webkit-scrollbar-thumb {
                background: linear-gradient(45deg, #3b82f6, #6366f1);
                border-radius: 4px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            ::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(45deg, #2563eb, #4f46e5);
            }

            /* Responsivité ultra avancée */
            @media (max-width: 640px) {
                .backdrop-blur-2xl {
                    backdrop-filter: blur(16px);
                    -webkit-backdrop-filter: blur(16px);
                }

                .xl\:col-span-3 {
                    grid-column: span 1 / span 1;
                }

                .xl\:col-span-1 {
                    grid-column: span 1 / span 1;
                }

                /* Ajustements pour les très petits écrans */
                .text-2xl {
                    font-size: 1.5rem;
                }

                .text-3xl {
                    font-size: 1.875rem;
                }

                .p-6 {
                    padding: 1rem;
                }

                .space-y-6 > * + * {
                    margin-top: 1rem;
                }
            }

            @media (max-width: 480px) {
                .grid-cols-2 {
                    grid-template-columns: repeat(1, minmax(0, 1fr));
                }

                .sm\:grid-cols-3 {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                .lg\:grid-cols-4 {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }
            }

            /* Optimisations pour l'impression */
            @media print {
                .no-print, .sticky, header, .bg-gradient-to-r, .backdrop-blur-2xl {
                    display: none !important;
                }

                .shadow-lg, .shadow-xl {
                    box-shadow: none !important;
                }

                .bg-white\/90 {
                    background: white !important;
                }

                .border {
                    border: 1px solid #d1d5db !important;
                }

                .rounded-2xl, .rounded-3xl {
                    border-radius: 8px !important;
                }
            }

            /* Améliorations pour les animations */
            .animate-pulse-slow {
                animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }

            /* Effets spéciaux pour les gradients */
            .gradient-border {
                position: relative;
                background: linear-gradient(45deg, #f3f4f6, #ffffff);
            }

            .gradient-border::before {
                content: '';
                position: absolute;
                inset: 0;
                padding: 2px;
                background: linear-gradient(45deg, #3b82f6, #6366f1, #8b5cf6, #ec4899);
                border-radius: inherit;
                mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
                mask-composite: exclude;
                -webkit-mask-composite: xor;
            }

            /* Améliorations d'accessibilité */
            @media (prefers-reduced-motion: reduce) {
                *, *::before, *::after {
                    animation-duration: 0.01ms !important;
                    animation-iteration-count: 1 !important;
                    transition-duration: 0.01ms !important;
                    scroll-behavior: auto !important;
                }
            }

            /* Mode sombre (si nécessaire plus tard) */
            @media (prefers-color-scheme: dark) {
                .bg-white\/90 {
                    background: rgba(17, 24, 39, 0.9);
                }

                .text-gray-900 {
                    color: #f9fafb;
                }

                .text-gray-600 {
                    color: #d1d5db;
                }

                .border-gray-200\/60 {
                    border-color: rgba(75, 85, 99, 0.6);
                }
            }
        </style>
    @endpush
</x-app-layout>
