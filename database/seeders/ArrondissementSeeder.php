<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArrondissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('arrondissements')->insert([
               "nom" => "DAKAR-PLATEAU",
               "departements_id" =>"1",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
        DB::table('arrondissements')->insert([
               "nom" => "GRAND DAKAR",
               "departements_id" =>"1",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
        DB::table('arrondissements')->insert([
               "nom" => "ALMADIES",
               "departements_id" =>"1",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
        DB::table('arrondissements')->insert([
               "nom" => "PARCELLES ASSAINIES",
               "departements_id" =>"1",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
        DB::table('arrondissements')->insert([
               "nom" => "Guédiawaye",
               "departements_id" =>"2",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
        DB::table('arrondissements')->insert([
               "nom" => "PIKINE DAGOUDANE",
               "departements_id" =>"3",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
        DB::table('arrondissements')->insert([
               "nom" => "THIAROYE",
               "departements_id" =>"3",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
        DB::table('arrondissements')->insert([
               "nom" => "NIAYES",
               "departements_id" =>"3",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
        DB::table('arrondissements')->insert([
               "nom" => "RUFISQUE-EST",
               "departements_id" =>"4",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BAMBYLOR",
               "departements_id" =>"4",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "Ndoulo",
               "departements_id" =>"5",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NDINDY",
               "departements_id" =>"5",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BABA GARAGE",
               "departements_id" =>"6",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NGOYE",
               "departements_id" =>"6",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "LAMBAYE",
               "departements_id" =>"6",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NDAME",
               "departements_id" =>"7",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KAEL",
               "departements_id" =>"7",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "TAIF",
               "departements_id" =>"7",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NDIOP",
               "departements_id" =>"8",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "FIMELA",
               "departements_id" =>"8",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NIAKHAR",
               "departements_id" =>"8",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "TATTAGUINE",
               "departements_id" =>"8",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "TOUBACOUTA",
               "departements_id" =>"9",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DJILOR",
               "departements_id" =>"9",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NIODIOR",
               "departements_id" =>"9",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "COLOBANE",
               "departements_id" =>"10",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "OUADIOUR",
               "departements_id" =>"10",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KATAKEL",
               "departements_id" =>"11",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KATAKEL",
               "departements_id" =>"11",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KEUR MBOUCKI",
               "departements_id" =>"12",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MABO",
               "departements_id" =>"12",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DAROU MINAM 2",
               "departements_id" =>"13",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SAGNA",
               "departements_id" =>"13",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MISSIRAH WADENE",
               "departements_id" =>"14",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "IDA MOURIDE",
               "departements_id" =>"14",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "LOUR ESCALE",
               "departements_id" =>"14",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KOUMBAL",
               "departements_id" =>"15",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NDIEDIENG",
               "departements_id" =>"15",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NGOTHIE",
               "departements_id" =>"15",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MBADAKHOUNE",
               "departements_id" =>"16",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NGUELOU",
               "departements_id" =>"16",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MEDINA SABAKH",
               "departements_id" =>"17",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "PAOS KOTO",
               "departements_id" =>"17",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "WACK NGOUNA",
               "departements_id" =>"17",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BANDAFASSI",
               "departements_id" =>"18",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "FONGOLIMBI",
               "departements_id" =>"18",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "FONGOLIMBI",
               "departements_id" =>"19",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DAR SALAM",
               "departements_id" =>"19",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BEMBOU",
               "departements_id" =>"20",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SABODALA",
               "departements_id" =>"20",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MAMPATIM",
               "departements_id" =>"21",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SARE BIDJI",
               "departements_id" =>"21",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DIOULACOLON",
               "departements_id" =>"21",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "FAFACOUROU",
               "departements_id" =>"22",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NDORNA",
               "departements_id" =>"22",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NIAMING",
               "departements_id" =>"22",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SARE COLY SALLE",
               "departements_id" =>"23",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SARE COLY SALLE",
               "departements_id" =>"23",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SARE COLY SALLE",
               "departements_id" =>"23",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "COKI",
               "departements_id" =>"24",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "Keur Momar Sarr",
               "departements_id" =>"24",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MBEDIENE",
               "departements_id" =>"24",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "Sakal",
               "departements_id" =>"24",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NDANDE",
               "departements_id" =>"25",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DAROU MOUSTY",
               "departements_id" =>"25",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SAGATTA GUETH",
               "departements_id" =>"25",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BARKEDJI",
               "departements_id" =>"26",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BARKEDJI",
               "departements_id" =>"26",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DODJI",
               "departements_id" =>"26",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "YANG YANG",
               "departements_id" =>"26",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "AGNAM CIVOL",
               "departements_id" =>"27",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "OGO",
               "departements_id" =>"27",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "WOURO SIDY",
               "departements_id" =>"28",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "ORKADIERE",
               "departements_id" =>"28",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "VELINGARA",
               "departements_id" =>"29",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "RAO",
               "departements_id" =>"30",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NDIAYE",
               "departements_id" =>"31",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MBANE",
               "departements_id" =>"31",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "CAS CAS",
               "departements_id" =>"32",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "GAMADJI SARE",
               "departements_id" =>"32",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "THILE BOUBACAR",
               "departements_id" =>"32",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SALDE",
               "departements_id" =>"32",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DJIREDJI",
               "departements_id" =>"33",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DIENDE",
               "departements_id" =>"33",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DJIBABOUYA",
               "departements_id" =>"33",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BOGHAL",
               "departements_id" =>"34",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BONA",
               "departements_id" =>"34",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DIAROUME",
               "departements_id" =>"34",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DJIBANAR",
               "departements_id" =>"35",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SIMBANDI BRASSOU",
               "departements_id" =>"35",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KARANTABA",
               "departements_id" =>"35",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MAKACOLIBANTANG",
               "departements_id" =>"36",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MISSIRAH",
               "departements_id" =>"36",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KOUSSANAR",
               "departements_id" =>"36",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BOYNGUEL BAMBA",
               "departements_id" =>"37",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "DIANKE MAKHA",
               "departements_id" =>"37",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KOULOR",
               "departements_id" =>"37",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BALA",
               "departements_id" =>"37",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BELE",
               "departements_id" =>"38",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KENIEBA",
               "departements_id" =>"38",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MOUDERY",
               "departements_id" =>"38",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "BAMBA THIALENE",
               "departements_id" =>"39",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KOUTHIABA WOLOF",
               "departements_id" =>"39",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "THIES SUD",
               "departements_id" =>"40",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "THIES NORD",
               "departements_id" =>"40",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "THIENABA",
               "departements_id" =>"40",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KEUR MOUSSA",
               "departements_id" =>"40",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NOTTO",
               "departements_id" =>"40",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "FISSEL",
               "departements_id" =>"41",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SESSENE",
               "departements_id" =>"41",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SINDIA",
               "departements_id" =>"41",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MEOUANE",
               "departements_id" =>"42",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "MERINA DAKHAR",
               "departements_id" =>"42",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NIAKHENE",
               "departements_id" =>"42",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "PAMBAL",
               "departements_id" =>"42",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NIAGUIS",
               "departements_id" =>"43",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "NIASSIA",
               "departements_id" =>"43",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "KATABA 1",
               "departements_id" =>"44",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "TENGHORI",
               "departements_id" =>"44",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "TENDOUCK",
               "departements_id" =>"44",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "SINDIAN",
               "departements_id" =>"44",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "CABROUSSE",
               "departements_id" =>"45",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
          DB::table('arrondissements')->insert([
               "nom" => "LOUDIA OUOLOF",
               "departements_id" =>"45",
               'created_at' => now(),
               'updated_at' => now(),
               'uuid' => Str::uuid(),
                ]);
    }
}
