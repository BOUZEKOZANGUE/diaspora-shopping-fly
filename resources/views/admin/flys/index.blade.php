<x-app-layout>
    <x-slot name="header">
        <div class="relative bg-white py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col space-y-6 sm:flex-row sm:justify-between sm:items-center sm:space-y-0">
                    {{-- Section titre avec animation slide --}}
                    <div class="transform transition-all duration-500 ease-out translate-y-0 opacity-100 group">
                        <h2
                            class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-[#0077be] to-[#005c91] bg-clip-text text-transparent">
                            Gestion des Voyages
                        </h2>
                        <p
                            class="text-sm sm:text-base text-[#0077be]/70 mt-1 group-hover:text-[#0077be]/90 transition-colors">
                            Programmez et gérez les prochains voyages pour vos colis
                        </p>
                    </div>

                    {{-- Boutons d'action avec animations hover --}}
                    <div class="flex flex-wrap gap-3">
                        <!-- Correction ici : Utiliser Alpine.js pour ouvrir le modal -->
                        <button type="button"
                            @click="$dispatch('open-modal', 'create-fly-modal')"
                            class="group flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-[#0077be] to-[#005c91] text-white font-medium rounded-xl
           transition-all duration-300 ease-out hover:shadow-lg hover:shadow-[#0077be]/20 transform hover:-translate-y-0.5">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 transition-transform duration-300 ease-out group-hover:rotate-12"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Nouveau Voyage</span>
                            </div>
                        </button>

                        <a href="{{ route('admin.dashboard') }}"
                            class="group flex items-center justify-center px-5 py-2.5 bg-white border border-[#0077be] text-[#0077be] font-medium rounded-xl
                                   transition-all duration-300 ease-out hover:shadow-lg hover:bg-[#0077be]/5 transform hover:-translate-y-0.5">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                </svg>
                                <span>Tableau de bord</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Voyages -->
                <div
                    class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-[#0077be]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-[#0077be]/70">Total Voyages</p>
                            <p class="mt-2 text-3xl font-bold text-[#0077be]">{{ $stats['total_flys'] }}</p>
                        </div>
                        <div class="bg-[#0077be]/10 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-[#0077be]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Voyages à venir -->
                <div
                    class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-[#ffd700]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-[#0077be]/70">Voyages à venir</p>
                            <p class="mt-2 text-3xl font-bold text-[#0077be]">{{ $stats['upcoming_flys'] }}</p>
                        </div>
                        <div class="bg-[#ffd700]/10 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-[#ffd700]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Colis en attente -->
                <div
                    class="bg-white rounded-xl p-6 transform hover:-translate-y-1 transition-all duration-300 shadow-md hover:shadow-xl border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-[#0077be]/70">Colis à assigner</p>
                            <p class="mt-2 text-3xl font-bold text-[#0077be]">{{ $stats['pending_packages'] }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs Navigation -->
            <div x-data="{ activeTab: 'upcoming' }" class="mb-6">
                <div class="border-b border-gray-200">
                    <nav class="flex space-x-8">
                        <button @click="activeTab = 'upcoming'"
                            :class="{ 'text-[#0077be] border-[#0077be]': activeTab === 'upcoming', 'text-gray-500 hover:text-[#0077be] border-transparent hover:border-[#0077be]/30': activeTab !== 'upcoming' }"
                            class="py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200 ease-out flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Voyages à venir ({{ $upcomingFlys->total() }})
                        </button>
                        <button @click="activeTab = 'past'"
                            :class="{ 'text-[#0077be] border-[#0077be]': activeTab === 'past', 'text-gray-500 hover:text-[#0077be] border-transparent hover:border-[#0077be]/30': activeTab !== 'past' }"
                            class="py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200 ease-out flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Voyages passés ({{ $pastFlys->total() }})
                        </button>
                        <button @click="activeTab = 'suspended'"
                            :class="{ 'text-[#0077be] border-[#0077be]': activeTab === 'suspended', 'text-gray-500 hover:text-[#0077be] border-transparent hover:border-[#0077be]/30': activeTab !== 'suspended' }"
                            class="py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200 ease-out flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                            Voyages suspendus ({{ $suspendedFlys->total() }})
                        </button>
                    </nav>
                </div>

                <!-- Tab Content -->
                <div class="mt-6">
                    <!-- Upcoming Flights Tab -->
                    <div x-show="activeTab === 'upcoming'" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-[#0077be]/10">
                            <div class="p-6">
                                <div class="mb-4 flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-[#0077be]">Voyages programmés</h3>
                                    <div class="flex space-x-2">
                                        <form action="{{ route('admin.flys.index') }}" method="GET"
                                            class="flex space-x-2">
                                            <div class="relative">
                                                <input type="text" name="search" placeholder="Rechercher..."
                                                    value="{{ request('search') }}"
                                                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-[#0077be] focus:border-[#0077be] transition-colors duration-200">
                                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                            </div>
                                            <button type="submit"
                                                class="bg-[#0077be]/10 hover:bg-[#0077be]/20 p-2 rounded-lg transition-colors duration-200">
                                                <svg class="w-5 h-5 text-[#0077be]" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Trajet</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date de départ</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Capacité</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Transporteur</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Statut</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($upcomingFlys as $fly)
                                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $fly->id }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $fly->departure }} → {{ $fly->destination }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $fly->departure_date->format('d M Y H:i') }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $fly->current_capacity }}/{{ $fly->max_capacity }}
                                                        <div class="w-20 bg-gray-200 rounded-full h-2 mt-1">
                                                            <div class="bg-[#0077be] h-2 rounded-full"
                                                                style="width: {{ $fly->capacity_percentage }}%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $fly->carrier }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @if ($fly->status == 'pending')
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">En
                                                                préparation</span>
                                                        @elseif($fly->status == 'confirmed')
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmé</span>
                                                        @elseif($fly->status == 'in_progress')
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">En
                                                                cours</span>
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <div class="flex justify-end space-x-2">
                                                            <button
                                                                @click="$dispatch('open-modal', 'edit-fly-modal-{{ $fly->id }}')"
                                                                class="text-[#0077be] hover:text-[#005c91] transition-colors duration-200"
                                                                title="Modifier">
                                                                <svg class="w-5 h-5" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                            </button>
                                                            <button
                                                                @click="$dispatch('open-modal', 'assign-packages-modal-{{ $fly->id }}')"
                                                                class="text-amber-500 hover:text-amber-600 transition-colors duration-200"
                                                                title="Assigner des colis">
                                                                <svg class="w-5 h-5" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                                </svg>
                                                            </button>
                                                            @if ($fly->status != 'in_progress')
                                                                <button
                                                                    @click="$dispatch('open-modal', 'suspend-fly-modal-{{ $fly->id }}')"
                                                                    class="text-red-500 hover:text-red-600 transition-colors duration-200"
                                                                    title="Suspendre">
                                                                    <svg class="w-5 h-5" fill="none"
                                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </button>
                                                            @endif
                                                            @if ($fly->status == 'in_progress')
                                                                <form
                                                                    action="{{ route('admin.flys.complete', $fly->id) }}"
                                                                    method="POST" class="inline">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="text-green-500 hover:text-green-600 transition-colors duration-200"
                                                                        title="Marquer comme terminé">
                                                                        <svg class="w-5 h-5" fill="none"
                                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="2" d="M5 13l4 4L19 7" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="px-6 py-10 text-center text-gray-500">
                                                        <p>Aucun voyage à venir trouvé</p>
                                                        <button @click="$dispatch('open-modal', 'create-fly-modal')"
                                                            class="mt-2 inline-flex items-center px-3 py-1.5 border border-transparent text-xs rounded-md shadow-sm text-white bg-[#0077be] hover:bg-[#005c91] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0077be]">
                                                            <svg class="w-4 h-4 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M12 4v16m8-8H4" />
                                                            </svg>
                                                            Programmer un voyage
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4 flex justify-between items-center">
                                    <p class="text-sm text-gray-500">
                                        Affichage de {{ $upcomingFlys->firstItem() ?? 0 }} à
                                        {{ $upcomingFlys->lastItem() ?? 0 }} sur {{ $upcomingFlys->total() }} voyages
                                    </p>
                                    <div>
                                        {{ $upcomingFlys->appends(['past_page' => request('past_page'), 'suspended_page' => request('suspended_page'), 'search' => request('search')])->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Past Flights Tab -->
                    <div x-show="activeTab === 'past'" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-[#0077be]/10">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-[#0077be] mb-4">Historique des voyages</h3>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Trajet</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date de départ</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Capacité</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Transporteur</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($pastFlys as $fly)
                                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $fly->id }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $fly->departure }} → {{ $fly->destination }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $fly->departure_date->format('d M Y H:i') }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $fly->current_capacity }}/{{ $fly->max_capacity }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $fly->carrier }}</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{ route('admin.flys.show', $fly->id) }}"
                                                            class="text-[#0077be] hover:text-[#005c91] transition-colors duration-200">
                                                            Détails
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                                        Aucun voyage passé trouvé
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    {{ $pastFlys->appends(['upcoming_page' => request('upcoming_page'), 'suspended_page' => request('suspended_page'), 'search' => request('search')])->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Suspended Flights Tab -->
                    <div x-show="activeTab === 'suspended'" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-[#0077be]/10">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-[#0077be] mb-4">Voyages suspendus</h3>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Trajet</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date de départ prévue</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Motif de suspension</th>
                                                <th
                                                    class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($suspendedFlys as $fly)
                                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $fly->id }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $fly->departure }} → {{ $fly->destination }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $fly->departure_date->format('d M Y H:i') }}</td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                                        {{ $fly->suspension_reason }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <form action="{{ route('admin.flys.reactivate', $fly->id) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="text-green-500 hover:text-green-600 transition-colors duration-200"
                                                                title="Réactiver">
                                                                <svg class="w-5 h-5" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                                        Aucun voyage suspendu trouvé
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    {{ $suspendedFlys->appends(['upcoming_page' => request('upcoming_page'), 'past_page' => request('past_page'), 'search' => request('search')])->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Fly Modal -->
    <div x-data="{
        show: false,
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)]
                .filter(el => !el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1 },
    }" x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            setTimeout(() => { $refs.closeButton ? $refs.closeButton.focus() : null }, 50);
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })" x-on:keydown.escape.window="show = false"
        x-on:keydown.tab.prevent="$event.shiftKey ? prevFocusable().focus() : nextFocusable().focus()"
        x-on:open-modal.window="$event.detail === 'create-fly-modal' ? show = true : null" x-show="show"
        id="create-fly-modal" class="fixed inset-0 z-50 px-4 py-6 sm:px-0 overflow-y-auto">
        <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div x-show="show"
            class="mb-6 bg-white rounded-xl overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl sm:mx-auto"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            @click.outside="show = false">
            <div class="px-6 py-4 bg-gradient-to-r from-[#0077be] to-[#005c91] sm:px-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-white">
                        Programmer un nouveau voyage
                    </h3>
                    <div class="ml-3 flex h-7">
                        <button @click="show = false" x-ref="closeButton"
                            class="bg-[#0077be] rounded-md text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                            <span class="sr-only">Fermer</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.flys.store') }}" method="POST">
                @csrf
                <div class="px-6 py-4 bg-white sm:p-6">
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <!-- Departure and Destination fields in one row -->
                        <div class="sm:col-span-3">
                            <label for="departure" class="block text-sm font-medium text-gray-700">Lieu de
                                départ</label>
                            <div class="mt-1">
                                <input type="text" name="departure" id="departure"
                                    class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Paris, France" required>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="destination"
                                class="block text-sm font-medium text-gray-700">Destination</label>
                            <div class="mt-1">
                                <input type="text" name="destination" id="destination"
                                    class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Madrid, Espagne" required>
                            </div>
                        </div>

                        <!-- Departure Date and Arrival Date fields in one row -->
                        <div class="sm:col-span-3">
                            <label for="departure_date" class="block text-sm font-medium text-gray-700">Date de
                                départ</label>
                            <div class="mt-1">
                                <input type="datetime-local" name="departure_date" id="departure_date"
                                    class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="arrival_date" class="block text-sm font-medium text-gray-700">Date d'arrivée
                                (estimée)</label>
                            <div class="mt-1">
                                <input type="datetime-local" name="arrival_date" id="arrival_date"
                                    class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                        </div>

                        <!-- Carrier and Max Capacity fields in one row -->
                        <div class="sm:col-span-3">
                            <label for="carrier" class="block text-sm font-medium text-gray-700">Transporteur</label>
                            <div class="mt-1">
                                <input type="text" name="carrier" id="carrier"
                                    class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Air Transport S.A." required>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="max_capacity" class="block text-sm font-medium text-gray-700">Capacité
                                maximale</label>
                            <div class="mt-1">
                                <input type="number" name="max_capacity" id="max_capacity" min="1"
                                    class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="50" required>
                            </div>
                        </div>

                        <!-- Notes field spanning full width -->
                        <div class="sm:col-span-6">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Notes
                                additionnelles</label>
                            <div class="mt-1">
                                <textarea id="notes" name="notes" rows="3"
                                    class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Informations complémentaires, contraintes spéciales..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-3 bg-gray-50 flex items-center justify-end">
                    <button type="button" @click="show = false"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0077be]">
                        Annuler
                    </button>
                    <button type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#0077be] hover:bg-[#005c91] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0077be]">
                        Programmer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Fly Modals - For each upcoming flight -->
    @foreach ($upcomingFlys as $fly)
        <div x-data="{ show: false }" x-init="$watch('show', value => {
            if (value) document.body.classList.add('overflow-y-hidden');
            else document.body.classList.remove('overflow-y-hidden');
        })"
            x-on:open-modal.window="$event.detail === 'edit-fly-modal-{{ $fly->id }}' ? show = true : null"
            x-show="show" id="edit-fly-modal-{{ $fly->id }}"
            class="fixed inset-0 z-50 px-4 py-6 sm:px-0 overflow-y-auto" style="display: none;">
            <!-- Modal backdrop -->
            <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal content -->
            <div x-show="show"
                class="mb-6 bg-white rounded-xl overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl sm:mx-auto"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                @click.outside="show = false">
                <div class="px-6 py-4 bg-gradient-to-r from-[#0077be] to-[#005c91] sm:px-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-white">
                            Modifier le voyage #{{ $fly->id }}
                        </h3>
                        <div class="ml-3 flex h-7">
                            <button @click="show = false"
                                class="bg-[#0077be] rounded-md text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                <span class="sr-only">Fermer</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.flys.update', $fly->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="px-6 py-4 bg-white sm:p-6">
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <!-- Departure and Destination fields -->
                            <div class="sm:col-span-3">
                                <label for="edit_departure_{{ $fly->id }}"
                                    class="block text-sm font-medium text-gray-700">Lieu de départ</label>
                                <div class="mt-1">
                                    <input type="text" name="departure" id="edit_departure_{{ $fly->id }}"
                                        class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                        value="{{ $fly->departure }}" required>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="edit_destination_{{ $fly->id }}"
                                    class="block text-sm font-medium text-gray-700">Destination</label>
                                <div class="mt-1">
                                    <input type="text" name="destination"
                                        id="edit_destination_{{ $fly->id }}"
                                        class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                        value="{{ $fly->destination }}" required>
                                </div>
                            </div>

                            <!-- Dates -->
                            <div class="sm:col-span-3">
                                <label for="edit_departure_date_{{ $fly->id }}"
                                    class="block text-sm font-medium text-gray-700">Date de départ</label>
                                <div class="mt-1">
                                    <input type="datetime-local" name="departure_date"
                                        id="edit_departure_date_{{ $fly->id }}"
                                        class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                        value="{{ $fly->departure_date->format('Y-m-d\TH:i') }}" required>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="edit_arrival_date_{{ $fly->id }}"
                                    class="block text-sm font-medium text-gray-700">Date d'arrivée (estimée)</label>
                                <div class="mt-1">
                                    <input type="datetime-local" name="arrival_date"
                                        id="edit_arrival_date_{{ $fly->id }}"
                                        class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                        value="{{ $fly->arrival_date->format('Y-m-d\TH:i') }}" required>
                                </div>
                            </div>

                            <!-- Carrier and capacity -->
                            <div class="sm:col-span-3">
                                <label for="edit_carrier_{{ $fly->id }}"
                                    class="block text-sm font-medium text-gray-700">Transporteur</label>
                                <div class="mt-1">
                                    <input type="text" name="carrier" id="edit_carrier_{{ $fly->id }}"
                                        class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                        value="{{ $fly->carrier }}" required>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="edit_max_capacity_{{ $fly->id }}"
                                    class="block text-sm font-medium text-gray-700">Capacité maximale</label>
                                <div class="mt-1">
                                    <input type="number" name="max_capacity"
                                        id="edit_max_capacity_{{ $fly->id }}"
                                        min="{{ $fly->current_capacity }}"
                                        class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md"
                                        value="{{ $fly->max_capacity }}" required>
                                    @if ($fly->current_capacity > 0)
                                        <p class="mt-1 text-xs text-gray-500">Minimum: {{ $fly->current_capacity }}
                                            (nombre de colis actuellement assignés)</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="sm:col-span-6">
                                <label for="edit_notes_{{ $fly->id }}"
                                    class="block text-sm font-medium text-gray-700">Notes additionnelles</label>
                                <div class="mt-1">
                                    <textarea id="edit_notes_{{ $fly->id }}" name="notes" rows="3"
                                        class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md">{{ $fly->notes }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 py-3 bg-gray-50 flex items-center justify-end">
                        <button type="button" @click="show = false"
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0077be]">
                            Annuler
                        </button>
                        <button type="submit"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#0077be] hover:bg-[#005c91] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0077be]">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
<!-- Assign Packages Modal for each upcoming flight -->
<div x-data="{ show: false }" x-init="$watch('show', value => {
    if (value) document.body.classList.add('overflow-y-hidden');
    else document.body.classList.remove('overflow-y-hidden');
})"
    x-on:open-modal.window="$event.detail === 'assign-packages-modal-{{ $fly->id }}' ? show = true : null"
    x-show="show" id="assign-packages-modal-{{ $fly->id }}"
    class="fixed inset-0 z-50 px-4 py-6 sm:px-0 overflow-y-auto" style="display: none;">
    <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div x-show="show"
        class="mb-6 bg-white rounded-xl overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-3xl sm:mx-auto"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        @click.outside="show = false">
        <div class="px-6 py-4 bg-gradient-to-r from-[#ffd700] to-[#ffc700] sm:px-6">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-[#0077be]">
                    Assigner des colis au voyage #{{ $fly->id }} ({{ $fly->departure }} →
                    {{ $fly->destination }})
                </h3>
                <div class="ml-3 flex h-7">
                    <button @click="show = false"
                        class="rounded-md text-[#0077be] hover:text-[#0077be] focus:outline-none focus:ring-2 focus:ring-[#0077be]">
                        <span class="sr-only">Fermer</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.flys.assign-packages', $fly->id) }}" method="POST">
            @csrf
            <div class="px-6 py-4 bg-white sm:p-6">
                <div class="mb-4 flex justify-between">
                    <p class="text-sm text-gray-500">
                        Capacité restante: <span
                            class="font-medium text-[#0077be]">{{ $fly->remaining_capacity }} colis</span>
                        <span class="ml-2">({{ $fly->current_capacity }}/{{ $fly->max_capacity }}
                            utilisée)</span>
                    </p>
                    @if ($fly->is_full)
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            Capacité maximale atteinte
                        </span>
                    @endif
                </div>

                @if (!$fly->is_full)
                    <div class="space-y-4">
                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg">
                                    <div class="flex-1">
                                        <h4 class="text-sm font-medium text-gray-900">Recherche de colis</h4>
                                        <p class="text-xs text-gray-500">Sélectionnez des colis à assigner à ce voyage
                                        </p>
                                    </div>
                                    <div class="w-64">
                                        <input type="text" id="package-search"
                                            placeholder="Rechercher par ID ou destination..."
                                            class="shadow-sm focus:ring-[#0077be] focus:border-[#0077be] block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div class="max-h-80 overflow-y-auto border border-gray-200 rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50 sticky top-0">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    <input type="checkbox" id="select-all-packages"
                                                        class="focus:ring-[#0077be] h-4 w-4 text-[#0077be] border-gray-300 rounded">
                                                </th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Destination</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Client</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Poids</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 package-list">
                                            <!-- Cette section sera remplie dynamiquement par AJAX ou avec un foreach des colis disponibles -->
                                            <!-- Exemple de structure: -->
                                            @php
                                                // Dans un vrai projet, cette requête devrait être dans le contrôleur
                                                $pendingPackages = \App\Models\Package::whereNull('fly_id')
                                                    ->where('status', '!=', 'delivered')
                                                    ->take(10)
                                                    ->get();
                                            @endphp

                                            @forelse($pendingPackages as $package)
                                                <tr class="package-item hover:bg-gray-50">
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <input type="checkbox" name="packages[]"
                                                            value="{{ $package->id }}"
                                                            class="package-checkbox focus:ring-[#0077be] h-4 w-4 text-[#0077be] border-gray-300 rounded">
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $package->id }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $package->destination }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $package->user->name ?? 'N/A' }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $package->weight ?? 'N/A' }} kg</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5"
                                                        class="px-6 py-4 text-center text-sm text-gray-500">
                                                        Aucun colis en attente trouvé pour cette destination
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <svg class="mx-auto h-12 w-12 text-yellow-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <h3 class="mt-2 text-lg font-medium text-gray-900">Voyage à pleine capacité</h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Ce voyage a atteint sa capacité maximale de {{ $fly->max_capacity }} colis.
                                    Pour ajouter plus de colis, vous devez d'abord augmenter la capacité maximale.
                                </p>
                                <div class="mt-4">
                                    <button type="button"
                                        @click="$dispatch('open-modal', 'edit-fly-modal-{{ $fly->id }}'); show = false"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-white shadow-sm bg-[#0077be] hover:bg-[#005c91] focus:ring-2 focus:ring-offset-2 focus:ring-[#0077be]">
                                        Modifier la capacité
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="px-6 py-3 bg-gray-50 flex items-center justify-between">
                        <span class="text-sm text-gray-500 selected-count">0 colis sélectionné</span>
                        <div>
                            <button type="button" @click="show = false"
                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0077be]">
                                Annuler
                            </button>
                            <button type="submit"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#0077be] hover:bg-[#005c91] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0077be]"
                                @if ($fly->is_full) disabled @endif>
                                Assigner
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Suspend Fly Modal for each upcoming flight -->
        <div x-data="{ show: false }" x-init="$watch('show', value => {
            if (value) document.body.classList.add('overflow-y-hidden');
            else document.body.classList.remove('overflow-y-hidden');
        })"
            x-on:open-modal.window="$event.detail === 'suspend-fly-modal-{{ $fly->id }}' ? show = true : null"
            x-show="show" id="suspend-fly-modal-{{ $fly->id }}"
            class="fixed inset-0 z-50 px-4 py-6 sm:px-0 overflow-y-auto" style="display: none;">
            <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div x-show="show"
                class="mb-6 bg-white rounded-xl overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg sm:mx-auto"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                @click.outside="show = false">
                <div class="px-6 py-4 bg-red-500 sm:px-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-white">
                            Suspendre le voyage
                        </h3>
                        <div class="ml-3 flex h-7">
                            <button @click="show = false"
                                class="bg-red-500 rounded-md text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                <span class="sr-only">Fermer</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.flys.suspend', $fly->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="px-6 py-4 bg-white sm:p-6">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Êtes-vous sûr de vouloir suspendre ce
                                voyage ?</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Cette action suspendra le voyage #{{ $fly->id }} ({{ $fly->departure }} →
                                {{ $fly->destination }}).
                                @if ($fly->current_capacity > 0)
                                    <strong>{{ $fly->current_capacity }} colis</strong> actuellement assignés à ce
                                    voyage seront remis en attente.
                                @endif
                            </p>
                            <div class="mt-4">
                                <label for="suspend_reason_{{ $fly->id }}"
                                    class="block text-sm font-medium text-gray-700 text-left">Motif de
                                    suspension</label>
                                <div class="mt-1">
                                    <textarea id="suspend_reason_{{ $fly->id }}" name="reason" rows="3"
                                        class="shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                        placeholder="Veuillez indiquer le motif de suspension..." required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 py-3 bg-gray-50 flex items-center justify-end">
                        <button type="button" @click="show = false"
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0077be]">
                            Annuler
                        </button>
                        <button type="submit"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Suspendre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Affichage des messages d'erreur et de succès -->
    @if (session('success') || session('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            class="fixed bottom-0 right-0 m-6 p-4 rounded-lg shadow-lg {{ session('success') ? 'bg-green-50 border-l-4 border-green-500' : 'bg-red-50 border-l-4 border-red-500' }}"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-2">
            <div class="flex">
                <div class="flex-shrink-0">
                    @if (session('success'))
                        <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @else
                        <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @endif
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium {{ session('success') ? 'text-green-800' : 'text-red-800' }}">
                        {{ session('success') ?? session('error') }}
                    </p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button @click="show = false"
                            class="inline-flex {{ session('success') ? 'text-green-500 hover:bg-green-100' : 'text-red-500 hover:bg-red-100' }} rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-offset-2 {{ session('success') ? 'focus:ring-green-500' : 'focus:ring-red-500' }}">
                            <span class="sr-only">Fermer</span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Styles pour les éléments spécifiques de la page -->
    <style>
        .pagination-link {
            @apply px-3 py-1 rounded-md text-sm font-medium text-[#0077be] hover:bg-[#0077be]/10 transition-colors duration-300;
        }

        .pagination-active {
            @apply bg-[#0077be] text-white hover:bg-[#005c91] hover:text-white;
        }

        /* Animations pour les cartes */
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

        /* Personnalisation de la scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #0077be40;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0077be80;
        }
    </style>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Test event emission for debugging
                console.log("DOM loaded, testing modal functionality");

                // Pour chaque modal de sélection de colis
                const selectAllCheckboxes = document.querySelectorAll('#select-all-packages');
                selectAllCheckboxes.forEach(checkbox => {
                    if (checkbox) {
                        checkbox.addEventListener('change', function() {
                            const isChecked = this.checked;
                            const packageCheckboxes = this.closest('table').querySelectorAll(
                                'tbody input[type="checkbox"]');
                            packageCheckboxes.forEach(checkbox => {
                                checkbox.checked = isChecked;
                            });
                            updateSelectedCount(this.closest('form'));
                        });
                    }
                });

                // Mettre à jour le compteur de sélection pour chaque formulaire d'assignation
                const packageCheckboxesContainers = document.querySelectorAll('form[action*="assign-packages"]');
                packageCheckboxesContainers.forEach(form => {
                    const packageCheckboxes = form.querySelectorAll('tbody input[type="checkbox"]');
                    packageCheckboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            updateSelectedCount(form);
                        });
                    });
                });

                // Fonction pour mettre à jour le compteur de sélection
                function updateSelectedCount(form) {
                    const selectedCount = form.querySelectorAll('tbody input[type="checkbox"]:checked').length;
                    const countDisplay = form.querySelector('.selected-count');
                    if (countDisplay) {
                        countDisplay.textContent =
                            `${selectedCount} colis ${selectedCount > 1 ? 'sélectionnés' : 'sélectionné'}`;
                    }
                }

                // Filtre de recherche pour les colis
                const packageSearchInputs = document.querySelectorAll('#package-search');
                packageSearchInputs.forEach(input => {
                    input.addEventListener('keyup', function() {
                        const searchValue = this.value.toLowerCase();
                        const packageItems = this.closest('form').querySelectorAll('.package-item');

                        packageItems.forEach(item => {
                            const packageId = item.querySelector('td:nth-child(2)').textContent
                                .toLowerCase();
                            const destination = item.querySelector('td:nth-child(3)')
                                .textContent.toLowerCase();
                            const client = item.querySelector('td:nth-child(4)').textContent
                                .toLowerCase();

                            if (packageId.includes(searchValue) || destination.includes(
                                    searchValue) || client.includes(searchValue)) {
                                item.style.display = '';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    });
                });

                // Initialiser Alpine.js pour les onglets
                // Préserver l'onglet actif lors des rechargements de page
                const savedTab = localStorage.getItem('activeTab');
                if (savedTab) {
                    window.dispatchEvent(new CustomEvent('x-tab-init', {
                        detail: savedTab
                    }));
                }

                // Écouter les changements d'onglet et sauvegarder
                window.addEventListener('x-tab-change', function(e) {
                    localStorage.setItem('activeTab', e.detail);
                });
            });
        </script>
    @endpush
</x-app-layout>
