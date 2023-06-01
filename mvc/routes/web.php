<?php

use App\Http\Controllers\ErroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\IndexController;
use App\Http\Controllers\MestreController;
use App\Http\Controllers\JogadorController;
use App\Classes\Session;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Redirect;


Session::startSession();

Route::fallback([ErroController::class, 'fallback']);

Route::redirect('/', '/home');

Route::get('/home', [IndexController::class, 'index'])->name('site.home');

Route::get('/sobre', [IndexController::class, 'sobre'])->name('site.sobre');

Route::get('/teste', function(){
    return view('teste');
});

Route::post('/teste', function(){
    return view('teste');
});

Route::prefix('/mestre')->group(function () {

    Route::get('/', [MestreController::class, 'home'])->name('mestre.home');

    Route::get('/registro', [MestreController::class, 'registro'])->name('mestre.registro');

    Route::post('/registro', [MestreController::class, 'registrar'])->name('mestre.registro');

    Route::get('/login', [MestreController::class, 'login'])->name('mestre.login');

    Route::post('/login', [MestreController::class, 'logar'])->name('mestre.login');
    
    Route::get('/lobby', [MestreController::class, 'lobby'])->name('mestre.lobby');

    Route::get('/logout', [MestreController::class, 'logout']);

    Route::get('/perfil', [MestreController::class, 'perfil'])->name('mestre.perfil');

    Route::get('/perfil/editar', [MestreController::class, 'editarPerfil'])->name('mestre.editar.perfil');
    
    Route::put('/perfil/editar', [MestreController::class, 'atualizarConta']);
    
    Route::delete('/perfil', [MestreController::class, 'deletarConta']);
    
});


Route::prefix('/jogador')->group(function () {

    Route::get('/', [JogadorController::class, 'home'])->name('jogador.home');
    
    Route::get('/registro', [JogadorController::class, 'registro'])->name('jogador.registro');
    
    Route::post('/registro', [JogadorController::class, 'registrar'])->name('jogador.registro');
    
    Route::get('/login', [JogadorController::class, 'login'])->name('jogador.login');
    
    Route::post('/login', [JogadorController::class, 'logar'])->name('jogador.login');

    Route::get('/lobby', [JogadorController::class, 'lobby'])->name('jogador.lobby');

    Route::get('/logout', [JogadorController::class, 'logout']);

    Route::get('/perfil', [JogadorController::class, 'perfil'])->name('jogador.perfil');
    
    Route::get('/perfil/editar', [JogadorController::class, 'editarPerfil'])->name('jogador.editar.perfil');

    Route::put('/perfil/editar', [JogadorController::class, 'atualizarConta']);

    Route::delete('/perfil', [JogadorController::class, 'deletarConta']);
    
});
