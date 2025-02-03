<?php
use App\Http\Controllers\{
    HomeController,
    PackageController,
    TrackingController,
    ProfileController
};
use App\Http\Controllers\Admin\{
    AdminController,
    AdminPackageController,
    AdminUserController,
    StatsController
};
use Illuminate\Support\Facades\Route;

// Routes publiques (accessibles sans authentification)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tracking', [TrackingController::class, 'show'])->name('tracking.show');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Routes qui nécessitent une authentification
Route::middleware(['auth'])->group(function () {
    // Redirection initiale après login
    Route::get('/dashboard', [HomeController::class, 'dashboard'])
        ->name('dashboard');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Gestion des colis
    Route::resource('packages', PackageController::class);
});

// Routes admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('packages', AdminPackageController::class);
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('users', AdminUserController::class);
    Route::post('/admin/packages/batch-action', [AdminPackageController::class, 'batchAction'])
    ->name('admin.packages.batch-action');
    Route::get('/stats', [StatsController::class, 'index'])->name('stats');
});

Route::fallback(function () {
    return view('errors.404');
});
// Routes d'authentification Breeze
require __DIR__.'/auth.php';
