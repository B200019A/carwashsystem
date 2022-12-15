<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\memberLevel;
use session;
use Auth;
use Carbon\Carbon;
use DateTime;

class memberLevelController extends Controller
{
    //add member level
    public function addMemberLevel()
    {
        $r = request();

        $addMemberLevel = memberLevel::create([
            'memberLevel' => $r->memberLevelName,
            'targetPoint' => $r->targetPoint,
            'discount' => $r->dicount,
        ]);
        return redirect()->route('viewMembershipManagement');
    }
    //update member level
    public function updateMemberLevel()
    {
        $r = request();

        $updateMemberLevel = memberLevel::find($r->memberLevelId);

        $updateMemberLevel->memberLevel = $r->memberLevelName;
        $updateMemberLevel->targetPoint = $r->targetPoint;
        $updateMemberLevel->discount = $r->dicount;
        $updateMemberLevel->save();

        return redirect()->route('viewMembershipManagement');
    }

    //delete member level
    public function deleteMemberLevel($id)
    {
        $deleteMemberLevel = memberLevel::find($id);

        $deleteMemberLevel->delete();

        return redirect()->route('viewMembershipManagement');
    }
}
