<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
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

//Public APIs
Route::post('/login', [AuthController::class, 'login']); //Login user to the system

// Private APIs; protected by the authorization
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/posts', [PostController::class, 'store']); //Store the post info to database
    Route::get('/posts', [PostController::class, 'index']); //Get all posts from database
    Route::get('/posts/all', [PostController::class, 'all']); //Get all posts from database based on the user
    Route::get('/profile/show', [ProfileController::class, 'show']); //Get all posts from database
});
