<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/index', [PostController::class, 'index']);
        Route::post('/store', [PostController::class, 'store']);
        Route::get('/show/{post}', [PostController::class, 'show']);
        Route::put('update/{id}', [PostController::class, 'update']);
        Route::delete('/delete/{id}', [PostController::class, 'destroy']);
        // Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
        // Route::post('update/{id}', [AdminController::class, 'update'])->name('update');
        // Route::get('/delete/{id}', [AdminController::class, 'destroy'])->name('delete');
        // Route::get('/search', [AdminController::class, 'search'])->name('search');
    });
    
    Route::apiResource('/users', UserController::class);
});

Route::post('/auth/token', [AuthController::class, 'generateTokenForUser']);
