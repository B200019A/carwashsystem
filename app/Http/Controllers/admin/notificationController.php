<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\notification;
use session;
use Auth;
use Carbon\Carbon;
use DateTime;

class notificationController extends Controller
{   
    //add notification
    public function addNotification(){

            $r = request();
    
            $addNotification = notification::create([
                'title' => $r->notificationTitle,
                'description' => $r->notificationDescription,
            ]);
            return redirect()->route('viewNotificationManagement');
        

    }
    //update notification
    public function updateNotification(){

        $r=request();

        $updatewNotification=notification::find($r->notificationId);
    
        $updatewNotification->title=$r->notificationTitle;
        $updatewNotification->description=$r->notificationDescription;
        $updatewNotification->save();

        return redirect()->route('viewNotificationManagement');
    }

    //delete notification
    public function deleteNotification($id)
    {
        $deleteNotification = notification::find($id);

        $deleteNotification->delete();

        return redirect()->route('viewNotificationManagement');
    }
}
