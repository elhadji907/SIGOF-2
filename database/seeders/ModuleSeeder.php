<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* DB::table('modules')->insert([
            "name"=>"Autre",
            "domaines_id"=>"1",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]); */
        DB::table('modules')->insert([
            "name"=>"Accueil",
            "domaines_id"=>"1",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('modules')->insert([
            "name"=>"Assistanat de direction",
            "domaines_id"=>"1",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('modules')->insert([
            "name"=>"Gestion administrative",
            "domaines_id"=>"1",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('modules')->insert([
            "name"=>"Secrétariat",
            "domaines_id"=>"1",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('modules')->insert([
            "name"=>"Laveur",
            "domaines_id"=>"34",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('modules')->insert([
            "name"=>"Graisseur",
            "domaines_id"=>"34",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('modules')->insert([
            "name"=>"Pompiste",
            "domaines_id"=>"33",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('modules')->insert([
            "name"=>"Rayonniste",
            "domaines_id"=>"9",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('modules')->insert([
            "name"=>"Caissier",
            "domaines_id"=>"9",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('modules')->insert([
            "name"=>"Chef de boutique",
            "domaines_id"=>"9",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);

        DB::table('modules')->insert([
            "name"=>"Manager de station",
            "domaines_id"=>"9",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);

        DB::table('modules')->insert([
          "name"=>"Techniques de pose de pavés",
          "domaines_id"=>"7",
          'created_at' => now(),
          'updated_at' => now(),
          "uuid"=>Str::uuid(),
      ]);
        DB::table('modules')->insert([
          "name"=>"Electricité",
          "domaines_id"=>"7",
          'created_at' => now(),
          'updated_at' => now(),
          "uuid"=>Str::uuid(),
      ]);
  
        DB::table('modules')->insert([
          "name"=>"Plomberie (Installations sanitaires)",
          "domaines_id"=>"7",
          'created_at' => now(),
          'updated_at' => now(),
          "uuid"=>Str::uuid(),
      ]);
  
        DB::table('modules')->insert([
          "name"=>"Ferraillage",
          "domaines_id"=>"7",
          'created_at' => now(),
          'updated_at' => now(),
          "uuid"=>Str::uuid(),
      ]);
        DB::table('modules')->insert([
          "name"=>"Topographie",
          "domaines_id"=>"7",
          'created_at' => now(),
          'updated_at' => now(),
          "uuid"=>Str::uuid(),
      ]);
        DB::table('modules')->insert([
          "name"=>"Bétonnage",
          "domaines_id"=>"7",
          'created_at' => now(),
          'updated_at' => now(),
          "uuid"=>Str::uuid(),
      ]);

        DB::table('modules')->insert([
          "name"=>"Conduite d'engins de TP",
          "domaines_id"=>"7",
          'created_at' => now(),
          'updated_at' => now(),
          "uuid"=>Str::uuid(),
      ]);

     DB::table('modules')->insert([
        "name"=>"Transformation de fruits et légumes",
        "domaines_id"=>"38",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid"=>Str::uuid(),
    ]);
     DB::table('modules')->insert([
        "name"=>"Transformation de céréales locales",
        "domaines_id"=>"38",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid"=>Str::uuid(),
    ]);
     DB::table('modules')->insert([
        "name"=>"Restauration / Hôtellerie / Tourisme",
        "domaines_id"=>"38",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid"=>Str::uuid(),
    ]);

    DB::table('modules')->insert([
      "name"=>"Mécanique",
      "domaines_id"=>"34",
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Coupe et Couture",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Pavage",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Électricité et entretien de l'éclairage public solaire",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Maçonnerie et Bétonnage",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Peinture bâtiment",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Carrelage",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Entretien routier (route et ouvrage)",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Conduite d'engins (Tracteurs, moissonneuses…)",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Mécanique entretien et réparation matériels agricoles",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Maraîchage (par système d'aspersion goutte à goutte)",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Transformation céréales locales (étuvage et décorticage du riz)",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Hôtellerie-Cuisine-Restauration",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Coupe-Couture",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Guide Tourisme",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Transformation, conditionnement et conservation des produits halieutiques",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Embouche ovine",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Aviculture",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);

    DB::table('modules')->insert([
      "name"=>"Transformation, conditionnement et conservation des produits laitiers",
      "domaines_id"=> null,
      'created_at' => now(),
      'updated_at' => now(),
      "uuid"=>Str::uuid(),
  ]);


    }
}
