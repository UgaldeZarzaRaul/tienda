<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controlador_usuarios;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('usuarios')->get('/usuarios',[controlador_usuarios::class, 'usuarios']);
Route::name('usuario_alta')->get('/usuario_alta',[controlador_usuarios::class, 'usuario_alta']);
Route::name('usuario_registrar')->post('/usuario_registrar',[controlador_usuarios::class, 'usuario_registrar']);

Route::name('usuario_detalle')->get('/usuario_detalle/{id}',[controlador_usuarios::class, 'usuario_detalle']);
Route::name('usuario_editar')->get('/usuario_editar/{id}',[controlador_usuarios::class, 'usuario_editar']);
Route::name('usuario_salvar')->put('/usuario_salvar/{id}',[controlador_usuarios::class, 'usuario_salvar']);
Route::name('usuario_borrar')->get('/usuario_borrar/{id}',[controlador_usuarios::class, 'usuario_borrar']);

