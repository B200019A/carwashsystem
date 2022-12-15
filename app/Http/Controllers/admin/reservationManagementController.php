<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderReservation;
use App\Models\reservation;
use DB;

class reservationManagementController extends Controller
{
    public function sortReservationId()
    {
        $sortReservationId = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches','branches.id','=','reservations.branchId')
            ->select('order_reservations.id as orderId', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus','branches.name as branchName')
            ->orderBy('id', 'asc')
            ->get();

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationId);
    }
    public function sortReservationService()
    {
        $sortReservationService = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches','branches.id','=','reservations.branchId')
            ->select('order_reservations.id as orderId', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus','branches.name as branchName')
            ->orderBy('Services', 'asc')
            ->get();

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationService);
    }

    public function sortReservationPrice(){

        $sortReservationPrice = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches','branches.id','=','reservations.branchId')
            ->select('order_reservations.id as orderId', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus','branches.name as branchName')
            ->orderBy('price', 'asc')
            ->get();

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationPrice);

    }

    public function sortReservationCarPlate(){

        $sortReservationCarPlate = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches','branches.id','=','reservations.branchId')
            ->select('order_reservations.id as orderId', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus','branches.name as branchName')
            ->orderBy('carPlate', 'asc')
            ->get();

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationCarPlate);

    }

    public function sortReservationDate(){

        $sortReservationDate = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches','branches.id','=','reservations.branchId')
            ->select('order_reservations.id as orderId', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus','branches.name as branchName')
            ->orderBy('date', 'asc')
            ->get();

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationDate);

    }

    public function sortReservationBranch(){

        $sortReservationBranch = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches','branches.id','=','reservations.branchId')
            ->select('order_reservations.id as orderId', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus','branches.name as branchName')
            ->orderBy('branchId', 'asc')
            ->get();

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationBranch);

    }

    public function sortReservationStatus(){

        $sortReservationStatus = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches','branches.id','=','reservations.branchId')
            ->select('order_reservations.id as orderId', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus','branches.name as branchName')
            ->orderBy('status', 'asc')
            ->get();

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationStatus);

    }

}
