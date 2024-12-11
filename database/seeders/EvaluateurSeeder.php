<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EvaluateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('evaluateurs')->insert([
            'name' => "Mamadou SALL",
            'fonction' => "Formateur",
            'email' => "mamadou.sall@gmail.com",
            'telephone' => "777412563",
            'adresse' => "CFP de Dagana",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('evaluateurs')->insert([
            'name' => "Ousmane Tounkara",
            'fonction' => "Professeur informatique",
            'email' => "dieynaba.talla@onfp.sn",
            'telephone' => "785201496",
            'adresse' => "CFP de Matam",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('evaluateurs')->insert([
            'name' => "Ouleye SEYE",
            'fonction' => "Enseignante en comptabilité",
            'email' => "ouleye.seye@gmail.om",
            'telephone' => "779635210",
            'adresse' => "CFP de Tamba",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        
    }
}
