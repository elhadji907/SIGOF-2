<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IngenieurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('ingenieurs')->insert([
            'name' => "Mourtalla BITEYE",
            'initiale' => "mb",
            'fonction' => "Chef division formation",
            'email' => "mourtallabiteye22@gmail.com",
            'telephone' => "773521560",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        
        DB::table('ingenieurs')->insert([
            'name' => "Edouard Ghislain MANSAMA",
            'initiale' => "em",
            'fonction' => "Chef division branches professionnelles",
            'email' => "diallomansa10@gmail.com",
            'telephone' => "775862896",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        
        DB::table('ingenieurs')->insert([
            'name' => "Cheikh Talibouya FAYE",
            'initiale' => "cf",
            'fonction' => "Chef antenne Saint Louis",
            'email' => "cheikhtalibouyafaye@gmail.com",
            'telephone' => "760269945",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        
        DB::table('ingenieurs')->insert([
            'name' => "Balla SYLLA",
            'initiale' => "bs",
            'fonction' => "Chef antenne Kédougou",
            'email' => "balla.sylla@onfp.sn",
            'telephone' => "777504069",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        
        DB::table('ingenieurs')->insert([
            'name' => "Cheikh Abdoul Ahad NDAO",
            'initiale' => "cn",
            'fonction' => "Chef antenne Kaolack",
            'email' => "abdouahad.ndao@gmail.com",
            'telephone' => "776458497",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        
        DB::table('ingenieurs')->insert([
            'name' => "Mamadou DIALLO",
            'initiale' => "md",
            'fonction' => "Chef antenne Kolda",
            'email' => "mamadou.diallo@gmail.com",
            'telephone' => "770311461",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        
        DB::table('ingenieurs')->insert([
            'name' => "Diarra FALL",
            'initiale' => "df",
            'fonction' => "Cheffe division ingénieurie",
            'email' => "diarra.fall@gmail.com",
            'telephone' => "786019564",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        
        DB::table('ingenieurs')->insert([
            'name' => "Mamadou NDIAYE",
            'initiale' => "mn",
            'fonction' => "Cheffe antenne Diourbel",
            'email' => "mamadou.ndiaye@onfp.sns",
            'telephone' => "786019564",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

    }
}
