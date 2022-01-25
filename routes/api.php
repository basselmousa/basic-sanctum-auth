<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/user/', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login/', [\App\Http\Controllers\AuthController::class, 'login']);


//Route::resource('products', \App\Http\Controllers\Api\Products\ProductController::class);
Route::get('/products/', [\App\Http\Controllers\Api\Products\ProductController::class, 'index']);
Route::get('/products/{id}', [\App\Http\Controllers\Api\Products\ProductController::class, 'show']);
Route::get('/products/search/{name}', [\App\Http\Controllers\Api\Products\ProductController::class, 'search']);

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::post('/products', [\App\Http\Controllers\Api\Products\ProductController::class, 'store']);
    Route::put('/products/{id}', [\App\Http\Controllers\Api\Products\ProductController::class, 'update']);
    Route::delete('/products/{id}', [\App\Http\Controllers\Api\Products\ProductController::class, 'destroy']);
    Route::post('/logout/', [\App\Http\Controllers\AuthController::class, 'logout']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
