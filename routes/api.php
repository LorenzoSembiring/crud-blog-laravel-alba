<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookmarkController;

Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
});

Route::prefix('category')->group(function () {
    Route::post('/store', [CategoryController::class, 'store']);
    Route::get('/index', [CategoryController::class, 'index']);
    Route::get('/get/{id}', [CategoryController::class, 'show']);
    Route::put('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/delete/{id}', [CategoryController::class, 'destroy']);
})->middleware('auth:sanctum');

Route::prefix('post')->group(function () {
    Route::post('/store', [PostController::class, 'store']);
    Route::get('/index', [PostController::class, 'index']);
    Route::get('/get/{id}', [PostController::class, 'show']);
    Route::put('/update/{id}', [PostController::class, 'update']);
    Route::delete('/delete/{id}', [PostController::class, 'destroy']);
})->middleware('auth:sanctum');

Route::prefix('bookmark')->group(function () {
    Route::post('/store', [BookmarkController::class, 'store']);
    Route::get('/index', [BookmarkController::class, 'index']);
    Route::get('/get/{id}', [BookmarkController::class, 'show']);
    Route::put('/update/{id}', [BookmarkController::class, 'update']);
    Route::delete('/delete/{id}', [BookmarkController::class, 'destroy']);
})->middleware('auth:sanctum');

