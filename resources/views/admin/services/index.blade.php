@extends('admin.app')
@section('title', 'Services')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <h3 class="font-bold text-lg">Liste des Services</h3>
        <a href="{{ route('admin.services.create') }}" class="bg-cyan-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-cyan-700 transition text-sm">
            Ajouter
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 border-b border-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="px-6 py-4">Titre</th>
                    <th class="px-6 py-4">Description</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $service->title }}</td>
                    <td class="px-6 py-4 max-w-sm truncate">{{ $service->description }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Supprimer ce service ?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-8 text-center text-gray-400">Aucun service trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($services->hasPages())
    <div class="p-6 border-t border-gray-100">
        {{ $services->links() }}
    </div>
    @endif
</div>
@endsection
