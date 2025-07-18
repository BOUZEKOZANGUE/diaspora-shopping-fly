<x-app-layout>
    <!-- Header ultra-moderne avec animations fluides -->
    <x-slot name="header">
        <div class="relative bg-gradient-to-br from-white via-blue-50/30 to-[#0077be]/5 py-8 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex flex-col space-y-6 sm:flex-row sm:justify-between sm:items-center sm:space-y-0">
                    <!-- Section titre avec effet de gradient animé -->
                    <div class="group">
                        <div class="transform transition-all duration-700 ease-out">
                            <h1 class="text-3xl sm:text-4xl font-black bg-gradient-to-r from-[#0077be] via-[#005c91] to-[#0077be] bg-clip-text text-transparent bg-size-200 animate-gradient-x">
                                Administration
                            </h1>
                            <p class="text-base sm:text-lg text-[#0077be]/80 mt-2 font-medium group-hover:text-[#0077be] transition-all duration-300">
                                <i class="fas fa-crown text-[#ffd700] mr-2"></i>
                                Centre de contrôle avancé
                            </p>
                        </div>
                    </div>

                    <!-- Boutons d'action ultra-modernes -->
                    <div class="flex flex-wrap gap-4">
                        <!-- Bouton Nouveau colis -->
                        <a href="{{ route('admin.shipments.create-existing') }}"
                            class="group relative overflow-hidden px-6 py-3 bg-gradient-to-r from-[#0077be] to-[#005c91] text-white font-semibold rounded-2xl
                                   transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-[#0077be]/30 active:scale-95">
                            <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative flex items-center">
                                <div class="w-5 h-5 mr-3 transition-transform duration-300 group-hover:rotate-12">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-full h-full">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                                <span class="text-sm font-bold">Nouveau colis</span>
                            </div>
                        </a>

                        <!-- Bouton Nouveau client + colis -->
                        <a href="{{ route('admin.shipments.create') }}"
                            class="group relative overflow-hidden px-6 py-3 bg-gradient-to-r from-[#ffd700] to-[#ffed4e] text-[#0077be] font-semibold rounded-2xl
                                   transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-[#ffd700]/30 active:scale-95">
                            <div class="absolute inset-0 bg-gradient-to-r from-white/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative flex items-center">
                                <div class="w-5 h-5 mr-3 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-12">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-full h-full">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                </div>
                                <span class="text-sm font-bold">Client + colis</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Éléments décoratifs animés -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-gradient-to-br from-[#ffd700]/10 to-transparent rounded-full blur-3xl animate-float"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-gradient-to-tr from-[#0077be]/10 to-transparent rounded-full blur-3xl animate-float-delayed"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-radial from-white/20 to-transparent rounded-full animate-pulse-slow"></div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-50 to-blue-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto space-y-8">
            <!-- Stats Cards Premium avec animations -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Colis -->
                <div class="group relative bg-white rounded-3xl p-6 transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-[#0077be]/20 border border-transparent hover:border-[#0077be]/20">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#0077be]/5 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-[#0077be]/10 to-[#0077be]/5 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <div class="w-16 h-1 bg-gradient-to-r from-[#0077be] to-transparent rounded-full"></div>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-[#0077be]/70 uppercase tracking-wider">Total Colis</p>
                            <p class="mt-2 text-4xl font-black text-[#0077be] group-hover:scale-105 transition-transform duration-300">{{ $stats['total_packages'] }}</p>
                            <p class="text-xs text-green-600 mt-1 flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i>
                                +12% ce mois
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Total Utilisateurs -->
                <div class="group relative bg-white rounded-3xl p-6 transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-[#ffd700]/20 border border-transparent hover:border-[#ffd700]/20">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#ffd700]/5 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-[#ffd700]/10 to-[#ffd700]/5 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-[#ffd700]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="w-16 h-1 bg-gradient-to-r from-[#ffd700] to-transparent rounded-full"></div>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-[#0077be]/70 uppercase tracking-wider">Utilisateurs</p>
                            <p class="mt-2 text-4xl font-black text-[#0077be] group-hover:scale-105 transition-transform duration-300">{{ $stats['total_users'] }}</p>
                            <p class="text-xs text-green-600 mt-1 flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i>
                                +8% ce mois
                            </p>
                        </div>
                    </div>
                </div>

                {{-- <!-- Revenu Total -->
                <div class="group relative bg-white rounded-3xl p-6 transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-green-500/20 border border-transparent hover:border-green-500/20">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-green-500/10 to-green-500/5 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="w-16 h-1 bg-gradient-to-r from-green-500 to-transparent rounded-full"></div>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-[#0077be]/70 uppercase tracking-wider">Revenu Total</p>
                            <p class="mt-2 text-4xl font-black text-[#0077be] group-hover:scale-105 transition-transform duration-300">{{ number_format($stats['revenue'], 0) }}€</p>
                            <p class="text-xs text-green-600 mt-1 flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i>
                                +24% ce mois
                            </p>
                        </div>
                    </div>
                </div> --}}

                <!-- Satisfaction -->
                <div class="group relative bg-white rounded-3xl p-6 transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-[#005c91]/20 border border-transparent hover:border-[#005c91]/20">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#005c91]/5 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-[#005c91]/10 to-[#005c91]/5 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-[#005c91]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="w-16 h-1 bg-gradient-to-r from-[#005c91] to-transparent rounded-full"></div>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-[#0077be]/70 uppercase tracking-wider">Satisfaction</p>
                            <p class="mt-2 text-4xl font-black text-[#0077be] group-hover:scale-105 transition-transform duration-300">95%</p>
                            <div class="flex items-center mt-2">
                                <div class="flex space-x-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star text-[#ffd700] text-xs"></i>
                                    @endfor
                                </div>
                                <span class="text-xs text-green-600 ml-2">Excellent</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section des derniers colis avec design ultra-moderne -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-2xl border border-[#0077be]/10 transform transition-all duration-500 hover:shadow-3xl">
                <div class="relative">
                    <!-- Header avec gradient -->
                    <div class="bg-gradient-to-r from-[#0077be] via-[#005c91] to-[#0077be] px-8 py-6">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                            <div class="flex items-center">
                                <div class="p-3 bg-white/20 rounded-2xl mr-4 backdrop-blur-sm">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white">Derniers colis</h3>
                                    <p class="text-blue-100 text-sm mt-1">Activité récente • Temps réel</p>
                                </div>
                            </div>
                            <a href="{{ route('admin.packages.index') }}"
                                class="group inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-sm text-white font-semibold rounded-2xl
                                       hover:bg-white/30 transition-all duration-300 transform hover:scale-105">
                                <span class="mr-2">Voir tout</span>
                                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Contenu de la table avec style moderne -->
                    <div class="p-8">
                        <div class="space-y-4">
                            @forelse($recentPackages as $index => $package)
                                <div class="group relative bg-gradient-to-r from-gray-50 to-blue-50/30 rounded-2xl p-6 transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl border border-transparent hover:border-[#0077be]/20">
                                    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between space-y-4 lg:space-y-0">
                                        <!-- Informations principales -->
                                        <div class="flex items-center space-x-6 flex-1">
                                            <!-- Indicateur de statut moderne -->
                                            <div class="relative">
                                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br {{ $package->status === 'delivered' ? 'from-green-500 to-green-600' : ($package->status === 'in_transit' ? 'from-[#ffd700] to-yellow-500' : 'from-[#0077be] to-[#005c91]') }} flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform duration-300">
                                                    <i class="fas {{ $package->status === 'delivered' ? 'fa-check' : ($package->status === 'in_transit' ? 'fa-truck' : 'fa-clock') }} text-white text-xl"></i>
                                                </div>
                                                <div class="absolute -top-1 -right-1 w-5 h-5 {{ $package->status === 'delivered' ? 'bg-green-400' : ($package->status === 'in_transit' ? 'bg-[#ffd700]' : 'bg-[#0077be]') }} rounded-full border-2 border-white animate-pulse"></div>
                                            </div>

                                            <!-- Détails du colis -->
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center space-x-4 mb-3">
                                                    <h4 class="font-bold text-xl text-gray-900">{{ $package->tracking_number }}</h4>
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold {{ $package->status === 'delivered' ? 'bg-green-100 text-green-800' : ($package->status === 'in_transit' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                                        {{ $package->status === 'delivered' ? 'Livré' : ($package->status === 'in_transit' ? 'En transit' : 'En attente') }}
                                                    </span>
                                                </div>

                                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm text-gray-600">
                                                    <div class="flex items-center space-x-2">
                                                        <i class="fas fa-user text-gray-400"></i>
                                                        <span class="font-medium">{{ $package->user->name ?? 'N/A' }}</span>
                                                    </div>
                                                    <div class="flex items-center space-x-2">
                                                        <i class="fas fa-map-marker-alt text-gray-400"></i>
                                                        <span>{{ Str::limit($package->destination_address ?? 'N/A', 30) }}</span>
                                                    </div>
                                                    <div class="flex items-center space-x-2">
                                                        <i class="fas fa-calendar text-gray-400"></i>
                                                        <span>{{ \Carbon\Carbon::parse($package->created_at)->format('d/m/Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Prix et actions -->
                                        <div class="flex items-center space-x-6">
                                            <div class="text-right">
                                                <p class="text-2xl font-black text-[#0077be]">{{ number_format($package->price, 2) }}€</p>
                                                <p class="text-xs text-gray-500">Prix total</p>
                                            </div>

                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('admin.packages.show', $package) }}"
                                                   class="inline-flex items-center px-4 py-2 bg-[#0077be] hover:bg-[#005c91] text-white text-sm font-bold rounded-xl
                                                          transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                                    <i class="fas fa-eye mr-2"></i>
                                                    Détails
                                                </a>

                                                <button class="p-3 text-gray-400 hover:text-[#ffd700] hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 transform hover:scale-110" title="Favoris">
                                                    <i class="far fa-star"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Barre de progression moderne -->
                                    <div class="mt-6 pt-4 border-t border-gray-200/50">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-xs font-semibold text-gray-600 uppercase tracking-wider">Progression</span>
                                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                                {{ $package->status === 'delivered' ? 'Terminé' : ($package->status === 'in_transit' ? 'En cours' : 'Démarré') }}
                                            </span>
                                        </div>

                                        <div class="flex items-center space-x-3">
                                            <div class="flex-1 bg-gray-200 rounded-full h-2 overflow-hidden">
                                                <div class="h-full rounded-full transition-all duration-1000 ease-out {{ $package->status === 'delivered' ? 'bg-gradient-to-r from-green-500 to-green-400' : ($package->status === 'in_transit' ? 'bg-gradient-to-r from-[#ffd700] to-yellow-400' : 'bg-gradient-to-r from-[#0077be] to-blue-400') }} progress-bar"
                                                     style="width: {{ $package->status === 'delivered' ? '100%' : ($package->status === 'in_transit' ? '65%' : '25%') }}"></div>
                                            </div>
                                            <span class="text-xs font-bold text-gray-700">
                                                {{ $package->status === 'delivered' ? '100%' : ($package->status === 'in_transit' ? '65%' : '25%') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-16">
                                    <div class="w-32 h-32 mx-auto mb-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-box-open text-4xl text-gray-400"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Aucun colis récent</h3>
                                    <p class="text-gray-500 mb-8">Les derniers colis apparaîtront ici automatiquement</p>
                                    <a href="{{ route('admin.shipments.create-existing') }}"
                                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#0077be] to-[#005c91] text-white font-bold rounded-2xl
                                              transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                                        <i class="fas fa-plus mr-3"></i>
                                        Créer le premier colis
                                    </a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Styles CSS ultra-modernes -->
    <style>
        /* Animations personnalisées avancées */
        @keyframes gradient-x {
            0%, 100% {
                background-size: 200% 200%;
                background-position: left center;
            }
            50% {
                background-size: 200% 200%;
                background-position: right center;
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            33% {
                transform: translateY(-20px) rotate(1deg);
            }
            66% {
                transform: translateY(-10px) rotate(-1deg);
            }
        }

        @keyframes float-delayed {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            33% {
                transform: translateY(-15px) rotate(-1deg);
            }
            66% {
                transform: translateY(-25px) rotate(1deg);
            }
        }

        @keyframes pulse-slow {
            0%, 100% {
                opacity: 0.3;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.05);
            }
        }

        .animate-gradient-x {
            animation: gradient-x 3s ease infinite;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 8s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse-slow 4s ease-in-out infinite;
        }

        /* Effets de glassmorphism */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Barre de progression avec effet de mouvement */
        .progress-bar {
            position: relative;
            overflow: hidden;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background-image: linear-gradient(
                -45deg,
                rgba(255, 255, 255, 0.3) 25%,
                transparent 25%,
                transparent 50%,
                rgba(255, 255, 255, 0.3) 50%,
                rgba(255, 255, 255, 0.3) 75%,
                transparent 75%,
                transparent
            );
            background-size: 30px 30px;
            animation: progress-move 2s linear infinite;
        }

        @keyframes progress-move {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 30px 30px;
            }
        }

        /* Scrollbar ultra-moderne */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: linear-gradient(90deg, #f8fafc, #f1f5f9);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #0077be, #005c91);
            border-radius: 4px;
            border: 1px solid #f1f5f9;
            transition: all 0.3s ease;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(90deg, #005c91, #004472);
            box-shadow: 0 4px 8px rgba(0, 119, 190, 0.3);
        }

        /* États de focus ultra-accessibles */
        .focus-ultra:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 119, 190, 0.2);
            border-color: #0077be;
            transform: scale(1.02);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Effets de hover sophistiqués */
        .hover-lift {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 119, 190, 0.15);
        }

        /* Animation de chargement moderne */
        .loading-shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer-loading 1.5s infinite;
        }

        @keyframes shimmer-loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }

        /* Transitions fluides globales */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Responsive optimisé */
        @media (max-width: 640px) {
            .text-4xl {
                font-size: 2rem;
                line-height: 2.5rem;
            }

            .text-3xl {
                font-size: 1.5rem;
                line-height: 2rem;
            }

            .p-8 {
                padding: 1.5rem;
            }

            .px-8 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .space-x-6 > :not([hidden]) ~ :not([hidden]) {
                margin-left: 1rem;
            }
        }

        @media (max-width: 480px) {
            .rounded-3xl {
                border-radius: 1.5rem;
            }

            .p-6 {
                padding: 1rem;
            }

            .space-x-4 > :not([hidden]) ~ :not([hidden]) {
                margin-left: 0.75rem;
            }
        }

        /* Thème sombre (préparation) */
        @media (prefers-color-scheme: dark) {
            .dark-theme {
                --bg-primary: #0f172a;
                --bg-secondary: #1e293b;
                --text-primary: #f8fafc;
                --border-color: #334155;
            }
        }

        /* Micro-animations pour l'engagement */
        .micro-bounce:hover {
            animation: micro-bounce 0.6s ease-in-out;
        }

        @keyframes micro-bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-4px);
            }
            60% {
                transform: translateY(-2px);
            }
        }

        /* Indicateurs de performance en temps réel */
        .live-indicator {
            position: relative;
        }

        .live-indicator::before {
            content: '';
            position: absolute;
            top: -2px;
            right: -2px;
            width: 6px;
            height: 6px;
            background: #10b981;
            border-radius: 50%;
            border: 1px solid white;
            animation: live-pulse 2s infinite;
        }

        @keyframes live-pulse {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            }
            70% {
                transform: scale(1);
                box-shadow: 0 0 0 8px rgba(16, 185, 129, 0);
            }
            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        /* Optimisations GPU */
        .gpu-boost {
            transform: translateZ(0);
            will-change: transform, opacity;
        }

        /* États de connexion réseau */
        .network-status {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .network-online {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .network-offline {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        /* Performance et accessibilité */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* Focus visible pour navigation clavier */
        .focus-visible:focus-visible {
            outline: 2px solid #0077be;
            outline-offset: 4px;
            border-radius: 8px;
        }

        /* Effet de particules sur les éléments premium */
        .particle-effect {
            position: relative;
            overflow: hidden;
        }

        .particle-effect::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.6) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            opacity: 0;
        }

        .particle-effect:hover::after {
            width: 200px;
            height: 200px;
            opacity: 1;
            animation: particle-fade 0.6s ease-out forwards;
        }

        @keyframes particle-fade {
            0% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(0);
            }
            50% {
                opacity: 0.8;
                transform: translate(-50%, -50%) scale(1);
            }
            100% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(1.2);
            }
        }
    </style>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation d'entrée séquentielle pour les cartes stats
            const statsCards = document.querySelectorAll('.grid > div');
            statsCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';

                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Animation de compteur pour les statistiques
            const animateCounters = () => {
                const counters = document.querySelectorAll('.font-black');

                counters.forEach(counter => {
                    const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));
                    const duration = 2000;
                    const increment = target / (duration / 16);
                    let current = 0;

                    const updateCounter = () => {
                        if (current < target) {
                            current += increment;
                            if (counter.textContent.includes('€')) {
                                counter.textContent = Math.floor(current).toLocaleString() + '€';
                            } else if (counter.textContent.includes('%')) {
                                counter.textContent = Math.floor(current) + '%';
                            } else {
                                counter.textContent = Math.floor(current).toLocaleString();
                            }
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = counter.textContent.includes('€') ? target.toLocaleString() + '€' :
                                                 counter.textContent.includes('%') ? target + '%' : target.toLocaleString();
                        }
                    };

                    setTimeout(updateCounter, 500);
                });
            };

            // Observer pour les animations au scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';

                        // Déclencher l'animation des compteurs si c'est la section stats
                        if (entry.target.classList.contains('grid')) {
                            animateCounters();
                        }
                    }
                });
            }, observerOptions);

            // Observer les éléments pour l'animation
            document.querySelectorAll('.bg-white').forEach(card => {
                observer.observe(card);
            });

            // Gestion des favoris avec animation
            document.querySelectorAll('.fa-star').forEach(star => {
                star.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    this.classList.toggle('fas');
                    this.classList.toggle('far');

                    // Animation de pulsation
                    this.style.transform = 'scale(1.3)';
                    this.style.color = this.classList.contains('fas') ? '#ffd700' : '';

                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 200);

                    // Effet de particules
                    if (this.classList.contains('fas')) {
                        createParticleEffect(this);
                    }
                });
            });

            // Fonction pour créer un effet de particules
            function createParticleEffect(element) {
                const rect = element.getBoundingClientRect();
                const particles = [];

                for (let i = 0; i < 6; i++) {
                    const particle = document.createElement('div');
                    particle.style.position = 'fixed';
                    particle.style.left = rect.left + rect.width / 2 + 'px';
                    particle.style.top = rect.top + rect.height / 2 + 'px';
                    particle.style.width = '4px';
                    particle.style.height = '4px';
                    particle.style.backgroundColor = '#ffd700';
                    particle.style.borderRadius = '50%';
                    particle.style.pointerEvents = 'none';
                    particle.style.zIndex = '9999';

                    document.body.appendChild(particle);

                    const angle = (i / 6) * Math.PI * 2;
                    const velocity = 50;
                    const vx = Math.cos(angle) * velocity;
                    const vy = Math.sin(angle) * velocity;

                    let x = 0, y = 0, opacity = 1;

                    const animate = () => {
                        x += vx * 0.02;
                        y += vy * 0.02;
                        opacity -= 0.02;

                        particle.style.transform = `translate(${x}px, ${y}px)`;
                        particle.style.opacity = opacity;

                        if (opacity > 0) {
                            requestAnimationFrame(animate);
                        } else {
                            document.body.removeChild(particle);
                        }
                    };

                    animate();
                }
            }

            // Indicateur de statut réseau
            function createNetworkIndicator() {
                const indicator = document.createElement('div');
                indicator.className = 'network-status network-online';
                indicator.innerHTML = '<i class="fas fa-wifi mr-1"></i> En ligne';
                document.body.appendChild(indicator);

                // Gestion des événements réseau
                window.addEventListener('online', () => {
                    indicator.className = 'network-status network-online';
                    indicator.innerHTML = '<i class="fas fa-wifi mr-1"></i> En ligne';
                });

                window.addEventListener('offline', () => {
                    indicator.className = 'network-status network-offline';
                    indicator.innerHTML = '<i class="fas fa-wifi-slash mr-1"></i> Hors ligne';
                });
            }

            // Initialiser l'indicateur réseau
            createNetworkIndicator();

            // Optimisation des performances avec debouncing
            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    // Recalculer les positions si nécessaire
                    console.log('Redimensionnement terminé');
                }, 250);
            });

            // Préchargement intelligent des images
            const preloadImages = () => {
                const images = document.querySelectorAll('img[data-src]');
                const imageObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.remove('loading-shimmer');
                            imageObserver.unobserve(img);
                        }
                    });
                });

                images.forEach(img => imageObserver.observe(img));
            };

            preloadImages();

            // Mise à jour en temps réel (simulation)
            setInterval(() => {
                const liveElements = document.querySelectorAll('.live-indicator');
                liveElements.forEach(element => {
                    element.style.opacity = '0.7';
                    setTimeout(() => {
                        element.style.opacity = '1';
                    }, 100);
                });
            }, 30000); // Toutes les 30 secondes

            // Amélioration de l'accessibilité
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Tab') {
                    document.body.classList.add('using-keyboard');
                }
            });

            document.addEventListener('mousedown', () => {
                document.body.classList.remove('using-keyboard');
            });

            console.log('🚀 Dashboard Admin initialisé avec succès !');
        });
    </script>
    @endpush
</x-app-layout>
