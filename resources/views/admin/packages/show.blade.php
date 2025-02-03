<x-app-layout>
    <!-- En-tête avec effet parallaxe -->
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-r from-[#0077be] to-[#005c91] text-white rounded-2xl shadow-lg p-8">
            <div class="absolute inset-0 bg-grid-white/[0.05] bg-[size:20px_20px]"></div>
            <div class="relative flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="animate-fade-in">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-white/10 rounded-xl">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-3xl md:text-4xl font-bold">
                                #{{ $package->tracking_number }}
                            </h2>
                            <p class="text-white/70 font-medium">Détails du colis</p>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-4 animate-fade-in">
                    <button onclick="history.back()" class="group px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg transition-all duration-300 flex items-center space-x-2">
                        <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Retour</span>
                    </button>
                    <button onclick="window.location='{{ route('admin.packages.edit', $package) }}'"
                        class="group px-6 py-2.5 bg-[#ffd700] text-[#0077be] font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center space-x-2">
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        <span>Modifier</span>
                    </button>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-6">
            <!-- État actuel du colis -->
            <div class="bg-white rounded-2xl shadow-lg border border-[#0077be]/10 overflow-hidden">
                <div class="p-8">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-6 md:space-y-0">
                        <div class="flex items-center space-x-6">
                            <div class="relative">
                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#0077be] to-[#005c91] flex items-center justify-center">
                                    @if($package->status === 'delivered')
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    @elseif($package->status === 'in_transit')
                                        <svg class="w-8 h-8 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    @else
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full border-4 border-white bg-[#ffd700] flex items-center justify-center">
                                    <div class="w-2 h-2 rounded-full bg-[#0077be] animate-pulse"></div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-[#0077be]">
                                    {{ ucfirst($package->status) }}
                                </h3>
                                <p class="text-[#0077be]/70">Dernière mise à jour : {{ $package->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="px-6 py-4 bg-[#0077be]/5 rounded-xl">
                                <p class="text-sm font-medium text-[#0077be]/70">Poids</p>
                                <p class="text-2xl font-bold text-[#0077be]">{{ $package->weight }} kg</p>
                            </div>
                            <div class="px-6 py-4 bg-[#0077be]/5 rounded-xl">
                                <p class="text-sm font-medium text-[#0077be]/70">Prix</p>
                                <p class="text-2xl font-bold text-[#0077be]">{{ number_format($package->price, 2) }} €</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations détaillées -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Client -->
                <div class="bg-white rounded-2xl shadow-lg border border-[#0077be]/10 overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="p-6">
                        <h3 class="flex items-center space-x-3 text-lg font-semibold text-[#0077be] mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>Information Client</span>
                        </h3>
                        <div class="space-y-4">
                            <div class="space-y-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-medium text-[#0077be]/70">Nom</span>
                                    <span class="text-lg font-semibold text-[#005c91]">{{ $package->user->name }}</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-sm font-medium text-[#0077be]/70">Téléphone</span>
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <span class="text-lg font-semibold text-[#005c91]">{{ $package->user->phone }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Destination -->
                <div class="bg-white rounded-2xl shadow-lg border border-[#0077be]/10 overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="p-6">
                        <h3 class="flex items-center space-x-3 text-lg font-semibold text-[#0077be] mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Adresse de livraison</span>
                        </h3>
                        <p class="text-lg text-[#005c91] bg-[#0077be]/5 p-4 rounded-xl">
                            {{ $package->destination_address }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Timeline de suivi -->
            <div class="bg-white rounded-2xl shadow-lg border border-[#0077be]/10 overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-[#0077be] flex items-center mb-8">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Historique de suivi
                    </h3>
                    <div class="relative">
                        <div class="absolute left-8 top-0 h-full w-0.5 bg-gradient-to-b from-[#0077be] to-[#005c91]/30"></div>
                        <div class="space-y-8">
                            @foreach($package->trackings as $tracking)
                                <div class="relative flex items-start ml-8">
                                    <div class="absolute -left-10 mt-1">
                                        <div class="w-5 h-5 rounded-full border-4 border-white bg-[#0077be] shadow-lg"></div>
                                    </div>
                                    <div class="bg-[#0077be]/5 rounded-xl p-4 flex-grow transform hover:-translate-y-1 transition-transform">
                                        <div class="font-semibold text-[#005c91]">{{ ucfirst($tracking->status) }}</div>
                                        <div class="text-sm text-[#0077be]/70 mb-2">
                                            {{ $tracking->created_at->format('d/m/Y H:i') }}
                                        </div>
                                        @if($tracking->notes)
                                            <p class="text-[#0077be]/90 bg-white/50 p-3 rounded-lg">
                                                {{ $tracking->notes }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .bg-grid-white {
            background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='1' height='1' fill='white'/%3E%3C/svg%3E");
        }
    </style>
</x-app-layout>
