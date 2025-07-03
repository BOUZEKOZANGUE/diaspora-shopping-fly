{{-- resources/views/components/services-section.blade.php --}}

<section class="py-24 bg-gradient-to-b from-blue-50 to-white relative overflow-hidden">
    <!-- Éléments décoratifs de fond -->
    <div class="absolute inset-0 bg-grid-slate-100 opacity-10"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#004080_1px,transparent_1px)] bg-[size:40px_40px] opacity-[0.15]"></div>

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

            <!-- Fonctionnalités de Suivi -->
            <div class="mt-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl shadow-lg p-8 text-white hover:shadow-xl transition-all duration-300">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div class="space-y-6">
                        <h3 class="text-2xl font-bold">Suivez Vos Colis en Temps Réel</h3>
                        <div class="space-y-4">
                            <p class="text-blue-100">
                                Accédez à votre espace personnel pour suivre vos expéditions et recevoir des notifications en temps réel.
                            </p>
                            <ul class="space-y-3">
                                <li class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Notifications automatiques à chaque étape</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Interface de suivi intuitive</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Historique complet de vos envois</span>
                                </li>
                            </ul>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="/register" class="inline-flex items-center px-6 py-3 bg-white text-blue-600 rounded-lg hover:bg-blue-50 transition-colors font-medium">
                                Créer un compte
                            </a>
                            <a href="/login" class="inline-flex items-center px-6 py-3 border-2 border-white text-white rounded-lg hover:bg-white/10 transition-colors font-medium">
                                Se connecter
                            </a>
                        </div>
                    </div>
                    <div class="relative hidden md:grid grid-cols-2 gap-4">
                        <div class="transform rotate-2 transition-transform hover:rotate-0 duration-300">
                            <img src="/images/DASHBOARD1.jpeg" alt="Interface de suivi" class="w-full rounded-lg shadow-lg">
                        </div>
                        <div class="transform -rotate-2 transition-transform hover:rotate-0 duration-300 mt-8">
                            <img src="/images/suivi.jpeg" alt="Interface de suivi" class="w-full rounded-lg shadow-lg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Script d'animation au scroll -->
            <script>
                function startShipment() {
                    window.location.href = '/expeditions/nouveau';
                }

                document.addEventListener('DOMContentLoaded', function () {
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
                    animateOnScroll();
                });
            </script>
        </div>
    </div>
</section>
