<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardAdminController;

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

Route::controller(UserController::class)->group(function () {
    Route::POST('/registrasi', 'registrasi');
    Route::POST('/login', 'login');
    Route::GET('/user', 'GetUser');
    Route::GET('/user/find/{id}', 'show');
    Route::POST('/user/change/name', 'name');
    Route::POST('/user/change/username', 'username');
    Route::POST('/user/change/photo', 'photo');
});

Route::controller(CommentController::class)->group(function () {
    Route::GET('/comments', 'index');
    Route::GET('/comments/find/{id}', 'show');
    Route::POST('/comments/post', 'store');
});

Route::controller(PostController::class)->group(function () {
    Route::GET('/posts', 'index');
    Route::GET('/all-posts', 'AllPost');
    Route::GET('/posts/my/{id}', 'mypost');
    Route::GET('/posts/companies/{slug}', 'indextwo');
    Route::GET('/posts/find/{slug}', 'show');
    Route::delete('/posts/delete/{id}', 'delete');
    Route::GET('/posts/find/id/{id}', 'useid');
    Route::GET('/posts/search/{query}/{slug}', 'search');
    Route::GET('/posts/related/{currentPost}/{category}', 'related');
    Route::POST('/posts/add', 'store');
});

Route::controller(CompanyController::class)->group(function () {
    Route::GET('/companies', 'index');
    Route::POST('/companies/add', 'store');
    Route::GET('/companies/search/{query}', 'show');
});

Route::controller(CategoriesController::class)->group(function(){
  Route::post('/categories/add', 'store');
  Route::get('/categories/show', 'show');
  Route::get('/categories/count', 'CountCate');
  Route::delete('/categories/delete/{id}', 'delete');
});
Route::controller(DashboardAdminController::class)->group(function(){
  Route::get('/TotalUser', 'UserCount');
  Route::get('/TotalPost', 'PostCount');
  Route::get('/TotalCompany', 'CompanyCount');

});

// Route::apiResource('posts', AddBlog::class);
// // Route::post('upload', [FileUpload::class, 'upload'])->name('upload');
// Route::apiResource('companies', AddCompany::class);
