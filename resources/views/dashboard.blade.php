<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50/30">
        <!-- Header avec statistiques rapides -->
        <div class="bg-white shadow-sm border-b sticky top-0 z-30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Tableau de bord</h1>
                        <p class="text-sm text-gray-600 mt-1">Gérez vos colis en temps réel</p>
                    </div>
                    <div class="flex items-center space-x-6">
                        @php
                            $deliveryRate = $stats['total_packages'] > 0
                                ? round(($stats['delivered_packages'] / $stats['total_packages']) * 100)
                                : 0;
                        @endphp
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-[#0077be] rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium text-gray-700">{{ $stats['total_packages'] }} colis</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="text-sm font-medium text-gray-700">{{ $deliveryRate }}% livrés</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-8">
            <!-- Carte de progression principale -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-[#0077be] to-[#005c91] px-6 py-8 text-white">
                    <div class="flex flex-col lg:flex-row items-center justify-between">
                        <div class="text-center lg:text-left mb-6 lg:mb-0">
                            <h2 class="text-3xl font-bold mb-2">{{ $deliveryRate }}%</h2>
                            <p class="text-blue-100 text-lg">Taux de livraison</p>
                            <div class="flex items-center justify-center lg:justify-start mt-3">
                                <div class="flex space-x-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star text-[#ffd700] {{ $deliveryRate >= $i * 20 ? '' : 'opacity-30' }}"></i>
                                    @endfor
                                </div>
                                <span class="ml-2 text-sm text-blue-100">Excellent</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-8">
                            <div class="text-center">
                                <div class="text-4xl font-bold">{{ $stats['total_packages'] }}</div>
                                <div class="text-blue-100 text-sm mt-1">Total</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold text-[#ffd700]">{{ $stats['delivered_packages'] }}</div>
                                <div class="text-blue-100 text-sm mt-1">Livrés</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold text-orange-300">{{ $stats['total_packages'] - $stats['delivered_packages'] }}</div>
                                <div class="text-blue-100 text-sm mt-1">En cours</div>
                            </div>
                        </div>
                    </div>
                    <!-- Barre de progression -->
                    <div class="mt-6">
                        <div class="flex justify-between text-sm mb-2">
                            <span>Progression</span>
                            <span>{{ $deliveryRate }}%</span>
                        </div>
                        <div class="w-full bg-white/20 rounded-full h-3">
                            <div class="bg-[#ffd700] h-3 rounded-full transition-all duration-1000 ease-out"
                                 style="width: {{ $deliveryRate }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grille de cartes statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                <!-- Activité récente -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Activité récente</h3>
                            <div class="p-2 bg-[#0077be]/10 rounded-lg">
                                <i class="fas fa-clock text-[#0077be]"></i>
                            </div>
                        </div>
                        <div class="space-y-4">
                            @forelse(array_slice($packages->items(), 0, 4) as $package)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 rounded-full {{ $package->status === 'delivered' ? 'bg-green-500' : ($package->status === 'in_transit' ? 'bg-[#ffd700]' : 'bg-[#0077be]') }}"></div>
                                        <div>
                                            <p class="font-medium text-sm text-gray-900">#{{ substr($package->tracking_number, -6) }}</p>
                                            <p class="text-xs text-gray-500">{{ Str::limit($package->destination_address, 20) }}</p>
                                        </div>
                                    </div>
                                    <span class="text-xs px-2 py-1 rounded-full {{ $package->status === 'delivered' ? 'bg-green-100 text-green-800' : ($package->status === 'in_transit' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                        {{ $package->status === 'delivered' ? 'Livré' : ($package->status === 'in_transit' ? 'Transit' : 'Attente') }}
                                    </span>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <i class="fas fa-inbox text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-gray-500">Aucune activité récente</p>
                                </div>
                            @endforelse
                        </div>
                        <a href="#packages-list" class="inline-flex items-center text-[#0077be] hover:text-[#005c91] text-sm font-medium mt-4 transition-colors">
                            Voir tout
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Graphique des statuts -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Répartition des statuts</h3>
                            <div class="p-2 bg-[#ffd700]/20 rounded-lg">
                                <i class="fas fa-chart-pie text-[#ffd700]"></i>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="relative w-40 h-40">
                                <canvas id="statusChart"></canvas>
                            </div>
                        </div>
                        <div class="flex justify-center space-x-6 mt-4">
                            <div class="text-center">
                                <div class="flex items-center justify-center space-x-2 mb-1">
                                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                    <span class="text-sm text-gray-600">Livrés</span>
                                </div>
                                <div class="font-bold text-lg">{{ $stats['delivered_packages'] }}</div>
                            </div>
                            <div class="text-center">
                                <div class="flex items-center justify-center space-x-2 mb-1">
                                    <div class="w-3 h-3 bg-[#ffd700] rounded-full"></div>
                                    <span class="text-sm text-gray-600">En cours</span>
                                </div>
                                <div class="font-bold text-lg">{{ $stats['total_packages'] - $stats['delivered_packages'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Métriques de performance -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden md:col-span-2 xl:col-span-1">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">Performance</h3>
                            <div class="p-2 bg-green-100 rounded-lg">
                                <i class="fas fa-trophy text-green-600"></i>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm text-gray-600">Délai moyen</span>
                                    <span class="font-semibold text-[#0077be]">5-7 jours</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm text-gray-600">Précision</span>
                                    <span class="font-semibold text-[#0077be]">96%</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-[#0077be] h-2 rounded-full" style="width: 96%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm text-gray-600">Satisfaction</span>
                                    <span class="font-semibold text-[#0077be]">4.8/5</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-[#ffd700] h-2 rounded-full" style="width: 96%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section des colis ultra-simplifiée et intuitive -->
            <div id="packages-list" class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                                <i class="fas fa-box-open text-[#0077be] mr-3"></i>
                                Mes colis
                            </h3>
                            <p class="text-sm text-gray-600 mt-1">{{ $packages->total() }} colis au total</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span>Livré</span>
                            </div>
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <div class="w-2 h-2 bg-[#ffd700] rounded-full"></div>
                                <span>Transit</span>
                            </div>
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <div class="w-2 h-2 bg-[#0077be] rounded-full"></div>
                                <span>Attente</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cards design pour mobile et desktop -->
                <div class="p-6 space-y-4">
                    @forelse($packages as $package)
                        <div class="group bg-gray-50 hover:bg-white border border-transparent hover:border-[#0077be]/20 rounded-xl p-5 transition-all duration-300 hover:shadow-lg cursor-pointer">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between space-y-4 sm:space-y-0">
                                <!-- Informations principales -->
                                <div class="flex items-center space-x-4 flex-1">
                                    <!-- Indicateur de statut visuel -->
                                    <div class="relative">
                                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $package->status === 'delivered' ? 'from-green-500 to-green-600' : ($package->status === 'in_transit' ? 'from-[#ffd700] to-yellow-500' : 'from-[#0077be] to-[#005c91]') }} flex items-center justify-center shadow-lg">
                                            <i class="fas {{ $package->status === 'delivered' ? 'fa-check' : ($package->status === 'in_transit' ? 'fa-truck' : 'fa-clock') }} text-white text-lg"></i>
                                        </div>
                                        <div class="absolute -top-1 -right-1 w-4 h-4 {{ $package->status === 'delivered' ? 'bg-green-500' : ($package->status === 'in_transit' ? 'bg-[#ffd700]' : 'bg-[#0077be]') }} rounded-full border-2 border-white animate-pulse"></div>
                                    </div>

                                    <!-- Détails du colis -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center space-x-3 mb-2">
                                            <h4 class="font-bold text-gray-900 text-lg">{{ $package->tracking_number }}</h4>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $package->status === 'delivered' ? 'bg-green-100 text-green-800' : ($package->status === 'in_transit' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                                {{ $package->status === 'delivered' ? 'Livré' : ($package->status === 'in_transit' ? 'En transit' : 'En attente') }}
                                            </span>
                                        </div>

                                        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 space-y-2 sm:space-y-0 text-sm text-gray-600">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-map-marker-alt text-gray-400"></i>
                                                <span>{{ Str::limit($package->destination_address, 40) }}</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-calendar text-gray-400"></i>
                                                <span>{{ \Carbon\Carbon::parse($package->created_at)->format('d/m/Y') }}</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-euro-sign text-gray-400"></i>
                                                <span class="font-semibold text-gray-900">{{ number_format($package->price, 2) }} €</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('packages.show', $package) }}"
                                       class="inline-flex items-center px-4 py-2 bg-[#0077be] hover:bg-[#005c91] text-white text-sm font-medium rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                        <i class="fas fa-route mr-2"></i>
                                        Détails colis
                                    </a>

                                    <button class="p-2 text-gray-400 hover:text-[#ffd700] hover:bg-[#ffd700]/10 rounded-lg transition-all duration-300" title="Ajouter aux favoris">
                                        <i class="far fa-star"></i>
                                    </button>

                                    {{-- <div class="relative group/menu">
                                        <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-all duration-300">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <!-- Menu contextuel -->
                                        <div class="absolute right-0 top-full mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-100 opacity-0 invisible group-hover/menu:opacity-100 group-hover/menu:visible transition-all duration-300 z-10">
                                            <div class="py-2">
                                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                                    <i class="fas fa-bell mr-3 text-gray-400"></i>
                                                    Activer les notifications
                                                </a>
                                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                                    <i class="fas fa-share mr-3 text-gray-400"></i>
                                                    Partager le suivi
                                                </a>
                                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                                    <i class="fas fa-history mr-3 text-gray-400"></i>
                                                    Historique complet
                                                </a>
                                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                                    <i class="fas fa-download mr-3 text-gray-400"></i>
                                                    Télécharger le récépissé
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <!-- Barre de progression du statut avec étapes visuelles -->
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs font-medium text-gray-600">Progression de la livraison</span>
                                    <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                        {{ $package->status === 'delivered' ? 'Terminé' : ($package->status === 'in_transit' ? 'En cours' : 'Démarré') }}
                                    </span>
                                </div>

                                <!-- Timeline visuelle -->
                                <div class="flex items-center justify-between relative">
                                    <!-- Ligne de progression -->
                                    <div class="absolute top-4 left-4 right-4 h-0.5 bg-gray-200">
                                        <div class="h-full transition-all duration-1000 ease-out {{ $package->status === 'delivered' ? 'bg-green-500' : ($package->status === 'in_transit' ? 'bg-[#ffd700]' : 'bg-[#0077be]') }}"
                                             style="width: {{ $package->status === 'delivered' ? '100%' : ($package->status === 'in_transit' ? '50%' : '0%') }}"></div>
                                    </div>

                                    <!-- Étapes -->
                                    <div class="flex items-center justify-between w-full relative z-10">
                                        <!-- Étape 1: Pris en charge -->
                                        <div class="flex flex-col items-center">
                                            <div class="w-8 h-8 rounded-full flex items-center justify-center border-2 transition-all duration-300
                                                {{ $package->status !== 'pending' ? 'bg-[#0077be] border-[#0077be] text-white' : 'bg-white border-gray-300 text-gray-400' }}">
                                                <i class="fas fa-box text-xs"></i>
                                            </div>
                                            <span class="text-xs mt-1 text-center {{ $package->status !== 'pending' ? 'text-[#0077be] font-medium' : 'text-gray-400' }}">
                                                Pris en charge
                                            </span>
                                        </div>

                                        <!-- Étape 2: En transit -->
                                        <div class="flex flex-col items-center">
                                            <div class="w-8 h-8 rounded-full flex items-center justify-center border-2 transition-all duration-300
                                                {{ $package->status === 'in_transit' || $package->status === 'delivered' ? 'bg-[#ffd700] border-[#ffd700] text-white' : 'bg-white border-gray-300 text-gray-400' }}">
                                                <i class="fas fa-truck text-xs"></i>
                                            </div>
                                            <span class="text-xs mt-1 text-center {{ $package->status === 'in_transit' || $package->status === 'delivered' ? 'text-[#ffd700] font-medium' : 'text-gray-400' }}">
                                                En transit
                                            </span>
                                        </div>

                                        <!-- Étape 3: Livré -->
                                        <div class="flex flex-col items-center">
                                            <div class="w-8 h-8 rounded-full flex items-center justify-center border-2 transition-all duration-300
                                                {{ $package->status === 'delivered' ? 'bg-green-500 border-green-500 text-white' : 'bg-white border-gray-300 text-gray-400' }}">
                                                <i class="fas fa-check text-xs"></i>
                                            </div>
                                            <span class="text-xs mt-1 text-center {{ $package->status === 'delivered' ? 'text-green-500 font-medium' : 'text-gray-400' }}">
                                                Livré
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Estimation de livraison -->
                                @if($package->status !== 'delivered')
                                <div class="mt-3 text-center">
                                    <span class="text-xs text-gray-500">
                                        <i class="fas fa-clock mr-1"></i>
                                        Livraison estimée :
                                        <span class="font-medium text-[#0077be]">
                                            {{ $package->status === 'in_transit' ? '2-3 jours' : '5-7 jours' }}
                                        </span>
                                    </span>
                                </div>
                                @else
                                <div class="mt-3 text-center">
                                    <span class="text-xs text-green-600 bg-green-50 px-3 py-1 rounded-full">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Colis livré avec succès
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-16">
                            <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                                <i class="fas fa-search text-3xl text-gray-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Aucun colis à suivre</h3>
                            <p class="text-gray-500 mb-6">Vos colis apparaîtront ici automatiquement dès qu'ils seront disponibles</p>
                            <div class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-600 font-medium rounded-xl">
                                <i class="fas fa-clock mr-2"></i>
                                En attente de nouveaux colis...
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination ultra-simple -->
                @if($packages->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0">
                        <div class="text-sm text-gray-600 flex items-center space-x-2">
                            <i class="fas fa-info-circle text-gray-400"></i>
                            <span>Page {{ $packages->currentPage() }} sur {{ $packages->lastPage() }} • {{ $packages->total() }} colis au total</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            @if($packages->onFirstPage())
                                <span class="px-3 py-2 text-gray-400 cursor-not-allowed">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @else
                                <a href="{{ $packages->previousPageUrl() }}" class="px-3 py-2 text-[#0077be] hover:bg-[#0077be]/10 rounded-lg transition-colors">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @endif

                            <span class="px-4 py-2 bg-[#0077be] text-white rounded-lg font-medium">
                                {{ $packages->currentPage() }}
                            </span>

                            @if($packages->hasMorePages())
                                <a href="{{ $packages->nextPageUrl() }}" class="px-3 py-2 text-[#0077be] hover:bg-[#0077be]/10 rounded-lg transition-colors">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @else
                                <span class="px-3 py-2 text-gray-400 cursor-not-allowed">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Graphique en doughnut
            const ctx = document.getElementById('statusChart');
            if (ctx) {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Livrés', 'En transit', 'En attente'],
                        datasets: [{
                            data: [
                                {{ $stats['delivered_packages'] }},
                                {{ isset($stats['in_transit_packages']) ? $stats['in_transit_packages'] : max(0, $stats['total_packages'] - $stats['delivered_packages']) }},
                                {{ max(0, $stats['total_packages'] - $stats['delivered_packages'] - (isset($stats['in_transit_packages']) ? $stats['in_transit_packages'] : 0)) }}
                            ],
                            backgroundColor: ['#22c55e', '#ffd700', '#0077be'],
                            borderWidth: 0,
                            hoverOffset: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '65%',
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            }

            // Animation des cartes au scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 100);
                    }
                });
            }, observerOptions);

            // Observer les cartes de colis pour l'animation
            document.querySelectorAll('#packages-list .group').forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });

            // Interaction hover enrichie
            document.querySelectorAll('#packages-list .group').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Gestion des étoiles favorites avec animation
            document.querySelectorAll('.fa-star').forEach(star => {
                star.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    this.classList.toggle('fas');
                    this.classList.toggle('far');

                    if (this.classList.contains('fas')) {
                        this.style.color = '#ffd700';
                        this.style.transform = 'scale(1.2)';
                        setTimeout(() => {
                            this.style.transform = 'scale(1)';
                        }, 200);
                    } else {
                        this.style.color = '';
                        this.style.transform = 'scale(0.9)';
                        setTimeout(() => {
                            this.style.transform = 'scale(1)';
                        }, 200);
                    }
                });
            });

            // Animation des indicateurs de statut avec pulsation
            document.querySelectorAll('.animate-pulse').forEach(indicator => {
                setInterval(() => {
                    indicator.style.opacity = '0.3';
                    setTimeout(() => {
                        indicator.style.opacity = '1';
                    }, 500);
                }, 2000);
            });

            // Effet de survol amélioré pour les cartes
            document.querySelectorAll('#packages-list .group').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px) scale(1.01)';
                    this.style.boxShadow = '0 20px 40px rgba(0, 119, 190, 0.1)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                    this.style.boxShadow = '';
                });
            });
        });
    </script>
    @endpush

    <style>
        /* Animations personnalisées avancées */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 5px rgba(0, 119, 190, 0.3);
            }
            50% {
                box-shadow: 0 0 20px rgba(0, 119, 190, 0.6), 0 0 30px rgba(0, 119, 190, 0.4);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -468px 0;
            }
            100% {
                background-position: 468px 0;
            }
        }

        /* Classe d'animation flottante pour les indicateurs */
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Animation de pulsation avec glow */
        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        /* Animation shimmer pour les éléments de chargement */
        .shimmer {
            background: linear-gradient(to right, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
            background-size: 800px 104px;
            animation: shimmer 1.5s infinite linear;
        }

        /* Améliorations de la scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: linear-gradient(90deg, #f1f5f9, #e2e8f0);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #0077be, #005c91);
            border-radius: 4px;
            border: 1px solid #f1f5f9;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(90deg, #005c91, #004472);
            box-shadow: 0 2px 4px rgba(0, 119, 190, 0.3);
        }

        /* États de focus améliorés avec animations */
        .focus\:ring-2:focus {
            box-shadow: 0 0 0 3px rgba(0, 119, 190, 0.2);
            border-color: #0077be;
            transition: all 0.3s ease;
        }

        /* Animations de hover pour les boutons */
        .btn-hover-effect {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-hover-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-hover-effect:hover::before {
            left: 100%;
        }

        /* Effets de particules pour les éléments interactifs */
        .particle-effect {
            position: relative;
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
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .particle-effect:hover::after {
            width: 100px;
            height: 100px;
            opacity: 0;
        }

        /* Amélioration responsive avec breakpoints personnalisés */
        @media (max-width: 640px) {
            .overflow-x-auto table {
                font-size: 0.875rem;
            }

            .overflow-x-auto th,
            .overflow-x-auto td {
                padding: 0.75rem 0.5rem;
            }

            /* Cards mobiles optimisées */
            #packages-list .group {
                margin: 0 -1rem;
                border-radius: 0;
                border-left: none;
                border-right: none;
            }

            /* Typography responsive */
            .text-xl {
                font-size: 1.125rem;
            }

            .text-lg {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            /* Espacement réduit pour très petits écrans */
            .space-y-4 > :not([hidden]) ~ :not([hidden]) {
                margin-top: 0.75rem;
            }

            /* Padding réduit */
            .p-6 {
                padding: 1rem;
            }

            .px-6 {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* Mode sombre (préparation future) */
        @media (prefers-color-scheme: dark) {
            .dark-mode {
                --bg-primary: #1a202c;
                --bg-secondary: #2d3748;
                --text-primary: #f7fafc;
                --text-secondary: #e2e8f0;
                --border-color: #4a5568;
            }
        }

        /* Animations d'entrée séquentielles */
        .animate-slide-up {
            animation: slideInUp 0.6s ease-out;
        }

        .animate-slide-up-delay-1 {
            animation: slideInUp 0.6s ease-out 0.1s both;
        }

        .animate-slide-up-delay-2 {
            animation: slideInUp 0.6s ease-out 0.2s both;
        }

        .animate-slide-up-delay-3 {
            animation: slideInUp 0.6s ease-out 0.3s both;
        }

        /* Effets de glassmorphism pour les éléments flottants */
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Animations de chargement pour les états de transition */
        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }

        /* Micro-interactions pour les éléments tactiles */
        .touch-feedback {
            transition: all 0.15s ease;
        }

        .touch-feedback:active {
            transform: scale(0.98);
        }

        /* Indicateurs de progression animés */
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
                rgba(255, 255, 255, 0.2) 25%,
                transparent 25%,
                transparent 50%,
                rgba(255, 255, 255, 0.2) 50%,
                rgba(255, 255, 255, 0.2) 75%,
                transparent 75%,
                transparent
            );
            background-size: 50px 50px;
            animation: move 2s linear infinite;
        }

        @keyframes move {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 50px 50px;
            }
        }

        /* États de connexion et de synchronisation */
        .connection-indicator {
            position: relative;
        }

        .connection-indicator.online::before {
            content: '';
            position: absolute;
            top: -2px;
            right: -2px;
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            border: 2px solid white;
            animation: pulse 2s infinite;
        }

        .connection-indicator.syncing::before {
            background: #f59e0b;
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            }
            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
            }
            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        /* Optimisations de performance */
        .gpu-accelerated {
            transform: translateZ(0);
            will-change: transform;
        }

        /* Transitions fluides pour tous les éléments interactifs */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Focus visible amélioré pour l'accessibilité */
        .focus-visible:focus-visible {
            outline: 2px solid #0077be;
            outline-offset: 2px;
            border-radius: 4px;
        }
    </style>
</x-app-layout>
