<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen text-gray-800">

    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">DEVC Admin</h1>
            <p class="text-gray-500 mt-2 text-sm">Connectez-vous pour accéder au tableau de bord</p>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-700 p-4 rounded-xl text-sm mb-6 border border-green-100 text-center">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-50 text-red-600 p-4 rounded-xl text-sm mb-6 border border-red-100 text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Adresse Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-gray-50 focus:bg-white text-sm" placeholder="admin@devc.com">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input type="password" name="password" required class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-gray-50 focus:bg-white text-sm" placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="rounded text-blue-600 focus:ring-blue-500 mr-2 border-gray-300">
                    Se souvenir de moi
                </label>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow-md hover:shadow-lg transition flex items-center justify-center gap-2">
                <span>Se connecter</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </form>
        
        <div class="mt-8 text-center text-sm text-gray-400">
            <a href="{{ url('/') }}" class="hover:text-blue-500 transition"><i class="fas fa-home"></i> Retour au site principal</a>
        </div>
    </div>

</body>
</html>
