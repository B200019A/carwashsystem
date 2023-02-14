<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\user\rewardController;
use DateTime;
use DB;
use Session;
use App\Models\reservation;
use App\Models\OrderReservation;
use App\Models\branch;
use App\Models\service;
use App\Models\userMemberPoint;
use App\Models\memberPoint;
use App\Models\memberLevel;
use App\Models\userPackageSubscription;
use Auth;
use PDF;
use Carbon\Carbon;

class reservationController extends Controller
{
    public function viewSelectService()
    {
        //select all branch data
        $userPackages = DB::table('user_package_subscriptions')//main table
            ->leftjoin('package_subscriptions'/*second table*/, 'package_subscriptions.id', '=', 'user_package_subscriptions.packageId')
            ->select('package_subscriptions.name as packageName', 'user_package_subscriptions.*')
            ->where('userId', '=', Auth::id())
            ->get();

        $services = service::all();

        return view('/user/selectService')
            ->with('services', $services)
            ->with('userPackages', $userPackages);
    }

    public function viewAddReservation($id)
    {
        //select all branch data
        $branchs = branch::whereNot('status', '=', 'close')->get();

        $services = service::find($id);

        return view('/user/addReservation')
            ->with('branchs', $branchs)
            ->with('services', $services);
    }
    //go to reservation_package page
    public function viewAddReservation_package($id)
    {
        //select all branch data
        $branchs = branch::whereNot('status', '=', 'close')->get();

        return view('/user/addReservation_package')
            ->with('branchs', $branchs)
            ->with('userPackageId', $id);
    }
    //add new reservation to the database
    public function addNewReservation()
    {
        $r = request();
        $carService = $r->serviceType;
        //depend service number separate the service type name
        $serviceInformation = service::find($r->serviceType);

        $serviceName = $serviceInformation->name;
        $price = $serviceInformation->price;

        //if select normal wash
        if ($carService == '1') {
            $date = $r->date; //get the date
            $branch = $r->branch; //get the branch id
            $findSameDate1 = reservation::where([['date', '=', $date], ['Services', '=', 'Normal wash'], ['branchId', '=', $branch]])
                ->whereNot('status', '=', 'cancel')
                ->get();
            //echo $ServiceCount;
            $ServiceCount = $findSameDate1->count(); //calculate the normal wash in that time

            if ($ServiceCount > 19) {
                //if over 20 cannot booking success
                Session::flash('Danger', 'Booking already full!');

                //select all branch data
                $branchs = branch::whereNot('status', '=', 'close')->get();

                $services = service::find($r->serviceType);

                return view('/user/addReservation')
                    ->with('branchs', $branchs)
                    ->with('services', $services);
            } else {
                $findSameTimeSlot1 = reservation::where([['date', '=', $r->date], ['Services', '=', 'Normal wash'], ['branchId', '=', $r->branch], ['timeSlot', '=', $r->timeSlot]])
                    ->whereNot('status', '=', 'cancel')
                    ->get();

                $TimeSlotCount = $findSameTimeSlot1->count();
                if ($TimeSlotCount > 3) {
                    //if over 20 cannot booking success
                    Session::flash('Danger', 'Time already full, please change to another time!');

                    //select all branch data
                    $branchs = branch::whereNot('status', '=', 'close')->get();

                    $services = service::find($r->serviceType);

                    return view('/user/addReservation')
                        ->with('branchs', $branchs)
                        ->with('services', $services);
                } else {
                    // add new reservation to database
                    $addNewReservation = reservation::create([
                        'userId' => Auth::id(),
                        'branchId' => $r->branch,
                        'carPlate' => $r->carPlate,
                        'Services' => $serviceName,
                        'timeSlot' => $r->timeSlot,
                        'price' => $price,
                        'date' => $r->date,
                        'orderId' => '',
                        'status' => 'upcoming',
                    ]);
                    //get the reservation id
                    //can diect get addNewReservation;
                    $reservationId = DB::table('reservations')
                        ->where('userId', '=', Auth::id())
                        ->orderBy('created_at', 'DESC')
                        ->first();

                    $reservationNumber = $reservationId->id;
                    $reservationPrice = $reservationId->price;
                    //select the multiple member point and then do the calculate
                    $multipleNumber = memberPoint::find(1);
                    $totalGetMemberPoint = $reservationPrice * $multipleNumber->multiple;

                    //add new order to database
                    $addNewOrder = OrderReservation::create([
                        'reservationId' => $reservationNumber,
                        'userId' => Auth::id(),
                        'paymentStatus' => 0, //(0 no payment, 1 done payment , 2 cancel payment need to refund, 3 refund success)
                        'amount' => $reservationPrice,
                        'memberPoint' => $totalGetMemberPoint,
                        'orderPackageId' => '0',
                    ]);

                    //get the order id
                    $orderId = DB::table('order_reservations')
                        ->where('userId', '=', Auth::id())
                        ->orderBy('created_at', 'DESC')
                        ->first();

                    $orderNumber = $orderId->id;
                    //update new reservation to the order id
                    DB::update('update reservations set orderID = ? where id = ?', [$orderNumber, $reservationNumber]);

                    //get reservation data to the payement reservation
                    $reservation = DB::table('reservations')
                        ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
                        ->select('branches.name as branchName', 'reservations.*')
                        ->where('reservations.orderId', '=', $orderNumber)
                        ->get();

                    //find member point for the user
                    $userMemberPoint = userMemberPoint::where('userId', '=', Auth::id())->first();
                    $memberLevel = $userMemberPoint->memberLevel;
                    //find the discount in target member level
                    $memberLevelDiscount = memberLevel::where('memberLevel', '=', $memberLevel)->first();

                    // $users = User::with(['stateoffice','cityoffice','hometownoffice'])->get();
                    $r->session()->forget('Danger');
                    $r->session()->forget('Success');

                    return view('/user/paymentReservation', compact('reservation', 'memberLevelDiscount'));
                }
            }
            //if select other service
        } else {
            $date = $r->date; //get the date
            $branch = $r->branch; //get the branch id
            $findSameDate2 = reservation::where([['date', '=', $date], ['branchId', '=', $branch]])
                ->whereNot([['Services', '=', 'Normal wash'], ['status', '=', 'cancel']])
                ->get();
            $ServiceCount = $findSameDate2->count(); //calculate the normal wash in that time
            if ($ServiceCount > 4) {
                //if over 5 cannot booking success
                Session::flash('Danger', 'Booking already full!');

                //select all branch data
                $branchs = branch::whereNot('status', '=', 'close')->get();

                $services = service::find($r->serviceType);

                return view('/user/addReservation')
                    ->with('branchs', $branchs)
                    ->with('services', $services);
            } else {
                //change to serviceNAME because not defined variable
                $serviceNAME = $serviceName;
                // add new reservation to database
                $addNewReservation = reservation::create([
                    'userId' => Auth::id(),
                    'branchId' => $r->branch,
                    'carPlate' => $r->carPlate,
                    'Services' => $serviceNAME,
                    'timeSlot' => $r->timeSlot,
                    'price' => $price,
                    'date' => $r->date,
                    'orderId' => '',
                    'status' => 'upcoming',
                ]);

                //get the reservation id
                $reservationId = DB::table('reservations')
                    ->where('userId', '=', Auth::id())
                    ->orderBy('created_at', 'DESC')
                    ->first();

                $reservationNumber = $reservationId->id;
                $reservationPrice = $reservationId->price;
                //select the multiple member point and then do the calculate
                $multipleNumber = memberPoint::find(1);
                $totalGetMemberPoint = $reservationPrice * $multipleNumber->multiple;

                //add new order to database
                $addNewOrder = OrderReservation::create([
                    'reservationId' => $reservationNumber,
                    'userId' => Auth::id(),
                    'paymentStatus' => 0, //(0 no payment, 1 done payment , 2 cancel payment need to refund)
                    'amount' => $reservationPrice,
                    'memberPoint' => $totalGetMemberPoint,
                    'orderPackageId' => '0',
                ]);

                //get the order id
                $orderId = DB::table('order_reservations')
                    ->where('userId', '=', Auth::id())
                    ->orderBy('created_at', 'DESC')
                    ->first();

                $orderNumber = $orderId->id;

                //get the reservation id
                $reservationId2 = DB::table('reservations')
                    ->where('userId', '=', Auth::id())
                    ->orderBy('created_at', 'DESC')
                    ->first();
                $reservationNumber1 = $reservationId2->id;
                //update new reservation to the order id
                DB::update('update reservations set orderID = ? where id = ?', [$orderNumber, $reservationNumber1]);

                //get reservation data to the payement reservation
                $reservation = DB::table('reservations')
                    ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
                    ->select('branches.name as branchName', 'reservations.*')
                    ->where('reservations.orderId', '=', $orderNumber)
                    ->get();
                //find member point for the user
                $userMemberPoint = userMemberPoint::where('userId', '=', Auth::id())->first();
                $memberLevel = $userMemberPoint->memberLevel;
                //find the discount in target member level
                $memberLevelDiscount = memberLevel::where('memberLevel', '=', $memberLevel)->first();

                $r->session()->forget('Danger');
                $r->session()->forget('Success');

                return view('/user/paymentReservation', compact('reservation', 'memberLevelDiscount'));
            }
        }
    }

    //view all reservation depend the user id
    public function viewMyReservation()
    {
        $checkReservationStatus = reservation::where('userId', Auth::id())
            ->whereNot('status', 'cancel')
            ->get();
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
        //call calMemberLevelAndMemberPoint to get the new member level
        (new rewardController())->calMemberLevelAndMemberPoint();

        $allReservation = DB::table('order_reservations')
            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('order_reservations.id as orderId', 'order_reservations.amount as totalAmount', 'reservations.*', 'order_reservations.paymentStatus as paymentStatus', 'branches.name as branchName')
            ->where('order_reservations.userId', '=', Auth::id())
            ->get();
        return view('/user/myReservation')->with('allReservation', $allReservation);
    }

    //display the edit reservation depend the reservation id
    public function editReservation($id)
    {
        $reservation = reservation::all()
            ->where('id', $id)
            ->first();

        $currentDate = Carbon::now(); //plus is ->addDays() minus is ->subDays()

        $reservationDate = Carbon::parse($reservation->date);

        $checkDate = $reservationDate->subDays(7); //plus is ->addDays() minus is ->subDays()

        $difference = $currentDate->diffInDays($checkDate);

        if ($checkDate < $currentDate) {
            echo 'true';
            Session::flash('Danger', 'You only can edit the reservation 7 days before the reservation date!!');
            return redirect()->route('viewMyReservation');
        } else {
            $reservation = reservation::all()->where('id', $id);
            //get branch from the database
            $branchs = branch::whereNot('status', '=', 'close')->get();

            return view('/user/editReservation')
                ->with('reservation', $reservation)
                ->with('branchs', $branchs);
        }
    }

    //update reservation to the database
    public function updateReservation()
    {
        //if select normal wash
        $r = request();
        $carService = $r->serviceName;

        if ($carService == 'Normal wash') {
            $date = $r->date; //get the date
            $branch = $r->branch; //get the branch id
            $findSameDate1 = reservation::where([['date', '=', $date], ['Services', '=', 'Normal wash'], ['branchId', '=', $branch]])
                ->whereNot('status', '=', 'cancel')
                ->get();
            //echo $ServiceCount;
            $ServiceCount = $findSameDate1->count(); //calculate the normal wash in that time
            if ($ServiceCount > 19) {
                //if over 20 cannot booking success
                Session::flash('Danger', 'Booking already full!');
                //back to edit reservsation page
                $id = $r->reservationId;
                $reservation = reservation::all()->where('id', $id);

                //get branch from the database
                $branchs = branch::whereNot('status', '=', 'close')->get();

                return view('/user/editReservation')
                    ->with('reservation', $reservation)
                    ->with('branchs', $branchs);
            } else {
                $findSameTimeSlot1 = reservation::where([['date', '=', $r->date], ['Services', '=', 'Normal wash'], ['branchId', '=', $r->branch], ['timeSlot', '=', $r->timeSlot]])
                    ->whereNot('status', '=', 'cancel')
                    ->get();

                $TimeSlotCount = $findSameTimeSlot1->count();
                if ($TimeSlotCount > 3) {
                    //if over 4 for the timeslot cannot booking success
                Session::flash('Danger', 'Time already full, please change to another time!');
                //back to edit reservsation page
                $id = $r->reservationId;
                $reservation = reservation::all()->where('id', $id);

                //get branch from the database
                $branchs = branch::whereNot('status', '=', 'close')->get();

                return view('/user/editReservation')
                    ->with('reservation', $reservation)
                    ->with('branchs', $branchs);

                } else {
                      // update exist reservation to database
                      $reservation = reservation::find($r->reservationId);

                      $reservation->carPlate = $r->carPlate;
                      $reservation->date = $r->date;
                      $reservation->timeSlot = $r->timeSlot;
                      $reservation->branchId = $r->branch;
                      $reservation->save();

                      Session::flash('UpdateReservationSuccess', 'Upadate reservation successful!');
                      return redirect()->route('viewMyReservation');
                }
            }
        } else {
            $date = $r->date; //get the date
            $branch = $r->branch; //get the branch id
            $findSameDate2 = reservation::where([['date', '=', $date], ['branchId', '=', $branch]])
                ->whereNot([['Services', '=', 'Normal wash'], ['status', '=', 'cancel']])
                ->get();
            $ServiceCount = $findSameDate2->count(); //calculate the normal wash in that time
            //echo $ServiceCount;
            if ($ServiceCount > 4) {
                //if over 5 cannot booking success
                Session::flash('Danger', 'Booking already full!');
                                //back to edit reservsation page

                $id = $r->reservationId;
                $reservation = reservation::all()->where('id', $id);

                //get branch from the database
                $branchs = branch::whereNot('status', '=', 'close')->get();

                return view('/user/editReservation')
                    ->with('reservation', $reservation)
                    ->with('branchs', $branchs);

                return view('/user/editReservation')->with('reservation', $reservation);
            } else {
                // update exist reservation to database
                $reservation = reservation::find($r->reservationId);

                $reservation->carPlate = $r->carPlate;
                $reservation->date = $r->date;
                $reservation->timeSlot = $r->timeSlot;
                $reservation->branchId = $r->branch;
                $reservation->save();

                Session::flash('UpdateReservationSuccess', 'Upadate reservation successful!');
                return redirect()->route('viewMyReservation');
            }
        }
    }
    //cancel the reservation
    public function cancelReservation($id)
    {
        $reservation = reservation::all()
            ->where('id', $id)
            ->first();

        $currentDate = Carbon::now(); //plus is ->addDays() minus is ->subDays()

        $reservationDate = Carbon::parse($reservation->date);

        $checkDate = $reservationDate->subDays(7); //plus is ->addDays() minus is ->subDays()

        $difference = $currentDate->diffInDays($checkDate);

        if ($checkDate < $currentDate) {
            echo 'true';
            Session::flash('Danger', 'You only can cancel the reservation 7 days before the reservation date!!');
            return redirect()->route('viewMyReservation');
        } else {
            $findOrderReservation = OrderReservation::where('reservationId', $id)->first();
            if ($findOrderReservation->paymentStatus == 1) {
                //update reservation to cancel
                $reservation = reservation::find($id);
                $reservation->status = 'cancel';
                $reservation->save();

                Session::flash('Success', 'Cancel Successful, Respond to requests within seven days.');

                //update payment status to 2 (0 no payment, 1 done payment , 2 cancel payment need to refund, 3 done refund)
                DB::update('update order_reservations set paymentStatus = ? where reservationId = ?', [2, $id]);

                return redirect()->route('viewMyReservation');
            } else {
                //update reservation to cancel
                $reservation = reservation::find($id);
                $reservation->status = 'cancelByPackage';
                $reservation->save();

                Session::flash('Success', 'Cancel Successful, Respond to requests within seven days.');

                //update payment status to 2 (0 no payment, 1 done payment , 2 cancel payment need to refund 3 done refund )
                DB::update('update order_reservations set paymentStatus = ? where reservationId = ?', [5, $id]);

                return redirect()->route('viewMyReservation');
            }
        }
    }

    //no done the payment ,want to pay one more
    public function repayment($orderId)
    {
        $reservation = DB::table('reservations')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('branches.name as branchName', 'reservations.*')
            ->where('reservations.orderId', '=', $orderId)
            ->get();

        $userMemberPoint = userMemberPoint::where('userId', '=', Auth::id())->first();
        $memberLevel = $userMemberPoint->memberLevel;

        $memberLevelDiscount = memberLevel::where('memberLevel', '=', $memberLevel)->first();

        return view('/user/paymentReservation', compact('reservation', 'memberLevelDiscount'));

        //->with('reservation', $reservation)->with('memberLevelDiscount', $memberLevelDiscount);
    }

    public function addNewReservation_package()
    {
        $r = request();
        $carService = $r->serviceType;
        //depend service number separate the service type name
        $serviceInformation = service::find($r->serviceType);

        $serviceName = $serviceInformation->name;
        $price = $serviceInformation->price;

        //if select normal wash
        if ($carService == '1') {
            $date = $r->date; //get the date
            $branch = $r->branch; //get the branch id
            $findSameDate1 = reservation::where([['date', '=', $date], ['Services', '=', 'Normal wash'], ['branchId', '=', $branch]])
                ->whereNot('status', '=', 'cancel')
                ->get();
            //echo $ServiceCount;
            $ServiceCount = $findSameDate1->count(); //calculate the normal wash in that time

            if ($ServiceCount > 19) {
                //if over 20 cannot booking success
                Session::flash('Danger', 'Booking already full!');

                return redirect()->route('viewAddReservation_package', ['id'=>$r->orderPackageId]);

            } else {
                $findSameTimeSlot1 = reservation::where([['date', '=', $r->date], ['Services', '=', 'Normal wash'], ['branchId', '=', $r->branch], ['timeSlot', '=', $r->timeSlot]])
                    ->whereNot('status', '=', 'cancel')
                    ->get();

                $TimeSlotCount = $findSameTimeSlot1->count();
                if ($TimeSlotCount > 3) {
                    //if over 20 cannot booking success
                    Session::flash('Danger', 'Time already full, please change to another time!');

                    return redirect()->route('viewAddReservation_package', ['id'=>$r->orderPackageId]);
                } else {
                    // add new reservation to database
                    $addNewReservation = reservation::create([
                        'userId' => Auth::id(),
                        'branchId' => $r->branch,
                        'carPlate' => $r->carPlate,
                        'Services' => $serviceName,
                        'timeSlot' => $r->timeSlot,
                        'price' => $price,
                        'date' => $r->date,
                        'orderId' => '',
                        'status' => 'upcoming',
                    ]);
                    //get the reservation id
                    $reservationId = DB::table('reservations')
                        ->where('userId', '=', Auth::id())
                        ->orderBy('created_at', 'DESC')
                        ->first();

                    $reservationNumber = $reservationId->id;
                    $reservationPrice = $reservationId->price;
                    //select the multiple member point and then do the calculate
                    $multipleNumber = memberPoint::find(1);
                    $totalGetMemberPoint = $reservationPrice * $multipleNumber->multiple;

                    //add new order to database
                    $addNewOrder = OrderReservation::create([
                        'reservationId' => $reservationNumber,
                        'userId' => Auth::id(),
                        'paymentStatus' => 4, //(0 no payment, 1 done payment , 2 cancel payment need to refund, 3 refund success 4 is package order reservation)
                        'amount' => $reservationPrice,
                        'memberPoint' => $totalGetMemberPoint,
                        'orderPackageId' => $r->orderPackageId,
                    ]);

                    //get the order id
                    $orderId = DB::table('order_reservations')
                        ->where('userId', '=', Auth::id())
                        ->orderBy('created_at', 'DESC')
                        ->first();

                    $orderNumber = $orderId->id;
                    //update new reservation to the order id
                    DB::update('update reservations set orderID = ? where id = ?', [$orderNumber, $reservationNumber]);

                    //<---calculate the member point--->
                    //price change to memberpoint
                    $memberpoint = $reservationPrice;
                    //get the multiple value in database
                    $multipleNumber = memberPoint::find(1);
                    //calculate the total member point
                    $totalGetMemberPoint = $memberpoint * $multipleNumber->multiple;

                    //find the usermemberpoitn information
                    $userMemberPoint = userMemberPoint::where('userId', Auth::id())->first();

                    //$totalMemberPoint = userMemberPoint::select('totalPoint')->where('userId','=',)->first();
                    //total member point plus this payment total get member point
                    $plusTotalMemberPoint = $userMemberPoint->totalPoint + $totalGetMemberPoint;
                    //current member point plus this payment total get member point
                    $plusCurrentMemberpoint = $userMemberPoint->currentPoint + $totalGetMemberPoint;

                    //update to the database new member point
                    $userMemberPoint->totalPoint = $plusTotalMemberPoint;
                    $userMemberPoint->currentPoint = $plusCurrentMemberpoint;
                    $userMemberPoint->save();
                    //<---calculate the member point end--->

                    //<--minus the package wash times-->
                    //get the user order package id
                    $orderPackageId = $r->orderPackageId;

                    $userOrderPackage = userPackageSubscription::where('id', $orderPackageId)->first();

                    $MinusWashTimes = $userOrderPackage->times - 1;

                    $userOrderPackage->times = $MinusWashTimes;
                    $userOrderPackage->save();

                    Session::flash('Success', 'Order Reservation By Package Successful!');

                    //<--minus the package wash times end-->
                    return redirect()->route('viewMyReservation');
                }
            }
            //if select other service
        }
    }

    public function printInvoice($id)
    {
        $reservationItem = DB::table('order_reservations')

            ->leftjoin('reservations', 'reservations.id', '=', 'order_reservations.reservationId')
            ->leftjoin('branches', 'branches.id', '=', 'reservations.branchId')
            ->select('reservations.*', 'order_reservations.amount as totalAmount', 'branches.name as branchName', 'branches.address as branchAddress')

            ->where('order_reservations.reservationId', '=', $id) //the item haven't make payment

            ->where('order_reservations.userID', '=', Auth::id())

            ->get();

        $totalAmount = DB::table('order_reservations')
            ->where('reservationId', '=', $id)
            ->first();
        $totalPrice = $totalAmount->amount;

        $price = DB::table('reservations')
            ->where('id', '=', $id)
            ->first();

        $reservationPrice = $price->price;
        $totalDiscount = $reservationPrice - $totalPrice;
        //return reservation table data and carts table data to the invoicePDF.blade.php
        $pdf = PDF::loadView('user/invoicePDF', compact('reservationItem', 'totalDiscount'));
        //dowload the pdf file
        return $pdf->download('ReservationInvoice_report.pdf');
    }
}
