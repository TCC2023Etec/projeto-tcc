<?php

use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\InicialController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostagemController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Inertia\Inertia;

// Middleware
use App\Http\Middleware\CheckUserType;
use App\Http\Middleware\VerificarSituacaoUsuario;


/**
 * Login
 * NÃO ESTÁ SENDO USADO POIS O MODELO DO BREEZE ESTÁ NO LUGAR DESSES
 */
Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('/', [LoginController::class, 'store'])->name('login.store');
});

// Telas iniciais que não precisam de autenticação
Route::controller(InicialController::class)->group(function () {
    Route::get('/', 'index')->name('inicial.index');
    Route::get('/aguardando-validacao', 'aguardando_validacao')->name('aguardando-validacao');
    Route::get('/requisicao-recusada', 'requisicao_recusada')->name('requisicao.recusada');
    Route::get('/postagens/favoritos', 'postagensFavoritas')->name('postagens.favoritos')->middleware('auth');
    Route::get('/minhas-publicacoes', 'minhasPostagens')->name('postagens.minhasPostagens')->middleware('auth');
    Route::get('/postagens-curtidas', 'postagensCurtidas')->name('postagens.curtidas')->middleware('auth');
});



/**
 * Administrador 
 * 
 * 
 * Middleware => 'auth' = Usuário autenticado
 * 'verSituacao' = Verifica se o usuário foi aprovado ou não
 */
Route::middleware(['auth', 'verSituacao', CheckUserType::class])->group(function () {
    // Cursos
    Route::controller(CursoController::class)->group(function () {
        Route::get('/cursos', 'index')->name('cursos.index');
        Route::get('/cursos/novo', 'create')->name('cursos.create');
        Route::get('/cursos/{curso}', 'show')->name('cursos.show');
        Route::get('/cursos/editar/{curso}', 'edit')->name('cursos.edit');

        Route::post('/cursos/{curso}', 'update')->name('cursos.update');
        Route::post('/cursos', 'store')->name('cursos.store');  
        Route::delete('/curso/{curso}', 'destroy')->name('cursos.destroy');
    });

    // Painel de Controler
    Route::get('/painel-controle', [AdministradorController::class, 'index'])->name('admin.index');

    // Usuários
    Route::controller(UserController::class)->group(function () {
        Route::get('/usuarios', 'index')->name('user.index');
        Route::get('/usuario/novo', 'create')->name('user.create');
        Route::get('/usuario/{usuario}', 'show')->name('user.show');
        Route::get('/usuarios/editar/{usuario}', 'edit')->name('user.edit');
        Route::get('/usuarios/aprova', 'lista_aprova_usuario')->name('user.aprova');

        Route::post('/usuarios/aprovado/{usuario}', 'usuario_aprovado')->name('user.aprovado');
        Route::post('/usuarios/negado/{usuario}', 'usuario_negado')->name('user.negado');
        Route::post('/usuario/editar/{usuario}', 'update')->name('user.update');
        Route::post('/usuarios', 'store')->name('user.store');
        Route::delete('/usuario{usuario}', 'destroy')->name('user.destroy');
    });

    // Postagens no Painel de Controle
    Route::controller(PostagemController::class)->group(function () {
        Route::get('/postagens/aprova', 'lista_aprova_postagem')->name('postagens.aprova');
        Route::get('/postagem/admin/{postagem}', 'show_administrador')->name('postagens.show.admin');
        Route::get('/postagens/historico', 'historico_postagem')->name('postagens.historico');

        Route::post('/postagens/aprovada/{postagem}', 'postagem_aprovada')->name('postagens.aprovada');
        Route::post('/postagens/negada/{postagem}', 'postagem_negada')->name('postagens.negada');

        
    });    

    
});
Route::get('/postagem/verificaCurtida', [PostagemController::class, 'verifica_curtida'])->name('postagens.verificaCurtida');

Route::middleware(['auth', 'verSituacao'])->namespace('App\Http\Controllers')->group(function () { 
    // Postagens
    Route::controller(PostagemController::class)->group( function () {
        Route::get('/nova-publicacao', 'create_postagem')->name('postagens.store');
        Route::get('/publicacao/{postagem}', 'show')->name('postagens.show')->withoutMiddleware(['auth', 'verSituacao']);
        Route::post('/nova-publicacao', 'store')->name('postagens.store');

        Route::post('/postagens/like/{postagem}', 'like')->name('postagens.like');
        Route::post('/postagens/favorito/{postagem}', 'favorito')->name('postagens.favorito');
    });   

    // Comentários
    Route::controller(ComentarioController::class)->group(function () {
        Route::post('/postagem/{postagem}', 'store')->name('comentarios.store');
        Route::post('/postagem/editar/{postagem}/{comentario}', 'update')->name('comentarios.update');

        Route::delete('/postagem/{comentario}/destroy', 'destroy')->name('comentarios.destroy');
    });

    // Profile
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