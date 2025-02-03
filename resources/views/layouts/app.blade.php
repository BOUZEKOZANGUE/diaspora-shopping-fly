<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>{{ config('app.name', 'Diaspora Shopping Fly') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            // Page Loader
            document.addEventListener('DOMContentLoaded', function() {
                const loader = document.getElementById('pageLoader');
                setTimeout(() => {
                    loader.classList.add('fade-out');
                    setTimeout(() => {
                        loader.style.display = 'none';
                    }, 500);
                }, 800);
            });

            // Progress bar and Back to Top functionality
            window.onscroll = function() {
                let winScroll = document.documentElement.scrollTop;
                let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                let scrolled = (winScroll / height) * 100;
                document.getElementById("progressBar").style.width = scrolled + "%";

                let backToTop = document.getElementById("backToTop");
                if (winScroll > 300) {
                    backToTop.classList.add("show-btn");
                } else {
                    backToTop.classList.remove("show-btn");
                }
            };

            // Smooth scroll to top
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById("backToTop").addEventListener("click", function(e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                });
            });
        </script>
    </head>
    <body class="font-sans antialiased">
        <!-- Page Loader -->
        <div id="pageLoader" class="page-loader">
            <div class="loader-content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                    <div class="loader-line"></div>
                </div>
                <svg class="loader-logo" width="50" height="50" viewBox="0 0 50 50">
                    <circle cx="25" cy="25" r="20" fill="none" stroke="#ffffff" stroke-width="2"/>
                    <path d="M15,25 L22,32 L35,18" stroke="#ffffff" stroke-width="2" fill="none"/>
                </svg>
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

        <style>
            /* Page Loader */
            .page-loader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(135deg, #0077be, #005c91);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 10000;
                transition: opacity 0.5s ease;
            }

            .page-loader.fade-out {
                opacity: 0;
            }

            .loader-content {
                position: relative;
                width: 100px;
                height: 100px;
            }

            .loader-circle {
                position: absolute;
                width: 100%;
                height: 100%;
                border: 2px solid rgba(255, 255, 255, 0.2);
                border-radius: 50%;
            }

            .loader-line-mask {
                position: absolute;
                width: 50%;
                height: 100%;
                top: 0;
                right: 0;
                overflow: hidden;
                transform-origin: 0 50%;
                animation: rotate 1.2s infinite linear;
            }

            .loader-line {
                position: absolute;
                width: 200%;
                height: 100%;
                border: 2px solid #ffd700;
                border-radius: 50%;
                left: -100%;
            }

            .loader-logo {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                opacity: 0;
                animation: fadeIn 0.5s ease forwards 0.5s;
            }

            @keyframes rotate {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            /* Progress Bar Styles */
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
            }

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
                background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
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

            /* Your existing styles */
            .bg-grid-white {
                background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='1' height='1' fill='white'/%3E%3C/svg%3E");
            }
        </style>
    </body>
</html>
