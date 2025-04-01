<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index.home')->middleware('auth');


Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

Route::get('/admin/configuraciones', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('auth');
Route::post('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('admin.configuracion.store')->middleware('auth');


Route::get('/admin/gestiones', [App\Http\Controllers\GestionController::class, 'index'])->name('admin.gestiones.index')->middleware('auth');
Route::get('/admin/gestiones/create', [App\Http\Controllers\GestionController::class, 'create'])->name('admin.gestiones.create')->middleware('auth');
Route::post('/admin/gestiones/create', [App\Http\Controllers\GestionController::class, 'store'])->name('admin.gestiones.store')->middleware('auth');
Route::get('/admin/gestiones/{id}/edit', [App\Http\Controllers\GestionController::class, 'edit'])->name('admin.gestiones.edit')->middleware('auth');
Route::put('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'update'])->name('admin.gestiones.update')->middleware('auth');
Route::delete('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'destroy'])->name('admin.gestiones.destroy')->middleware('auth');

Route::get('/admin/carreras', [App\Http\Controllers\CarreraController::class, 'index'])->name('admin.carreras.index')->middleware('auth');
Route::get('/admin/carreras/create', [App\Http\Controllers\CarreraController::class, 'create'])->name('admin.carreras.create')->middleware('auth');
Route::post('/admin/carreras/create', [App\Http\Controllers\CarreraController::class, 'store'])->name('admin.carreras.store')->middleware('auth');
Route::get('/admin/carreras/{id}/edit', [App\Http\Controllers\CarreraController::class, 'edit'])->name('admin.carreras.edit')->middleware('auth');
Route::put('/admin/carreras/{id}', [App\Http\Controllers\CarreraController::class, 'update'])->name('admin.carreras.update')->middleware('auth');
Route::delete('/admin/carreras/{id}', [App\Http\Controllers\CarreraController::class, 'destroy'])->name('admin.carreras.destroy')->middleware('auth');

Route::get('/admin/niveles', [App\Http\Controllers\NivelController::class, 'index'])->name('admin.niveles.index')->middleware('auth');
Route::get('/admin/niveles/create', [App\Http\Controllers\NivelController::class, 'create'])->name('admin.niveles.create')->middleware('auth');
Route::post('/admin/niveles/create', [App\Http\Controllers\NivelController::class, 'store'])->name('admin.niveles.store')->middleware('auth');
Route::get('/admin/niveles/{id}/edit', [App\Http\Controllers\NivelController::class, 'edit'])->name('admin.niveles.edit')->middleware('auth');
Route::put('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'update'])->name('admin.niveles.update')->middleware('auth');
Route::delete('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'destroy'])->name('admin.niveles.destroy')->middleware('auth');
