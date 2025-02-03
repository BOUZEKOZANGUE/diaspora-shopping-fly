<x-app-layout>
    <!-- Hero Section -->
    <div class="relative isolate min-h-screen">
        <!-- Gradient Background with Particles -->
        <div class="absolute inset-0 -z-10">
            <div class="relative h-full">
                <div class="absolute inset-0 bg-gradient-to-br from-[#0077be] to-[#005c91] opacity-90"></div>
                <div id="particles-js" class="absolute inset-0"></div>
            </div>
        </div>

        <div class="relative pt-24 pb-20 sm:pt-32 sm:pb-28">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h1 class="animate-title text-4xl font-bold tracking-tight text-white sm:text-6xl lg:text-7xl">
                        Expédiez en toute simplicité
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-blue-100 sm:text-xl lg:text-2xl">
                        La solution intelligente pour gérer vos envois à l'international
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="#start"
                           class="group relative inline-flex items-center justify-center rounded-full bg-[#ffd700] px-8 py-4 text-lg font-semibold text-[#0077be] transition-all duration-200 ease-in-out hover:bg-opacity-90 hover:scale-105">
                            <span class="absolute -inset-0.5 -z-10 rounded-full bg-gradient-to-r from-[#0077be] to-[#005c91] opacity-0 blur transition duration-200 group-hover:opacity-10"></span>
                            Commencer maintenant
                        </a>
                        <a href="#demo" class="text-lg font-semibold text-[#ffd700] hover:text-blue-100 transition-all duration-200">
                            Voir la démo <span aria-hidden="true" class="ml-2">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Stats -->
        <div class="absolute bottom-0 w-full bg-white/10 backdrop-blur-lg">
            <div class="mx-auto max-w-7xl px-6 py-8 sm:px-6 lg:px-8">
                <dl class="grid grid-cols-1 gap-y-8 gap-x-8 text-center sm:grid-cols-3">
                    <div class="stats-item flex flex-col">
                        <dt class="text-sm font-semibold leading-6 text-blue-100">Clients satisfaits</dt>
                        <dd class="order-first text-3xl font-bold tracking-tight text-[#ffd700]">15k+</dd>
                    </div>
                    <div class="stats-item flex flex-col">
                        <dt class="text-sm font-semibold leading-6 text-blue-100">Pays desservis</dt>
                        <dd class="order-first text-3xl font-bold tracking-tight text-[#ffd700]">150+</dd>
                    </div>
                    <div class="stats-item flex flex-col">
                        <dt class="text-sm font-semibold leading-6 text-blue-100">Livraisons réussies</dt>
                        <dd class="order-first text-3xl font-bold tracking-tight text-[#ffd700]">99.9%</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <section id="services" class="py-24 sm:py-32 bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center rounded-full px-4 py-1 text-sm font-medium bg-[#0077be]/10 text-[#0077be] ring-1 ring-inset ring-[#0077be]/20">
                    Nouveauté
                </span>
                <h2 class="mt-6 text-3xl font-bold tracking-tight text-[#0077be] sm:text-4xl">
                    Services d'expédition sur mesure
                </h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Des solutions adaptées à tous vos besoins d'expédition
                </p>
            </div>

            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <!-- Services cards here - Same structure but with updated colors -->
                    <div class="service-card flex flex-col rounded-2xl bg-white p-8 shadow-lg ring-1 ring-[#0077be]/20 hover:shadow-xl transition-all duration-300">
                        <dt class="text-base font-semibold leading-7 text-[#0077be]">
                            <div class="mb-6 flex h-10 w-10 items-center justify-center rounded-lg bg-[#0077be]">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            Express 24h
                        </dt>
                        <!-- Continue with other service cards using same color scheme -->
                    </div>
                    <!-- Additional service cards... -->
                </dl>
            </div>
        </div>
    </section>

    <!-- Tracking Section -->
    <section id="tracking" class="relative py-24 sm:py-32 bg-gradient-to-br from-[#0077be]/5 to-[#005c91]/5 overflow-hidden">
        <!-- Continue with tracking section using updated colors -->
    </section>

    <!-- Features Section -->
    <section id="features" class="relative py-24 sm:py-32 bg-white overflow-hidden">
        <!-- Continue with features section using updated colors -->
    </section>

    <!-- Call to Action Section -->
    <section class="relative isolate overflow-hidden bg-gradient-to-br from-[#0077be] to-[#005c91] py-16 sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
                <div class="max-w-xl lg:max-w-lg">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Commencez dès aujourd'hui</h2>
                    <p class="mt-4 text-lg leading-8 text-blue-100">
                        Rejoignez des milliers de clients satisfaits et profitez de nos services d'expédition premium.
                    </p>
                    <div class="mt-6 flex max-w-md gap-x-4">
                        <input id="email-address" name="email" type="email" required
                               class="min-w-0 flex-auto rounded-md border-0 bg-white/10 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-[#ffd700] sm:text-sm sm:leading-6"
                               placeholder="Entrez votre email">
                        <button type="submit"
                                class="flex-none rounded-md bg-[#ffd700] px-3.5 py-2.5 text-sm font-semibold text-[#0077be] shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#ffd700]">
                            S'inscrire
                        </button>
                    </div>
                </div>
                <!-- Continue with CTA section content -->
            </div>
        </div>
    </section>

    @push('scripts')
    <!-- Same scripts but updated Three.js material color to match new scheme -->
    <script>
        // Update the cube material color
        const material = new THREE.MeshPhongMaterial({
            color: 0x0077be, // Updated to match new color scheme
            specular: 0x050505,
            shininess: 100
        });
        // Rest of the scripts remain the same
    </script>
    @endpush
</x-app-layout>
