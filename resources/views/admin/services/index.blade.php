@extends('admin.app')
@section('title', 'Gestion des Services')

@section('content')
<div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-200 overflow-hidden">
    <!-- Header de table -->
    <div class="p-6 md:p-8 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="font-bold text-lg text-slate-800">Liste des Services</h3>
            <p class="text-sm text-slate-500 mt-1">Gérez les services que vous proposez à vos clients.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-medium transition shadow-md hover:shadow-lg hover:-translate-y-0.5">
            <i class="fas fa-plus text-sm"></i> Ajouter un service
        </a>
    </div>

    <!-- Conteneur Responsive (Table vs Cartes) -->
    <div class="w-full">
        <!-- VUE DESKTOP (Table classique) -->
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200 text-xs text-slate-500 uppercase tracking-wider font-semibold">
                        <th class="px-8 py-4 w-1/4">Titre</th>
                        <th class="px-8 py-4 w-1/2">Description</th>
                        <th class="px-8 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($services as $service)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="font-bold text-slate-800">{{ $service->title }}</div>
                        </td>
                        <td class="px-8 py-5">
                            <p class="text-sm text-slate-600 max-w-md xl:max-w-xl truncate" title="{{ $service->description }}">{{ $service->description }}</p>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex items-center justify-end gap-2 opacity-100 sm:opacity-50 sm:group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.services.edit', $service) }}" class="w-9 h-9 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center hover:bg-indigo-600 hover:text-white transition-colors tooltip-trigger" title="Modifier">
                                    <i class="fas fa-pen text-sm"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer définitivement ce service ?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-9 h-9 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition-colors tooltip-trigger" title="Supprimer">
                                        <i class="fas fa-trash-alt text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-8 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-slate-400">
                                <i class="fas fa-box-open text-4xl mb-4 text-slate-300"></i>
                                <p class="font-medium">Aucun service n'a encore été créé.</p>
                                <p class="text-sm mt-1">Commencez par ajouter votre premier service.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- VUE MOBILE (Cartes empilées) -->
        <div class="md:hidden flex flex-col p-4 bg-slate-50/30 gap-4">
            @forelse($services as $service)
            <div class="bg-white border border-slate-200 rounded-[1rem] p-5 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <!-- Bandeau décoratif gauche -->
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-indigo-500 rounded-l-[1rem]"></div>
                
                <div class="flex justify-between items-start gap-4 mb-3 pl-2">
                    <h4 class="font-bold text-slate-800 text-lg leading-tight">{{ $service->title }}</h4>
                    
                    <!-- Actions -->
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <a href="{{ route('admin.services.edit', $service) }}" class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center hover:bg-indigo-600 hover:text-white transition-colors">
                            <i class="fas fa-pen text-xs"></i>
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition-colors">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="pl-2">
                    <p class="text-sm text-slate-600 line-clamp-3">{{ $service->description }}</p>
                </div>
            </div>
            @empty
            <div class="py-12 text-center bg-white rounded-[1rem] border border-slate-200">
                <div class="flex flex-col items-center justify-center text-slate-400">
                    <i class="fas fa-box-open text-3xl mb-3 text-slate-300"></i>
                    <p class="font-medium text-sm">Aucun service n'a encore été créé.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
    
    @if($services->hasPages())
    <div class="p-6 border-t border-slate-100 bg-slate-50/50">
        {{ $services->links() }}
    </div>
    @endif
</div>
@endsection
