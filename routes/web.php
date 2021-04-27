<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
<<<<<<< HEAD
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController;


=======
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AtencionController;
>>>>>>> eab38e751f3ddcccc52bc64d46f646cd751fd0e9

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('empleados', EmpleadoController::class);
<<<<<<< HEAD
Route::resource('compras', CompraController::class);
Route::resource('ventas', VentaController::class);
Route::resource('productos', ProductoController::class);



=======
Route::resource('clientes', CLienteController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('atencions', AtencionController::class);
>>>>>>> eab38e751f3ddcccc52bc64d46f646cd751fd0e9
