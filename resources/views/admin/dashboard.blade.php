<x-app-layout>
    <!-- Header amélioré avec animation -->
    <!-- Header amélioré avec animation -->
    <x-slot name="header">
        <div class="relative bg-white py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col space-y-6 sm:flex-row sm:justify-between sm:items-center sm:space-y-0">
                    {{-- Section titre avec animation slide --}}
                    <div class="transform transition-all duration-500 ease-out translate-y-0 opacity-100 group">
                        <h2 class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-[#0077be] to-[#005c91] bg-clip-text text-transparent">
                            Administration
                        </h2>
                        <p class="text-sm sm:text-base text-[#0077be]/70 mt-1 group-hover:text-[#0077be]/90 transition-colors">
                            Bienvenue sur votre espace d'administration
                        </p>
                    </div>

                    {{-- Boutons d'action avec animations hover --}}
                    <div class="flex flex-wrap gap-3">
                        {{-- Dropdown Gestion Page d'Accueil --}}
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="group flex items-center justify-center px-5 py-2.5 bg-[#0077be] text-white font-medium rounded-xl
                                       transition-all duration-300 ease-out hover:shadow-lg hover:shadow-[#0077be]/20 transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>Gestion Accueil</span>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            {{-- Dropdown Menu --}}
                            <div x-show="open"
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 class="absolute right-0 mt-2 w-64 bg-white rounded-xl shadow-lg z-[1000] border border-gray-100">
                                <div class="p-2 space-y-1">
                                    {{-- Services --}}
                                    <a href="{{ route('admin.services.index') }}"
                                       class="flex items-center px-4 py-2 text-sm text-gray-700 rounded-lg hover:bg-[#0077be]/10 transition-colors">
                                        <svg class="w-5 h-5 mr-3 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        Services
                                    </a>

                                    {{-- Avantages --}}
                                    <a href="{{ route('admin.advantages.index') }}"
                                       class="flex items-center px-4 py-2 text-sm text-gray-700 rounded-lg hover:bg-[#0077be]/10 transition-colors">
                                        <svg class="w-5 h-5 mr-3 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                        </svg>
                                        Avantages
                                    </a>

                                    {{-- Témoignages --}}
                                    <a href="{{ route('admin.testimonials.index') }}"
                                       class="flex items-center px-4 py-2 text-sm text-gray-700 rounded-lg hover:bg-[#0077be]/10 transition-colors">
                                        <svg class="w-5 h-5 mr-3 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                        Témoignages
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Bouton Nouveau colis --}}
                        <a href="{{ route('admin.shipments.create-existing') }}"
                           class="group flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-[#0077be] to-[#005c91] text-white font-medium rounded-xl
                                  transition-all duration-300 ease-out hover:shadow-lg hover:shadow-[#0077be]/20 transform hover:-translate-y-0.5">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 transition-transform duration-300 ease-out group-hover:scale-110"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                <span>Nouveau colis</span>
                            </div>
                        </a>

                        {{-- Bouton Nouveau client + colis --}}
                        <a href="{{ route('admin.shipments.create') }}"
                           class="group flex items-center justify-center px-5 py-2.5 bg-[#ffd700] text-[#0077be] font-medium rounded-xl
                                  transition-all duration-300 ease-out hover:shadow-lg hover:shadow-[#ffd700]/20 transform hover:-translate-y-0.5">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 transition-transform duration-300 ease-out group-hover:rotate-12"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                <span>Nouveau client + colis</span>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Éléments décoratifs avec animation --}}
                <div class="absolute inset-0 -z-10">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-[#ffd700]/5 rounded-full blur-3xl transform rotate-12
                              animate-[pulse_4s_ease-in-out_infinite]"></div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#0077be]/5 rounded-full blur-3xl transform -rotate-12
                              animate-[pulse_4s_ease-in-out_infinite_1s]"></div>
                </div>
            </div>
        </div>

        {{-- Style pour les animations --}}
        <style>
            @keyframes pulse {
                0%, 100% { opacity: 0.1; }
                50% { opacity: 0.3; }
            }
        </style>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Colis -->
                <div
                    class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-[#0077be]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-[#0077be]/70">Total Colis</p>
                            <p class="mt-2 text-3xl font-bold text-[#0077be]">{{ $stats['total_packages'] }}</p>
                        </div>
                        <div class="bg-[#0077be]/10 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-[#0077be]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Utilisateurs -->
                <div
                    class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-[#ffd700]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-[#0077be]/70">Utilisateurs</p>
                            <p class="mt-2 text-3xl font-bold text-[#0077be]">{{ $stats['total_users'] }}</p>
                        </div>
                        <div class="bg-[#ffd700]/10 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-[#ffd700]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Revenu Total -->
                <div
                    class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-[#0077be]/70">Revenu Total</p>
                            <p class="mt-2 text-3xl font-bold text-[#0077be]">{{ number_format($stats['revenue'], 2) }}
                                €</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Satisfaction -->
                <div
                    class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-[#005c91]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-[#0077be]/70">Satisfaction</p>
                            <p class="mt-2 text-3xl font-bold text-[#0077be]">95%</p>
                        </div>
                        <div class="bg-[#005c91]/10 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-[#005c91]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Packages -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-[#0077be]/10">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                        <h3 class="text-xl font-semibold text-[#0077be] flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            Derniers colis
                        </h3>
                        <a href="{{ route('admin.packages.index') }}"
                            class="text-[#0077be] hover:text-[#005c91] transition-colors duration-300">
                            Voir tout →
                        </a>
                    </div>

                    @include('admin.packages._table', ['packages' => $recentPackages])
                </div>
            </div>
        </div>
    </div>

    <!-- Styles et Animations -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Personnalisation de la pagination */
        .pagination-link {
            @apply px-3 py-1 rounded-md text-sm font-medium text-[#0077be] hover:bg-[#0077be]/10 transition-colors duration-300;
        }

        .pagination-active {
            @apply bg-[#0077be] text-white;
        }

        /* Hover effects */
        .hover-trigger:hover .hover-target {
            @apply transform scale-105 transition-transform duration-300;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            @apply w-2;
        }

        ::-webkit-scrollbar-track {
            @apply bg-[#0077be]/5 rounded-full;
        }

        ::-webkit-scrollbar-thumb {
            @apply bg-[#0077be]/20 rounded-full hover:bg-[#0077be]/30 transition-colors duration-300;
        }
    </style>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Configuration des graphiques
            const shipmentsCtx = document.getElementById('shipmentsChart').getContext('2d');
            const performanceCtx = document.getElementById('performanceChart').getContext('2d');

            // Graphique des expéditions
            new Chart(shipmentsCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
                    datasets: [{
                        label: 'Expéditions',
                        data: [65, 59, 80, 81, 56, 55],
                        borderColor: '#0077be',
                        backgroundColor: 'rgba(0, 119, 190, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 119, 190, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Graphique de performance
            new Chart(performanceCtx, {
                type: 'doughnut',
                data: {
                    labels: ['À l\'heure', 'Retard léger', 'Retard important'],
                    datasets: [{
                        data: [85, 10, 5],
                        backgroundColor: [
                            '#0077be',
                            '#ffd700',
                            '#005c91'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    cutout: '70%'
                }
            });

            // Animations au défilement
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
        </script>
    @endpush
</x-app-layout>
