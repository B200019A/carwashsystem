<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Auth;
use DB;
use Illuminate\Support\Str;
use App\Models\inviteCode;
use App\Models\userMemberPoint;

class googleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('/login');
        }
        //check if have existing user
        $finduser = User::where('google_id', $user->id)->first();
        //if have user can login
        if ($finduser) {
            Auth::login($finduser);

            return redirect()->to('/home');
        } else {
            //if no, need to check no using google login email exist or not
            $gmail = $user->email;
            $findGmail = User::where('email', $gmail)->first();
            if ($findGmail) {

                $findGmail->google_id = $user->id;
                $findGmail->save();

                Auth::login($findGmail);

                //if not , register the account have google id
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => 0,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy'),
                ]);
                $findUserId = User::where('google_id', $user->id)->first();

                $userId = $findUserId->id;
                //if is user need genrate the invite code
                do {
                    //generate a random string using Laravel's str_random helper
                    $inviteCode = Str::random(6); //check if the token already exists and if it does, try again
                } while (inviteCode::where('invitecode', $inviteCode)->first());

                $createInviteCode = inviteCode::create([
                    'memberId' => $userId,
                    'invitecode' => $inviteCode,
                    'freewash' => '0.00',
                ]);

                $createMemberPoint = userMemberPoint::create([
                    'totalPoint' => 0,
                    'currentPoint' => 0,
                    'memberLevel' => 'new',
                    'userId' => $userId,
                ]);
                Auth::login($newUser);
            }

            return redirect()->to('/home');
        }
    }
}
