<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MarketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::POST('/registrasi', [UserController::class, 'registrasi']);
Route::POST('/login', [UserController::class, 'login']);
Route::GET('/user', [UserController::class, 'GetUser']);

Route::controller(CommentController::class)->group(function () {
    Route::GET('/comments', 'index');
    Route::GET('/comments/find/{id}', 'show');
    Route::POST('/comments/post', 'store');
});

Route::controller(PostController::class)->group(function () {
    Route::GET('/posts', 'index');
    Route::GET('/posts/find/{slug}', 'show');
    Route::GET('/posts/search/{query}', 'search');
    Route::GET('/posts/related/{currentPost}/{category}', 'related');
});

