<?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';








use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route (role-based redirect to views)
Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    if ($role === 'admin') {
        return view('admin.dashboard');
    } elseif ($role === 'landlord') {
        return view('landlord.dashboard');
    } else {
        return view('tenant.dashboard');
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
})->middleware(['auth', 'role:landlord'])->name('landlord.dashboard');

Route::get('/tenant-dashboard', function () {
    return view('tenant.dashboard');
})->middleware(['auth', 'role:tenant'])->name('tenant.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
