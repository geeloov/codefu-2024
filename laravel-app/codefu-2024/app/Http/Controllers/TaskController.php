<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function gpsBased()
    {
        $userId = auth()->user()->id;

        $gpsTasks = Task::where('user_id', $userId)
            ->where('completed', false)
            ->whereDate('dueDate', now()->toDateString())
            ->where('type_id', 1)
            ->get();

        $velocityTasks = Task::where('user_id', $userId)
            ->where('completed', false)
            ->whereDate('dueDate', now()->toDateString())
            ->where('type_id', 2)
            ->get();

        return view('tasks.gps_based', compact('gpsTasks', 'velocityTasks'));
    }

    public function gpsBasedComplete()
    {
        return view('tasks.gps_based');
    }


    public function completeTask(Request $request)
    {
        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);
    
        $task = Task::find($validated['task_id']);
    
        $userLat = $validated['lat'];
        $userLng = $validated['lng'];
        
        $locat = json_decode($task->requirements, true);

        $taskLat = $locat['lat'];  // This will be the lat from your task's requirements
        $taskLng = $locat['lng'];  // Same for lng
    
        $distance = $this->calculateDistance($userLat, $userLng, $taskLat, $taskLng);
        
        if ($distance <= 100) {
            $task->completed = true;
            $task->save();
    
            $user = auth()->user();
            $user->points += $task->points;
            $user->save();

            return redirect()->route('tasks.gps.view')->with('success', 'Task completed successfully!');
        } else {
            return redirect()->route('tasks.gps.view')->with('error', 'You are not within the required area.');
        }
    }

    private function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        $R = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLng / 2) * sin($dLng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $R * $c * 1000;
        return $distance;
    }

    public function completeVelocityTask(Request $request)
    {
        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'total_distance' => 'required',
            'total_time' => 'required',
        ]);

        $task = Task::find($validated['task_id']);
        $requirements = json_decode($task->requirements, true);

        $totalDistance = $validated['total_distance'];
        $totalTime = $validated['total_time'];
        if ($totalTime > 0 && $totalDistance > 0) {
            $speed = ($totalDistance / $totalTime) * 3.6;
        } else {
            $speed = 0;
        }

        echo "dist:", $totalDistance;
        echo "<br>";
        echo "time:", $totalTime;
        echo "<br>";
        echo "speed:", $speed;
        echo "<br>";

        if (isset($requirements['range']) && $speed >= $requirements['range'][0] && $speed <= $requirements['range'][1]) {
            // Mark task as completed
            dd('done');
            $task->update(['completed' => true]);

            // Award points to user
            // $user = auth()->user();
            // $user->increment('points', $task->points);

            return redirect()->route('tasks.gps.view')->with('success', 'Task completed successfully!');
        } else {
            dd('not done');
            return redirect()->route('tasks.gps.view')->with('error', 'Your speed did not meet the task requirements.');
        }
    }
    
    // // Haversine Distance Calculation
    // private function haversineDistance($lat1, $lng1, $lat2, $lng2)
    // {
    //     $earthRadius = 6371; // Earth radius in kilometers
    //     $dLat = deg2rad($lat2 - $lat1);
    //     $dLng = deg2rad($lng2 - $lng1);
    
    //     $a = sin($dLat / 2) * sin($dLat / 2) +
    //         cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
    //         sin($dLng / 2) * sin($dLng / 2);
    
    //     $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    //     $distance = $earthRadius * $c * 1000; // Distance in meters
    
    //     return $distance;
    // }

    public function maskTask(Request $request){
        $result = $request->input('result');
        $imageUrl = $request->input('imageUrl');

        $name = 'Take a pic';
        $points = 3;
        $negative = 0;
        $available = false;
        $requirements = json_encode(['mask' => 'wear it']);
        $type_id = 3;
        $user_id = Auth::user()->id; 
        $completed = true;
        $dueDate = now(); 
    
        $task = new Task();
        $task->name = $name;
        $task->points = $points;
        $task->negative = $negative;
        $task->available = $available;
        $task->requirements = $requirements;
        $task->type_id = $type_id;
        $task->user_id = $user_id;
        $task->completed = $completed;
        $task->due_date = $dueDate;
    
        $task->save();

        return response()->json([
            'success' => true,
            'message' => 'Data received successfully!',
            'result' => $result,
            'imageUrl' => $imageUrl
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
