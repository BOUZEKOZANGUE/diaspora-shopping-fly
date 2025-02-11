<x-app-layout>
    <!-- Header remains the same -->
    <x-slot name="header">
        <div class="relative bg-gradient-to-r from-[#0077be] to-[#005c91] overflow-hidden">
            {{-- Navigation supérieure --}}
            <div class="absolute top-0 left-0 right-0 h-16 bg-black/10 backdrop-blur-sm z-10">
                <div class="max-w-7xl mx-auto px-4 h-full">
                    <div class="flex items-center justify-between h-full">
                        {{-- Bouton retour --}}
                        <a href="{{ route('dashboard') }}"
                           class="flex items-center px-4 py-2 text-sm text-white hover:bg-white/10 rounded-lg transition-all group">
                            <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Retour aux expéditions
                        </a>

                        {{-- Indicateur de livraison express --}}
                        <div class="flex items-center px-3 py-1.5 bg-[#FFD700]/20 text-[#FFD700] rounded-full">
                            <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Livraison Express 24H
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contenu principal du header --}}
            <div class="pt-24 pb-20 px-4 max-w-7xl mx-auto">
                <div class="relative z-10 flex items-center justify-between">
                    {{-- Section titre et description --}}
                    <div class="flex items-center space-x-6">
                        <div class="p-4 bg-gradient-to-br from-white/20 to-white/5 backdrop-blur-xl rounded-2xl shadow-xl border border-white/10">
                            <svg class="w-14 h-14 text-white" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white md:text-4xl">{{ __('Nouveau Client + Colis') }}</h1>
                            <p class="mt-2 text-lg text-white/80">Création d'un nouveau client et son expédition</p>
                        </div>
                    </div>

                    {{-- Tags informatifs --}}
                    <div class="hidden md:flex space-x-4">
                        <div class="px-4 py-2 bg-white/10 backdrop-blur-lg rounded-xl flex items-center space-x-2">
                            <svg class="w-5 h-5 text-[#FFD700]" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>
                                <path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                            </svg>
                            <span class="text-white font-medium">Express 24H</span>
                        </div>
                        <div class="px-4 py-2 bg-[#FFD700]/20 backdrop-blur-lg rounded-xl flex items-center space-x-2">
                            <svg class="w-5 h-5 text-[#FFD700]" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                            </svg>
                            <span class="text-[#FFD700] font-medium">Assurance Premium</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Vague de séparation --}}
            <div class="absolute bottom-0 left-0 right-0">
                <svg class="w-full h-16" viewBox="0 0 1440 54" fill="none" preserveAspectRatio="none">
                    <path d="M0 54L60 50C120 46 240 38 360 34.7C480 31.3 600 32.7 720 34.7C840 36.7 960 39.3 1080 41.3C1200 43.3 1320 44.7 1380 45.3L1440 46V54H1380C1320 54 1200 54 1080 54C960 54 840 54 720 54C600 54 480 54 360 54C240 54 120 54 60 54H0Z"
                          fill="#f9fafb"/>
                </svg>
            </div>

            {{-- Éléments décoratifs --}}
            <div class="absolute inset-0 z-0">
                <div class="absolute top-20 right-0 w-72 h-72 bg-[#FFD700]/10 rounded-full filter blur-3xl"></div>
                <div class="absolute bottom-0 left-1/4 w-48 h-48 bg-blue-400/10 rounded-full filter blur-2xl"></div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg p-6 space-y-8">
                        <form action="{{ route('admin.shipments.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- Sender Information (same as before) -->
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <label class="text-lg font-semibold text-[#0077be]">
                                        <i class="fas fa-user mr-2"></i>
                                        Informations Expéditeur
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="sender_name" class="block text-sm font-medium text-[#0077be]">Nom complet</label>
                                        <input type="text" id="sender_name" name="sender_name" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91]">
                                    </div>
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-[#0077be]">Téléphone</label>
                                        <input type="tel" id="phone" name="phone" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91]">
                                    </div>
                                </div>
                            </div>

                            <!-- Recipient Information (New section) -->
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <label class="text-lg font-semibold text-[#0077be]">
                                        <i class="fas fa-user-check mr-2"></i>
                                        Informations Destinataire
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="recipient_name" class="block text-sm font-medium text-[#0077be]">Nom complet</label>
                                        <input type="text" id="recipient_name" name="recipient_name" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91]">
                                    </div>
                                    <div>
                                        <label for="recipient_phone" class="block text-sm font-medium text-[#0077be]">Téléphone</label>
                                        <input type="tel" id="recipient_phone" name="recipient_phone" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91]">
                                    </div>
                                </div>
                            </div>

                            <!-- Package Details (same as before) -->
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <label class="text-lg font-semibold text-[#0077be]">
                                        <i class="fas fa-box mr-2"></i>
                                        Détails du Colis
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="weight" class="block text-sm font-medium text-[#0077be]">Poids (kg)</label>
                                        <input type="number" step="0.1" id="weight" name="weight" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91]">
                                    </div>
                                    <div>
                                        <label for="price" class="block text-sm font-medium text-[#0077be]">Prix</label>
                                        <input type="number" step="0.01" id="price" name="price" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91]">
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label for="description_colis" class="block text-sm font-medium text-[#0077be]">Description du colis</label>
                                    <textarea id="description_colis" name="description_colis" rows="3" required
                                        class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91]"></textarea>
                                </div>
                            </div>

                            <!-- Destination -->
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <label class="text-lg font-semibold text-[#0077be]">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        Destination
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="country" class="block text-sm font-medium text-[#0077be]">Pays</label>
                                        <select id="country" name="country" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91]">
                                            <option value="">Sélectionnez un pays</option>
                                            <option value="France">France</option>
                                            <option value="Cameroun">Cameroun</option>
                                            <option value="Belgique">Belgique</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="city" class="block text-sm font-medium text-[#0077be]">Ville</label>
                                        <input type="text" id="city" name="city" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91]">
                                    </div>
                                </div>
                                <div>
                                    <label for="destination_address" class="block text-sm font-medium text-[#0077be]">Adresse complète</label>
                                    <textarea id="destination_address" name="destination_address" rows="2" required
                                        class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91]"></textarea>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end pt-4">
                                <button type="submit"
                                    class="px-6 py-3 bg-[#0077be] hover:bg-[#005c91] text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition duration-200">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Créer le colis
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Side Panel -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Support Contact -->
                    <div class="bg-gradient-to-br from-[#0077be] to-[#005c91] text-white rounded-2xl shadow-lg p-6">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 border-b border-white/20 pb-4">
                                <i class="fas fa-headset text-2xl"></i>
                                <h3 class="text-xl font-bold">Support 24/7</h3>
                            </div>
                            <!-- Service Points -->
                            <div id="service_points" class="space-y-4">
                            </div>
                        </div>
                    </div>

                    <!-- Forbidden Items Section -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <div class="flex items-center space-x-3 text-[#0077be] mb-6">
                            <i class="fas fa-exclamation-triangle text-2xl"></i>
                            <h3 class="text-xl font-bold">Articles Interdits</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3 p-3 bg-red-50 rounded-xl">
                                <i class="fas fa-ban text-red-500 mt-1"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Matières dangereuses</h4>
                                    <p class="text-sm text-gray-600">Explosifs, produits inflammables</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script for service points -->
    <script>
        const servicePoints = {
            'France': {
                'Paris': ['Gare du Nord', 'Gare de Lyon'],
                'Lyon': ['Part-Dieu', 'Perrache']
            },
            'Cameroun': {
                'Douala': ['Aeroport International de Douala'],
                'Yaoundé': ['Aeroport International de Nsimalen']
            },
            'Belgique': {
                'Bruxelles': ['Gare Centrale', 'Avenue Louise'],
                'Liège': ['Guillemins']
            }
        };

        document.getElementById('country').addEventListener('change', function() {
            const country = this.value;
            const servicePointsDiv = document.getElementById('service_points');

            if (servicePoints[country]) {
                servicePointsDiv.innerHTML = Object.entries(servicePoints[country])
                    .map(([city, points]) => `
                        <div class="p-3 bg-white/10 rounded-xl">
                            <h4 class="font-semibold text-[#ffd700] mb-2">${city}</h4>
                            <div class="text-sm">${points.join(', ')}</div>
                        </div>
                    `).join('');
            } else {
                servicePointsDiv.innerHTML = '';
            }
        });
    </script>
</x-app-layout>
