<x-guest-layout>
    {{-- Ajout des styles pour les animations --}}
    <style>
        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes floatingIcon {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .animate-slide-left {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        .animate-slide-right {
            animation: slideInRight 0.8s ease-out forwards;
        }

        .animate-float {
            animation: floatingIcon 3s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse 2s infinite;
        }

        .input-icon-animate {
            transition: all 0.3s ease;
        }

        .input-group:focus-within .input-icon-animate {
            color: #0077be;
            transform: scale(1.1);
        }
    </style>

    <div class="min-h-screen flex">
        <!-- Left Side - Image -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0077be]/90 to-[#005c91]/90 flex flex-col justify-center px-12">
                <div class="space-y-8 animate-slide-left">
                    <h2 class="text-4xl font-bold text-white mb-4">
                        <i class="fas fa-plane-departure mr-3 animate-float"></i>
                        Bienvenue sur DSF
                    </h2>
                    <p class="text-xl text-white/90">
                        Votre partenaire de confiance pour vos achats et expéditions internationaux
                    </p>

                    <!-- Features with Animated Icons -->
                    <div class="space-y-6 mt-8">
                        <div class="flex items-center space-x-4 hover:translate-x-2 transition-transform duration-300">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center animate-float" style="animation-delay: 0s;">
                                <i class="fas fa-shipping-fast text-white text-xl"></i>
                            </div>
                            <span class="text-white">Livraison rapide et sécurisée</span>
                        </div>
                        <div class="flex items-center space-x-4 hover:translate-x-2 transition-transform duration-300">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center animate-float" style="animation-delay: 0.2s;">
                                <i class="fas fa-shield-alt text-white text-xl"></i>
                            </div>
                            <span class="text-white">Paiements 100% sécurisés</span>
                        </div>
                        <div class="flex items-center space-x-4 hover:translate-x-2 transition-transform duration-300">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center animate-float" style="animation-delay: 0.4s;">
                                <i class="fas fa-headset text-white text-xl"></i>
                            </div>
                            <span class="text-white">Support client 24/7</span>
                        </div>
                        <div class="flex items-center space-x-4 hover:translate-x-2 transition-transform duration-300">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center animate-float" style="animation-delay: 0.6s;">
                                <i class="fas fa-globe text-white text-xl"></i>
                            </div>
                            <span class="text-white">Expédition internationale</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-md animate-slide-right">
                <!-- Mobile Logo -->
                <div class="lg:hidden flex justify-center mb-8 animate-pulse-slow">
                    <img src="{{ asset('images/dsf.svg') }}" alt="DSF Logo" class="h-16 w-auto">
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-xl">
                    <div class="text-center mb-8">
                        <div class="inline-block p-3 bg-[#0077be]/10 rounded-full mb-4 animate-float">
                            <i class="fas fa-user-plus text-3xl text-[#0077be]"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Créer un compte</h2>
                        <p class="mt-2 text-gray-600">Rejoignez notre communauté DSF</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Name -->
                        <div class="input-group relative transform hover:scale-[1.01] transition-transform duration-300">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-user input-icon-animate text-gray-400"></i>
                            </div>
                            <input type="text"
                                   name="name"
                                   id="name"
                                   class="block w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300"
                                   placeholder="Nom complet"
                                   value="{{ old('name') }}"
                                   required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- WhatsApp -->
                        <div class="space-y-1">
                            <div class="input-group relative transform hover:scale-[1.01] transition-transform duration-300">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fab fa-whatsapp input-icon-animate text-gray-400"></i>
                                </div>
                                <input type="tel"
                                       name="phone"
                                       id="phone"
                                       class="block w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300"
                                       placeholder="Numéro WhatsApp"
                                       value="{{ old('phone') }}"
                                       required>
                            </div>
                            <p class="text-sm text-gray-500 pl-4 flex items-center">
                                <i class="fas fa-info-circle mr-2 text-[#0077be]"></i>
                                Inclure l'indicatif pays (ex: +33, +1)
                            </p>
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="input-group relative transform hover:scale-[1.01] transition-transform duration-300">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-envelope input-icon-animate text-gray-400"></i>
                            </div>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   class="block w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300"
                                   placeholder="Adresse email"
                                   value="{{ old('email') }}"
                                   required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="input-group relative transform hover:scale-[1.01] transition-transform duration-300" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock input-icon-animate text-gray-400"></i>
                            </div>
                            <input :type="show ? 'text' : 'password'"
                                   name="password"
                                   id="password"
                                   class="block w-full pl-12 pr-12 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300"
                                   placeholder="Mot de passe"
                                   required>
                            <button type="button"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center transition-transform hover:scale-110"
                                    @click="show = !show">
                                <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'" class="text-gray-400 hover:text-[#0077be]"></i>
                            </button>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="input-group relative transform hover:scale-[1.01] transition-transform duration-300" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock input-icon-animate text-gray-400"></i>
                            </div>
                            <input :type="show ? 'text' : 'password'"
                                   name="password_confirmation"
                                   id="password_confirmation"
                                   class="block w-full pl-12 pr-12 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#0077be]/20 focus:border-[#0077be] transition-all duration-300"
                                   placeholder="Confirmez le mot de passe"
                                   required>
                            <button type="button"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center transition-transform hover:scale-110"
                                    @click="show = !show">
                                <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'" class="text-gray-400 hover:text-[#0077be]"></i>
                            </button>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-[#0077be] to-[#005c91] hover:from-[#005c91] hover:to-[#004b76] text-white font-semibold py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center gap-2">
                            <span>Créer mon compte</span>
                            <i class="fas fa-arrow-right animate-float"></i>
                        </button>

                        <!-- Login Link -->
                        <div class="text-center transform hover:scale-105 transition-transform duration-300">
                            <p class="text-sm text-gray-600">
                                Déjà inscrit ?
                                <a href="{{ route('login') }}" class="font-medium text-[#0077be] hover:text-[#005c91] transition-colors duration-300 flex items-center justify-center gap-2 mt-1">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>Se connecter</span>
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
