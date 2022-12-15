<?php

namespace App\Http\Controllers\headadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\user;
 
class userController extends Controller
{
    public function deactivateUser($id){

        $deactivateUser=User::find($id);
        $deactivateUser->role=3;
        $deactivateUser->save();

        return redirect()->route('viewCustomerAccountManagement');
    }

    public function reactivateUser($id){

        $deactivateUser=User::find($id);
        $deactivateUser->role=0;
        $deactivateUser->save();

        return redirect()->route('viewCustomerAccountManagement');
    }
}
