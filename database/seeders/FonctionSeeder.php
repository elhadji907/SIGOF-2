<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FonctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fonctions')->insert([
            "name"=>"Chef du Centre de Ressources Documentation et Information",
            "sigle"=>"CRDI",            
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([
            "name"=>"Gestionnaire du matériel roulant",
            "sigle"=>"GMR",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([
            "name"=>"Agent Comptable",
            "sigle"=>"AC",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([
            "name"=>"Directeur Administratif et financier",
            "sigle"=>"DAF",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([
            "name"=>"Président du conseil d'administration",
            "sigle"=>"PCA",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([
            "name"=>"Coordonatrice des antenne régionales",
            "sigle"=>"CAR",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([
            "name"=>"Directrice des Evaluations et Certification",
            "sigle"=>"DEC",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([
            "name"=>"Chef d'antenne Saint-Louis",
            "sigle"=>"CA/SL",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([
            "name"=>"Chef d'antenne Kédougou",
            "sigle"=>"CA/KG",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef de division ressources humaines ",
            "sigle"=>"RH",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Conseillére en édition",
            "sigle"=>"CE",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef de cellule passation des marchés",
            "sigle"=>"CPM",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Controleur de gestion",
            "sigle"=>"CG",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef de l'unité recherche et développement",
            "sigle"=>"Chef URD",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Conseiller en insertion professionnelle ",
            "sigle"=>"CIP",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Directrice de l'ingénierie et des opérations de formation",
            "sigle"=>"DIOF",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Directeur général",
            "sigle"=>"DG",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef bureau courrier",
            "sigle"=>"CBC",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef de la Cellule de communication",
            "sigle"=>"Journaliste",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef antenne Kolda",
            "sigle"=>"CA/KD",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Auditrice interne",
            "sigle"=>"AI",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef du Service Accueil, orientation et Sécurité",
            "sigle"=>"SAOS",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Directeur de la planification et des projets",
            "sigle"=>"DPP",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef antenne Kaolack",
            "sigle"=>"CA/KL",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef antenne Diourbel",
            "sigle"=>"CA/DL",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Informaticien",
            "sigle"=>"Informaticien",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef de la Cellule de communication",
            "sigle"=>"COM",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Ingénieur de la formation",
            "sigle"=>"IF",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Assistante administrative",
            "sigle"=>"AA",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chargée de communication",
            "sigle"=>"CC",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Assistante conseillère en formation",
            "sigle"=>"ACF",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef de bureau à l'agence comptable",
            "sigle"=>"CB - AC",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef de la division planification",
            "sigle"=>"CDP - DPP",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Assistante de direction",
            "sigle"=>"AD",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef de la Division logistique",
            "sigle"=>"CDL - DAF",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chauffeur",
            "sigle"=>"Chauffeur",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    
        DB::table('fonctions')->insert([            
            "name"=>"Chef du service informatique",
            "sigle"=>"Chef SI",                
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    }
}
