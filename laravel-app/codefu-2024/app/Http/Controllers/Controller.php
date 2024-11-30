<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){

        $user = Auth::user();
        $avatar = $user->avatar;

        $avatar->load(['items' => function ($query) {
            $query->where('category_id', 1)->where('active', true);
        }]);
        
        $hat = $avatar->items;

        return view('home', compact('hat'));
    }
}
