<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\user\rewardController;
use DB;
use Session;
use App\Models\reservation;
use App\Models\OrderReservation;
use App\Models\userMemberPoint;
use App\Models\memberPoint;
use Auth;
use Stripe;

class PaymentController extends Controller
{
    public function paymentReservation(Request $request)
    {
        $reservationId = $request->id;
        $OrderReservation = OrderReservation::where('reservationId', '=', $reservationId)->first();

        $checkPaymentStatus = $OrderReservation->paymentStatus;

        if ($checkPaymentStatus == 0) {
            if($request->totalAmount<=0){
                Session::flash('Danger', 'Please Retry The Payment!!');
                return redirect()->route('viewMyReservation');
            }else{
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create([
                'amount' => $request->totalAmount * 100, //RM10=10CEN 10*100=1000CEN
                'currency' => 'MYR',
                'source' => $request->stripeToken,
                'description' => 'This payment is reservation purpose of car wash system',
            ]);
            $totalAmount = $request->totalAmount;
            $id = $request->id;
            DB::update('update order_reservations set paymentStatus = ?,amount = ? where reservationId = ?', [1,$totalAmount,$id]);

            //<---calculate the member point--->
            //price change to memberpoint
            $memberpoint = $request->price;
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
            //call calMemberLevelAndMemberPoint to get the new member level
            (new rewardController)->calMemberLevelAndMemberPoint();

            Session::flash('Success', 'Payment Successful!');

            return redirect()->route('viewMyReservation');
            }

        } else {
            Session::flash('Danger', 'You already payment!!');
            return redirect()->route('viewMyReservation');
        }
    }
}
