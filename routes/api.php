<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Content-Type: application/json; charset=utf-8");

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('login', 'LoginController@login');
Route::resource('tables', 'TablesController');
Route::resource('foods', 'FoodController');
Route::resource('menus', 'MenuController');
Route::resource('menuDetails', 'MenuDetailsController');
Route::resource('measures','MeasureController');
Route::resource('orders', 'OrderController');
Route::resource('orderDetails', 'OrderDetailsController');
	



