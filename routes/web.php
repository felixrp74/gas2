<?php

use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\PagoTrabajadoresController;
use App\Http\Controllers\ReporteVentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\VentaController; 
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LogisticaController;
use App\Http\Controllers\TrabajadorController;

Route::resource('empleado', TrabajadorController::class); // INTERFAZ
Route::resource('venta', VentaController::class); // INTERFAZ
Route::resource('balon_gas', LogisticaController::class);
Route::resource('reporte_comprobante', ComprobanteController::class);
Route::resource('reporte_pago_trabajadores', PagoTrabajadoresController::class);
Route::resource('reporte_ventas', ReporteVentaController::class);
Route::get('/reporte_pago_trabajador/{id}/{mes}',  [PagoTrabajadoresController::class, 'reporte_pago_trabajador_mes']);

// Route::resource('estudiante', EstudianteController::class); //INTERFAZ
// Route::resource('matricula', MatriculaController::class); // INTERFAZ
// Route::resource('reportenotas', ReporteEstudianteController::class); //INTERFAZ
// Route::resource('asignacion', AsignacionController::class);// INTERFAZ
// Route::resource('curso', CursoController::class);//INTERFAZ
// Route::resource('colocacionnotas', ColocacionNotasController::class);//INTERFAZ
// Route::resource('fichamatricula', FichaMatriculaController::class);
// Route::resource('apoderado', ApoderadoController::class);

Route::resource('users', UserController::class)->names('admin.users');


// Route::get('/',  [PostController::class, 'index'])->name('posts.index');
Route::get('/',  [PostController::class, 'index']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

