<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\Admin\ExpertController as AdminExpertController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\ProfileController;

// Public skill listing
Route::get('/public-skills', [SkillController::class, 'publicIndex'])->name('skills.public');

// Dashboard route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', ['user' => Auth::user()]);
    })->name('dashboard');
});

// Admin routes (with admin middleware)
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('skills', AdminSkillController::class)->except(['show']);
    Route::resource('experts', AdminExpertController::class)->except(['show']);
});
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('skills', App\Http\Controllers\SkillController::class)->except(['show']);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';

