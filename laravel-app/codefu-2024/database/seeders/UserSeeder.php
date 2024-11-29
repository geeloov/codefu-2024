<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['fullname' => 'User', 
            'health_status' => 'User', 
            'birthdate' => '2001-1-1',
            'password' =>  Hash::make('password'),
            'email' => 'user@gmail.com', 
            'created_at' => now(), 
            'updated_at' => now()],
            ['fullname' => 'John', 
            'health_status' => 'John', 
            'birthdate' => '2001-1-1',
            'password' =>  Hash::make('password'),
            'email' => 'john@gmail.com', 
            'created_at' => now(), 
            'updated_at' => now()],
            ['fullname' => 'Jane', 
            'health_status' => 'Jane', 
            'birthdate' => '2001-1-1',
            'password' =>  Hash::make('password'),
            'email' => 'jane@gmail.com', 
            'created_at' => now(), 
            'updated_at' => now()],
        ]);
    }
}
