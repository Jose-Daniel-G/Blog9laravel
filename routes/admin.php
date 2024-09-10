<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehiculoController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\EventoController;

// use App\Http\Controllers\ClaseController;
Route::get("/", [HomeController::class, "index"])->name("admin.home");
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('tags', TagController::class)->names('admin.tags');
Route::resource('posts', PostController::class)->names('admin.posts');

// Route::resource('clases', ClaseController::class)->names('admin.clases');
Route::resource('vehiculos', VehiculoController::class)->names('admin.vehiculos');
Route::resource('cursos', CursoController::class)->names('admin.cursos');

// Route::resource('eventos', EventoController::class)->names('eventos');
Route::get('eventos', [EventoController::class, 'index'])->name('admin.eventos.index');
Route::get('eventos/mostrar', [EventoController::class, 'show'])->name('admin.eventos.show');
Route::post('eventos/editar/{id}', [EventoController::class, 'edit'])->name('admin.eventos.edit');
Route::put('eventos/actualizar/{evento}', [EventoController::class, 'update'])->name('admin.eventos.update');

Route::post('eventos/actualizar/{evento}', [EventoController::class, 'edit'])->name('admin.eventos.update');
Route::delete('eventos/eliminar/{id}', [EventoController::class, 'destroy'])->name('admin.eventos.destroy');
Route::post('eventos/agregar', [EventoController::class, 'store'])->name('admin.eventos.store');
