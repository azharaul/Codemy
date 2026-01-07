<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Web Development', 'slug' => 'web-programming']);
        Category::create(['name' => 'Database', 'slug' => 'database']);
        Category::create(['name' => 'Game Development', 'slug' => 'game-development']);
    }
}
