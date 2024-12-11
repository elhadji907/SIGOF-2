<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('files')->insert([
            "legende" => "Carte nationale d'identité (Recto/Verso)",
            "sigle" => "CIN",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('files')->insert([
            "legende" => "Diplome académique",
            "sigle" => "DAC",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('files')->insert([
            "legende" => "Diplome professionnel",
            "sigle" => "DP",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('files')->insert([
            "legende" => "Certificat résidence",
            "sigle" => "CR",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('files')->insert([
            "legende" => "Autres diplomes",
            "sigle" => "AD",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('files')->insert([
            "legende" => "Attestation",
            "sigle" => "Attestation",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('files')->insert([
            "legende" => "Curriculum vitæ (CV)",
            "sigle" => "CV",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('files')->insert([
            "legende" => "Acte création",
            "sigle" => "AC",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('files')->insert([
            "legende" => "Bulletins",
            "sigle" => "Bulletins",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('files')->insert([
            "legende" => "Autres",
            "sigle" => "Autres",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('files')->insert([
            "legende" => "Ninea ou registre de commerce",
            "sigle" => "Ninea/RC",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        DB::table('files')->insert([
            "legende" => "Arrêté création",
            "sigle" => "Arrêté",
            "users_id" => null,
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
    }
}
