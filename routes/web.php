<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/users/{id}/update', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{id}/delete', [UserController::class, 'delete'])->name('user.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', \App\Http\Controllers\CategoryController::class);


Route::middleware(['auth'])->group(function (){
    Route::resource('posts', \App\Http\Controllers\PostController::class);
});

