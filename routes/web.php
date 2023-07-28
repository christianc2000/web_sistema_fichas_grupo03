<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\HistorialController;
use Illuminate\Support\Facades\Route;

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
    return view('inicio');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/menu', [App\Http\Controllers\Web\UserController::class, 'menu'])->name('menu');
    Route::get('/perfil', [App\Http\Controllers\Web\UserController::class, 'perfil'])->name('perfil');
});

route::resource('/citas', CitaController::class);
route::resource('/fichas', FichaController::class);
route::resource('/consultas', ConsultaController::class);
route::resource('/historiales', HistorialController::class);
route::resource('/estadisticas', EstadisticasController::class);
//route::get('/historiales/Medical/{id}', [HistorialController::class, 'indexMedical'])->name('historiales.indexMedical');
