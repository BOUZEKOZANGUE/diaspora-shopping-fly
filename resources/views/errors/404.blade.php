{{-- resources/views/errors/404.blade.php --}}
<x-app-layout>
    <div class="relative min-h-screen flex flex-col items-center justify-center p-4 overflow-hidden">
        <!-- Background Animation -->
        <div class="absolute inset-0 -z-10">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-indigo-50"></div>
            <div class="absolute w-full h-full bg-grid-pattern opacity-[0.03]"></div>
        </div>

        <!-- Main Content Container -->
        <div class="relative w-full max-w-4xl mx-auto text-center">
            <!-- Animated Circles -->
            <div class="absolute top-0 left-1/4 w-72 h-72 bg-gradient-to-r from-[#0077be]/30 to-[#ffd700]/30 rounded-full filter blur-3xl animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-72 h-72 bg-gradient-to-r from-[#ffd700]/30 to-[#0077be]/30 rounded-full filter blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-1/3 w-72 h-72 bg-gradient-to-r from-[#0077be]/30 to-[#ffd700]/30 rounded-full filter blur-3xl animate-blob animation-delay-4000"></div>

            <!-- Status Code -->
            <div class="relative">
                <div class="text-[180px] font-bold leading-none tracking-tighter text-gray-100/50">
                    404
                </div>
                <div class="absolute -top-6 left-0 w-full flex justify-center">
                    <div class="text-7xl font-bold bg-gradient-to-r from-[#0077be] to-[#ffd700] text-transparent bg-clip-text animate-pulse">
                        Oops!
                    </div>
                </div>
            </div>

            <!-- Message -->
            <div class="relative -mt-10 mb-8 px-4">
                <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-4">
                    Cette page est temporairement indisponible
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto mb-8">
                    Notre équipe travaille actuellement sur cette page pour vous offrir une meilleure expérience.
                    N'hésitez pas à revenir un peu plus tard ou à explorer d'autres sections de notre site.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-12">
                <a href="{{ route('home') }}"
                   class="group relative px-8 py-3 bg-gradient-to-r from-[#0077be] to-[#005c91] text-white rounded-xl transform transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    <div class="absolute inset-0 rounded-xl bg-grid-white/[0.05] bg-[size:20px_20px]"></div>
                    <span class="relative flex items-center">
                        <svg class="w-5 h-5 mr-2 transform transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Retour à l'accueil
                    </span>
                </a>

                <button onclick="window.history.back()"
                        class="group relative px-8 py-3 border-2 border-gray-300 rounded-xl text-gray-700 hover:border-[#0077be] hover:text-[#0077be] transition-all duration-300">
                    <span class="relative flex items-center">
                        Page précédente
                        <svg class="w-5 h-5 ml-2 opacity-0 transform transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </span>
                </button>
            </div>

            <!-- Support Section -->
            <div class="relative">
                <div class="max-w-lg mx-auto p-6 bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">
                        Besoin d'aide ?
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Notre équipe support est disponible pour vous aider à trouver ce que vous cherchez.
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center">
                        <a href="#" class="flex items-center text-[#0077be] hover:text-[#005c91] transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Contactez-nous
                        </a>
                        <a href="#" class="flex items-center text-[#0077be] hover:text-[#005c91] transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            FAQ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .bg-grid-pattern {
            background-image: repeating-linear-gradient(0deg, #000, #000 1px, transparent 1px, transparent 40px),
                            repeating-linear-gradient(90deg, #000, #000 1px, transparent 1px, transparent 40px);
        }

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
    @endpush
</x-app-layout>
