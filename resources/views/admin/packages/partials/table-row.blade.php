<tr class="group hover:bg-blue-50 transition-colors duration-200" id="package-row-{{ $package->id }}">
    <td class="px-4 py-4">
        <input type="checkbox" name="selected_packages[]" value="{{ $package->id }}"
            class="package-checkbox rounded border-gray-300 text-[#0077be] focus:ring-[#0077be] transition-all cursor-pointer">
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center">
            <span class="font-medium text-[#0077be]">{{ $package->tracking_number }}</span>
            <button class="ml-2 text-gray-400 hover:text-[#0077be] transition-colors"
                onclick="copyToClipboard('{{ $package->tracking_number }}')">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                </svg>
            </button>
        </div>
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center">
            <div
                class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-[#0077be] font-semibold text-sm mr-3">
                {{ strtoupper(substr($package->user->name, 0, 2)) }}
            </div>
            <div>
                <p class="text-sm font-medium text-gray-900">{{ $package->user->name }}</p>
                <p class="text-sm text-gray-500">{{ $package->user->email }}</p>
            </div>
        </div>
    </td>
    <td class="px-6 py-4">
        @if ($package->status === 'delivered')
            <span class="status-badge delivered">Livré</span>
        @elseif($package->status === 'in_transit')
            <span class="status-badge in-transit">
                <span class="animate-pulse"></span>
                En transit
            </span>
        @else
            <span class="status-badge pending">En attente</span>
        @endif
    </td>
    <td class="hidden md:table-cell px-6 py-4">
        <div class="flex items-center">
            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="text-sm text-gray-600">{{ Str::limit($package->destination_address, 30) }}</span>
        </div>
    </td>
    <td class="px-6 py-4">
        <span class="text-sm font-medium text-gray-900">{{ number_format($package->price, 2) }} €</span>
    </td>
    <td class="px-6 py-4">
        <span class="text-sm text-gray-500">{{ $package->created_at->format('d/m/Y H:i') }}</span>
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center space-x-2">
            <a href="{{ route('admin.packages.show', $package) }}"
                class="group p-2 text-[#0077be] hover:bg-blue-50 rounded-lg transition-all duration-200 tooltip"
                data-tooltip="Voir les détails">
                <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </a>
            <a href="{{ route('admin.packages.edit', $package) }}"
                class="group p-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition-all duration-200 tooltip"
                data-tooltip="Modifier">
                <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </a>
            <form method="POST" action="{{ route('admin.packages.destroy', $package) }}" class="inline-block delete-form">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDelete(event, '{{ $package->id }}')"
                        class="group p-2 text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200 tooltip"
                        data-tooltip="Supprimer">
                    <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </form>
            <button type="button"
                class="group p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition-all duration-200 tooltip"
                data-tooltip="Imprimer l'étiquette" onclick="printLabel('{{ $package->id }}')">
                <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
            </button>
        </div>
    </td>
</tr>
