<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Add this line
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // Validate input data
        $validated = Validator::make($request->all(), [
            'fullname' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|', 
            'health_status' => 'required|string',
            'birthdate' => 'required|date',
        ]);

        // Check if validation failed
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        try {
            // Create new user (adjust based on your User model)
            $user = new User();
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->health_status = $request->health_status;
            $user->birthdate = $request->birthdate;
            $user->save();

            Auth::login($user);

            // Return success response
            return response()->json(['message' => 'User registered successfully!'], 201);
        } catch (\Exception $e) {
            // Log the exception and return error response
            Log::error('Registration failed: ' . $e->getMessage());
            return response()->json(['error' => 'Registration failed, please try again later.'], 500);
        }
    }
}
