@extends('admin.app')
@section('title', isset($project) ? 'Modifier le projet' : 'Créer un projet')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h3 class="font-bold text-lg text-gray-800">{{ isset($project) ? 'Modifier' : 'Nouveau Projet' }}</h3>
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition"><i class="fas fa-arrow-left mr-1"></i> Retour</a>
    </div>
    <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf
        @if(isset($project)) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Titre du projet <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Lien vers le projet</label>
            <input type="url" name="link" value="{{ old('link', $project->link ?? '') }}" placeholder="https://" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('link') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Image de couverture</label>
            @if(isset($project) && $project->image)

                <!-- <div class="mb-3">
                    <img src="{{ asset('images/' . $project->image) }}" class="h-32 w-full rounded-lg object-cover border border-gray-200">
                </div> -->
            <div class="mb-3">
                <img src="{{ asset('uploads/' . $project->image) }}" class="h-32 rounded-lg object-cover border border-gray-200">
            </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
            <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG, WEBP. Max 2MB.</p>
            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Technologies (séparées par une virgule)</label>
            <input type="text" name="technologies" value="{{ old('technologies', isset($project) && $project->technologies ? implode(',', $project->technologies) : '') }}" placeholder="Laravel, React, Tailwind" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('technologies') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description <span class="text-red-500">*</span></label>
            <textarea name="description" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">{{ old('description', $project->description ?? '') }}</textarea>
            @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2.5 rounded-lg font-semibold shadow-md transition">
                {{ isset($project) ? 'Mettre à jour' : 'Enregistrer le projet' }}
            </button>
        </div>
    </form>
</div>
@endsection
