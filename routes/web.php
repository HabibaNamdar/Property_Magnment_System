<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Tenant\PropertyController as TenantPropertyController;

use App\Http\Controllers\Tenant\TenantLeaseController;
use App\Http\Controllers\Tenant\MaintenanceRequestController;



Route::get('/', function () {
    return redirect()->route('login');
});


// Dashboard route (role-based redirect to views)
Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    if ($role === 'admin') {
        return view('admin.dashboard');
    } elseif ($role === 'landlord') {

        return app(PropertyController::class)->getCard();
    } else {
        // return view('tenant.dashboard');
        return app(abstract: TenantLeaseController::class)->getCard();
    }
})->middleware(['auth', 'verified'])->name('dashboard');


// Admin only panel
Route::get('/admin-panel', function () {
    return "Welcome Admin!";
})->middleware(['auth', 'role:admin']);

// Role-based dashboards
Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('/landlord-dashboard', function () {
    return view('landlord.dashboard');
})->middleware(['auth', 'role:landlord|admin'])->name('landlord.dashboard');


Route::get('/tenant-dashboard', function () {
    return view('tenant.dashboard');
})->middleware(['auth','role:tenant|admin'])->name('tenant.dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:tenant'])->get('/tenant/property', TenantPropertyController::class)->name('tenant.property.show');



// Tenant can view their property (via lease)
Route::middleware(['auth','role:tenant'])->get('/tenant/property', [\App\Http\Controllers\Tenant\PropertyController::class, '__invoke'])
    ->name('tenant.property.show');

// Public browsing (optional)
Route::get('/properties', [\App\Http\Controllers\PropertyController::class, 'publicIndex'])->name('properties.index');
Route::get('/properties/{property}', [\App\Http\Controllers\PropertyController::class, 'show'])->name('properties.show');

// Landlord routes
Route::middleware(['auth','role:landlord|admin'])->prefix('landlord')->name('landlord.')->group(function(){
    Route::resource('properties', PropertyController::class);
});

// Tenant routes
Route::middleware(['auth','role:tenant|admin'])->prefix('tenant')->name('tenant.')->group(function(){
    Route::resource('properties', TenantPropertyController::class);
});

Route::middleware(['auth','role:tenant|admin'])->prefix('tenant')->name('tenant.')->group(function(){
    Route::resource('leases', TenantLeaseController::class);
});
Route::middleware(['auth','role:tenant|admin'])->prefix('tenant')->name('tenant.')->group(function(){
    Route::resource('maintenance', MaintenanceRequestController::class);
});

// Public property browsing
Route::get('/properties', [PropertyController::class, 'publicIndex'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');




require __DIR__.'/auth.php';














