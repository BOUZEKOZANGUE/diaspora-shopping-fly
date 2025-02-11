<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-6">Mon Profil</h2>

                    <!-- Informations personnelles -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4">Informations personnelles</h3>
                        <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nom</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                                    <input type="tel" name="phone" value="{{ auth()->user()->phone }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" value="{{ auth()->user()->email }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    Mettre à jour
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Mes Colis -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Mes Colis</h3>
                        <div class="space-y-4">
                            @forelse(auth()->user()->packages as $package)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <span class="font-medium">N° de suivi: {{ $package->tracking_number }}</span>
                                            <p class="text-sm text-gray-600 mt-1">
                                                Destination: {{ $package->destination_address }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                Statut: <span class="font-medium">{{ $package->status }}</span>
                                            </p>
                                        </div>
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                                            {{ number_format($package->price, 2) }} €
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center py-4">
                                    Aucun colis enregistré pour le moment.
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
