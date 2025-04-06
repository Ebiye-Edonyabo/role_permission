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

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/agents', [AgentController::class, 'index'])->name('agents.index');
    Route::post('/agents', [AgentController::class, 'store'])->name('agents.store');
    Route::get('/agents/{agent:slug}', [AgentController::class, 'show'])->name('agents.show');

     // Permission assignment
     Route::post('/agents/{agent:slug}/create', [AgentController::class, 'givePermission'])->name('agents.permission.store');
     Route::delete('/agents/{agent:slug}/destroy/{permission}', [AgentController::class, 'destroyPermission'])->name('agents.permission.destroy');

});


