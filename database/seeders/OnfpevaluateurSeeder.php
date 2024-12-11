<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OnfpevaluateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('onfpevaluateurs')->insert([
            'name' => "Amsatou PAYE",
            'initiale' => "ap",
            'fonction' => "Chef division évaluation",
            'email' => "amsatou.paye@onfp.sn",
            'telephone' => "772912456",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    }
}
