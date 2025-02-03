<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Banner Header -->
        <div class="relative h-64 bg-gradient-to-r from-blue-500 to-[#0077be]">
            <div class="absolute inset-0 bg-black opacity-20"></div>
        </div>

        <!-- Profile Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Profile Header -->
            <div class="relative -mt-32">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="sm:flex sm:space-x-5">
                            <div class="flex-shrink-0 relative group">
                                <img class="mx-auto h-32 w-32 rounded-full border-4 border-white shadow-lg object-cover transition duration-300 group-hover:scale-105"
                                    src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
                                    alt="{{ Auth::user()->name }}" />
                                <label
                                    class="absolute bottom-2 right-2 p-1 bg-white rounded-full shadow-lg cursor-pointer transition-transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <input type="file" class="hidden" accept="image/*">
                                </label>
                            </div>
                            <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                <p class="text-sm font-medium text-gray-600">Bienvenue,</p>
                                <h1 class="text-xl font-bold text-gray-900 sm:text-2xl">{{ Auth::user()->name }}</h1>
                                <p class="text-sm font-medium text-gray-600">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-center sm:mt-0">
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#0077be] hover:bg-[#0077be] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300">
                                Modifier le profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
                <!-- Personal Information Card -->
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <h3 class="ml-3 text-lg font-medium text-gray-900">Informations personnelles</h3>
                        </div>
                        <div class="mt-5">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <!-- Security Card -->
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg class="h-6 w-6 text-[#0077be]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <h3 class="ml-3 text-lg font-medium text-gray-900">Sécurité</h3>
                        </div>
                        <div class="mt-5">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <!-- Activity Stats Card -->
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg class="h-6 w-6 text-[#0077be]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="ml-3 text-lg font-medium text-gray-900">Statistiques</h3>
                        </div>
                        <div class="mt-5 grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-sm font-medium text-gray-500">Total Commandes</p>
                                <p class="mt-2 text-3xl font-semibold text-gray-900">
                                    {{ Auth::user()->orders_count ?? 0 }}</p>
                            </div>
                            <!-- Remplacer le div de dernière connexion existant par celui-ci -->
                            <div x-data="{
                                lastLogin: '{{ Auth::user()->last_login_at }}',
                                currentTime: new Date().toLocaleTimeString('fr-FR', {
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: false
                                }),
                                formatLastLogin() {
                                    if (!this.lastLogin) {
                                        return this.currentTime;
                                    }

                                    const date = new Date(this.lastLogin);
                                    const now = new Date();
                                    const diffInSeconds = Math.floor((now - date) / 1000);

                                    // Moins d'une minute
                                    if (diffInSeconds < 60) {
                                        return 'À l\'instant';
                                    }

                                    // Moins d'une heure
                                    if (diffInSeconds < 3600) {
                                        const minutes = Math.floor(diffInSeconds / 60);
                                        return `Il y a ${minutes} minute${minutes > 1 ? 's' : ''}`;
                                    }

                                    // Moins d'un jour
                                    if (diffInSeconds < 86400) {
                                        const hours = Math.floor(diffInSeconds / 3600);
                                        return `Il y a ${hours} heure${hours > 1 ? 's' : ''}`;
                                    }

                                    // Moins d'une semaine
                                    if (diffInSeconds < 604800) {
                                        const days = Math.floor(diffInSeconds / 86400);
                                        return `Il y a ${days} jour${days > 1 ? 's' : ''}`;
                                    }

                                    // Moins d'un mois
                                    if (diffInSeconds < 2592000) {
                                        const weeks = Math.floor(diffInSeconds / 604800);
                                        return `Il y a ${weeks} semaine${weeks > 1 ? 's' : ''}`;
                                    }

                                    // Plus d'un mois
                                    const months = Math.floor(diffInSeconds / 2592000);
                                    return `Il y a ${months} mois`;
                                }
                            }" x-init="setInterval(() => {
                                currentTime = new Date().toLocaleTimeString('fr-FR', {
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: false
                                });
                                $el.querySelector('[x-text]').textContent = formatLastLogin();
                            }, 1000)"
                                class="bg-gray-50 rounded-lg p-4 transform hover:bg-gray-100 transition-all duration-300">
                                <div class="flex items-start space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mt-0.5"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-500">Dernière connexion</p>
                                        <p class="mt-1 text-sm font-medium text-gray-900" x-text="formatLastLogin()">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
