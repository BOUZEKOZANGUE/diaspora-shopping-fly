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
                    <form action="{{ route('admin.packages.update', $package) }}" method="POST" enctype="multipart/form-data">
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
                                    class="mt-1 block w-full rounded-lg border border-[#0077be]/20 focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300 px-3 py-2">
                                    <option value="pending" {{ $package->status === 'pending' ? 'selected' : '' }}>En attente</option>
                                    <option value="confirmed" {{ $package->status === 'confirmed' ? 'selected' : '' }}>Confirmé</option>
                                    <option value="in_transit" {{ $package->status === 'in_transit' ? 'selected' : '' }}>En transit</option>
                                    <option value="delivered" {{ $package->status === 'delivered' ? 'selected' : '' }}>Livré</option>
                                    <option value="cancelled" {{ $package->status === 'cancelled' ? 'selected' : '' }}>Annulé</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Poids -->
                            <div>
                                <label for="weight" class="block text-sm font-medium text-[#0077be]/70">Poids (kg)</label>
                                <input type="number" id="weight" name="weight" value="{{ old('weight', $package->weight) }}" step="0.01" min="0"
                                    class="mt-1 block w-full rounded-lg border border-[#0077be]/20 focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300 px-3 py-2">
                                @error('weight')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Prix -->
                            <div>
                                <label for="price" class="block text-sm font-medium text-[#0077be]/70">Prix (€)</label>
                                <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price', $package->price) }}"
                                    class="mt-1 block w-full rounded-lg border border-[#0077be]/20 focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300 px-3 py-2">
                                @error('price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description du colis -->
                            <div>
                                <label for="description_colis" class="block text-sm font-medium text-[#0077be]/70">Description du colis</label>
                                <textarea id="description_colis" name="description_colis" rows="3"
                                    class="mt-1 block w-full rounded-lg border border-[#0077be]/20 focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300 px-3 py-2"
                                    placeholder="Décrivez le contenu du colis...">{{ old('description_colis', $package->description_colis) }}</textarea>
                                @error('description_colis')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
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
                                    class="mt-1 block w-full rounded-lg border border-[#0077be]/20 focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300 px-3 py-2"
                                    placeholder="Adresse complète de livraison...">{{ old('destination_address', $package->destination_address) }}</textarea>
                                @error('destination_address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Section Images -->
                        <div class="mt-8 space-y-6">
                            <h3 class="text-xl font-semibold text-[#0077be] flex items-center mb-6">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Images du colis
                            </h3>

                            <!-- Images actuelles -->
                            @if($package->hasMedia() && !empty($package->images))
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-[#0077be]/70 mb-2">Images actuelles</label>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                        @foreach($package->getImageUrls() as $index => $imageUrl)
                                            <div class="relative group">
                                                <img src="{{ $imageUrl }}" alt="Image {{ $index + 1 }}"
                                                    class="w-full h-24 object-cover rounded-lg border border-gray-200">
                                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 rounded-lg flex items-center justify-center">
                                                    <button type="button" onclick="removeImage({{ $index }})"
                                                        class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-red-500 hover:bg-red-600 rounded-full p-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Ajouter de nouvelles images -->
                            <div>
                                <label for="images" class="block text-sm font-medium text-[#0077be]/70">Ajouter de nouvelles images</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-[#0077be]/20 border-dashed rounded-lg hover:border-[#0077be]/40 transition-colors duration-300">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-[#0077be]/40" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <div class="flex text-sm text-[#0077be]/60">
                                            <label for="images" class="relative cursor-pointer bg-white rounded-md font-medium text-[#0077be] hover:text-[#005c91] focus-within:outline-none focus-within:ring-2 focus-within:ring-[#0077be]">
                                                <span>Télécharger des images</span>
                                                <input id="images" name="images[]" type="file" class="sr-only" multiple accept="image/*" onchange="previewImages(this)">
                                            </label>
                                            <p class="pl-1">ou glisser-déposer</p>
                                        </div>
                                        <p class="text-xs text-[#0077be]/40">PNG, JPG, GIF jusqu'à 10MB chacune</p>
                                    </div>
                                </div>
                                @error('images')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                @error('images.*')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Prévisualisation des nouvelles images -->
                            <div id="image-preview" class="hidden">
                                <label class="block text-sm font-medium text-[#0077be]/70 mb-2">Nouvelles images à ajouter</label>
                                <div id="preview-container" class="grid grid-cols-2 md:grid-cols-4 gap-4"></div>
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="mt-8 flex justify-end space-x-4">
                            <a href="{{ route('admin.packages.show', $package) }}"
                                class="inline-flex items-center px-6 py-2.5 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-all duration-300">
                                Annuler
                            </a>
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

        /* Image preview styles */
        .image-preview {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
        }

        .image-preview img {
            transition: transform 0.3s ease;
        }

        .image-preview:hover img {
            transform: scale(1.05);
        }

        /* Loading overlay */
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 119, 190, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
        }

        /* Success message animation */
        .success-message {
            animation: slideInRight 0.5s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>

    <!-- JavaScript -->
    <script>
        // Prévisualisation des images
        function previewImages(input) {
            const previewSection = document.getElementById('image-preview');
            const previewContainer = document.getElementById('preview-container');

            if (input.files && input.files.length > 0) {
                previewSection.classList.remove('hidden');
                previewContainer.innerHTML = '';

                Array.from(input.files).forEach((file, index) => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const imageDiv = document.createElement('div');
                            imageDiv.className = 'relative group image-preview';
                            imageDiv.innerHTML = `
                                <img src="${e.target.result}" alt="Nouvelle image ${index + 1}"
                                    class="w-full h-24 object-cover rounded-lg border border-gray-200">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 rounded-lg flex items-center justify-center">
                                    <button type="button" onclick="removePreviewImage(this)"
                                        class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-red-500 hover:bg-red-600 rounded-full p-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            `;
                            previewContainer.appendChild(imageDiv);
                        };

                        reader.readAsDataURL(file);
                    }
                });
            } else {
                previewSection.classList.add('hidden');
            }
        }

        // Supprimer une image de la prévisualisation
        function removePreviewImage(button) {
            const imageDiv = button.closest('.image-preview');
            imageDiv.remove();

            // Si plus d'images, cacher la section
            const previewContainer = document.getElementById('preview-container');
            if (previewContainer.children.length === 0) {
                document.getElementById('image-preview').classList.add('hidden');
                document.getElementById('images').value = '';
            }
        }

        // Supprimer une image existante (cette fonction devra être implémentée côté serveur)
        function removeImage(index) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette image ?')) {
                // Ici vous pourriez faire un appel AJAX pour supprimer l'image
                // ou marquer l'image pour suppression lors de la soumission du formulaire
                console.log('Suppression de l\'image à l\'index:', index);

                // Pour l'instant, on cache juste l'image visuellement
                // Dans une vraie implémentation, vous devriez faire un appel AJAX
                showNotification('Fonctionnalité de suppression d\'image à implémenter côté serveur', 'info');
            }
        }

        // Système de notification
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg max-w-sm transform translate-x-full transition-transform duration-300 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                type === 'warning' ? 'bg-yellow-500 text-white' :
                'bg-[#0077be] text-white'
            }`;

            notification.innerHTML = `
                <div class="flex items-center space-x-2">
                    <span>${message}</span>
                    <button onclick="this.closest('.fixed').remove()" class="ml-2 hover:opacity-70">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            `;

            document.body.appendChild(notification);

            // Afficher la notification
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);

            // Masquer après 5 secondes
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.remove();
                        }
                    }, 300);
                }
            }, 5000);
        }

        // Validation du formulaire
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(e) {
                const weight = document.getElementById('weight').value;
                const price = document.getElementById('price').value;

                if (weight <= 0) {
                    e.preventDefault();
                    showNotification('Le poids doit être supérieur à 0', 'error');
                    return;
                }

                if (price <= 0) {
                    e.preventDefault();
                    showNotification('Le prix doit être supérieur à 0', 'error');
                    return;
                }

                // Afficher un message de chargement
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Enregistrement...
                `;
                submitBtn.disabled = true;

                // Si pas d'erreurs de validation côté client, laisser le formulaire se soumettre
            });
        });

        // Afficher les messages de succès/erreur Laravel
        @if(session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                showNotification('{{ session('success') }}', 'success');
            });
        @endif

        @if($errors->any())
            document.addEventListener('DOMContentLoaded', function() {
                showNotification('Veuillez corriger les erreurs dans le formulaire', 'error');
            });
        @endif
    </script>
</x-app-layout>
