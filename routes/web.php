<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\DispositivoController;
use App\Models\Trabajador;
use app\Models\Dispositivo;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\DevolucionController;
use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use app\http\Controllers\CambiarController;


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





Route::get('/{id}/edit', [TrabajadorController::class,'edit'])->name('trabajador.edit');
Route::get('/trabajador', [TrabajadorController::class, 'index'])->name('trabajador.index');
Route::post('/trabajador', [TrabajadorController::class, 'store'])->name('trabajador');
Route::delete('/trabajador/{rut}', [TrabajadorController::class, 'destroy'])->name('trabajador-destroy');
Route::patch('/trabajador/{rut}', [TrabajadorController::class, 'update'])->name('trabajador-update');




Route::get('/dispositivo', [DispositivoController::class, 'index'])->name('dispositivo.index');
Route::post('/dispositivo', [DispositivoController::class, 'store'])->name('dispositivo');
Route::delete('/dispositivo/{serie}', [DispositivoController::class, 'destroy'])->name('dispositivo-destroy');
Route::get('/{id}/edit', [DispositivoController::class,'edit'])->name('dispositivo.edit');
Route::patch('/dispositivo/{rut}', [DispositivoController::class, 'update'])->name('dispositivo-update');


Route::post('/dependencia',[DependenciaController::class, 'store'])->name('dependencia');
Route::get('/dependencia',[DependenciaController::class , 'index'])->name('dependencia.index');
Route::delete('/dependencia/{id}', [DependenciaController::class, 'destroy'])->name('dependencia-destroy');
Route::patch('/dependencia/{rut}', [DependenciaController::class, 'update'])->name('dependencia-update');




Route::post('/prestamo', [PrestamoController::class, 'store'])->name('prestamo');
Route::get('/prestamo', [PrestamoController::class, 'index'])->name('prestamo.index');
Route::delete('/prestamo/{id}', [PrestamoController::class, 'destroy'])->name('prestamo-destroy');




Route::post('/devolucion',[DevolucionController::class, 'buscarArriendo'])->name('devolucion');
Route::get('/devolucion',[DevolucionController::class , 'index'])->name('mostrar-devolucion');

Route::name('imprimir')->get('/imprimir','App\Http\Controllers\Controller@imprimir');
Route::name('imprimirdev')->get('/imprimirdev','App\Http\Controllers\Controller@imprimir2');





Route::get('/register', function () {
    if(!Auth::check()){
        return redirect('/login');
            }
    return view('auth.register');
});


Route::post('/register',[RegisterController::class,'register'])->name('register');





Route::get('/login',[LoginController::class,'show']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/principal',[HomeController::class,'index']);





Route::get('/', function () {
    if(Auth::check()){
        return redirect('/principal');
            }
    return view('auth.login');
});


Route::get('cambiar_clave', function () {
    if(!Auth::check()){
        return redirect('/login');
            }
    return view('perfil.cambiar_clave');
});


//clase que no funciona
Route::patch('cambiar_clave','App\Http\Controllers\CambiarClaveController@update')->name('clave-update');


/*

Route::post('cambiar_clave', function () {
    if(!Auth::check()){
        return redirect('/login');
            }
    return view('perfil/cambiar_clave');
});

*/





Route::get('/salir',[LogoutController::class,'logout'])->name('salir');

Route::get('chart', [ChartJSController::class, 'index']);






