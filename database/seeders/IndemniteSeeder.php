<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IndemniteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('indemnites')->insert([
        "name" => "d'une indemnité mensuelle de transport de vingt mille huit cents (20 800) francs CFA",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
        DB::table('indemnites')->insert([
        "name" => "d'une indemnité mensuelle de sujétion de vingt mille (20 000) francs CFA",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
        DB::table('indemnites')->insert([
        "name" => "d'une indemnité mensuelle de sujétion de trente mille (30 000) francs CFA",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
        DB::table('indemnites')->insert([
        "name" => "d'une indemnité mensuelle de sujétion de quarante mille (40 000) francs CFA",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
        DB::table('indemnites')->insert([
        "name" => "d'une indemnité de fonction de cinquante mille francs (50.000) francs CFA",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
        DB::table('indemnites')->insert([
        "name" => "d'une indemnité de fonction de cent mille francs (100.000) francs CFA",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
        DB::table('indemnites')->insert([
        "name" => "d'une indemnité de fonction de cent cinquante mille francs (150.000) francs CFA",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
        DB::table('indemnites')->insert([
        "name" => "d'une indemnité de fonction de deux cent mille francs (200.000) francs CFA",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
        DB::table('indemnites')->insert([
        "name" => "du versement de la cotisation pour la retraite complémentaire par l'ONFP (régime cadre part employeur).",
        'created_at' => now(),
        'updated_at' => now(),
        "uuid" => Str::uuid(),
    ]);
    }
}
