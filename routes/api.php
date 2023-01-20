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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'token'], function () {
    Route::prefix('book')->group(function () {
        Route::post('/create', 'App\Http\Controllers\BooksController@store');
        Route::get('/index', 'App\Http\Controllers\BooksController@index');
        Route::put('/update', 'App\Http\Controllers\BooksController@update');
        Route::delete('/delete', 'App\Http\Controllers\BooksController@destroy');
    });
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout');
});

Route::get('/login', 'App\Http\Controllers\LoginController@login');
