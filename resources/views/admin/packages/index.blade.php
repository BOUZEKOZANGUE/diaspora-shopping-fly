<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-r from-[#0077be] to-blue-800 rounded-2xl shadow-lg p-6">
            <div class="absolute inset-0 bg-grid-white/[0.05] bg-[size:20px_20px]"></div>
            <div class="relative flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-white/10 rounded-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-white">Gestion des Colis</h2>
                        <p class="text-white/70">
                            <span id="selected-count" class="hidden">0 sélectionné(s)</span>
                            <span id="total-count">{{ $packages->total() }} colis au total</span>
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row items-center gap-4">
                    <div class="relative flex-grow md:flex-grow-0 w-full md:w-auto">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="w-full md:w-64 pl-10 pr-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#0077be] focus:border-transparent transition-all duration-300"
                            placeholder="Rechercher un colis...">
                    </div>
                    <div class="flex items-center space-x-3">
                        <button id="export-btn"
                            class="inline-flex items-center px-4 py-2 bg-green-500 text-white font-semibold rounded-xl shadow-lg hover:bg-green-600 transform hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Exporter
                        </button>
                        <a href="{{ route('admin.packages.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-yellow-400 text-blue-800 font-semibold rounded-xl shadow-lg hover:bg-yellow-300 transform hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Nouveau colis
                        </a>
                    </div>
                </div>
            </div>

            <!-- Filtres rapides -->
            <div class="mt-6 flex flex-wrap gap-3">
                <button class="filter-btn active px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-full transition-all duration-300">
                    Tous
                </button>
                <button class="filter-btn px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-full transition-all duration-300">
                    En attente
                </button>
                <button class="filter-btn px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-full transition-all duration-300">
                    En transit
                </button>
                <button class="filter-btn px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-full transition-all duration-300">
                    Livrés
                </button>
            </div>
        </div>
    </x-slot>

    <!-- Batch Actions Bar -->
    <div id="batch-actions" class="hidden max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="bg-white rounded-xl shadow-md p-4 flex items-center justify-between border border-blue-100">
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">Actions groupées :</span>
                <select id="batch-action-select"
                    class="text-sm border-gray-200 rounded-lg focus:ring-[#0077be] focus:border-[#0077be] transition-all duration-300">
                    <option value="">Sélectionner une action</option>
                    <option value="status">Changer le statut</option>
                    <option value="delete">Supprimer</option>
                    <option value="export">Exporter</option>
                </select>
                <select id="status-select"
                    class="hidden text-sm border-gray-200 rounded-lg focus:ring-[#0077be] focus:border-[#0077be] transition-all duration-300">
                    <option value="delivered">Livré</option>
                    <option value="in_transit">En transit</option>
                    <option value="pending">En attente</option>
                </select>
            </div>
            <div class="flex items-center space-x-4">
                <button id="apply-action"
                    class="px-4 py-2 bg-[#0077be] text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    Appliquer
                </button>
                <button id="cancel-selection"
                    class="px-4 py-2 text-gray-600 text-sm font-medium hover:text-gray-800 transition-colors duration-300">
                    Annuler
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Total Packages Card -->
            <div class="bg-white rounded-xl shadow-md p-4 border border-blue-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Colis</p>
                        <p class="text-2xl font-bold text-[#0077be]">{{ $packages->total() }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <span class="text-green-500 text-sm flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            +12%
                        </span>
                        <span class="text-gray-400 text-sm ml-2">vs mois dernier</span>
                    </div>
                </div>
            </div>

            <!-- In Transit Card -->
            <div class="bg-white rounded-xl shadow-md p-4 border border-blue-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">En transit</p>
                        <p class="text-2xl font-bold text-yellow-500">
                            {{ $packages->where('status', 'in_transit')->count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-yellow-100 rounded-lg">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-yellow-500 h-2 rounded-full transition-all duration-500"
                             style="width: {{ ($packages->where('status', 'in_transit')->count() / max(1, $packages->total())) * 100 }}%">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delivered Today Card -->
            <div class="bg-white rounded-xl shadow-md p-4 border border-blue-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Livrés aujourd'hui</p>
                        <p class="text-2xl font-bold text-green-500">
                            {{ $packages->where('status', 'delivered')
                                       ->where('updated_at', '>=', \Carbon\Carbon::today())
                                       ->count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <span class="text-green-500 text-sm flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            95%
                        </span>
                        <span class="text-gray-400 text-sm ml-2">taux de livraison</span>
                    </div>
                </div>
            </div>

            <!-- Revenue Card -->
            <div class="bg-white rounded-xl shadow-md p-4 border border-blue-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Revenus</p>
                        <p class="text-2xl font-bold text-purple-600">
                            {{ number_format($packages->sum('price'), 2) }} €
                        </p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <span class="text-green-500 text-sm flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            +8%
                        </span>
                        <span class="text-gray-400 text-sm ml-2">vs hier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-6">
        <div class="bg-white rounded-2xl shadow-lg border border-blue-100">
            <div class="p-1 md:p-2">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-blue-200">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-50 to-blue-100">
                                <th class="px-4 py-4">
                                    <input type="checkbox" id="select-all"
                                        class="rounded border-gray-300 text-[#0077be] focus:ring-[#0077be] transition-all cursor-pointer">
                                </th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be]">N° Suivi</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be]">Client</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be]">Statut</th>
                                <th class="hidden md:table-cell px-6 py-4 text-left text-sm font-semibold text-[#0077be]">Destination</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be]">Prix</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be]">Date de création</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be]">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-blue-100">
                            @foreach($packages as $package)
                            <tr class="group hover:bg-blue-50 transition-colors duration-200" id="package-row-{{ $package->id }}">
                                <td class="px-4 py-4">
                                    <input type="checkbox" name="selected_packages[]" value="{{ $package->id }}"
                                        class="package-checkbox rounded border-gray-300 text-[#0077be] focus:ring-[#0077be] transition-all cursor-pointer">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <span class="font-medium text-[#0077be]">{{ $package->tracking_number }}</span>
                                        <button class="ml-2 text-gray-400 hover:text-[#0077be] transition-colors"
                                            onclick="copyToClipboard('{{ $package->tracking_number }}')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-[#0077be] font-semibold text-sm mr-3">
                                            {{ strtoupper(substr($package->user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $package->user->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $package->user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($package->status === 'delivered')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <span class="w-2 h-2 mr-2 rounded-full bg-green-400"></span>
                                            Livré
                                        </span>
                                    @elseif($package->status === 'in_transit')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <span class="w-2 h-2 mr-2 rounded-full bg-yellow-400 animate-pulse"></span>
                                            En transit
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            <span class="w-2 h-2 mr-2 rounded-full bg-gray-400"></span>
                                            En attente
                                        </span>
                                    @endif
                                </td>
                                <td class="hidden md:table-cell px-6 py-4">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ Str::limit($package->destination_address, 30) }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-medium text-gray-900">{{ number_format($package->price, 2) }} €</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-500">{{ $package->created_at->format('d/m/Y H:i') }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('admin.packages.show', $package) }}"
                                           class="group p-2 text-[#0077be] hover:bg-blue-50 rounded-lg transition-all duration-200 tooltip"
                                           data-tooltip="Voir les détails">
                                            <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.packages.edit', $package) }}"
                                           class="group p-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition-all duration-200 tooltip"
                                           data-tooltip="Modifier">
                                            <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form method="POST" class="inline-block delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                    onclick="confirmDelete(event, '{{ $package->id }}')"
                                                    class="group p-2 text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200 tooltip"
                                                    data-tooltip="Supprimer">
                                                <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform"
                                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                        <button type="button"
                                                class="group p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition-all duration-200 tooltip"
                                                data-tooltip="Imprimer l'étiquette"
                                                onclick="printLabel('{{ $package->id }}')">
                                            <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-blue-100">
                    {{ $packages->links() }}
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Éléments DOM
            const selectAll = document.getElementById('select-all');
            const packageCheckboxes = document.querySelectorAll('.package-checkbox');
            const batchActions = document.getElementById('batch-actions');
            const selectedCount = document.getElementById('selected-count');
            const totalCount = document.getElementById('total-count');
            const batchActionSelect = document.getElementById('batch-action-select');
            const statusSelect = document.getElementById('status-select');
            const applyButton = document.getElementById('apply-action');
            const cancelButton = document.getElementById('cancel-selection');
            const searchInput = document.getElementById('table-search');
            const filterButtons = document.querySelectorAll('.filter-btn');

            // Fonction pour copier dans le presse-papier
            window.copyToClipboard = async function(text) {
                try {
                    await navigator.clipboard.writeText(text);
                    showNotification('Copié dans le presse-papier !', 'success');
                } catch (err) {
                    showNotification('Erreur lors de la copie', 'error');
                }
            };

            // Système de notification
            function showNotification(message, type = 'info') {
                const toast = document.createElement('div');
                toast.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300 translate-y-full z-50`;

                switch(type) {
                    case 'success':
                        toast.classList.add('bg-green-500');
                        break;
                    case 'error':
                        toast.classList.add('bg-red-500');
                        break;
                    default:
                        toast.classList.add('bg-blue-500');
                }

                toast.textContent = message;
                document.body.appendChild(toast);

                requestAnimationFrame(() => {
                    toast.classList.remove('translate-y-full');
                });

                setTimeout(() => {
                    toast.classList.add('translate-y-full');
                    setTimeout(() => {
                        document.body.removeChild(toast);
                    }, 300);
                }, 3000);
            }

            // Gestion des filtres rapides
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');

                    const filterValue = button.textContent.trim().toLowerCase();
                    const rows = document.querySelectorAll('tbody tr');
                    const total = document.getElementById('total-count');
                    let visibleCount = 0;

                    rows.forEach(row => {
                        const statusCell = row.querySelector('td:nth-child(4)');
                        const statusText = statusCell.textContent.trim().toLowerCase();

                        row.style.transition = 'opacity 300ms ease-in-out';

                        if (filterValue === 'tous' || statusText.includes(filterValue)) {
                            row.style.opacity = '0';
                            setTimeout(() => {
                                row.style.display = '';
                                requestAnimationFrame(() => {
                                    row.style.opacity = '1';
                                });
                            }, 150);
                            visibleCount++;
                        } else {
                            row.style.opacity = '0';
                            setTimeout(() => {
                                row.style.display = 'none';
                            }, 300);
                        }
                    });

                    total.textContent = `${visibleCount} colis au total`;
                });
            });

            // Confirmation de suppression
            window.confirmDelete = function(event, packageId) {
                event.preventDefault();

                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Cette action est irréversible !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#EF4444',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Oui, supprimer',
                    cancelButtonText: 'Annuler',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = event.target.closest('form');
                        if (form) {
                            // Animer la suppression
                            const row = document.getElementById(`package-row-${packageId}`);
                            if (row) {
                                row.style.transition = 'all 0.5s ease';
                                row.style.opacity = '0';
                                row.style.transform = 'translateX(20px)';
                            }

                            // Envoyer la requête de suppression
                            fetch(form.action, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Accept': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    showNotification('Colis supprimé avec succès !', 'success');
                                    setTimeout(() => {
                                        window.location.reload();
                                    }, 1000);
                                } else {
                                    throw new Error(data.message || 'Erreur lors de la suppression');
                                }
                            })
                            .catch(error => {
                                row.style.opacity = '1';
                                row.style.transform = 'none';
                                showNotification(error.message, 'error');
                            });
                        }
                    }
                });
            };

            // Impression d'étiquette
            window.printLabel = function(packageId) {
                showNotification('Préparation de l\'étiquette...', 'info');
                fetch(`/admin/packages/${packageId}/label`)
                    .then(response => response.blob())
                    .then(blob => {
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.style.display = 'none';
                        a.href = url;
                        a.download = `label-${packageId}.pdf`;
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                        showNotification('Étiquette générée avec succès !', 'success');
                    })
                    .catch(() => showNotification('Erreur lors de la génération de l\'étiquette', 'error'));
            };

            // Gestion du sélecteur global
            selectAll.addEventListener('change', function() {
                packageCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                    const row = checkbox.closest('tr');
                    if (row) {
                        row.classList.toggle('bg-blue-50/50', this.checked);
                    }
                });
                updateBatchActionsVisibility();
            });

            // Gestion des checkboxes individuelles
            packageCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const row = checkbox.closest('tr');
                    if (row) {
                        row.classList.toggle('bg-blue-50/50', checkbox.checked);
                    }
                    updateBatchActionsVisibility();
                    updateSelectAllState();
                });
            });

            function updateSelectAllState() {
                const checkedBoxes = document.querySelectorAll('.package-checkbox:checked');
                const totalBoxes = packageCheckboxes.length;

                selectAll.checked = checkedBoxes.length === totalBoxes;
                selectAll.indeterminate = checkedBoxes.length > 0 && checkedBoxes.length < totalBoxes;
            }

            function updateBatchActionsVisibility() {
                const checkedCount = document.querySelectorAll('.package-checkbox:checked').length;
                const hasSelection = checkedCount > 0;

                batchActions.classList.toggle('hidden', !hasSelection);
                selectedCount.classList.toggle('hidden', !hasSelection);
                totalCount.classList.toggle('hidden', hasSelection);
                selectedCount.textContent = `${checkedCount} sélectionné(s)`;

                if (!hasSelection) {
                    batchActionSelect.value = '';
                    statusSelect.classList.add('hidden');
                }

                // Animation
                batchActions.style.transition = 'all 0.3s ease';
                if (hasSelection) {
                    batchActions.style.opacity = '1';
                    batchActions.style.transform = 'translateY(0)';
                } else {
                    batchActions.style.opacity = '0';
                    batchActions.style.transform = 'translateY(-10px)';
                }
            }

            // Gestion des actions groupées
            batchActionSelect.addEventListener('change', function() {
                const showStatus = this.value === 'status';
                statusSelect.classList.toggle('hidden', !showStatus);

                if (showStatus) {
                    statusSelect.focus();
                }
            });

            // Application des actions groupées
            applyButton.addEventListener('click', async function() {
                const selectedIds = [...document.querySelectorAll('.package-checkbox:checked')].map(cb => cb.value);
                const action = batchActionSelect.value;

                if (!action || selectedIds.length === 0) {
                    showNotification('Veuillez sélectionner une action et au moins un colis', 'error');
                    return;
                }

                if (action === 'status' && !statusSelect.value) {
                    showNotification('Veuillez sélectionner un statut', 'error');
                    return;
                }

                let confirmMessage = '';
                switch (action) {
                    case 'status':
                        confirmMessage = `Modifier le statut de ${selectedIds.length} colis en "${statusSelect.options[statusSelect.selectedIndex].text}" ?`;
                        break;
                    case 'delete':
                        confirmMessage = `Supprimer ${selectedIds.length} colis ?`;
                        break;
                    case 'export':
                        confirmMessage = `Exporter ${selectedIds.length} colis ?`;
                        break;
                }

                try {
                    const result = await Swal.fire({
                        title: 'Confirmation',
                        text: confirmMessage,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Confirmer',
                        cancelButtonText: 'Annuler',
                        showLoaderOnConfirm: true,
                        preConfirm: async () => {
                            try {
                                const response = await fetch('/admin/packages/batch-action', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                        'Accept': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        ids: selectedIds,
                                        action: action,
                                        ...(action === 'status' && { status: statusSelect.value })
                                    })
                                });

                                const data = await response.json();

                                if (!data.success) {
                                    throw new Error(data.message || 'Une erreur est survenue');
                                }

                                return data;
                            } catch (error) {
                                Swal.showValidationMessage(error.message);
                            }
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    });

                    if (result.isConfirmed) {
                        await Swal.fire({
                            title: 'Succès !',
                            text: result.value.message,
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });

                        if (action === 'export' && result.value.downloadUrl) {
                            window.location.href = result.value.downloadUrl;
                        } else {
                            window.location.reload();
                        }
                    }
                } catch (error) {
                    Swal.fire({
                        title: 'Erreur !',
                        text: error.message || 'Une erreur est survenue',
                        icon: 'error'
                    });
                }
            });

            // Recherche en temps réel
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                const searchTerm = this.value.toLowerCase().trim();

                searchTimeout = setTimeout(() => {
                    const rows = document.querySelectorAll('tbody tr');
                    let visibleCount = 0;

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        const match = text.includes(searchTerm);

                        row.style.transition = 'all 0.3s ease';

                        if (match) {
                            row.style.opacity = '1';
                            row.style.display = '';
                            visibleCount++;
                        } else {
                            row.style.opacity = '0';
                            setTimeout(() => {
                                row.style.display = 'none';
                            }, 300);
                        }
                    });

                    document.getElementById('total-count').textContent = `${visibleCount} colis au total`;
                }, 300);
            });

            // Annulation de la sélection
            cancelButton.addEventListener('click', function() {
                selectAll.checked = false;
                selectAll.indeterminate = false;
                packageCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                    const row = checkbox.closest('tr');
                    if (row) {
                        row.classList.remove('bg-blue-50/50');
                    }
                });
                updateBatchActionsVisibility();
            });
        });
    </script>
    @endpush

    <style>
        /* Grid background */
        .bg-grid-white {
            background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='1' height='1' fill='white'/%3E%3C/svg%3E");
        }

        /* Animations */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Tooltips */
        .tooltip {
            position: relative;
        }

        .tooltip:before {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%) scale(0.8);
            padding: 4px 8px;
            background-color: #1f2937;
            color: white;
            font-size: 12px;
            border-radius: 4px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.2s ease;
            z-index: 10;
        }

        .tooltip:hover:before {
            transform: translateX(-50%) scale(1);
            opacity: 1;
            visibility: visible;
        }

        /* Hover effects */
        .hover-trigger .hover-target {
            transition: all 0.2s ease;
        }

        .hover-trigger:hover .hover-target {
            transform: translateY(-2px);
        }

        /* Custom scrollbar */
        .overflow-x-auto {
            scrollbar-width: thin;
            scrollbar-color: #CBD5E0 #EDF2F7;
        }

        .overflow-x-auto::-webkit-scrollbar {
            height: 6px;
        }

        .overflow-x-auto::-webkit-scrollbar-track {
            background: #EDF2F7;
            border-radius: 3px;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb {
            background-color: #CBD5E0;
            border-radius: 3px;
        }

        /* Active filter button */
        .filter-btn.active {
            background-color: rgba(255, 255, 255, 0.2);
            font-weight: 600;
        }

        /* Table row hover animation */
        tr {
            transition: all 0.2s ease;
        }

        /* Checkbox styles */
        input[type="checkbox"] {
            position: relative;
            cursor: pointer;
        }

        input[type="checkbox"]:checked {
            animation: bounce 0.3s ease;
        }

        /* Status badge animations */
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Batch actions transition */
        #batch-actions {
            transition: all 0.3s ease;
        }

        /* Toast notifications */
        @keyframes slideIn {
            from { transform: translateY(100%); }
            to { transform: translateY(0); }
        }

        @keyframes slideOut {
            from { transform: translateY(0); }
            to { transform: translateY(100%); }
        }

        /* Delete animation */
        .delete-fade-out {
            animation: fadeOut 0.3s ease-in-out forwards;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: scale(1);
            }
            to {
                opacity: 0;
                transform: scale(0.95);
            }
        }

        /* Card hover effects */
        .bg-white {
            transition: all 0.3s ease;
        }

        .bg-white:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Button hover animations */
        .transform {
            transition: all 0.2s ease;
        }

        .hover\:scale-105:hover {
            transform: scale(1.05);
        }

        /* Custom focus styles */
        .focus\:ring-2:focus {
            box-shadow: 0 0 0 2px rgba(0, 119, 190, 0.2);
        }

        /* Loading animation */
        @keyframes loading {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .loading::after {
            content: '';
            width: 16px;
            height: 16px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #0077be;
            border-radius: 50%;
            animation: loading 1s linear infinite;
            position: absolute;
            right: -24px;
            top: 50%;
            transform: translateY(-50%);
        }

        /* Responsive table adjustments */
        @media (max-width: 640px) {
            .overflow-x-auto {
                margin: 0 -1rem;
            }

            .tooltip:before {
                display: none;
            }
        }

        /* Print styles */
        @media print {
            .no-print {
                display: none !important;
            }

            .print-break-inside {
                break-inside: avoid;
            }
        }
    </style>
</x-app-layout>
