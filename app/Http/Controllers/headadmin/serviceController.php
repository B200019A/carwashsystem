<?php

namespace App\Http\Controllers\headadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\service;

class serviceController extends Controller
{
    //add new service to database
    public function addService()
    {
        $r = request();

        //if image no exist will be add
        if ($r->file('seviceImage') != '') {
            $image = $r->file('seviceImage');
            $image->move('images/service', $image->getClientOriginalName()); //images is the location
            $imageName = $image->getClientOriginalName();
        }
        $addService = service::create([
            'name' => $r->serviceName,
            'price' => $r->servicePrice,
            'description' => $r->serviceDescription,
            'image' => $imageName,
        ]);

        return redirect()->route('viewServiceManagement');
    }
    //update service to database
    public function updateService()
    {
        $r = request();
        //if image no exist will be add
        if ($r->file('seviceImage') != '') {
            $image = $r->file('seviceImage');
            $image->move('images/service', $image->getClientOriginalName()); //images is the location
            $imageName = $image->getClientOriginalName();
        }

        $editService = service::find($r->serviceId);

        $editService->name = $r->serviceName;
        $editService->price = $r->servicePrice;
        $editService->description = $r->serviceDescription;
        $editService->image = $imageName;
        $editService->save();

        return redirect()->route('viewServiceManagement');
    }

    //delete service from database
    public function deleteService($id)
    {
        $deleteService = service::find($id);

        $deleteService->delete();

        return redirect()->route('viewServiceManagement');
    }
}
