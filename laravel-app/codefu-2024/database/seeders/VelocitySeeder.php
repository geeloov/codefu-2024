<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VelocitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('velocities')->insert([
            ['name' => 'Walking',
            'min' => '2',
            'max' => '6'],
            ['name' => 'Running',
            'min' => '7',
            'max' => '15'],
            ['name' => 'Cycling',
            'min' => '10',
            'max' => '25'],
            ['name' => 'Car'	,
            'min' => '20',
            'max' => '50'],
        ]);
    }
}
