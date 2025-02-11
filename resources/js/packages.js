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

        this.elements.batchActionSelect?.addEventListener('change', () => this.handleBatchActionChange());
        this.elements.applyButton?.addEventListener('click', () => this.handleBatchAction());
        this.elements.cancelButton?.addEventListener('click', () => this.handleCancelSelection());
        this.elements.searchInput?.addEventListener('input', this.debounce(() => this.handleSearch(), 300));
        this.elements.filterButtons?.forEach(button => {
            button.addEventListener('click', () => this.handleFilter(button));
        });
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

        this.elements.totalCount.textContent = `${visibleCount} colis au total`;
    }

    handleFilter(button) {
        this.elements.filterButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const filterValue = button.textContent.trim().toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        let visibleCount = 0;

        rows.forEach(row => {
            const statusCell = row.querySelector('td:nth-child(4)');
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

        this.elements.totalCount.textContent = `${visibleCount} colis au total`;
    }

    handleCancelSelection() {
        const { selectAll, packageCheckboxes } = this.elements;
        selectAll.checked = false;
        selectAll.indeterminate = false;

        packageCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
            const row = checkbox.closest('tr');
            if (row) {
                row.classList.remove('bg-blue-50/50');
            }
        });

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

    async executeBatchAction(selectedIds, action) {
        const formData = new FormData();
        formData.append('ids[]', selectedIds);
        formData.append('action', action);
        if (action === 'status') {
            formData.append('status', this.elements.statusSelect.value);
        }

        const response = await fetch('/admin/packages/batch-action', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: formData
        });

        if (!response.ok) {
            throw new Error('Erreur lors de l\'exécution de l\'action groupée');
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

    // Les autres méthodes que vous aviez déjà...
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
        const checkedBoxes = document.querySelectorAll('.package-checkbox:checked');

        selectAll.checked = checkedBoxes.length === packageCheckboxes.length;
        selectAll.indeterminate = checkedBoxes.length > 0 && checkedBoxes.length < packageCheckboxes.length;
    }

    updateBatchActionsVisibility() {
        const { batchActions, selectedCount, totalCount, batchActionSelect, statusSelect } = this.elements;
        const checkedCount = document.querySelectorAll('.package-checkbox:checked').length;
        const hasSelection = checkedCount > 0;

        batchActions.classList.toggle('hidden', !hasSelection);
        selectedCount.classList.toggle('hidden', !hasSelection);
        totalCount.classList.toggle('hidden', hasSelection);

        selectedCount.textContent = `${checkedCount} sélectionné(s)`;

        if (!hasSelection) {
            batchActionSelect.value = '';
            statusSelect.classList.add('hidden');
        }
    }

    showNotification(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300 z-50 ${
            type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500'
        }`;

        toast.textContent = message;
        document.body.appendChild(toast);

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
            console.log('Response headers:', Array.from(response.headers.entries()));

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
                const row = document.getElementById(`package-row-${packageId}`);
                if (row) {
                    row.style.transition = 'all 0.5s ease';
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(20px)';
                }

                await Swal.fire({
                    title: 'Succès!',
                    text: data.message,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });

                setTimeout(() => window.location.reload(), 1500);
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
        window.packageManager.showNotification('Copié dans le presse-papier !', 'success');
    } catch (err) {
        window.packageManager.showNotification('Erreur lors de la copie', 'error');
    }
};

window.printLabel = async function(packageId) {
    try {
        window.packageManager.showNotification('Préparation de l\'étiquette...', 'info');

        const response = await fetch(`/admin/packages/${packageId}/label`, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/pdf'
            }
        });

        if (!response.ok) throw new Error('Erreur lors de la génération');

        const blob = await response.blob();
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = `label-${packageId}.pdf`;

        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);

        window.packageManager.showNotification('Étiquette générée avec succès !', 'success');
    } catch (error) {
        window.packageManager.showNotification('Erreur lors de la génération de l\'étiquette', 'error');
    }
};
