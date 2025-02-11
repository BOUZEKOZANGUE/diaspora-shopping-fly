<!-- Navigation Bar -->
<div class="relative z-50" x-data="{ mobileMenu: false, userMenu: false }">
    <!-- Top Bar -->
    <div class="bg-gradient-to-r from-[#0077be] to-[#005c91] relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-white/[0.05] bg-[size:20px_20px]"></div>
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col sm:flex-row sm:justify-between py-3 sm:py-2 text-white">
                <!-- Contact Info -->
                <div class="flex justify-center sm:justify-start items-center space-x-4 mb-2 sm:mb-0">
                    <a href="mailto:contact@diasporashoppingfly.com"
                        class="group flex items-center space-x-2 hover:text-[#ffd700] transition-all duration-300">
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 group-hover:bg-white/20">
                            <i class="fas fa-envelope text-sm"></i>
                        </span>
                        <span
                            class="text-sm truncate max-w-[200px] sm:max-w-none">contact@diasporashoppingfly.com</span>
                    </a>
                    <div class="hidden sm:flex items-center space-x-2">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10">
                            <i class="fas fa-headset text-sm"></i>
                        </span>
                        <span class="text-sm">Support 24/7</span>
                    </div>
                </div>

                <!-- Social & Language -->
                <div class="flex justify-center sm:justify-end items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <a href="#"
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 hover:text-[#ffd700] transition-all duration-300">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 hover:text-[#ffd700] transition-all duration-300">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 hover:text-[#ffd700] transition-all duration-300">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                    </div>
                    <select
                        class="bg-white/10 text-sm text-white border-none rounded-full px-4 py-1 focus:ring-0 cursor-pointer">
                        <option value="fr" class="text-gray-800">Français</option>
                        <option value="en" class="text-gray-800">English</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="bg-white border-b border-[#0077be]/10 sticky top-0">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16 sm:h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-4 group">
                    <div class="pr-4 border-r border-[#0077be]/10">
                        <img src="{{ asset('images/dsf.svg') }}" alt="DSF Logo"
                            class="h-10 sm:h-12 w-auto transform group-hover:scale-105 transition-all duration-500">
                    </div>
                    <div class="hidden sm:block">
                        <h1
                            class="text-xl font-bold bg-gradient-to-r from-[#0077be] to-[#005c91] bg-clip-text text-transparent">
                            Diaspora Shopping & Fly
                        </h1>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    @foreach ([['route' => '/', 'icon' => 'home', 'text' => 'Accueil'], ['route' => '#', 'icon' => 'store', 'text' => 'Boutiques'], ['route' => '#', 'icon' => 'cube', 'text' => 'Services'], ['route' => '#', 'icon' => 'info-circle', 'text' => 'À propos'], ['route' => '#', 'icon' => 'phone-alt', 'text' => 'Contact']] as $item)
                        <a href="{{ $item['route'] }}"
                            class="group flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300">
                            <span
                                class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                                <i class="fas fa-{{ $item['icon'] }} text-sm"></i>
                            </span>
                            <span class="text-sm font-medium">{{ $item['text'] }}</span>
                        </a>
                    @endforeach
                </nav>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-3">
                    @auth
                        <div class="relative" x-data="{ userMenu: false }" @click.away="userMenu = false">
                            <button @click="userMenu = !userMenu"
                                class="flex items-center space-x-2 px-4 py-2 text-sm font-medium text-[#0077be] hover:bg-[#0077be]/5 rounded-xl transition-all duration-300">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                                    <i class="fas fa-user-circle"></i>
                                </span>
                                <span>{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs transition-transform"
                                    :class="{ 'rotate-180': userMenu }"></i>
                            </button>

                            <!-- User Dropdown -->
                            <div x-show="userMenu" x-transition
                                class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-[#0077be]/10 py-1">
                                <a href="{{ route('profile.edit') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-[#0077be]/5">
                                    <i class="fas fa-user-cog w-5 text-[#0077be]"></i>
                                    <span class="ml-2">Profile</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="border-t border-[#0077be]/10">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-[#0077be]/5">
                                        <i class="fas fa-sign-out-alt w-5 text-[#0077be]"></i>
                                        <span class="ml-2">Déconnexion</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="flex items-center px-4 py-2 text-sm font-medium text-[#0077be] hover:bg-[#0077be]/5 rounded-xl transition-all duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            <span>Connexion</span>
                        </a>
                        <a href="{{ route('register') }}"
                            class="flex items-center px-4 py-2 text-sm font-medium text-white bg-[#0077be] hover:bg-[#005c91] rounded-xl transition-all duration-300">
                            <i class="fas fa-user-plus mr-2"></i>
                            <span>Inscription</span>
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenu = !mobileMenu" type="button"
                    class="lg:hidden w-10 h-10 flex items-center justify-center text-[#0077be] focus:outline-none"
                    aria-label="Toggle mobile menu">
                    <i class="fas" :class="mobileMenu ? 'fa-times' : 'fa-bars'"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div x-show="mobileMenu" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="mobileMenu = false"
        class="lg:hidden fixed inset-0 z-50 bg-black/20 backdrop-blur-sm">

        <!-- Mobile Menu Content -->
        <div x-show="mobileMenu" @click.stop
            class="relative h-full w-full max-w-sm ml-auto bg-white shadow-xl overflow-y-auto"
            x-transition:enter="transform transition ease-out duration-300" x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="transform transition ease-in duration-300"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">

            <!-- Close button for mobile menu -->
            <button @click="mobileMenu = false"
                class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center text-[#0077be] hover:text-[#005c91]"
                aria-label="Close menu">
                <i class="fas fa-times text-xl"></i>
            </button>

            <div class="p-6 space-y-6 overflow-y-auto max-h-screen">
                <!-- Mobile User Info -->
                @auth
                    <div class="flex items-center space-x-3 px-4 py-3 bg-[#0077be]/5 rounded-xl">
                        <span class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-user-circle text-[#0077be]"></i>
                        </span>
                        <div>
                            <div class="font-medium text-gray-900">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                @endauth

                <!-- Mobile Navigation -->
                <nav class="space-y-1">
                    @foreach ([['route' => '/', 'icon' => 'home', 'text' => 'Accueil'], ['route' => '#', 'icon' => 'store', 'text' => 'Boutiques'], ['route' => '#', 'icon' => 'cube', 'text' => 'Services'], ['route' => '#', 'icon' => 'info-circle', 'text' => 'À propos'], ['route' => '#', 'icon' => 'phone-alt', 'text' => 'Contact']] as $item)
                        <a href="{{ $item['route'] }}" @click="mobileMenu = false"
                            class="flex items-center space-x-3 px-4 py-3 text-[#0077be] hover:bg-[#0077be]/5 rounded-xl transition-all duration-300">
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                                <i class="fas fa-{{ $item['icon'] }}"></i>
                            </span>
                            <span class="font-medium">{{ $item['text'] }}</span>
                        </a>
                    @endforeach
                </nav>

                <!-- Mobile Auth -->
                @guest
                    <div class="space-y-2 pt-6 border-t border-[#0077be]/10">
                        <a href="{{ route('login') }}" @click="mobileMenu = false"
                            class="flex items-center justify-center w-full px-6 py-3 text-sm font-medium text-[#0077be] border border-[#0077be]/20 rounded-xl hover:bg-[#0077be]/5 transition-all duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Connexion
                        </a>
                        <a href="{{ route('register') }}" @click="mobileMenu = false"
                            class="flex items-center justify-center w-full px-6 py-3 text-sm font-medium text-white bg-[#0077be] hover:bg-[#005c91] rounded-xl transition-all duration-300">
                            <i class="fas fa-user-plus mr-2"></i>
                            Inscription
                        </a>
                    </div>
                @endguest

                <!-- Mobile Contact -->
                <div class="space-y-3 pt-6 border-t border-[#0077be]/10">
                    <a href="mailto:contact@diasporashoppingfly.com"
                        class="flex items-center space-x-3 px-4 py-2 text-sm text-[#0077be] hover:bg-[#0077be]/5 rounded-xl transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span>contact@diasporashoppingfly.com</span>
                    </a>
                    <div class="flex items-center space-x-3 px-4 py-2 text-sm text-[#0077be]">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-headset"></i>
                        </span>
                        <span>Support 24/7</span>
                    </div>
                </div>

                <!-- Mobile Social -->
                <div class="pt-6 border-t border-[#0077be]/10">
                    <div class="flex justify-center space-x-4">
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0077be]/10 hover:bg-[#0077be]/20 text-[#0077be] hover:text-[#005c91] transition-all duration-300">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0077be]/10 hover:bg-[#0077be]/20 text-[#0077be] hover:text-[#005c91] transition-all duration-300">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0077be]/10 hover:bg-[#0077be]/20 text-[#0077be] hover:text-[#005c91] transition-all duration-300">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Mobile Language Selector -->
                <div class="pt-6 border-t border-[#0077be]/10">
                    <select
                        class="w-full bg-[#0077be]/5 text-[#0077be] border-none rounded-xl px-4 py-3 focus:ring-1 focus:ring-[#0077be] cursor-pointer">
                        <option value="fr">Français</option>
                        <option value="en">English</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Style pour la grille en arrière-plan */
    .bg-grid-white {
        background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='1' height='1' fill='white'/%3E%3C/svg%3E");
    }

    /* Styles pour les transitions fluides */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    /* Style pour masquer la scrollbar tout en gardant la fonctionnalité */
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Styles pour améliorer la responsivité */
    @media (max-width: 1023px) {
        .mobile-menu-open {
            overflow: hidden;
        }
    }

    /* Assurer que le menu mobile est toujours accessible */
    .mobile-menu {
        max-height: 100vh;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }

    /* Améliorer la zone de clic pour les appareils tactiles */
    .mobile-nav-link {
        min-height: 44px;
    }

    /* Styles pour les hover states */
    @media (hover: hover) {
        .hover\:scale-105:hover {
            transform: scale(1.05);
        }
    }

    /* Styles pour améliorer l'accessibilité */
    @media (prefers-reduced-motion: reduce) {
        .transition-all {
            transition: none;
        }
    }
</style>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navigation', () => ({
            mobileMenu: false,
            userMenu: false,

            init() {
                // Gestion du scroll lors de l'ouverture/fermeture du menu
                this.$watch('mobileMenu', (value) => {
                    document.body.style.overflow = value ? 'hidden' : '';
                });

                // Fermeture du menu mobile lors du redimensionnement de la fenêtre
                window.addEventListener('resize', () => {
                    if (window.innerWidth >=
                        1024) { // 1024px correspond à lg: dans Tailwind
                        this.mobileMenu = false;
                        document.body.style.overflow = '';
                    }
                });

                // Fermeture du menu avec la touche Escape
                window.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        this.mobileMenu = false;
                        this.userMenu = false;
                    }
                });
            },

            closeMobileMenu() {
                this.mobileMenu = false;
                document.body.style.overflow = '';
            }
        }));
    });
</script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
