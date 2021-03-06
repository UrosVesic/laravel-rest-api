<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UserSellController;
use App\Http\Controllers\Api\AuthController;

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

//Route::get('/sells/{id}',[SellController::class,'show']);
//Route::get('/sells',[SellController::class,'index']);

/*Route::resource('sells',SellController::class);
Route::resource('cars',CarController::class);
Route::resource('users',UserController::class);
Route::resource('brands',BrandController::class);*/
Route::resource('users.sells',UserSellController::class)->only('index');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::resource('sells', SellController::class)->only(['update', 'store', 'destroy']);
    Route::resource('cars',CarController::class)->only(['update', 'store', 'destroy']);
    Route::resource('brands',BrandController::class)->only(['update', 'store', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

    Route::resource('sells', SellController::class)->only(['index', 'show']);
    Route::resource('cars',CarController::class)->only(['index', 'show']);
    Route::resource('brands',BrandController::class)->only(['index', 'show']);