<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'health_status' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = auth()->user();

        $user->fullname = $validator->validated()['fullname'];
        $user->health_status = $validator->validated()['health_status'];
        $user->email = $validator->validated()['email'];

        if ($validator->validated()['password']) {
            $user->password = Hash::make($validator->validated()['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }   

}
