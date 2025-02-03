<footer class="relative overflow-hidden">
    <!-- Background with gradient and pattern -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#0077be] to-[#005c91]"></div>
    <div class="absolute inset-0 bg-grid-white/[0.05] bg-[size:20px_20px]"></div>

    <!-- Newsletter Section -->
    <div class="relative border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="text-center md:text-left">
                    <h2 class="text-2xl font-bold text-white mb-2">Restez informé</h2>
                    <p class="text-blue-100">Recevez nos offres spéciales et actualités</p>
                </div>
                <div class="w-full md:w-auto">
                    <form class="flex flex-col sm:flex-row gap-4">
                        <input type="email" placeholder="Votre email" class="w-full sm:w-80 px-4 py-3 rounded-xl border-2 border-white/20 bg-white/10 text-white placeholder-white/50 focus:border-[#ffd700] focus:ring-1 focus:ring-[#ffd700]">
                        <button class="px-6 py-3 bg-[#ffd700] text-[#0077be] font-semibold rounded-xl hover:bg-[#ffd700]/90 transition-all duration-300 whitespace-nowrap">
                            S'abonner
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer Content -->
    <div class="relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
                <!-- Company Info Section -->
                <div class="md:col-span-3">
                    <div class="flex flex-col items-center md:items-start space-y-6">
                        <div class="bg-white/10 p-4 rounded-2xl backdrop-blur-sm">
                            <img src="{{ asset('images/dsf.svg') }}" alt="DSF Logo" class="h-16 w-auto">
                        </div>
                        <div class="text-center md:text-left">
                            <h2 class="text-xl font-bold text-white mb-2">Diaspora Shopping Fly</h2>
                            <p class="text-blue-100">Spécialiste du transport express de colis</p>
                            <p class="text-[#ffd700] font-semibold mt-1">Europe ↔ Cameroun</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <a href="#" class="group">
                                <div class="p-3 rounded-xl bg-[#ffd700] text-[#0077be] hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-xl">
                                    <i class="fab fa-facebook-f"></i>
                                </div>
                            </a>
                            <a href="#" class="group">
                                <div class="p-3 rounded-xl bg-[#ffd700] text-[#0077be] hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-xl">
                                    <i class="fab fa-instagram"></i>
                                </div>
                            </a>
                            <a href="#" class="group">
                                <div class="p-3 rounded-xl bg-[#ffd700] text-[#0077be] hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-xl">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="md:col-span-2">
                    <h3 class="text-xl font-bold text-[#ffd700] mb-8 text-center md:text-left">Liens Rapides</h3>
                    <ul class="space-y-4 text-center md:text-left">
                        <li>
                            <a href="#" class="text-blue-100 hover:text-white transition-colors duration-300">Accueil</a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-white transition-colors duration-300">À propos</a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-white transition-colors duration-300">Services</a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-white transition-colors duration-300">Tarifs</a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-white transition-colors duration-300">FAQ</a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-white transition-colors duration-300">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Services Section -->
                <div class="md:col-span-3">
                    <h3 class="text-xl font-bold text-[#ffd700] mb-8 text-center md:text-left">Nos Services</h3>
                    <div class="space-y-6">
                        <a href="#" class="flex items-center group">
                            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                                <i class="fas fa-plane-departure text-[#ffd700] group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-white font-medium">Europe vers Cameroun</p>
                                <p class="text-blue-100 text-sm">Livraison express garantie</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center group">
                            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                                <i class="fas fa-plane-arrival text-[#ffd700] group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-white font-medium">Cameroun vers Europe</p>
                                <p class="text-blue-100 text-sm">Transport sécurisé</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center group">
                            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                                <i class="fas fa-box text-[#ffd700] group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-white font-medium">Suivi temps réel</p>
                                <p class="text-blue-100 text-sm">24h/24 et 7j/7</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="md:col-span-4">
                    <h3 class="text-xl font-bold text-[#ffd700] mb-8 text-center md:text-left">Contact</h3>
                    <div class="space-y-4">
                        <!-- France Contact -->
                        <div class="p-4 rounded-xl bg-white/10 hover:bg-white/20 transition-all duration-300 group">
                            <div class="flex items-center">
                                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/10">
                                    <img src="https://flagcdn.com/fr.svg" alt="France" class="w-6 h-6 rounded">
                                </div>
                                <div class="ml-4">
                                    <p class="text-white font-medium">France</p>
                                    <div class="flex flex-col">
                                        <div class="flex items-center mt-1 space-x-2">
                                            <i class="fab fa-whatsapp text-[#ffd700] text-sm"></i>
                                            <p class="text-blue-100 text-sm">+33 X XX XX XX XX</p>
                                        </div>
                                        <p class="text-blue-100 text-sm mt-1">123 Rue du Commerce, Paris</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cameroun Contact -->
                        <div class="p-4 rounded-xl bg-white/10 hover:bg-white/20 transition-all duration-300 group">
                            <div class="flex items-center">
                                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/10">
                                    <img src="https://flagcdn.com/cm.svg" alt="Cameroun" class="w-6 h-6 rounded">
                                </div>
                                <div class="ml-4">
                                    <p class="text-white font-medium">Cameroun</p>
                                    <div class="flex flex-col">
                                        <div class="flex items-center mt-1 space-x-2">
                                            <i class="fab fa-whatsapp text-[#ffd700] text-sm"></i>
                                            <p class="text-blue-100 text-sm">+237 X XX XX XX XX</p>
                                        </div>
                                        <p class="text-blue-100 text-sm mt-1">Rue Principal, Douala</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Belgique Contact -->
                        <div class="p-4 rounded-xl bg-white/10 hover:bg-white/20 transition-all duration-300 group">
                            <div class="flex items-center">
                                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/10">
                                    <img src="https://flagcdn.com/be.svg" alt="Belgique" class="w-6 h-6 rounded">
                                </div>
                                <div class="ml-4">
                                    <p class="text-white font-medium">Belgique</p>
                                    <div class="flex flex-col">
                                        <div class="flex items-center mt-1 space-x-2">
                                            <i class="fab fa-whatsapp text-[#ffd700] text-sm"></i>
                                            <p class="text-blue-100 text-sm">+32 X XX XX XX XX</p>
                                        </div>
                                        <p class="text-blue-100 text-sm mt-1">Avenue Louise, Bruxelles</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Global Contact -->
                        <div class="p-4 rounded-xl bg-white/10">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-envelope text-[#ffd700]"></i>
                                    <span class="text-blue-100">contact@diasporashoppingfly.com</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-clock text-[#ffd700] text-sm"></i>
                                    <span class="text-blue-100 text-sm">24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Apps & Support -->
            <div class="mt-16 flex flex-col md:flex-row justify-between items-center gap-8 p-6 rounded-2xl bg-white/5">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <span class="text-white font-medium">Téléchargez notre application :</span>
                    <div class="flex items-center gap-4">
                        <a href="#" class="flex items-center space-x-2 px-4 py-2 bg-white/10 rounded-xl hover:bg-white/20 transition-all duration-300">
                            <i class="fab fa-apple text-2xl text-white"></i>
                            <span class="text-white">App Store</span>
                        </a>
                        <a href="#" class="flex items-center space-x-2 px-4 py-2 bg-white/10 rounded-xl hover:bg-white/20 transition-all duration-300">
                            <i class="fab fa-google-play text-2xl text-white"></i>
                            <span class="text-white">Play Store</span>
                        </a>
                    </div>
                </div>
                
            </div>

            <!-- Bottom Bar -->
            <div class="mt-16 pt-8 border-t border-white/10">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <p class="text-blue-100 text-sm text-center md:text-left">
                        &copy; {{ date('Y') }} DSF Express - Diaspora Shopping & Fly. Tous droits réservés.
                    </p>
                    <div class="flex items-center flex-wrap justify-center gap-x-8 gap-y-4">
                        <a href="#" class="text-blue-100 hover:text-[#ffd700] transition-colors duration-300 text-sm">Mentions Légales</a>
                        <a href="#" class="text-blue-100 hover:text-[#ffd700] transition-colors duration-300 text-sm">Conditions Générales</a>
                        <a href="#" class="text-blue-100 hover:text-[#ffd700] transition-colors duration-300 text-sm">Politique de Confidentialité</a>
                        <a href="#" class="text-blue-100 hover:text-[#ffd700] transition-colors duration-300 text-sm">Cookies</a>
                        <a href="#" class="text-blue-100 hover:text-[#ffd700] transition-colors duration-300 text-sm">FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-grid-white {
            background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='1' height='1' fill='white'/%3E%3C/svg%3E");
        }
    </style>
</footer>
