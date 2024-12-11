<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DomaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('domaines')->insert([
           "name"=>"Accueil - Secrétariat",
           "secteurs_id"=>"2",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
        DB::table('domaines')->insert([
           "name"=>"Agriculture - Agroalimentaire",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
        DB::table('domaines')->insert([
           "name"=>"Architecture - Urbanisme",
           "secteurs_id"=>"2",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
        DB::table('domaines')->insert([
           "name"=>"Artisanat",
           "secteurs_id"=>"2",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
        DB::table('domaines')->insert([
           "name"=>"Arts - Audiovisuel",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
        DB::table('domaines')->insert([
           "name"=>"Banque - Assurance",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
        DB::table('domaines')->insert([
           "name"=>"Bâtiment - Travaux publics (BTP)",
           "secteurs_id"=>"2",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
        DB::table('domaines')->insert([
           "name"=>"Bureautique",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
        DB::table('domaines')->insert([
           "name"=>"Commerce - Vente",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Comptabilité - Finance - Gestion",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Développement personnel",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Droit - Juridique",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Édition - Presse - Médias",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Enseignement - Formation",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Esthétique - Beauté",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Graphisme - PAO CAO DAO",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Immobilier",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Industrie",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Informatique - Réseaux - Télécom",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Internet - Web",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Langues",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Lettres - Sciences humaines et sociales",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Management - Direction d'entreprise",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Marketing - Communication",
           "secteurs_id"=>"4",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Mode - Textile",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Qualité - Sécurité - Environnement",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Ressources humaines",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Santé - Social",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Sciences",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Sport - Loisirs",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Tourisme - Hôtellerie - Restauration",
           "secteurs_id"=>"2",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Transport - Achat - Logistique",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Energie",
           "secteurs_id"=>"1",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
        DB::table('domaines')->insert([
           "name"=>"Mécanique",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);

       DB::table('domaines')->insert([
           "name"=>"FROID/CLIMATISATION",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
       DB::table('domaines')->insert([
           "name"=>"GENIE CIVIL",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
       DB::table('domaines')->insert([
           "name"=>"GENIE ELECTRIQUE",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
       DB::table('domaines')->insert([
           "name"=>"HETELLERIE / RESTAURATION",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
       DB::table('domaines')->insert([
           "name"=>"INFORMATIQUE",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
       DB::table('domaines')->insert([
           "name"=>"MANAGEMENT",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
       DB::table('domaines')->insert([
           "name"=>"MECANIQUE AUTOMOBILE",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
       DB::table('domaines')->insert([
           "name"=>"FABRICATION MACANIQUE",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
       DB::table('domaines')->insert([
           "name"=>"STRUCTURE METALLIQUE",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
       DB::table('domaines')->insert([
           "name"=>"MENUISERIE BOIS",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
       DB::table('domaines')->insert([
           "name"=>"SANTE",
           "secteurs_id"=>"3",
           'created_at' => now(),
           'updated_at' => now(),
           "uuid"=>Str::uuid(),
       ]);
       
    }
}
