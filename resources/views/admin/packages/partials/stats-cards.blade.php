<!-- Total Packages Card -->
<div class="bg-white rounded-xl shadow-md p-4 border border-blue-100">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500">Total Colis</p>
            <p class="text-2xl font-bold text-[#0077be]">{{ $packages->total() }}</p>
        </div>
        <div class="p-3 bg-blue-100 rounded-lg">
            <svg class="w-6 h-6 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
        </div>
    </div>
    <div class="mt-4">
        <div class="flex items-center">
            <span class="text-green-500 text-sm flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                </svg>
                +12%
            </span>
            <span class="text-gray-400 text-sm ml-2">vs mois dernier</span>
        </div>
    </div>
</div>

<!-- In Transit Card -->
<div class="bg-white rounded-xl shadow-md p-4 border border-blue-100">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500">En transit</p>
            <p class="text-2xl font-bold text-yellow-500">
                {{ $packages->where('status', 'in_transit')->count() }}
            </p>
        </div>
        <div class="p-3 bg-yellow-100 rounded-lg">
            <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>
    </div>
    <div class="mt-4">
        <div class="w-full bg-gray-200 rounded-full h-2">
            <div class="bg-yellow-500 h-2 rounded-full transition-all duration-500"
                style="width: {{ ($packages->where('status', 'in_transit')->count() / max(1, $packages->total())) * 100 }}%">
            </div>
        </div>
    </div>
</div>

<!-- Delivered Today Card -->
<div class="bg-white rounded-xl shadow-md p-4 border border-blue-100">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500">Livrés aujourd'hui</p>
            <p class="text-2xl font-bold text-green-500">
                {{ $packages->where('status', 'delivered')->where('updated_at', '>=', \Carbon\Carbon::today())->count() }}
            </p>
        </div>
        <div class="p-3 bg-green-100 rounded-lg">
            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
    </div>
    <div class="mt-4">
        <div class="flex items-center">
            <span class="text-green-500 text-sm flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                </svg>
                95%
            </span>
            <span class="text-gray-400 text-sm ml-2">taux de livraison</span>
        </div>
    </div>
</div>

<!-- Revenue Card -->
<div class="bg-white rounded-xl shadow-md p-4 border border-blue-100">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500">Revenus</p>
            <p class="text-2xl font-bold text-purple-600">
                {{ number_format($packages->sum('price'), 2) }} €
            </p>
        </div>
        <div class="p-3 bg-purple-100 rounded-lg">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
    <div class="mt-4">
        <div class="flex items-center">
            <span class="text-green-500 text-sm flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                </svg>
                +8%
            </span>
            <span class="text-gray-400 text-sm ml-2">vs hier</span>
        </div>
    </div>
</div>
