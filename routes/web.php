<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/test-auth', function () {
    if (Auth::check()) {
        return "Logged in as " . Auth::user()->email;
    }
});

// Admin Routes
Route::middleware(['auth'])->group(function () {
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::prefix('/admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/students', [AdminController::class, 'students'])->name('admin.students');
        Route::get('/subjects', [AdminController::class, 'subjects'])->name('admin.subjects');
        Route::get('/enrollment', [AdminController::class, 'enrollment'])->name('admin.enrollment');
        Route::get('/grades', [AdminController::class, 'grades'])->name('admin.grades');
    });
});

Auth::routes();

// Student Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
