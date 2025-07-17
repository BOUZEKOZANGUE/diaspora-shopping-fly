<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DSF - Diaspora Shopping & Fly</title>
    <link rel="icon" href="{{ asset('images/dsf.svg') }}" type="image/x-icon">

    <!-- Preload critical resources -->
    <link rel="preload" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" as="style">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://fonts.bunny.net">

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

<body class="font-sans antialiased">
    <!-- Page Loader -->
    <div id="pageLoader" class="page-loader">
        <div class="loader-container">
            <!-- Cercles orbitaux -->
            <div class="orbit-circle"></div>
            <div class="orbit-circle"></div>
            <div class="orbit-circle"></div>

            <!-- Particules flottantes -->
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>

            <!-- Spinners -->
            <div class="main-spinner"></div>
            <div class="secondary-spinner"></div>

            <!-- Logo central -->
            <div class="logo-container">
                <div class="dsf-logo">DSF</div>
            </div>

            <!-- Texte de chargement optimisé -->
            <div class="loading-text">
                Chargement...
            </div>
        </div>
    </div>

    <!-- Progress Bar -->
    <div class="progress-container">
        <div id="progressBar" class="progress-bar"></div>
    </div>

    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @include('layouts.flash-messages')
            {{ $slot }}
        </main>

        <!-- Back to Top Button -->
        <button id="backToTop" class="back-to-top" aria-label="Retour en haut de la page">
            <div class="button-content">
                <span class="arrow">↑</span>
                <span class="text">Haut</span>
            </div>
            <div class="ripple"></div>
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
    </script>
</body>

</html>
