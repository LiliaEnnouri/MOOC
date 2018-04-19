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


Route::group(['prefix' => 'auteur'], function () {
    Route::get('/', 'AuteurController@getAll');
});
Route::group(['prefix' => 'sujet'], function () {
    Route::get('/', 'SujetController@getAll');
});

Route::resource('auteurs', 'AuteurAPIController');

Route::resource('sujets', 'SujetAPIController');

Route::resource('cours', 'CoursAPIController');

Route::resource('images', 'ImageAPIController');

Route::resource('textes', 'TexteAPIController');

Route::resource('videos', 'VideoAPIController');