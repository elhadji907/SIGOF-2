<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            "titre" => "Formation | Qualification",
            "name" => "C'est l'organisation d'actions et d'opérations de formation au bénéfice de cibles diversifiées pouvant être les branches professionnelles, les demandeurs d'emploi, les travailleurs, les entreprises, les collectivités, les organismes de l'Etat, etc.",
            "description" => "",
            "lien" => "https://www.onfp.sn/formations",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        
        DB::table('services')->insert([
            "titre" => "Evaluation | Certification",
            "name" => "contrôler l'exécution des conventions signées avec les opérateurs ; évaluer les actions de formations menées par l'Office ; tenir à jour les statistiques sur les formations et les formés ;",
            "description" => "",
            "lien" => "https://www.onfp.sn/evaluations",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('services')->insert([
            "titre" => "Construction | Equipement",
            "name" => "Ce service consiste à la maitrise d'ouvrage de construction et d'équipement de centres de formation professionnelle ou la maitrise d'ouvrage déléguée à la demande de ministères, d'organismes, de projets nationaux, de coopération ou à la demande d'organismes privés telles que les branches, les ONG, les associations et les entreprises.",
            "description" => "",
            "lien" => "https://www.onfp.sn/constructions",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('services')->insert([
            "titre" => "Suivi-Insertion",
            "name" => "Analyse des besoins de formation des demandeurs; Co-élaboration du projet personnel et professionnel avec demandeur; Conseil sur les opportunités du marché de l'emploi.",
            "description" => "",
            "lien" => "https://www.onfp.sn/suivi-insertions",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('services')->insert([
            "titre" => "Documentation | Edition",
            "name" => "L'ONFP produit et diffuse de la documentation et des supports techniques et pédagogiques sur la formation professionnelle.",
            "description" => "",
            "lien" => "https://www.onfp.sn/documentations",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('services')->insert([
            "titre" => "Etude | Recherche",
            "name" => "Il s'agit de la production ou de la diffusion de connaissances et de savoirs sur la formation professionnelle.",
            "description" => "",
            "lien" => "https://www.onfp.sn/etudes",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
    }
}
