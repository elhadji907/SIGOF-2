<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiplomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diplomes')->insert([
            "name"=>"Aucun",
            "sigle"=> "Aucun" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomes')->insert([
            "name"=>"Certificat de fin d'étude élémentaire",
            "sigle"=> "CFEE" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomes')->insert([
            "name"=>"Brevet de fin d'étude moyen",
            "sigle"=> "BFEM" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomes')->insert([
            "name"=>"Baccalauréat",
            "sigle"=> "BAC" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomes')->insert([
            "name"=>"Licence 1",
            "sigle"=> "L1" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomes')->insert([
            "name"=>"Licence 2",
            "sigle"=> "L2" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomes')->insert([
            "name"=>"Licence 3",
            "sigle"=> "L3" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomes')->insert([
            "name"=>"Master 1",
            "sigle"=> "M1" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomes')->insert([
            "name"=>"Master 2",
            "sigle"=> "M2" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomes')->insert([
            "name"=>"Doctorat",
            "sigle"=> "Doctorat" ,
            "uuid"=>Str::uuid(),
        ]);

        DB::table('diplomes')->insert([
            "name"=>"Autre",
            "sigle"=> "Autre" ,
            "uuid"=>Str::uuid(),
        ]);
    }
}
