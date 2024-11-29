<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Add this line
use App\Models\User;
use App\Models\Avatar;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function store(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'fullname' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed', // 'confirmed' checks for password_confirmation
            'health_status' => 'required|string',
            'birthdate' => 'required|date',
            'avatarName' => 'required|string|min:2|max:255|unique:avatars,username',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        try {
            $user = new User();
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->health_status = $request->health_status;
            $user->birthdate = $request->birthdate;
            $user->save();

            $avatar = new Avatar();
            $avatar->user_id = $user->id;
            $avatar->username = $request->avatarName; 
            $avatar->save();

            Auth::login($user);

            return response()->json(['message' => 'User registered successfully!'], 201);
        } catch (\Exception $e) {
            \Log::error('Registration failed: ' . $e->getMessage());
            return response()->json(['error' => 'Registration failed, please try again later.'], 500);
        }
    }
}
