<?php

namespace Database\Seeders;

use App\Models\Element;
use Database\Factories\ElementFactory;
use Illuminate\Database\Seeder;

class ElementSeeder extends Seeder
{
    public function run(): void
    {
        Element
            ::factory()
            ->count(10)
            ->hasPrices(1)
            ->create();
    }
}
