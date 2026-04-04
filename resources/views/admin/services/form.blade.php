@extends('admin.app')
@section('title', isset($service) ? 'Modifier le service' : 'Créer un service')

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Breadcrumb simple -->
    <div class="flex items-center gap-2 text-sm text-slate-500 mb-6 font-medium">
        <a href="{{ route('admin.services.index') }}" class="hover:text-indigo-600 transition-colors">Services</a>
        <i class="fas fa-chevron-right text-[10px]"></i>
        <span class="text-slate-800">{{ isset($service) ? 'Éditer' : 'Nouveau' }}</span>
    </div>

    <!-- Formulaire Card -->
    <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-8 border-b border-slate-100 bg-slate-50/50 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-white shadow-sm border border-slate-200 flex items-center justify-center text-indigo-600 text-xl">
                <i class="fas {{ isset($service) ? 'fa-pen-to-square' : 'fa-plus' }}"></i>
            </div>
            <div>
                <h3 class="font-bold text-xl text-slate-800">{{ isset($service) ? 'Modifier le service' : 'Ajouter un nouveau service' }}</h3>
                <p class="text-sm text-slate-500 mt-0.5">Remplissez les informations ci-dessous pour {{ isset($service) ? 'mettre à jour' : 'publier' }} ce service.</p>
            </div>
        </div>

        <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" class="p-8 space-y-6">
            @csrf
            @if(isset($service)) @method('PUT') @endif

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">Titre du service <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" placeholder="Ex: Développement Web Sur Mesure" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-slate-800 font-medium placeholder-slate-400 transition-all outline-none">
                @error('title') <p class="text-red-500 text-xs font-medium mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">Description <span class="text-red-500">*</span></label>
                <textarea name="description" rows="5" placeholder="Décrivez en détail ce que vous proposez..." required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-slate-800 font-medium placeholder-slate-400 transition-all outline-none resize-y">{{ old('description', $service->description ?? '') }}</textarea>
                @error('description') <p class="text-red-500 text-xs font-medium mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p> @enderror
                <p class="text-xs text-slate-500 mt-2"><i class="fas fa-info-circle mr-1"></i> Soyez concis mais précis, cette description apparaîtra sur votre page d'accueil public.</p>
            </div>

            <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-end gap-3 mt-8">
                <a href="{{ route('admin.services.index') }}" class="w-full sm:w-auto px-6 py-3 text-slate-600 font-semibold rounded-xl hover:bg-slate-100 transition-colors text-center border-2 border-transparent">
                    Annuler
                </a>
                <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl font-semibold shadow-md shadow-indigo-600/20 hover:shadow-lg transition-all hover:-translate-y-0.5">
                    <i class="fas {{ isset($service) ? 'fa-save' : 'fa-check' }}"></i>
                    {{ isset($service) ? 'Mettre à jour le service' : 'Publier le service' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
