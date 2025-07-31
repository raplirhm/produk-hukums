<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/detail/{id}', [ReportController::class, 'show'])->name('report.show');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('admin');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // USER routes
    Route::get('/dashboard', [ReportController::class, 'userDashboard'])->name('dashboard');
    Route::get('/tambah', [ReportController::class, 'create'])->name('report.create');
    Route::post('/tambah', [ReportController::class, 'store'])->name('report.store');

    // ADMIN routes
    Route::get('/admin', [ReportController::class, 'adminDashboard'])->middleware(['auth', 'admin'])->name('admin.dashboard');
    Route::post('/approve/{id}', [ReportController::class, 'approve'])->middleware(['auth', 'admin'])->name('report.approve');
});

require __DIR__.'/auth.php';
