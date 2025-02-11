<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    PackageController,
    TrackingController,
    ProfileController,
    SearchController
};
use App\Http\Controllers\Admin\{
    AdminController,
    AdminPackageController,
    AdminUserController,
    ShipmentController,

    AdminAdvantageController,
    AdminFlightController,
    AdminPackageFlightController,
    AdminServiceController,
    AdminTestimonialController
};

/*
|--------------------------------------------------------------------------
| Routes publiques (accessibles sans authentification)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tracking', [TrackingController::class, 'show'])->name('tracking.show');
Route::get('/search', [SearchController::class, 'index'])->name('search');

/*
|--------------------------------------------------------------------------
| Routes authentifiées
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Gestion des colis (utilisateur standard)
    Route::resource('packages', PackageController::class);
});

/*
|--------------------------------------------------------------------------
| Routes administrateur
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard et accueil admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Gestion des utilisateurs
    Route::resource('users', AdminUserController::class);

    // Gestion des colis (admin)
    Route::resource('packages', AdminPackageController::class);
    Route::delete('/packages/{package}', [AdminPackageController::class, 'destroy'])->name('packages.destroy');
    Route::get('/packages/{package}/label', [AdminPackageController::class, 'generateLabel'])->name('packages.label');
    Route::post('/packages/batch-action', [AdminPackageController::class, 'batchAction'])->name('packages.batch-action');

    // Gestion des expéditions
    Route::prefix('shipments')->name('shipments.')->controller(ShipmentController::class)->group(function () {
        // Liste et affichage
        Route::get('/', 'index')->name('index');
        Route::get('/show/{shipment}', 'show')->name('show');

        // Création pour nouveau client
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        // Création pour client existant
        Route::get('/create-existing', 'createForExisting')->name('create-existing');
        Route::post('/store-existing', 'storeForExisting')->name('store-existing');

        // Page de succès
        Route::get('/success', 'success')->name('success');

        // PDFs et étiquettes
        Route::prefix('pdf')->group(function () {
            // PDF pour nouveau client
            Route::get('/new-user/{tracking?}', 'generatePdf')->name('pdf.new-user');
            Route::get('/new-user/{tracking?}/download', 'downloadPdf')->name('pdf.new-user.download');

            // PDF pour client existant
            Route::get('/existing-user/{tracking?}', 'generatePdf')->name('pdf.existing-user');
            Route::get('/existing-user/{tracking?}/download', 'downloadPdf')->name('pdf.existing-user.download');

            // Étiquette
            Route::get('/label/{tracking}', 'generateLabel')->name('label');
        });

        // Actions en lot
        Route::post('/bulk-status-update', 'bulkStatusUpdate')->name('bulk-status-update');

        // Suppression
        Route::delete('/{shipment}', 'destroy')->name('destroy');
    });

    // API pour la recherche d'utilisateurs (autocomplétion)
    Route::get('/api/users/search', [ShipmentController::class, 'searchUsers'])->name('api.users.search');

    // Ressources supplémentaires
    Route::resources([
        'advantages' => AdminAdvantageController::class,
        'flights' => AdminFlightController::class,
        'package-flights' => AdminPackageFlightController::class,
        'services' => AdminServiceController::class,
        'testimonials' => AdminTestimonialController::class,
    ]);

    // Route supplémentaire pour l'approbation des témoignages
    Route::post('testimonials/{testimonial}/toggle-approval', [AdminTestimonialController::class, 'toggleApproval'])
        ->name('testimonials.toggle-approval');

    
});

// Gestion des erreurs
Route::fallback(function () {
    return view('errors.404');
});

// Routes d'authentification Breeze
require __DIR__.'/auth.php';
