<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            ['name' => 'Hat 1',
             'image' => '/Hats/smoggy-07.png',
             'points' => 4,
             'available' => true,
             'category_id' => 1,
             'x' => 25,
             'y' => 10
            ],
             ['name' => 'Hat 2',
             'image' => '/Hats/smoggy-09.png',
             'points' => 7,
             'available' => true,
             'category_id' => 1,
             'x' => 25,
             'y' => 5
            ],
             ['name' => 'Hat 3',
             'image' => '/Hats/smoggy-11.png',
             'points' => 5,
             'available' => true,
             'category_id' => 1,
             'x' => 25,
             'y' => 10],
             ['name' => 'Mask 1',
             'image' => '/Masks/smoggy-12.png',
             'points' => 0,
             'available' => true,
             'category_id' => 4,
             'x' => 25,
             'y' => 10],
             ['name' => 'Mask 2',
             'image' => '/Masks/smoggy-17.png',
             'points' => 10,
             'available' => true,
             'category_id' => 4,
             'x' => 25,
             'y' => 10],
        ]);
    }
}
