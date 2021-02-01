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
Route::get('/me', 'App\Http\Controllers\AuthController@me')->middleware('auth:api');
Route::patch('/user/{id}', 'App\Http\Controllers\AuthController@update');

Route::get('/listings/{id}/all', 'App\Http\Controllers\ListingController@fetchFromId');

// Route::post('/topic', 'App\Http\Controllers\TopicController@store');
// Route::get('/topic', 'App\Http\Controllers\TopicController@show');

// Route::apiResource('/users', 'App\Http\Controllers\UserController')->middleware('auth:api');

Route::get('comments/ref', 'App\Http\Controllers\CommentController@indexWithReference');

Route::apiResource('/users', 'App\Http\Controllers\UserController');
Route::apiResource('/images', 'App\Http\Controllers\ImageController');
Route::apiResource('/categories', 'App\Http\Controllers\CategoryController');
Route::apiResource('/listings', 'App\Http\Controllers\ListingController');
Route::apiResource('/topic', 'App\Http\Controllers\TopicController');
Route::apiResource('/comments', 'App\Http\Controllers\CommentController');
