<?php

namespace App\Http\Controllers\application\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\inviteCode;
use App\Models\referral;
use Auth;


class ReferralController extends Controller
{
    public function referral(){
        $invitecode = DB::table('invite_codes')->where('memberId',Auth::id())->get();

        $response = ['invitecodes' => $invitecode];

        return response()->json($response, 200);

    }

    public function addInviteCode(){
        $r=request();

        $searchTimes = inviteCode::where('memberId','=',Auth::id())->where('times','=',0)->first();
        $searchInviteCodeUser = inviteCode::where('memberId','=',Auth::id())->first();
        //when times equal 0 , u cannot input invite code again!

        if($searchTimes){

            $response = ['message' => 'You already input invite code!(one times only)'];
            return response()->json($response, 400);

        }else{
            if($searchInviteCodeUser->invitecode==$r->inviteCode){

                $response = ['message' => 'You cannot input your own invite code!'];
                return response()->json($response, 400);

            }else{
                $inviteCodeInput = $r->inviteCode;
                $searchInviteCode = inviteCode::where('invitecode',$inviteCodeInput)->first();
                //check invite code whether exist
            if($searchInviteCode){

                $freeTimes= referral::find(1);

                $times = $freeTimes->times;
                //$freewash=1;

                //********find the column data in invite code table *****/
                $inviteCodeSender = inviteCode::where('invitecode',$r->inviteCode);
                //select the freewash frequency
                $freeWashFrequencySender = inviteCode::select('freewash')->where('invitecode','=',$r->inviteCode)->first();
                //set data of freewash plus one
                $plusFreeWashFrequencySender = $freeWashFrequencySender->freewash+$times;
                $inviteCodeSender->update(['freewash'=> $plusFreeWashFrequencySender]);

                //sender of invite code also get 1 free wash
                //add 1 free wash to input user and sender of invite code also get 1 free wash
                $addFreeWashReceiver = inviteCode::where('memberId',Auth::id());
                //set times to 0
                $addFreeWashReceiver->update(['times'=> 0]);
                //select the freewash frequency
                $freeWashFrequencyReceiver = inviteCode::select('freewash')->where('memberId','=',Auth::id())->first();
                //set data of freewash plus one
                $plusFreeWashFrequencyReceiver = $freeWashFrequencyReceiver->freewash+$times;
                $addFreeWashReceiver->update(['freewash'=> $plusFreeWashFrequencyReceiver]);

                $response = ['message' => 'Successful Redeem Invitation Code'];
                return response()->json($response, 200);

             }else{

                $response = ['message' => 'You input invite code does not exist!'];
                return response()->json($response, 400);
             }
            }

        }



    }
}
