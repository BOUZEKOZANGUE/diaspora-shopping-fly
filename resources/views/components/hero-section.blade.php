<section class="relative min-h-screen bg-gradient-to-b from-[#004080] to-[#002b56] flex items-center justify-center overflow-hidden">
    <!-- Image de fond -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/2.png') }}" alt="Background" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-black/30"></div>
    </div>

    <!-- Effets de particules flottantes -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
    </div>

    <!-- Contenu principal centré -->
    <div class="relative z-10 max-w-6xl mx-auto px-4 text-center">
        <!-- Container avec effet glassmorphism -->
        <div class="hero-card p-8 md:p-16 rounded-3xl">

            <!-- Titre principal avec animation spectaculaire -->
            <h1 class="hero-title mb-8">
                <span class="hero-word" data-delay="0">Transport</span>
                <span class="hero-word" data-delay="500">Express</span>
                <br>
                <span class="hero-accent" data-delay="1000">Europe ⟷ Cameroun</span>
            </h1>

            <!-- Description avec animation wave -->
            <p class="hero-description mb-6">
                <span class="wave-text" data-delay="1500">Service de transport bidirectionnel</span>
                <br>
                <span class="wave-text" data-delay="2000">sécurisé et fiable pour la diaspora</span>
            </p>

            <!-- Badges de service -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <div class="service-badge" data-delay="2500">
                    <div class="badge-icon">⚡</div>
                    <span>Rapidité</span>
                </div>
                <div class="service-badge" data-delay="2800">
                    <div class="badge-icon">🔒</div>
                    <span>Sécurité</span>
                </div>
                <div class="service-badge" data-delay="3100">
                    <div class="badge-icon">✅</div>
                    <span>Fiabilité</span>
                </div>
            </div>

            <!-- Boutons d'action avec animations premium -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center" data-delay="3500">
                <a href="#expedier" class="cta-primary group">
                    <span class="btn-content">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Expédier un colis
                    </span>
                    <div class="btn-bg"></div>
                    <div class="btn-particles">
                        <span></span><span></span><span></span>
                    </div>
                </a>

                <a href="#contact" class="cta-secondary group">
                    <span class="btn-content">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Nous contacter
                    </span>
                    <div class="btn-bg"></div>
                    <div class="btn-glow"></div>
                </a>
            </div>

        </div>
    </div>

    <!-- Indicateur de scroll élégant -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <div class="scroll-indicator">
            <div class="scroll-dot"></div>
        </div>
        <p class="text-yellow-300 text-sm mt-2 animate-pulse">Découvrir</p>
    </div>
</section>

<style>
/* Variables CSS */
:root {
    --primary-blue: #004080;
    --secondary-blue: #002b56;
    --accent-yellow: #fbbf24;
    --light-yellow: #fde047;
}

/* Particules flottantes */
.particle {
    position: absolute;
    background: radial-gradient(circle, var(--accent-yellow), transparent);
    border-radius: 50%;
    opacity: 0.1;
    animation: float 15s infinite ease-in-out;
}

.particle-1 { width: 60px; height: 60px; top: 10%; left: 10%; animation-delay: 0s; }
.particle-2 { width: 80px; height: 80px; top: 20%; right: 15%; animation-delay: -5s; }
.particle-3 { width: 40px; height: 40px; bottom: 30%; left: 20%; animation-delay: -10s; }
.particle-4 { width: 100px; height: 100px; top: 60%; right: 10%; animation-delay: -2s; }
.particle-5 { width: 50px; height: 50px; bottom: 20%; right: 40%; animation-delay: -8s; }

@keyframes float {
    0%, 100% { transform: translateY(0px) translateX(0px) scale(1); }
    25% { transform: translateY(-20px) translateX(10px) scale(1.1); }
    50% { transform: translateY(-40px) translateX(-10px) scale(0.9); }
    75% { transform: translateY(-20px) translateX(15px) scale(1.05); }
}

/* Container principal */
.hero-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow:
        0 25px 50px -12px rgba(0, 0, 0, 0.5),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    position: relative;
    overflow: hidden;
}

.hero-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    animation: shimmer 3s infinite;
}

@keyframes shimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Titre principal */
.hero-title {
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 800;
    line-height: 1.1;
    color: white;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
}

.hero-word {
    display: inline-block;
    opacity: 0;
    transform: translateY(50px) rotateX(90deg);
    animation: flipIn 1s ease-out forwards;
}

.hero-accent {
    display: inline-block;
    background: linear-gradient(45deg, var(--accent-yellow), var(--light-yellow));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    opacity: 0;
    transform: scale(0);
    animation: bounceIn 1s ease-out forwards;
    filter: drop-shadow(0 0 20px rgba(251, 191, 36, 0.5));
}

@keyframes flipIn {
    to {
        opacity: 1;
        transform: translateY(0) rotateX(0);
    }
}

@keyframes bounceIn {
    0% { transform: scale(0); opacity: 0; }
    50% { transform: scale(1.2); opacity: 0.8; }
    100% { transform: scale(1); opacity: 1; }
}

/* Description */
.hero-description {
    font-size: clamp(1.1rem, 3vw, 1.5rem);
    color: #e5e7eb;
    font-weight: 300;
    line-height: 1.6;
}

.wave-text {
    display: inline-block;
    opacity: 0;
    animation: wave 1s ease-out forwards;
}

@keyframes wave {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* Badges de service */
.service-badge {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    background: rgba(251, 191, 36, 0.1);
    border: 1px solid rgba(251, 191, 36, 0.3);
    border-radius: 50px;
    color: var(--accent-yellow);
    font-weight: 600;
    opacity: 0;
    transform: translateY(30px);
    animation: slideUp 0.8s ease-out forwards;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.service-badge:hover {
    background: rgba(251, 191, 36, 0.2);
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(251, 191, 36, 0.2);
}

.badge-icon {
    font-size: 1.2rem;
    animation: pulse 2s infinite;
}

@keyframes slideUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Boutons CTA */
.cta-primary, .cta-secondary {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px 32px;
    font-size: 1.1rem;
    font-weight: 700;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    opacity: 0;
    transform: translateY(30px);
    animation: slideUp 0.8s ease-out forwards;
    min-width: 200px;
}

.cta-primary {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
}

.cta-secondary {
    background: var(--accent-yellow);
    color: var(--primary-blue);
    border: 2px solid var(--accent-yellow);
}

.btn-content {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    transition: transform 0.3s ease;
}

.btn-bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
}

.cta-primary:hover .btn-bg {
    transform: translateX(100%);
}

.cta-secondary .btn-glow {
    position: absolute;
    inset: -2px;
    background: linear-gradient(45deg, var(--light-yellow), var(--accent-yellow));
    border-radius: 12px;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: -1;
}

.cta-secondary:hover .btn-glow {
    opacity: 1;
    animation: glow 1.5s ease-in-out infinite alternate;
}

@keyframes glow {
    from { box-shadow: 0 0 20px rgba(251, 191, 36, 0.5); }
    to { box-shadow: 0 0 40px rgba(251, 191, 36, 0.8); }
}

.cta-primary:hover, .cta-secondary:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.cta-primary:hover .btn-content {
    transform: scale(1.05);
}

/* Indicateur de scroll */
.scroll-indicator {
    width: 30px;
    height: 50px;
    border: 2px solid rgba(251, 191, 36, 0.5);
    border-radius: 25px;
    position: relative;
    animation: bounce 2s infinite;
}

.scroll-dot {
    width: 6px;
    height: 6px;
    background: var(--accent-yellow);
    border-radius: 50%;
    position: absolute;
    top: 8px;
    left: 50%;
    transform: translateX(-50%);
    animation: scroll 2s infinite;
}

@keyframes scroll {
    0%, 20% { transform: translateX(-50%) translateY(0); opacity: 1; }
    100% { transform: translateX(-50%) translateY(20px); opacity: 0; }
}

/* Animations avec délai */
[data-delay] {
    animation-delay: var(--delay);
}

/* Responsive */
@media (max-width: 640px) {
    .hero-card {
        padding: 2rem 1.5rem;
    }

    .service-badge {
        padding: 8px 16px;
        font-size: 0.9rem;
    }

    .cta-primary, .cta-secondary {
        padding: 14px 24px;
        font-size: 1rem;
        min-width: 180px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Appliquer les délais d'animation
    const elementsWithDelay = document.querySelectorAll('[data-delay]');

    elementsWithDelay.forEach(element => {
        const delay = element.getAttribute('data-delay');
        element.style.setProperty('--delay', delay + 'ms');
    });

    // Animation séquentielle des mots
    const heroWords = document.querySelectorAll('.hero-word');
    const heroAccent = document.querySelector('.hero-accent');
    const waveTexts = document.querySelectorAll('.wave-text');
    const serviceBadges = document.querySelectorAll('.service-badge');
    const ctaButtons = document.querySelectorAll('.cta-primary, .cta-secondary');

    // Animation des mots du titre
    heroWords.forEach((word, index) => {
        setTimeout(() => {
            word.style.animationDelay = '0s';
        }, index * 500);
    });

    // Animation de l'accent
    setTimeout(() => {
        heroAccent.style.animationDelay = '0s';
    }, 1000);

    // Animation des textes wave
    waveTexts.forEach((text, index) => {
        setTimeout(() => {
            text.style.animationDelay = '0s';
        }, 1500 + (index * 500));
    });

    // Animation des badges
    serviceBadges.forEach((badge, index) => {
        setTimeout(() => {
            badge.style.animationDelay = '0s';
        }, 2500 + (index * 300));
    });

    // Animation des boutons
    ctaButtons.forEach((button, index) => {
        setTimeout(() => {
            button.style.animationDelay = '0s';
        }, 3500 + (index * 200));
    });
});
</script>
