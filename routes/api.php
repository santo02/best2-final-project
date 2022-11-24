<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MarketController;
use App\Http\Controllers\AddBlog;
use App\Http\Controllers\AddCompany;
use App\Http\Controllers\FileUpload;



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


Route::controller(MarketController::class)->group(function () {
    Route::get('/marketplaces', 'index');
    Route::get('/marketplaces/risk', 'getRisk');
    Route::get('/marketplaces/find/{id}', 'find');
    Route::delete('/marketplaces/delete/{id}', 'destroy');
    Route::post('/marketplaces/add', 'store');
    Route::post('/marketplaces/update', 'update');
    Route::post('/marketplaces/calc', 'calculateImbaHasil');
});

Route::apiResource('posts', AddBlog::class);
// Route::post('upload', [FileUpload::class, 'upload'])->name('upload');
Route::apiResource('companies', AddCompany::class);