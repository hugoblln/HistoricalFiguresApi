<?php

namespace Database\Seeders;

use App\Models\Figure;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FigureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Figure::factory()->count(10)->create();
    }
}
