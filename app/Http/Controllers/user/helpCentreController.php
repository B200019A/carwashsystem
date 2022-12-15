<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class helpCentreController extends Controller
{
    public function helpCentre(){
        return view('/user/helpCentre');
    }
}
