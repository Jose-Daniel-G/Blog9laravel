<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class,'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class,'show'])->name('posts.show');
Route::get('categories/{category}', [PostController::class,'category'])->name('posts.category');
Route::get('tags/{tag}', [PostController::class,'tag'])->name('posts.tag');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // Rutas protegidas
        Route::get('admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
        Route::post('admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
    });
