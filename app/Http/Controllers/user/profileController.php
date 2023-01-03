<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Session;
use Auth;
use Hash;
class profileController extends Controller
{
    public function myProfile()
    {
        return view('/user/myProfile');
    }
    public function editProfile()
    {
        return view('/user/editProfile');
    }
    public function changePassword()
    {
        return view('/user/changePassword');
    }
    public function profileUpdate(Request $request)
    {
        //validation rules

        $request->validate([
            'name' => 'required|min:4|string|max:255',
            'email' => 'required|email|string|max:255',
        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        Session::flash('Success', 'Your Account Information Update !');

        return view('/user/myProfile');
    }
    public function updatePassword(Request $request)
    {
        #Match The Old Password
        if (Hash::check($request->old_password, auth()->user()->password)) {
            echo $request->new_password;
            echo $request->new_password_confirmation;
            if ($request->new_password == $request->new_password_confirmation) {
                #Update the new Password
                User::whereId(auth()->user()->id)->update([
                    'password' => Hash::make($request->new_password),
                ]);

                Session::flash('Success', 'Password changed successfully!');
                return redirect()->route('changePassword');
            } else {
                # Validation
                $request->validate([
                    'old_password' => 'required',
                    'new_password' => 'required|confirmed',
                ]);
                return redirect()->route('changePassword');
            }
        } else {
            Session::flash('Danger', 'Old Password Not match!');
            return view('/user/changePassword');
            return redirect()->route('changePassword');
        }
    }
}
