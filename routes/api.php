<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Book;
use App\Http\Controllers\Flight;
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

Route::post('/register',[AuthController::class,'register']);
Route::post('/flight/auth',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']], function() {
    Route::get('/flight/getdport',[Flight::class,'getDPort']);
    Route::get('/flight/getaport',[Flight::class,'getAPort']);
    Route::post('/flight/search',[Flight::class,'search']);
    Route::post('/flight/book',[Book::class,'book']);
    Route::post('/logout',[AuthController::class,'logout']);
});
