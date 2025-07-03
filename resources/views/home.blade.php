<x-app-layout>

    {{-- Section Hero --}}
    <x-hero-section />

    {{-- Section Départs avec données dynamiques --}}
    <x-departures-section :nextDepartures="$nextDepartures" :upcomingDepartures="$upcomingDepartures" />


    {{-- Section Tarifs --}}
    <x-tarifs-section />

    <!-- Section Principale Améliorée -->
    <section class="py-24 bg-gradient-to-b from-blue-50 to-white relative overflow-hidden">
        <!-- Éléments décoratifs de fond -->
        <div class="absolute inset-0 bg-grid-slate-100 opacity-10"></div>
        <div
            class="absolute inset-0 bg-[radial-gradient(#004080_1px,transparent_1px)] bg-[size:40px_40px] opacity-[0.15]">
        </div>

        <div class="container mx-auto px-4 relative">
            <div class="max-w-7xl mx-auto">
                <!-- En-tête de section -->
                <div class="text-center mb-16 relative">
                    <span class="text-blue-600 font-semibold mb-2 block">Notre Réseau International</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        Nos Adresses et Services
                    </h2>
                    <div class="w-32 h-1 bg-gradient-to-r from-blue-600 to-blue-400 mx-auto mb-6"></div>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Découvrez nos points de service et profitez de notre système de suivi en temps réel
                    </p>
                </div>

                <!-- Bureaux Principaux -->
                <div class="mb-20">
                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                        <h3 class="text-2xl font-bold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Bureaux Principaux
                        </h3>
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="text-sm text-gray-500">Légende :</span>
                            <span class="text-sm text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Sur RDV</span>
                            <span class="text-sm text-green-600 bg-green-50 px-3 py-1 rounded-full">Ouvert</span>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Bruxelles -->
                        <div
                            class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://flagcdn.com/be.svg" alt="Belgique"
                                        class="w-10 h-6 rounded shadow-sm">
                                    <h4 class="text-xl font-bold text-white">Bruxelles</h4>
                                    <span class="text-sm bg-white/20 text-white px-3 py-1 rounded-full ml-auto">
                                        Sur RDV
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                <div class="space-y-4">
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Adresse</p>
                                            <p class="text-gray-600">Rue du Tilleul 91<br>1140 Evere</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Horaires</p>
                                            <p class="text-gray-600">Lun - Ven: 9h - 18h<br>Sam: 10h - 15h</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <a href="tel:+32465616645"
                                        class="flex items-center gap-3 text-gray-600 hover:text-blue-600 transition-colors">
                                        <div class="bg-blue-50 p-2 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Téléphone</p>
                                            <p>+32 465 61 66 45 (Leos)</p>
                                        </div>
                                    </a>

                                    <div class="grid grid-cols-2 gap-3">
                                        <a href="https://wa.me/32465616645"
                                            class="flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-3 rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                            </svg>
                                            WhatsApp
                                        </a>
                                        <button onclick="startShipment()"
                                            class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            Expédier
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Paris -->
                        <div
                            class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://flagcdn.com/fr.svg" alt="France"
                                        class="w-10 h-6 rounded shadow-sm">
                                    <h4 class="text-xl font-bold text-white">Paris</h4>
                                    <span class="text-sm bg-white/20 text-white px-3 py-1 rounded-full ml-auto">
                                        Sur RDV
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                <div class="space-y-4">
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Adresse</p>
                                            <p class="text-gray-600">58b rue henri Poincaré<br>92600
                                                Asnières-sur-Seine<br>
                                                <span class="text-sm text-gray-500">(En face de l'entrée principale du
                                                    stade Blaise Matuidi)</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Horaires</p>
                                            <p class="text-gray-600">Lun - Ven: 9h - 18h<br>Sam: 10h - 15h</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <a href="tel:+33667529091"
                                        class="flex items-center gap-3 text-gray-600 hover:text-blue-600 transition-colors">
                                        <div class="bg-blue-50 p-2 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Téléphone</p>
                                            <p>+33 6 67 52 90 91 (Jaurès)</p>
                                        </div>
                                    </a>

                                    <div class="grid grid-cols-2 gap-3">
                                        <a href="https://wa.me/33667529091"
                                            class="flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-3 rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                            </svg>
                                            WhatsApp
                                        </a>
                                        <button onclick="startShipment()"
                                            class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            Expédier
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Douala - Mise à jour -->
                        <div
                            class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://flagcdn.com/cm.svg" alt="Cameroun"
                                        class="w-10 h-6 rounded shadow-sm">
                                    <h4 class="text-xl font-bold text-white">Douala</h4>
                                    <span class="text-sm bg-green-400/30 text-white px-3 py-1 rounded-full ml-auto">
                                        Bureau Principal
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                <div class="space-y-4">
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Adresse</p>
                                            <p class="text-gray-600">Deido, face Grand Bazar<br>Proche de l'école
                                                primaire bilingue Cristal</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Disponibilité</p>
                                            <p class="text-gray-600">Lun - Sam: 9h - 18h</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <a href="tel:+23793996022"
                                        class="flex items-center gap-3 text-gray-600 hover:text-blue-600 transition-colors">
                                        <div class="bg-blue-50 p-2 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Téléphone</p>
                                            <p>+237 939 960 22 (Arole)</p>
                                        </div>
                                    </a>

                                    <div class="grid grid-cols-2 gap-3">
                                        <a href="https://wa.me/23793996022"
                                            class="flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-3 rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                            </svg>
                                            WhatsApp
                                        </a>
                                        <button onclick="startShipment()"
                                            class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            Expédier
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Points Relais au Cameroun -->
                <div class="mb-16">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            Points Relais au Cameroun
                        </h3>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Douala - Deido -->
                        <div
                            class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 p-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://flagcdn.com/cm.svg" alt="Cameroun"
                                        class="w-10 h-6 rounded shadow-sm">
                                    <h4 class="text-xl font-bold text-white">Douala - Deido</h4>
                                    <span class="text-sm bg-white/20 text-white px-3 py-1 rounded-full ml-auto">
                                        Point principal
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                <div class="space-y-4">
                                    <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Adresse</p>
                                            <p class="text-gray-600 mt-2">Deido, face Grand Bazar<br>Proche de l'école
                                                primaire bilingue Cristal</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Informations</p>
                                            <p class="text-gray-600 mt-2">Point central pour tous les dépôts et
                                                récupérations de colis à Douala.</p>
                                            <p class="mt-2 text-sm text-blue-600 font-medium">Contactez notre agent
                                                Arole pour plus d'informations : +237 939 960 22</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Yaoundé -->
                        <div
                            class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 p-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://flagcdn.com/cm.svg" alt="Cameroun"
                                        class="w-10 h-6 rounded shadow-sm">
                                    <h4 class="text-xl font-bold text-white">Yaoundé - Aéroport</h4>
                                    <span class="text-sm bg-white/20 text-white px-3 py-1 rounded-full ml-auto">
                                        Point de retrait
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                <div class="space-y-4">
                                    <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Informations</p>
                                            <p class="text-gray-600 mt-2">Récupération des colis à l'aéroport de
                                                Yaoundé.</p>
                                            <div class="mt-3 p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                                                <p class="text-yellow-800 flex items-start gap-2">
                                                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                    </svg>
                                                    <span>Service de livraison à domicile disponible avec supplément à
                                                        la charge du client.</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-lg">
                                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="text-blue-700">Pour tout renseignement ou devis de livraison,
                                            contactez notre agent Arole.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bannière d'information supplémentaire -->
                    <div class="mt-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg p-4 text-white shadow-md">
                        <div class="flex items-center gap-3">
                            <div class="bg-white/20 p-2 rounded-full">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="font-medium">Pour tous les colis au Cameroun, veuillez prendre rendez-vous au
                                moins 24h à l'avance.</p>
                        </div>
                    </div>
                </div>

                <!-- Points Relais en Belgique -->
                <div class="mb-16">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            Points Relais en Belgique
                        </h3>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <!-- Charleroi -->
                        <div
                            class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 p-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://flagcdn.com/be.svg" alt="Belgique"
                                        class="w-10 h-6 rounded shadow-sm">
                                    <h4 class="text-xl font-bold text-white">Charleroi</h4>
                                    <span class="text-sm bg-white/20 text-white px-3 py-1 rounded-full ml-auto">
                                        Heures d'ouverture
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                <div class="space-y-4">
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Adresse</p>
                                            <p class="text-gray-600">Rue de beaumont 159<br>6030 Marchienne au pont</p>
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <p class="font-medium text-gray-700">Chez EXO-TATI</p>
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm text-red-600 bg-red-50 px-3 py-1 rounded-full">
                                                Fermé le mercredi
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Liège -->
                        <div
                            class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 p-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://flagcdn.com/be.svg" alt="Belgique"
                                        class="w-10 h-6 rounded shadow-sm">
                                    <h4 class="text-xl font-bold text-white">Liège</h4>
                                    <span class="text-sm bg-white/20 text-white px-3 py-1 rounded-full ml-auto">
                                        Heures d'ouverture
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                <div class="space-y-4">
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Adresse</p>
                                            <p class="text-gray-600">Rue saint Nicolas 492<br>4000 Liège</p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <p class="text-gray-600">Dans le magasin afro situé à deux pas du restaurant
                                            chez emi d'or</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mons -->
                        <div
                            class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 p-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://flagcdn.com/be.svg" alt="Belgique"
                                        class="w-10 h-6 rounded shadow-sm">
                                    <h4 class="text-xl font-bold text-white">Mons</h4>
                                    <span class="text-sm bg-white/20 text-white px-3 py-1 rounded-full ml-auto">
                                        Heures d'ouverture
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                <div class="space-y-4">
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Adresse</p>
                                            <p class="text-gray-600">Avenue roi albert 699<br>7012 Jemappes</p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <p class="text-gray-600">Dans le magasin Maduka SP africa shop</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Instructions et Avertissements avec nouveau design -->
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Avertissements Points Relais -->
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-red-500 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="bg-red-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Important</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3 p-3 bg-red-50 rounded-lg">
                                <svg class="w-5 h-5 text-red-600 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <p class="text-red-800">Liège, Charleroi et Mons sont uniquement des points de dépôt et
                                    n'ont aucun compte à rendre sur les colis</p>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-red-50 rounded-lg">
                                <svg class="w-5 h-5 text-red-600 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <p class="text-red-800">Aucune transaction financière n'est autorisée sur ces points
                                    relais</p>
                            </div>
                        </div>
                    </div>

                    <!-- Procédure de Dépôt -->
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Procédure de Dépôt</h3>
                        </div>
                        <div class="space-y-4">
                            <p class="font-medium text-gray-900">Pour tout dépôt sur Liège, Charleroi ou Mons :</p>
                            <div class="space-y-3">
                                <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-blue-600 text-white text-sm font-bold">1</span>
                                    <p class="text-blue-900">Signalez votre dépôt par WhatsApp au contact de Bruxelles
                                    </p>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-blue-600 text-white text-sm font-bold">2</span>
                                    <p class="text-blue-900">Envoyez une photo du colis déposé</p>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-blue-600 text-white text-sm font-bold">3</span>
                                    <p class="text-blue-900">Fournissez les coordonnées complètes de l'expéditeur et du
                                        destinataire</p>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg">
                                    <span
                                        class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-blue-600 text-white text-sm font-bold">4</span>
                                    <p class="text-blue-900">Attendez d'être contacté pour le paiement par virement
                                        après réception du colis à Bruxelles</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Procédure Cameroun -->
                <div
                    class="mt-8 bg-white rounded-xl shadow-lg p-6 border-l-4 border-emerald-500 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="bg-emerald-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Informations Cameroun</h3>
                    </div>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="flex items-start gap-3 p-3 bg-emerald-50 rounded-lg">
                            <svg class="w-5 h-5 text-emerald-600 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <p class="text-emerald-800">Bureau principal à Deido, Douala (face Grand Bazar)</p>
                        </div>
                        <div class="flex items-start gap-3 p-3 bg-emerald-50 rounded-lg">
                            <svg class="w-5 h-5 text-emerald-600 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <p class="text-emerald-800">Points de relais disponibles aux aéroports de Douala et Yaoundé
                            </p>
                        </div>
                        <div class="flex items-start gap-3 p-3 bg-emerald-50 rounded-lg">
                            <svg class="w-5 h-5 text-emerald-600 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <p class="text-emerald-800">Contact unique : Arole (+237 939 960 22)</p>
                        </div>
                    </div>
                </div>

                <!-- Fonctionnalités de Suivi -->
                <div
                    class="mt-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl shadow-lg p-8 text-white hover:shadow-xl transition-all duration-300">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div class="space-y-6">
                            <h3 class="text-2xl font-bold">Suivez Vos Colis en Temps Réel</h3>
                            <div class="space-y-4">
                                <p class="text-blue-100">
                                    Accédez à votre espace personnel pour suivre vos expéditions et recevoir des
                                    notifications en temps réel.
                                </p>
                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Notifications automatiques à chaque étape</span>
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Interface de suivi intuitive</span>
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Historique complet de vos envois</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="/register"
                                    class="inline-flex items-center px-6 py-3 bg-white text-blue-600 rounded-lg hover:bg-blue-50 transition-colors font-medium">
                                    Créer un compte
                                </a>
                                <a href="/login"
                                    class="inline-flex items-center px-6 py-3 border-2 border-white text-white rounded-lg hover:bg-white/10 transition-colors font-medium">
                                    Se connecter
                                </a>
                            </div>
                        </div>
                        <div class="relative hidden md:grid grid-cols-2 gap-4">
                            <div class="transform rotate-2 transition-transform hover:rotate-0 duration-300">
                                <img src="/images/DASHBOARD1.jpeg" alt="Interface de suivi"
                                    class="w-full rounded-lg shadow-lg">
                            </div>
                            <div class="transform -rotate-2 transition-transform hover:rotate-0 duration-300 mt-8">
                                <img src="/images/suivi.jpeg" alt="Interface de suivi"
                                    class="w-full rounded-lg shadow-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script pour la gestion des expéditions -->
        <script>
            function startShipment() {
                // Redirection vers le formulaire d'expédition
                window.location.href = '/expeditions/nouveau';
            }

            // Fonction pour gérer les notifications de suivi
            function initializeTracking() {
                if ('Notification' in window && Notification.permission === 'granted') {
                    // Configuration des notifications en temps réel
                    setupTrackingNotifications();
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                initializeTracking();

                // Animation au défilement
                const animateOnScroll = () => {
                    const elements = document.querySelectorAll('.animate-on-scroll');
                    elements.forEach(el => {
                        const rect = el.getBoundingClientRect();
                        const isVisible = (rect.top <= window.innerHeight * 0.8);
                        if (isVisible) {
                            el.classList.add('fade-in-up');
                        }
                    });
                };

                window.addEventListener('scroll', animateOnScroll);
                animateOnScroll(); // Exécution initiale
            });
        </script>
    </section>
</x-app-layout>
