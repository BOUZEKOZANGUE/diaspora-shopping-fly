<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-br from-[#1e6bb8] via-[#0077be] to-[#1e40af] rounded-3xl shadow-2xl p-6">
            <!-- Effet de grille moderne -->
            <div class="absolute inset-0 bg-grid-white/[0.03] bg-[size:30px_30px] opacity-50"></div>

            <!-- Éléments décoratifs -->
            <div class="absolute top-0 right-0 w-40 h-40 bg-[#DAA520]/[0.08] rounded-full blur-3xl transform translate-x-20 -translate-y-20"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-[#DAA520]/[0.1] rounded-full blur-2xl transform -translate-x-12 translate-y-12"></div>

            <div class="relative z-10">
                <!-- En-tête principal -->
                <div class="flex flex-col xl:flex-row justify-between items-start xl:items-center gap-6">
                    <!-- Titre et métadonnées -->
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <div class="p-4 bg-white/10 backdrop-blur-sm rounded-2xl border border-[#DAA520]/20 shadow-lg">
                                <svg class="w-10 h-10 text-[#DAA520]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <div class="absolute -top-1 -right-1 w-4 h-4 bg-[#DAA520] rounded-full border-2 border-white animate-pulse"></div>
                        </div>
                        <div>
                            <h1 class="text-3xl xl:text-4xl font-bold text-white mb-2 tracking-tight">
                                Gestion des Colis
                            </h1>
                            <div class="flex flex-wrap items-center gap-3 text-white/80">
                                <div class="flex items-center space-x-2 bg-white/10 rounded-full px-3 py-1">
                                    <div class="w-2 h-2 bg-[#DAA520] rounded-full"></div>
                                    <span class="text-sm font-medium">
                                        <span id="selected-count" class="hidden bg-[#DAA520] text-white px-2 py-1 rounded-full text-xs mr-1">0 sélectionné(s)</span>
                                        <span id="total-count">{{ $packages->total() ?? 0 }} colis</span>
                                    </span>
                                </div>
                                <div class="hidden sm:flex items-center space-x-2 bg-white/10 rounded-full px-3 py-1 text-sm">
                                    <svg class="w-4 h-4 text-[#DAA520]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Mis à jour il y a 2 min</span>
                                    <button type="button" onclick="refreshPage()" class="ml-2 p-1 hover:bg-white/20 rounded-full transition-colors duration-200" title="Actualiser">
                                        <svg class="w-4 h-4 text-[#DAA520]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions principales -->
                    <div class="flex flex-col lg:flex-row items-stretch lg:items-center gap-4 w-full xl:w-auto">
                        <div class="relative flex-grow xl:flex-grow-0 min-w-0 xl:min-w-80">
                            @include('admin.packages.partials.search-bar')
                        </div>
                        <div class="flex items-center space-x-3 flex-shrink-0">
                            @include('admin.packages.partials.action-buttons')
                        </div>
                    </div>
                </div>

                <!-- Filtres rapides -->
                <div class="border-t border-white/10 pt-4 mt-6">
                    @include('admin.packages.partials.quick-filters')
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Conteneur principal avec structure optimisée -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Section Cartes Statistiques - En haut -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 lg:gap-6">
            @include('admin.packages.partials.stats-cards')
        </div>

        <!-- Barre d'actions groupées modernisée -->
        <div id="batch-actions" class="hidden transform translate-y-4 opacity-0 transition-all duration-500 ease-out">
            <div class="bg-gradient-to-r from-white via-blue-50/30 to-white rounded-2xl shadow-xl border border-[#1e6bb8]/20 p-4 lg:p-6 backdrop-blur-sm">
                <!-- En-tête de la barre d'actions -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-br from-[#1e6bb8] to-[#0077be] rounded-lg shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Actions groupées</h3>
                            <p class="text-sm text-gray-600">
                                <span id="selected-packages-count">0</span> colis sélectionné(s)
                            </p>
                        </div>
                    </div>

                    <!-- Bouton de fermeture -->
                    <button id="close-batch-actions" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-all duration-200" title="Fermer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Contenu principal -->
                <div class="space-y-4">
                    <!-- Sélections -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Action principale -->
                        <div class="relative">
                            <label class="block text-xs font-medium text-gray-700 mb-1">Action à effectuer</label>
                            <select id="batch-action-select" class="w-full px-4 py-3 text-sm border-2 border-[#1e6bb8]/20 rounded-xl focus:ring-2 focus:ring-[#DAA520] focus:border-[#DAA520] transition-all duration-300 bg-white shadow-sm hover:border-[#1e6bb8]/40">
                                <option value="">Choisir une action...</option>
                                <option value="status">🔄 Changer le statut</option>
                                <option value="delete">🗑️ Supprimer</option>
                                <option value="export">📊 Exporter</option>
                                <option value="print">🖨️ Imprimer étiquettes</option>
                                <option value="assign">👤 Assigner à un utilisateur</option>
                            </select>
                        </div>

                        <!-- Sélection de statut (conditionnel) -->
                        <div id="status-selection" class="hidden relative">
                            <label class="block text-xs font-medium text-gray-700 mb-1">Nouveau statut</label>
                            <select id="status-select" class="w-full px-4 py-3 text-sm border-2 border-[#1e6bb8]/20 rounded-xl focus:ring-2 focus:ring-[#DAA520] focus:border-[#DAA520] transition-all duration-300 bg-white shadow-sm">
                                <option value="delivered">✅ Livré</option>
                                <option value="in_transit">🚚 En transit</option>
                                <option value="pending">⏳ En attente</option>
                            </select>
                        </div>

                        <!-- Sélection d'utilisateur (conditionnel) -->
                        <div id="user-selection" class="hidden relative">
                            <label class="block text-xs font-medium text-gray-700 mb-1">Assigner à</label>
                            <select id="user-select" class="w-full px-4 py-3 text-sm border-2 border-[#1e6bb8]/20 rounded-xl focus:ring-2 focus:ring-[#DAA520] focus:border-[#DAA520] transition-all duration-300 bg-white shadow-sm">
                                <option value="">Choisir un utilisateur...</option>
                                <!-- Options à remplir dynamiquement -->
                            </select>
                        </div>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-4 border-t border-gray-100">
                        <button id="apply-action" disabled class="flex-1 sm:flex-none group relative px-6 py-3 bg-gradient-to-r from-[#1e6bb8] to-[#0077be] text-white font-semibold rounded-xl hover:from-[#0077be] hover:to-[#1e40af] focus:ring-4 focus:ring-[#1e6bb8]/30 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none disabled:shadow-none">
                            <span class="flex items-center justify-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Appliquer</span>
                            </span>
                        </button>

                        <button id="cancel-selection" class="flex-1 sm:flex-none px-6 py-3 text-gray-700 font-medium border-2 border-gray-200 rounded-xl hover:border-gray-300 hover:bg-gray-50 focus:ring-4 focus:ring-gray-200 transition-all duration-300 shadow-sm hover:shadow-md">
                            <span class="flex items-center justify-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span>Annuler</span>
                            </span>
                        </button>
                    </div>

                    <!-- Barre de progression pour les actions en cours -->
                    <div id="batch-progress" class="hidden pt-4 border-t border-gray-100">
                        <div class="flex items-center space-x-3">
                            <div class="flex-1">
                                <div class="flex items-center justify-between text-xs text-gray-600 mb-2">
                                    <span>Traitement en cours...</span>
                                    <span id="progress-text">0%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div id="progress-bar" class="bg-gradient-to-r from-[#1e6bb8] to-[#DAA520] h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table principale avec design moderne -->
        <div class="bg-white rounded-3xl shadow-xl border border-[#1e6bb8]/20 overflow-hidden">
            <!-- En-tête de la table -->
            <div class="bg-gradient-to-r from-[#1e6bb8]/10 to-[#0077be]/10 px-4 lg:px-6 py-4 border-b border-[#1e6bb8]/20">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Liste des colis</h3>
                        <p class="text-sm text-gray-600 mt-1">Gérez vos colis en temps réel</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center space-x-2 bg-white rounded-full px-3 py-1 shadow-sm">
                            <div class="w-2 h-2 bg-[#DAA520] rounded-full animate-pulse"></div>
                            <span class="text-sm text-gray-600 font-medium">Temps réel</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenu de la table -->
            <div class="p-1 lg:p-2">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#1e6bb8]/20">
                        @include('admin.packages.partials.table-header')
                        <tbody class="divide-y divide-[#1e6bb8]/10">
                            @foreach ($packages as $package)
                                @include('admin.packages.partials.table-row')
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination personnalisée DSF -->
                @include('admin.packages.partials.custom-pagination')
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/packages.css') }}">
        <style>
            /* Animations supplémentaires */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in-up {
                animation: fadeInUp 0.6s ease-out;
            }

            /* Effet de survol pour les cartes */
            .stats-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }

            /* Gradient pour les boutons */
            .btn-gradient {
                background: linear-gradient(135deg, #1e6bb8, #0077be);
                border: none;
                box-shadow: 0 4px 15px rgba(30, 107, 184, 0.3);
                transition: all 0.3s ease;
            }

            .btn-gradient:hover {
                transform: translateY(-1px);
                box-shadow: 0 6px 20px rgba(30, 107, 184, 0.4);
            }

            /* Personnalisation du scrollbar */
            .overflow-x-auto::-webkit-scrollbar {
                height: 4px;
            }

            .overflow-x-auto::-webkit-scrollbar-track {
                background: #f1f5f9;
            }

            .overflow-x-auto::-webkit-scrollbar-thumb {
                background: #1e6bb8;
                border-radius: 2px;
            }

            .overflow-x-auto::-webkit-scrollbar-thumb:hover {
                background: #0077be;
            }

            /* Grid pattern CSS */
            .bg-grid-white\/\[0\.03\] {
                background-image: radial-gradient(circle, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            }

            /* Responsive improvements */
            @media (max-width: 768px) {
                .stats-card {
                    margin-bottom: 0.5rem;
                }

                #batch-actions .space-y-4 > * + * {
                    margin-top: 1rem;
                }
            }

            /* Enhanced mobile experience */
            @media (max-width: 640px) {
                .rounded-3xl {
                    border-radius: 1.5rem;
                }

                .text-3xl {
                    font-size: 1.875rem;
                }

                .xl\:text-4xl {
                    font-size: 2rem;
                }
            }

            /* Animation pour les stats cards */
            .stats-card {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .stats-card:hover {
                transform: translateY(-4px) scale(1.02);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            }

            /* Amélioration des focus states */
            .focus\:ring-2:focus {
                box-shadow: 0 0 0 2px rgba(218, 165, 32, 0.5);
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/packages.js') }}"></script>
        <script>
            // Fonction pour actualiser la page
            function refreshPage() {
                const button = event.target.closest('button');
                const icon = button.querySelector('svg');

                // Animation de rotation
                icon.style.transform = 'rotate(360deg)';
                icon.style.transition = 'transform 0.6s ease-in-out';

                // Simuler un rechargement (ou utiliser une vraie requête AJAX)
                setTimeout(() => {
                    window.location.reload();
                }, 600);
            }

            // Animation d'apparition progressive des éléments
            document.addEventListener('DOMContentLoaded', function() {
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-fade-in-up');
                        }
                    });
                }, observerOptions);

                // Observer les cartes stats et les lignes de table
                document.querySelectorAll('.stats-card, .table-row, [class*="grid-cols"]').forEach(el => {
                    observer.observe(el);
                });

                // Animation en cascade pour les stats cards
                const statsCards = document.querySelectorAll('.stats-card');
                statsCards.forEach((card, index) => {
                    card.style.animationDelay = `${index * 0.1}s`;
                });
            });
        </script>
    @endpush
</x-app-layout>
