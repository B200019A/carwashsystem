<?php

namespace App\Http\Controllers\application\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\branch;

class BranchController extends Controller
{
    public function branch()
    {
        $branches = branch::all();

        return response()->json($branches, 200);
    }
}
