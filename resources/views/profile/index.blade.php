<!-- resources/views/profile/index.blade.php -->
<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <!-- En-tête du profil -->
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="flex items-center space-x-5">
                        <div class="flex-shrink-0">
                            <div class="relative">
                                <img class="h-16 w-16 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.Auth::user()->name }}" alt="{{ Auth::user()->name }}">
                                <span class="absolute bottom-0 right-0 block h-4 w-4 rounded-full bg-green-400 ring-2 ring-white"></span>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <h2 class="text-2xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                            <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            Modifier le profil
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <!-- Informations personnelles -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Informations personnelles</h3>
                        <div class="mt-5">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <!-- Sécurité -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Sécurité</h3>
                        <div class="mt-5">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->

            </div>

            <!-- Activité récente -->
            <div class="mt-8">
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Activité récente</h3>
                        <div class="mt-6 flow-root">
                            <ul class="-my-5 divide-y divide-gray-200">
                                <!-- Exemple d'activité -->
                                <li class="py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <p class="text-sm font-medium text-gray-900">Dernière connexion</p>
                                            <p class="text-sm text-gray-500">{{ Auth::user()->last_login_at ?? 'Jamais' }}</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
