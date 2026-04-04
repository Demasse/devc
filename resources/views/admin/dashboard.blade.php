@extends('admin.app')
@section('title', 'Vue d\'ensemble')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stat Card 1 -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col justify-center relative overflow-hidden group hover:shadow-md transition-all">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out opacity-50"></div>
        <div class="flex justify-between items-start relative z-10">
            <div>
                <p class="text-sm font-semibold text-slate-500 mb-1">Total Projets</p>
                <h3 class="text-3xl font-extrabold text-slate-800">{{ $projectsCount }}</h3>
            </div>
            <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center text-xl shadow-inner">
                <i class="fas fa-layer-group"></i>
            </div>
        </div>
        <div class="mt-4 text-xs font-medium text-emerald-600 flex items-center gap-1 relative z-10">
            <i class="fas fa-arrow-up"></i> <span>A jour</span>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col justify-center relative overflow-hidden group hover:shadow-md transition-all">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-cyan-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out opacity-50"></div>
        <div class="flex justify-between items-start relative z-10">
            <div>
                <p class="text-sm font-semibold text-slate-500 mb-1">Total Services</p>
                <h3 class="text-3xl font-extrabold text-slate-800">{{ $servicesCount }}</h3>
            </div>
            <div class="w-12 h-12 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center text-xl shadow-inner">
                <i class="fas fa-concierge-bell"></i>
            </div>
        </div>
        <div class="mt-4 text-xs font-medium text-emerald-600 flex items-center gap-1 relative z-10">
            <i class="fas fa-arrow-up"></i> <span>A jour</span>
        </div>
    </div>
    
    <!-- Empty placeholders for SaaS look -->
    <div class="bg-white/50 border border-dashed border-slate-300 rounded-2xl p-6 flex items-center justify-center text-slate-400 text-sm font-medium hover:bg-slate-100 transition-colors cursor-default">
        Futures métriques...
    </div>
    <div class="bg-white/50 border border-dashed border-slate-300 rounded-2xl p-6 flex items-center justify-center text-slate-400 text-sm font-medium hover:bg-slate-100 transition-colors cursor-default">
        Futures métriques...
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h3 class="text-lg font-bold text-slate-800">Actions Rapides</h3>
            <p class="text-sm text-slate-500">Gérez votre portfolio depuis ces raccourcis.</p>
        </div>
    </div>
    <div class="flex flex-wrap gap-4">
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
            <i class="fas fa-plus"></i> Nouveau Projet
        </a>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center justify-center gap-2 bg-white border-2 border-slate-200 hover:border-indigo-600 text-slate-700 hover:text-indigo-600 px-6 py-3 rounded-xl font-semibold transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5">
            <i class="fas fa-plus"></i> Nouveau Service
        </a>
    </div>
</div>
@endsection
