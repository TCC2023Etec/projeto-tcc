<?php

use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\InicialController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostagemController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

// Middleware
use App\Http\Middleware\CheckUserType;

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
Route::middleware(['auth', CheckUserType::class])->group(function () {
    /**
     * Cursos
     */
    Route::controller(CursoController::class)->group(function () {
        Route::get('/cursos', 'index')->name('cursos.index');
        Route::get('/cursos/novo', 'create')->name('cursos.create');
        Route::get('/cursos/{curso}', 'show')->name('cursos.show');
        Route::get('/cursos/editar/{curso}', 'edit')->name('cursos.edit');

        Route::post('/cursos/{curso}', 'update')->name('cursos.update');
        Route::post('/cursos', 'store')->name('cursos.store');  
        Route::delete('/curso/{curso}', 'destroy')->name('cursos.destroy');
    });

    /**
     * Painel de Controler
     */
    Route::get('/painel-controle', [AdministradorController::class, 'index'])->name('admin.index');

    // Usuários
    Route::controller(UserController::class)->group(function () {
        Route::get('/usuarios', 'index')->name('user.index');
        Route::get('/usuario/novo', 'create')->name('user.create');
        Route::get('/usuario/{usuario}', 'show')->name('user.show');
        Route::get('/usuarios/editar/{usuario}', 'edit')->name('user.edit');

        Route::post('/usuario/editar/{usuario}', 'update')->name('user.update');
        Route::post('/usuarios', 'store')->name('user.store');
        Route::delete('/usuario{usuario}', 'destroy')->name('user.destroy');
    });
});


Route::middleware('auth')->namespace('App\Http\Controllers')->group(function () {    
    /**
     * Postagem
     */
    Route::get('/nova-publicacao', [PostagemController::class, 'create_postagem'])->name('postagens.store');
    Route::get('/publicacao/{postagem}', [PostagemController::class, 'show'])->name('postagens.show');
    Route::post('/nova-publicacao', [PostagemController::class, 'store'])->name('postagens.store');

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