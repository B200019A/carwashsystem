<?php

namespace App\Http\Controllers\application\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\notification;

class NotificationController extends Controller
{
    public function notification(){

        $notifications = notification::all();

        return response()->json($notifications, 200);
    }
}
