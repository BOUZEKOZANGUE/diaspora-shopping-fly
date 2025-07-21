<button id="export-btn" class="inline-flex items-center px-4 py-2 bg-green-500 text-white font-semibold rounded-xl shadow-lg hover:bg-green-600 transform hover:scale-105 transition-all duration-300">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
    </svg>
    Exporter
</button>
<a href="{{ route('admin.shipments.create') }}" class="inline-flex items-center px-4 py-2 bg-yellow-400 text-blue-800 font-semibold rounded-xl shadow-lg hover:bg-yellow-300 transform hover:scale-105 transition-all duration-300">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    Nouveau client
</a>
<a href="{{ route('admin.shipments.create-existing') }}" class="inline-flex items-center px-4 py-2 bg-yellow-400 text-blue-800 font-semibold rounded-xl shadow-lg hover:bg-yellow-300 transform hover:scale-105 transition-all duration-300">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    Nouveau colis
</a>
