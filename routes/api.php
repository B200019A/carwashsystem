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

//protect route (have login can access this method)
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/application/logout', 'App\Http\Controllers\application\user\AuthController@logout');

    //two type for writing the route
    Route::get('/application/selectService', [App\Http\Controllers\application\user\ReservationController::class, 'viewSelectService']);

    Route::get('/application/viewAddReservation/{id}', 'App\Http\Controllers\application\user\ReservationController@viewAddReservation');
    Route::get('/application/viewAddReservation_package{id}', 'App\Http\Controllers\application\user\ReservationController@viewAddReservation_package');
    Route::get('/application/viewMyReservation', 'App\Http\Controllers\application\user\ReservationController@viewMyReservation');
    Route::post('/application/addNewReservation', 'App\Http\Controllers\application\user\ReservationController@addNewReservation');

});
;
//Login
Route::post('/application/login', 'App\Http\Controllers\application\user\AuthController@login');
//Register
Route::post('/application/register', 'App\Http\Controllers\application\user\AuthController@register');
