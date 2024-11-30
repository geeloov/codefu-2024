<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;



class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {

        $user = Auth::user();
        $avatar = $user->avatar;

        $avatar->load(['items' => function ($query) {
            $query->where('category_id', 1)->where('active', true);
        }]);

        $hat = $avatar->items;

        return view('home', compact('hat'));
    }

    public function homeFinish()
    {
        $user = Auth::user();
        $avatar = $user->avatar;

        $avatar->load(['items' => function ($query) {
            $query->where('category_id', 1)->where('active', true);
        }]);

        $hat = $avatar->items;

        $task = new Task();
        $task->name = 'Take a pic';
        $task->points = 3;
        $task->negative_points = 0;
        $task->available = false;
        $task->requirements = json_encode(['mask' => 'wear it']);
        $task->type_id = 3;
        $task->user_id = Auth::user()->id;
        $task->completed = true;
        $task->dueDate = now();
        $task->save();

        $user = auth()->user();
        $user->points += $task->points;
        $user->save();

        return view('home', compact('hat'));
    }
    public function currentWeather()
    {
        $currentTime = now();

        $weatherCondition = 'sunny';

        $isDay = $currentTime->hour >= 6 && $currentTime->hour < 19;

        if (!$isDay) {
            $weatherState = 'night';
        } else {
            if ($weatherCondition === 'sunny') {
                $weatherState = 'sunny';
            } elseif ($weatherCondition === 'rainy') {
                $weatherState = 'rainy';
            } else {
                $weatherState = 'sunny';
            }
        }

        return view('home', compact('weatherState'));
    }
}
