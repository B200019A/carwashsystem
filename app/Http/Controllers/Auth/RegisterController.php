<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\usertype;
use App\Models\userMemberPoint;
use App\Http\Controllers\AuthBackEnd\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\inviteCode;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer', 'max:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //get the role number
        $role = $data['role'];
        //user can generate the invitecode only , admin and head admin cannot
        if ($role == 0) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => $data['role'],
                'google_id'=> 'null',
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

            return $user;
        }
        //register admin account
        else {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => $data['role'],
                'google_id'=> 'null',
            ]);

            return $user;
        }
    }
}
