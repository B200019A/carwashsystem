<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\reservation;
use App\Models\branch;
use App\Models\OrderReservation;
use App\Models\notification;
use App\Models\referral;
use App\Models\memberPoint;
use App\Models\memberLevel;
use App\Models\packageSubscription;
use Carbon\Carbon;
use DateTime;

class adminChangePageController extends Controller
{
    //go to /admin/reservationManagement page
    public function viewReservationManagement()
    {
        $checkReservationStatus = reservation::whereNot('status', 'cancel')->get();
        $currentDate = Carbon::now()->format('Y-m-d');
        $currentTime = Carbon::now()->format('H:i:s');
        foreach ($checkReservationStatus as $checkDate) {
            $reservationId = $checkDate->id;
            $date = $checkDate->date;
            $time = $checkDate->timeSlot;

            //check status for tbe date
            if ($date == $currentDate) {
                if ($time == '1') {
                    $timeSlot = Carbon::parse('10:00:00')->format('H:i:s');
                } elseif ($time == '2') {
                    $timeSlot = Carbon::parse('12:00:00')->format('H:i:s');
                } elseif ($time == '3') {
                    $timeSlot = Carbon::parse('14:00:00')->format('H:i:s');
                } elseif ($time == '4') {
                    $timeSlot = Carbon::parse('16:00:00')->format('H:i:s');
                } else {
                    $timeSlot = Carbon::parse('18:00:00')->format('H:i:s');
                }
                //check time slot is before current time or not
                if ($timeSlot < $currentTime) {
                    DB::update('update reservations set status = ? where id = ?', ['expired', $reservationId]);
                }
            } elseif ($date < $currentDate) {
                DB::update('update reservations set status = ? where id = ?', ['expired', $reservationId]);
            }
        }
        $viewReservations = DB::table('reservations')
            ->leftjoin('order_reservations', 'order_reservations.id', '=', 'reservations.id')
            ->leftjoin('branches','branches.id','=','reservations.branchId')
            ->select('order_reservations.id as orderId', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus','branches.name as branchName')
            ->get();

        return view('/admin/reservationManagement')->with('viewReservations', $viewReservations);
    }

    //go to /admin/membershipManagement page
    public function viewMembershipManagement()
    {
        $memberLevels = DB::table('member_levels')->orderBy('targetPoint','asc')->get();
        return view('/admin/membershipManagement')->with('memberLevels',$memberLevels);
    }

    //go to /admin/voucherManagement page
    public function viewVoucherManagement()
    {
        return view('/admin/voucherManagement');
    }

    //go to /admin/referralManagement page
    public function viewReferralManagement()
    {
        $referrals = referral::all();

        return view('/admin/referralManagement')->with('referrals',$referrals);
    }

    //go to /admin/memberPointManagement page
    public function viewMemberPointManagement()
    {
        $memberPoints = memberPoint::all();

        return view('/admin/memberPointManagement')->with('memberPoints',$memberPoints);
    }

    //go to /admin/packageSubscriptionManagement page
    public function viewPackageSubscriptionManagement()
    {
        $packages = packageSubscription::all();

        return view('/admin/packageSubscriptionManagement')->with('packages',$packages);
    }

    //go to /admin/notificationManagement page
    public function viewNotificationManagement()
    {
        $notifications = notification::all();

        //$dateformat = Carbon::parse($notifications->created_at)->format('Y-m-d');

        return view('/admin/notificationManagement')->with('notifications',$notifications);
    }

     //go to /admin/editNotification page
     public function editNotification($id)
     {
        $notifcations = notification::all()->where('id', $id);


         return view('/admin/editNotification')->with('notifications',$notifcations);
     }

     //go to /admin/editReferral page
     public function editReferral($id)
     {
        $referrals = referral::all()->where('id', $id);

         return view('/admin/editReferral')->with('referrals',$referrals);
     }

     //go to /admin/editMemberPoint page
     public function editMemberPoint($id){
        $memberPoints = memberPoint::all()->where('id', $id);

        return view('/admin/editMemberPoint')->with('memberPoints',$memberPoints);

    }

    //go to /admin/editMemberLevel page
    public function editMemberLevel($id){

        $memberLevels = memberLevel::all()->where('id', $id);

        return view('/admin/editMemberLevel')->with('memberLevels',$memberLevels);

    }
    //go to /admin/editPackageSubscription page
    public function editPackageSubscription($id){

        $packages = packageSubscription::all()->where('id', $id);

        return view('/admin/editPackageSubscription')->with('packages',$packages);

    }
}
