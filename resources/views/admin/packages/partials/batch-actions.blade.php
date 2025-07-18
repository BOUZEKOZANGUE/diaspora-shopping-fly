<!-- Barre d'actions groupées modernisée -->
<div id="batch-actions" class="hidden transform translate-y-4 opacity-0 transition-all duration-500 ease-out">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="bg-gradient-to-r from-white via-blue-50/30 to-white rounded-2xl shadow-xl border border-[#1e6bb8]/20 p-6 backdrop-blur-sm">
            <!-- En-tête de la barre d'actions -->
            <div class="flex items-center justify-between mb-4">
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
                <button id="close-batch-actions"
                        class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-all duration-200"
                        title="Fermer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Contenu principal -->
            <div class="flex flex-col lg:flex-row items-stretch lg:items-center gap-4 lg:gap-6">
                <!-- Sélection d'actions -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 flex-1">
                    <!-- Action principale -->
                    <div class="relative">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Action à effectuer</label>
                        <select id="batch-action-select"
                                class="w-full sm:w-48 px-4 py-3 text-sm border-2 border-[#1e6bb8]/20 rounded-xl focus:ring-2 focus:ring-[#DAA520] focus:border-[#DAA520] transition-all duration-300 bg-white shadow-sm hover:border-[#1e6bb8]/40">
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
                        <select id="status-select"
                                class="w-full sm:w-40 px-4 py-3 text-sm border-2 border-[#1e6bb8]/20 rounded-xl focus:ring-2 focus:ring-[#DAA520] focus:border-[#DAA520] transition-all duration-300 bg-white shadow-sm">
                            <option value="delivered">✅ Livré</option>
                            <option value="in_transit">🚚 En transit</option>
                            <option value="pending">⏳ En attente</option>
                        </select>
                    </div>

                    <!-- Sélection d'utilisateur (conditionnel) -->
                    <div id="user-selection" class="hidden relative">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Assigner à</label>
                        <select id="user-select"
                                class="w-full sm:w-48 px-4 py-3 text-sm border-2 border-[#1e6bb8]/20 rounded-xl focus:ring-2 focus:ring-[#DAA520] focus:border-[#DAA520] transition-all duration-300 bg-white shadow-sm">
                            <option value="">Choisir un utilisateur...</option>
                            <!-- Options à remplir dynamiquement -->
                        </select>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="flex items-center space-x-3 flex-shrink-0">
                    <button id="apply-action"
                            disabled
                            class="group relative px-6 py-3 bg-gradient-to-r from-[#1e6bb8] to-[#0077be] text-white font-semibold rounded-xl hover:from-[#0077be] hover:to-[#1e40af] focus:ring-4 focus:ring-[#1e6bb8]/30 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none disabled:shadow-none">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Appliquer</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-[#DAA520] to-[#DAA520]/80 rounded-xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    </button>

                    <button id="cancel-selection"
                            class="px-6 py-3 text-gray-700 font-medium border-2 border-gray-200 rounded-xl hover:border-gray-300 hover:bg-gray-50 focus:ring-4 focus:ring-gray-200 transition-all duration-300 shadow-sm hover:shadow-md">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            <span>Annuler</span>
                        </span>
                    </button>
                </div>
            </div>

            <!-- Barre de progression pour les actions en cours -->
            <div id="batch-progress" class="hidden mt-4">
                <div class="flex items-center space-x-3">
                    <div class="flex-1">
                        <div class="flex items-center justify-between text-xs text-gray-600 mb-1">
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

<script>
// Extension de la classe PackageManager existante
document.addEventListener('DOMContentLoaded', function() {
    // Attendre que PackageManager soit initialisé
    if (typeof initializePackageManager === 'function') {
        initializePackageManager();

        // Étendre PackageManager avec les nouvelles fonctionnalités
        if (window.packageManager) {
            extendPackageManager();
        }
    }
});

function extendPackageManager() {
    const packageManager = window.packageManager;

    // Ajouter les nouveaux éléments à la classe existante
    packageManager.elements = {
        ...packageManager.elements,
        closeBatchActions: document.getElementById('close-batch-actions'),
        selectedPackagesCount: document.getElementById('selected-packages-count'),
        batchProgress: document.getElementById('batch-progress'),
        progressBar: document.getElementById('progress-bar'),
        progressText: document.getElementById('progress-text'),
        userSelection: document.getElementById('user-selection'),
        userSelect: document.getElementById('user-select')
    };

    // Remplacer la méthode handleBatchActionChange existante
    packageManager.handleBatchActionChange = function() {
        const action = this.elements.batchActionSelect.value;

        // Masquer toutes les sélections conditionnelles
        if (this.elements.statusSelect) {
            this.elements.statusSelect.parentElement.classList.add('hidden');
        }
        if (this.elements.userSelection) {
            this.elements.userSelection.classList.add('hidden');
        }

        // Afficher la sélection appropriée
        if (action === 'status' && this.elements.statusSelect) {
            this.elements.statusSelect.parentElement.classList.remove('hidden');
        } else if (action === 'assign' && this.elements.userSelection) {
            this.elements.userSelection.classList.remove('hidden');
            this.loadUsers();
        }

        this.updateApplyButtonState();
    };

    // Remplacer la méthode updateBatchActionsVisibility existante
    packageManager.updateBatchActionsVisibility = function() {
        const checkedCount = document.querySelectorAll('.package-checkbox:checked').length;
        const hasSelection = checkedCount > 0;

        // Mettre à jour l'affichage de la barre d'actions
        if (this.elements.batchActions) {
            if (hasSelection) {
                this.showBatchActions();
            } else {
                this.hideBatchActions();
            }
        }

        // Mettre à jour les compteurs
        if (this.elements.selectedCount) {
            this.elements.selectedCount.classList.toggle('hidden', !hasSelection);
            this.elements.selectedCount.textContent = `${checkedCount} sélectionné(s)`;
        }

        if (this.elements.selectedPackagesCount) {
            this.elements.selectedPackagesCount.textContent = checkedCount;
        }

        if (this.elements.totalCount) {
            this.elements.totalCount.classList.toggle('hidden', hasSelection);
        }

        // Reset des sélections si aucun élément sélectionné
        if (!hasSelection) {
            if (this.elements.batchActionSelect) {
                this.elements.batchActionSelect.value = '';
            }
            if (this.elements.statusSelect) {
                this.elements.statusSelect.parentElement.classList.add('hidden');
            }
            if (this.elements.userSelection) {
                this.elements.userSelection.classList.add('hidden');
            }
        }

        this.updateApplyButtonState();
    };

    // Ajouter les nouvelles méthodes
    packageManager.showBatchActions = function() {
        if (!this.elements.batchActions) return;

        this.elements.batchActions.classList.remove('hidden');
        setTimeout(() => {
            this.elements.batchActions.classList.remove('translate-y-4', 'opacity-0');
            this.elements.batchActions.classList.add('translate-y-0', 'opacity-100');
        }, 10);
    };

    packageManager.hideBatchActions = function() {
        if (!this.elements.batchActions) return;

        this.elements.batchActions.classList.add('translate-y-4', 'opacity-0');
        this.elements.batchActions.classList.remove('translate-y-0', 'opacity-100');
        setTimeout(() => {
            this.elements.batchActions.classList.add('hidden');
        }, 500);
    };

    packageManager.updateApplyButtonState = function() {
        if (!this.elements.applyButton) return;

        const hasAction = this.elements.batchActionSelect ? this.elements.batchActionSelect.value !== '' : false;
        const hasSelection = document.querySelectorAll('.package-checkbox:checked').length > 0;

        this.elements.applyButton.disabled = !(hasAction && hasSelection);
    };

    packageManager.loadUsers = async function() {
        if (!this.elements.userSelect) return;

        try {
            const response = await fetch('/admin/users/list', {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) throw new Error('Erreur lors du chargement des utilisateurs');

            const users = await response.json();

            this.elements.userSelect.innerHTML = '<option value="">Choisir un utilisateur...</option>';

            users.forEach(user => {
                const option = document.createElement('option');
                option.value = user.id;
                option.textContent = `${user.name} (${user.email})`;
                this.elements.userSelect.appendChild(option);
            });
        } catch (error) {
            console.error('Erreur lors du chargement des utilisateurs:', error);
            this.showNotification('Erreur lors du chargement des utilisateurs', 'error');
        }
    };

    packageManager.showProgress = function() {
        if (!this.elements.batchProgress) return;

        this.elements.batchProgress.classList.remove('hidden');
        this.animateProgress();
    };

    packageManager.hideProgress = function() {
        if (!this.elements.batchProgress) return;

        this.elements.batchProgress.classList.add('hidden');
        if (this.elements.progressBar) {
            this.elements.progressBar.style.width = '0%';
        }
        if (this.elements.progressText) {
            this.elements.progressText.textContent = '0%';
        }
    };

    packageManager.animateProgress = function() {
        if (!this.elements.progressBar || !this.elements.progressText) return;

        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress >= 90) {
                progress = 90;
                clearInterval(interval);
            }
            this.elements.progressBar.style.width = progress + '%';
            this.elements.progressText.textContent = Math.round(progress) + '%';
        }, 200);

        // Stocker l'interval pour pouvoir l'arrêter
        this.progressInterval = interval;
    };

    // Remplacer la méthode handleBatchAction existante
    packageManager.handleBatchAction = async function() {
        const checkedBoxes = document.querySelectorAll('.package-checkbox:checked');
        const selectedIds = Array.from(checkedBoxes).map(cb => cb.value);

        if (selectedIds.length === 0) {
            this.showNotification('Aucun colis sélectionné', 'error');
            return;
        }

        const action = this.elements.batchActionSelect.value;
        if (!action) {
            this.showNotification('Veuillez sélectionner une action', 'error');
            return;
        }

        // Validation spécifique pour l'assignation
        if (action === 'assign' && (!this.elements.userSelect.value)) {
            this.showNotification('Veuillez sélectionner un utilisateur', 'error');
            return;
        }

        const confirmMessage = this.getBatchActionConfirmMessage(selectedIds, action);
        const confirmed = await this.showConfirmDialog(confirmMessage);

        if (confirmed) {
            this.showProgress();

            try {
                const result = await this.executeBatchAction(selectedIds, action);

                // Finaliser la barre de progression
                if (this.elements.progressBar && this.elements.progressText) {
                    this.elements.progressBar.style.width = '100%';
                    this.elements.progressText.textContent = '100%';
                }

                setTimeout(() => {
                    this.hideProgress();
                    this.showNotification(result.message || 'Action effectuée avec succès', 'success');

                    // Gérer les différentes actions
                    this.handleActionResult(action, selectedIds, result);

                    // Reset de la sélection
                    this.handleCancelSelection();
                }, 1000);

            } catch (error) {
                this.hideProgress();
                this.showNotification(error.message || 'Erreur lors de l\'exécution de l\'action', 'error');
            }
        }
    };

    packageManager.handleActionResult = function(action, selectedIds, result) {
        if (action === 'delete') {
            // Supprimer les lignes du DOM
            selectedIds.forEach(id => {
                const row = document.getElementById(`package-row-${id}`);
                if (row) {
                    row.style.transition = 'all 0.5s ease';
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(20px)';
                    setTimeout(() => {
                        row.remove();
                        this.updateCountAfterDeletion();
                    }, 500);
                }
            });
        } else if (action === 'status') {
            // Mettre à jour le statut dans le DOM
            const newStatus = this.elements.statusSelect.value;
            const statusText = this.elements.statusSelect.options[this.elements.statusSelect.selectedIndex].text;

            selectedIds.forEach(id => {
                const row = document.getElementById(`package-row-${id}`);
                if (row) {
                    const statusCell = row.querySelector('td:nth-child(4)');
                    if (statusCell) {
                        // Créer le nouveau badge de statut avec les styles DSF
                        let statusClass = 'bg-gray-100 text-gray-800 border-gray-200';
                        let icon = '⏳';

                        if (newStatus === 'delivered') {
                            statusClass = 'bg-emerald-100 text-emerald-800 border-emerald-200';
                            icon = '✅';
                        } else if (newStatus === 'in_transit') {
                            statusClass = 'bg-[#DAA520]/10 text-[#DAA520] border-[#DAA520]/20';
                            icon = '🚚';
                        }

                        statusCell.innerHTML = `
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium ${statusClass} border shadow-sm">
                                ${icon} ${statusText}
                            </span>
                        `;
                    }
                }
            });
        } else if (action === 'export') {
            // Gérer le téléchargement si un fichier est retourné
            if (result.download_url) {
                window.open(result.download_url, '_blank');
            }
        } else if (action === 'print') {
            // Gérer l'impression multiple
            if (result.print_urls) {
                result.print_urls.forEach(url => {
                    window.open(url, '_blank');
                });
            }
        }
    };

    // Remplacer la méthode executeBatchAction pour inclure les nouvelles actions
    const originalExecuteBatchAction = packageManager.executeBatchAction;
    packageManager.executeBatchAction = async function(selectedIds, action) {
        const formData = new FormData();
        selectedIds.forEach(id => formData.append('ids[]', id));
        formData.append('action', action);

        // Ajouter des données spécifiques selon l'action
        if (action === 'status') {
            formData.append('status', this.elements.statusSelect.value);
        } else if (action === 'assign') {
            formData.append('user_id', this.elements.userSelect.value);
        }

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
        if (!csrfToken) {
            throw new Error('CSRF token not found');
        }

        const response = await fetch('/admin/packages/batch-action', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        });

        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            throw new Error(errorData.message || 'Erreur lors de l\'exécution de l\'action groupée');
        }

        const data = await response.json();
        if (!data.success) {
            throw new Error(data.message || 'Une erreur est survenue');
        }

        return data;
    };

    // Ajouter les event listeners pour les nouveaux éléments
    if (packageManager.elements.closeBatchActions) {
        packageManager.elements.closeBatchActions.addEventListener('click', () => {
            packageManager.handleCancelSelection();
        });
    }

    // Re-setup les event listeners existants pour les mettre à jour
    if (packageManager.elements.batchActionSelect) {
        // Supprimer les anciens listeners et ajouter les nouveaux
        packageManager.elements.batchActionSelect.removeEventListener('change', packageManager.handleBatchActionChange);
        packageManager.elements.batchActionSelect.addEventListener('change', () => packageManager.handleBatchActionChange());
    }

    if (packageManager.elements.applyButton) {
        packageManager.elements.applyButton.removeEventListener('click', packageManager.handleBatchAction);
        packageManager.elements.applyButton.addEventListener('click', () => packageManager.handleBatchAction());
    }

    // Initialiser l'état du bouton
    packageManager.updateApplyButtonState();
}
</script>
