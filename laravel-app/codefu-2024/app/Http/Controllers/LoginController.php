<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginpage()
    {
        return view('login');
    }

    public function authenticate(Request $request){

    
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); 
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('homepage')->with('success', 'You have successfully logged in!');
    }else {
        return redirect()->back()->withErrors([
            'email' => 'User not found',
        ]);
    }

    }
}
