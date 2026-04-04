@extends('admin.app')
@section('title', 'Vue d\'ensemble')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 flex items-center justify-between hover:shadow-md transition">
        <div>
            <p class="text-gray-500 font-medium mb-1">Total Projets</p>
            <h3 class="text-4xl font-extrabold text-gray-900">{{ $projectsCount }}</h3>
        </div>
        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-2xl">
            <i class="fas fa-project-diagram"></i>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 flex items-center justify-between hover:shadow-md transition">
        <div>
            <p class="text-gray-500 font-medium mb-1">Total Services</p>
            <h3 class="text-4xl font-extrabold text-gray-900">{{ $servicesCount }}</h3>
        </div>
        <div class="w-16 h-16 bg-cyan-50 text-cyan-600 rounded-full flex items-center justify-center text-2xl">
            <i class="fas fa-concierge-bell"></i>
        </div>
    </div>
</div>

<div class="mt-8 flex gap-4">
    <a href="{{ route('admin.projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition shadow-md">
        <i class="fas fa-plus mr-2"></i>Nouveau Projet
    </a>
    <a href="{{ route('admin.services.create') }}" class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-3 rounded-xl font-semibold transition shadow-md">
        <i class="fas fa-plus mr-2"></i>Nouveau Service
    </a>
</div>
@endsection
