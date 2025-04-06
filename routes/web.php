<?php

use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

// auth routes
Route::middleware('guest')->prefix('auth')->group(function () {

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeUser'])->name('register-user');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('login-user');
});

// admin route
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group( function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('agents', AgentController::class);
});
