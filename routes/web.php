<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypePlantController as ControllersTypePlantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LocationPlantController;
use App\Http\Controllers\Web\PlantController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\TypePlantController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', [HomeController::class, 'landing'])->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('home.home');
    });

    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Location Plant
    Route::prefix('locationplant')->group(function () {
        Route::get('/', [LocationPlantController::class, 'index'])->name('locationplant.index');
        Route::get('/add', [LocationPlantController::class, 'create'])->name('locationplant.add');
        Route::post('/show', [LocationPlantController::class, 'show'])->name('locationplant.show');
        Route::get('/{id}', [LocationPlantController::class, 'show'])->name('locationplant.show');
        Route::get('/{id}/edit', [LocationPlantController::class, 'edit'])->name('locationplant.edit');
        Route::put('/{id}', [LocationPlantController::class, 'update'])->name('locationplant.update');
        Route::delete('/{id}', [LocationPlantController::class, 'destroy'])->name('locationplant.delete');
    });

    // Plants
    Route::prefix('plants')->group(function () {
    Route::get('/', [PlantController::class, 'index'])->name('plants.index');
    Route::get('/add', [PlantController::class, 'create'])->name('plants.create');
    Route::post('/store', [PlantController::class, 'store'])->name('plants.store');
    Route::get('/{id}', [PlantController::class, 'show'])->name('plants.show');
    Route::get('/{id}/edit', [PlantController::class, 'edit'])->name('plants.edit');
    Route::put('/{id}', [PlantController::class, 'update'])->name('plants.update');
    Route::delete('/{id}', [PlantController::class, 'destroy'])->name('plants.destroy');
    Route::post('/typeplants/store', [TypePlantController::class, 'store'])->name('typeplants.store');
    Route::delete('/typeplants/{id}', [TypePlantController::class, 'destroy'])->name('typeplants.destroy');
});

    // Posts
   Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/', [PostController::class, 'store'])->name('store');
    Route::get('/{id}', [PostController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PostController::class, 'update'])->name('update');
    Route::delete('/{id}', [PostController::class, 'destroy'])->name('delete');
});

    
    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
});