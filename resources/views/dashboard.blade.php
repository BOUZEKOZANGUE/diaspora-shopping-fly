<x-app-layout>
    <!-- Header amélioré avec animation -->
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div class="animate-fade-in">
                <h2
                    class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-[#0077be] to-[#005c91] text-transparent bg-clip-text">
                    {{ __('Tableau de bord') }}
                </h2>
                <p class="text-[#0077be]/70 text-sm md:text-base mt-1">Bienvenue sur votre espace personnel</p>
            </div>
            <div class="flex space-x-4 animate-fade-in">
                {{-- <a href="#"
                    class="inline-flex items-center px-4 py-2 bg-white border border-[#0077be] text-[#0077be] rounded-lg hover:bg-[#0077be]/5 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    Filtrer
                </a> --}}
                {{-- <a href="{{ route('packages.create') }}"
                    class="inline-flex items-center px-6 py-2.5 bg-[#ffd700] text-[#0077be] font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nouveau colis
                </a> --}}
            </div>
        </div>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
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
        <div class="mt-4 flex items-center text-[#0077be]/70 text-sm">
            <svg class="w-4 h-4 text-green-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
            </svg>
            <span class="text-green-500 font-medium">Tous vos colis</span>
        </div>
    </div>



    <!-- Livrés -->
    <div class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-[#ffd700]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-[#0077be]/70">Livrés</p>
                <p class="mt-2 text-3xl font-bold text-[#0077be]">{{ $stats['delivered_packages'] }}</p>
            </div>
            <div class="bg-[#005c91]/10 p-3 rounded-lg">
                <svg class="w-8 h-8 text-[#005c91]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        <div class="mt-4 flex items-center text-[#0077be]/70 text-sm">
            @php
                $deliveryRate = $stats['total_packages'] > 0
                    ? round(($stats['delivered_packages'] / $stats['total_packages']) * 100)
                    : 0;
            @endphp
            <span class="inline-block px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">
                {{ $deliveryRate }}% de livraison complétée
            </span>
        </div>
    </div>

    <!-- Satisfaction -->
    <div class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-[#0077be]/70">Performance</p>
                <p class="mt-2 text-3xl font-bold text-[#0077be]">{{ $deliveryRate }}%</p>
            </div>
            <div class="bg-green-100 p-3 rounded-lg">
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        <div class="mt-4 flex space-x-1 text-[#ffd700]">
            @for($i = 0; $i < 5; $i++)
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            @endfor
        </div>
    </div>
</div>

    <!-- Colis récents -->

            <!-- Tableau des colis amélioré -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-[#0077be]/10">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                        <h3 class="text-xl font-semibold text-[#0077be] flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            Mes colis récents
                        </h3>
                        <div class="mt-4 md:mt-0 flex items-center space-x-4">
                            <div class="relative">
                                <input type="text" placeholder="Rechercher..."
                                    class="pl-10 pr-4 py-2 border border-[#0077be]/20 rounded-lg focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300">
                                <svg class="w-5 h-5 text-[#0077be]/40 absolute left-3 top-1/2 transform -translate-y-1/2"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <select
                                class="border border-[#0077be]/20 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300">
                                <option>Tous les statuts</option>
                                <option>En transit</option>
                                <option>Livré</option>
                                <option>En attente</option>
                            </select>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-[#0077be]/10">
                            <thead>
                                <tr class="bg-[#0077be]/5">
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-[#0077be] uppercase tracking-wider">
                                        Numéro de suivi</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-[#0077be] uppercase tracking-wider">
                                        Statut</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-[#0077be] uppercase tracking-wider">
                                        Destination</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-[#0077be] uppercase tracking-wider">
                                        Prix</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-[#0077be] uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-[#0077be]/10">
                                @forelse($packages as $package)
                                    <tr class="hover:bg-[#0077be]/5 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#005c91]">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-[#0077be]" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <!-- Suite du tableau -->
                                                    stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                {{ $package->tracking_number }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                        {{ $package->status === 'delivered'
                                            ? 'bg-green-100 text-green-800'
                                            : ($package->status === 'in_transit'
                                                ? 'bg-[#ffd700]/20 text-[#005c91]'
                                                : 'bg-[#0077be]/10 text-[#0077be]') }}">
                                                <span
                                                    class="w-2 h-2 mr-1 rounded-full
                                            {{ $package->status === 'delivered'
                                                ? 'bg-green-400'
                                                : ($package->status === 'in_transit'
                                                    ? 'bg-[#ffd700]'
                                                    : 'bg-[#0077be]') }}"></span>
                                                {{ $package->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center text-sm text-[#005c91]">
                                                <svg class="w-4 h-4 mr-2 text-[#0077be]/70" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                {{ $package->destination_address }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-[#005c91]">
                                                {{ number_format($package->price, 2) }} €
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('packages.show', $package) }}"
                                                    class="inline-flex items-center px-3 py-1.5 bg-[#0077be]/10 text-[#0077be] rounded-lg hover:bg-[#0077be]/20 transition-all duration-300">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Détails
                                                </a>
                                                <button
                                                    class="text-[#ffd700] hover:text-[#0077be] transition-colors duration-300">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-10 text-center">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-16 h-16 text-[#0077be]/30" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                </svg>
                                                <p class="mt-4 text-[#0077be]/70 font-medium">Aucun colis trouvé</p>
                                                <a href="{{ route('packages.create') }}"
                                                    class="mt-3 inline-flex items-center px-4 py-2 bg-[#ffd700] text-[#0077be] rounded-lg hover:bg-[#ffd700]/90 transition-all duration-300">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                    Créer un nouveau colis
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination améliorée -->
                    <div class="mt-6">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-[#0077be]/70">
                                Affichage de <span class="font-medium">1</span> à <span class="font-medium">10</span>
                                sur <span class="font-medium">{{ $stats['total_packages'] }}</span> résultats
                            </div>
                            {{ $packages->links() }}
                        </div>
                    </div>
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
