<div id="batch-actions" class="hidden max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <div class="bg-white rounded-xl shadow-md p-4 flex items-center justify-between border border-blue-100">
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-600">Actions groupées :</span>
            <select id="batch-action-select"
                class="text-sm border-gray-200 rounded-lg focus:ring-[#0077be] focus:border-[#0077be] transition-all duration-300">
                <option value="">Sélectionner une action</option>
                <option value="status">Changer le statut</option>
                <option value="delete">Supprimer</option>
                <option value="export">Exporter</option>
            </select>
            <select id="status-select"
                class="hidden text-sm border-gray-200 rounded-lg focus:ring-[#0077be] focus:border-[#0077be] transition-all duration-300">
                <option value="delivered">Livré</option>
                <option value="in_transit">En transit</option>
                <option value="pending">En attente</option>
            </select>
        </div>
        <div class="flex items-center space-x-4">
            <button id="apply-action"
                class="px-4 py-2 bg-[#0077be] text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors duration-300">
                Appliquer
            </button>
            <button id="cancel-selection"
                class="px-4 py-2 text-gray-600 text-sm font-medium hover:text-gray-800 transition-colors duration-300">
                Annuler
            </button>
        </div>
    </div>
</div>
