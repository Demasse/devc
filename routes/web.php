<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Service;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Frontend
Route::get('/', function () {
    $projects = Project::latest()->take(6)->get();
    $services = Service::all();
    return view('pages.acceuil', compact('projects', 'services'));
})->name('home');

// Auth
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard protected by Auth
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', function () {
        $projectsCount = Project::count();
        $servicesCount = Service::count();
        return view('admin.dashboard', compact('projectsCount', 'servicesCount'));
    })->name('dashboard');

    Route::resource('projects', ProjectController::class);
    Route::resource('services', ServiceController::class);
    
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Route utilitaire pour la production (Hébergement Mutualisé, cPanel, etc.)
// A lancer une seule fois en ligne : https://ton-site.com/setup/storage_link
Route::get('/setup/storage_link', function () {
    try {
        if (file_exists(public_path('storage'))) {
            return 'Le lien symbolique existe déjà (ou le dossier storage existe dans public). Supprimez-le d\'abord si vous voulez le recréer.';
        }
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        return 'Succès : Le lien symbolique pour les images a été créé ! Vous pouvez maintenant voir vos images.';
    } catch (\Exception $e) {
        return 'Erreur : ' . $e->getMessage();
    }
});
