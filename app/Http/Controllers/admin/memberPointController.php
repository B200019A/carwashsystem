<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\memberPoint;
use DB;

class memberPointController extends Controller
{
    //update memberpoint
    public function updateMemberPoint(){

        $r=request();

        $updateMemberPoint=memberPoint::find($r->memberPointId);
    
        $updateMemberPoint->multiple=$r->memberPointMultiple;
        $updateMemberPoint->save();

        return redirect()->route('viewMemberPointManagement');

    }
}
