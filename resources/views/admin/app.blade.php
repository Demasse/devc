<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEVC Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
    </style>
</head>
<body class="flex flex-col md:flex-row min-h-screen">

    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-gray-900 text-white min-h-screen p-6 hidden md:block">
        <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent mb-8">Admin DEVC</h2>
        <nav class="space-y-4">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : '' }}">
                <i class="fas fa-home w-5"></i> Tableau de bord
            </a>
            <a href="{{ route('admin.projects.index') }}" class="block px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.projects.*') ? 'bg-gray-800' : '' }}">
                <i class="fas fa-project-diagram w-5"></i> Projets
            </a>
            <a href="{{ route('admin.services.index') }}" class="block px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.services.*') ? 'bg-gray-800' : '' }}">
                <i class="fas fa-concierge-bell w-5"></i> Services
            </a>
            <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.profile.*') ? 'bg-gray-800' : '' }}">
                <i class="fas fa-user-cog w-5"></i> Paramètres
            </a>
            <a href="{{ route('home') }}" target="_blank" class="block px-4 py-3 rounded-lg hover:bg-gray-800 transition mt-8 text-blue-400">
                <i class="fas fa-external-link-alt w-5"></i> Voir le site
            </a>
            
            <form method="POST" action="{{ route('logout') }}" class="mt-4 border-t border-gray-800 pt-4">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-3 rounded-lg hover:bg-red-900/50 text-red-400 transition flex items-center">
                    <i class="fas fa-sign-out-alt w-5"></i> Déconnexion
                </button>
            </form>
        </nav>
    </aside>

    <!-- Mobile Nav -->
    <div class="md:hidden bg-gray-900 text-white p-4 flex justify-between items-center">
        <h2 class="text-xl font-bold">Admin DEVC</h2>
        <div class="flex gap-4">
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a>
            <a href="{{ route('admin.projects.index') }}"><i class="fas fa-project-diagram"></i></a>
            <a href="{{ route('admin.services.index') }}"><i class="fas fa-concierge-bell"></i></a>
            <a href="{{ route('admin.profile.edit') }}"><i class="fas fa-user-cog"></i></a>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-1 p-8 text-gray-800">
        <header class="mb-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">@yield('title', 'Tableau de bord')</h1>
        </header>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 shadow-sm">
            <span class="block sm:inline"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</span>
        </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
