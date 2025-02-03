<x-app-layout>
    <!-- Header amélioré avec animation -->
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div class="animate-fade-in">
                <h2 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-[#0077be] to-[#005c91] text-transparent bg-clip-text">
                    Modifier le colis #{{ $package->tracking_number }}
                </h2>
                <p class="text-[#0077be]/70 text-sm md:text-base mt-1">Mettez à jour les informations du colis</p>
            </div>
            <div class="flex space-x-4 animate-fade-in">
                <a href="{{ route('admin.packages.show', $package) }}"
                    class="inline-flex items-center px-6 py-2.5 bg-white border border-[#0077be] text-[#0077be] rounded-lg hover:bg-[#0077be]/5 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Formulaire de modification -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-[#0077be]/10">
                <div class="p-6">
                    <form action="{{ route('admin.packages.update', $package) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Section Informations du colis -->
                        <div class="space-y-6">
                            <h3 class="text-xl font-semibold text-[#0077be] flex items-center mb-6">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                                Informations du colis
                            </h3>

                            <!-- Statut -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-[#0077be]/70">Statut</label>
                                <select id="status" name="status"
                                    class="mt-1 block w-full rounded-lg border border-[#0077be]/20 focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300">
                                    <option value="pending" {{ $package->status === 'pending' ? 'selected' : '' }}>En attente</option>
                                    <option value="in_transit" {{ $package->status === 'in_transit' ? 'selected' : '' }}>En transit</option>
                                    <option value="delivered" {{ $package->status === 'delivered' ? 'selected' : '' }}>Livré</option>
                                </select>
                            </div>

                            <!-- Poids -->
                            <div>
                                <label for="weight" class="block text-sm font-medium text-[#0077be]/70">Poids (kg)</label>
                                <input type="number" id="weight" name="weight" value="{{ $package->weight }}"
                                    class="mt-1 block w-full rounded-lg border border-[#0077be]/20 focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300">
                            </div>

                            <!-- Prix -->
                            <div>
                                <label for="price" class="block text-sm font-medium text-[#0077be]/70">Prix (€)</label>
                                <input type="number" id="price" name="price" step="0.01" value="{{ $package->price }}"
                                    class="mt-1 block w-full rounded-lg border border-[#0077be]/20 focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300">
                            </div>
                        </div>

                        <!-- Section Destination -->
                        <div class="mt-8 space-y-6">
                            <h3 class="text-xl font-semibold text-[#0077be] flex items-center mb-6">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Destination
                            </h3>

                            <!-- Adresse de destination -->
                            <div>
                                <label for="destination_address" class="block text-sm font-medium text-[#0077be]/70">Adresse de destination</label>
                                <textarea id="destination_address" name="destination_address" rows="3"
                                    class="mt-1 block w-full rounded-lg border border-[#0077be]/20 focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300">{{ $package->destination_address }}</textarea>
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="mt-8 flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-2.5 bg-[#ffd700] text-[#0077be] font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Enregistrer les modifications
                            </button>
                        </div>
                    </form>
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
</x-app-layout>
