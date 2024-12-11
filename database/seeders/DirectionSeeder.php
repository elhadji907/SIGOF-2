<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = Faker::create();

        DB::table('directions')->insert([
            'name' => "Direction Général",
            "sigle"=> "DG",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Direction',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Secrétaire Général",
            "sigle"=> "SG",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Direction',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Direction Administrative et Financière ",
            "sigle"=> "DAF",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Direction',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Direction de la Construction et de l'Equipement des Centres de Formation",
            "sigle"=> "DCECF",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Direction',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Direction des Evaluations et Certifications ",
            "sigle"=> "DEC",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Direction',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Direction de l'Ingénierie et des Opérations de Formation",
            "sigle"=> "DIOF",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Direction',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Cellule Passation des Marchés",
            "sigle"=> "CPM",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Cellule',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Direction de la Planification et des Projets",
            "sigle"=> "DPP",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Direction',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Cellule Coopération et Partenariat",
            "sigle"=> "CCP",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Cellule',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Conseillers Techniques",
            "sigle"=> "CT",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Direction',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Agence comptable",
            "sigle"=> "AC",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Service',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Cellule Juridique",
            "sigle"=> "CJ",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Cellule',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Centre de Ressources Documentation et Information",
            "sigle"=> "CRDI",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Service',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Coordination des Antennes Régionales",
            "sigle"=> "CAR",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Service',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Service Accueil, Orientation Sécurité et Suivi des Formés",
            "sigle"=> "SAOS",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Service',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Service Informatique",
            "sigle"=> "SI",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Service',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Audit Interne",
            "sigle"=> "AI",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Direction',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('directions')->insert([
            'name' => "Contrôle de Gestion",
            "sigle"=> "CG",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Direction',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('directions')->insert([
            'name' => "Cellule suivi évaluation",
            "sigle"=> "CSE",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Cellule',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('directions')->insert([
            'name' => "Cellule Marketing et Communication",
            "sigle"=> "COM",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Cellule',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('directions')->insert([
            'name' => "Direction des Ressources Humaines",
            "sigle"=> "DRH",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Direction',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('directions')->insert([
            'name' => "Bureau du Courrier",
            "sigle"=> "BC",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Bureau',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('directions')->insert([
            'name' => "Service d'Elaboration de Ressources de Formation",
            "sigle"=> "SERF",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Service',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('directions')->insert([
            'name' => "Unité de Recherche et Développement ",
            "sigle"=> "URD",
            "chef_id" => $faker->randomDigitNotNull(),
            'type'=> 'Service',
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    }
}
