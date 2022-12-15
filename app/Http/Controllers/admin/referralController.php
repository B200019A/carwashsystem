<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\referral;
use DB;

class referralController extends Controller
{
    public function updateReferral(){

        $r=request();

        $updatewReferral=referral::find($r->referralId);
    
        $updatewReferral->times=$r->referralTimes;
        $updatewReferral->save();

        return redirect()->route('viewReferralManagement');

    }
}
