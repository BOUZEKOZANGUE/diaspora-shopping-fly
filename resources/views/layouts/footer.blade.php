<footer class="relative bg-gradient-to-b from-[#0077be] to-[#005c91] overflow-hidden">
    {{-- Newsletter Section --}}
    <div class="border-b border-white/10">
        <div class="max-w-6xl mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-center md:text-left">
                    <h2 class="text-xl font-bold text-white">Newsletter</h2>
                    <p class="text-blue-100 text-sm">Restez informé de nos offres</p>
                </div>
                <form class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
                    <input type="email" placeholder="Votre email" class="w-full sm:w-64 px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/50 focus:border-[#ffd700] focus:ring-1 focus:ring-[#ffd700]">
                    <button class="px-6 py-2 bg-[#ffd700] text-[#0077be] font-semibold rounded-lg hover:bg-[#ffd700]/90">
                        S'abonner
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Main Footer Content --}}
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            {{-- Logo & Info --}}
            <div class="text-center md:text-left">
                <div class="mb-4">
                    <img src="{{ asset('images/dsf.svg') }}" alt="DSF Logo" class="h-12 w-auto mx-auto md:mx-0">
                </div>
                <p class="text-blue-100 text-sm mb-4">Spécialiste du transport express de colis Europe ↔ Cameroun</p>
                <div class="flex justify-center md:justify-start space-x-4">
                    <a href="#" class="p-2 bg-[#ffd700] text-[#0077be] rounded-lg hover:scale-105 transition-transform">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="p-2 bg-[#ffd700] text-[#0077be] rounded-lg hover:scale-105 transition-transform">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="p-2 bg-[#ffd700] text-[#0077be] rounded-lg hover:scale-105 transition-transform">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h3 class="text-lg font-bold text-[#ffd700] mb-4">Liens Rapides</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-blue-100 hover:text-white">Accueil</a></li>
                    <li><a href="#" class="text-blue-100 hover:text-white">Services</a></li>
                    <li><a href="#" class="text-blue-100 hover:text-white">Tarifs</a></li>
                    <li><a href="#" class="text-blue-100 hover:text-white">Contact</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h3 class="text-lg font-bold text-[#ffd700] mb-4">Contact</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex items-center space-x-2">
                        <img src="https://flagcdn.com/fr.svg" alt="France" class="w-4 h-4">
                        <span class="text-blue-100">+33 667 52 90 91</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <img src="https://flagcdn.com/cm.svg" alt="Cameroun" class="w-4 h-4">
                        <span class="text-blue-100">+237 693 99 60 22</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <img src="https://flagcdn.com/be.svg" alt="Belgique" class="w-4 h-4">
                        <span class="text-blue-100">+32 465 61 66 45</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-envelope text-[#ffd700]"></i>
                        <span class="text-blue-100">contact@dsf.com</span>
                    </div>
                </div>
            </div>

            {{-- App Download --}}
            <div>
                <h3 class="text-lg font-bold text-[#ffd700] mb-4">Notre Application</h3>
                <div class="space-y-3">
                    <a href="#" class="flex items-center space-x-2 bg-white/10 p-2 rounded-lg hover:bg-white/20">
                        <i class="fab fa-apple text-white text-xl"></i>
                        <span class="text-white text-sm">App Store</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 bg-white/10 p-2 rounded-lg hover:bg-white/20">
                        <i class="fab fa-google-play text-white text-xl"></i>
                        <span class="text-white text-sm">Play Store</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="mt-8 pt-4 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
                <p class="text-blue-100">
                    © {{ date('Y') }} Diaspora Shopping & Fly. Tous droits réservés.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#" class="text-blue-100 hover:text-[#ffd700]">Mentions Légales</a>
                    <a href="#" class="text-blue-100 hover:text-[#ffd700]">CGV</a>
                    <a href="#" class="text-blue-100 hover:text-[#ffd700]">Confidentialité</a>
                </div>
            </div>
        </div>
    </div>
</footer>
