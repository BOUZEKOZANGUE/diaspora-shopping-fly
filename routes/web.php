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
    AdminFlyController,
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
Route::get('/tracking/{tracking}', [TrackingController::class, 'track'])->name('tracking.track');
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

    // Actions spécifiques pour les médias
    Route::delete('/packages/{package}/remove-image', [PackageController::class, 'removeImage'])->name('packages.remove-image');
    Route::delete('/packages/{package}/remove-video', [PackageController::class, 'removeVideo'])->name('packages.remove-video');
});

/*
|--------------------------------------------------------------------------
| Routes administrateur
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard et accueil admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [AdminController::class, 'dashboard'])->name('home');

    // Gestion des utilisateurs
    Route::resource('users', AdminUserController::class);

    // Gestion des colis (admin)
    Route::resource('packages', AdminPackageController::class);
    Route::delete('/packages/{package}', [AdminPackageController::class, 'destroy'])->name('packages.destroy');
    Route::get('/packages/{package}/label', [AdminPackageController::class, 'generateLabel'])->name('packages.label');
    Route::post('/packages/batch-action', [AdminPackageController::class, 'batchAction'])->name('packages.batch-action');

    // Ressources administratives
    Route::resources([
        'advantages' => AdminAdvantageController::class,
        'services' => AdminServiceController::class,
        'testimonials' => AdminTestimonialController::class,
        'flys' => AdminFlyController::class
    ]);

    // Routes supplémentaires pour les voyages
    Route::put('flys/{id}/suspend', [AdminFlyController::class, 'suspend'])->name('flys.suspend');
    Route::put('flys/{id}/reactivate', [AdminFlyController::class, 'reactivate'])->name('flys.reactivate');
    Route::put('flys/{id}/complete', [AdminFlyController::class, 'complete'])->name('flys.complete');
    Route::post('flys/{id}/assign-packages', [AdminFlyController::class, 'assignPackages'])->name('flys.assign-packages');
    Route::delete('flys/{flyId}/packages/{packageId}', [AdminFlyController::class, 'removePackage'])->name('flys.remove-package');

    // Route pour l'approbation des témoignages
    Route::post('testimonials/{testimonial}/toggle-approval', [AdminTestimonialController::class, 'toggleApproval'])
        ->name('testimonials.toggle-approval');

    // =================== GESTION DES EXPÉDITIONS ===================
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

        // Route pour accéder aux fichiers PDF temporaires
        Route::get('/storage/temp/{filename}', 'getTempPdf')
            ->where('filename', '.*\.pdf')
            ->name('temp.pdf.download');

        // PDFs et étiquettes
        Route::prefix('pdf')->name('pdf.')->group(function () {
            // PDF pour nouveau client
            Route::get('/new-user/{tracking?}', 'generatePdf')->name('new-user');
            Route::get('/new-user/{tracking?}/download', 'downloadPdf')->name('new-user.download');

            // PDF pour client existant
            Route::get('/existing-user/{tracking?}', 'generatePdf')->name('existing-user');
            Route::get('/existing-user/{tracking?}/download', 'downloadPdf')->name('existing-user.download');

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
});

// Gestion des erreurs
Route::fallback(function () {
    return view('errors.404');
});

// Routes d'authentification Breeze
require __DIR__.'/auth.php';
