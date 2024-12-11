<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lois')->insert([
            "name"=>"la loi n° 86-44 du 11 août 1986 portant création de l'ONFP",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('lois')->insert([
            "name"=>"la loi n° 90-07 du 26 juin 1990 relative à l'organisation et au contrôle des personnes morales de droit privé bénéficiant du concours financier de la puissance publique",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
        DB::table('lois')->insert([
            "name"=>"la loi 97-17 du 01 décembre 1997 portant code du travail",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid"=>Str::uuid(),
        ]);
    }
}
