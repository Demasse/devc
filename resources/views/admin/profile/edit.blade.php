@extends('admin.app')
@section('title', 'Mon Profil')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-2xl">
    <div class="p-6 border-b border-gray-100 bg-gray-50/50">
        <h3 class="font-bold text-lg text-gray-800">Paramètres du compte administrateur</h3>
        <p class="text-sm text-gray-500 mt-1">Vous pouvez modifier votre email de connexion et votre mot de passe ici.</p>
    </div>
    
    <form action="{{ route('admin.profile.update') }}" method="POST" class="p-6 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Adresse Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition">
            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nouveau Mot de passe <span class="text-gray-400 font-normal">(laissez vide pour ne pas modifier)</span></label>
            <input type="password" name="password" placeholder="••••••••" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition">
            @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2.5 rounded-lg font-semibold shadow-md transition">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
