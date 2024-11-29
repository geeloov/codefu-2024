<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvatarItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('avatars')->insert([
            ['avatar_id' => 1,
            'item_id' => 1,
            'active' => False],
            ['avatar_id' => 1,
            'item_id' => 2,
            'active' => False],
            ['avatar_id' => 1,
            'item_id' => 3,
            'active' => False]
        ]);
    }
}
