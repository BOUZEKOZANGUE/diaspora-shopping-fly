<x-app-layout>
    <!-- Header amélioré avec animation -->
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div class="animate-fade-in">
                <h2 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-[#0077be] to-[#005c91] text-transparent bg-clip-text">
                    Administration
                </h2>
                <p class="text-[#0077be]/70 text-sm md:text-base mt-1">Bienvenue sur votre espace d'administration</p>
            </div>
            <div class="flex space-x-4 animate-fade-in">
                <a href="#"
                    class="inline-flex items-center px-4 py-2 bg-white border border-[#0077be] text-[#0077be] rounded-lg hover:bg-[#0077be]/5 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    Filtrer
                </a>
                <a href="{{ route('admin.packages.create') }}"
                    class="inline-flex items-center px-6 py-2.5 bg-[#ffd700] text-[#0077be] font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nouveau colis
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Colis -->
                <div class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-[#0077be]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-[#0077be]/70">Total Colis</p>
                            <p class="mt-2 text-3xl font-bold text-[#0077be]">{{ $stats['total_packages'] }}</p>
                        </div>
                        <div class="bg-[#0077be]/10 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Utilisateurs -->
                <div class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-[#ffd700]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-[#0077be]/70">Utilisateurs</p>
                            <p class="mt-2 text-3xl font-bold text-[#0077be]">{{ $stats['total_users'] }}</p>
                        </div>
                        <div class="bg-[#ffd700]/10 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-[#ffd700]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Revenu Total -->
                <div class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-[#0077be]/70">Revenu Total</p>
                            <p class="mt-2 text-3xl font-bold text-[#0077be]">{{ number_format($stats['revenue'], 2) }} €</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Satisfaction -->
                <div class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-[#005c91]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-[#0077be]/70">Satisfaction</p>
                            <p class="mt-2 text-3xl font-bold text-[#0077be]">95%</p>
                        </div>
                        <div class="bg-[#005c91]/10 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-[#005c91]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            Derniers colis
                        </h3>
                        <a href="{{ route('admin.packages.index') }}" class="text-[#0077be] hover:text-[#005c91] transition-colors duration-300">
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
            0%, 100% {
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
