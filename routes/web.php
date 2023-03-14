<?php

use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\InicialController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostagemController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

/**
 * Login
 * NÃO ESTÁ SENDO USADO POIS O MODELO DO BREEZE ESTÁ NO LUGAR DESSES
 */
Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('/', [LoginController::class, 'store'])->name('login.store');
});


/**
 * Tela inicial
 */
Route::prefix('/')->group(function () {
    Route::get('/', [InicialController::class, 'index'])->name('inicial.index');
});



/**
 * Administrador 
 */
Route::middleware(['auth', 'App\Http\Middleware\CheckUserType:professor'])->namespace('App\Http\Controllers')->group(function () {
    Route::get('/painel-controle', 'AdministradorController@index')->name('admin.index');
});


Route::middleware('auth')->namespace('App\Http\Controllers')->group(function () {    
    /**
     * Postagem
     */
    Route::get('/nova-publicacao', [PostagemController::class, 'create'])->name('postagem.create');
    Route::get('/publicacao/{postagem}', [PostagemController::class, 'show'])->name('postagem.show');
    Route::post('/nova-publicacao', [PostagemController::class, 'store'])->name('postagem.store');

    /**
     * Profile
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';