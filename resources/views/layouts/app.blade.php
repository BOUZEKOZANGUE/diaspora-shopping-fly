<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" itemscope itemtype="https://schema.org/Organization">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags Optimisés -->
    <title>DSF - Transport International de Colis en Sécurité</title>
    <meta name="description" content="DSF propose un réseau de points relais pour le transport sécurisé de colis entre la Belgique, France et Cameroun. Dépôt et retrait de colis avec suivi en temps réel.">
    <meta name="keywords" content="transport international colis, points relais DSF, transport sécurisé, dépôt retrait colis, Belgique France Cameroun, suivi colis">
    <meta name="author" content="DSF - Diaspora Shopping & Fly">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://group-dsf.com/">

    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="DSF - Transport International de Colis en Sécurité">
    <meta property="og:description" content="Réseau de points relais pour transport sécurisé de colis entre l'Europe et l'Afrique. Points de dépôt et retrait avec suivi temps réel.">
    <meta property="og:url" content="https://group-dsf.com/">
    <meta property="og:site_name" content="DSF Transport">
    <meta property="og:image" content="https://group-dsf.com/images/dsf-og-image.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="DSF - Transport international de colis sécurisé">
    <meta property="og:locale" content="fr_FR">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DSF - Transport International de Colis en Sécurité">
    <meta name="twitter:description" content="Réseau de points relais pour transport sécurisé de colis entre l'Europe et l'Afrique.">
    <meta name="twitter:image" content="https://group-dsf.com/images/dsf-twitter-card.jpg">
    <meta name="twitter:image:alt" content="DSF - Transport sécurisé de colis" de vos colis.">
    <meta name="twitter:image" content="https://group-dsf.com/images/dsf-twitter-card.jpg">
    <meta name="twitter:image:alt" content="DSF Transport - Service international">

    <!-- Mobile App Banners -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="DSF Transport">
    <meta name="theme-color" content="#0077be">
    <meta name="msapplication-navbutton-color" content="#0077be">

    <!-- Favicon et Icons -->
    <link rel="icon" href="{{ asset('images/dsf.svg') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <!-- Alternate Languages -->
    <link rel="alternate" hreflang="fr" href="https://group-dsf.com/">
    <link rel="alternate" hreflang="en" href="https://group-dsf.com/en/">
    <link rel="alternate" hreflang="nl" href="https://group-dsf.com/nl/">
    <link rel="alternate" hreflang="x-default" href="https://group-dsf.com/">

    <!-- Preload critical resources -->
    <link rel="preload" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" as="style">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://group-dsf.com" crossorigin>

    <!-- Security Headers -->
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    <meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">

    <!-- Structured Data - Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "DSF - Diaspora Shopping & Fly",
        "alternateName": "DSF Transport",
        "url": "https://group-dsf.com",
        "logo": "https://group-dsf.com/images/dsf-logo.png",
        "description": "Service de transport international entre la Belgique, la France et le Cameroun avec suivi en temps réel",
    <!-- Structured Data - Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "DSF - Diaspora Shopping & Fly",
        "alternateName": "DSF Transport",
        "url": "https://group-dsf.com",
        "logo": "https://group-dsf.com/images/dsf-logo.png",
        "description": "Service de transport international de colis avec réseau de points relais entre la Belgique, France et Cameroun",
        "foundingDate": "2021",
        "contactPoint": [
            {
                "@type": "ContactPoint",
                "telephone": "+32-465-616-645",
                "contactType": "customer service",
                "areaServed": "BE",
                "availableLanguage": ["French", "Dutch"]
            },
            {
                "@type": "ContactPoint",
                "telephone": "+33-667-529-091",
                "contactType": "customer service",
                "areaServed": "FR",
                "availableLanguage": "French"
            },
            {
                "@type": "ContactPoint",
                "telephone": "+237-939-960-22",
                "contactType": "customer service",
                "areaServed": "CM",
                "availableLanguage": ["French", "English"]
            }
        ],
        "address": [
            {
                "@type": "PostalAddress",
                "streetAddress": "Rue du Tilleul 91",
                "addressLocality": "Evere",
                "addressRegion": "Brussels",
                "postalCode": "1140",
                "addressCountry": "BE"
            },
            {
                "@type": "PostalAddress",
                "streetAddress": "58b rue henri Poincaré",
                "addressLocality": "Asnières-sur-Seine",
                "addressRegion": "Île-de-France",
                "postalCode": "92600",
                "addressCountry": "FR"
            },
            {
                "@type": "PostalAddress",
                "streetAddress": "Logpom, Montana city",
                "addressLocality": "Douala",
                "addressRegion": "Littoral",
                "addressCountry": "CM"
            }
        ],
        "sameAs": [
            "https://www.facebook.com/dsftransport",
            "https://www.instagram.com/dsf_transport",
            "https://wa.me/32465616645"
        ]
    }
    </script>

    <!-- Structured Data - Service -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Service",
        "name": "Transport International de Colis",
        "description": "Service de transport de colis avec points relais entre l'Europe et l'Afrique",
        "provider": {
            "@type": "Organization",
            "name": "DSF "
        },
        "serviceType": "Parcel Service",
        "areaServed": ["Belgium", "France", "Cameroon"],
        "offers": {
            "@type": "Offer",
            "description": "Transport sécurisé de colis avec suivi",
            "availability": "https://schema.org/InStock"
        }
    }
    </script>

    <!-- Google Analytics (Replace with your tracking ID) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID', {
            page_title: 'DSF  - Accueil',
            page_location: 'https://group-dsf.com/',
            send_page_view: true
        });
    </script>

    <!-- Critical CSS inline - Optimized for fast loading -->
    <style>
        /* Page Loader - Ultra-optimized for performance */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(135deg, #0077be, #005c91);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            transition: opacity 0.5s ease;
            will-change: opacity;
        }

        .page-loader.fade-out {
            opacity: 0;
        }

        .loader-container {
            position: relative;
            width: 200px;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            will-change: transform;
        }

        /* Optimized orbit circles */
        .orbit-circle {
            position: absolute;
            border-radius: 50%;
            border: 2px solid rgba(255, 215, 0, 0.3);
            will-change: transform;
        }

        .orbit-circle:nth-child(1) {
            width: 180px;
            height: 180px;
            animation: orbit 4s linear infinite;
        }

        .orbit-circle:nth-child(2) {
            width: 140px;
            height: 140px;
            animation: orbit 3s linear infinite reverse;
        }

        .orbit-circle:nth-child(3) {
            width: 100px;
            height: 100px;
            animation: orbit 2s linear infinite;
        }

        /* Optimized particles */
        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: #ffd700;
            border-radius: 50%;
            will-change: transform;
        }

        .particle:nth-child(4) {
            top: 20px;
            left: 50px;
            animation: float 3s ease-in-out infinite;
        }

        .particle:nth-child(5) {
            top: 60px;
            right: 30px;
            animation: float 3s ease-in-out infinite 0.8s;
        }

        .particle:nth-child(6) {
            bottom: 40px;
            left: 40px;
            animation: float 3s ease-in-out infinite 1.6s;
        }

        .particle:nth-child(7) {
            bottom: 20px;
            right: 60px;
            animation: float 3s ease-in-out infinite 2.4s;
        }

        .particle:nth-child(8) {
            top: 100px;
            left: 20px;
            animation: float 3s ease-in-out infinite 0.4s;
        }

        .particle:nth-child(9) {
            top: 30px;
            right: 100px;
            animation: float 3s ease-in-out infinite 1.2s;
        }

        /* Optimized logo container */
        .logo-container {
            position: relative;
            width: 90px;
            height: 90px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid rgba(255, 215, 0, 0.3);
            will-change: transform;
            animation: pulse 2s ease-in-out infinite;
        }

        .dsf-logo {
            font-size: 28px;
            font-weight: bold;
            color: #ffd700;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.8);
            will-change: opacity;
            animation: logoGlow 2s ease-in-out infinite alternate;
        }

        /* Optimized spinners */
        .main-spinner {
            position: absolute;
            width: 120px;
            height: 120px;
            border: 3px solid transparent;
            border-top: 3px solid #ffd700;
            border-right: 3px solid #ffd700;
            border-radius: 50%;
            will-change: transform;
            animation: spin 1.5s linear infinite;
        }

        .secondary-spinner {
            position: absolute;
            width: 80px;
            height: 80px;
            border: 2px solid transparent;
            border-bottom: 2px solid #ffffff;
            border-left: 2px solid #ffffff;
            border-radius: 50%;
            will-change: transform;
            animation: spin 1s linear infinite reverse;
        }

        /* Optimized loading text */
        .loading-text {
            position: absolute;
            bottom: -60px;
            left: 50%;
            transform: translateX(-50%);
            color: #ffffff;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: 3px;
            text-transform: uppercase;
            will-change: opacity;
            animation: textFade 2s ease-in-out infinite;
        }

        /* Simplified animations for better performance */
        @keyframes orbit {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); opacity: 0.7; }
            50% { transform: translateY(-20px); opacity: 1; }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes logoGlow {
            0% { text-shadow: 0 0 20px rgba(255, 215, 0, 0.8); }
            100% { text-shadow: 0 0 30px rgba(255, 215, 0, 1); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes textFade {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }

        /* Progress Bar - Optimized */
        .progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: transparent;
            z-index: 9999;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(to right, #0077be, #ffd700);
            width: 0%;
            transition: width 0.2s ease-out;
            will-change: width;
        }

        /* Screen reader only class */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .focus\:not-sr-only:focus {
            position: static;
            width: auto;
            height: auto;
            padding: 0.5rem 1rem;
            margin: 0;
            overflow: visible;
            clip: auto;
            white-space: normal;
        }
    </style>

    <!-- Deferred CSS loading -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        media="print" onload="this.media='all'" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" media="print"
        onload="this.media='all'" />

    <!-- Fallback for CSS if JS is disabled -->
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    </noscript>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/packages.css', 'resources/js/app.js', 'resources/js/packages.js'])
</head>

<body class="font-sans antialiased" itemscope itemtype="https://schema.org/WebPage">
    <!-- Skip Navigation (Accessibility) -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-blue-600 text-white px-4 py-2 rounded z-50">
        Aller au contenu principal
    </a>

    <!-- Page Loader -->
    <div id="pageLoader" class="page-loader" aria-label="Chargement de la page">
        <div class="loader-container">
            <!-- Cercles orbitaux -->
            <div class="orbit-circle" aria-hidden="true"></div>
            <div class="orbit-circle" aria-hidden="true"></div>
            <div class="orbit-circle" aria-hidden="true"></div>

            <!-- Particules flottantes -->
            <div class="particle" aria-hidden="true"></div>
            <div class="particle" aria-hidden="true"></div>
            <div class="particle" aria-hidden="true"></div>
            <div class="particle" aria-hidden="true"></div>
            <div class="particle" aria-hidden="true"></div>
            <div class="particle" aria-hidden="true"></div>

            <!-- Spinners -->
            <div class="main-spinner" aria-hidden="true"></div>
            <div class="secondary-spinner" aria-hidden="true"></div>

            <!-- Logo central -->
            <div class="logo-container">
                <div class="dsf-logo" aria-label="Logo DSF">DSF</div>
            </div>

            <!-- Texte de chargement optimisé -->
            <div class="loading-text" role="status" aria-live="polite">
                Chargement...
            </div>
        </div>
    </div>

    <!-- Progress Bar -->
    <div class="progress-container" role="progressbar" aria-label="Progression de lecture">
        <div id="progressBar" class="progress-bar"></div>
    </div>

    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow" role="banner">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main id="main-content" role="main">
            @include('layouts.flash-messages')
            {{ $slot }}
        </main>

        <!-- Back to Top Button -->
        <button id="backToTop" class="back-to-top" aria-label="Retour en haut de la page" title="Retour en haut">
            <div class="button-content">
                <span class="arrow" aria-hidden="true">↑</span>
                <span class="text">Haut</span>
            </div>
            <div class="ripple" aria-hidden="true"></div>
        </button>

        @include('layouts.footer')
    </div>

    <!-- Non-critical CSS -->
    <style>
        /* Back to Top Button Styles */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 99;
            width: 45px;
            height: 45px;
            padding: 0;
            border: none;
            border-radius: 50%;
            background: linear-gradient(135deg, #0077be, #005c91);
            cursor: pointer;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .back-to-top.show-btn {
            opacity: 1;
            transform: translateY(0);
        }

        .button-content {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            transition: transform 0.3s ease;
        }

        .arrow {
            font-size: 20px;
            margin-bottom: -5px;
            transform: translateY(2px);
            transition: transform 0.3s ease;
        }

        .text {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .back-to-top:hover {
            background: linear-gradient(135deg, #0088d1, #006da8);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        .back-to-top:hover .arrow {
            transform: translateY(-2px);
        }

        .back-to-top:hover .text {
            transform: translateY(0);
            opacity: 1;
        }

        .ripple {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
            transform: scale(0);
            opacity: 0;
            transition: all 0.5s ease;
        }

        .back-to-top:active .ripple {
            transform: scale(2.5);
            opacity: 1;
            transition: transform 0.5s ease-out, opacity 0.3s ease-out;
        }

        /* Custom Scrollbar Styles */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #0077be, #ffd700);
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #005c91, #ffb700);
        }

        /* For Firefox */
        * {
            scrollbar-width: thin;
            scrollbar-color: #0077be #f1f1f1;
        }

        /* Background grid */
        .bg-grid-white {
            background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='1' height='1' fill='white'/%3E%3C/svg%3E");
        }
    </style>

    <!-- Deferred JavaScript loading -->
    <script defer src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Critical JavaScript - Ultra-optimized -->
    <script>
        // Optimized Page Loader with minimal DOM manipulation
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('pageLoader');

            // Use requestAnimationFrame for smooth animations
            const hideLoader = () => {
                requestAnimationFrame(() => {
                    loader.classList.add('fade-out');
                    setTimeout(() => {
                        loader.style.display = 'none';
                        loader.remove(); // Free memory
                    }, 500);
                });
            };

            // Faster loader timing for better UX
            setTimeout(hideLoader, 1200);
        });

        // Optimized scroll handling with throttling
        let scrollTimeout;
        const handleScroll = () => {
            if (scrollTimeout) return;

            scrollTimeout = requestAnimationFrame(() => {
                const winScroll = document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;

                // Update progress bar
                document.getElementById("progressBar").style.width = scrolled + "%";

                // Handle back to top button
                const backToTop = document.getElementById("backToTop");
                if (winScroll > 300) {
                    backToTop.classList.add("show-btn");
                } else {
                    backToTop.classList.remove("show-btn");
                }

                scrollTimeout = null;
            });
        };

        window.addEventListener('scroll', handleScroll, { passive: true });

        // Optimized smooth scroll
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById("backToTop").addEventListener("click", function(e) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: "smooth" });
            }, { passive: false });
        });

        // SEO Performance Tracking
        window.addEventListener('load', function() {
            // Track Core Web Vitals for SEO
            if ('PerformanceObserver' in window) {
                // Largest Contentful Paint
                new PerformanceObserver((entryList) => {
                    for (const entry of entryList.getEntries()) {
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'LCP', {
                                event_category: 'Web Vitals',
                                value: Math.round(entry.startTime),
                                non_interaction: true
                            });
                        }
                    }
                }).observe({entryTypes: ['largest-contentful-paint']});
            }
        });
    </script>
</body>

</html>
