<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <!-- Ajout du cache busting pour éviter les problèmes de cache navigateur -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>DEVC | Développeur web moderne</title>
    <!-- Tailwind CSS + Font Awesome + Google Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <style>
        /* Reset & base */
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            transition: background-color 0.3s ease, color 0.2s ease;
        }

        /* Animations et styles modernes */
        .glass-card {
            backdrop-filter: blur(2px);
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        .glass-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 35px -12px rgba(0, 0, 0, 0.25);
        }

        .hero-gradient {
            background: radial-gradient(circle at 70% 30%, rgba(59,130,246,0.08) 0%, rgba(6,182,212,0.03) 60%);
        }

        .dark .hero-gradient {
            background: radial-gradient(circle at 70% 30%, rgba(59,130,246,0.12) 0%, rgba(6,182,212,0.05) 60%);
        }

        .btn-shine {
            position: relative;
            overflow: hidden;
            transition: all 0.2s;
        }

        .btn-shine:after {
            content: "";
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: linear-gradient(115deg, rgba(255,255,255,0) 10%, rgba(255,255,255,0.25) 50%, rgba(255,255,255,0) 90%);
            transform: rotate(25deg);
            transition: left 0.6s ease;
        }

        .btn-shine:hover:after {
            left: 120%;
        }

        .mobile-menu-open {
            overflow: hidden;
        }

        .project-img-placeholder {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            min-height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .group:hover .project-img-placeholder {
            transform: scale(1.05);
        }

        .dark .project-img-placeholder {
            background: linear-gradient(135deg, #0f172a, #020617);
        }

        .animate-float {
            animation: float 5s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
            100% { transform: translateY(0px); }
        }

        .skill-badge {
            transition: all 0.2s;
            cursor: default;
        }

        .skill-badge:hover {
            transform: scale(1.05);
            background-color: rgb(37 99 235);
            color: white;
        }

        ::selection {
            background: #3b82f6;
            color: white;
        }

        .social-icon {
            transition: all 0.2s;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            color: #3b82f6;
        }

        /* Animation d'apparition */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Loading spinner optionnel */
        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Scrollbar stylisée */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
        }

        .dark ::-webkit-scrollbar-track {
            background: #1f2937;
        }

        /* Focus visible */
        :focus-visible {
            outline: 2px solid #3b82f6;
            outline-offset: 2px;
        }
    </style>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 antialiased">

    <!-- ========== NAVBAR MODERNE ========== -->
    <nav class="sticky top-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-lg border-b border-gray-200 dark:border-gray-800 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 md:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <!-- Logo avec animation -->
                <a href="#" class="text-2xl font-extrabold tracking-tight bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent hover:scale-105 transition-transform">
                    DEVC
                </a>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#accueil" class="nav-link font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition relative group">
                        Accueil
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#services" class="nav-link font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition relative group">
                        Services
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#projets" class="nav-link font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition relative group">
                        Projets
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#contact" class="nav-link font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition relative group">
                        Contact
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <!-- Bouton toggle dark mode -->
                    <button id="theme-toggle" class="ml-2 p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition transform hover:scale-110">
                        <i class="fas fa-moon dark:hidden text-lg"></i>
                        <i class="fas fa-sun hidden dark:inline-block text-lg"></i>
                    </button>
                </div>

                <!-- Bouton mobile + thème mobile -->
                <div class="flex items-center gap-3 md:hidden">
                    <button id="mobile-theme-toggle" class="p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 transition transform hover:scale-110">
                        <i class="fas fa-moon dark:hidden"></i>
                        <i class="fas fa-sun hidden dark:inline-block"></i>
                    </button>
                    <button id="menu-btn" class="focus:outline-none text-2xl p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu Mobile (off-canvas) amélioré -->
        <div id="mobile-menu" class="fixed inset-0 bg-white dark:bg-gray-900 z-50 transform translate-x-full transition-transform duration-300 ease-in-out md:hidden">
            <div class="flex justify-end p-5">
                <button id="close-menu" class="text-3xl w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition">&times;</button>
            </div>
            <div class="flex flex-col items-center gap-8 text-xl font-semibold mt-12">
                <a href="#accueil" class="mobile-link hover:text-blue-600 transition transform hover:scale-105">Accueil</a>
                <a href="#services" class="mobile-link hover:text-blue-600 transition transform hover:scale-105">Services</a>
                <a href="#projets" class="mobile-link hover:text-blue-600 transition transform hover:scale-105">Projets</a>
                <a href="#contact" class="mobile-link hover:text-blue-600 transition transform hover:scale-105">Contact</a>
                <hr class="w-1/2 border-gray-300 dark:border-gray-700">
                <a href="https://wa.me/237689696831" target="_blank" class="bg-green-600 text-white px-8 py-3 rounded-full flex items-center gap-2 shadow-lg hover:bg-green-700 transition transform hover:scale-105">
                    <i class="fab fa-whatsapp"></i> WhatsApp direct
                </a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 md:px-8">
        <!-- ========== HERO SECTION ========== -->
        <section id="accueil" class="relative flex flex-col md:flex-row items-center justify-between py-12 md:py-20 hero-gradient rounded-3xl my-6 md:my-8 overflow-hidden">
            <div class="md:w-1/2 text-center md:text-left z-10 animate-fade-in-up">
                <span class="inline-block px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 text-sm font-semibold mb-4">🚀 Fullstack créatif</span>
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-5">
                    Je crée des applications <span class="bg-gradient-to-r from-blue-600 to-teal-500 bg-clip-text text-transparent">web modernes</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-lg mx-auto md:mx-0">
                    Développeur Laravel & React, je transforme vos idées en solutions digitales performantes et élégantes.
                </p>
                <div class="flex flex-col sm:flex-row gap-5 justify-center md:justify-start">
                    <a href="#projets" class="bg-blue-600 hover:bg-blue-700 text-white px-7 py-3 rounded-xl font-semibold shadow-md btn-shine transition flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-right"></i> Voir mes projets
                    </a>
                    <a href="https://wa.me/237689696831" target="_blank" class="border-2 border-green-500 text-green-600 dark:text-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 px-7 py-3 rounded-xl font-medium transition flex items-center justify-center gap-2 hover:scale-105">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                </div>
                <!-- stats informelles -->
                <div class="flex flex-wrap gap-6 mt-10 justify-center md:justify-start">
                    <div class="hover:scale-105 transition"><span class="font-black text-2xl text-blue-600">10+</span><span class="block text-sm">projets livrés</span></div>
                    <div class="hover:scale-105 transition"><span class="font-black text-2xl text-blue-600">100%</span><span class="block text-sm">satisfaction</span></div>
                    <div class="hover:scale-105 transition"><span class="font-black text-2xl text-blue-600">24/7</span><span class="block text-sm">support</span></div>
                </div>
            </div>
            <div class="md:w-1/2 mt-12 md:mt-0 flex justify-center">
                <div class="relative w-72 md:w-96 animate-float">
                    <div class="rounded-2xl overflow-hidden shadow-2xl ring-1 ring-gray-200 dark:ring-gray-700 bg-gradient-to-br from-blue-500/10 to-cyan-500/10 p-2">
                        <img src="https://placehold.co/600x500/0f172a/3b82f6?text=⚡+DEV+⚡" alt="Developer illustration" class="w-full h-auto rounded-xl mix-blend-multiply dark:mix-blend-screen">
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== SERVICES SECTION ========== -->
        <section id="services" class="py-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-3">Mes <span class="text-blue-600">services</span> sur mesure</h2>
                <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">Des solutions web robustes, scalables et design-first.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="glass-card bg-gray-50 dark:bg-gray-800/50 rounded-2xl p-6 shadow-md hover:shadow-xl border border-gray-100 dark:border-gray-700 opacity-0 translate-y-6 service-card">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/40 rounded-xl flex items-center justify-center mb-5"><i class="fas fa-code text-blue-600 text-2xl"></i></div>
                    <h3 class="text-xl font-bold mb-2">Applications Laravel</h3>
                    <p class="text-gray-600 dark:text-gray-300">Backend robuste, API REST, tableaux de bord admin, authentification avancée.</p>
                </div>
                <div class="glass-card bg-gray-50 dark:bg-gray-800/50 rounded-2xl p-6 shadow-md hover:shadow-xl border border-gray-100 dark:border-gray-700 opacity-0 translate-y-6 service-card">
                    <div class="w-12 h-12 bg-cyan-100 dark:bg-cyan-900/40 rounded-xl flex items-center justify-center mb-5"><i class="fas fa-mobile-alt text-cyan-600 text-2xl"></i></div>
                    <h3 class="text-xl font-bold mb-2">Frontend React / Vue</h3>
                    <p class="text-gray-600 dark:text-gray-300">Interfaces modernes, responsive, animations fluides et expérience utilisateur parfaite.</p>
                </div>
                <div class="glass-card bg-gray-50 dark:bg-gray-800/50 rounded-2xl p-6 shadow-md hover:shadow-xl border border-gray-100 dark:border-gray-700 opacity-0 translate-y-6 service-card">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/40 rounded-xl flex items-center justify-center mb-5"><i class="fas fa-database text-purple-600 text-2xl"></i></div>
                    <h3 class="text-xl font-bold mb-2">Base de données & API</h3>
                    <p class="text-gray-600 dark:text-gray-300">Optimisation SQL, conception scalable, intégration de services tiers.</p>
                </div>
            </div>
        </section>

        <!-- ========== PROJETS SECTION ========== -->
        <section id="projets" class="py-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-3">✨ Réalisations récentes</h2>
                <p class="text-gray-500 dark:text-gray-400">Des projets concrets pour des clients exigeants</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700 opacity-0 translate-y-6 project-card">
                    <div class="project-img-placeholder h-48 flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600">
                        <i class="fas fa-chart-line text-white text-5xl opacity-80"></i>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold">SmartGest ERP</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Laravel + Tailwind</p>
                        <p class="mt-3 text-gray-600 dark:text-gray-300">Solution de gestion d'entreprise avec tableau de bord temps réel et facturation.</p>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <span class="skill-badge bg-gray-200 dark:bg-gray-700 text-xs px-3 py-1 rounded-full">Laravel</span>
                            <span class="skill-badge bg-gray-200 dark:bg-gray-700 text-xs px-3 py-1 rounded-full">MySQL</span>
                            <span class="skill-badge bg-gray-200 dark:bg-gray-700 text-xs px-3 py-1 rounded-full">Alpine.js</span>
                        </div>
                    </div>
                </div>
                <div class="group bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700 opacity-0 translate-y-6 project-card">
                    <div class="project-img-placeholder h-48 flex items-center justify-center bg-gradient-to-r from-emerald-500 to-teal-600">
                        <i class="fas fa-store text-white text-5xl opacity-80"></i>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold">E-Shop Pulse</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">React + Laravel API</p>
                        <p class="mt-3 text-gray-600 dark:text-gray-300">Plateforme e-commerce complète, paiements Stripe, panier temps réel.</p>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <span class="skill-badge bg-gray-200 dark:bg-gray-700 text-xs px-3 py-1 rounded-full">React</span>
                            <span class="skill-badge bg-gray-200 dark:bg-gray-700 text-xs px-3 py-1 rounded-full">Sanctum</span>
                            <span class="skill-badge bg-gray-200 dark:bg-gray-700 text-xs px-3 py-1 rounded-full">Tailwind</span>
                        </div>
                    </div>
                </div>
                <div class="group bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700 opacity-0 translate-y-6 project-card">
                    <div class="project-img-placeholder h-48 flex items-center justify-center bg-gradient-to-r from-fuchsia-500 to-pink-500">
                        <i class="fas fa-calendar-alt text-white text-5xl opacity-80"></i>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold">EventFlow</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Livewire + MySQL</p>
                        <p class="mt-3 text-gray-600 dark:text-gray-300">Application de gestion d'événements avec billetterie dynamique et QR codes.</p>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <span class="skill-badge bg-gray-200 dark:bg-gray-700 text-xs px-3 py-1 rounded-full">Livewire</span>
                            <span class="skill-badge bg-gray-200 dark:bg-gray-700 text-xs px-3 py-1 rounded-full">Alpine</span>
                            <span class="skill-badge bg-gray-200 dark:bg-gray-700 text-xs px-3 py-1 rounded-full">API</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center gap-2 bg-transparent border border-blue-600 text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 px-6 py-3 rounded-full font-semibold transition hover:scale-105">
                    <span>Tous les projets</span> <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>

        <!-- ========== CONTACT & FORMULAIRE ========== -->
        <section id="contact" class="py-16 my-6 rounded-3xl bg-gray-50 dark:bg-gray-800/40">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold">Discutons de votre <span class="text-blue-600">projet</span></h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2">Une idée ? Besoin d'un dev ? Écrivez-moi !</p>
            </div>
            <div class="flex flex-col md:flex-row gap-12 max-w-5xl mx-auto">
                <div class="flex-1 space-y-5">
                    <div class="flex items-center gap-4 hover:translate-x-2 transition">
                        <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/40 flex items-center justify-center"><i class="fas fa-envelope text-blue-600"></i></div>
                        <div><p class="font-semibold">Email</p><a href="mailto:contact@devc.com" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">contact@devc.com</a></div>
                    </div>
                    <div class="flex items-center gap-4 hover:translate-x-2 transition">
                        <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/40 flex items-center justify-center"><i class="fab fa-whatsapp text-green-600"></i></div>
                        <div><p class="font-semibold">WhatsApp</p><a href="https://wa.me/237689696831" target="_blank" class="text-gray-600 dark:text-gray-300 hover:text-green-600">+237 689 696 831</a></div>
                    </div>
                    <div class="flex items-center gap-4 hover:translate-x-2 transition">
                        <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center"><i class="fab fa-github text-gray-800 dark:text-white"></i></div>
                        <div><p class="font-semibold">GitHub</p><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">/devc_creator</a></div>
                    </div>
                    <div class="flex gap-4 pt-4">
                        <a href="#" class="social-icon text-2xl text-gray-500 hover:text-blue-600"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon text-2xl text-gray-500 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon text-2xl text-gray-500 hover:text-blue-600"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div class="flex-1">
                    <form id="demo-form" class="bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-md">
                        <div class="mb-4">
                            <input type="text" id="name-input" placeholder="Nom complet" required class="w-full p-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-transparent focus:ring-2 focus:ring-blue-500 outline-none transition">
                        </div>
                        <div class="mb-4">
                            <input type="email" id="email-input" placeholder="Adresse email" required class="w-full p-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-transparent focus:ring-2 focus:ring-blue-500 outline-none transition">
                        </div>
                        <div class="mb-5">
                            <textarea id="message-input" rows="3" placeholder="Décrivez votre projet..." required class="w-full p-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-transparent focus:ring-2 focus:ring-blue-500 outline-none transition"></textarea>
                        </div>
                        <button type="submit" id="submit-btn" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition shadow-md flex items-center justify-center gap-2">
                            <i class="fas fa-paper-plane"></i>
                            <span>Envoyer message</span>
                            <span class="loading-spinner"></span>
                        </button>
                        <p class="text-xs text-center text-gray-400 mt-3">Réponse sous 24h ✨</p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER moderne -->
    <footer class="border-t border-gray-200 dark:border-gray-800 mt-12 pt-10 pb-8">
        <div class="max-w-7xl mx-auto px-6 md:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">DEVC</div>
            <p class="text-gray-500 dark:text-gray-400 text-sm">© 2026 — Tous droits réservés — Développeur passionné</p>
            <div class="flex gap-4">
                <a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fas fa-arrow-up"></i> Haut</a>
            </div>
        </div>
    </footer>

    <script>
        // Empêcher le cache et forcer l'exécution du script
        (function() {
            console.log('Script chargé - ' + new Date().toLocaleTimeString());

            // Gestion du dark mode optimisée
            const themeToggleBtn = document.getElementById('theme-toggle');
            const mobileThemeBtn = document.getElementById('mobile-theme-toggle');
            const htmlElement = document.documentElement;

            function setTheme(theme) {
                if (theme === 'dark') {
                    htmlElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                } else {
                    htmlElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                }
            }

            function toggleTheme() {
                if (htmlElement.classList.contains('dark')) {
                    setTheme('light');
                } else {
                    setTheme('dark');
                }
            }

            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                setTheme('dark');
            } else {
                setTheme('light');
            }

            if (themeToggleBtn) themeToggleBtn.addEventListener('click', toggleTheme);
            if (mobileThemeBtn) mobileThemeBtn.addEventListener('click', toggleTheme);

            // Menu mobile
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const closeMenuBtn = document.getElementById('close-menu');
            const mobileLinks = document.querySelectorAll('.mobile-link');

            function openMobileMenu() {
                mobileMenu.classList.remove('translate-x-full');
                document.body.classList.add('mobile-menu-open');
            }

            function closeMobileMenu() {
                mobileMenu.classList.add('translate-x-full');
                document.body.classList.remove('mobile-menu-open');
            }

            if (menuBtn) menuBtn.addEventListener('click', openMobileMenu);
            if (closeMenuBtn) closeMenuBtn.addEventListener('click', closeMobileMenu);

            mobileLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    closeMobileMenu();
                    const targetId = link.getAttribute('href');
                    if(targetId && targetId !== '#') {
                        const targetEl = document.querySelector(targetId);
                        if(targetEl) targetEl.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });

            // Smooth scroll pour liens desktop
            document.querySelectorAll('.nav-link').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if(href && href !== '#') {
                        e.preventDefault();
                        const target = document.querySelector(href);
                        if(target) target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });

            // Formulaire avec feedback visuel
            const demoForm = document.getElementById('demo-form');
            const submitBtn = document.getElementById('submit-btn');
            const loadingSpinner = document.querySelector('.loading-spinner');
            const btnText = submitBtn?.querySelector('span:first-of-type');

            if(demoForm) {
                demoForm.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    // Animation de chargement
                    if(submitBtn) {
                        submitBtn.disabled = true;
                        if(loadingSpinner) loadingSpinner.style.display = 'inline-block';
                        if(btnText) btnText.style.opacity = '0.7';
                    }

                    // Simuler l'envoi
                    await new Promise(resolve => setTimeout(resolve, 800));

                    // Notification moderne
                    const successMsg = document.createElement('div');
                    successMsg.textContent = '✨ Message envoyé avec succès ! Je vous réponds sous 24h.';
                    successMsg.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fade-in-up';
                    document.body.appendChild(successMsg);

                    demoForm.reset();

                    setTimeout(() => {
                        successMsg.remove();
                    }, 3000);

                    if(submitBtn) {
                        submitBtn.disabled = false;
                        if(loadingSpinner) loadingSpinner.style.display = 'none';
                        if(btnText) btnText.style.opacity = '1';
                    }
                });
            }

            // Animation au scroll avec Intersection Observer
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if(entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        entry.target.classList.remove('opacity-0', 'translate-y-6');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observer tous les éléments à animer
            document.querySelectorAll('.service-card, .project-card, .glass-card').forEach(el => {
                observer.observe(el);
            });

            // Animation de la hero section
            const heroSection = document.querySelector('#accueil');
            if(heroSection) {
                heroSection.classList.add('animate-fade-in-up');
            }

            // Scroll vers le haut depuis le footer
            const backToTop = document.querySelector('footer a[href="#"]');
            if(backToTop) {
                backToTop.addEventListener('click', (e) => {
                    e.preventDefault();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }

            // Gestion du scroll pour la navbar
            let lastScroll = 0;
            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffset;
                const nav = document.querySelector('nav');
                if(currentScroll > 100 && currentScroll > lastScroll) {
                    nav.style.transform = 'translateY(-100%)';
                } else {
                    nav.style.transform = 'translateY(0)';
                }
                lastScroll = currentScroll;
            });
        })();
    </script>
</body>
</html>
