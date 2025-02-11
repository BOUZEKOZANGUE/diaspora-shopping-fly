<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-r from-[#0077be] to-blue-800 rounded-2xl shadow-lg p-6">
            <div class="absolute inset-0 bg-grid-white/[0.05] bg-[size:20px_20px]"></div>
            <div class="relative flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <!-- En-tête et Titre -->
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

                <!-- Barre de recherche et boutons -->
                <div class="w-full md:w-auto flex flex-col md:flex-row items-center gap-4">
                    <div class="relative flex-grow md:flex-grow-0 w-full md:w-auto">
                        @include('admin.packages.partials.search-bar')
                    </div>
                    <div class="flex items-center space-x-3">
                        @include('admin.packages.partials.action-buttons')
                    </div>
                </div>
            </div>

            <!-- Filtres rapides -->
            @include('admin.packages.partials.quick-filters')
        </div>
    </x-slot>

    <!-- Barre d'actions groupées -->
    @include('admin.packages.partials.batch-actions')

    <!-- Cartes statistiques -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @include('admin.packages.partials.stats-cards')
        </div>
    </div>

    <!-- Table principale -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-6">
        <div class="bg-white rounded-2xl shadow-lg border border-blue-100">
            <div class="p-1 md:p-2">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-blue-200">
                        @include('admin.packages.partials.table-header')
                        <tbody class="divide-y divide-blue-100">
                            @foreach ($packages as $package)
                                @include('admin.packages.partials.table-row')
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

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/packages.css') }}">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/packages.js') }}"></script>
    @endpush
</x-app-layout>
