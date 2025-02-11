<x-app-layout>
    {{-- Hero Section avec Background Image Moderne --}}
    <div class="relative min-h-screen bg-gradient-to-b from-[#005c91] to-[#005c91]/50">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/2.png') }}" alt="Background" class="w-full h-full object-cover opacity-40">
            <div class="absolute "></div>
        </div>

        {{-- Contenu Principal --}}
        <div class="relative z-10">

            {{-- Hero Section Moderne --}}
            <section class="min-h-screen flex items-center justify-center px-4 py-20">
                <div class="max-w-7xl mx-auto">
                    <div class="bg-white/5 backdrop-blur-lg p-12 rounded-3xl shadow-2xl">
                        <div class="max-w-4xl mx-auto text-center">
                            <h1 class="text-5xl md:text-7xl font-bold text-white mb-8 leading-tight">
                                Diaspora Shopping & Fly
                                <span class="block text-yellow-400 mt-4">
                                    Europe ⟷ Cameroun
                                </span>
                            </h1>
                            <p class="text-xl md:text-2xl text-gray-200 mb-12">
                                Service de transport express bidirectionnel sécurisé et fiable
                                <span class="block mt-4 text-yellow-400 font-semibold">
                                    Rapidité • Sécurité • Fiabilité
                                </span>
                            </p>
                            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                                <a href="#expedier"
                                    class="group flex items-center justify-center px-8 py-4 bg-[#005c91] text-white font-semibold rounded-xl hover:bg-[#005c91] transition-all duration-300 transform hover:-translate-y-1">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Expédier un colis
                                </a>
                                <a href="#contact"
                                    class="group flex items-center justify-center px-8 py-4 bg-yellow-400 text-blue-900 font-semibold rounded-xl hover:bg-yellow-300 transition-all duration-300 transform hover:-translate-y-1">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                    Nous contacter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Section Alerte Moderne --}}
            <section class="bg-gradient-to-r from-[#005c91] to-[#005c91] relative">
                <div class="absolute inset-0 bg-grid-white/[0.05]"></div>
                <div class="container mx-auto px-4 py-6 relative">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="flex items-center justify-center text-white bg-white/10 rounded-2xl p-4">
                            <div class="flex items-center space-x-4">
                                <svg class="w-8 h-8 text-yellow-400 animate-bounce" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                                <div>
                                    <p class="font-medium">Prochain départ Europe → Cameroun</p>
                                    <p class="text-yellow-400 font-bold">12/02/2025</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center text-white bg-white/10 rounded-2xl p-4">
                            <div class="flex items-center space-x-4">
                                <svg class="w-8 h-8 text-yellow-400 animate-bounce" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21l-7-3.5L5 21V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path>
                                </svg>
                                <div>
                                    <p class="font-medium">Prochain départ Cameroun → Europe</p>
                                    <p class="text-yellow-400 font-bold">15/02/2025</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Section Services Moderne --}}
            <section id="services" class="py-24 bg-white">
                <div class="container mx-auto px-4">
                    <h2 class="text-4xl md:text-5xl font-bold text-blue-900 text-center mb-16">
                        Nos Services
                        <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4"></div>
                    </h2>
                    <div class="grid md:grid-cols-3 gap-8 max-w-7xl mx-auto">
                        {{-- Service Card 1 --}}
                        <div
                            class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="bg-blue-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-[#005c91]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-blue-900 mb-4">Transport Express</h3>
                            <p class="text-gray-600 mb-6">Livraison rapide et sécurisée de vos colis entre l'Europe et
                                le Cameroun.</p>
                            <ul class="space-y-3">
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Délai: 5-7 jours
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Suivi en temps réel
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Assurance incluse
                                </li>
                            </ul>
                        </div>

                        {{-- Service Card 2 --}}
                        <div
                            class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="bg-yellow-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-blue-900 mb-4">Tarifs Compétitifs</h3>
                            <p class="text-gray-600 mb-6">Des prix adaptés à tous vos besoins d'expédition.</p>
                            <ul class="space-y-3">
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    À partir de 10€/kg
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Réductions volumes
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Livraison incluse
                                </li>
                            </ul>
                        </div>

                        {{-- Service Card 3 --}}
                        <div
                            class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="bg-green-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.526 5.526 0 2.18 2.162 4.18 5.338 5.618.865.875 1.85 1.678 2.662 2.382a4.5 4.5 0 01.666.722 4.5 4.5 0 01.666-.722c.812-.704 1.797-1.507 2.662-2.382C16.337 13.18 18.5 11.18 18.5 9c0-.526-.021-1.04-.062-1.544z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-blue-900 mb-4">Service Premium</h3>
                            <p class="text-gray-600 mb-6">Un service personnalisé pour vos envois spéciaux.</p>
                            <ul class="space-y-3">
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Service prioritaire
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Emballage sécurisé
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Support dédié 24/7
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Section Destinations --}}
            <section id="destinations" class="py-24 bg-gray-50">
                <div class="container mx-auto px-4">
                    <h2 class="text-4xl md:text-5xl font-bold text-blue-900 text-center mb-16">
                        Nos Destinations
                        <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4"></div>
                    </h2>

                    <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
                        {{-- Europe vers Cameroun --}}
                        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                            <div class="bg-[#005c91] p-6">
                                <h3 class="text-2xl font-bold text-white flex items-center justify-between">
                                    Europe → Cameroun
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </h3>
                            </div>
                            <div class="p-8">
                                <div class="space-y-8">
                                    {{-- France --}}
                                    <div class="flex items-start space-x-6">
                                        <img src="https://flagcdn.com/fr.svg" alt="France"
                                            class="w-12 h-8 rounded shadow mt-1">
                                        <div>
                                            <h4 class="text-xl font-semibold text-blue-900 mb-2">France</h4>
                                            <p class="text-gray-600 flex items-start mb-2">
                                                <svg class="w-5 h-5 mr-3 text-[#005c91] mt-1" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                58b rue henri Poincaré, 92600 Asnières-sur-Seine
                                            </p>
                                            <p class="text-gray-600 flex items-center">
                                                <svg class="w-5 h-5 mr-3 text-[#005c91]" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                +33 6 67 52 90 91
                                            </p>
                                        </div>
                                    </div>

                                    {{-- Belgique --}}
                                    <div class="flex items-start space-x-6">
                                        <img src="https://flagcdn.com/be.svg" alt="Belgique"
                                            class="w-12 h-8 rounded shadow mt-1">
                                        <div>
                                            <h4 class="text-xl font-semibold text-blue-900 mb-2">Belgique</h4>
                                            <p class="text-gray-600 flex items-start mb-2">
                                                <svg class="w-5 h-5 mr-3 text-[#005c91] mt-1" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                Rue du Tilleul 91, 1140 Evere
                                            </p>
                                            <p class="text-gray-600 flex items-center">
                                                <svg class="w-5 h-5 mr-3 text-[#005c91]" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                +32 465 61 66 45
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Cameroun vers Europe --}}
                        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                            <div class="bg-yellow-400 p-6">
                                <h3 class="text-2xl font-bold text-blue-900 flex items-center justify-between">
                                    Cameroun → Europe
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </h3>
                            </div>
                            <div class="p-8">
                                <div class="space-y-8">
                                    {{-- Yaoundé --}}
                                    <div class="flex items-start space-x-6">
                                        <img src="https://flagcdn.com/cm.svg" alt="Cameroun"
                                            class="w-12 h-8 rounded shadow mt-1">
                                        <div>
                                            <h4 class="text-xl font-semibold text-blue-900 mb-2">Yaoundé</h4>
                                            <p class="text-gray-600 flex items-start mb-2">
                                                <svg class="w-5 h-5 mr-3 text-[#005c91] mt-1" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                Carrefour Mvog-Ada, à côté de Total
                                            </p>
                                            <p class="text-gray-600 flex items-center">
                                                <svg class="w-5 h-5 mr-3 text-[#005c91]" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                +237 6 91 22 33 44
                                            </p>
                                        </div>
                                    </div>

                                    {{-- Douala --}}
                                    <div class="flex items-start space-x-6">
                                        <img src="https://flagcdn.com/cm.svg" alt="Cameroun"
                                            class="w-12 h-8 rounded shadow mt-1">
                                        <div>
                                            <h4 class="text-xl font-semibold text-blue-900 mb-2">Douala</h4>
                                            <p class="text-gray-600 flex items-start mb-2">
                                                <svg class="w-5 h-5 mr-3 text-[#005c91] mt-1" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                Akwa, en face de l'hôtel Ibis
                                            </p>
                                            <p class="text-gray-600 flex items-center">
                                                <svg class="w-5 h-5 mr-3 text-[#005c91]" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                +237 6 92 33 44 55
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Section Points Relais --}}
            <section id="points-relais" class="py-24 bg-white">
                <div class="container mx-auto px-4">
                    <h2 class="text-4xl md:text-5xl font-bold text-blue-900 text-center mb-16">
                        Points Relais
                        <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4"></div>
                    </h2>

                    {{-- Points Relais Europe --}}
                    <div class="max-w-7xl mx-auto mb-16">
                        <h3 class="text-2xl font-bold text-blue-900 mb-8 text-center">Europe</h3>
                        <div class="grid md:grid-cols-3 gap-8">
                            {{-- Charleroi --}}
                            <div
                                class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8">
                                <div class="flex items-center space-x-4 mb-6">
                                    <div class="bg-blue-50 p-3 rounded-xl">
                                        <svg class="w-6 h-6 text-[#005c91]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold text-blue-900">Charleroi</h4>
                                </div>
                                <p class="text-gray-600 mb-4">
                                    Rue de beaumont 159, 6030 Marchienne au pont
                                </p>
                                <p class="text-sm text-gray-500 italic">
                                    Chez EXO-TATI (fermé le mercredi)
                                </p>
                            </div>

                            {{-- Liège --}}
                            <div
                                class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8">
                                <div class="flex items-center space-x-4 mb-6">
                                    <div class="bg-blue-50 p-3 rounded-xl">
                                        <svg class="w-6 h-6 text-[#005c91]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold text-blue-900">Liège</h4>
                                </div>
                                <p class="text-gray-600 mb-4">
                                    Rue saint Nicolas 492, 4000 Liège
                                </p>
                                <p class="text-sm text-gray-500 italic">
                                    Dans le magasin afro près du restaurant chez emi d'or
                                </p>
                            </div>

                            {{-- Mons --}}
                            <div
                                class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8">
                                <div class="flex items-center space-x-4 mb-6">
                                    <div class="bg-blue-50 p-3 rounded-xl">
                                        <svg class="w-6 h-6 text-[#005c91]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold text-blue-900">Mons</h4>
                                </div>
                                <p class="text-gray-600 mb-4">
                                    Avenue roi albert 699, 7012 Jemappes
                                </p>
                                <p class="text-sm text-gray-500 italic">
                                    Dans le magasin Maduka SP africa shop
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Points Relais Cameroun --}}
                    <div class="max-w-7xl mx-auto">
                        <h3 class="text-2xl font-bold text-blue-900 mb-8 text-center">Cameroun</h3>
                        <div class="grid md:grid-cols-2 gap-8">
                            {{-- Douala --}}
                            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8">
                                <div class="flex items-center space-x-4 mb-6">
                                    <div class="bg-blue-50 p-3 rounded-xl">
                                        <svg class="w-6 h-6 text-[#005c91]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold text-blue-900">Douala</h4>
                                </div>
                                <p class="text-gray-600 mb-2">
                                    Aéroport International de Douala
                                </p>
                                <p class="text-gray-600 flex items-center mb-2">
                                    <svg class="w-5 h-5 mr-2 text-[#005c91]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    +237 6 91 22 33 44
                                </p>
                            </div>

                            {{-- Yaoundé --}}
                            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8">
                                <div class="flex items-center space-x-4 mb-6">
                                    <div class="bg-blue-50 p-3 rounded-xl">
                                        <svg class="w-6 h-6 text-[#005c91]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold text-blue-900">Yaoundé</h4>
                                </div>
                                <p class="text-gray-600 mb-2">
                                    Carrefour Mvog-Ada, à côté de Total
                                </p>
                                <p class="text-gray-600 flex items-center mb-2">
                                    <svg class="w-5 h-5 mr-2 text-[#005c91]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    +237 6 91 22 33 44
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Notes Importantes --}}
                    <div class="max-w-4xl mx-auto mt-16">
                        <div class="bg-red-50 rounded-2xl p-8 border border-red-100">
                            <h3 class="text-xl font-bold text-red-800 mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                    </path>
                                </svg>
                                Notes Importantes
                            </h3>
                            <ul class="space-y-4">
                                <li class="flex items-start text-red-700">
                                    <svg class="w-5 h-5 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                        </path>
                                    </svg>
                                    <span>Les points relais sont uniquement des points de dépôt et n'ont aucun compte à
                                        rendre sur les colis</span>
                                </li>
                                <li class="flex items-start text-red-700">
                                    <svg class="w-5 h-5 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                        </path>
                                    </svg>
                                    <span>Pas de transactions financières dans les points relais</span>
                                </li>
                                <li class="flex items-start text-red-700">
                                    <svg class="w-5 h-5 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Pour tout dépôt dans un point relais : signalez par WhatsApp avec photo au
                                        contact du bureau principal et renseignez les coordonnées de l'expéditeur et du
                                        destinataire</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Section Contact Moderne --}}
            <section id="contact"
                class="py-24 bg-gradient-to-br from-[#005c91] to-[#005c91] relative overflow-hidden">
                <div class="absolute inset-0 bg-pattern opacity-10"></div>

                <div class="container mx-auto px-4 relative z-10">
                    <div class="max-w-7xl mx-auto">
                        <div class="text-center mb-16">
                            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                                Contactez-nous
                            </h2>
                            <p class="text-xl text-blue-100">
                                Une question ? Nous sommes là pour vous aider
                            </p>
                        </div>

                        <div class="grid lg:grid-cols-2 gap-12">
                            {{-- Informations de contact --}}
                            <div class="space-y-8">
                                {{-- Cartes de contact --}}
                                <div class="bg-white/10 p-8 rounded-2xl backdrop-blur-sm">
                                    <div class="grid sm:grid-cols-3 gap-8">
                                        {{-- France --}}
                                        <div>
                                            <div class="flex items-center space-x-3 mb-4">
                                                <img src="https://flagcdn.com/fr.svg" alt="France"
                                                    class="w-8 h-6 rounded">
                                                <h3 class="text-lg font-semibold text-white">France</h3>
                                            </div>
                                            <a href="tel:+33667529091"
                                                class="flex items-center text-blue-100 hover:text-yellow-400 transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                +33 6 67 52 90 91
                                            </a>
                                        </div>

                                        {{-- Belgique --}}
                                        <div>
                                            <div class="flex items-center space-x-3 mb-4">
                                                <img src="https://flagcdn.com/be.svg" alt="Belgique"
                                                    class="w-8 h-6 rounded">
                                                <h3 class="text-lg font-semibold text-white">Belgique</h3>
                                            </div>
                                            <a href="tel:+32465616645"
                                                class="flex items-center text-blue-100 hover:text-yellow-400 transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a22 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                +32 465 61 66 45
                                            </a>
                                        </div>

                                        {{-- Cameroun --}}
                                        <div>
                                            <div class="flex items-center space-x-3 mb-4">
                                                <img src="https://flagcdn.com/cm.svg" alt="Cameroun"
                                                    class="w-8 h-6 rounded">
                                                <h3 class="text-lg font-semibold text-white">Cameroun</h3>
                                            </div>
                                            <a href="tel:+237691223344"
                                                class="flex items-center text-blue-100 hover:text-yellow-400 transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                +237 6 91 22 33 44
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                {{-- WhatsApp Contact --}}
                                <div class="bg-green-500/20 p-8 rounded-2xl backdrop-blur-sm">
                                    <h3 class="text-xl font-semibold text-white mb-6 flex items-center">
                                        <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                        </svg>
                                        WhatsApp
                                    </h3>
                                    <div class="grid sm:grid-cols-2 gap-4">
                                        <a href="https://wa.me/32465616645"
                                            class="flex items-center justify-center px-6 py-3 bg-green-500 text-white font-semibold rounded-xl hover:bg-green-600 transition-all duration-300 group">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                            </svg>
                                            WhatsApp Europe
                                        </a>
                                        <a href="https://wa.me/237691223344"
                                            class="flex items-center justify-center px-6 py-3 bg-green-500 text-white font-semibold rounded-xl hover:bg-green-600 transition-all duration-300 group">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                            </svg>
                                            WhatsApp Cameroun
                                        </a>
                                    </div>
                                </div>

                                {{-- Horaires --}}
                                <div class="bg-white/10 p-8 rounded-2xl backdrop-blur-sm">
                                    <h3 class="text-xl font-semibold text-white mb-6 flex items-center">
                                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Horaires d'ouverture
                                    </h3>
                                    <div class="grid md:grid-cols-2 gap-8">
                                        <div class="space-y-4">
                                            <h4 class="font-semibold text-yellow-400">Europe</h4>
                                            <div class="space-y-2 text-blue-100">
                                                <p class="flex justify-between">
                                                    <span>Lundi - Vendredi:</span>
                                                    <span>9h00 - 18h00</span>
                                                </p>
                                                <p class="flex justify-between">
                                                    <span>Samedi:</span>
                                                    <span>10h00 - 16h00</span>
                                                </p>
                                                <p class="flex justify-between">
                                                    <span>Dimanche:</span>
                                                    <span>Fermé</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="space-y-4">
                                            <h4 class="font-semibold text-yellow-400">Cameroun</h4>
                                            <div class="space-y-2 text-blue-100">
                                                <p class="flex justify-between">
                                                    <span>Lundi - Samedi:</span>
                                                    <span>8h00 - 18h00</span>
                                                </p>
                                                <p class="flex justify-between">
                                                    <span>Dimanche:</span>
                                                    <span>Fermé</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Formulaire de contact --}}
                            <div class="bg-white/10 p-8 rounded-2xl backdrop-blur-sm">
                                <form class="space-y-6">
                                    <div class="grid sm:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-blue-100 mb-2">Nom</label>
                                            <input type="text" placeholder="Votre nom"
                                                class="w-full px-4 py-3 rounded-xl border-2 border-white/20 bg-white/10 text-white placeholder-white/50 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-blue-100 mb-2">Prénom</label>
                                            <input type="text" placeholder="Votre prénom"
                                                class="w-full px-4 py-3 rounded-xl border-2 border-white/20 bg-white/10 text-white placeholder-white/50 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition-all">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-blue-100 mb-2">Email</label>
                                        <input type="email" placeholder="votre@email.com"
                                            class="w-full px-4 py-3 rounded-xl border-2 border-white/20 bg-white/10 text-white placeholder-white/50 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition-all">
                                    </div>

                                    <div>
                                        <label class="block text-blue-100 mb-2">Téléphone</label>
                                        <input type="tel" placeholder="Votre numéro de téléphone"
                                            class="w-full px-4 py-3 rounded-xl border-2 border-white/20 bg-white/10 text-white placeholder-white/50 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition-all">
                                    </div>

                                    <div>
                                        <label class="block text-blue-100 mb-2">Pays</label>
                                        <select
                                            class="w-full px-4 py-3 rounded-xl border-2 border-white/20 bg-white/10 text-white focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition-all">
                                            <option value="" class="text-gray-900">Sélectionnez votre pays
                                            </option>
                                            <option value="FR" class="text-gray-900">France</option>
                                            <option value="BE" class="text-gray-900">Belgique</option>
                                            <option value="CM" class="text-gray-900">Cameroun</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-blue-100 mb-2">Message</label>
                                        <textarea rows="4" placeholder="Votre message..."
                                            class="w-full px-4 py-3 rounded-xl border-2 border-white/20 bg-white/10 text-white placeholder-white/50 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition-all"></textarea>
                                    </div>

                                    <button type="submit"
                                        class="w-full px-8 py-4 bg-yellow-400 text-blue-900 font-bold rounded-xl hover:bg-yellow-300 transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-[#005c91]">
                                        Envoyer le message
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Bouton retour en haut --}}
            <button id="backToTop"
                class="fixed bottom-8 right-8 bg-[#005c91] text-white p-4 rounded-full shadow-lg opacity-0 invisible transform translate-y-10 transition-all duration-300 hover:bg-[#005c91] focus:outline-none z-50">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                </svg>
            </button>
        </div>
    </div>

    {{-- Styles personnalisés --}}
    <style>
        /* Animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Background Pattern */
        .bg-pattern {
            background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #0077be;
            border-radius: 6px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #005c91;
        }
    </style>

    {{-- Scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Animation au défilement
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in-up');
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });

            // Gestion du bouton retour en haut
            const backToTopButton = document.getElementById('backToTop');

            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 500) {
                    backToTopButton.classList.remove('opacity-0', 'invisible', 'translate-y-10');
                    backToTopButton.classList.add('opacity-100', 'visible', 'translate-y-0');
                } else {
                    backToTopButton.classList.add('opacity-0', 'invisible', 'translate-y-10');
                    backToTopButton.classList.remove('opacity-100', 'visible', 'translate-y-0');
                }
            });

            backToTopButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Navigation fluide
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Animation des cartes au survol
            document.querySelectorAll('.hover-card').forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.classList.add('transform', 'scale-105', 'shadow-2xl');
                });
                card.addEventListener('mouseleave', () => {
                    card.classList.remove('transform', 'scale-105', 'shadow-2xl');
                });
            });

            // Validation du formulaire
            const contactForm = document.querySelector('form');
            if (contactForm) {
                contactForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    // Ajoutez ici votre logique de validation et d'envoi du formulaire
                    console.log('Formulaire soumis');
                });
            }
        });
    </script>
</x-app-layout>
