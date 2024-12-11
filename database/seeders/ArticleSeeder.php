<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       /*  DB::table('articles')->insert([
            "name" => "Monsieur Lamine BADJI, né le 10 Février 1990 à Bandjikaky, titulaire d'un Master 2 en Génie Logiciel et Sécurité des Technologies de l'Information, matricule de solde  n° 932476/E, précédemment Informaticien est nommé Chef du Service Informatique",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        DB::table('articles')->insert([
            "name" => "Monsieur Lamine BADJI percevra un salaire mensuel de base de trois cent quatre-vingt-trois mille sept cent quatre-vingt (383 781) Francs CFA correspondant à la catégorie 6.1 de la grille salariale du personnel de l'ONFP adoptée par le Conseil d'Administration du 21 Août 2014",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]); */
        DB::table('articles')->insert([
            "name" => "La présente décision prend effet à compter de la date de signature",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        DB::table('articles')->insert([
            "name" => "La dépense sera imputée au compte 66 « charges de personnel",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        DB::table('articles')->insert([
            "name" => "La présente décision sera enregistrée et publiée partout où besoin sera",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
    }
}
