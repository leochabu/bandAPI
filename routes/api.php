<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::get('hello/{name}', function($name){
    return 'hello world '.$name;
});

Route::post('hello-post/{name}', 'App\Http\Controllers\HelloWorldController@hello');*/

Route::get('bands', 'App\Http\Controllers\BandController@getAll');
Route::get('bands/{id}', 'App\Http\Controllers\BandController@getByID');
Route::get('bands/gender/{gender}', 'App\Http\Controllers\BandController@getByGender');
Route::post('bands/store', 'App\Http\Controllers\BandController@store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
