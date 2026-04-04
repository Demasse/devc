@extends('admin.app')
@section('title', isset($service) ? 'Modifier le service' : 'Créer un service')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-2xl">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h3 class="font-bold text-lg text-gray-800">{{ isset($service) ? 'Modifier' : 'Nouveau Service' }}</h3>
        <a href="{{ route('admin.services.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition"><i class="fas fa-arrow-left mr-1"></i> Retour</a>
    </div>
    <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" class="p-6 space-y-6">
        @csrf
        @if(isset($service)) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Titre du service <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 outline-none transition">
            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description <span class="text-red-500">*</span></label>
            <textarea name="description" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 outline-none transition">{{ old('description', $service->description ?? '') }}</textarea>
            @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white px-8 py-2.5 rounded-lg font-semibold shadow-md transition">
                {{ isset($service) ? 'Mettre à jour' : 'Enregistrer le service' }}
            </button>
        </div>
    </form>
</div>
@endsection
