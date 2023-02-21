<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//protect route (have login can access this method)
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/application/logout', 'App\Http\Controllers\application\user\AuthController@logout');

    // reservation
    Route::controller(App\Http\Controllers\application\user\ReservationController::class)->group(function () {
        Route::get('/application/selectService', 'viewSelectService');
        Route::get('/application/viewAddReservation/{id}', 'viewAddReservation');
        Route::get('/application/viewAddReservation_package{id}', 'viewAddReservation_package');
        Route::get('/application/viewMyReservation', 'viewMyReservation');
        Route::post('/application/addNewReservation', 'addNewReservation');
        Route::post('/application/paymentReservation', 'paymentReservation');
        Route::get('/application/cancelReservation/{id}', 'cancelReservation');
        Route::get('/application/repaymentReservation/{id}', 'repayment');
        Route::get('/application/editReservation/{id}', 'editReservation');
        Route::post('/application/updateReservation', 'updateReservation');
        Route::get('/user/addReservation_package/{id}','viewAddReservation_package');
        Route::post('/user/addReservationPackage','addNewReservation_package');
    });

    //<----referral-->
    Route::controller(App\Http\Controllers\application\user\ReferralController::class)->group(function () {
        Route::get('/application/referral', 'referral');
        Route::post('/application/addInviteCode', 'addInviteCode');
    });
    //<----referral end -->

    // user profile
    Route::controller(App\Http\Controllers\application\user\ProfileController::class)->group(function () {
        Route::get('/application/myProfile', 'myProfile');
        Route::post('/application/profileUpdate', 'profileUpdate');
        Route::post('/application/updatePassword', 'updatePassword');
    });

    //membership
    Route::get('/application/membership', [App\Http\Controllers\application\user\MembershipController::class, 'membership']);

    //<----package-->
    Route::controller(App\Http\Controllers\application\user\CarWashPackageSubscriptionController::class)->group(function () {
        Route::get('/application/CarWashPackageSubscription', 'CarWashPackageSubscription');
        Route::get('/application/paymentPackage/{id}', 'addNewPackage');
        Route::post('/application/checkoutPackage', 'paymentPackage');
        Route::post('/application/repaymentPackage/{id}', 'repaymentPackage');
    });
    //<----package end -->

    //notification
    Route::get('/application/notification', [App\Http\Controllers\application\user\NotificationController::class, 'notification']);

});
//Login
Route::post('/application/login', 'App\Http\Controllers\application\user\AuthController@login');
//Register
Route::post('/application/register', 'App\Http\Controllers\application\user\AuthController@register');




