<!DOCTYPE html>
<html lang="fr" class="bg-slate-50 antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - DEVC Studio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="text-slate-800 font-sans min-h-screen flex overflow-hidden">

    <!-- OVERLAY MOBILE -->
    <div id="mobile-overlay" class="fixed inset-0 bg-slate-900/50 z-20 hidden lg:hidden backdrop-blur-sm transition-opacity opacity-0"></div>

    <!-- SIDEBAR -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 bg-slate-900 text-slate-300 w-72 z-30 transform -translate-x-full lg:translate-x-0 lg:static lg:flex flex-col transition-transform duration-300 ease-in-out shadow-2xl lg:shadow-none">
        
        <!-- Logo Area -->
        <div class="h-20 flex items-center px-8 border-b border-slate-800">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-indigo-600/30 group-hover:scale-105 transition-transform">
                    <i class="fas fa-code"></i>
                </div>
                <span class="text-xl font-bold text-white tracking-tight">Admin<span class="text-indigo-400">DEVC</span></span>
            </a>
        </div>

        <!-- Scrollable Navigation -->
        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
            <div class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-4 px-4">Menu Principal</div>
            
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'hover:bg-slate-800 hover:text-white' }}">
                <i class="fas fa-chart-pie w-5 {{ request()->routeIs('admin.dashboard') ? 'text-indigo-200' : 'text-slate-400' }}"></i>
                <span class="font-medium">Vue d'ensemble</span>
            </a>
            
            <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.projects.*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'hover:bg-slate-800 hover:text-white' }}">
                <i class="fas fa-layer-group w-5 {{ request()->routeIs('admin.projects.*') ? 'text-indigo-200' : 'text-slate-400' }}"></i>
                <span class="font-medium">Projets</span>
            </a>
            
            <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.services.*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'hover:bg-slate-800 hover:text-white' }}">
                <i class="fas fa-concierge-bell w-5 {{ request()->routeIs('admin.services.*') ? 'text-indigo-200' : 'text-slate-400' }}"></i>
                <span class="font-medium">Services</span>
            </a>

            <div class="mt-8 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-4 px-4 pt-4 border-t border-slate-800">Configuration</div>
            
            <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.profile.*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'hover:bg-slate-800 hover:text-white' }}">
                <i class="fas fa-cog w-5 {{ request()->routeIs('admin.profile.*') ? 'text-indigo-200' : 'text-slate-400' }}"></i>
                <span class="font-medium">Paramètres</span>
            </a>
        </div>

        <!-- User / Logout -->
        <div class="p-4 border-t border-slate-800">
            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-2 text-sm text-slate-400 hover:text-white transition-colors mb-2">
                <i class="fas fa-external-link-alt w-4"></i> Afficher le site
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-slate-800 hover:bg-red-500 hover:text-white text-slate-300 py-3 rounded-xl transition-all text-sm font-medium">
                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <!-- CONTENT WRAPPER -->
    <div class="flex-1 flex flex-col min-w-0 h-screen overflow-hidden">
        
        <!-- TOP NAVBAR -->
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-6 lg:px-10 z-10 sticky top-0">
            <div class="flex items-center gap-4">
                <button id="mobile-menu-btn" class="lg:hidden w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-slate-200 transition-colors">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="hidden sm:block">
                    <h1 class="text-xl font-bold text-slate-800">@yield('title', 'Tableau de bord')</h1>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Bienvenue dans votre espace d'administration.</p>
                </div>
            </div>

            <!-- Header Right -->
            <div class="flex items-center gap-4">
                <div class="hidden sm:flex items-center gap-3 mr-4">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                    </span>
                    <span class="text-sm font-medium text-slate-600">Système En Ligne</span>
                </div>
                
                <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold border-2 border-white shadow-sm ring-2 ring-slate-100">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
            </div>
        </header>

        <!-- MAIN SCROLLABLE AREA -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6 lg:p-10">
            
            <div class="sm:hidden mb-6">
                <h1 class="text-2xl font-bold text-slate-800">@yield('title', 'Tableau de bord')</h1>
            </div>

            @if(session('success'))
            <div class="mb-8 rounded-xl bg-emerald-50 border border-emerald-100 p-4 flex items-start gap-4 shadow-sm">
                <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-emerald-800">Action réussie</h4>
                    <p class="text-sm text-emerald-600 mt-1">{{ session('success') }}</p>
                </div>
            </div>
            @endif

            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
            
            <!-- Admin Footer -->
            <footer class="mt-12 border-t border-slate-200 pt-6 text-center text-sm text-slate-400 font-medium pb-2">
                DEVC Studio Admin Panel &copy; {{ date('Y') }}. Construit avec Laravel & Tailwind.
            </footer>
        </main>
    </div>

    <!-- JS SCRIPTS -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const overlay = document.getElementById('mobile-overlay');

        function toggleMenu() {
            const isClosed = sidebar.classList.contains('-translate-x-full');
            if(isClosed) {
                // Open menu
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.remove('opacity-0'), 10);
            } else {
                // Close menu
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.classList.add('hidden'), 300);
            }
        }

        if(mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', toggleMenu);
            overlay.addEventListener('click', toggleMenu);
        }
    </script>
</body>
</html>
