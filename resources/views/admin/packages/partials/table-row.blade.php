<tr class="group hover:bg-gradient-to-r hover:from-[#1e6bb8]/5 hover:to-[#0077be]/5 transition-all duration-300 border-b border-[#1e6bb8]/10" id="package-row-{{ $package->id }}">
    <!-- Checkbox -->
    <td class="px-4 py-5">
        <div class="flex items-center justify-center">
            <input type="checkbox" name="selected_packages[]" value="{{ $package->id }}"
                class="package-checkbox w-5 h-5 rounded-md border-2 border-[#1e6bb8]/30 text-[#DAA520] focus:ring-[#DAA520] focus:ring-2 focus:ring-offset-1 transition-all duration-200 cursor-pointer hover:border-[#DAA520]">
        </div>
    </td>

    <!-- Numéro de suivi -->
    <td class="px-6 py-5">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 bg-gradient-to-br from-[#1e6bb8] to-[#0077be] rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center space-x-2">
                    <span class="font-semibold text-[#1e6bb8] text-sm tracking-wide">{{ $package->tracking_number }}</span>
                    <button type="button" class="text-gray-400 hover:text-[#DAA520] transition-colors duration-200 p-1 rounded-md hover:bg-[#DAA520]/10"
                        onclick="copyToClipboard('{{ $package->tracking_number }}')" title="Copier le numéro">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </td>

    <!-- Client -->
    <td class="px-6 py-5">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0">
                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-[#DAA520] to-[#DAA520]/80 flex items-center justify-center shadow-md">
                    <span class="text-white font-bold text-sm">{{ strtoupper(substr($package->user->name ?? 'U', 0, 2)) }}</span>
                </div>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 truncate">{{ $package->user->name ?? 'Utilisateur inconnu' }}</p>
                <p class="text-xs text-gray-500 truncate">{{ $package->user->email ?? 'Email non disponible' }}</p>
            </div>
        </div>
    </td>

    <!-- Statut avec design amélioré -->
    <td class="px-6 py-5">
        <div class="flex items-center">
            @switch($package->status)
                @case('delivered')
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200 shadow-sm">
                        <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Livré
                    </span>
                    @break
                @case('in_transit')
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-[#DAA520]/10 text-[#DAA520] border border-[#DAA520]/20 shadow-sm text-nowrap">
                        <div class="w-2 h-2 bg-[#DAA520] rounded-full mr-1.5 animate-pulse"></div>
                        En transit
                    </span>
                    @break
                @default
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200 shadow-sm">
                        <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-gray-500 text-nowrap">En attente</span>

                    </span>
            @endswitch
        </div>
    </td>

    <!-- Destination -->
    <td class="hidden md:table-cell px-6 py-5">
        <div class="flex items-center space-x-2">
            <div class="flex-shrink-0">
                <svg class="w-4 h-4 text-[#1e6bb8]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <span class="text-sm text-gray-600 truncate max-w-xs" title="{{ $package->destination_address ?? 'Non spécifiée' }}">
                {{ Str::limit($package->destination_address ?? 'Non spécifiée', 30) }}
            </span>
        </div>
    </td>

    <!-- Prix -->
    <td class="px-6 py-5">
        <div class="flex items-center space-x-1">
            <span class="text-sm font-bold text-[#1e6bb8]">{{ number_format($package->price ?? 0, 2) }}</span>
            <span class="text-xs text-gray-500">€</span>
        </div>
    </td>

    <!-- Date de création -->
    <td class="px-6 py-5">
        <div class="flex flex-col">
            <span class="text-sm text-gray-700 font-medium">{{ $package->created_at ? $package->created_at->format('d/m/Y') : 'N/A' }}</span>
            <span class="text-xs text-gray-500">{{ $package->created_at ? $package->created_at->format('H:i') : '' }}</span>
        </div>
    </td>

    <!-- Actions redesignées -->
    <td class="px-6 py-5">
        <div class="flex items-center justify-center space-x-1">
            <!-- Voir -->
            @if(isset($package->id))
                <a href="{{ route('admin.packages.show', $package->id) }}"
                    class="group relative p-2 text-[#1e6bb8] hover:bg-[#1e6bb8]/10 rounded-xl transition-all duration-200 hover:shadow-md hover:scale-105"
                    title="Voir les détails">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </a>

                <!-- Modifier -->
                <a href="{{ route('admin.packages.edit', $package->id) }}"
                    class="group relative p-2 text-[#DAA520] hover:bg-[#DAA520]/10 rounded-xl transition-all duration-200 hover:shadow-md hover:scale-105"
                    title="Modifier">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>

                <!-- Supprimer -->
                <form method="POST" action="{{ route('admin.packages.destroy', $package->id) }}" class="inline-block delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete(event, '{{ $package->id }}')"
                            class="group relative p-2 text-red-500 hover:bg-red-50 rounded-xl transition-all duration-200 hover:shadow-md hover:scale-105"
                            title="Supprimer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </form>

                <!-- Imprimer étiquette -->
                <button type="button"
                    class="group relative p-2 text-purple-600 hover:bg-purple-50 rounded-xl transition-all duration-200 hover:shadow-md hover:scale-105"
                    title="Imprimer l'étiquette" onclick="printLabel('{{ $package->id }}')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                </button>
            @endif
        </div>
    </td>
</tr>
