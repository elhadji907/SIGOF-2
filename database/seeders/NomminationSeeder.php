<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NomminationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        DB::table('nomminations')->insert([
        "name" => "Portant engagement à l'essai",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
        DB::table('nomminations')->insert([
        "name" => "Portant engagement définitif",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
        DB::table('nomminations')->insert([
        "name" => "Portant nommination",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
        DB::table('nomminations')->insert([
        "name" => "Portant reclassement",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);

    }
}
