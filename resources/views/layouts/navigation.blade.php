<header x-data="{ open: false, userDropdown: false }" class="relative z-50">
    <!-- Notification Bar -->
    <div class="bg-gradient-to-r from-[#0077be] to-[#005c91] text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-white/[0.05] bg-[size:20px_20px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="flex justify-between h-12 items-center text-sm">
                <!-- Left Side -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="mailto:contact@diasporashoppingfly.com"
                       class="flex items-center space-x-2 hover:text-[#ffd700] transition-all duration-300 group">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                            <i class="fas fa-envelope text-sm"></i>
                        </span>
                        <span class="text-white/90 group-hover:text-white transition-colors">contact@diasporashoppingfly.com</span>
                    </a>
                    <div class="flex items-center space-x-2">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10">
                            <i class="fas fa-headset text-sm"></i>
                        </span>
                        <span class="text-white/90">Support 24/7</span>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-4">
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 hover:text-[#ffd700] transition-all duration-300">
                            <i class="fab fa-facebook text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 hover:text-[#ffd700] transition-all duration-300">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 hover:text-[#ffd700] transition-all duration-300">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-2 bg-white/10 px-4 py-1.5 rounded-full">
                        <i class="fas fa-globe-africa text-sm"></i>
                        <select class="bg-transparent border-none text-white focus:ring-0 text-sm cursor-pointer">
                            <option value="fr" class="text-gray-800">Français</option>
                            <option value="en" class="text-gray-800">English</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="bg-white border-b border-[#ffd700]/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center group">
                        <div class="pr-6 mr-6 border-r border-[#0077be]/10">
                            <img src="{{ asset('images/dsf.svg') }}" alt="DSF Logo"
                                 class="h-16 w-auto transform group-hover:scale-105 transition-all duration-500">
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="text-xl font-bold bg-gradient-to-r from-[#0077be] to-[#005c91] bg-clip-text text-transparent">
                                Diaspora Shopping Fly
                            </h1>
                        </div>
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="hidden lg:flex flex-1 max-w-2xl mx-8">
                    <div class="relative w-full group">
                        <input type="text"
                               placeholder="Rechercher un produit, une marque..."
                               class="w-full pl-12 pr-4 py-3 rounded-xl border border-[#0077be]/20 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be]/50 transition-all duration-300 text-sm">
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-[#0077be]/50 group-hover:text-[#0077be] transition-colors duration-300">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>

                <!-- Right Navigation -->
                <div class="flex items-center space-x-6">
                    <!-- Track Package -->
                    <a href="#tracking"
                       class="hidden md:flex items-center px-4 py-2.5 text-sm font-medium text-[#0077be] hover:text-[#005c91] bg-[#0077be]/5 hover:bg-[#0077be]/10 rounded-xl transition-all duration-300 group">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10 group-hover:bg-[#0077be]/20 mr-2">
                            <i class="fas fa-plane-departure text-sm transform group-hover:-rotate-12 transition-transform"></i>
                        </span>
                        <span>Suivi colis</span>
                    </a>

                    @auth
                        <!-- User Menu -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                    class="flex items-center px-4 py-2 space-x-3 text-sm font-medium text-[#0077be] border border-[#0077be]/20 rounded-xl hover:bg-[#0077be]/5 transition-all duration-300">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                                    <i class="fas fa-user-circle"></i>
                                </span>
                                <span>{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>

                            <!-- Dropdown -->
                            <div x-show="open"
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-48 rounded-xl bg-white shadow-lg border border-[#0077be]/10 py-2">
                                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-[#0077be]/5">
                                    <i class="fas fa-user-cog w-5 text-[#0077be]"></i>
                                    <span class="ml-3">Profile</span>
                                </a>
                                <a href="#" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-[#0077be]/5">
                                    <i class="fas fa-box w-5 text-[#0077be]"></i>
                                    <span class="ml-3">Mes commandes</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-4 py-2.5 text-sm text-gray-700 hover:bg-[#0077be]/5">
                                        <i class="fas fa-sign-out-alt w-5 text-[#0077be]"></i>
                                        <span class="ml-3">Déconnexion</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="hidden md:flex items-center space-x-4">
                            <a href="{{ route('login') }}"
                               class="px-4 py-2.5 text-sm font-medium text-[#0077be] border border-[#0077be]/20 rounded-xl hover:bg-[#0077be]/5 transition-all duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Connexion
                            </a>
                            <a href="{{ route('register') }}"
                               class="px-4 py-2.5 text-sm font-medium text-white bg-[#0077be] hover:bg-[#005c91] rounded-xl transition-all duration-300">
                                <i class="fas fa-user-plus mr-2"></i>
                                Inscription
                            </a>
                        </div>
                    @endauth

                    <!-- Ship Package Button -->
                    <a href="/create"
                       class="flex items-center px-6 py-2.5 bg-[#ffd700] text-[#0077be] rounded-xl hover:bg-[#ffd700]/90 transition-all duration-300 group">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10 group-hover:bg-[#0077be]/20 mr-2">
                            <i class="fas fa-box text-sm transform group-hover:rotate-12 transition-transform"></i>
                        </span>
                        <span class="hidden sm:inline font-medium">Expédier</span>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button @click="open = !open"
                            class="md:hidden w-10 h-10 flex items-center justify-center rounded-xl text-[#0077be] hover:bg-[#0077be]/5 focus:outline-none">
                        <i class="fas" :class="open ? 'fa-times' : 'fa-bars'"></i>
                    </button>
                </div>
            </div>

            <!-- Categories Navigation -->
            <nav class="hidden md:block border-t border-[#0077be]/10">
                <ul class="flex items-center justify-between py-4 text-sm">
                    <li>
                        <a href="/" class="flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300 group">
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                                <i class="fas fa-home"></i>
                            </span>
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300 group">
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                                <i class="fas fa-store"></i>
                            </span>
                            <span>Boutiques</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300 group">
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                                <i class="fas fa-tag"></i>
                            </span>
                            <span>Promotions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300 group">
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                                <i class="fas fa-cube"></i>
                            </span>
                            <span>Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300 group">
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span>À propos</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300 group">
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                                <i class="fas fa-phone-alt"></i>
                            </span>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="fixed inset-0 z-50">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/20 backdrop-blur-sm"></div>

        <!-- Menu Content -->
        <div class="relative bg-white h-full w-full md:max-w-md overflow-y-auto">
            <div class="p-6 space-y-6">
                <!-- Mobile Search -->
                <div class="relative">
                    <input type="text"
                           placeholder="Rechercher..."
                           class="w-full pl-12 pr-4 py-3 rounded-xl border border-[#0077be]/20 focus:border-[#0077be] focus:ring-1 focus:ring-[#0077be] text-sm">
                    <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-[#0077be]/50">
                        <i class="fas fa-search"></i>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="flex items-center justify-between gap-4">
                    <a href="#" class="flex-1 flex items-center justify-center px-4 py-3 bg-[#0077be]/5 text-[#0077be] rounded-xl hover:bg-[#0077be]/10 transition-all duration-300">
                        <i class="fas fa-plane-departure mr-2"></i>
                        <span class="text-sm font-medium">Suivi colis</span>
                    </a>
                    <a href="#" class="flex-1 flex items-center justify-center px-4 py-3 bg-[#ffd700] text-[#0077be] rounded-xl hover:bg-[#ffd700]/90 transition-all duration-300">
                        <i class="fas fa-box mr-2"></i>
                        <span class="text-sm font-medium">Expédier</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-2">
                    <a href="/" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-[#0077be]/5 text-[#0077be] transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="font-medium">Accueil</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-[#0077be]/5 text-[#0077be] transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-store"></i>
                        </span>
                        <span class="font-medium">Boutiques</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-[#0077be]/5 text-[#0077be] transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-tag"></i>
                        </span>
                        <span class="font-medium">Promotions</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-[#0077be]/5 text-[#0077be] transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-cube"></i>
                        </span>
                        <span class="font-medium">Services</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-[#0077be]/5 text-[#0077be] transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="font-medium">À propos</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-[#0077be]/5 text-[#0077be] transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <span class="font-medium">Contact</span>
                    </a>
                </nav>

                <!-- Mobile Auth -->
                @guest
                    <div class="space-y-3 pt-6 border-t border-[#0077be]/10">
                        <a href="{{ route('login') }}"
                           class="flex items-center justify-center w-full px-6 py-3 text-sm font-medium text-[#0077be] border border-[#0077be]/20 rounded-xl hover:bg-[#0077be]/5 transition-all duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Connexion
                        </a>
                        <a href="{{ route('register') }}"
                           class="flex items-center justify-center w-full px-6 py-3 text-sm font-medium text-white bg-[#0077be] hover:bg-[#005c91] rounded-xl transition-all duration-300">
                            <i class="fas fa-user-plus mr-2"></i>
                            Inscription
                        </a>
                    </div>
                @endguest

                <!-- Contact Info -->
                <div class="space-y-4 pt-6 border-t border-[#0077be]/10">
                    <a href="mailto:contact@diasporashoppingfly.com"
                       class="flex items-center space-x-3 text-sm text-[#0077be] hover:text-[#005c91] transition-colors duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span>contact@diasporashoppingfly.com</span>
                    </a>
                    <div class="flex items-center space-x-3 text-sm text-[#0077be]">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-headset"></i>
                        </span>
                        <span>Support 24/7</span>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="flex items-center justify-center space-x-6 pt-6 border-t border-[#0077be]/10">
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0077be]/10 text-[#0077be] hover:bg-[#0077be]/20 transition-all duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0077be]/10 text-[#0077be] hover:bg-[#0077be]/20 transition-all duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0077be]/10 text-[#0077be] hover:bg-[#0077be]/20 transition-all duration-300">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-grid-white {
            background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='1' height='1' fill='white'/%3E%3C/svg%3E");
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .hide-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</header>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
