<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProcesverbalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('procesverbals')->insert([
            "name"=>"le procès-verbal du Conseil d'Administration en date du 09 décembre 2013 en sa résolution n°3 adoptant le manuel de procédures de fonctionnement de l'ONFP",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('procesverbals')->insert([
            "name"=>"le procès-verbal du Conseil d'Administration en date du 21 août 2014 en sa résolution n°1 fixant la grille salariale, les indemnités et les avantages applicables au personnel de l'ONFP",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('procesverbals')->insert([
            "name"=>"le procès-verbal du Conseil d'Administration en date du 03 octobre 2017 en sa résolution n°2017 -02-0310 adoptant les modifications apportées au manuel de procédures de fonctionnement de l'ONFP",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('procesverbals')->insert([
            "name"=>"le procès-verbal du Conseil d'Administration en date du 27 décembre 2021 en sa résolution n°2021-04-2712 adoptant l'organigramme de l'ONFP avec son plan de mise en œuvre",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
    }
}
