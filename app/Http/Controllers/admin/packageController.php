<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\packageSubscription;
use DB;


class packageController extends Controller
{
    public function addPackageSubscription(){

        $r = request();

        $addPackageSubscription = packageSubscription::create([
            'name' => $r->packageName,
            'description' => $r->packageDescription,
            'washTimes' => $r->packageFreeWashTimes,
            'price' => $r->packagePrice,
        ]);
        return redirect()->route('viewPackageSubscriptionManagement');
    }
     //update member level
     public function updatePackageSubscription()
     {
         $r = request();
 
         $updatePackageSubscription = packageSubscription::find($r->packageId);
 
         $updatePackageSubscription->name = $r->packageName;
         $updatePackageSubscription->description = $r->packageDescription;
         $updatePackageSubscription->washTimes = $r->packageFreeWashTimes;
         $updatePackageSubscription->price = $r->packagePrice;
         $updatePackageSubscription->save();
 
         return redirect()->route('viewPackageSubscriptionManagement');
     }
 
     //delete member level
     public function deletePackageSubscription($id)
     {
         $deletePackageSubscription = packageSubscription::find($id);
 
         $deletePackageSubscription->delete();
 
         return redirect()->route('viewPackageSubscriptionManagement');
     }
}
