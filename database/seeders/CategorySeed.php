<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ; $i<20 ; $i++){
            Category::create([
               'name'=>['en'=>fake()->name , 'es'=>fake()->name]
            ]);
        }
    }
}
