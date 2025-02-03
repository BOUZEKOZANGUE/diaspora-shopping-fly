<!-- Table Container -->
<div class="overflow-x-auto bg-white rounded-xl shadow-lg border border-[#0077be]/10">
    <table class="w-full">
        <!-- Table Header -->
        <thead>
            <tr class="bg-gradient-to-r from-[#0077be]/5 to-[#005c91]/5">
                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be] tracking-wider">N° Suivi</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be] tracking-wider">Client</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be] tracking-wider">Statut</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be] tracking-wider">Destination</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be] tracking-wider">Prix</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-[#0077be] tracking-wider">Actions</th>
            </tr>
        </thead>

        <!-- Table Body -->
        <tbody class="divide-y divide-[#0077be]/10">
            @foreach($packages as $package)
                <tr class="group transition-all hover:bg-[#0077be]/5">
                    <td class="px-6 py-4 text-sm font-medium text-gray-700">{{ $package->tracking_number }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $package->user->name }}</td>
                    <td class="px-6 py-4">
                        @if($package->status === 'delivered')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="w-2 h-2 mr-2 rounded-full bg-green-400"></span>
                                Livré
                            </span>
                        @elseif($package->status === 'in_transit')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-[#0077be]/10 text-[#0077be]">
                                <span class="w-2 h-2 mr-2 rounded-full bg-[#0077be] animate-pulse"></span>
                                En transit
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-[#ffd700]/10 text-[#ffd700]">
                                <span class="w-2 h-2 mr-2 rounded-full bg-[#ffd700]"></span>
                                En attente
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ Str::limit($package->destination_address, 30) }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-700">{{ number_format($package->price, 2) }} €</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.packages.show', $package) }}"
                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-[#0077be] hover:text-[#005c91] transition-colors duration-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Détails
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
