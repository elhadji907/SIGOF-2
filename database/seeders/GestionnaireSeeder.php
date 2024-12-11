<?php

namespace Database\Seeders;

use App\Models\Gestionnaire;
use Illuminate\Database\Seeder;

class GestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gestionnaire::factory()
            ->count(20)
            ->create();
    }
}
