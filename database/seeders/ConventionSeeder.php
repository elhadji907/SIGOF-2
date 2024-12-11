<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('conventions')->insert([
            "name" => "Attestation",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective des Transports Aériens",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
        DB::table('conventions')->insert([
            "name" => "Convention Collective Professionnelle Des Transports Routiers",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective des Journalistes et Techniciens de la Communication Sociale du Sénégal",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective des Entreprises d'Assurances",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective des Industries Extractives et de la Prospection Minière de la Fédération du Mali",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective Fédérale des Industries de la Mécanique Générale de l'AOF",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective Fédérale des Auxiliaires de Transports de l'AOF",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective fixant les Conditions des Officiers et Marins de la Marine Marchande Sénégalaise",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective Fixant les Conditions des Travailleurs de Cinéma",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective Nationale Professionnelle des Banques et Etablissements Financiers du Sénégal",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective Nationale des Industries Hôtelières de La République du Sénégal",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective des Ouvriers Boulangeries de la Délégation de Dakar et Dépendances",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective Fédérale des Industries Polygraphiques",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective Nationale du Personnelle de l'Enseignement Privé du Sénégal",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Les Conditions de Travail dans les Professions Agricoles et Assimilées au Sénégal",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention Collective du Commerce",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Conditions générales d’emploi des domestiques et gens de maison",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention collective nationale interprofessionnelle du 27 mai 1982",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention règle les rapports entre les employeurs ",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);

        DB::table('conventions')->insert([
            "name" => "Convention collective fédérale des entreprises du Bâtiment et des Travaux publics",
            'created_at' => now(),
            'updated_at' => now(),
            "uuid" => Str::uuid(),
        ]);
    }
}
