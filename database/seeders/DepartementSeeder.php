<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departements')->insert([
            "nom" => "DAKAR",
            "regions_id" =>"1",       
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "Guédiawaye",
            "regions_id" =>"1",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "PIKINE",
            "regions_id" =>"1",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "RUFISQUE",
            "regions_id" =>"1",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "Keur Massar",
            "regions_id" =>"1",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "DIOURBEL",
            "regions_id" =>"2",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "BAMBEY",
            "regions_id" =>"2",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "MBACKE",
            "regions_id" =>"2",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "FATICK",
            "regions_id" =>"3",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "Foundiougne",
            "regions_id" =>"3",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "GOSSAS",
            "regions_id" =>"3",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "KAFFRINE",
            "regions_id" =>"4",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "BIRKELANE",
            "regions_id" =>"4",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "MALEME-HODAR",
            "regions_id" =>"4",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "KOUNGHEUL",
            "regions_id" =>"4",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "KAOLACK",
            "regions_id" =>"5",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "Guinguinéo",
            "regions_id" =>"5",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "NIORO DU RIP",
            "regions_id" =>"5",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "KEDOUGOU",
            "regions_id" =>"6",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "SALEMATA",
            "regions_id" =>"6",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "SARAYA",
            "regions_id" =>"6",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "KOLDA",
            "regions_id" =>"7",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "MEDINA YORO FOULAH",
            "regions_id" =>"7",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "Vélingara",
            "regions_id" =>"7",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "LOUGA",
            "regions_id" =>"8",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "KEBEMER",
            "regions_id" =>"8",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "LINGUERE",
            "regions_id" =>"8",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "MATAM",
            "regions_id" =>"9",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "KANEL",
            "regions_id" =>"9",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "RANEROU",
            "regions_id" =>"9",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "Saint-Louis", 
            "regions_id" =>"10",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "DAGANA", 
            "regions_id" =>"10",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "PODOR", 
            "regions_id" =>"10",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "SEDHIOU", 
            "regions_id" =>"11",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "Bounkiling", 
            "regions_id" =>"11",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "GOUDOMP", 
            "regions_id" =>"11",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "Tambacounda", 
            "regions_id" =>"12",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "GOUDIRY", 
            "regions_id" =>"12",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "BAKEL", 
            "regions_id" =>"12",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "Koumpentoum", 
            "regions_id" =>"12",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "THIES", 
            "regions_id" =>"13",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "MBOUR", 
            "regions_id" =>"13",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "Tivaouane", 
            "regions_id" =>"13",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "Ziguinchor", 
            "regions_id" =>"14",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "BIGNONA", 
            "regions_id" =>"14",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
        DB::table('departements')->insert([
            "nom" => "OUSSOUYE", 
            "regions_id" =>"14",             
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
             ]);
    }
}
