<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registerWithInv', function () {
    return view('/registerWithInv');
});
Route::get('layouts/app', function () {
    return view('layouts/app');
});
Route::get('test', function () {
    return view('test');
});
//<----------user--------->

//open the add reservation page
Route::get('/user/addReservation', function () {
    return view('/user/addReservation');
});
//open the payment reservation page
Route::get('/user/paymentReservation', function () {
    return view('/user/paymentReservation');
});
//open the my reservation page
Route::get('/user/myReservation', function () {
    return view('/user/myReservation');
});
//open the notification page
Route::get('/user/notification', function () {
    return view('/user/notification');
});
//open the referaal page
Route::get('/user/referral', function () {
    return view('/user/referral');
});
Route::get('/user/reward', function () {
    return view('/user/reward');
});
Route::get('/user/myProfile', function () {
    return view('/user/myProfile');
});

Route::get('/user/membership', function () {
    return view('/user/membership');
});
Route::get('/user/CarWashPackageSubscription', function () {
    return view('/user/membership');
});
Route::get('/user/helpCentre', function () {
    return view('/user/helpCentre');
});
Route::get('/user/helpCentre', function () {
    return view('/user/helpCentre');
});
Route::get('/user/editReservation', function () {
    return view('/user/editReservation');
});
Route::get('/user/paymentPackage', function () {
    return view('/user/paymentPackage');
});
Route::get('/user/addReservation_package', function () {
    return view('/user/addReservation_package');
});
Route::get('/user/selectService', function () {
    return view('/user/selectService');
});
Route::get('/user/invoicePDF', function () {
    return view('/user/invoicePDF');
});
//<----------user- end ------->

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//<------Profile------->
//udpate profile
Route::post('/user/myProfile', [App\Http\Controllers\user\profileController::class, 'profileUpdate'])->name('profileUpdate');
Route::get('/user/myProfile', [App\Http\Controllers\user\profileController::class, 'myProfile'])->name('myProfile');
Route::get('/user/editProfile', [App\Http\Controllers\user\profileController::class, 'editProfile'])->name('editProfile');

Route::get('/user/changePassword', [App\Http\Controllers\user\profileController::class, 'changePassword'])->name('changePassword');
Route::post('/user/updatePassword', [App\Http\Controllers\user\profileController::class, 'updatePassword'])->name('updatePassword');
//<------Profile end------->

//google register
Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);
//google register end
//<-------user operate---------->
//<----reservation-->

Route::get('/user/selectService/', [App\Http\Controllers\user\reservationController::class, 'viewSelectService'])->name('viewSelectService');

Route::get('/user/addReservation/{id}', [App\Http\Controllers\user\reservationController::class, 'viewAddReservation'])->name('viewAddReservation');

Route::post('/user/paymentReservation', [App\Http\Controllers\user\reservationController::class, 'addNewReservation'])->name('addNewReservation');

Route::get('/user/myReservation', [App\Http\Controllers\user\reservationController::class, 'viewMyReservation'])->name('viewMyReservation');
//go to the edit reservation page
Route::get('/user/editReservation{id}', [App\Http\Controllers\user\reservationController::class, 'editReservation'])->name('editReservation');
//update new reservation to the database
Route::post('user/updateReservation', [App\Http\Controllers\user\reservationController::class, 'updateReservation'])->name('updateReservation');
//cancel the reservation
Route::get('/user/cancelReservation/{id}', [App\Http\Controllers\user\reservationController::class, 'cancelReservation'])->name('cancelReservation');
//ADD payment
Route::post('\checkout', [App\Http\Controllers\user\paymentController::class, 'paymentReservation'])->name('payment.reservation');
//reayment the not done payment reservation
Route::get('/user/paymentReservation/{id}', [App\Http\Controllers\user\reservationController::class, 'repayment'])->name('repayment');
//<----reservation end-->

Route::get('/user/notification', [App\Http\Controllers\user\NotificationController::class, 'notification'])->name('notification');

Route::get('/user/reward', [App\Http\Controllers\user\rewardController::class, 'reward'])->name('reward');

Route::get('/user/membership', [App\Http\Controllers\user\rewardController::class, 'membership'])->name('membership');

Route::get('/user/helpCentre', [App\Http\Controllers\user\helpCentreController::class, 'helpCentre'])->name('helpCentre');

//<----referral-->
Route::get('/user/referral', [App\Http\Controllers\user\referralController::class, 'referral'])->name('referral');

Route::post('/user/referral', [App\Http\Controllers\user\referralController::class, 'addInviteCode'])->name('addInviteCode');
//<----referral end -->

//<----package-->
Route::get('/user/CarWashPackageSubscription', [App\Http\Controllers\user\CarWashPackageSubscriptionController::class, 'CarWashPackageSubscription'])->name('CarWashPackageSubscription');

Route::get('/user/paymentPackage/{id}', [App\Http\Controllers\user\CarWashPackageSubscriptionController::class, 'addNewPackage'])->name('addNewPackage');

Route::post('/user/checkout', [App\Http\Controllers\user\CarWashPackageSubscriptionController::class, 'paymentPackage'])->name('payment.package');

Route::get('/user/repaymentPackage/{id}', [App\Http\Controllers\user\CarWashPackageSubscriptionController::class, 'repaymentPackage'])->name('repaymentPackage');

Route::get('/user/addReservation_package/{id}', [App\Http\Controllers\user\reservationController::class, 'viewAddReservation_package'])->name('viewAddReservation_package');

Route::post('/user/addReservationPackage', [App\Http\Controllers\user\reservationController::class, 'addNewReservation_package'])->name('addNewReservation_package');
//<----package end -->

//<!---print invoice-->
Route::get('/user/invoicePDF/{id}', [App\Http\Controllers\user\reservationController::class, 'printInvoice'])->name('printInvoice');
//<!--print invoice end-->
//<-------user operate end---------->

Route::prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {
        //<--------admin------->

        //reservationManagement
        Route::get('/reservationManagement', function () {
            return view('/admin/reservationManagement');
        });

        //membershipManagement
        Route::get('/membershipManagement', function () {
            return view('/admin/membershipManagement');
        });

        //voucherManagement
        Route::get('/voucherManagement', function () {
            return view('/admin/voucherManagement');
        });

        //referralManagement
        Route::get('/referralManagement', function () {
            return view('/admin/referralManagement');
        });

        //memberPointManagement
        Route::get('/memberPointManagement', function () {
            return view('/admin/memberPointManagement');
        });
        //packageSubscriptionManagement
        Route::get('/packageSubscriptionManagement', function () {
            return view('/admin/packageSubscriptionManagement');
        });
        //notificationManagement
        Route::get('/notificationManagement', function () {
            return view('/admin/notificationManagement');
        });
        Route::get('/editNotification', function () {
            return view('/admin/editNotification');
        });
        Route::get('/editReferral', function () {
            return view('/admin/editReferral');
        });
        Route::get('/editMemberPoint', function () {
            return view('/admin/editMemberPoint');
        });
        Route::get('/editPackageSubscription', function () {
            return view('/admin/editPackageSubscription');
        });

        //go to reservationManagement
        Route::get('/reservationManagement', [App\Http\Controllers\admin\adminChangePageController::class, 'viewReservationManagement'])->name('viewReservationManagement');

        Route::get('/reservationManagementDate', [App\Http\Controllers\admin\adminChangePageController::class, 'viewReservationManagementDate'])->name('viewReservationManagementDate');
        //go to membershipManagement
        Route::get('/membershipManagement', [App\Http\Controllers\admin\adminChangePageController::class, 'viewMembershipManagement'])->name('viewMembershipManagement');
        //go to voucherManagement
        Route::get('/voucherManagement', [App\Http\Controllers\admin\adminChangePageController::class, 'viewVoucherManagement'])->name('viewVoucherManagement');
        //go to referralManagement
        Route::get('/referralManagement', [App\Http\Controllers\admin\adminChangePageController::class, 'viewReferralManagement'])->name('viewReferralManagement');
        //go to memberPointManagement
        Route::get('/memberPointManagement', [App\Http\Controllers\admin\adminChangePageController::class, 'viewMemberPointManagement'])->name('viewMemberPointManagement');
        //go to packageSubscriptionManagement
        Route::get('/packageSubscriptionManagement', [App\Http\Controllers\admin\adminChangePageController::class, 'viewPackageSubscriptionManagement'])->name('viewPackageSubscriptionManagement');
        //go to notificationManagement
        Route::get('/notificationManagement', [App\Http\Controllers\admin\adminChangePageController::class, 'viewNotificationManagement'])->name('viewNotificationManagement');

        //<----reservation management-->
        //sort id
        Route::get('/SortIdReservationManagement', [App\Http\Controllers\admin\reservationManagementController::class, 'sortReservationId'])->name('sortReservationId');
        //sort type of service
        Route::get('/SortServiceReservationManagement', [App\Http\Controllers\admin\reservationManagementController::class, 'sortReservationService'])->name('sortReservationService');
        //sort price
        Route::get('/SortPriceReservationManagement', [App\Http\Controllers\admin\reservationManagementController::class, 'sortReservationPrice'])->name('sortReservationPrice');
        //sort Car plate
        Route::get('/SortCarPlateReservationManagement', [App\Http\Controllers\admin\reservationManagementController::class, 'sortReservationCarPlate'])->name('sortReservationCarPlate');
        //sort Date
        Route::get('/SortDateReservationManagement', [App\Http\Controllers\admin\reservationManagementController::class, 'sortReservationDate'])->name('sortReservationDate');
        //sort Branch
        Route::get('/SortBranchReservationManagement', [App\Http\Controllers\admin\reservationManagementController::class, 'sortReservationBranch'])->name('sortReservationBranch');
        //sort Status
        Route::get('/SortStatusReservationManagement', [App\Http\Controllers\admin\reservationManagementController::class, 'sortReservationStatus'])->name('sortReservationStatus');

        Route::post('/searchReservation', [App\Http\Controllers\admin\reservationManagementController::class, 'searchReservation'])->name('searchReservation');

        //find branch reservation
        Route::get('/findBranchReservationManagementDate/{id}', [App\Http\Controllers\admin\reservationManagementController::class, 'findBranchreservation'])->name('findBranchreservation');
        //<----reservation management end -->

        //<----notifcation management-->
        //add notifcation
        Route::post('/notificationManagement', [App\Http\Controllers\admin\notificationController::class, 'addNotification'])->name('addNotification');
        //go to the edit notifcation page
        Route::get('/editNotification{id}', [App\Http\Controllers\admin\adminChangePageController::class, 'editNotification'])->name('editNotification');
        //update notifcation to the database
        Route::post('/updateNotification', [App\Http\Controllers\admin\notificationController::class, 'updateNotification'])->name('updateNotification');
        //delete the notifcation
        Route::get('/DeleteNotification/{id}', [App\Http\Controllers\admin\notificationController::class, 'deleteNotification'])->name('deleteNotification');
        //<----notifcation management end-->

        //<----referral management-->
        //go to edit referral page
        Route::get('/editReferral{id}', [App\Http\Controllers\admin\adminChangePageController::class, 'editReferral'])->name('editReferral');
        //update referral to the database
        Route::post('/updateReferral', [App\Http\Controllers\admin\referralController::class, 'updateReferral'])->name('updateReferral');
        //<----referral management end-->

        //<----member point management-->
        //go to edit referral page
        Route::get('/editMemberPoint{id}', [App\Http\Controllers\admin\adminChangePageController::class, 'editMemberPoint'])->name('editMemberPoint');
        //update referral to the database
        Route::post('/updateMemberPoint', [App\Http\Controllers\admin\memberPointController::class, 'updateMemberPoint'])->name('updateMemberPoint');
        //<----member point management end-->

        //<----member level management-->
        //add member level
        Route::post('/membershipManagement', [App\Http\Controllers\admin\memberLevelController::class, 'addMemberLevel'])->name('addMemberLevel');
        //go to the edit member level page
        Route::get('/editMemberLevel{id}', [App\Http\Controllers\admin\adminChangePageController::class, 'editMemberLevel'])->name('editMemberLevel');
        //update member level to the database
        Route::post('/updateMemberLevel', [App\Http\Controllers\admin\memberLevelController::class, 'updateMemberLevel'])->name('updateMemberLevel');
        //delete the member level
        Route::get('/deleteMemberLevel/{id}', [App\Http\Controllers\admin\memberLevelController::class, 'deleteMemberLevel'])->name('deleteMemberLevel');
        //<----member level management end-->

        //<----package subsciption management-->
        Route::post('/packageSubscriptionManagement', [App\Http\Controllers\admin\packageController::class, 'addPackageSubscription'])->name('addPackageSubscription');
        //go to the edit member level page
        Route::get('/editPakageSubscription{id}', [App\Http\Controllers\admin\adminChangePageController::class, 'editPackageSubscription'])->name('editPackageSubscription');
        //update member level to the database
        Route::post('/updatePackageSubscription', [App\Http\Controllers\admin\packageController::class, 'updatePackageSubscription'])->name('updatePackageSubscription');
        //delete the member level
        Route::get('/deletePackageSubscription/{id}', [App\Http\Controllers\admin\packageController::class, 'deletePackageSubscription'])->name('deletePackageSubscription');
        //<----package subsciption management end -->
        //<----------admin--------->
    });

Route::prefix('headAdmin')
    ->middleware(['auth', 'isHeadAdmin'])
    ->group(function () {
        //<--------head admin------->

        //customerAccountManagement
        Route::get('/customerAccountManagement', function () {
            return view('/headAdmin/customerAccountManagement', ['userId' => App\Models\User::all()]);
        });
        //branchManagement
        Route::get('/branchManagement', function () {
            return view('/headAdmin/branchManagement');
        });
        //serviceManagement
        Route::get('/serviceManagement', function () {
            return view('/headAdmin/serviceManagement');
        });
        //refundManagement
        Route::get('/refundManagement', function () {
            return view('/headAdmin/refundManagement');
        });
        Route::get('/editBranch', function () {
            return view('/headAdmin/editBranch');
        });
        Route::get('/editService', function () {
            return view('/headAdmin/editService');
        });

        //go to customerAccountManagement
        Route::get('/customerAccountManagement', [App\Http\Controllers\headadmin\headAdminChangePageController::class, 'viewCustomerAccountManagement'])->name('viewCustomerAccountManagement');
        //go to branchManagement
        Route::get('/branchManagement', [App\Http\Controllers\headadmin\headAdminChangePageController::class, 'viewBranchManagement'])->name('viewBranchManagement');
        //go to serviceManagement
        Route::get('/serviceManagement', [App\Http\Controllers\headadmin\headAdminChangePageController::class, 'viewServiceManagement'])->name('viewServiceManagement');
        //go to refundManagement
        Route::get('/refundManagement', [App\Http\Controllers\headadmin\headAdminChangePageController::class, 'viewRefundManagement'])->name('viewRefundManagement');

        //<----branch management-->
        //add branch
        Route::post('/branchManagement', [App\Http\Controllers\headadmin\branchController::class, 'addBranch'])->name('addBranch');
        //go to the edit branch page
        Route::get('/editBranch{id}', [App\Http\Controllers\headadmin\headAdminChangePageController::class, 'viewEditBranch'])->name('editBranch');
        //update new branch to the database
        Route::post('/updateBranch', [App\Http\Controllers\headadmin\branchController::class, 'updateBranch'])->name('updateBranch');
        //deactivate the branch
        Route::get('/deactivateBranch/{id}', [App\Http\Controllers\headadmin\branchController::class, 'deactivateBranch'])->name('deactivateBranch');
        //reactivate the branch
        Route::get('/reactivateBranch/{id}', [App\Http\Controllers\headadmin\branchController::class, 'reactivateBranch'])->name('reactivateBranch');

        //<----branch management end-->

        //<----user management-->
        //deactivate the user
        Route::get('/deactivateUser/{id}', [App\Http\Controllers\headadmin\userController::class, 'deactivateUser'])->name('deactivateUser');
        //reactivate the user
        Route::get('/reactivateUser/{id}', [App\Http\Controllers\headadmin\userController::class, 'reactivateUser'])->name('reactivateUser');

        //<----user management end-->

        //<----service management-->
        //add service
        Route::post('/serviceManagement', [App\Http\Controllers\headadmin\serviceController::class, 'addService'])->name('addService');
        //go to the edit branch page
        Route::get('/editService{id}', [App\Http\Controllers\headadmin\headAdminChangePageController::class, 'viewEditService'])->name('viewEditService');
        //update new branch to the database
        Route::post('/updateService', [App\Http\Controllers\headadmin\serviceController::class, 'updateService'])->name('updateService');
        //deactivate the branch
        Route::get('/DeleteService/{id}', [App\Http\Controllers\headadmin\serviceController::class, 'deleteService'])->name('deleteService');
        //<----service management end-->

        //<----service management-->
        Route::get('/refundSuccess/{id}', [App\Http\Controllers\headadmin\refundController::class, 'refund'])->name('refund');
        //<----service management end-->
        //<-------head admin end------->
    });
