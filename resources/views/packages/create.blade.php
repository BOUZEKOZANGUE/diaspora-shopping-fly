<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/dsf.svg') }}" alt="DSF Logo" class="w-12 h-12">
                <h2 class="text-2xl font-bold text-[#0077be]">
                    {{ __('Créer votre colis') }}
                </h2>
            </div>
            <div class="hidden sm:flex items-center space-x-2 text-[#0077be]">
                <i class="fas fa-shipping-fast"></i>
                <span class="text-sm font-medium">Suivi en temps réel</span>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Form Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg p-6 space-y-8">
                        <form action="{{ route('packages.store') }}" method="POST" class="space-y-6" id="packageForm">
                            @csrf
                            <input type="hidden" name="destination_address" id="destination_address">

                            <!-- Weight Section -->
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <label for="weight"
                                        class="flex items-center text-lg font-semibold text-[#0077be]">
                                        <i class="fas fa-weight mr-2"></i>
                                        Poids du colis
                                    </label>
                                    <span
                                        class="px-3 py-1 text-sm bg-blue-50 text-[#0077be] rounded-full font-medium">Requis</span>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <input type="number" id="weight" name="weight" step="0.1"
                                            min="0.1" max="1000"
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91] bg-white text-lg"
                                            placeholder="0.0" required>
                                    </div>
                                    <select id="weight_unit" name="weight_unit"
                                        class="w-24 rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91] bg-white">
                                        <option value="kg">kg</option>
                                        <option value="g">g</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Destination Section -->
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <label class="flex items-center text-lg font-semibold text-[#0077be]">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        Adresse de livraison
                                    </label>
                                    <span
                                        class="px-3 py-1 text-sm bg-blue-50 text-[#0077be] rounded-full font-medium">Requis</span>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Country Selection -->
                                    <div class="space-y-2">
                                        <label for="country" class="block text-sm font-medium text-[#0077be]">
                                            <i class="fas fa-globe-africa mr-2"></i>Pays de destination
                                        </label>
                                        <select id="country" name="country" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91] bg-white">
                                            <option value="">Sélectionnez un pays</option>
                                            <option value="France">France</option>
                                            <option value="Cameroun">Cameroun</option>
                                            <option value="Belgique">Belgique</option>
                                            <option value="Canada">Canada</option>
                                            <option value="USA">États-Unis</option>
                                            <option value="UK">Royaume-Uni</option>
                                        </select>
                                    </div>

                                    <!-- City Input with Service Points -->
                                    <div class="space-y-2">
                                        <label for="city" class="block text-sm font-medium text-[#0077be]">
                                            <i class="fas fa-city mr-2"></i>Ville
                                        </label>
                                        <input type="text" id="city" name="city" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91] bg-white"
                                            placeholder="Entrez votre ville">
                                        <div class="mt-2">
                                            <div class="text-sm font-medium text-[#0077be] mb-1">Points de service
                                                disponibles:</div>
                                            <div id="service_points" class="p-3 bg-blue-50 rounded-lg">
                                                <span id="available_cities" class="text-sm text-gray-600"></span>
                                                <div class="mt-2 text-xs text-[#005c91] italic">
                                                    Pour toute assistance spécifique, contactez le support de votre
                                                    ville.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Street Address -->
                                    <div class="space-y-2 md:col-span-2">
                                        <label for="street" class="block text-sm font-medium text-[#0077be]">
                                            <i class="fas fa-road mr-2"></i>Adresse détaillée
                                        </label>
                                        <input type="text" id="street" name="street" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91] bg-white"
                                            placeholder="Numéro et nom de rue, bâtiment, etc.">
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Section -->
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <label class="flex items-center text-lg font-semibold text-[#0077be]">
                                        <i class="fas fa-address-book mr-2"></i>
                                        Informations du destinataire
                                    </label>
                                    <span
                                        class="px-3 py-1 text-sm bg-blue-50 text-[#0077be] rounded-full font-medium">Requis</span>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label for="recipient_name" class="block text-sm font-medium text-[#0077be]">
                                            <i class="fas fa-user mr-2"></i>Nom complet
                                        </label>
                                        <input type="text" id="recipient_name" name="recipient_name" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91] bg-white"
                                            placeholder="Nom du destinataire">
                                    </div>

                                    <div class="space-y-2">
                                        <label for="whatsapp" class="block text-sm font-medium text-[#0077be]">
                                            <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                                        </label>
                                        <input type="tel" id="whatsapp" name="whatsapp" required
                                            class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91] bg-white"
                                            placeholder="+33 X XX XX XX XX">
                                    </div>
                                </div>
                            </div>

                            <!-- Description Section -->
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <label for="description_colis"
                                        class="flex items-center text-lg font-semibold text-[#0077be]">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Description du contenu
                                    </label>
                                    <span
                                        class="px-3 py-1 text-sm bg-blue-50 text-[#0077be] rounded-full font-medium">Requis</span>
                                </div>
                                <textarea id="description_colis" name="description_colis" rows="3" required
                                    class="w-full rounded-xl border-2 border-[#0077be] focus:border-[#005c91] focus:ring-1 focus:ring-[#005c91] bg-white"
                                    placeholder="Décrivez le contenu de votre colis..."></textarea>
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

                <!-- Side Panel with Contact and Forbidden Items -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Support Contact Section -->
                    <div class="bg-gradient-to-br from-[#0077be] to-[#005c91] text-white rounded-2xl shadow-lg p-6">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 border-b border-white/20 pb-4">
                                <i class="fas fa-headset text-2xl"></i>
                                <h3 class="text-xl font-bold">Support 24/7</h3>
                            </div>

                            <div class="space-y-4">
                                <!-- France Support -->
                                <div class="p-3 bg-white/10 rounded-xl backdrop-blur-sm">
                                    <h4 class="font-semibold text-[#ffd700] mb-2">France</h4>
                                    <a href="#"
                                        class="flex items-center space-x-2 hover:text-[#ffd700] transition-colors"
                                        onclick="redirectToWhatsApp('FR', '+33XXXXXXXXX')">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>+33 X XX XX XX XX</span>
                                    </a>
                                </div>

                                <!-- Cameroun Support -->
                                <div class="p-3 bg-white/10 rounded-xl backdrop-blur-sm">
                                    <h4 class="font-semibold text-[#ffd700] mb-2">Cameroun</h4>
                                    <a href="#"
                                        class="flex items-center space-x-2 hover:text-[#ffd700] transition-colors"
                                        onclick="redirectToWhatsApp('CM', '+237XXXXXXXX')">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>+237 X XX XX XX XX</span>
                                    </a>
                                </div>

                                <!-- Belgique Support -->
                                <div class="p-3 bg-white/10 rounded-xl backdrop-blur-sm">
                                    <h4 class="font-semibold text-[#ffd700] mb-2">Belgique</h4>
                                    <a href="#"
                                        class="flex items-center space-x-2 hover:text-[#ffd700] transition-colors"
                                        onclick="redirectToWhatsApp('BE', '+32XXXXXXXXX')">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>+32 X XX XX XX XX</span>
                                    </a>
                                </div>
                            </div>

                            <div class="text-sm text-white/80 border-t border-white/20 pt-4">
                                <p class="flex items-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    Disponible 24h/24 et 7j/7
                                </p>
                                <p class="mt-2">Pour une assistance immédiate, contactez le support de votre région.
                                </p>
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
                                    <p class="text-sm text-gray-600">Explosifs, produits inflammables, substances
                                        toxiques</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-3 bg-red-50 rounded-xl">
                                <i class="fas fa-skull-crossbones text-red-500 mt-1"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Armes et munitions</h4>
                                    <p class="text-sm text-gray-600">Toutes catégories d'armes et munitions</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-3 bg-red-50 rounded-xl">
                                <i class="fas fa-pills text-red-500 mt-1"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Drogues et médicaments</h4>
                                    <p class="text-sm text-gray-600">Substances illicites et médicaments sans
                                        ordonnance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Points de service par pays et ville
        const servicePoints = {
            'France': {
                'Paris': {
                    points: ['Gare du Nord', 'Gare de Lyon', 'Châtelet'],
                    support: '+33123456789'
                }
            },
            'Cameroun': {
                'Douala': {
                    points: ['Akwa', 'Bonanjo', 'Bonapriso'],
                    support: '+237123456789'
                },
                'Yaoundé': {
                    points: ['Centre ville', 'Bastos', 'Mvog-Mbi'],
                    support: '+237987654321'
                }
            },
            'Belgique': {
                'Bruxelles': {
                    points: ['Gare Centrale', 'Place Flagey', 'Avenue Louise'],
                    support: '+32123456789'
                },
                'Liège': {
                    points: ['Gare des Guillemins', 'Place Saint-Lambert'],
                    support: '+32987654321'
                }
            }
        };

        // Fonction pour mettre à jour les points de service
        function updateServicePoints(country) {
            const availableCities = document.getElementById('available_cities');
            if (servicePoints[country]) {
                const cities = Object.keys(servicePoints[country]);
                const points = cities.map(city => {
                    const cityPoints = servicePoints[country][city].points;
                    return `<strong>${city}</strong>: ${cityPoints.join(', ')}`;
                });
                availableCities.innerHTML = points.join('<br>');
            } else {
                availableCities.textContent = 'Aucun point de service disponible';
            }
        }

        // Fonction pour rediriger vers WhatsApp
        function redirectToWhatsApp(countryCode, phone) {
            const form = document.getElementById('packageForm');
            const formData = new FormData(form);
            const trackingNumber = Math.random().toString(36).substr(2, 9).toUpperCase(); // Simulé

            const message = `
🛍️ Demande d'assistance DSF
---------------------------
N° Tracking: ${trackingNumber}
Pays: ${formData.get('country')}
Ville: ${formData.get('city')}
---------------------------
Message: [Votre message]
            `.trim();

            const whatsappUrl = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
        }

        // Event Listeners
        document.addEventListener('DOMContentLoaded', function() {
            const countrySelect = document.getElementById('country');

            // Mise à jour des points de service au changement de pays
            countrySelect.addEventListener('change', function() {
                updateServicePoints(this.value);
            });

            // Gestion de la soumission du formulaire
            document.getElementById('packageForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const address =
                    `${formData.get('street')}, ${formData.get('city')}, ${formData.get('country')} (Tel: ${formData.get('whatsapp')})`;
                document.getElementById('destination_address').value = address;
                this.submit();
            });
        });
    </script>
</x-app-layout>
