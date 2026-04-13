<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEVC | Studio Web Professionnel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .dark .glass {
            background: rgba(15, 23, 42, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.8) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }
        .dark .glass-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(15, 23, 42, 0.8) 100%);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        }
        .nav-link { position: relative; }
        .nav-link::after {
            content: ''; position: absolute; width: 0; height: 2px;
            bottom: -4px; left: 0; background-color: #3b82f6;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after { width: 100%; }

        .reveal-on-scroll { opacity: 0; transform: translateY(30px); transition: all 0.8s ease-out; }
        .reveal-on-scroll.is-visible { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-slate-200 transition-colors duration-300 antialiased overflow-x-hidden selection:bg-primary-500 selection:text-white">

    <!-- ARRIÈRE-PLAN ANIMÉ (DÉCOR MÉTALLIQUE / GLOw) -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400 dark:bg-blue-600 rounded-full mix-blend-multiply dark:mix-blend-screen filter blur-[128px] opacity-30 animate-blob"></div>
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-cyan-400 dark:bg-teal-500 rounded-full mix-blend-multiply dark:mix-blend-screen filter blur-[128px] opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 left-1/2 w-96 h-96 bg-indigo-400 dark:bg-indigo-600 rounded-full mix-blend-multiply dark:mix-blend-screen filter blur-[128px] opacity-30 animate-blob animation-delay-4000"></div>
    </div>

    <!-- NAVBAR -->
    <nav class="fixed w-full z-50 glass transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="#" id="devc-logo" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary-500 to-cyan-500 flex items-center justify-center text-white font-bold text-xl shadow-lg group-hover:scale-105 transition-transform">
                        <i class="fas fa-code"></i>
                    </div>
                    <span class="text-2xl font-extrabold tracking-tight text-slate-900 dark:text-white">DEVC</span>
                </a>

                <!-- Liens Desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#services" class="nav-link text-sm font-semibold text-slate-700 dark:text-slate-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Services</a>
                    <a href="#projets" class="nav-link text-sm font-semibold text-slate-700 dark:text-slate-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Projets</a>
                    <a href="#contact" class="nav-link text-sm font-semibold text-slate-700 dark:text-slate-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Contact</a>

                    <div class="pl-4 border-l border-slate-200 dark:border-slate-700 flex items-center gap-4">
                        <!-- Theme Toggle Button -->
                        <button id="theme-toggle" class="text-slate-500 dark:text-slate-400 hover:text-primary-500 dark:hover:text-primary-400 focus:outline-none transition-transform hover:scale-110">
                            <i id="theme-icon" class="fas fa-moon text-xl"></i>
                        </button>
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="bg-primary-600 hover:bg-primary-700 text-white px-5 py-2 rounded-lg text-sm font-semibold shadow-md transition-all hover:shadow-lg">Dashboard</a>
                        @else
                            <a href="https://wa.me/237689696831" target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg text-sm font-semibold shadow-md transition-all hover:shadow-lg hover:-translate-y-0.5 flex items-center gap-2">
                                <i class="fab fa-whatsapp"></i> Discutons
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Menu Mobile Button -->
                <div class="md:hidden flex items-center gap-4">
                    <button id="mobile-theme-toggle" class="text-slate-500 dark:text-slate-400">
                        <i class="fas fa-moon text-xl"></i>
                    </button>
                    <button id="mobile-menu-btn" class="text-slate-700 dark:text-slate-300 focus:outline-none p-2">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu Mobile Overlay -->
        <div id="mobile-menu" class="hidden absolute top-20 left-0 w-full glass border-t border-slate-200 dark:border-slate-800 shadow-xl">
            <div class="px-6 py-6 space-y-4 flex flex-col">
                <a href="#services" class="mobile-link text-lg font-semibold text-slate-800 dark:text-slate-200">Services</a>
                <a href="#projets" class="mobile-link text-lg font-semibold text-slate-800 dark:text-slate-200">Projets</a>
                <a href="#contact" class="mobile-link text-lg font-semibold text-slate-800 dark:text-slate-200">Contact</a>
                <hr class="border-slate-200 dark:border-slate-700">
                <a href="https://wa.me/237689696831" class="bg-green-600 text-white text-center py-3 rounded-xl font-semibold shadow-md">
                    <i class="fab fa-whatsapp mr-2"></i> WhatsApp Direct
                </a>
            </div>
        </div>
    </nav>

    <main>
        <!-- HERO SECTION -->
        <section class="  relative pt-12 pb-20 lg:pt-48 lg:pb-32 px-6 overflow-hidden min-h-[90vh] flex items-center">
            {{-- <div class="  max-w-7xl -mt-[4.8rem] mx-auto w-full grid lg:grid-cols-2 gap-28 items-center"> --}}
               <div class="max-w-7xl mx-auto w-full grid lg:grid-cols-2 gap-12 lg:gap-28 items-center lg:-mt-[4.8rem]">
                <div class=" animate-fade-in-up">
                    <div class="  inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-50 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 text-sm font-semibold mb-6 border border-primary-100 dark:border-primary-800/50 shadow-sm">
                        <span class="relative flex h-3 w-3">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-3 w-3 bg-primary-500"></span>
                        </span>
                        Disponible pour de nouveaux projets
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-[1.1] mb-6">
                        Je conçois des <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-cyan-500">applications web</span> <br>
                        d'exception.
                    </h1>
                    <p class="text-lg lg:text-xl text-slate-600 dark:text-slate-400 mb-10 max-w-lg leading-relaxed">
                        Développeur Fullstack expert Laravel & Modern Frontends. Je transforme vos idées complexes en plateformes numériques performantes, ergonomiques et scalables.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#projets" class="bg-slate-900 dark:bg-white text-white dark:text-slate-900 hover:bg-slate-800 dark:hover:bg-slate-100 px-8 py-4 rounded-xl text-sm font-semibold shadow-lg hover:shadow-xl transition-all text-center flex items-center justify-center gap-2 hover:-translate-y-1">
                            Découvrir mes travaux <i class="fas fa-arrow-down"></i>
                        </a>
                        <a href="#contact" class="glass-card hover:bg-white/50 dark:hover:bg-slate-800/50 text-slate-900 dark:text-white px-8 py-4 rounded-xl text-sm font-semibold shadow-sm hover:shadow-md transition-all text-center flex items-center justify-center gap-2">
                            Demander un devis
                        </a>
                    </div>

                    <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-800 flex items-center gap-8 text-slate-600 dark:text-slate-400">
                        <div class="flex flex-col">
                            <span class="text-3xl font-extrabold text-slate-900 dark:text-white">10+</span>
                            <span class="text-sm font-medium">Projets livrés</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-3xl font-extrabold text-slate-900 dark:text-white">100%</span>
                            <span class="text-sm font-medium">Clients satisfaits</span>
                        </div>
                    </div>
                </div>

                <!-- Hero Graphic (Abstract Code Card UI) -->
                <div class=" relative hidden lg:block animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="absolute inset-0 bg-gradient-to-tr from-primary-500/20 to-cyan-500/20 rounded-[3rem] transform rotate-3 scale-105 blur-lg"></div>
                    <div class="glass-card rounded-[2rem] p-8 relative overflow-hidden h-[500px]">
                        <!-- Simulate Editor -->
                        <div class="flex items-center justify-between mb-8 border-b border-slate-200 dark:border-slate-700 pb-4">
                            <div class="flex gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                <div class="w-3 h-3 rounded-full bg-green-400"></div>
                            </div>
                            <div class="text-xs font-mono text-slate-500">ProjectController.php</div>
                        </div>
                        <div class="font-mono text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                            <span class="text-purple-600 dark:text-purple-400">class</span> <span class="text-yellow-600 dark:text-yellow-300">ProjectController</span> <span class="text-purple-600 dark:text-purple-400">extends</span> <span class="text-green-600 dark:text-green-400">Controller</span><br>
                            {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-600 dark:text-purple-400">public function</span> <span class="text-blue-600 dark:text-blue-400">deliverMagic</span>()<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;{<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$app = <span class="text-yellow-600 dark:text-yellow-300">App</span>::create([<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-green-600 dark:text-green-400">'design'</span> => <span class="text-green-600 dark:text-green-400">'Perfect'</span>,<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-green-600 dark:text-green-400">'performance'</span> => 100,<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-green-600 dark:text-green-400">'ux'</span> => <span class="text-green-600 dark:text-green-400">'Flawless'</span><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]);<br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-600 dark:text-purple-400">return</span> $app->launch();<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                            }
                        </div>

                        <!-- Floating snippet -->
                        <div class="absolute bottom-10 right-10 glass-card rounded-xl p-4 shadow-2xl transform rotate-[-5deg] hover:rotate-0 transition-transform">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/50 flex items-center justify-center text-green-600">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900 dark:text-white text-sm">Tests passed</p>
                                    <p class="text-xs text-slate-500">100% coverage</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES SECTION -->
     <section id="services" class="py-8 md:py-24 relative z-10 w-full overflow-hidden">
         <div class="max-w-7xl mx-auto px-6 lg:px-8 lg:-mt-[5.2rem]">
                <div class="text-center max-w-2xl mx-auto mb-6 md:mb-16 reveal-on-scroll">
                    <h2 class="text-3xl font-bold text-primary-600 dark:text-primary-400 tracking-wider uppercase mb-2">Expertise</h2>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white mb-4">Des solutions sur mesure</h3>
                    <p class="text-slate-600 dark:text-slate-400">J'accompagne mes clients de la réflexion architecturale jusqu'au déploiement final en production.</p>
                </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:-mt-14"> @forelse($services as $index => $service)
                        @php
    $themes = [
        ['icon' => 'fa-laptop-code', 'color' => 'text-blue-500', 'bg' => 'bg-blue-50 dark:bg-blue-500/10'],
        ['icon' => 'fa-database', 'color' => 'text-purple-500', 'bg' => 'bg-purple-50 dark:bg-purple-500/10'],
        ['icon' => 'fa-mobile-screen-button', 'color' => 'text-cyan-500', 'bg' => 'bg-cyan-50 dark:bg-cyan-500/10'],
        ['icon' => 'fa-server', 'color' => 'text-emerald-500', 'bg' => 'bg-emerald-50 dark:bg-emerald-500/10'],
    ];
    $theme = $themes[$index % count($themes)];
                        @endphp
                        <div class="service-card {{ $index > 2 ? 'hidden md:block mobile-hidden-service' : '' }} glass-card rounded-[1.5rem] p-8 hover:-translate-y-2 transition-all duration-300 group reveal-on-scroll relative overflow-hidden">
                            <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition-opacity">
                                <i class="fas {{ $theme['icon'] }} text-8xl {{ $theme['color'] }}"></i>
                            </div>
                            <div class="w-14 h-14 rounded-2xl {{ $theme['bg'] }} flex items-center justify-center mb-6 shadow-inner relative z-10">
                                <i class="fas {{ $theme['icon'] }} text-2xl {{ $theme['color'] }}"></i>
                            </div>
                            <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-3 relative z-10">{{ $service->title }}</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed relative z-10">{{ $service->description }}</p>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-10 glass-card rounded-[1.5rem] reveal-on-scroll">
                            <p class="text-slate-500">Plateforme en configuration. Ajout de services en cours...</p>
                        </div>
                    @endforelse
                </div>

                @if(count($services) > 3)
                <div class="mt-10 text-center md:hidden reveal-on-scroll">
                    <button id="toggle-services-btn" class="inline-flex items-center justify-center gap-2 px-6 py-3 text-sm font-semibold text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-full hover:border-primary-500 hover:text-primary-600 dark:hover:border-primary-500 dark:hover:text-primary-400 transition-all shadow-sm">
                        <span>Voir tous les services</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
                @endif
            </div>
        </section>

        <!-- PROJETS SECTION -->
        <section id="projets" class=" -mt-[3.5rem]   py-12 md:py-24 bg-slate-100/50 dark:bg-slate-800/20 relative w-full">
            <div class="  max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-end mb-8 md:mb-16 reveal-on-scroll gap-6">
                    <div class="max-w-xl">
                        <h2 class="text-3xl font-bold text-primary-600 dark:text-primary-400 tracking-wider uppercase mb-2  ">Portfolio</h2>
                        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white mb-4">Dernières réalisations</h3>
                        <p class="text-slate-600 dark:text-slate-400">Découvrez une sélection de projets récents, alliant design élégant et code performant.</p>
                    </div>
                </div>

                <div class=" -mt-[3.5rem]  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
                    @forelse($projects as $index => $project)
                        <div class="bg-white dark:bg-slate-800 rounded-[1.5rem] overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 dark:border-slate-700 transition-all duration-300 group reveal-on-scroll flex flex-col h-full">
                            <div class="relative h-56 overflow-hidden bg-slate-200 dark:bg-slate-900">
                                @if($project->image)
                                    <img src="{{ asset('uploads/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                @else
                                    <div class="absolute inset-0 bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center">
                                        <i class="fas fa-image text-4xl text-slate-700"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="p-8 flex flex-col flex-1">
                                <h4 class="text-xl font-bold text-slate-900 dark:text-white mb-2">{{ $project->title }}</h4>
                                <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 flex-1 line-clamp-3">{{ $project->description }}</p>

                                @if($project->technologies && is_array($project->technologies))
                                    <div class="flex flex-wrap gap-2 mb-6 mt-auto">
                                        @foreach($project->technologies as $tech)
                                            <span class="px-2.5 py-1 text-xs font-semibold rounded-md bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300">{{ trim($tech) }}</span>
                                        @endforeach
                                    </div>
                                   
                                @endif

                                @if($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="inline-flex items-center text-sm font-semibold text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 group/link">
                                        Voir le cas d'étude <i class="fas fa-arrow-right ml-2 transform group-hover/link:translate-x-1 transition-transform"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-16 text-center text-slate-500 bg-white dark:bg-slate-800 rounded-[1.5rem] border border-dashed border-slate-300 dark:border-slate-700">
                            <i class="fas fa-box-open text-4xl mb-4 text-slate-300 dark:text-slate-600"></i>
                            <p>Le portfolio est en cours de remplissage.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- CTA CONTACT SECTION -->
        <section id="contact" class=" -mt-[3.5rem] py-12 md:py-24 relative overflow-hidden">
            <div class="absolute inset-0 bg-primary-600 dark:bg-slate-800 -skew-y-3 origin-bottom-left scale-110 z-0"></div>

            <div class="  -mt-[3.5rem] max-w-5xl mx-auto px-6 lg:px-8 relative z-10 flex flex-col md:flex-row bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl overflow-hidden reveal-on-scroll">

                <div class="flex-1 p-10 lg:p-14 bg-gradient-to-br from-white to-slate-50 dark:from-slate-900 dark:to-slate-800">
                    <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white mb-4">Prêt à collaborer ?</h2>
                    <p class="text-slate-600 dark:text-slate-400 mb-8 max-w-sm">Vous avez une idée de projet web, d'application SaaS ou de plateforme e-commerce ? Parlons-en et donnons vie à votre vision.</p>

                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center text-primary-600 dark:text-primary-400 flex-shrink-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">Email</p>
                                <a href="mailto:hello@devc.com" class="text-slate-600 dark:text-slate-400 hover:text-primary-500">hello@devc.com</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center text-green-600 flex-shrink-0">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">WhatsApp & Téléphone</p>
                                <a href="https://wa.me/237689696831" class="text-slate-600 dark:text-slate-400 hover:text-green-500">+237 689 696 831</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 p-10 lg:p-14 bg-slate-50 dark:bg-slate-850 border-l border-slate-100 dark:border-slate-800">
                    <form class="space-y-5">
                        <div>
                            <input type="text" placeholder="Votre nom" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 px-4 py-3 rounded-xl focus:ring-2 focus:ring-primary-500 outline-none transition text-sm text-slate-800 dark:text-slate-200">
                        </div>
                        <div>
                            <input type="email" placeholder="Votre email" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 px-4 py-3 rounded-xl focus:ring-2 focus:ring-primary-500 outline-none transition text-sm text-slate-800 dark:text-slate-200">
                        </div>
                        <div>
                            <textarea rows="4" placeholder="Parlez-moi de votre projet..." class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 px-4 py-3 rounded-xl focus:ring-2 focus:ring-primary-500 outline-none transition text-sm text-slate-800 dark:text-slate-200 resize-none"></textarea>
                        </div>
                        <button type="button" onclick="alert('Demo: Formulaire simulé.')" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3.5 rounded-xl shadow-md transition-shadow hover:shadow-lg flex justify-center items-center gap-2">
                            Envoyer le message <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-300 py-7 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <i class="fas fa-code text-primary-500 text-2xl"></i>
                <span class="text-xl font-bold text-white">DEVC</span>
            </div>
            <p class="text-sm text-slate-500">© 2026 DEVC Studio. Tous droits réservés.</p>
            <div class="flex gap-4">
                <!-- <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary-600 hover:text-white transition-colors"><i class="fab fa-github"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary-600 hover:text-white transition-colors"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary-600 hover:text-white transition-colors"><i class="fab fa-twitter"></i></a> -->
            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script>
        // Secret Admin Login on Triple Click
        const logoBtn = document.getElementById('devc-logo');
        let clickCount = 0;
        let clickTimer;

        if (logoBtn) {
            logoBtn.addEventListener('click', (e) => {
                e.preventDefault();
                clickCount++;
                clearTimeout(clickTimer);

                if (clickCount >= 3) {
                    window.location.href = "{{ route('login') }}";
                }

                clickTimer = setTimeout(() => { clickCount = 0; }, 600);
            });
        }

        // Navbar Scrolled State
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('shadow-md', 'backdrop-blur-lg');
                navbar.classList.replace('glass', 'bg-white/90');
                if(document.documentElement.classList.contains('dark')) {
                    navbar.classList.replace('bg-white/90', 'bg-slate-900/90');
                }
            } else {
                navbar.classList.remove('shadow-md', 'backdrop-blur-lg', 'bg-white/90', 'bg-slate-900/90');
                navbar.classList.add('glass');
            }
        });

        // Theme Toggle Functionality
        const themeToggleBtns = [document.getElementById('theme-toggle'), document.getElementById('mobile-theme-toggle')];
        const themeIcon = document.getElementById('theme-icon');

        function updateIcon() {
            const isDark = document.documentElement.classList.contains('dark');
            if(themeIcon) {
                themeIcon.className = isDark ? 'fas fa-sun text-xl text-yellow-400' : 'fas fa-moon text-xl';
            }
            // Mettre à jour la navbar si on a scrollé pendant le toggle
            if (window.scrollY > 20) {
                if(isDark) {
                     navbar.classList.replace('bg-white/90', 'bg-slate-900/90');
                } else {
                     navbar.classList.replace('bg-slate-900/90', 'bg-white/90');
                }
            }
        }

        updateIcon();

        themeToggleBtns.forEach(btn => {
            if(!btn) return;
            btn.addEventListener('click', () => {
                document.documentElement.classList.toggle('dark');
                if (document.documentElement.classList.contains('dark')) {
                    localStorage.theme = 'dark';
                } else {
                    localStorage.theme = 'light';
                }
                updateIcon();
            });
        });

        // Mobile Menu
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when clicking a link
            document.querySelectorAll('.mobile-link').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });
        }

        // Intersection Observer for Scroll Animations
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));

        // Mobile Services Toggle
        const toggleServicesBtn = document.getElementById('toggle-services-btn');
        if (toggleServicesBtn) {
            const hiddenCards = document.querySelectorAll('.mobile-hidden-service');
            let servicesOpen = false;

            toggleServicesBtn.addEventListener('click', () => {
                servicesOpen = !servicesOpen;

                hiddenCards.forEach(card => {
                    if (servicesOpen) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });

                toggleServicesBtn.innerHTML = servicesOpen
                    ? `<span>Voir moins</span> <i class="fas fa-chevron-up"></i>`
                    : `<span>Voir tous les services</span> <i class="fas fa-chevron-down"></i>`;
            });
        }
    </script>
</body>
</html>
