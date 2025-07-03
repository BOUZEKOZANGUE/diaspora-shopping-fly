<x-guest-layout>
    {{-- Styles améliorés pour les animations et la responsivité --}}
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

        @keyframes slideInBottom {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
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
            0% {
                box-shadow: 0 0 0 0 rgba(0, 64, 128, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(0, 64, 128, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(0, 64, 128, 0);
            }
        }

        .animate-slide-left {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        .animate-slide-right {
            animation: slideInRight 0.8s ease-out forwards;
        }

        .animate-slide-bottom {
            animation: slideInBottom 0.6s ease-out forwards;
        }

        .animate-float {
            animation: floatingIcon 3s ease-in-out infinite;
        }

        .animate-pulse-blue {
            animation: pulse 2s infinite;
        }

        .input-icon-animate {
            transition: all 0.3s ease;
        }

        .input-group:focus-within .input-icon-animate {
            color: #004080;
            transform: scale(1.1);
        }

        .feature-item {
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateX(8px);
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding-left: 12px;
        }

        /* Backgrounds for different screen sizes */
        @media (max-width: 640px) {
            .mobile-bg {
                background: linear-gradient(135deg, rgba(0, 64, 128, 0.9), rgba(0, 92, 145, 0.8));
            }
        }
    </style>

    <div class="min-h-screen flex flex-col lg:flex-row bg-gray-50">
        <!-- Left Side - Information & Features -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
            <!-- Overlay semi-transparent background image -->
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('{{ asset('images/bg-shipping.jpg') }}'); filter: blur(1px);"></div>

            <!-- Gradient overlay -->
            <div
                class="absolute inset-0 bg-gradient-to-r from-[#004080]/90 to-[#005c91]/95 flex flex-col justify-center px-12 z-10">
                <div class="space-y-8 animate-slide-left">
                    <!-- Logo in sidebar - Identique à la page d'inscription -->
                    <div class="flex items-center gap-4 mb-12">
                        <img src="{{ asset('images/dsf.svg') }}" alt="DSF Logo" class="h-14 w-auto">
                        <div>
                            <h1 class="text-3xl font-bold text-white">Diaspora Shopping & Fly</h1>
                            <p class="text-blue-200">Europe ⟷ Cameroun</p>
                        </div>
                    </div>

                    <h2 class="text-4xl font-bold text-white mb-4 flex items-center">
                        <i class="fas fa-plane-departure mr-3 animate-float"></i>
                        <span>Espace Client</span>
                    </h2>
                    <p class="text-xl text-white/90">
                        Connectez-vous pour accéder à votre espace personnel
                    </p>

                    <!-- Important Notice Box -->
                    <div class="mt-6 mb-8 bg-white/10 p-4 rounded-xl border border-white/20">
                        <h3 class="text-yellow-300 font-bold mb-2 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Informations importantes
                        </h3>
                        <ul class="space-y-3 text-white">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-400 mt-1 mr-2"></i>
                                <span>Votre espace client permet uniquement de suivre l'état de vos colis et de
                                    consulter votre historique de transactions</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times-circle text-red-400 mt-1 mr-2"></i>
                                <span>Aucun paiement ne s'effectue via cette plateforme</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-headset text-blue-300 mt-1 mr-2"></i>
                                <span>Pour toute difficulté de connexion, contactez notre service client</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Features with Animated Icons -->
                    <div class="space-y-5">
                        <h3 class="text-white font-bold mb-2">Ce que vous pouvez faire :</h3>
                        <div class="feature-item flex items-center space-x-4 p-2">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center animate-float"
                                style="animation-delay: 0s;">
                                <i class="fas fa-box text-white text-xl"></i>
                            </div>
                            <span class="text-white">Suivre vos colis en temps réel</span>
                        </div>
                        <div class="feature-item flex items-center space-x-4 p-2">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center animate-float"
                                style="animation-delay: 0.2s;">
                                <i class="fas fa-history text-white text-xl"></i>
                            </div>
                            <span class="text-white">Consulter l'historique de vos transactions</span>
                        </div>
                        <div class="feature-item flex items-center space-x-4 p-2">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center animate-float"
                                style="animation-delay: 0.4s;">
                                <i class="fas fa-bell text-white text-xl"></i>
                            </div>
                            <span class="text-white">Recevoir des notifications sur l'état de vos colis</span>
                        </div>
                    </div>

                    <!-- Contact info -->
                    <div class="mt-12 pt-8 border-t border-white/20">
                        <p class="text-blue-100 text-sm">Besoin d'aide pour vous connecter?</p>
                        <div class="flex items-center gap-4 mt-3">
                            <a href="https://wa.me/32465616645"
                                class="flex items-center gap-2 text-white/90 hover:text-white transition-colors">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <i class="fab fa-whatsapp text-white"></i>
                                </div>
                                <span>+32 465 61 66 45</span>
                            </a>
                            <a href="tel:+32465616645"
                                class="flex items-center gap-2 text-white/90 hover:text-white transition-colors">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-phone-alt text-white"></i>
                                </div>
                                <span>Nous appeler</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Header - Only visible on small screens -->
        <div class="lg:hidden mobile-bg text-white p-6 animate-slide-bottom">
            <div class="flex items-center justify-center gap-4">
                <img src="{{ asset('images/dsf.svg') }}" alt="DSF Logo" class="h-12 w-auto">
                <div class="text-center">
                    <h1 class="text-xl font-bold">Diaspora Shopping & Fly</h1>
                    <p class="text-sm text-blue-200">Europe ⟷ Cameroun</p>
                </div>
            </div>

            <!-- Mobile important notice -->
            <div class="mt-4 p-3 bg-white/10 rounded-lg border border-white/20">
                <p class="text-xs text-center text-yellow-200">
                    <i class="fas fa-info-circle mr-1"></i>
                    Cette plateforme permet uniquement de suivre vos colis. Aucun paiement ne s'effectue ici.
                </p>
            </div>

            <!-- Mobile feature highlights -->
            <div class="mt-4 flex justify-center gap-6">
                <div class="text-center">
                    <div class="w-10 h-10 mx-auto bg-white/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-box text-white text-sm"></i>
                    </div>
                    <span class="text-xs mt-1 block">Suivi colis</span>
                </div>
                <div class="text-center">
                    <div class="w-10 h-10 mx-auto bg-white/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-history text-white text-sm"></i>
                    </div>
                    <span class="text-xs mt-1 block">Historique</span>
                </div>
                <div class="text-center">
                    <div class="w-10 h-10 mx-auto bg-white/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-bell text-white text-sm"></i>
                    </div>
                    <span class="text-xs mt-1 block">Notifications</span>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-4 sm:p-8 animate-slide-right">
            <div class="w-full max-w-md">
                <!-- Logo en haut du formulaire - Ajouté comme demandé -->
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('images/dsf.svg') }}" alt="DSF Logo" class="h-20 w-auto animate-pulse-blue">
                </div>

                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-xl border border-gray-100">
                    <div class="text-center mb-8">
                        <div class="inline-block p-4 bg-[#004080]/10 rounded-full mb-4 animate-pulse-blue">
                            <i class="fas fa-user-circle text-3xl text-[#004080]"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Connexion</h2>
                        <p class="mt-2 text-gray-600">Accédez à votre espace personnel</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email/Phone Field -->
                        <div
                            class="input-group relative transform hover:scale-[1.01] transition-transform duration-300">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-envelope input-icon-animate text-gray-400"></i>
                            </div>
                            <input type="text" name="login" id="login"
                                class="block w-full pl-12 pr-4 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#004080]/20 focus:border-[#004080] transition-all duration-300"
                                placeholder="Email ou numéro WhatsApp" value="{{ old('login') }}" required autofocus>
                            <x-input-error :messages="$errors->get('login')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="input-group relative transform hover:scale-[1.01] transition-transform duration-300"
                            x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock input-icon-animate text-gray-400"></i>
                            </div>
                            <input :type="show ? 'text' : 'password'" name="password" id="password"
                                class="block w-full pl-12 pr-12 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#004080]/20 focus:border-[#004080] transition-all duration-300"
                                placeholder="Mot de passe" required>
                            <button type="button"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center transition-transform hover:scale-110"
                                @click="show = !show">
                                <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"
                                    class="text-gray-400 hover:text-[#004080]"></i>
                            </button>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-[#004080] shadow-sm focus:ring-[#004080]"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-[#004080] hover:text-[#003366] transition-colors duration-300"
                                    href="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-[#004080] to-[#005c91] hover:from-[#003366] hover:to-[#004b76] text-white font-semibold py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center gap-2">
                            <span>Se connecter</span>
                            <i class="fas fa-sign-in-alt animate-float"></i>
                        </button>

                        <!-- Register Link -->
                        <div class="text-center transform hover:scale-105 transition-transform duration-300">
                            <p class="text-sm text-gray-600">
                                Pas encore de compte ?
                                <a href="{{ route('register') }}"
                                    class="font-medium text-[#004080] hover:text-[#003366] transition-colors duration-300 flex items-center justify-center gap-2 mt-2">
                                    <i class="fas fa-user-plus"></i>
                                    <span>Créer un compte</span>
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Mobile Footer Contact Info -->
                <div class="lg:hidden mt-6 text-center">
                    <p class="text-gray-500 text-sm">Besoin d'aide pour vous connecter?</p>
                    <div class="flex justify-center gap-4 mt-3">
                        <a href="https://wa.me/32465616645" class="flex items-center gap-2 text-[#004080]">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fab fa-whatsapp text-white"></i>
                            </div>
                        </a>
                        <a href="tel:+32465616645" class="flex items-center gap-2 text-[#004080]">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-phone-alt text-white"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Additional Information for Mobile -->
                <div class="lg:hidden mt-4 p-4 bg-gray-50 rounded-lg border border-gray-200 text-xs text-gray-600">
                    <p class="flex items-start">
                        <i class="fas fa-info-circle text-[#004080] mt-0.5 mr-2"></i>
                        Cette plateforme vous permet uniquement de suivre l'état de vos colis et l'historique de vos
                        transactions. Aucun paiement n'est effectué via l'application.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
