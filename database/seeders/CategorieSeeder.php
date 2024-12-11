<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => "2-2",
            'salaire' => "111832",
            'salaire_lettre' => "cent onze mille huit cent trente-deux",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "2-3",
            'salaire' => "117312",
            'salaire_lettre' => "cent dix-sept mille trois cent douze",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "2-4",
            'salaire' => "123066",
            'salaire_lettre' => "cent vingt-trois mille soixante-six",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "3-1",
            'salaire' => "137491",
            'salaire_lettre' => "cent trente-sept mille quatre cent quatre-vingt-onze",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "3-2",
            'salaire' => "150785",
            'salaire_lettre' => "cent cinquante mille sept cent quatre-vingt-cinq",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "3-6",
            'salaire' => "202456",
            'salaire_lettre' => "deux cent deux mille quatre cent cinquante-six",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "4-1",
            'salaire' => "256731",
            'salaire_lettre' => "deux cent cinquante-six mille sept cent trente et un",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "4-2",
            'salaire' => "271664",
            'salaire_lettre' => "deux cent soixante et onze mille six cent soixante-quatre",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "5-1",
            'salaire' => "308563",
            'salaire_lettre' => "trois cent huit mille cinq cent soixante-trois",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "5-3",
            'salaire' => "339202",
            'salaire_lettre' => "trois cent trente-neuf mille deux cent deux",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "6-1",
            'salaire' => "383781",
            'salaire_lettre' => "trois cent quatre-vingt-trois mille sept cent quatre-vingt-un",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "6-2",
            'salaire' => "406226",
            'salaire_lettre' => "quatre cent six mille deux cent vingt-six",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "7-1",
            'salaire' => "545784",
            'salaire_lettre' => "cinq cent quarante-cinq mille sept cent quatre-vingt-quatre",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "7-2",
            'salaire' => "571593",
            'salaire_lettre' => "cinq cent soixante et onze mille cinq cent quatre-vingt-treize",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);
        DB::table('categories')->insert([
            'name' => "7-3",
            'salaire' => "597045",
            'salaire_lettre' => "cinq cent quatre-vingt-dix-sept mille quarante-cinq",
            'created_at' => now(),
            'updated_at' => now(),
            'uuid' => Str::uuid(),
        ]);

        /*  DB::table('categories')->insert([
        'name' => "3-6",
        'created_at' => now(),
        'updated_at' => now(),
        'uuid' => Str::uuid(),
    ]);
        
     DB::table('categories')->insert([
        'name' => "4-1",
        'created_at' => now(),
        'updated_at' => now(),
        'uuid' => Str::uuid(),
    ]);
        
     DB::table('categories')->insert([
        'name' => "5-1",
        'created_at' => now(),
        'updated_at' => now(),
        'uuid' => Str::uuid(),
    ]);
        
     DB::table('categories')->insert([
        'name' => "7-2",
        'created_at' => now(),
        'updated_at' => now(),
        'uuid' => Str::uuid(),
    ]);
        
     DB::table('categories')->insert([
        'name' => "3-2",
        'created_at' => now(),
        'updated_at' => now(),
        'uuid' => Str::uuid(),
    ]); */
    }
}
