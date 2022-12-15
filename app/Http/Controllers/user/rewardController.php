<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;
use App\Models\memberPoint;
use App\Models\memberLevel;
use App\Models\userMemberPoint;
use App\Models\reservation;

class rewardController extends Controller
{
    public function reward()
    {
        return view('/user/reward');
    }

    //go to membership page
    public function membership()
    {
       
        $this->calMemberLevelAndMemberPoint();
        $userMemberPoints = userMemberPoint::where('userId', Auth::id())->get();        
        return view('/user/membership')->with('userMemberPoints',$userMemberPoints);
    }
    public function calMemberLevelAndMemberPoint(){

   
        $userTotalMemberPoint = userMemberPoint::where('userId', Auth::id())->first();
        $totalMemberPoint= $userTotalMemberPoint->totalPoint;
        
        //small unti big to check the target point leve;l
        $memberLevels = DB::table('member_levels')->orderBy('targetPoint','asc')->get();
        $MemberLevelName="new";
        //check the member point reahced which member level
        foreach($memberLevels as $memberLevel){
            $targetPoint = $memberLevel->targetPoint;
            if($totalMemberPoint>=$targetPoint){
                $MemberLevelName = $memberLevel->memberLevel;
            }
        }
        
        //update total memberpoint ,curret memberpoint 
        $userMemberPoint = userMemberPoint::where('userId', Auth::id())->first();
        $userMemberPoint->memberLevel = $MemberLevelName;
        $userMemberPoint->save();
    }
}
