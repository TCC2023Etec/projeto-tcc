<?php

use App\Http\Controllers\InicialController;
use Illuminate\Support\Facades\Route;

Route::controller(InicialController::class)->group(function () {
    Route::get('/', 'index')->name('inicial.index');
});