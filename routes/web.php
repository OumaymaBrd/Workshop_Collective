<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

Route::get('/', [AuthorController::class, 'index'])->name('home');

Route::resource('articles', AuthorController::class);