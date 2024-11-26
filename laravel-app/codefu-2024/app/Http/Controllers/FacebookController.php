<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Exception;

class FacebookController extends Controller
{
    public function facebookpage(){
        return socialite::driver('facebook')->redirect();
    }

    public function facebookcallback(){
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('email', $user->email)->first();
    
            if($finduser){
                // Check if the Facebook ID is already linked
                if ($finduser->facebook_id == null) {
                    $finduser->facebook_id = $user->id;
                    $finduser->save();
                }
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
    