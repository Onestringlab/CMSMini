<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContentsController;


Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home.welcome', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/content/{id}', [App\Http\Controllers\HomeController::class, 'read']);
Route::get('/category/{id}', [App\Http\Controllers\HomeController::class, 'category']);


Route::resource('categories', CategoriesController::class);

Route::resource('contents', ContentsController::class);
