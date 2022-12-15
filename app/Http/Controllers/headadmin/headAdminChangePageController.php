<?php

namespace App\Http\Controllers\headadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\User;
use App\Models\branch;
use App\Models\service;
use App\Models\OrderReservation;
use App\Models\reservation;
class headAdminChangePageController extends Controller
{
    //go to /headAdmin/customerAccountManagement page
    public function viewCustomerAccountManagement()
    {
        $viewUser = User::all();
        return view('/headAdmin/customerAccountManagement')->with('user', $viewUser);
    }

    //go to /headAdmin/branchManagement page
    public function viewBranchManagement()
    {
        $branches = branch::all();

        return view('/headAdmin/branchManagement')->with('branches', $branches);
    }

    //go to /headAdmin/serviceManagement page
    public function viewServiceManagement()
    {
        $services = service::all();

        return view('/headAdmin/serviceManagement')->with('services', $services);
    }

    //go to /headAdmin/refundManagement page
    public function viewRefundManagement()
    {
        $refundReservations = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->where('order_reservations.paymentStatus', '=', '2')
            ->get();

        $refundReservationsPackages = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->where('order_reservations.paymentStatus', '=', '5')
            ->get();

        return view('/headAdmin/refundManagement')->with('refundReservations', $refundReservations)->with('refundReservationsPackages',$refundReservationsPackages);
    }
    //go to /headAdmin/editBranch page
    public function viewEditBranch($id)
    {
        $branches = branch::all()->where('id', $id);

        return view('/headAdmin/editBranch')->with('branches', $branches);
    }

    //go to /headAdmin/editService page
    public function viewEditService($id)
    {
        $services = service::all()->where('id', $id);

        return view('/headAdmin/editService')->with('services', $services);
    }
}
