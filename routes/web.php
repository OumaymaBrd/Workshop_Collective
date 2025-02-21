<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

Route::get('/', [AuthorController::class, 'index'])->name('home');

Route::resource('articles', AuthorController::class);

// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\LogoutController;
// use App\Http\Controllers\ArticleController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::post('/articles/{article}/like', [ArticleController::class, 'like'])->name('articles.like');
    Route::post('/articles/{article}/dislike', [ArticleController::class, 'dislike'])->name('articles.dislike');
});

// Route::middleware(['auth', 'writer'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

//     Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
//     Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
//     Route::get('/my-articles', [ArticleController::class, 'myArticles'])->name('articles.my_articles');
// });
