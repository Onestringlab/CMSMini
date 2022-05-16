<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CategoriesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', CategoriesController::class);
Route::get('/categories/edit/{category}', [CategoriesController::class, 'edit']);
Route::delete('/categories/{category}', [CategoriesController::class, 'destroy']);
