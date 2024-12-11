<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->insert([
            'nom' => "Dakar",
            'sigle' => "SN-DK",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "DIOURBEL",
            'sigle' => "SN-DB",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "FATICK",
            'sigle' => "SN-FK",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "KAFFRINE",
            'sigle' => "SN-KA*",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "KAOLACK",
            'sigle' => "SN-KL",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "KEDOUGOU",
            'sigle' => "SN-KE*",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "KOLDA",
            'sigle' => "SN-KD",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "LOUGA",
            'sigle' => "SN-LG",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "MATAM",
            'sigle' => "SN-MT*",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "SAINT LOUIS",
            'sigle' => "SN-SL",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "SEDHIOU",
            'sigle' => "SN-SE*",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "TAMBACOUNDA",
            'sigle' => "SN-TC",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "THIES",
            'sigle' => "SN-TH",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('regions')->insert([
            'nom' => "ZIGUINCHOR",
            'sigle' => "SN-ZG",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    }
}
