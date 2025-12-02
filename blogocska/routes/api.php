<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [ApiController::class, 'login']);
Route::get('/posts', [ApiController::class, 'index']);
Route::get('/posts/categories', [ApiController::class, 'indexWithCategories']);
Route::get('/posts/{post}', [ApiController::class, 'show']);
Route::post('/posts', [ApiController::class, 'store']) -> middleware('auth:sanctum');
Route::patch('/posts/{post}', [ApiController::class, 'update']) -> middleware('auth:sanctum');
Route::get('/posts/{post}/categories', [ApiController::class, 'indexCategories']);
Route::patch('/posts/{post}/categories', [ApiController::class, 'updateCategories']);
