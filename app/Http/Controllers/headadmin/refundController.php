<?php

namespace App\Http\Controllers\headadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reservation;
use App\Models\userMemberPoint;
use App\Models\memberPoint;
use App\Models\OrderReservation;
use App\Models\userPackageSubscription;
use DB;

class refundController extends Controller
{
    public function refund($id)
    {
        $r = request();
        $orderId = $id;
 
        $findOrderReservation = DB::table('order_reservations')
            ->where('id', $orderId)
            ->first();
            
        if($findOrderReservation->paymentStatus == 5) {
            //get the user order package id

            $findOrderReservation = DB::table('order_reservations')
            ->where('id', $orderId)
            ->first();

            $orderPackageId = $findOrderReservation->orderPackageId;
            echo $orderPackageId ;
            $userOrderPackage =  userPackageSubscription::where('id', $orderPackageId)->first();
           

            $plusWashTimes = $userOrderPackage->times + 1;
            echo $plusWashTimes ;
            $userOrderPackage->times = $plusWashTimes;
            $userOrderPackage->save();

            DB::update('update order_reservations set paymentStatus = ? where id = ?', [3, $id]);

            DB::update('update reservations set status = ? where orderId = ?', ['refund success by package', $id]);
        }else{
            DB::update('update order_reservations set paymentStatus = ? where id = ?', [3, $id]);

            DB::update('update reservations set status = ? where orderId = ?', ['refund success', $id]);


        }

        $userGetMemberPoint = OrderReservation::where('id', $id)->first();

        $deductMemberPoint = $userGetMemberPoint->memberPoint;
        $reservationUserId = $userGetMemberPoint->userId;

        $userMemberPoint = userMemberPoint::where('userId', $reservationUserId)->first();

        //total member point minus this payment total get member point
        $minusTotalMemberPoint = $userMemberPoint->totalPoint - $deductMemberPoint;
        //current member point minus this payment total get member point
        $minusCurrentMemberpoint = $userMemberPoint->currentPoint - $deductMemberPoint;

        //update to the database new member point
        $userMemberPoint->totalPoint = $minusTotalMemberPoint;
        $userMemberPoint->currentPoint = $minusCurrentMemberpoint;
        $userMemberPoint->save();

        return redirect()->route('viewRefundManagement');
    }
}
