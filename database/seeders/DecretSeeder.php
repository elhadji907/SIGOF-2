<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DecretSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('decrets')->insert([
            "name"=>"le décret n° 76-122 du 3 février 1976 fixant le régime spécial applicable au personnel des établissements publics à caractère industriel et commercial",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('decrets')->insert([
            "name"=>"le décret n° 85-667 du 14 juin 1985 fixant l'échelle des salaires minima des agents des établissements publics à caractère industriel et commercial",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('decrets')->insert([
            "name"=>"le décret n° 87-955 du 21 juillet 1987 fixant les règles d'organisation et de fonctionnement de l'ONFP",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('decrets')->insert([
            "name"=>"le décret n° 2019-1505 du 18 septembre 2019 portant nomination du Directeur Général de l'ONFP",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
    }
}
