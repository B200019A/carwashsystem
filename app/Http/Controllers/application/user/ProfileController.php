<?php

namespace App\Http\Controllers\application\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Session;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function myProfile()
    {
        $user = Auth::user();

        return response()->json($user, 200);
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

        $response = ['message' => 'Your Account Information Update Successful!'];
        return response()->json($response, 200);
    }
    public function updatePassword(Request $request)
    {
        #Match The Old Password
        if (Hash::check($request->old_password, auth()->user()->password)) {
            if ($request->new_password == $request->new_password_confirmation) {
                #Update the new Password
                User::whereId(auth()->user()->id)->update([
                    'password' => Hash::make($request->new_password),
                ]);

                $response = ['message' => 'Change password successfully!'];
                return response()->json($response, 200);
            } else {
                # Validation
                $response = ['message' => 'The new password confirmation does not match.'];
                return response()->json($response, 400);
            }
        } else {
            $response = ['message' => 'Old Password Not match!'];
            return response()->json($response, 400);
        }
    }
}
