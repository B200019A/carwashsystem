<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class profileController extends Controller
{
    public function myProfile(){
        return view('/user/myProfile');
    }
}
