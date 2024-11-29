<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controlador_usuarios;
use App\Http\Controllers\VideojuegoController;
use App\Http\Controllers\controlador_clientes;
use App\Http\Controllers\controladornuevos;
use App\Http\Controllers\controladordigitales;
use App\Http\Controllers\controladorconsolas;

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

Route::get('usuarios', [controlador_usuarios::class, 'usuarios'])->name('usuarios');
Route::get('/graficos/usuarios', [controlador_usuarios::class, 'graficos_usuarios'])->name('usuarios.graficos2');
Route::name('usuario_alta')->get('/usuario_alta',[controlador_usuarios::class, 'usuario_alta']);
Route::name('usuario_registrar')->post('/usuario_registrar',[controlador_usuarios::class, 'usuario_registrar']);

Route::name('usuario_detalle')->get('/usuario_detalle/{id}',[controlador_usuarios::class, 'usuario_detalle']);
Route::name('usuario_editar')->get('/usuario_editar/{id}',[controlador_usuarios::class, 'usuario_editar']);
Route::name('usuario_salvar')->put('/usuario_salvar/{id}',[controlador_usuarios::class, 'usuario_salvar']);
Route::name('usuario_borrar')->get('/usuario_borrar/{id}',[controlador_usuarios::class, 'usuario_borrar']);

Route::name('videojuego')->get('/videojuego',[VideojuegoController::class, 'videojuego']);
Route::name('videojuego_alta')->get('/videojuego_alta',[VideojuegoController::class, 'videojuego_alta']);
Route::name('videojuego_registrar')->post('/videojuego_registrar',[VideojuegoController::class, 'videojuego_registrar']);

Route::name('videojuego_detalle')->get('/videojuego_detalle/{id}',[VideojuegoController::class, 'videojuego_detalle']);
Route::name('videojuego_editar')->get('/videojuego_editar/{id}',[VideojuegoController::class, 'videojuego_editar']);
Route::name('videojuego_salvar')->put('/videojuego_salvar/{id}',[VideojuegoController::class, 'videojuego_salvar']);
Route::name('videojuego_borrar')->get('/videojuego_borrar/{id}',[VideojuegoController::class, 'videojuego_borrar']);

Route::name('clientes')->get('/clientes',[controlador_clientes::class, 'clientes']);
Route::name('cliente_alta')->get('/cliente_alta',[controlador_clientes::class, 'cliente_alta']);
Route::name('cliente_registrar')->post('/cliente_registrar',[controlador_clientes::class, 'cliente_registrar']);

Route::name('cliente_detalle')->get('/cliente_detalle/{id}',[controlador_clientes::class, 'cliente_detalle']);
Route::name('cliente_editar')->get('/cliente_editar/{id}',[controlador_clientes::class, 'cliente_editar']);
Route::name('cliente_salvar')->put('/cliente_salvar/{id}',[controlador_clientes::class, 'cliente_salvar']);
Route::name('cliente_borrar')->get('/cliente_borrar/{id}',[controlador_clientes::class, 'cliente_borrar']);

Route::name('consolas')->get('/consolas', [controladorconsolas::class, 'consolas']);
Route::name('consola_alta')->get('/consola_alta', [controladorconsolas::class, 'consola_alta']);
Route::name('consola_registrar')->post('/consola_registrar', [controladorconsolas::class, 'consola_registrar']);
Route::get('/graficos/consolas', [controladorconsolas::class, 'graficos_consolas'])->name('graficos_consolas');

Route::name('consola_detalle')->get('/consola_detalle/{id}',[controladorconsolas::class, 'consola_detalle']);
Route::put('/consola_salvar/{id}', [controladorconsolas::class, 'consola_salvar'])->name('consola_salvar');
Route::name('consola_editar')->get('/consola_editar/{id}',[controladorconsolas::class, 'consola_editar']);
Route::name('consola_borrar')->get('/consola_borrar/{id}',[controladorconsolas::class, 'consola_borrar']);

Route::name('nuevos')->get('/nuevos',[controladornuevos::class, 'nuevos']);
Route::name('nuevo_alta')->get('/nuevo_alta',[controladornuevos::class, 'nuevo_alta']);
Route::name('nuevo_registrar')->post('/nuevo_registrar',[controladornuevos::class, 'nuevo_registrar']);
Route::get('/graficos', [controladornuevos::class, 'graficos'])->name('nuevos.graficos');

Route::name('nuevo_detalle')->get('/nuevo_detalle/{id}',[controladornuevos::class, 'nuevo_detalle']);
Route::name('nuevo_editar')->get('/nuevo_editar/{id}',[controladornuevos::class, 'nuevo_editar']);
Route::name('nuevo_salvar')->put('/nuevo_salvar/{id}',[controladornuevos::class, 'nuevo_salvar']);
Route::name('nuevo_borrar')->get('/nuevo_borrar/{id}',[controladornuevos::class, 'nuevo_borrar']);

Route::name('digitales')->get('/digitales',[controladordigitales::class, 'digitales']);
Route::get('/digital/graficos', [controladordigitales::class, 'graficos'])->name('digitales.graficos');
Route::name('digital_alta')->get('/digital_alta',[controladordigitales::class, 'digital_alta']);
Route::name('digital_registrar')->post('/digital_registrar',[controladordigitales::class, 'digital_registrar']);

Route::name('digital_detalle')->get('/digital_detalle/{id}',[controladordigitales::class, 'digital_detalle']);
Route::name('digital_editar')->get('/digital_editar/{id}',[controladordigitales::class, 'digital_editar']);
Route::name('digital_salvar')->put('/digital_salvar/{id}',[controladordigitales::class, 'digital_salvar']);
Route::name('digital_borrar')->get('/digital_borrar/{id}',[controladordigitales::class, 'digital_borrar']);


