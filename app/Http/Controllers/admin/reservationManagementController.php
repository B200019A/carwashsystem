<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderReservation;
use App\Models\reservation;
use App\Models\branch;
use DB;
use Carbon\Carbon;
use DateTime;

class reservationManagementController extends Controller
{
    public function sortReservationId()
    {
        $sortReservationId = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationId);
    }
    public function sortReservationService()
    {
        $sortReservationService = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->orderBy('Services', 'asc')
            ->paginate(10);

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationService);
    }

    public function sortReservationPrice()
    {
        $sortReservationPrice = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->orderBy('price', 'asc')
            ->paginate(10);

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationPrice);
    }

    public function sortReservationCarPlate()
    {
        $sortReservationCarPlate = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->orderBy('carPlate', 'asc')
            ->paginate(10);

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationCarPlate);
    }

    public function sortReservationDate()
    {
        $sortReservationDate = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->orderBy('date', 'asc')
            ->paginate(10);

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationDate);
    }

    public function sortReservationBranch()
    {
        $sortReservationBranch = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->orderBy('branchId', 'asc')
            ->paginate(10);

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationBranch);
    }

    public function sortReservationStatus()
    {
        $sortReservationStatus = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->orderBy('status', 'asc')
            ->paginate(10);

        return view('/admin/reservationManagement')->with('viewReservations', $sortReservationStatus);
    }
    public function findBranchreservation($id)
    {
        $currentDate = Carbon::now()->format('Y-m-d');

        $findBranchResevation = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->where('reservations.date', '=', $currentDate)
            ->where('reservations.branchId', '=', $id)
            ->paginate(10);

        $branches = branch::where('status', '=', 'exist')->get();

        return view('admin/reservationManagementDate')
            ->with('allReservation', $findBranchResevation)
            ->with('branches', $branches);
    }

    public function searchReservation()
    {
        $r = request();
        $keyword = $r->keyword;
        $searchType = $r->reservationStatus;
        if ($searchType == '1') {
            $serachReservation = DB::table('order_reservations')
                ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
                ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
                ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
                ->where('order_reservations.id', 'like', '%' . $keyword . '%')
                ->orderBy('id', 'asc')
                ->get();
        } elseif ($searchType == '2') {
            $serachReservation = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->where('reservations.Services', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'asc')
            ->get();

        } elseif ($searchType == '3') {
            $serachReservation = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->where('reservations.price', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'asc')
            ->get();
        } elseif ($searchType == '4') {
            $serachReservation = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->where('reservations.carPlate', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'asc')
            ->get();
        } elseif ($searchType == '5') {
            $serachReservation = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->where('reservations.date', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'asc')
            ->get();
        } elseif ($searchType == '6') {

            $searchBranchId = DB::table('branches')->where('name','like','%'.$keyword.'%')->first();

            $branchId = $searchBranchId->id;

            $serachReservation = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->where('reservations.branchId', 'like', '%' . $branchId . '%')
            ->orderBy('id', 'asc')
            ->get();
        } else {
            $serachReservation = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->where('reservations.status', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'asc')
            ->get();
        }
        return view('/admin/reservationManagement')->with('viewReservations', $serachReservation);
    }
}
