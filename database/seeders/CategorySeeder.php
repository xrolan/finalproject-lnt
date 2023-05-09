<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Comedy'
        ]);

        Category::create([
            'name' => 'Horror'
        ]);

        Category::create([
            'name' => 'Action'
        ]);
    }
}
