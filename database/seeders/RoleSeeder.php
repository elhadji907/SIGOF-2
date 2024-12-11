<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => "admin",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('roles')->insert([
            'name' => "super-admin",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('roles')->insert([
            'name' => "user",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "gestionnaire",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "beneficiaire",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "comptable",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "a-comptable",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "courrier",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "a-courrier",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "DPP",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "ADPP",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "DIOF",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "ADIOF",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "DEC",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "ADEC",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "Ingenieur",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "COM",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "ACOM",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "Visiteur",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "Demandeur",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "Operateur",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "DAF",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "FDAF",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "DRH",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "RH",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "ADRH",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "LOGDAF",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('roles')->insert([
            'name' => "PRDPP",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "PLDPP",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "Consultant",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "SUIVI",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "EVDEC",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "Employe",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => "Nologin",
            'guard_name' => 'web',
            'user_create_id' => '1',
            'user_update_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
