<?php

namespace Database\Seeders;

use App\Models\Individuelle;
use Illuminate\Database\Seeder;

class IndividuelleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Individuelle::factory()
            ->count(100)
            ->create();
    }
}
