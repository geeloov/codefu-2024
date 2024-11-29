<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('task_types')->insert([
            ['name' => 'GPS', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Velocity', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Image', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}