<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\InicialController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostagemController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

/**
 * Login
 */
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');

    Route::post('/login', 'store')->name('login.store');
});

/**
 * Tele inicial
 */
Route::controller(InicialController::class)->group(function () {
    Route::get('/', 'index')->name('inicial.index');
    
});

Route::middleware('auth')->group(function () {
    /**
     * Administrador 
     */
    Route::controller(AdministradorController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin.index');
    });

    /**
     * Postagem
     */
    Route::controller(PostagemController::class)->group(function () {
        Route::get('/nova-publicacao', 'create_postagem')->name('postagem.create');
        Route::get('/publicacao/{postagem}', 'show')->name('postagem.show');
        
        Route::post('/nova-publicacao', 'store')->name('postagem.store');
    });
});
/**
 * rotas que já vieram no Laravel
 */
Route::get('/teste', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';