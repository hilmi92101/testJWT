<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group([

    'namespace' => 'Api',
    //'middleware' => 'api',
    //'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('checkToken', 'AuthController@checkToken');
    Route::post('logout', 'AuthController@logout');
    //Route::post('refresh', 'AuthController@refresh');
    //Route::post('me', 'AuthController@me');

    Route::post('admin', 'AdminController@index');

    // misc
    Route::post('passwordGenerator', 'AuthController@passwordGenerator');


    Route::post('superadmin/login', 'Superadmin\AuthController@login');
    Route::post('superadmin/checkToken', 'Superadmin\AuthController@checkToken');
    Route::post('superadmin/logout', 'Superadmin\AuthController@logout');
    Route::post('superadmin', 'Superadmin\AdminController@index');

});