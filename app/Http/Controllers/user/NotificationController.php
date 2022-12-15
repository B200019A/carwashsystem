<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\Models\notification;

class NotificationController extends Controller
{
    public function notification(){

        $notifications = notification::all();

        return view('/user/notification')->with('notifications',$notifications);
    }
}
