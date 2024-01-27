<?php

namespace Database\Seeders;

use App\Models\products;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class productsseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        products::factory(10)->create();
    }
}
