<?php

namespace App\Http\Controllers\headadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\branch;
use Auth;

class branchController extends Controller
{
    //add branch 
    public function addBranch()
    {
        $r = request();

        $addBranch = branch::create([
            'name' => $r->branchName,
            'address' => $r->branchAddress,
            'description' => $r->branchDescription,
            'status' => 'exist',
        ]);
        return redirect()->route('viewBranchManagement');
    }
    //update branch
    public function updateBranch(){

        $r=request();

        $editBranch=branch::find($r->branchId);
    
        $editBranch->name=$r->branchName;
        $editBranch->address=$r->branchAddress;
        $editBranch->description=$r->branchDescription;
        $editBranch->save();

        return redirect()->route('viewBranchManagement');
    }

    //deactivate the Branch
    public function deactivateBranch($id){
        $deactivateBranch=branch::find($id);

        $deactivateBranch->status = 'close';
        $deactivateBranch->save();

        return redirect()->route('viewBranchManagement');
    }
    //reactivate the Branch
    public function reactivateBranch($id){
        $reactivateBranch=branch::find($id);

        $reactivateBranch->status = 'exist';
        $reactivateBranch->save();

        return redirect()->route('viewBranchManagement');
    }
}
