<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'name' => 'Go to',
                'points' => 5,
                'negative_points' => 2,
                'available' => true,
                'requirements' => json_encode(['lat' => 41.992318, 'lng' => 21.419467]),
                'type_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Go on a run',
                'points' => 5,
                'negative_points' => 2,
                'available' => true,
                'requirements' => json_encode(['range' => [4, 12]]),
                'type_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
