@props(['nextDepartures', 'upcomingDepartures'])

<!-- Section Alerte Améliorée - Rendre dynamique les départs -->
        <section class="bg-gradient-to-r from-[#004080] to-[#002b56] relative py-12">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0 bg-grid-white/[0.05]"></div>
                <div class="h-full w-full bg-[radial-gradient(#ffffff33_1px,transparent_1px)] bg-[size:20px_20px]">
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 py-6 relative">
                <!-- Message de bienvenue -->
                <div class="text-center mb-10">
                    <p class="text-blue-100 text-lg">Prochains départs programmés</p>
                    <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4"></div>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    @foreach ($nextDepartures as $key => $departure)
                        <!-- Carte de départ dynamique -->
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300">
                            </div>
                            <div
                                class="relative flex flex-col md:flex-row md:items-center justify-between bg-white/10 rounded-2xl p-6 border border-white/10 backdrop-blur-sm hover:bg-white/[0.15] transition-all duration-300">
                                <div class="flex items-center space-x-6">
                                    <div class="bg-blue-900/40 p-4 rounded-xl">
                                        <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-medium text-white">
                                            {{ $departure['from'] === 'CM' ? 'Cameroun → Europe' : 'Europe → Cameroun' }}
                                        </h3>
                                        <div class="mt-2 flex items-center space-x-3">
                                            <span
                                                class="text-yellow-400 font-bold text-xl">{{ $departure['date'] }}</span>
                                            <span class="px-3 py-1 bg-blue-900/40 rounded-full text-sm text-blue-100">
                                                {{ $departure['status'] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 md:mt-0 flex items-center">
                                    <a href="{{ route('home') }}?departure={{ $upcomingDepartures[$key]['id'] ?? 0 }}"
                                        class="flex items-center justify-center p-3 bg-yellow-400 text-blue-900 rounded-xl hover:bg-yellow-300 transition-all group">
                                        <span class="mr-2">Réserver</span>
                                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Suivi des colis -->
                <div class="mt-8 bg-white/5 rounded-xl p-6 border border-white/10">
                    <div class="flex flex-wrap justify-center gap-8 text-center">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-blue-100">Délai de livraison: 5-7 jours</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-blue-100">Suivi en ligne</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            <span class="text-blue-100">Colis assuré et sécurisé</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
