<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganizationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Organization routes
    Route::get('/organizations/create', [OrganizationController::class, 'create'])->name('organizations.create');
    Route::get('/organizations/edit', [OrganizationController::class, 'edit'])->name('organizations.edit');
    Route::get('/organizations/index', [OrganizationController::class, 'index'])->name('organizations.index');
    Route::get('/organizations/partials/member-list', [OrganizationController::class, 'memberList'])->name('organizations.partials.member-list');
    Route::post('/organizations', [OrganizationController::class, 'store'])->name('organizations.store');
});

require __DIR__.'/auth.php';
