@props(['package'])

<x-app-layout>
    @push('styles')
        @vite('resources/css/app.css')
    @endpush

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush

    <div x-data="{ isVisible: false }" x-init="setTimeout(() => { isVisible = true }, 100);
    gsap.from('.card', {
        duration: 0.8,
        y: 50,
        opacity: 0,
        stagger: 0.2,
        ease: 'power3.out'
    })"
        class="min-h-screen bg-gradient-to-br from-[#0077be] via-[#0077be] to-[#005c91]">

        <!-- Header amélioré -->
        <header
            class="py-6 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-[#0077be] to-[#005c91] shadow-2xl border-b border-[#ffd700]/30">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div
                        class="p-3 bg-[#ffd700]/10 rounded-xl backdrop-blur-sm transform hover:rotate-12 transition-transform duration-300 border border-[#ffd700]/30">
                        <i class="fas fa-box-open text-3xl text-[#ffd700]"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-[#ffd700]">
                            Détails du Colis
                        </h1>
                        <p class="text-white/80 text-sm mt-1">Service Express DSF</p>
                    </div>
                </div>
                <div
                    class="hidden md:flex items-center space-x-3 bg-[#ffd700]/10 px-4 py-2 rounded-xl border border-[#ffd700]/30">
                    <i class="fas fa-clock text-[#ffd700]"></i>
                    <span class="text-white">Mise à jour:</span>
                    <span class="text-[#ffd700] font-medium">{{ $package->updated_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- Package Info Card - 8 colonnes -->
                    <div class="lg:col-span-8">
                        <div
                            class="card bg-white/5 backdrop-blur-md rounded-2xl shadow-2xl border border-[#ffd700]/20 overflow-hidden">
                            <!-- Timeline de statut améliorée -->
                            <div
                                class="bg-gradient-to-r from-[#ffd700]/20 to-transparent p-6 border-b border-[#ffd700]/20">
                                <h2 class="text-2xl font-semibold text-[#ffd700] flex items-center space-x-3 mb-6">
                                    <i class="fas fa-shipping-fast"></i>
                                    <span>Progression de la livraison</span>
                                </h2>

                                <div class="relative">
                                    @php
                                        $statusSteps = [
                                            'registered' => ['icon' => '📋', 'label' => 'Enregistré'],
                                            'processing' => ['icon' => '🏭', 'label' => 'En préparation'],
                                            'in_transit' => ['icon' => '🚚', 'label' => 'En transit'],
                                            'delivered' => ['icon' => '✅', 'label' => 'Livré'],
                                        ];
                                        $currentStatus = $package->status;
                                        $currentFound = false;
                                    @endphp

                                    <div
                                        class="h-2 bg-[#ffd700]/20 absolute top-1/2 left-0 right-0 -translate-y-1/2 rounded-full">
                                        <div class="h-full bg-[#ffd700] rounded-full transition-all duration-500"
                                            style="width: {{ array_search($currentStatus, array_keys($statusSteps)) * 33.33 }}%">
                                        </div>
                                    </div>

                                    <div class="relative flex justify-between">
                                        @foreach ($statusSteps as $status => $info)
                                            @php
                                                if ($status === $currentStatus) {
                                                    $currentFound = true;
                                                }
                                                $isActive = $currentFound ? false : true;
                                                $isPast = $status === $currentStatus || !$currentFound;
                                            @endphp

                                            <div class="text-center">
                                                <div
                                                    class="w-12 h-12 mx-auto flex items-center justify-center rounded-full {{ $isPast ? 'bg-[#ffd700]' : 'bg-[#ffd700]/20' }} mb-2 shadow-lg">
                                                    <span class="text-2xl">{{ $info['icon'] }}</span>
                                                </div>
                                                <span
                                                    class="block text-sm {{ $isPast ? 'text-[#ffd700]' : 'text-white/60' }} font-medium">
                                                    {{ $info['label'] }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                <!-- Informations principales -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Colonne gauche -->
                                    <div class="space-y-4">
                                        <!-- Tracking Number -->
                                        <div
                                            class="group p-4 bg-[#ffd700]/5 hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 border border-[#ffd700]/20">
                                            <label class="text-[#ffd700] font-medium mb-2 flex items-center">
                                                <i class="fas fa-barcode mr-2"></i>
                                                Numéro de suivi
                                            </label>
                                            <p class="text-xl font-mono font-semibold text-white tracking-wide">
                                                {{ $package->tracking_number }}
                                            </p>
                                        </div>

                                        <!-- Price -->
                                        <div
                                            class="group p-4 bg-[#ffd700]/5 hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 border border-[#ffd700]/20">
                                            <label class="text-[#ffd700] font-medium mb-2 flex items-center">
                                                <i class="fas fa-tag mr-2"></i>
                                                Coût d'expédition
                                            </label>
                                            <p class="text-xl font-semibold text-white">
                                                {{ number_format($package->price, 2) }} €
                                            </p>
                                        </div>

                                        <!-- Weight -->
                                        <div
                                            class="group p-4 bg-[#ffd700]/5 hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 border border-[#ffd700]/20">
                                            <label class="text-[#ffd700] font-medium mb-2 flex items-center">
                                                <i class="fas fa-weight mr-2"></i>
                                                Poids
                                            </label>
                                            <p class="text-xl font-semibold text-white">
                                                {{ $package->weight }} {{ $package->weight_unit }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Colonne droite -->
                                    <div class="space-y-4">
                                        <!-- Estimated Delivery -->
                                        <div
                                            class="group p-4 bg-[#ffd700]/5 hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 border border-[#ffd700]/20">
                                            <label class="text-[#ffd700] font-medium mb-2 flex items-center">
                                                <i class="fas fa-calendar-alt mr-2"></i>
                                                Livraison estimée
                                            </label>
                                            <p class="text-xl font-semibold text-white">
                                                {{ $package->estimated_delivery_date ? $package->estimated_delivery_date->format('d/m/Y') : 'En calcul...' }}
                                            </p>
                                        </div>

                                        <!-- Service Type -->
                                        <div
                                            class="group p-4 bg-[#ffd700]/5 hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 border border-[#ffd700]/20">
                                            <label class="text-[#ffd700] font-medium mb-2 flex items-center">
                                                <i class="fas fa-rocket mr-2"></i>
                                                Type de service
                                            </label>
                                            <p class="text-xl font-semibold text-white flex items-center">
                                                <span
                                                    class="bg-[#ffd700]/20 px-3 py-1 rounded-full text-[#ffd700] text-sm mr-2">Express</span>
                                                2-3 jours ouvrés
                                            </p>
                                        </div>

                                        <!-- Created Date -->
                                        <div
                                            class="group p-4 bg-[#ffd700]/5 hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 border border-[#ffd700]/20">
                                            <label class="text-[#ffd700] font-medium mb-2 flex items-center">
                                                <i class="fas fa-clock mr-2"></i>
                                                Date de création
                                            </label>
                                            <p class="text-xl font-semibold text-white">
                                                {{ $package->created_at->format('d/m/Y H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Address Section -->
                                <div
                                    class="p-4 bg-[#ffd700]/5 hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 border border-[#ffd700]/20">
                                    <label class="text-[#ffd700] font-medium mb-2 flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        Adresse de livraison
                                    </label>
                                    <p class="text-lg font-medium text-white">
                                        {{ $package->destination_address }}
                                    </p>
                                </div>

                                <!-- Content Description -->
                                <div
                                    class="p-4 bg-[#ffd700]/5 hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 border border-[#ffd700]/20">
                                    <label class="text-[#ffd700] font-medium mb-2 flex items-center">
                                        <i class="fas fa-box-open mr-2"></i>
                                        Description du contenu
                                    </label>
                                    <p class="text-lg text-white">
                                        {{ $package->description_colis }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Side Panel - 4 colonnes -->
                    <div class="lg:col-span-4 space-y-8">
                        <!-- Support Contact Card -->
                        <div class="card bg-white/5 backdrop-blur-md rounded-2xl shadow-2xl border border-[#ffd700]/20">
                            <div
                                class="bg-gradient-to-r from-[#ffd700]/20 to-transparent p-6 border-b border-[#ffd700]/20">
                                <h2 class="text-xl font-semibold text-[#ffd700] flex items-center space-x-3">
                                    <i class="fas fa-headset"></i>
                                    <span>Support 24/7</span>
                                </h2>
                            </div>

                            <div class="p-6 space-y-6">
                                <!-- Contact Buttons -->
                                <div class="space-y-4">
                                    <!-- WhatsApp -->
                                    <a href="https://wa.me/votre_numero?text=Suivi%20colis%20{{ $package->tracking_number }}"
                                        target="_blank"
                                        class="flex items-center space-x-3 p-4 bg-[#ffd700]/5 hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 border border-[#ffd700]/20">
                                        <div
                                            class="w-10 h-10 flex items-center justify-center rounded-full bg-[#25D366]/10">
                                            <i class="fab fa-whatsapp text-2xl text-[#ffd700]"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="text-[#ffd700] font-medium">WhatsApp</h3>
                                            <p class="text-sm text-white/60">Support instantané</p>
                                        </div>
                                        <i class="fas fa-arrow-right text-[#ffd700]"></i>
                                    </a>

                                    <!-- Telegram -->
                                    <a href="https://t.me/votre_compte?start={{ $package->tracking_number }}"
                                        target="_blank"
                                        class="flex items-center space-x-3 p-4 bg-[#ffd700]/5 hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 border border-[#ffd700]/20">
                                        <div
                                            class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0088cc]/10">
                                            <i class="fab fa-telegram text-2xl text-[#ffd700]"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="text-[#ffd700] font-medium">Telegram</h3>
                                            <p class="text-sm text-white/60">Chat en direct</p>
                                        </div>
                                        <i class="fas fa-arrow-right text-[#ffd700]"></i>
                                    </a>

                                    <!-- Email -->
                                    <a href="mailto:support@dsf.com?subject=Suivi%20colis%20{{ $package->tracking_number }}"
                                        class="flex items-center space-x-3 p-4 bg-[#ffd700]/5 hover:bg-[#ffd700]/10 rounded-xl transition-all duration-300 border border-[#ffd700]/20">
                                        <div
                                            class="w-10 h-10 flex items-center justify-center rounded-full bg-[#ffd700]/10">
                                            <i class="fas fa-envelope text-xl text-[#ffd700]"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="text-[#ffd700] font-medium">Email</h3>
                                            <p class="text-sm text-white/60">support@dsf.com</p>
                                        </div>
                                        <i class="fas fa-arrow-right text-[#ffd700]"></i>
                                    </a>
                                </div>

                                <!-- Support Note -->
                                <div class="p-4 bg-[#ffd700]/5 rounded-xl border border-[#ffd700]/20">
                                    <div class="flex items-start space-x-3">
                                        <i class="fas fa-info-circle text-[#ffd700] mt-1"></i>
                                        <div class="space-y-2">
                                            <p class="text-sm text-white/80">
                                                Mentionnez votre numéro de suivi pour un traitement plus rapide :
                                            </p>
                                            <code
                                                class="block p-2 bg-[#0077be] rounded-lg text-[#ffd700] font-mono text-sm">
                                                {{ $package->tracking_number }}
                                            </code>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delivery Updates Card -->
                        <div
                            class="card bg-white/5 backdrop-blur-md rounded-2xl shadow-2xl border border-[#ffd700]/20">
                            <div
                                class="bg-gradient-to-r from-[#ffd700]/20 to-transparent p-6 border-b border-[#ffd700]/20">
                                <h2 class="text-xl font-semibold text-[#ffd700] flex items-center space-x-3">
                                    <i class="fas fa-history"></i>
                                    <span>Historique de livraison</span>
                                </h2>
                            </div>

                            <div class="p-6">
                                <div class="relative">
                                    <div class="absolute top-0 bottom-0 left-4 w-0.5 bg-[#ffd700]/20"></div>
                                    <div class="space-y-6">
                                        @foreach ($package->tracking_updates ?? [] as $update)
                                            <div class="relative flex items-start">
                                                <div
                                                    class="absolute left-4 mt-1.5 w-3 h-3 rounded-full border-2 border-[#ffd700] bg-[#0077be] transform -translate-x-1.5">
                                                </div>
                                                <div class="ml-8">
                                                    <p class="text-[#ffd700] font-medium">{{ $update->status }}</p>
                                                    <p class="text-white/80">{{ $update->location }}</p>
                                                    <p class="text-sm text-white/60">
                                                        {{ $update->timestamp->format('d/m/Y H:i') }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-12 flex justify-center">
                    <a href="{{ route('dashboard') }}"
                        class="group inline-flex items-center px-8 py-4 bg-[#ffd700] hover:bg-[#ffd700]/90 text-[#0077be] font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <i
                            class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"></i>
                        Retour au tableau de bord
                    </a>
                </div>
            </div>
        </main>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Animation pour les cartes au scroll
                const cards = document.querySelectorAll('.card');
                const observer = new IntersectionObserver(
                    (entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('animate-fade-in-up');
                                observer.unobserve(entry.target);
                            }
                        });
                    }, {
                        threshold: 0.1
                    }
                );

                cards.forEach(card => observer.observe(card));

                // Animation pour les éléments au hover avec GSAP
                const animateHover = (element) => {
                    element.addEventListener('mouseenter', () => {
                        gsap.to(element, {
                            scale: 1.02,
                            duration: 0.3,
                            ease: 'power2.out'
                        });
                    });

                    element.addEventListener('mouseleave', () => {
                        gsap.to(element, {
                            scale: 1,
                            duration: 0.3,
                            ease: 'power2.out'
                        });
                    });
                };

                document.querySelectorAll('.group').forEach(animateHover);

                // Animation initiale
                gsap.from('.card', {
                    duration: 0.8,
                    y: 50,
                    opacity: 0,
                    stagger: 0.2,
                    ease: 'power3.out'
                });
            });
        </script>
    @endpush

    @push('styles')
        <style>
            @keyframes fade-in-up {
                0% {
                    opacity: 0;
                    transform: translateY(20px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in-up {
                animation: fade-in-up 0.6s ease-out forwards;
            }

            .animate-fade-in-down {
                animation: fade-in-down 0.6s ease-out forwards;
            }

            @keyframes fade-in-down {
                0% {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Glassmorphism effects */
            .backdrop-blur-md {
                backdrop-filter: blur(12px);
            }

            /* Smooth scrolling */
            html {
                scroll-behavior: smooth;
            }
        </style>
    @endpush
</x-app-layout>
