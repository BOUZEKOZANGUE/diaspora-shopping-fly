<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
            <span class="px-3 py-1 text-sm rounded-full
                {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                {{ ucfirst($user->role) }}
            </span>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- User Info -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Informations de l'utilisateur</h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd>{{ $user->email }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Téléphone</dt>
                        <dd>{{ $user->phone ?? 'Non renseigné' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Inscrit le</dt>
                        <dd>{{ $user->created_at->format('d/m/Y') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Total colis</dt>
                        <dd>{{ $user->packages->count() }}</dd>
                    </div>
                </dl>
            </div>

            <!-- User Packages -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Colis de l'utilisateur</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    N° Suivi
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Statut
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Prix
                                </th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($packages as $package)
                                <tr>
                                    <td class="px-6 py-4">{{ $package->tracking_number }}</td>
                                    <td class="px-6 py-4">{{ $package->created_at->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs rounded-full
                                            {{ $package->status === 'delivered' ? 'bg-green-100 text-green-800' :
                                               ($package->status === 'in_transit' ? 'bg-blue-100 text-blue-800' :
                                               'bg-gray-100 text-gray-800') }}">
                                            {{ $package->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">{{ number_format($package->price, 2) }} €</td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('admin.packages.show', $package) }}"
                                           class="text-indigo-600 hover:text-indigo-900">
                                            Voir
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $packages->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
