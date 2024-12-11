<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiplomeproSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diplomespros')->insert([
            "name"=>"Aucun",
            "sigle"=> "Aucun" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomespros')->insert([
            "name"=>"Certificat d'aptitude professionnelle",
            "sigle"=> "CAP" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomespros')->insert([
            "name"=>"Brevet d'études professionnelles",
            "sigle"=> "BEP" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomespros')->insert([
            "name"=>"Brevet de Technicien",
            "sigle"=> "BT" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomespros')->insert([
            "name"=>"Brevet de Technicien Supérieur",
            "sigle"=> "BTS" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomespros')->insert([
            "name"=>"Licence 3 professionnelle",
            "sigle"=> "L3 Pro" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomespros')->insert([
            "name"=>"Master professionnel",
            "sigle"=> "Master Pro" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomespros')->insert([
            "name"=>"Autre",
            "sigle"=> "Autre" ,
            "uuid"=>Str::uuid(),
        ]);
    }
}
