<!-- Main Navigation Component -->
<div class="relative z-50" x-data="{
    mobileMenu: false,
    userMenu: false,
    isScrolled: false,
    alerts: @json($upcomingDepartures ?? [])
}" @scroll.window="isScrolled = window.pageYOffset > 50">

    <!-- Shipping Alert Banner - Design original maintenu -->
    <div class="bg-gradient-to-r from-[#0077be] to-[#005c91] relative overflow-hidden"
        :class="{ 'py-3': !isScrolled, 'py-2': isScrolled }">

        <!-- Desktop Alert Scroll -->
        <div class="hidden sm:block">
            <div class="relative overflow-hidden h-full">
                <div class="animate-marquee whitespace-nowrap flex items-center space-x-8 h-full">
                    <!-- First Set -->
                    <template x-for="(alert, index) in alerts" :key="index">
                        <div class="inline-flex items-center space-x-3 text-white px-4">
                            <i class="fas fa-plane-departure text-[#ffd700]"></i>
                            <span class="font-medium" x-text="alert.direction"></span>
                            <span class="text-[#ffd700] font-bold" x-text="alert.date"></span>
                            <template x-if="alert.is_limited">
                                <span class="bg-red-500 text-white px-2 py-0.5 rounded-full text-xs">
                                    Nombre de colis limités
                                </span>
                            </template>
                            <a href="{{ route('register') }}"
                                class="bg-[#ffd700] text-[#0077be] px-3 py-1 rounded-full text-sm font-bold hover:bg-white transition-colors duration-300">
                                Réserver
                            </a>
                        </div>
                    </template>

                    <!-- Shipping Info -->
                    <div class="inline-flex items-center space-x-6 text-white px-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-clock text-[#ffd700]"></i>
                            <span>5-7 jours</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-globe text-[#ffd700]"></i>
                            <span>Suivi en ligne</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-shield-alt text-[#ffd700]"></i>
                            <span>Colis assuré</span>
                        </div>
                    </div>

                    <!-- Duplicate for seamless loop -->
                    <template x-for="(alert, index) in alerts" :key="index + 'duplicate'">
                        <div class="inline-flex items-center space-x-3 text-white px-4">
                            <i class="fas fa-plane-departure text-[#ffd700]"></i>
                            <span class="font-medium" x-text="alert.direction"></span>
                            <span class="text-[#ffd700] font-bold" x-text="alert.date"></span>
                            <template x-if="alert.is_limited">
                                <span class="bg-red-500 text-white px-2 py-0.5 rounded-full text-xs">
                                    Nombre de colis limités
                                </span>
                            </template>
                            <a :href="'{{ route('home') }}?departure=' + alert.id"
                                class="bg-[#ffd700] text-[#0077be] px-3 py-1 rounded-full text-sm font-bold hover:bg-white transition-colors duration-300">
                                Réserver
                            </a>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Mobile Alert Scroll -->
        <div class="sm:hidden">
            <div class="relative overflow-hidden h-full">
                <div class="animate-marquee-mobile whitespace-nowrap flex items-center h-full">
                    <template x-for="(alert, index) in alerts" :key="index">
                        <div class="inline-flex items-center space-x-2 text-white px-3">
                            <i class="fas fa-plane-departure text-[#ffd700] text-xs"></i>
                            <span class="text-sm" x-text="alert.direction"></span>
                            <span class="text-[#ffd700] text-sm" x-text="alert.date"></span>
                            <a :href="'{{ route('home') }}?departure=' + alert.id"
                                class="bg-[#ffd700] text-[#0077be] px-2 py-0.5 rounded-full text-xs font-bold">
                                Réserver
                            </a>
                        </div>
                    </template>
                    <!-- Mobile Shipping Info -->
                    <div class="inline-flex items-center space-x-3 text-white px-3">
                        <div class="flex items-center space-x-1">
                            <i class="fas fa-clock text-[#ffd700] text-xs"></i>
                            <span class="text-sm">5-7j</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <i class="fas fa-shield-alt text-[#ffd700] text-xs"></i>
                            <span class="text-sm">Assuré</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="sticky top-0 bg-white border-b border-[#0077be]/10 transition-all duration-300"
        :class="{ 'shadow-lg': isScrolled }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between transition-all duration-300"
                :class="{ 'h-16': isScrolled, 'h-20': !isScrolled }">

                <!-- Logo Section - Design original maintenu -->
                <a href="{{ route('home') }}" class="flex items-center space-x-4 group">
                    <div class="pr-4 border-r border-[#0077be]/10">
                        <img src="{{ asset('images/dsf.svg') }}" alt="DSF Logo"
                            class="transform group-hover:scale-105 transition-all duration-500"
                            :class="{ 'h-8 w-auto': isScrolled, 'h-12 w-auto': !isScrolled }">
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="font-bold bg-gradient-to-r from-[#0077be] to-[#005c91] bg-clip-text text-transparent transition-all duration-300"
                            :class="{ 'text-lg': isScrolled, 'text-xl': !isScrolled }">
                            Diaspora Shopping & Fly
                        </h1>
                    </div>
                </a>

                <!-- Desktop Navigation - Design original avec icônes -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="group flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                            <i class="fas fa-home text-sm"></i>
                        </span>
                        <span class="text-sm font-medium">Accueil</span>
                    </a>
                    <a href="#"
                        class="group flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                            <i class="fas fa-store text-sm"></i>
                        </span>
                        <span class="text-sm font-medium">Boutiques</span>
                    </a>
                    <a href="#"
                        class="group flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                            <i class="fas fa-cube text-sm"></i>
                        </span>
                        <span class="text-sm font-medium">Services</span>
                    </a>
                    <a href="#"
                        class="group flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                            <i class="fas fa-info-circle text-sm"></i>
                        </span>
                        <span class="text-sm font-medium">À propos</span>
                    </a>
                    <a href="#"
                        class="group flex items-center space-x-2 text-[#0077be] hover:text-[#005c91] transition-all duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/5 group-hover:bg-[#0077be]/10">
                            <i class="fas fa-phone-alt text-sm"></i>
                        </span>
                        <span class="text-sm font-medium">Contact</span>
                    </a>
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
                                class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-[#0077be]/10 py-1 z-50">
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
                    class="lg:hidden w-10 h-10 flex items-center justify-center text-[#0077be] focus:outline-none">
                    <i class="fas text-xl" :class="mobileMenu ? 'fa-times' : 'fa-bars'"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenu"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/20 backdrop-blur-sm z-50 lg:hidden">

        <!-- Mobile Menu Content -->
        <div x-show="mobileMenu" @click.stop
             x-transition:enter="transform transition ease-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transform transition ease-in duration-300"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed inset-y-0 right-0 w-full max-w-sm bg-white shadow-xl overflow-y-auto">

            <!-- Mobile Menu Header -->
            <div class="p-4 border-b border-[#0077be]/10">
                <div class="flex items-center justify-between">
                    <img src="{{ asset('images/dsf.svg') }}" alt="DSF Logo" class="h-8 w-auto">
                    <button @click="mobileMenu = false" class="text-[#0077be] hover:text-[#005c91]">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Navigation -->
            <div class="px-4 py-6 space-y-6">
                <!-- Mobile Shipping Alerts Summary -->
                <div class="bg-[#0077be]/5 rounded-xl p-4 space-y-3">
                    <h3 class="text-[#0077be] font-bold text-sm">Prochains départs</h3>
                    <div class="space-y-2">
                        <template x-for="(alert, index) in alerts.slice(0, 2)" :key="index">
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-plane-departure text-[#0077be]"></i>
                                    <span x-text="alert.direction"></span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-[#0077be] font-medium" x-text="alert.date"></span>
                                    <a :href="'{{ route('home') }}?departure=' + alert.id"
                                       class="bg-[#0077be] text-white px-2 py-1 rounded-full text-xs">
                                        Réserver
                                    </a>
                                </div>
                            </div>
                        </template>
                        <div class="flex justify-between text-xs text-gray-600 pt-2 border-t border-[#0077be]/10">
                            <span class="flex items-center">
                                <i class="fas fa-clock mr-1"></i> 5-7 jours
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-shield-alt mr-1"></i> Colis assuré
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Mobile Navigation Links -->
                <nav class="space-y-2">
                    <a href="{{ route('home') }}" @click="mobileMenu = false"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl text-[#0077be] hover:bg-[#0077be]/5 transition-colors duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="font-medium">Accueil</span>
                    </a>
                    <a href="#" @click="mobileMenu = false"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl text-[#0077be] hover:bg-[#0077be]/5 transition-colors duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-store"></i>
                        </span>
                        <span class="font-medium">Boutiques</span>
                    </a>
                    <a href="#" @click="mobileMenu = false"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl text-[#0077be] hover:bg-[#0077be]/5 transition-colors duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-cube"></i>
                        </span>
                        <span class="font-medium">Services</span>
                    </a>
                    <a href="#" @click="mobileMenu = false"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl text-[#0077be] hover:bg-[#0077be]/5 transition-colors duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="font-medium">À propos</span>
                    </a>
                    <a href="#" @click="mobileMenu = false"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl text-[#0077be] hover:bg-[#0077be]/5 transition-colors duration-300">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <span class="font-medium">Contact</span>
                    </a>
                </nav>

                <!-- Mobile Auth -->
                <div class="space-y-3 pt-6 border-t border-[#0077be]/10">
                    @auth
                        <!-- User Info -->
                        <div class="px-4 py-3 bg-[#0077be]/5 rounded-xl">
                            <div class="flex items-center space-x-3">
                                <span class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0077be]/10">
                                    <i class="fas fa-user-circle text-[#0077be] text-xl"></i>
                                </span>
                                <div>
                                    <div class="font-medium">{{ Auth::user()->name }}</div>
                                    <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- User Actions -->
                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center space-x-3 px-4 py-3 rounded-xl text-[#0077be] hover:bg-[#0077be]/5">
                            <i class="fas fa-user-cog w-5"></i>
                            <span>Profile</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl text-[#0077be] hover:bg-[#0077be]/5">
                                <i class="fas fa-sign-out-alt w-5"></i>
                                <span>Déconnexion</span>
                            </button>
                        </form>
                    @else
                        <div class="grid gap-3 px-4">
                            <a href="{{ route('login') }}"
                                class="flex items-center justify-center py-3 px-4 rounded-xl border-2 border-[#0077be] text-[#0077be] hover:bg-[#0077be]/5 transition-colors duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                <span>Connexion</span>
                            </a>
                            <a href="{{ route('register') }}"
                                class="flex items-center justify-center py-3 px-4 rounded-xl bg-[#0077be] text-white hover:bg-[#005c91] transition-colors duration-300">
                                <i class="fas fa-user-plus mr-2"></i>
                                <span>Inscription</span>
                            </a>
                        </div>
                    @endauth
                </div>

                <!-- Mobile Contact Info -->
                <div class="space-y-3 pt-6 border-t border-[#0077be]/10">
                    <div class="px-4 space-y-3">
                        <a href="mailto:contact@diasporashoppingfly.com"
                            class="flex items-center space-x-3 text-[#0077be]">
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="text-sm">contact@diasporashoppingfly.com</span>
                        </a>
                        <div class="flex items-center space-x-3 text-[#0077be]">
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#0077be]/10">
                                <i class="fas fa-headset"></i>
                            </span>
                            <span class="text-sm">Support 24/7</span>
                        </div>
                    </div>
                </div>

                <!-- Mobile Social & Language -->
                <div class="pt-6 border-t border-[#0077be]/10">
                    <div class="px-4">
                        <div class="flex justify-center space-x-4 mb-4">
                            <a href="#"
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0077be]/10 text-[#0077be] hover:bg-[#0077be]/20">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0077be]/10 text-[#0077be] hover:bg-[#0077be]/20">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0077be]/10 text-[#0077be] hover:bg-[#0077be]/20">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                        <select
                            class="w-full bg-[#0077be]/5 text-[#0077be] border-none rounded-xl px-4 py-3 focus:ring-1 focus:ring-[#0077be]">
                            <option value="fr">Français</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Animations marquee optimisées */
@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

@keyframes marquee-mobile {
    0% { transform: translateX(0); }
    100% { transform: translateX(-100%); }
}

.animate-marquee {
    animation: marquee 40s linear infinite;
    will-change: transform;
    backface-visibility: hidden;
}

.animate-marquee-mobile {
    animation: marquee-mobile 20s linear infinite;
    will-change: transform;
    backface-visibility: hidden;
}

/* Hover effects optimisés */
@media (hover: hover) {
    .hover\:scale-105:hover {
        transform: scale(1.05);
    }
}

/* Mobile optimizations */
@media (max-width: 640px) {
    .animate-marquee {
        animation-duration: 20s;
    }

    .mobile-nav-link {
        min-height: 44px;
    }
}

/* Reduce motion preferences */
@media (prefers-reduced-motion: reduce) {
    .animate-marquee,
    .animate-marquee-mobile {
        animation: none;
    }

    .transition-all {
        transition: none;
    }
}

/* Touch device optimizations */
@media (hover: none) {
    .mobile-touch-target {
        min-height: 44px;
        min-width: 44px;
    }
}

/* Scrollbar styling */
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}

.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* Z-index fixes pour les dropdowns */
.relative {
    position: relative;
}

/* Performance optimizations */
.will-change-transform {
    will-change: transform;
}

.backface-hidden {
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
}
</style>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
