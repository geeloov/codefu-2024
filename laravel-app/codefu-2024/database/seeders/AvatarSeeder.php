<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('avatars')->insert([
            ['username' => 'user',
            'healthy' => True,
            'points' => '0',
            'user_id' => 1],
            ['username' => 'john',
            'healthy' => False,
            'points' => '15',
            'user_id' => 2],
            ['username' => 'jane',
            'healthy' => True,
            'points' => '25',
            'user_id' => 3],
        ]);
    }
}