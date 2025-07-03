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
        const { statusSelect } = this.elements;
        const showStatus = this.elements.batchActionSelect.value === 'status';
        statusSelect.classList.toggle('hidden', !showStatus);
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
                    row.classList.remove('bg-blue-50/50');
                }
            });
        }

        this.updateBatchActionsVisibility();
    }

    getBatchActionConfirmMessage(selectedIds, action) {
        switch (action) {
            case 'status':
                const statusText = this.elements.statusSelect.options[this.elements.statusSelect.selectedIndex].text;
                return `Modifier le statut de ${selectedIds.length} colis en "${statusText}" ?`;
            case 'delete':
                return `Supprimer ${selectedIds.length} colis ?`;
            case 'export':
                return `Exporter ${selectedIds.length} colis ?`;
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

        const confirmMessage = this.getBatchActionConfirmMessage(selectedIds, action);
        const confirmed = await this.showConfirmDialog(confirmMessage);

        if (confirmed) {
            try {
                const result = await this.executeBatchAction(selectedIds, action);
                this.showNotification(result.message || 'Action effectuée avec succès', 'success');

                // Handle different actions
                if (action === 'delete') {
                    // Remove rows from DOM instead of reloading
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
                    // Update status in the DOM
                    const newStatus = this.elements.statusSelect.value;
                    const statusText = this.elements.statusSelect.options[this.elements.statusSelect.selectedIndex].text;

                    selectedIds.forEach(id => {
                        const row = document.getElementById(`package-row-${id}`);
                        if (row) {
                            const statusCell = row.querySelector('td:nth-child(4)');
                            if (statusCell) {
                                statusCell.innerHTML = `<span class="status-badge status-${newStatus}">${statusText}</span>`;
                            }
                        }
                    });
                }

                // Reset selection
                this.handleCancelSelection();
            } catch (error) {
                this.showNotification(error.message || 'Erreur lors de l\'exécution de l\'action', 'error');
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
        if (action === 'status') {
            formData.append('status', this.elements.statusSelect.value);
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

    async showConfirmDialog(message) {
        const result = await Swal.fire({
            title: 'Confirmation',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
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
            if (row) row.classList.toggle('bg-blue-50/50', isChecked);
        });

        this.updateBatchActionsVisibility();
    }

    handleCheckboxChange(checkbox) {
        const row = checkbox.closest('tr');
        if (row) row.classList.toggle('bg-blue-50/50', checkbox.checked);

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
        const { batchActions, selectedCount, totalCount } = this.elements;
        const checkedCount = document.querySelectorAll('.package-checkbox:checked').length;
        const hasSelection = checkedCount > 0;

        if (batchActions) {
            batchActions.classList.toggle('hidden', !hasSelection);
        }

        if (selectedCount) {
            selectedCount.classList.toggle('hidden', !hasSelection);
            selectedCount.textContent = `${checkedCount} sélectionné(s)`;
        }

        if (totalCount) {
            totalCount.classList.toggle('hidden', hasSelection);
        }

        if (!hasSelection && this.elements.batchActionSelect) {
            this.elements.batchActionSelect.value = '';
            if (this.elements.statusSelect) {
                this.elements.statusSelect.classList.add('hidden');
            }
        }
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
                document.body.removeChild(toast);
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

            // Log pour debug
            console.log('Response status:', response.status);

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

                // Ne pas recharger la page
                // Supprimé: setTimeout(() => window.location.reload(), 1500);
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
