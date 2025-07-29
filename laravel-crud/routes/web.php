<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Redirection de la page d'accueil vers les articles
Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Routes CRUD pour les articles
Route::resource('posts', PostController::class);
