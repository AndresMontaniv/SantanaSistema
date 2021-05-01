<?php

use App\Http\Controllers\ComprobanteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController;


use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AtencionController;

use App\Http\Controllers\GastoPersonalController;
use App\Http\Controllers\ServicioBasicoController;

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
Route::resource('gastos', GastoController::class);
Route::resource('ingresos', IngresoController::class);
Route::resource('reportes', ReporteController::class);
Route::resource('comprobantes', ComprobanteController::class);
Route::resource('compras', CompraController::class);
Route::resource('ventas', VentaController::class);
Route::resource('productos', ProductoController::class);

Route::resource('clientes', CLienteController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('atencions', AtencionController::class);

Route::resource('gastoPersonals', GastoPersonalController::class);
Route::resource('servicioBasicos', ServicioBasicoController::class);
