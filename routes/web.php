<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\DynamicController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/logout', [LoginController::class,'logout'])->name('logoutt');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['admin'])->group(function () {
    //Rutas admin
    
	Route::get('admin/usuarios', [UsuariosController::class, 'index'])->name('usuarios admin');
 	Route::get('admin/usuarios/datatable', [UsuariosController::class, 'dataTable'])->name('datatable usuarios admin');
 	Route::get('admin/usuario/nuevo', [UsuariosController::class, 'create'])->name('nuevo usuario admin');
 	Route::get('admin/usuario/editar/{id}', [UsuariosController::class, 'edit'])->name('editar usuario admin');
 	Route::put('admin/usuario/actualizar/{id}', [UsuariosController::class, 'update'])->name('actualizar usuario admin');
 	Route::delete('admin/usuarios/borrar/{id}', [UsuariosController::class, 'destroy'])->name('borrar usuario admin');
 	Route::post('admin/usuarios/restaurar', [UsuariosController::class, 'restaurar'])->name('restaurar usuario admin');
 	Route::post('admin/usuario/guardar', [UsuariosController::class, 'store'])->name('guardar usuario admin');
	Route::post('dynamic/fetchEstados', [DynamicController::class, 'fetchEstados'])->name('estados fetch'); 
	Route::post('dynamic/fetchCiudades', [DynamicController::class, 'fetchCiudades'])->name('ciudades fetch'); 
});

// Route::group(['middleware' => ['user']], function () {
    // NO ME QUEDO TIEMPO DE TRABAJAR EN LA SEGUNDA PARTE
	Route::get('/user', function () {
		return view('user.home');
	})->name('user home');
// });