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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::apiResource('/users', 'App\Http\Controllers\UserController')->middleware('auth:api');
Route::apiResource('/images', 'App\Http\Controllers\ImageController');
Route::apiResource('/categories', 'App\Http\Controllers\CategoryController');
// Route::apiResource('/images', 'App\Http\Controllers\ImageController')->middleware('auth:api');
Route::apiResource('/listings', 'App\Http\Controllers\ListingController');
Route::apiResource('/topics', 'App\Http\Controllers\TopicController');
// Route::apiResource('/listings', 'App\Http\Controllers\ListingController')->middleware('auth:api');
