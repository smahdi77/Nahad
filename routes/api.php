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

//Route::middleware('auth:api')->get('/courses','MainController@index');
Route::post('create_lesson/{course_id}','App\Http\Controllers\MainController@create_lesson');
Route::put('update_course_price/{course_id}','App\Http\Controllers\MainController@update_course_price');
