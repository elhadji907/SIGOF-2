<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AntenneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('antennes')->insert([
            "name" => "Antenne Kolda",
            "code" => "AntKD",
            "contact" => "339962260",
            "adresse" => "SIKILO, lot n° 349",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('antennes')->insert([
            "name" => "Antenne Kaolack",
            "code" => "AntKL",
            "contact" => "339416505",
            "adresse" => "KASNACK, lot n° 409/BN",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('antennes')->insert([
            "name" => "Antenne Saint-Louis",
            "code" => "AntSL",
            "contact" => "339616229",
            "adresse" => "Avenue des Grands Hommes, Djoloffène villa n° 860",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('antennes')->insert([
            "name" => "Antenne Kédougou",
            "code" => "AntKG",
            "contact" => "338977586",
            "adresse" => "Quartier Dande-Mayo, Villa n°689",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('antennes')->insert([
            "name" => "Antenne Matam",
            "code" => "AntMT",
            "contact" => "339663187",
            "adresse" => "Villa n° 553 Bis Quartier Alwar (Gourel Serigne)",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('antennes')->insert([
            "name" => "Antenne Diourbel",
            "code" => "AntDL",
            "contact" => "339711859",
            "adresse" => "Diourbel",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('antennes')->insert([
            "name" => "Antenne Ziguinchor",
            "code" => "AntZG",
            "contact" => "772912407",
            "adresse" => "Ziguinchor",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
    }
}
