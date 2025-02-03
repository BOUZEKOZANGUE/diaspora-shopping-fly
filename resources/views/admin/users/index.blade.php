<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Gestion des Utilisateurs</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Nom
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Email
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Rôle
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Colis
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Total dépensé
                                    </th>
                                    <th class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-6 py-4">{{ $user->name }}</td>
                                        <td class="px-6 py-4">{{ $user->email }}</td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('admin.users.update', $user) }}"
                                                  method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <select name="role" onchange="this.form.submit()"
                                                        class="text-sm border-gray-300 rounded-md">
                                                    <option value="user" @selected($user->role === 'user')>
                                                        Utilisateur
                                                    </option>
                                                    <option value="admin" @selected($user->role === 'admin')>
                                                        Admin
                                                    </option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="px-6 py-4">{{ $user->packages_count }}</td>
                                        <td class="px-6 py-4">
                                            {{ number_format($user->packages_sum_price ?? 0, 2) }} €
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{ route('admin.users.show', $user) }}"
                                               class="text-indigo-600 hover:text-indigo-900">
                                                Détails
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
