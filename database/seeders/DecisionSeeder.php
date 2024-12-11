<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DecisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('decisions')->insert([
            "name"=>"la décision n°01072 ONFP/DG/DAF du 02 octobre 2014 portant application de la résolution n°1fixant la grille salariale, les indemnités et les avantages au personnel de l'ONFP par le Conseil d'Administration en sa séance du 21 août 2014",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('decisions')->insert([
            "name"=>"la décision n°001967 ONFP/DG/DAF du 17 Septembre 2019 portant engagement à l'essai de Monsieur Lamine BADJI",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('decisions')->insert([
            "name"=>"la décision n° 0232 ONFP/DG/DAF du 27 Janvier 2020 portant engagement définitif de Monsieur Lamine BADJI",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
    }
}
