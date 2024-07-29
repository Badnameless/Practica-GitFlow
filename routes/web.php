<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\PreguntaFrecuenteController;

// Pagina

Route::get('/', [HomeController::class, 'ShowIndex'])->name('index');

Route::get('/blogs/{id}', [BlogPageController::class, 'ShowBlogIndex'])->name('blogindex');

Route::get('/searchblog', [HomeController::class, 'SearchBlog'])->name('searchblog');

// Usuarios

Route::get('/usuarios', [UserController::class, 'UserIndex'])->name('usuarios')->middleware('auth');

Route::delete('/delete_user/{id}', [UserController::class, 'delete'])->name('del_user')->middleware('auth');

// Blogs

Route::get('/admin_blogs', [BlogController::class, 'BlogIndex'])->name('adm_blog')->middleware('auth');

Route::get('/add_blog', [BlogController::class, 'CreateView'])->name('view_add_blog')->middleware('auth');

Route::post('/store_blog', [BlogController::class, 'store'])->name('store_blog')->middleware('auth');

Route::delete('/delete_blog/{id}', [BlogController::class, 'delete'])->name('del_blog')->middleware('auth');

Route::get('/edit_blog/{id}', [BlogController::class, 'EditView'])->name('view_edit_blog')->middleware('auth');

Route::post('/blog_edited/{id}', [BlogController::class, 'edit'])->name('edit_blog')->middleware('auth');

// Admin

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');
?>
