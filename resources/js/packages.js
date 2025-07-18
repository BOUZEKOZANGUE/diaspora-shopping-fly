document.addEventListener('DOMContentLoaded', function() {
    initializePackageManager();
});

class PackageManager {
    constructor() {
        this.initializeElements();
        this.setupEventListeners();
    }

    initializeElements() {
        this.elements = {
            selectAll: document.getElementById('select-all'),
            packageCheckboxes: document.querySelectorAll('.package-checkbox'),
            batchActions: document.getElementById('batch-actions'),
            selectedCount: document.getElementById('selected-count'),
            totalCount: document.getElementById('total-count'),
            batchActionSelect: document.getElementById('batch-action-select'),
            statusSelect: document.getElementById('status-select'),
            applyButton: document.getElementById('apply-action'),
            cancelButton: document.getElementById('cancel-selection'),
            searchInput: document.getElementById('table-search'),
            filterButtons: document.querySelectorAll('.filter-btn'),

            // Nouveaux éléments DSF
            closeBatchActions: document.getElementById('close-batch-actions'),
            selectedPackagesCount: document.getElementById('selected-packages-count'),
            batchProgress: document.getElementById('batch-progress'),
            progressBar: document.getElementById('progress-bar'),
            progressText: document.getElementById('progress-text'),
            statusSelection: document.getElementById('status-selection'),
            userSelection: document.getElementById('user-selection'),
            userSelect: document.getElementById('user-select')
        };
    }

    setupEventListeners() {
        if (this.elements.selectAll) {
            this.elements.selectAll.addEventListener('change', () => this.handleSelectAll());
        }

        this.elements.packageCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => this.handleCheckboxChange(checkbox));
        });

        if (this.elements.batchActionSelect) {
            this.elements.batchActionSelect.addEventListener('change', () => this.handleBatchActionChange());
        }

        if (this.elements.applyButton) {
            this.elements.applyButton.addEventListener('click', () => this.handleBatchAction());
        }

        if (this.elements.cancelButton) {
            this.elements.cancelButton.addEventListener('click', () => this.handleCancelSelection());
        }

        if (this.elements.closeBatchActions) {
            this.elements.closeBatchActions.addEventListener('click', () => this.handleCancelSelection());
        }

        if (this.elements.searchInput) {
            this.elements.searchInput.addEventListener('input', this.debounce(() => this.handleSearch(), 300));
        }

        if (this.elements.filterButtons) {
            this.elements.filterButtons.forEach(button => {
                button.addEventListener('click', () => this.handleFilter(button));
            });
        }
    }

    handleBatchActionChange() {
        const action = this.elements.batchActionSelect.value;

        // Masquer toutes les sélections conditionnelles
        if (this.elements.statusSelection) {
            this.elements.statusSelection.classList.add('hidden');
        }
        if (this.elements.userSelection) {
            this.elements.userSelection.classList.add('hidden');
        }

        // Support de l'ancien système avec statusSelect direct
        if (this.elements.statusSelect && !this.elements.statusSelection) {
            this.elements.statusSelect.classList.toggle('hidden', action !== 'status');
        }

        // Afficher la sélection appropriée pour le nouveau système
        if (action === 'status' && this.elements.statusSelection) {
            this.elements.statusSelection.classList.remove('hidden');
        } else if (action === 'assign' && this.elements.userSelection) {
            this.elements.userSelection.classList.remove('hidden');
            this.loadUsers();
        }

        this.updateApplyButtonState();
    }

    handleSearch() {
        const searchTerm = this.elements.searchInput.value.toLowerCase().trim();
        const rows = document.querySelectorAll('tbody tr');
        let visibleCount = 0;

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const match = text.includes(searchTerm);

            row.style.transition = 'all 0.3s ease';

            if (match) {
                row.style.display = '';
                row.style.opacity = '1';
                visibleCount++;
            } else {
                row.style.opacity = '0';
                setTimeout(() => {
                    row.style.display = 'none';
                }, 300);
            }
        });

        this.updateTotalCount(visibleCount);
    }

    handleFilter(button) {
        this.elements.filterButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const filterValue = button.textContent.trim().toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        let visibleCount = 0;

        rows.forEach(row => {
            const statusCell = row.querySelector('td:nth-child(4)');
            if (!statusCell) return;

            const statusText = statusCell.textContent.trim().toLowerCase();

            if (filterValue === 'tous' || statusText.includes(filterValue)) {
                row.style.display = '';
                setTimeout(() => row.style.opacity = '1', 10);
                visibleCount++;
            } else {
                row.style.opacity = '0';
                setTimeout(() => row.style.display = 'none', 300);
            }
        });

        this.updateTotalCount(visibleCount);
    }

    updateTotalCount(count) {
        if (this.elements.totalCount) {
            this.elements.totalCount.textContent = `${count} colis au total`;
        }
    }

    handleCancelSelection() {
        const { selectAll, packageCheckboxes } = this.elements;
        if (selectAll) {
            selectAll.checked = false;
            selectAll.indeterminate = false;
        }

        if (packageCheckboxes) {
            packageCheckboxes.forEach(checkbox => {
                checkbox.checked = false;
                const row = checkbox.closest('tr');
                if (row) {
                    row.classList.remove('bg-blue-50/50', 'bg-gradient-to-r', 'from-[#1e6bb8]/5', 'to-[#0077be]/5');
                }
            });
        }

        // Reset des sélections
        if (this.elements.batchActionSelect) {
            this.elements.batchActionSelect.value = '';
        }
        if (this.elements.statusSelection) {
            this.elements.statusSelection.classList.add('hidden');
        }
        if (this.elements.userSelection) {
            this.elements.userSelection.classList.add('hidden');
        }
        if (this.elements.statusSelect) {
            this.elements.statusSelect.classList.add('hidden');
        }

        this.updateBatchActionsVisibility();
    }

    getBatchActionConfirmMessage(selectedIds, action) {
        switch (action) {
            case 'status':
                const statusElement = this.elements.statusSelect || document.getElementById('status-select');
                if (statusElement) {
                    const statusText = statusElement.options[statusElement.selectedIndex].text;
                    return `Modifier le statut de ${selectedIds.length} colis en "${statusText}" ?`;
                }
                return `Modifier le statut de ${selectedIds.length} colis ?`;
            case 'delete':
                return `⚠️ ATTENTION : Vous allez supprimer définitivement ${selectedIds.length} colis. Cette action est irréversible !`;
            case 'export':
                return `Exporter ${selectedIds.length} colis sélectionnés ?`;
            case 'print':
                return `Imprimer les étiquettes pour ${selectedIds.length} colis ?`;
            case 'assign':
                return `Assigner ${selectedIds.length} colis à l'utilisateur sélectionné ?`;
            default:
                return 'Êtes-vous sûr de vouloir effectuer cette action ?';
        }
    }

    async handleBatchAction() {
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
        if (action === 'assign' && this.elements.userSelect && !this.elements.userSelect.value) {
            this.showNotification('Veuillez sélectionner un utilisateur', 'error');
            return;
        }

        const confirmMessage = this.getBatchActionConfirmMessage(selectedIds, action);
        const confirmed = await this.showConfirmDialog(confirmMessage, action);

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
    }

    handleActionResult(action, selectedIds, result) {
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
            const statusElement = this.elements.statusSelect || document.getElementById('status-select');
            if (statusElement) {
                const newStatus = statusElement.value;
                const statusText = statusElement.options[statusElement.selectedIndex].text;

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
            }
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
    }

    updateCountAfterDeletion() {
        const remainingRows = document.querySelectorAll('tbody tr').length;
        this.updateTotalCount(remainingRows);
    }

    async executeBatchAction(selectedIds, action) {
        const formData = new FormData();
        selectedIds.forEach(id => formData.append('ids[]', id));
        formData.append('action', action);

        // Ajouter des données spécifiques selon l'action
        if (action === 'status') {
            const statusElement = this.elements.statusSelect || document.getElementById('status-select');
            if (statusElement) {
                formData.append('status', statusElement.value);
            }
        } else if (action === 'assign' && this.elements.userSelect) {
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
    }

    async showConfirmDialog(message, action = '') {
        const result = await Swal.fire({
            title: 'Confirmation',
            text: message,
            icon: action === 'delete' ? 'warning' : 'question',
            showCancelButton: true,
            confirmButtonColor: action === 'delete' ? '#dc2626' : '#1e6bb8',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Confirmer',
            cancelButtonText: 'Annuler'
        });

        return result.isConfirmed;
    }

    handleSelectAll() {
        const { packageCheckboxes } = this.elements;
        const isChecked = this.elements.selectAll.checked;

        packageCheckboxes.forEach(checkbox => {
            checkbox.checked = isChecked;
            const row = checkbox.closest('tr');
            if (row) {
                if (isChecked) {
                    row.classList.add('bg-gradient-to-r', 'from-[#1e6bb8]/5', 'to-[#0077be]/5');
                } else {
                    row.classList.remove('bg-gradient-to-r', 'from-[#1e6bb8]/5', 'to-[#0077be]/5', 'bg-blue-50/50');
                }
            }
        });

        this.updateBatchActionsVisibility();
    }

    handleCheckboxChange(checkbox) {
        const row = checkbox.closest('tr');
        if (row) {
            if (checkbox.checked) {
                row.classList.add('bg-gradient-to-r', 'from-[#1e6bb8]/5', 'to-[#0077be]/5');
            } else {
                row.classList.remove('bg-gradient-to-r', 'from-[#1e6bb8]/5', 'to-[#0077be]/5', 'bg-blue-50/50');
            }
        }

        this.updateBatchActionsVisibility();
        this.updateSelectAllState();
    }

    updateSelectAllState() {
        const { selectAll, packageCheckboxes } = this.elements;
        if (!selectAll) return;

        const checkedBoxes = document.querySelectorAll('.package-checkbox:checked');

        selectAll.checked = checkedBoxes.length === packageCheckboxes.length && packageCheckboxes.length > 0;
        selectAll.indeterminate = checkedBoxes.length > 0 && checkedBoxes.length < packageCheckboxes.length;
    }

    updateBatchActionsVisibility() {
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
            if (this.elements.statusSelection) {
                this.elements.statusSelection.classList.add('hidden');
            }
            if (this.elements.userSelection) {
                this.elements.userSelection.classList.add('hidden');
            }
            if (this.elements.statusSelect) {
                this.elements.statusSelect.classList.add('hidden');
            }
        }

        this.updateApplyButtonState();
    }

    // Nouvelles méthodes pour la barre d'actions DSF
    showBatchActions() {
        if (!this.elements.batchActions) return;

        this.elements.batchActions.classList.remove('hidden');
        setTimeout(() => {
            this.elements.batchActions.classList.remove('translate-y-4', 'opacity-0');
            this.elements.batchActions.classList.add('translate-y-0', 'opacity-100');
        }, 10);
    }

    hideBatchActions() {
        if (!this.elements.batchActions) return;

        this.elements.batchActions.classList.add('translate-y-4', 'opacity-0');
        this.elements.batchActions.classList.remove('translate-y-0', 'opacity-100');
        setTimeout(() => {
            this.elements.batchActions.classList.add('hidden');
        }, 500);
    }

    updateApplyButtonState() {
        if (!this.elements.applyButton) return;

        const hasAction = this.elements.batchActionSelect ? this.elements.batchActionSelect.value !== '' : false;
        const hasSelection = document.querySelectorAll('.package-checkbox:checked').length > 0;

        this.elements.applyButton.disabled = !(hasAction && hasSelection);
    }

    async loadUsers() {
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
    }

    showProgress() {
        if (!this.elements.batchProgress) return;

        this.elements.batchProgress.classList.remove('hidden');
        this.animateProgress();
    }

    hideProgress() {
        if (!this.elements.batchProgress) return;

        this.elements.batchProgress.classList.add('hidden');
        if (this.elements.progressBar) {
            this.elements.progressBar.style.width = '0%';
        }
        if (this.elements.progressText) {
            this.elements.progressText.textContent = '0%';
        }

        // Clear interval si existe
        if (this.progressInterval) {
            clearInterval(this.progressInterval);
        }
    }

    animateProgress() {
        if (!this.elements.progressBar || !this.elements.progressText) return;

        let progress = 0;
        this.progressInterval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress >= 90) {
                progress = 90;
                clearInterval(this.progressInterval);
            }
            this.elements.progressBar.style.width = progress + '%';
            this.elements.progressText.textContent = Math.round(progress) + '%';
        }, 200);
    }

    showNotification(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300 z-50 ${
            type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500'
        }`;
        toast.style.transform = 'translateY(100%)';

        toast.textContent = message;
        document.body.appendChild(toast);

        // Force reflow
        toast.getBoundingClientRect();

        requestAnimationFrame(() => {
            toast.style.transform = 'translateY(0)';
        });

        setTimeout(() => {
            toast.style.transform = 'translateY(100%)';
            setTimeout(() => {
                if (document.body.contains(toast)) {
                    document.body.removeChild(toast);
                }
            }, 300);
        }, 3000);
    }

    debounce(func, wait) {
        let timeout;
        return (...args) => {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }
}

// Initialisation
function initializePackageManager() {
    window.packageManager = new PackageManager();
}

// Méthodes globales
window.confirmDelete = async function(event, packageId) {
    event.preventDefault();

    try {
        const result = await Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Cette action est irréversible !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler'
        });

        if (result.isConfirmed) {
            const form = event.target.closest('form');
            if (!form) return;

            // Récupérer le token CSRF
            const token = document.querySelector('meta[name="csrf-token"]').content;
            if (!token) {
                throw new Error('CSRF token not found');
            }

            // Faire la requête avec fetch
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _method: 'DELETE',
                    _token: token
                })
            });

            let data;
            try {
                data = await response.json();
            } catch (error) {
                console.error('Erreur parsing JSON:', error);
                const text = await response.text();
                console.log('Response text:', text);
                throw new Error('Réponse invalide du serveur');
            }

            if (data.success) {
                // Trouver et supprimer la ligne du tableau directement
                const row = document.getElementById(`package-row-${packageId}`);
                if (row) {
                    row.style.transition = 'all 0.5s ease';
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(20px)';

                    // Supprimer l'élément du DOM après l'animation
                    setTimeout(() => {
                        row.remove();

                        // Mettre à jour le compteur
                        if (window.packageManager) {
                            window.packageManager.updateCountAfterDeletion();
                        }
                    }, 500);
                }

                // Afficher un message de succès
                await Swal.fire({
                    title: 'Succès!',
                    text: data.message || 'Colis supprimé avec succès',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            } else {
                throw new Error(data.message || 'Erreur lors de la suppression');
            }
        }
    } catch (error) {
        console.error('Erreur complète:', error);
        await Swal.fire({
            title: 'Erreur!',
            text: error.message || 'Une erreur est survenue lors de la suppression',
            icon: 'error'
        });
    }
};

window.copyToClipboard = async function(text) {
    try {
        await navigator.clipboard.writeText(text);
        if (window.packageManager) {
            window.packageManager.showNotification('Copié dans le presse-papier !', 'success');
        }
    } catch (err) {
        console.error('Erreur lors de la copie:', err);
        if (window.packageManager) {
            window.packageManager.showNotification('Erreur lors de la copie', 'error');
        }
    }
};

window.printLabel = async function(packageId) {
    try {
        if (window.packageManager) {
            window.packageManager.showNotification('Préparation de l\'étiquette...', 'info');
        }

        const token = document.querySelector('meta[name="csrf-token"]').content;
        if (!token) {
            throw new Error('CSRF token not found');
        }

        const response = await fetch(`/admin/packages/${packageId}/label`, {
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/pdf'
            }
        });

        if (!response.ok) {
            const errorText = await response.text();
            console.error('Error response:', errorText);
            throw new Error('Erreur lors de la génération');
        }

        const blob = await response.blob();
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = `label-${packageId}.pdf`;

        document.body.appendChild(a);
        a.click();

        // Cleanup
        setTimeout(() => {
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        }, 100);

        if (window.packageManager) {
            window.packageManager.showNotification('Étiquette générée avec succès !', 'success');
        }
    } catch (error) {
        console.error('Erreur lors de la génération de l\'étiquette:', error);
        if (window.packageManager) {
            window.packageManager.showNotification('Erreur lors de la génération de l\'étiquette', 'error');
        }
    }
};
