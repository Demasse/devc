@extends('admin.app')
@section('title', 'Projets')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <h3 class="font-bold text-lg">Liste des Projets</h3>
        <a href="{{ route('admin.projects.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition text-sm">
            Ajouter
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 border-b border-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="px-6 py-4">Image</th>
                    <th class="px-6 py-4">Titre</th>
                    <th class="px-6 py-4 hidden md:table-cell">Technologies</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        @if($project->image)
                            <img src="{{ asset('uploads/projects/' . $project->image) }}" class="w-12 h-12 rounded object-cover">
                        @else
                            <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center text-gray-400"><i class="fas fa-image"></i></div>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $project->title }}</td>
                    <td class="px-6 py-4 hidden md:table-cell">
                        @if($project->technologies)
                            {{ implode(', ', $project->technologies) }}
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Supprimer ce projet ?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-400">Aucun projet trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($projects->hasPages())
    <div class="p-6 border-t border-gray-100">
        {{ $projects->links() }}
    </div>
    @endif
</div>
@endsection
