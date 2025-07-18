<!-- Pagination modernisée avec design DSF -->
<div class="px-4 py-6 bg-gradient-to-r from-gray-50/80 to-blue-50/30 border-t border-[#1e6bb8]/20 rounded-b-3xl">
    <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
        <!-- Informations de pagination -->
        <div class="flex items-center space-x-2 text-sm text-gray-600">
            <div class="flex items-center space-x-1">
                <svg class="w-4 h-4 text-[#1e6bb8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span>Affichage de</span>
            </div>
            <span class="font-semibold text-[#1e6bb8] bg-white px-2 py-1 rounded-md shadow-sm">
                {{ $packages->firstItem() ?? 0 }}
            </span>
            <span>à</span>
            <span class="font-semibold text-[#1e6bb8] bg-white px-2 py-1 rounded-md shadow-sm">
                {{ $packages->lastItem() ?? 0 }}
            </span>
            <span>sur</span>
            <span class="font-bold text-[#DAA520] bg-white px-2 py-1 rounded-md shadow-sm border border-[#DAA520]/20">
                {{ $packages->total() }}
            </span>
            <span>résultats</span>
        </div>

        <!-- Contrôles de pagination -->
        @if ($packages->hasPages())
            <div class="flex items-center space-x-2">
                {{-- Bouton Précédent --}}
                @if ($packages->onFirstPage())
                    <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-xl cursor-not-allowed">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Précédent
                    </span>
                @else
                    <a href="{{ $packages->previousPageUrl() }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-[#1e6bb8] to-[#0077be] border border-transparent rounded-xl hover:from-[#0077be] hover:to-[#1e40af] focus:ring-2 focus:ring-offset-2 focus:ring-[#1e6bb8] transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Précédent
                    </a>
                @endif

                {{-- Numéros de page --}}
                <div class="hidden sm:flex items-center space-x-1">
                    @foreach ($packages->getUrlRange(max(1, $packages->currentPage() - 2), min($packages->lastPage(), $packages->currentPage() + 2)) as $page => $url)
                        @if ($page == $packages->currentPage())
                            <span class="inline-flex items-center justify-center w-10 h-10 text-sm font-bold text-white bg-gradient-to-br from-[#DAA520] to-[#DAA520]/80 rounded-xl shadow-lg border-2 border-white">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-[#1e6bb8] bg-white border border-[#1e6bb8]/20 rounded-xl hover:bg-[#1e6bb8] hover:text-white transition-all duration-200 shadow-sm hover:shadow-md transform hover:scale-105">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                </div>

                {{-- Indicateur mobile --}}
                <div class="sm:hidden flex items-center space-x-2 px-3 py-2 bg-white rounded-xl border border-[#1e6bb8]/20 shadow-sm">
                    <span class="text-sm font-medium text-[#1e6bb8]">{{ $packages->currentPage() }}</span>
                    <span class="text-sm text-gray-500">sur</span>
                    <span class="text-sm font-medium text-[#DAA520]">{{ $packages->lastPage() }}</span>
                </div>

                {{-- Bouton Suivant --}}
                @if ($packages->hasMorePages())
                    <a href="{{ $packages->nextPageUrl() }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-[#1e6bb8] to-[#0077be] border border-transparent rounded-xl hover:from-[#0077be] hover:to-[#1e40af] focus:ring-2 focus:ring-offset-2 focus:ring-[#1e6bb8] transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Suivant
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @else
                    <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-xl cursor-not-allowed">
                        Suivant
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                @endif
            </div>
        @endif
    </div>

    {{-- Sélecteur de nombre d'éléments par page --}}
    @if ($packages->total() > 10)
        <div class="mt-4 pt-4 border-t border-[#1e6bb8]/10">
            <div class="flex flex-col sm:flex-row items-center justify-between space-y-2 sm:space-y-0">
                <div class="flex items-center space-x-3">
                    <label for="per-page" class="text-sm font-medium text-gray-700">Éléments par page :</label>
                    <select id="per-page" onchange="changePerPage(this.value)"
                            class="border border-[#1e6bb8]/20 rounded-lg px-3 py-1 text-sm focus:ring-2 focus:ring-[#1e6bb8] focus:border-[#1e6bb8] bg-white shadow-sm">
                        <option value="10" {{ request('per_page', 15) == 10 ? 'selected' : '' }}>10</option>
                        <option value="15" {{ request('per_page', 15) == 15 ? 'selected' : '' }}>15</option>
                        <option value="25" {{ request('per_page', 15) == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page', 15) == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page', 15) == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>

                {{-- Saut de page rapide --}}
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Aller à la page :</span>
                    <input type="number" min="1" max="{{ $packages->lastPage() }}"
                           value="{{ $packages->currentPage() }}"
                           onchange="goToPage(this.value)"
                           class="w-16 px-2 py-1 text-sm border border-[#1e6bb8]/20 rounded-lg focus:ring-2 focus:ring-[#1e6bb8] focus:border-[#1e6bb8] text-center shadow-sm">
                    <button onclick="goToPage(document.querySelector('input[type=number]').value)"
                            class="px-3 py-1 text-sm font-medium text-[#1e6bb8] border border-[#1e6bb8]/20 rounded-lg hover:bg-[#1e6bb8] hover:text-white transition-colors duration-200 shadow-sm">
                        Aller
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
function changePerPage(perPage) {
    const url = new URL(window.location);
    url.searchParams.set('per_page', perPage);
    url.searchParams.set('page', 1); // Reset à la première page
    window.location.href = url.toString();
}

function goToPage(page) {
    const maxPage = {{ $packages->lastPage() }};
    if (page >= 1 && page <= maxPage) {
        const url = new URL(window.location);
        url.searchParams.set('page', page);
        window.location.href = url.toString();
    }
}
</script>
