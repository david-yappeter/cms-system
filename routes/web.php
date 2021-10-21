<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\PostController::class, "index"])->name("blog.index");
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, "show"])->name("blog.post");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');    
    Route::get('/admin/posts/create', [App\Http\Controllers\AdminController::class, 'create'])->middleware('can:create,App\Models\Post')->name('admin.post.create');    
    Route::get('/admin/posts', [App\Http\Controllers\AdminController::class, 'list'])->name('admin.post.list');    
    Route::post('/admin/posts/store', [App\Http\Controllers\AdminController::class, 'store'])->middleware('can:create,App\Models\Post')->name('admin.post.store');    
    Route::get('/admin/posts/{post}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->middleware('can:view,post')->name('admin.post.edit');    
    Route::patch('/admin/posts/{post}', [App\Http\Controllers\AdminController::class, 'patch'])->middleware('can:update,post')->name('admin.post.patch');    
    Route::delete('/admin/posts/{post}', [App\Http\Controllers\AdminController::class, 'delete'])->middleware('can:delete,post')->name('admin.post.delete');    

    Route::delete('/admin/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'profile'])->middleware('can:view,user')->name('admin.user.profile');
    Route::patch('/admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'patch'])->middleware('can:update,user')->name('admin.user.profile.patch');
    Route::put('/admin/users/{user}/{role}/attach', [App\Http\Controllers\UserController::class, 'attach'])->name('admin.users.role.attach');
    Route::put('/admin/users/{user}/{role}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('admin.users.role.detach');
    Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users');
});

Route::middleware(['role:admin'])->group(function () {
});