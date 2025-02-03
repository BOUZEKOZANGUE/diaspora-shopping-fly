<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="p-2.5 bg-[#0077BE] rounded-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#CFB53B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-[#0077BE]">
                    {{ __('Gestion des Colis DSF') }}
                </h2>
            </div>
            <a href="{{ route('packages.create') }}"
               class="inline-flex items-center px-4 py-2 border border-transparent rounded-xl text-sm font-medium text-white bg-[#0077BE] hover:bg-[#005c92] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#CFB53B] transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nouveau colis
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Status Filter and Search -->
            <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-medium text-gray-700">Filtrer par statut:</span>
                    <select id="status-filter" class="rounded-lg border-gray-300 text-sm focus:ring-[#0077BE] focus:border-[#0077BE]">
                        <option value="">Tous les statuts</option>
                        <option value="pending">En attente</option>
                        <option value="processing">En cours de traitement</option>
                        <option value="in_transit">En transit</option>
                        <option value="delivered">Livré</option>
                    </select>
                </div>
                <div class="flex-1 max-w-md">
                    <div class="relative">
                        <input type="text" id="search"
                               class="w-full rounded-lg border-gray-300 pl-10 focus:ring-[#0077BE] focus:border-[#0077BE]"
                               placeholder="Rechercher par numéro de suivi ou destination...">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Packages Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                @php
                    $totalPackages = $packages->total();
                    $pendingCount = $packages->where('status', 'pending')->count();
                    $inTransitCount = $packages->where('status', 'in_transit')->count();
                    $deliveredCount = $packages->where('status', 'delivered')->count();
                @endphp

                <div class="bg-white rounded-xl shadow-sm p-4 border-l-4 border-[#0077BE]">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-[#0077BE]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-500">Total Colis</div>
                            <div class="text-lg font-semibold text-gray-900">{{ $totalPackages }}</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-4 border-l-4 border-yellow-500">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-500">En attente</div>
                            <div class="text-lg font-semibold text-gray-900">{{ $pendingCount }}</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-4 border-l-4 border-[#CFB53B]">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-[#CFB53B]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-500">En transit</div>
                            <div class="text-lg font-semibold text-gray-900">{{ $inTransitCount }}</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-4 border-l-4 border-green-500">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-500">Livrés</div>
                            <div class="text-lg font-semibold text-gray-900">{{ $deliveredCount }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Packages Table -->
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numéro</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poids</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destination</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="relative px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($packages as $package)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#0077BE]">
                                    {{ $package->tracking_number }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $package->weight }} {{ $package->weight_unit }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                    {{ $package->destination_address }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if($package->status === 'delivered')
                                            bg-green-100 text-green-800
                                        @elseif($package->status === 'in_transit')
                                            bg-[#CFB53B] bg-opacity-20 text-[#CFB53B]
                                        @elseif($package->status === 'processing')
                                            bg-yellow-100 text-yellow-800
                                        @else
                                            bg-gray-100 text-gray-800
                                        @endif">
                                        {{ __("packages.status.{$package->status}") }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ number_format($package->price, 2) }} €
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $package->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                    <a href="{{ route('packages.show', $package) }}"
                                       class="text-[#0077BE] hover:text-[#005c92]">Voir</a>
                                    <a href="{{ route('packages.edit', $package) }}"
                                       class="text-[#CFB53B] hover:text-[#9e8c2d]">Modifier</a>
                                    <button onclick="if(confirm('Êtes-vous sûr de vouloir supprimer ce colis ?')) document.getElementById('delete-form-{{ $package->id }}').submit()"
                                            class="text-red-600 hover:text-red-900">
                                        Supprimer
                                    </button>
                                    <form id="delete-form-{{ $package->id }}"
                                          action="{{ route('packages.destroy', $package) }}"
                                          method="POST"
                                          class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#0077BE]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                        <p>Aucun colis trouvé</p>
                                        <a href="{{ route('packages.create') }}" class="text-[#0077BE] hover:text-[#005c92]">
                                            Créer votre premier colis
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if($packages->hasPages())
                    <div class="px-6 py-4 bg-gray-50">
                        {{ $packages->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusFilter = document.getElementById('status-filter');
            const searchInput = document.getElementById('search');
            let searchTimeout;

            // Fonction pour mettre à jour l'URL avec les paramètres
            function updateUrl(params) {
                const url = new URL(window.location);
                Object.keys(params).forEach(key => {
                    if (params[key]) {
                        url.searchParams.set(key, params[key]);
                    } else {
                        url.searchParams.delete(key);
                    }
                });
                window.history.pushState({}, '', url);
                window.location.reload();
            }

            // Gestion du filtre par statut
            statusFilter.addEventListener('change', function() {
                updateUrl({
                    status: this.value,
                    search: searchInput.value
                });
            });

            // Gestion de la recherche avec debounce
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    updateUrl({
                        status: statusFilter.value,
                        search: this.value
                    });
                }, 500);
            });

            // Set initial values from URL
            const urlParams = new URLSearchParams(window.location.search);
            const currentStatus = urlParams.get('status');
            const currentSearch = urlParams.get('search');

            if (currentStatus) {
                statusFilter.value = currentStatus;
            }
            if (currentSearch) {
                searchInput.value = currentSearch;
            }
        });
    </script>
    @endpush

    @push('styles')
    <style>
        /* Custom styles for DSF color scheme */
        .pagination-theme {
            --pagination-color: #0077BE;
            --pagination-hover-color: #005c92;
        }

        .pagination span.current-page {
            background-color: #0077BE !important;
            border-color: #0077BE !important;
        }

        /* Status badge animations */
        .status-badge {
            transition: all 0.3s ease;
        }

        .status-badge:hover {
            transform: scale(1.05);
        }

        /* Table row hover effect */
        tr.hover-effect:hover {
            box-shadow: 0 0 10px rgba(0, 119, 190, 0.1);
        }
    </style>
    @endpush
</x-app-layout>
