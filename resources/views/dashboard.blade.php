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

            <!-- Section des colis avec recherche améliorée -->
            <div id="packages-list" class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center space-y-4 lg:space-y-0">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">Mes colis</h3>
                            <p class="text-sm text-gray-600 mt-1">Gérez et suivez vos envois</p>
                        </div>
                        <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 w-full lg:w-auto">
                            <!-- Recherche -->
                            <div class="relative flex-1 lg:w-80">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text"
                                       id="search-input"
                                       placeholder="Rechercher par numéro, destination..."
                                       class="block w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300">
                            </div>
                            <!-- Filtres -->
                            <select id="status-filter" class="border border-gray-200 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300 bg-white min-w-[140px]">
                                <option value="">Tous les statuts</option>
                                <option value="delivered">Livré</option>
                                <option value="in_transit">En transit</option>
                                <option value="pending">En attente</option>
                            </select>
                            <button disabled class="bg-gray-300 text-gray-500 px-6 py-2.5 rounded-lg cursor-not-allowed font-medium relative group">
                                <i class="fas fa-plus mr-2"></i>
                                Nouveau colis
                                <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-1 bg-gray-800 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                    Fonctionnalité bientôt disponible
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Table responsive -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Colis</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Destination</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Prix</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="packages-tbody" class="bg-white divide-y divide-gray-50">
                            @forelse($packages as $package)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-12 w-12 bg-[#0077be]/10 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-box text-[#0077be]"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $package->tracking_number }}</div>
                                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($package->created_at)->format('d/m/Y à H:i') }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        {{ $package->status === 'delivered'
                                            ? 'bg-green-100 text-green-800'
                                            : ($package->status === 'in_transit'
                                                ? 'bg-yellow-100 text-yellow-800'
                                                : 'bg-blue-100 text-blue-800') }}">
                                            <span class="w-2 h-2 mr-2 rounded-full
                                            {{ $package->status === 'delivered'
                                                ? 'bg-green-400'
                                                : ($package->status === 'in_transit'
                                                    ? 'bg-yellow-400'
                                                    : 'bg-blue-400') }}"></span>
                                            {{ $package->status === 'delivered' ? 'Livré' :
                                               ($package->status === 'in_transit' ? 'En transit' : 'En attente') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center text-sm text-gray-900">
                                            <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                                            <span>{{ Str::limit($package->destination_address, 35) }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-semibold text-gray-900">{{ number_format($package->price, 2) }} €</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('packages.show', $package) }}"
                                               class="inline-flex items-center px-3 py-1.5 bg-[#0077be] text-white text-sm rounded-lg hover:bg-[#005c91] transition-all duration-300">
                                                <i class="fas fa-eye mr-1.5"></i>
                                                Détails
                                            </a>
                                            <button class="p-2 text-gray-400 hover:text-[#ffd700] transition-colors duration-300">
                                                <i class="fas fa-bookmark"></i>
                                            </button>
                                            <button class="p-2 text-gray-400 hover:text-gray-600 transition-colors duration-300">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center">
                                            <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                                            <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun colis trouvé</h3>
                                            <p class="text-gray-500 mb-4">Commencez par créer votre premier envoi</p>
                                            <button class="bg-[#0077be] text-white px-6 py-2 rounded-lg hover:bg-[#005c91] transition-colors">
                                                <i class="fas fa-plus mr-2"></i>
                                                Créer un colis
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination améliorée -->
                @if($packages->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0">
                        <div class="text-sm text-gray-600">
                            Affichage de <span class="font-medium">{{ $packages->firstItem() }}</span> à
                            <span class="font-medium">{{ $packages->lastItem() }}</span>
                            sur <span class="font-medium">{{ $packages->total() }}</span> résultats
                        </div>
                        <div class="flex items-center space-x-1">
                            {{ $packages->links() }}
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
            // Données des colis (simulées pour la démo)
            const packagesData = [
                @foreach($packages as $package)
                {
                    id: {{ $package->id }},
                    tracking_number: '{{ $package->tracking_number }}',
                    status: '{{ $package->status }}',
                    destination_address: '{{ $package->destination_address }}',
                    price: {{ $package->price }},
                    created_at: '{{ $package->created_at }}',
                    route: '{{ route("packages.show", $package) }}'
                },
                @endforeach
            ];

            let filteredPackages = [...packagesData];

            // Fonction pour afficher les colis
            function displayPackages(packages) {
                const tbody = document.getElementById('packages-tbody');
                if (!tbody) return;

                if (packages.length === 0) {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun colis trouvé</h3>
                                    <p class="text-gray-500 mb-4">Essayez de modifier vos critères de recherche</p>
                                </div>
                            </td>
                        </tr>
                    `;
                    return;
                }

                tbody.innerHTML = packages.map(package => {
                    const statusInfo = getStatusInfo(package.status);
                    const formattedDate = new Date(package.created_at).toLocaleDateString('fr-FR', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    return `
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12 bg-[#0077be]/10 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-box text-[#0077be]"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">${package.tracking_number}</div>
                                        <div class="text-sm text-gray-500">${formattedDate}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium ${statusInfo.bgClass} ${statusInfo.textClass}">
                                    <span class="w-2 h-2 mr-2 rounded-full ${statusInfo.dotClass}"></span>
                                    ${statusInfo.label}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center text-sm text-gray-900">
                                    <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                                    <span>${package.destination_address.length > 35 ? package.destination_address.substring(0, 35) + '...' : package.destination_address}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm font-semibold text-gray-900">${Number(package.price).toFixed(2)} €</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="${package.route}"
                                       class="inline-flex items-center px-3 py-1.5 bg-[#0077be] text-white text-sm rounded-lg hover:bg-[#005c91] transition-all duration-300">
                                        <i class="fas fa-eye mr-1.5"></i>
                                        Détails
                                    </a>
                                    <button class="p-2 text-gray-400 hover:text-[#ffd700] transition-colors duration-300">
                                        <i class="fas fa-bookmark"></i>
                                    </button>
                                    <button class="p-2 text-gray-400 hover:text-gray-600 transition-colors duration-300">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                }).join('');
            }

            // Fonction pour obtenir les informations de statut
            function getStatusInfo(status) {
                switch(status) {
                    case 'delivered':
                        return {
                            label: 'Livré',
                            bgClass: 'bg-green-100',
                            textClass: 'text-green-800',
                            dotClass: 'bg-green-400'
                        };
                    case 'in_transit':
                        return {
                            label: 'En transit',
                            bgClass: 'bg-yellow-100',
                            textClass: 'text-yellow-800',
                            dotClass: 'bg-yellow-400'
                        };
                    default:
                        return {
                            label: 'En attente',
                            bgClass: 'bg-blue-100',
                            textClass: 'text-blue-800',
                            dotClass: 'bg-blue-400'
                        };
                }
            }

            // Fonction de filtrage
            function filterPackages() {
                const searchTerm = document.getElementById('search-input').value.toLowerCase();
                const statusFilter = document.getElementById('status-filter').value;

                filteredPackages = packagesData.filter(package => {
                    const matchesSearch =
                        package.tracking_number.toLowerCase().includes(searchTerm) ||
                        package.destination_address.toLowerCase().includes(searchTerm);

                    const matchesStatus = !statusFilter || package.status === statusFilter;

                    return matchesSearch && matchesStatus;
                });

                displayPackages(filteredPackages);
                updateResultsCount();
            }

            // Fonction pour mettre à jour le compteur de résultats
            function updateResultsCount() {
                const countElement = document.querySelector('.text-sm.text-gray-600');
                if (countElement) {
                    const total = filteredPackages.length;
                    const showing = Math.min(10, total); // Assuming 10 per page
                    countElement.innerHTML = `
                        Affichage de <span class="font-medium">1</span> à
                        <span class="font-medium">${showing}</span>
                        sur <span class="font-medium">${total}</span> résultats
                    `;
                }
            }

            // Recherche en temps réel
            const searchInput = document.getElementById('search-input');
            if (searchInput) {
                let searchTimeout;
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        filterPackages();
                    }, 300);
                });
            }

            // Filtre par statut
            const statusFilter = document.getElementById('status-filter');
            if (statusFilter) {
                statusFilter.addEventListener('change', filterPackages);
            }

            // Affichage initial
            displayPackages(packagesData);

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
                            hoverOffset: 6
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
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observer les cartes pour l'animation
            document.querySelectorAll('.shadow-lg').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
    @endpush

    <style>
        /* Animations personnalisées */
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

        .animate-slide-up {
            animation: slideInUp 0.6s ease-out;
        }

        /* Scrollbar personnalisée */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Amélioration des focus states */
        .focus\:ring-2:focus {
            box-shadow: 0 0 0 2px rgba(0, 119, 190, 0.2);
        }

        /* Responsive improvements */
        @media (max-width: 640px) {
            .overflow-x-auto table {
                font-size: 0.875rem;
            }

            .overflow-x-auto th,
            .overflow-x-auto td {
                padding: 0.75rem 0.5rem;
            }
        }
    </style>
</x-app-layout>
