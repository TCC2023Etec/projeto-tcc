<?php

use App\Http\Controllers\InicialController;
use App\Http\Controllers\PostagemController;
use Illuminate\Support\Facades\Route;

Route::controller(InicialController::class)->group(function () {
    Route::get('/', 'index')->name('inicial.index');
    
});

Route::controller(PostagemController::class)->group(function () {

    Route::get('/nova-postagem', 'create_postagem')->name('postagem.create');
    Route::post('/nova-postagem', 'store')->name('postagem.store');
});