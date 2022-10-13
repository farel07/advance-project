<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/todo', [TodoController::class, 'index']);
    Route::post('/todo', [TodoController::class, 'create_todo']);
    Route::put('/todo', [TodoController::class, 'update_todo']);
    Route::delete('/todo', [TodoController::class, 'delete_todo']);
});

Route::group(['prefix' => 'auth'], function(){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/data', [AuthController::class, 'data']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
    });
});
