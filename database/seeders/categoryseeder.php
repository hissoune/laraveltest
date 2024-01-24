<?php

namespace Database\Seeders;

use App\Models\Category; // Make sure the model namespace matches your actual model
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
    }
}
