<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/books', [BookController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'index']);

Route::post('/books', [BookController::class, 'store']);

Route::put('/books/{book}', [BookController::class, 'update']);

Route::delete('/books/{book}', [BookController::class, 'destroy']);

Route::post('/authors', [AuthorController::class, 'store']);

Route::put('/authors/{author}', [AuthorController::class, 'update']);

Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);

Route::get('/books/{book}', [BookController::class, 'show']);

Route::get('/reviews', [ReviewController::class, 'index']);

Route::get('/books/{book}/reviews', [BookController::class, 'indexByBookId']);

Route::delete('/reviews/{review}', [ReviewController::class, 'destroy']);

Route::put('/reviews/{review}', [ReviewController::class, 'update']);

Route::post('/reviews', [ReviewController::class, 'store']);