<x-app-layout>
    <!-- Hero Section -->
    <x-slot name="header">
        <div class="relative bg-gradient-to-r from-[#0077be] to-[#005c91] overflow-hidden">
            {{-- Navigation supérieure --}}
            <div class="absolute top-0 left-0 right-0 h-16 bg-black/10 backdrop-blur-sm z-10">
                <div class="max-w-7xl mx-auto px-4 h-full">
                    <div class="flex items-center justify-between h-full">
                        {{-- Bouton retour avec meilleure icône de retour --}}
                        <a href="{{ route('dashboard') }}"
                           class="flex items-center px-4 py-2 text-sm text-white hover:bg-white/10 rounded-lg transition-all group">
                            <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                            </svg>
                            Retour au dashboard
                        </a>

                        {{-- Indicateur express avec icône d'avion améliorée --}}
                        <div class="flex items-center px-3 py-1.5 bg-[#FFD700]/20 text-[#FFD700] rounded-full">
                            <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                            </svg>
                            Livraison Express 24H
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contenu principal --}}
            <div class="pt-24 pb-20 px-4 max-w-7xl mx-auto">
                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between">
                    {{-- Section titre avec nouvelle icône de colis --}}
                    <div class="flex-1">
                        <div class="flex items-center space-x-6">
                            <div class="p-4 bg-gradient-to-br from-white/20 to-white/5 backdrop-blur-xl rounded-2xl shadow-xl border border-white/10">
                                <svg class="w-14 h-14 text-white" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.89 21 5 21H19C20.11 21 21 20.11 21 19V5C21 3.89 20.11 3 19 3ZM19 19H5V5H19V19ZM13.96 12.29L11.21 15.83L9.25 13.47L6.5 17H17.5L13.96 12.29Z"/>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold text-white md:text-4xl">{{ __('Création de Colis') }}</h1>
                                <p class="mt-2 text-lg text-white/80">Expédition pour utilisateur existant</p>
                            </div>
                        </div>

                        {{-- Tags avec icônes plus pertinentes --}}
                        <div class="flex flex-wrap gap-3 mt-6">
                            <span class="flex items-center px-4 py-1.5 bg-white/10 backdrop-blur-lg rounded-full text-sm text-white font-medium">
                                <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm4.2 14.2L11 13V7h1.5v5.2l4.5 2.7-.8 1.3z"/>
                                </svg>
                                Suivi en temps réel
                            </span>
                            <span class="flex items-center px-4 py-1.5 bg-[#FFD700]/20 text-[#FFD700] backdrop-blur-lg rounded-full text-sm font-medium">
                                <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                                </svg>
                                Assurance premium
                            </span>
                        </div>
                    </div>

                    {{-- Bouton création avec nouvelle icône utilisateur + --}}
                    <div class="mt-8 md:mt-0">
                        <a href="{{ route('admin.shipments.create') }}"
                           class="inline-flex items-center px-6 py-3 bg-[#FFD700] hover:bg-[#FFD700]/90 text-gray-900 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all">
                            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            Nouveau client + colis
                        </a>
                    </div>
                </div>
            </div>

            {{-- Les éléments décoratifs et la vague restent inchangés --}}
            <div class="absolute inset-0 z-0">
                <div class="absolute top-20 right-0 w-72 h-72 bg-[#FFD700]/10 rounded-full filter blur-3xl"></div>
                <div class="absolute bottom-0 left-1/4 w-48 h-48 bg-blue-400/10 rounded-full filter blur-2xl"></div>
            </div>

            <div class="absolute bottom-0 left-0 right-0">
                <svg class="w-full h-16" viewBox="0 0 1440 54" fill="none" preserveAspectRatio="none">
                    <path d="M0 54L60 50C120 46 240 38 360 34.7C480 31.3 600 32.7 720 34.7C840 36.7 960 39.3 1080 41.3C1200 43.3 1320 44.7 1380 45.3L1440 46V54H1380C1320 54 1200 54 1080 54C960 54 840 54 720 54C600 54 480 54 360 54C240 54 120 54 60 54H0Z"
                          fill="#f9fafb"/>
                </svg>
            </div>
        </div>
    </x-slot>

    <!-- Contenu Principal -->
    <main class="relative bg-gray-50 -mt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if ($errors->any())
                <div class="mb-6 animate-fade-in-down">
                    <div class="bg-white border-l-4 border-red-500 rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">Veuillez corriger les erreurs
                                        suivantes</h3>
                                    <div class="mt-2 text-sm text-gray-600">
                                        <ul class="list-disc list-inside space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Sidebar - Liste des Utilisateurs -->
                <div class="w-full lg:w-96 flex-shrink-0">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-[#0077be] to-[#005c91] p-4">
                            <h2 class="text-lg font-semibold text-white flex items-center">
                                <i class="fas fa-users mr-2"></i>
                                Sélection de l'Utilisateur
                            </h2>
                        </div>

                        <!-- Barre de recherche -->
                        <div class="p-4 border-b border-gray-200">
                            <div class="relative">
                                <input type="text" id="user_search"
                                    class="w-full pl-10 pr-4 py-2 border-2 border-[#0077be]/20 rounded-xl focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20"
                                    placeholder="Rechercher un utilisateur...">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                <div id="search_spinner" class="absolute right-3 top-2.5 hidden">
                                    <svg class="animate-spin h-5 w-5 text-[#0077be]" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Liste des utilisateurs -->
                        <div class="divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <div class="user-item p-4 hover:bg-[#0077be]/5 cursor-pointer transition-all duration-200"
                                    data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}"
                                    data-user-email="{{ $user->email }}" data-user-phone="{{ $user->phone }}">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="flex-shrink-0 w-12 h-12 rounded-xl bg-[#0077be] text-white flex items-center justify-center font-bold text-lg">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="font-medium text-gray-900">{{ $user->name }}</p>
                                            @if ($user->email)
                                                <p class="text-sm text-gray-500">
                                                    <i class="fas fa-envelope mr-1"></i>
                                                    {{ $user->email }}
                                                </p>
                                            @endif
                                            @if ($user->phone)
                                                <p class="text-sm text-gray-500">
                                                    <i class="fas fa-phone mr-1"></i>
                                                    {{ $user->phone }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="selected-check hidden text-[#0077be]">
                                            <i class="fas fa-check-circle text-2xl"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="p-4 border-t border-gray-200">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>

                <!-- Formulaire Principal -->
                <div class="flex-1">
                    <form action="{{ route('admin.shipments.store-existing') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" required>

                        <!-- Carte Utilisateur Sélectionné -->
                        <div id="selected_user_info" class="hidden">
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
                                <div class="p-6 border-b border-gray-100">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            <div id="user_avatar"
                                                class="w-16 h-16 rounded-xl bg-[#0077be] text-white flex items-center justify-center font-bold text-2xl">
                                            </div>
                                            <div>
                                                <h3 id="user_name" class="text-xl font-semibold text-gray-900"></h3>
                                                <p id="user_email" class="text-gray-500"></p>
                                                <p id="user_phone" class="text-gray-500"></p>
                                            </div>
                                        </div>
                                        <button type="button" id="clear_selection"
                                            class="text-gray-400 hover:text-red-500 transition-colors">
                                            <i class="fas fa-times-circle text-2xl"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="px-6 py-3 bg-[#0077be]/5">
                                    <p class="text-sm text-[#0077be]">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Utilisateur sélectionné pour le colis
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Message si aucun utilisateur sélectionné -->
                        <div id="no_user_selected"
                            class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-lg mb-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">
                                        Veuillez sélectionner un utilisateur dans la liste pour créer le colis
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Détails du Colis -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-900 flex items-center mb-4">
                                    <i class="fas fa-box mr-2 text-[#0077be]"></i>
                                    Détails du Colis
                                </h3>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <div class="space-y-4">
                                        <div class="floating-label">
                                            <textarea name="description_colis" id="description_colis" rows="3" placeholder=" " required
                                                class="w-full px-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20"></textarea>
                                            <label for="description_colis">Description du colis</label>
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="floating-label">
                                            <div class="relative">
                                                <input type="number" name="weight" id="weight" step="0.1"
                                                    placeholder=" " required
                                                    class="w-full px-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20 pr-12">
                                                <span class="absolute right-3 top-2.5 text-gray-400">kg</span>
                                                <label for="weight">Poids</label>
                                            </div>
                                        </div>
                                        <div class="floating-label">
                                            <div class="relative">
                                                <input type="number" name="price" id="price" step="0.01"
                                                    placeholder=" " required
                                                    class="w-full px-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20 pr-12">
                                                <span class="absolute right-3 top-2.5 text-gray-400">€</span>
                                                <label for="price">Prix</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Destinataire -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-900 flex items-center mb-4">
                                    <i class="fas fa-user-check mr-2 text-[#0077be]"></i>
                                    Destinataire
                                </h3>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <div class="space-y-4">
                                        <div class="floating-label">
                                            <input type="text" name="recipient_name" id="recipient_name"
                                                placeholder=" " required
                                                class="w-full px-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20">
                                            <label for="recipient_name">Nom complet</label>
                                        </div>
                                        <div class="floating-label">
                                            <input type="tel" name="recipient_phone" id="recipient_phone"
                                                placeholder=" " required
                                                class="w-full px-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20">

                                            <label for="recipient_phone">Téléphone</label>
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="floating-label">
                                            <select name="country" id="country" required
                                                class="w-full px-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20">
                                                <option value="">Sélectionnez un pays</option>
                                                <option value="France">France</option>
                                                <option value="Cameroun">Cameroun</option>
                                                <option value="Belgique">Belgique</option>
                                            </select>
                                            <label for="country">Pays</label>
                                        </div>
                                        <div class="floating-label">
                                            <input type="text" name="city" id="city" placeholder=" "
                                                required
                                                class="w-full px-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20">
                                            <label for="city">Ville</label>
                                        </div>
                                        <div class="floating-label">
                                            <textarea name="destination_address" id="destination_address" rows="3" placeholder=" " required
                                                class="w-full px-4 py-2 rounded-xl border-2 border-[#0077be]/20 focus:border-[#0077be] focus:ring focus:ring-[#0077be]/20"></textarea>
                                            <label for="destination_address">Adresse complète</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="flex justify-end">
                            <button type="submit" id="submit_button" disabled
                                class="inline-flex items-center px-6 py-3 bg-[#0077be] text-white font-semibold rounded-xl shadow-lg hover:bg-[#005c91] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0077be] transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                                <span class="flex items-center">
                                    <span class="mr-2">Créer le colis</span>
                                    <i class="fas fa-arrow-right transition-transform group-hover:translate-x-1"></i>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <style>
        .floating-label {
            position: relative;
        }

        .floating-label input:not(:placeholder-shown)+label,
        .floating-label input:focus+label,
        .floating-label textarea:not(:placeholder-shown)+label,
        .floating-label textarea:focus+label,
        .floating-label select:not(:placeholder-shown)+label,
        .floating-label select:focus+label {
            transform: translateY(-1.5rem) scale(0.85);
            background-color: white;
            padding: 0 0.25rem;
        }

        .floating-label label {
            position: absolute;
            left: 1rem;
            top: 0.75rem;
            color: #6b7280;
            pointer-events: none;
            transition: all 0.2s ease;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-down {
            animation: fadeInDown 0.5s ease-out;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb {
            background: #0077be;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #005c91;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Éléments DOM
            const userSearch = document.getElementById('user_search');
            const usersList = document.querySelector('.divide-y');
            const selectedUserInfo = document.getElementById('selected_user_info');
            const noUserSelected = document.getElementById('no_user_selected');
            const userIdInput = document.getElementById('user_id');
            const clearSelection = document.getElementById('clear_selection');
            const submitButton = document.getElementById('submit_button');
            const searchSpinner = document.getElementById('search_spinner');
            const userItems = document.querySelectorAll('.user-item');
            let currentSelection = null;

            // Initialisation
            function initializeUsersList() {
                userItems.forEach(item => {
                    item.addEventListener('click', () => selectUser(item));
                });
            }

            // Sélection d'un utilisateur
            function selectUser(userElement) {
                // Retirer la sélection précédente
                if (currentSelection) {
                    currentSelection.classList.remove('bg-[#0077be]/10');
                    currentSelection.querySelector('.selected-check').classList.add('hidden');
                }

                // Mettre à jour la nouvelle sélection
                currentSelection = userElement;
                userElement.classList.add('bg-[#0077be]/10');
                userElement.querySelector('.selected-check').classList.remove('hidden');

                // Mettre à jour les champs cachés et l'affichage
                const userId = userElement.dataset.userId;
                const userName = userElement.dataset.userName;
                const userEmail = userElement.dataset.userEmail;
                const userPhone = userElement.dataset.userPhone;
                const initials = userName.split(' ')
                    .map(n => n[0])
                    .join('')
                    .toUpperCase()
                    .slice(0, 2);

                userIdInput.value = userId; // Mettre à jour l'ID de l'utilisateur dans le champ caché
                document.getElementById('user_avatar').textContent = initials;
                document.getElementById('user_name').textContent = userName;
                document.getElementById('user_email').textContent = userEmail || 'Pas d\'email';
                document.getElementById('user_phone').textContent = userPhone || 'Pas de téléphone';

                selectedUserInfo.classList.remove('hidden');
                noUserSelected.classList.add('hidden');
                submitButton.disabled = false;
            }

            // Recherche en temps réel
            async function searchUsers(term) {
                try {
                    showSpinner();
                    const response = await fetch(`/api/users/search?term=${encodeURIComponent(term)}`, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (!response.ok) throw new Error('Erreur réseau');

                    const data = await response.json();
                    updateUsersList(data.results);
                } catch (error) {
                    console.error('Erreur:', error);
                } finally {
                    hideSpinner();
                }
            }

            // Mise à jour de la liste des utilisateurs
            function updateUsersList(users) {
                usersList.innerHTML = '';
                if (users && users.length > 0) {
                    users.forEach(user => {
                        const initials = user.name.split(' ')
                            .map(n => n[0])
                            .join('')
                            .toUpperCase()
                            .slice(0, 2);

                        const userElement = document.createElement('div');
                        userElement.className =
                            'user-item p-4 hover:bg-[#0077be]/5 cursor-pointer transition-all duration-200';
                        userElement.dataset.userId = user.id;
                        userElement.dataset.userName = user.name;
                        userElement.dataset.userEmail = user.email;
                        userElement.dataset.userPhone = user.phone;

                        userElement.innerHTML = `
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-[#0077be] text-white flex items-center justify-center font-bold text-lg">
                                        ${initials}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-medium text-gray-900">${user.name}</p>
                                        ${user.email ? `<p class="text-sm text-gray-500"><i class="fas fa-envelope mr-1"></i>${user.email}</p>` : ''}
                                        ${user.phone ? `<p class="text-sm text-gray-500"><i class="fas fa-phone mr-1"></i>${user.phone}</p>` : ''}
                                    </div>
                                    <div class="selected-check hidden text-[#0077be]">
                                        <i class="fas fa-check-circle text-2xl"></i>
                                    </div>
                                </div>
                            `;

                        userElement.addEventListener('click', () => selectUser(userElement));
                        usersList.appendChild(userElement);
                    });
                } else {
                    usersList.innerHTML = `
                            <div class="p-4 text-center text-gray-500">
                                Aucun utilisateur trouvé
                            </div>
                        `;
                }
            }

            // Gestion du spinner
            function showSpinner() {
                searchSpinner.classList.remove('hidden');
            }

            function hideSpinner() {
                searchSpinner.classList.add('hidden');
            }

            // Réinitialisation de la sélection
            function clearUserSelection() {
                if (currentSelection) {
                    currentSelection.classList.remove('bg-[#0077be]/10');
                    currentSelection.querySelector('.selected-check').classList.add('hidden');
                }
                currentSelection = null;
                userIdInput.value = '';
                selectedUserInfo.classList.add('hidden');
                noUserSelected.classList.remove('hidden');
                submitButton.disabled = true;
            }

            // Event Listeners
            let searchTimeout;
            userSearch.addEventListener('input', function(e) {
                const searchTerm = e.target.value.trim();
                clearTimeout(searchTimeout);

                if (searchTerm.length >= 2) {
                    searchTimeout = setTimeout(() => searchUsers(searchTerm), 300);
                } else if (searchTerm.length === 0) {
                    // Recharger la liste initiale
                    window.location.reload();
                }
            });

            clearSelection.addEventListener('click', clearUserSelection);

            // Validation du formulaire
            const form = document.querySelector('form');
            const requiredFields = form.querySelectorAll('[required]');

            requiredFields.forEach(field => {
                field.addEventListener('invalid', function(e) {
                    e.preventDefault();
                    field.classList.add('border-red-500');
                    field.classList.add('animate-shake');
                    setTimeout(() => field.classList.remove('animate-shake'), 500);
                });

                field.addEventListener('input', function() {
                    field.classList.remove('border-red-500');
                });
            });

            // Initialisation
            initializeUsersList();
        });
    </script>
</x-app-layout>
