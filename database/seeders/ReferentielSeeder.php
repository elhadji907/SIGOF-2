<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReferentielSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('referentiels')->insert([
            "Intitule" => "Attestation",
            "titre" => "Attestation",
            "reference" => "",
            "categorie" => "",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('referentiels')->insert([
            "Intitule" => "Maraichage",
            "titre" => "Agent pépiniériste",
            "reference" => "Arrêté fixant les conditions de travail dans les professions agricoles et assimilées du 06 sept 1961",
            "categorie" => "5ième catégorie",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        
        DB::table('referentiels')->insert([
            "Intitule" => "Maraichage",
            "titre" => "Agent pépiniériste",
            "reference" => "Arrêté fixant les conditions de travail dans les professions agricoles et assimilées du 06 sept 1961",
            "categorie" => "5ième catégorie",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        DB::table('referentiels')->insert([
            "Intitule" => "ELECTRICITE BATIMENT",
            "titre" => "Ouvrier électricien bâtiment",
            "reference" => "Convention collective des Bâtiments et Travaux publics du Sénégal/protocole d'accord entre les syndicats et les employeurs des entreprises du BTP du 24 novembre 2006",
            "categorie" => "3ième catégorie",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        DB::table('referentiels')->insert([
            "Intitule" => "Embouche bovine",
            "titre" => "Agent d'Elevage bovin",
            "reference" => "Arrêté fixant les conditions de travail dans les professions agricoles et assimilées du 06 sept 1961",
            "categorie" => "",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        DB::table('referentiels')->insert([
            "Intitule" => "Bureautique",
            "titre" => "Opérateur de saisie",
            "reference" => "Convention collective fédérale du commerce de l'Afrique occidentale - du 16 novembre 1956 ",
            "categorie" => "",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        DB::table('referentiels')->insert([
            "Intitule" => "Comptabilité",
            "titre" => "Aide comptable",
            "reference" => "Convention collective fédérale du commerce de l’Afrique occidentale - du 16 novembre 1956",
            "categorie" => "",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        DB::table('referentiels')->insert([
            "Intitule" => "Aviculture",
            "titre" => "Ouvrier avicole",
            "reference" => "Arrêté fixant les conditions de travail dans les professions agricoles et assimilées - du 06 sept 1961",
            "categorie" => "",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        DB::table('referentiels')->insert([
            "Intitule" => "Cuisine",
            "titre" => "Aide cuisinier",
            "reference" => "Convention collective nationale des industries hôtelières de la république du Sénégal du 01 janvier 1996",
            "categorie" => "",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
    }
}
