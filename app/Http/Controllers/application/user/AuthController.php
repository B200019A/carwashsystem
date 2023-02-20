<?php

namespace App\Http\Controllers\application\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        //valdiate
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:6'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //create new user in users table
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        //if is user need genrate the invite code
        do {
            //generate a random string using Laravel's str_random helper
            $inviteCode = Str::random(6); //check if the token already exists and if it does, try again
        } while (inviteCode::where('invitecode', $inviteCode)->first());

        $createInviteCode = inviteCode::create([
            'memberId' => $user->id,
            'invitecode' => $inviteCode,
            'freewash' => '0.00',
        ]);
        $userId = $user->id;
        $createMemberPoint = userMemberPoint::create([
            'totalPoint' => 0,
            'currentPoint' => 0,
            'memberLevel' => 'new',
            'userId' => $userId,
        ]);

        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];
        return response()->json($response, 200);
    }

    public function login(Request $req)
    {
        // validate inputs
        $rules = [
            'email' => 'required',
            'password' => 'required|string'
        ];
       // $req->validate($rules);
        // find user email in users table
        $user = User::where('email',$req->email)->first();
        //$req->email
        //$req->password
        // if user email found and password is correct
        if ($user && Hash::check($req->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;

            $response = ['user' => $user, 'token' => $token];
            return response()->json($response, 200);
        }
        $response = ['message' => 'Incorrect email or password'];
        return response()->json($response, 400);
    }
    public function logout(Request $req){
        auth()->user()->tokens()->delete();

        return[
            'message' => 'Logout'
        ];

    }
}
