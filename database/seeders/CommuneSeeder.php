<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('communes')->insert([
             "nom" => "DAKAR PLATEAU", 
             "arrondissements_id" =>"1",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "FANN POINT E AMITIE", 
             "arrondissements_id" =>"1",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "GOREE", 
             "arrondissements_id" =>"1",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "GUEULE TAPEE FASS COLOBANE", 
             "arrondissements_id" =>"1",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "MEDINA",
            "arrondissements_id" =>"1",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "BISCUITERIE", 
             "arrondissements_id" =>"2",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "DIEUPPEUL DERKLE", 
             "arrondissements_id" =>"2",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "GRAND DAKAR", 
             "arrondissements_id" =>"2",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "HANN BEL AIR", 
             "arrondissements_id" =>"2",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "HLM",
             "arrondissements_id" => "2",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "SICAP LIBERTE", 
             "arrondissements_id" => "2",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "MERMOZ SACRE COEUR",
             "arrondissements_id" => "3",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "NGOR",
             "arrondissements_id" => "3",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "OUAKAM",
             "arrondissements_id" => "3",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "YOFF", 
             "arrondissements_id" => "3",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "CAMBERENE",
             "arrondissements_id" => "4",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "GRAND YOFF",
             "arrondissements_id" => "4",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "PARCELLES ASSAINIES",
             "arrondissements_id" => "4",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "PATTE D'OIE",
             "arrondissements_id" => "4",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "GOLF SUD",
             "arrondissements_id" => "5",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "MEDINA GOUNASS",
             "arrondissements_id" => "5",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "NDIAREME LIMAMOULAYE",
             "arrondissements_id" => "5",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "SAM NOTAIRE",
             "arrondissements_id" => "5",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "WAKHINANE NIMZAT", 
             "arrondissements_id" => "5",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "DALIFORT",
             "arrondissements_id" => "6",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "DJIDA THIAROYE KAO",
             "arrondissements_id" => "6",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "GUINAW RAIL NORD",
             "arrondissements_id" => " 6",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "GUINAW RAIL SUD",
             "arrondissements_id" => "6",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "PIKINE EST",
             "arrondissements_id" => " 6",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "PIKINE NORD",
             "arrondissements_id" => "6",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "PIKINE OUEST", 
             "arrondissements_id" => "6",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "DIAMAGUENE SICAP MBAO",
             "arrondissements_id" => "7",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "MBAO",
             "arrondissements_id" => "7",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "THIAROYE GARE",
             "arrondissements_id" => "7",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "THIAROYE SUR MER",
             "arrondissements_id" => "7",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "TIVAVOUANE DIAKSAO",
             "arrondissements_id" => "7",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "KEUR MASSAR",
             "arrondissements_id" => "8",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "MALIKA",
             "arrondissements_id" => "8",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "YEUMBEUL NORD",
             "arrondissements_id" => "8",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "YEUMBEUL SUD", 
             "arrondissements_id" => "8",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "RUFISQUE EST",
             "arrondissements_id" => "9",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "RUFISQUE NORD",
             "arrondissements_id" => "9",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "RUFISQUE OUEST",
             "arrondissements_id" => "9",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Bargny",
             "arrondissements_id" => "9",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Sébikotane",
             "arrondissements_id" => "9",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Sendou",
             "arrondissements_id" => "9",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Bambylor", 
             "arrondissements_id" => "10",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Yène", 
             "arrondissements_id" => "10",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Tivaouane Peulh-Niaga", 
             "arrondissements_id" => "10",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Diamniadio", 
             "arrondissements_id" => "10",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Sangalkam", 
             "arrondissements_id" => "10",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Jaxaay-Parcelles-Niakoul Rap",
             "arrondissements_id" => "10",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Diourbel", 
             "arrondissements_id" => "11",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Ndoulo", 
             "arrondissements_id" => "11",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Ngohe", 
             "arrondissements_id" => "11",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Pattar", 
             "arrondissements_id" => "11",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Tocky Gare", 
             "arrondissements_id" => "11",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Touré Mbondé", 
             "arrondissements_id" => "11",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Ndankh Séne", 
             "arrondissements_id" => "12",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Gade Escale", 
             "arrondissements_id" => "12",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Touba Lappé", 
             "arrondissements_id" => "12",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Keur Ngalgou", 
             "arrondissements_id" => "12",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Ndindy", 
             "arrondissements_id" => "12",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Taïba Moutoupha",
             "arrondissements_id" => "12",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Bambey", 
             "arrondissements_id" => "13",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Dinguiraye", 
             "arrondissements_id" => "13",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Baba Garage", 
             "arrondissements_id" => "13",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Keur Samba Kane",
             "arrondissements_id" => "13",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Ngoye", 
             "arrondissements_id" => "14",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Thiakhar", 
             "arrondissements_id" => "14",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Ndondol", 
             "arrondissements_id" => "14",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Ndangalma", 
             "arrondissements_id" => "14",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Lambaye", 
             "arrondissements_id" => "15",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Réfane", 
             "arrondissements_id" => "15",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Gawane", 
             "arrondissements_id" => "15",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Ngogom", 
             "arrondissements_id" => "15",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Mbacké", 
             "arrondissements_id" => "16",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Touba Mosquée", 
             "arrondissements_id" => "16",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Dalla Ngabou", 
             "arrondissements_id" => "16",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Missirah", 
             "arrondissements_id" => "16",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Nghaye", 
             "arrondissements_id" => "16",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Touba Fall", 
             "arrondissements_id" => "16",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Darou Salam Typ", 
             "arrondissements_id" => "17",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Darou Nahim", 
             "arrondissements_id" => "17",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Kael", 
             "arrondissements_id" => "17",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Madina", 
             "arrondissements_id" => "17",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Touba Mboul", 
             "arrondissements_id" => "17",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Taïba Thièkène", 
             "arrondissements_id" => "17",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Dendèye Gouy Gui", 
             "arrondissements_id" => "17",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Ndioumane", 
             "arrondissements_id" => "17",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Taïf", 
             "arrondissements_id" => "18",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Sadio", 
             "arrondissements_id" => "18",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Fatick", 
             "arrondissements_id" => "18",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Dioffior",
             "arrondissements_id" => "18",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Thiaré Ndialgui", 
             "arrondissements_id" => "19",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Diaoulé", 
             "arrondissements_id" => "19",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Mbéllacadiao", 
             "arrondissements_id" => "19",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
         DB::table('communes')->insert([
             "nom" => "Ndiop", 
             "arrondissements_id" => "19",
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diakhao", 
             "arrondissements_id" => "19",       
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Djilasse", 
             "arrondissements_id" => "20",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Fimela", 
             "arrondissements_id" => "20",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Loul Sessène", 
             "arrondissements_id" => "20",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Palmarin Facao", 
             "arrondissements_id" => "20",         
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Niakhar", 
             "arrondissements_id" =>"21",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ngayokhème", 
             "arrondissements_id" =>"21",       
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Patar", 
             "arrondissements_id" =>"21",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diarrère", 
             "arrondissements_id" =>"22",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diouroup", 
             "arrondissements_id" =>"22",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Tattaguine", 
             "arrondissements_id" =>"22",         
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Foundiougne",
             "arrondissements_id" =>"23",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sokone", 
             "arrondissements_id" =>"23",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Keur Saloum Diané",
             "arrondissements_id" =>"24",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Keur Samba Gueye",
             "arrondissements_id" =>"24",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Toubacouta",
             "arrondissements_id" =>"24",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Nioro Alassane Tall",
             "arrondissements_id" =>"24",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Karang Poste",
             "arrondissements_id" =>"24",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Passy",
             "arrondissements_id" =>"25",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Soum",
             "arrondissements_id" =>"25",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diossong",
             "arrondissements_id" =>"25",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Djilor",
             "arrondissements_id" =>"25",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Niassène",
             "arrondissements_id" =>"25",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diagane Barka",
             "arrondissements_id" =>"25",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbam",
             "arrondissements_id" =>"25",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bassoul",
             "arrondissements_id" =>"26",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dionewar",
             "arrondissements_id" =>"26",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Djirnda",
             "arrondissements_id" =>"26",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gossas",
             "arrondissements_id" =>"27",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Colobane",
             "arrondissements_id" =>"27",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbar",
             "arrondissements_id" =>"27",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiene Lagane",
             "arrondissements_id" =>"28",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ouadiour",
             "arrondissements_id" =>"28",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Patar Lia", 
             "arrondissements_id" =>"8",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kaffrine",
             "arrondissements_id" =>"29",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Nganda",
             "arrondissements_id" =>"29",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diamagadio",
             "arrondissements_id" =>"29",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diokoul Belbouck",
             "arrondissements_id" =>"29",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kathiotte",
             "arrondissements_id" =>"29",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Médinatoul Salam 2", 
             "arrondissements_id" =>"29",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gniby",
             "arrondissements_id" =>"30",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Boulel",
             "arrondissements_id" =>"30",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kahi",
             "arrondissements_id" =>"30",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Birkelane",
             "arrondissements_id" =>"31",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Keur Mboucki",
             "arrondissements_id" =>"31",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Touba Mbella",
             "arrondissements_id" =>"31",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diamal", 
             "arrondissements_id" =>"31",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mabo",
             "arrondissements_id" =>"32",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiognick",
             "arrondissements_id" =>"32",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ségré-gatta",
             "arrondissements_id" =>"32",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbeuleup",
             "arrondissements_id" =>"32",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Malème-Hodar",
             "arrondissements_id" =>"33",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Darou Miname II",
             "arrondissements_id" =>"33",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Khelcom",
             "arrondissements_id" =>"33",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndioum Ngainth",
             "arrondissements_id" =>"33",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiobène Samba Lamo",
             "arrondissements_id" =>"33",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sagna",
             "arrondissements_id" =>"34",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dianké Souf",
             "arrondissements_id" =>"34",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Koungheul",
             "arrondissements_id" =>"35",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Missirah Wadène",
             "arrondissements_id" =>"35",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Maka Yop",
             "arrondissements_id" =>"35",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ngainthe Pathé", 
             "arrondissements_id" =>"5 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Fass Thièkène",
             "arrondissements_id" =>"36",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Saly Escale",
             "arrondissements_id" =>"36",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ida Mouride",
             "arrondissements_id" =>"36",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ribot Escale",
             "arrondissements_id" =>"37",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Lour Escale",
             "arrondissements_id" =>"37",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kaolack",
             "arrondissements_id" =>"37",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kahone", 
             "arrondissements_id" =>"7 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Keur Baka",
             "arrondissements_id" =>"38",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Latmingué",
             "arrondissements_id" =>"38",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiaré",
             "arrondissements_id" =>"38",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndoffane",
             "arrondissements_id" =>"38",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Keur Socé",
             "arrondissements_id" =>"39",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiaffate",
             "arrondissements_id" =>"39",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiedieng", 
             "arrondissements_id" =>"9",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dya",
             "arrondissements_id" =>"40",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiébel",
             "arrondissements_id" =>"40",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiomby",
             "arrondissements_id" =>"40",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gandiaye",
             "arrondissements_id" =>"40",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sibassor",
             "arrondissements_id" =>"40",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Guinguinéo",
             "arrondissements_id" =>"41",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Khelcom – Birane",
             "arrondissements_id" =>"41",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbadakhoune",
             "arrondissements_id" =>"41",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiago",
             "arrondissements_id" =>"41",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ngathie Naoudé",
             "arrondissements_id" =>"41",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Fass",
             "arrondissements_id" =>"41",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gagnick",
             "arrondissements_id" =>"42",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dara Mboss",
             "arrondissements_id" =>"42",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Nguélou",
             "arrondissements_id" =>"42",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ourour",
             "arrondissements_id" =>"42",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Panal Ouolof",
             "arrondissements_id" =>"42",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mboss", 
             "arrondissements_id" =>"2",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Nioro du Rip",
             "arrondissements_id" =>"43",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kayemor",
             "arrondissements_id" =>"43",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Médina Sabakh",
             "arrondissements_id" =>"43",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ngayene",
             "arrondissements_id" =>"43",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gainthe Kaye",
             "arrondissements_id" =>"44",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dabaly",
             "arrondissements_id" =>"44",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Darou Salam",
             "arrondissements_id" =>"44",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Paos Koto",
             "arrondissements_id" =>"44",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Porokhane",
             "arrondissements_id" =>"44",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Taïba Niassène", 
             "arrondissements_id" =>"4 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Keur Maba Diakhou",
             "arrondissements_id" =>"45",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Keur Madongo",
             "arrondissements_id" =>"45",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndramé Escale",
             "arrondissements_id" =>"44",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Wack Ngouna",
             "arrondissements_id" =>"44",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Keur Madiabel", 
             "arrondissements_id" =>"44",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kédougou",
             "arrondissements_id" =>"46",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ninéfécha",
             "arrondissements_id" =>"46",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bandafassi",
             "arrondissements_id" =>"46",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Tomboroncoto",
             "arrondissements_id" =>"46",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dindefelo", 
             "arrondissements_id" =>"6",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Fongolimbi",
             "arrondissements_id" =>"47",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dimboli",
             "arrondissements_id" =>"47",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Salémata",
             "arrondissements_id" =>"48",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kévoye",
             "arrondissements_id" =>"48",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dakatéli",
             "arrondissements_id" =>"48",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ethiolo",
             "arrondissements_id" =>"49",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Oubadji",
             "arrondissements_id" =>"49",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dar salam", 
             "arrondissements_id" =>"9",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Saraya",
             "arrondissements_id" =>"50",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bembou",
             "arrondissements_id" =>"50",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Médina Baffé",
             "arrondissements_id" =>"50",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sabodala",
             "arrondissements_id" =>"51",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Khossanto",
             "arrondissements_id" =>"51",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Missirah Sirimana", 
             "arrondissements_id" =>"1",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kolda",
             "arrondissements_id" =>"52",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dialambéré",
             "arrondissements_id" =>"52",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Médina Chérif",
             "arrondissements_id" =>"52",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mampatim",
             "arrondissements_id" =>"52",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Coumbacara",
             "arrondissements_id" =>"52",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bagadadji",
             "arrondissements_id" =>"52",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dabo",
             "arrondissements_id" =>"52",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiétty",
             "arrondissements_id" =>"53",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Saré Bidji", 
             "arrondissements_id" =>"3 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Guiro Yéro Bocar",
             "arrondissements_id" =>"54",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dioulacolon",
             "arrondissements_id" =>"54",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Tankanto Escale",
             "arrondissements_id" =>"54",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Médina El hadj",
             "arrondissements_id" =>"54",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Salykégné",
             "arrondissements_id" =>"54",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Saré Yoba Diéga",
             "arrondissements_id" =>"54",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Médina Yoro Foulah",
             "arrondissements_id" =>"55",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Badion",
             "arrondissements_id" =>"55",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Fafacourou",
             "arrondissements_id" =>"55",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bourouco",
             "arrondissements_id" =>"55",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bignarabé",
             "arrondissements_id" =>"55",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndorna",
             "arrondissements_id" =>"55",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Koulinto",
             "arrondissements_id" =>"55",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Niaming",
             "arrondissements_id" =>"56",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dinguiraye",
             "arrondissements_id" =>"56",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Pata",
             "arrondissements_id" =>"56",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kéréwane",
             "arrondissements_id" =>"56",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Vélingara",
             "arrondissements_id" =>"57",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diaobé-Kabendou",
             "arrondissements_id" =>"57",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kounkané",
             "arrondissements_id" =>"57",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kandia",
             "arrondissements_id" =>"57",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Saré Coly Sallé",
             "arrondissements_id" =>"57",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kandiaye",
             "arrondissements_id" =>"57",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Némataba",
             "arrondissements_id" =>"57",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Pakour",
             "arrondissements_id" =>"58",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Paroumba",
             "arrondissements_id" =>"58",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ouassadou", 
             "arrondissements_id" =>"8",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bonconto",
             "arrondissements_id" =>"59",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Linkering",
             "arrondissements_id" =>"59",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Médina Gounass",
             "arrondissements_id" =>"59",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sinthiang Koundara", 
             "arrondissements_id" =>"9 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Louga",
             "arrondissements_id" =>"60",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Coki",
             "arrondissements_id" =>"60",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiagne",
             "arrondissements_id" =>"60",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Guet Ardo",
             "arrondissements_id" =>"60",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiamène Cayor",
             "arrondissements_id" =>"60",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Pété Ouarack",
             "arrondissements_id" =>"60",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Keur Momar Sarr",
             "arrondissements_id" =>"61",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Nguer Malal",
             "arrondissements_id" =>"61",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Syer",
             "arrondissements_id" =>"61",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gande", 
             "arrondissements_id" =>"1",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbédiene",
             "arrondissements_id" =>"62",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Niomré",
             "arrondissements_id" =>"62",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Nguidilé",
             "arrondissements_id" =>"62",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kéle Gueye", 
             "arrondissements_id" =>"2 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Léona",
             "arrondissements_id" =>"63",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sakal",
             "arrondissements_id" =>"63",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ngueune Sarr",
             "arrondissements_id" =>"63",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kébémer",
             "arrondissements_id" =>"64",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bandegne Ouolof",
             "arrondissements_id" =>"64",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diokoul Diawrigne",
             "arrondissements_id" =>"64",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kab Gaye",
             "arrondissements_id" =>"64",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndande",
             "arrondissements_id" =>"64",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thieppe",
             "arrondissements_id" =>"64",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Guéoul", 
             "arrondissements_id" =>"4 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbacké Cajor",
             "arrondissements_id" =>"65",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Darou Marnane",
             "arrondissements_id" =>"65",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Darou Mousty",
             "arrondissements_id" =>"65",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbadiane",
             "arrondissements_id" =>"65",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndoyene",
             "arrondissements_id" =>"65",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sam Yabal",
             "arrondissements_id" =>"65",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Touba Mérina",
             "arrondissements_id" =>"65",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ngourane Ouolof",
             "arrondissements_id" =>"66",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiolom Fall",
             "arrondissements_id" =>"66",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sagatta Gueth",
             "arrondissements_id" =>"66",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kanène Ndiob",
             "arrondissements_id" =>"66",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Loro",
             "arrondissements_id" =>"66",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Linguére",
             "arrondissements_id" =>"67",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dahra",
             "arrondissements_id" =>"67",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Barkédji",
             "arrondissements_id" =>"67",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gassane",
             "arrondissements_id" =>"67",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiargny",
             "arrondissements_id" =>"67",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiel", 
             "arrondissements_id" =>"7",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Boulal",
             "arrondissements_id" =>"68",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dealy",
             "arrondissements_id" =>"68",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiamène Pass",
             "arrondissements_id" =>"68",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sagatta Djolof",
             "arrondissements_id" =>"68",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Affé Djiolof",
             "arrondissements_id" =>"68",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dodji",
             "arrondissements_id" =>"69",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Labgar",
             "arrondissements_id" =>"69",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ouarkhokh", 
             "arrondissements_id" =>"9",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kamb",
             "arrondissements_id" =>"70",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mboula",
             "arrondissements_id" =>"70",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Téssékéré Forage",
             "arrondissements_id" =>"70",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Yang-Yang",
             "arrondissements_id" =>"70",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbeuleukhé", 
             "arrondissements_id" =>"70",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Matam",
             "arrondissements_id" =>"71",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ourossogui",
             "arrondissements_id" =>"71",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thilogne",
             "arrondissements_id" =>"71",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Nguidjilone",
             "arrondissements_id" =>"71",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dabia",
             "arrondissements_id" =>"71",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Des Agnam",
             "arrondissements_id" =>"71",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Oréfondé",
             "arrondissements_id" =>"71",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bokidiawé",
             "arrondissements_id" =>"72",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Nabadji Civol",
             "arrondissements_id" =>"72",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ogo",
             "arrondissements_id" =>"72",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kanel",
             "arrondissements_id" =>"73",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Odobéré",
             "arrondissements_id" =>"73",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Wouro Sidy",
             "arrondissements_id" =>"73",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndendory",
             "arrondissements_id" =>"73",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sinthiou Bamambé",
             "arrondissements_id" =>"73",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Banadji Hamady Hounaré", 
             "arrondissements_id" =>"3 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Aouré",
             "arrondissements_id" =>"74",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bokiladji",
             "arrondissements_id" =>"74",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Orkadiéré",
             "arrondissements_id" =>"74",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ouaoundé",
             "arrondissements_id" =>"74",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Semmé",
             "arrondissements_id" =>"74",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dembancané", 
             "arrondissements_id" =>"4 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ranérou",
             "arrondissements_id" =>"75",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Lougré Thioly",
             "arrondissements_id" =>"75",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Oudalaye",
             "arrondissements_id" =>"75",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Vélingara", 
             "arrondissements_id" =>"5",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Saint Louis",
             "arrondissements_id" =>"76",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mpal",
             "arrondissements_id" =>"76",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Fass Ngom",
             "arrondissements_id" =>"76",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiébène Gandiol",
             "arrondissements_id" =>"76",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gandon", 
             "arrondissements_id" =>"6 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dagana",
             "arrondissements_id" =>"77",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Richard Toll",
             "arrondissements_id" =>"77",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ross-Béthio",
             "arrondissements_id" =>"77",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Rosso-Sénégal",
             "arrondissements_id" =>"77",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ngnith",
             "arrondissements_id" =>"77",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diama",
             "arrondissements_id" =>"77",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ronkh", 
             "arrondissements_id" =>"7",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndombo Sandjiry",
             "arrondissements_id" =>"78",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gae",
             "arrondissements_id" =>"78",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bokhol",
             "arrondissements_id" =>"78",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbane", 
             "arrondissements_id" =>"8",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndioum",
             "arrondissements_id" =>"79",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Podor",
             "arrondissements_id" =>"79",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Méry",
             "arrondissements_id" =>"79",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Doumga Lao",
             "arrondissements_id" =>"79",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Madina Diathbé",
             "arrondissements_id" =>"79",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Golléré",
             "arrondissements_id" =>"79",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mboumba",
             "arrondissements_id" =>"79",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Walaldé",
             "arrondissements_id" =>"79",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Aéré Lao",
             "arrondissements_id" =>"79",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gamadji Saré",
             "arrondissements_id" =>"80",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dodel",
             "arrondissements_id" =>"80",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Guedé Village",
             "arrondissements_id" =>"80",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Guédé Chantier",
             "arrondissements_id" =>"80",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Démette",
             "arrondissements_id" =>"80",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bodé Lao",
             "arrondissements_id" =>"80",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Fanaye",
             "arrondissements_id" =>"81",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiayene Peindao",
             "arrondissements_id" =>"81",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiandane", 
             "arrondissements_id" =>"1",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbolo Birane",
             "arrondissements_id" =>"82",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Boké Dialloubé",
             "arrondissements_id" =>"82",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Galoya Toucouleur",
             "arrondissements_id" =>"82",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Pété",
             "arrondissements_id" =>"82",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sédhiou",
             "arrondissements_id" =>"83",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Marssassoum",
             "arrondissements_id" =>"83",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Djiredji",
             "arrondissements_id" =>"83",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bambaly",
             "arrondissements_id" =>"83",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Oudoucar",
             "arrondissements_id" =>"84",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sama Kanta Peulh",
             "arrondissements_id" =>"84",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diannah Ba",
             "arrondissements_id" =>"84",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Koussy",
             "arrondissements_id" =>"84",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sakar",
             "arrondissements_id" =>"84",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diendé",
             "arrondissements_id" =>"84",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diannah Malary", 
             "arrondissements_id" =>"4 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "San Samba",
             "arrondissements_id" =>"85",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bémet Bidjini",
             "arrondissements_id" =>"85",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Djibabouya", 
             "arrondissements_id" =>"5 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bounkiling",
             "arrondissements_id" =>"86",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiamacouta",
             "arrondissements_id" =>"86",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Boghal",
             "arrondissements_id" =>"86",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Tankon",
             "arrondissements_id" =>"86",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiamalathiel",
             "arrondissements_id" =>"86",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Djinany",
             "arrondissements_id" =>"86",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diacounda",
             "arrondissements_id" =>"87",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Inor",
             "arrondissements_id" =>"87",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kandion Mangana",
             "arrondissements_id" =>"87",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bona",
             "arrondissements_id" =>"87",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diambati",
             "arrondissements_id" =>"88",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Faoune",
             "arrondissements_id" =>"88",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diaroumé",
             "arrondissements_id" =>"88",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Madina Wandifa", 
             "arrondissements_id" =>"8 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Goudomp",
             "arrondissements_id" =>"89",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diattacounda",
             "arrondissements_id" =>"89",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Samine",
             "arrondissements_id" =>"89",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Yarang Balante",
             "arrondissements_id" =>"89",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mangaroungou Santo",
             "arrondissements_id" =>"89",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Simbandi Balante",
             "arrondissements_id" =>"89",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Djibanar",
             "arrondissements_id" =>"89",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kaour", 
             "arrondissements_id" =>"9",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diouboudou",
             "arrondissements_id" =>"90",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Simbandi Brassou",
             "arrondissements_id" =>"90",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Baghère",
             "arrondissements_id" =>"90",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Niagha",
             "arrondissements_id" =>"90",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Tanaff", 
             "arrondissements_id" =>"90",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Karantaba",
             "arrondissements_id" =>"91",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kolibantang",
             "arrondissements_id" =>"91",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Tambacounda",
             "arrondissements_id" =>"92",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Niani Toucouleur",
             "arrondissements_id" =>"92",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Makacolibantang",
             "arrondissements_id" =>"92",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndoga Babacar", 
             "arrondissements_id" =>"2",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Missirah",
             "arrondissements_id" =>"93",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Néttéboulou",
             "arrondissements_id" =>"93",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dialacoto", 
             "arrondissements_id" =>"3",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sinthiou Malème",
             "arrondissements_id" =>"94",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Koussanar", 
             "arrondissements_id" =>"4",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kothiary",
             "arrondissements_id" =>"94",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Goudiry",
             "arrondissements_id" =>"94",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Boynguel Bamba",
             "arrondissements_id" =>"95",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sinthiou Mamadou",
             "arrondissements_id" =>"95",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Koussan",
             "arrondissements_id" =>"95",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dougué", 
             "arrondissements_id" =>"5 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Dianké Makha",
             "arrondissements_id" =>"96",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Boutoucoufara",
             "arrondissements_id" =>"96",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bani Israel",
             "arrondissements_id" =>"96",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sinthiou Bocar Aly",
             "arrondissements_id" =>"97",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Koulor",
             "arrondissements_id" =>"97",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Komoti", 
             "arrondissements_id" =>"7 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bala",
             "arrondissements_id" =>"98",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Koar",
             "arrondissements_id" =>"98",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Goumbayel", 
             "arrondissements_id" =>"8",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bakel",
             "arrondissements_id" =>"99",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bélé",
             "arrondissements_id" =>"99",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sinthiou Fissa",
             "arrondissements_id" =>"99",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kidira", 
             "arrondissements_id" =>"99",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Toumboura",
             "arrondissements_id" =>"100",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sadatou",
             "arrondissements_id" =>"100",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Madina Foulbé",
             "arrondissements_id" =>"100",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gathiary", 
             "arrondissements_id" =>"100",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Moudery",
             "arrondissements_id" =>"101",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ballou",
             "arrondissements_id" =>"101",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Gabou",
             "arrondissements_id" =>"101",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diawara",
             "arrondissements_id" =>" 101",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Koumpentoum",
             "arrondissements_id" =>"102",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Malem Niany",
             "arrondissements_id" =>"102",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndame",
             "arrondissements_id" =>"102",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Méréto",
             "arrondissements_id" =>"102",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kahène",
             "arrondissements_id" =>"102",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bamba Thialène",
             "arrondissements_id" =>"102",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Payar",
             "arrondissements_id" =>"103",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kouthiaba",
             "arrondissements_id" =>"103",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kouthia Gaydi",
             "arrondissements_id" =>"103",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Pass Coto",
             "arrondissements_id" =>"103",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Malem Niany",
             "arrondissements_id" =>"103",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ville de Thiès",
             "arrondissements_id" =>"104",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Khombole",
             "arrondissements_id" =>"104",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Pout",
             "arrondissements_id" =>"104",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiès Ouest",
             "arrondissements_id" =>"104",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiès Est", 
             "arrondissements_id" =>"104 ",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiès Nord",
             "arrondissements_id" =>"105",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiénaba",
             "arrondissements_id" =>"106",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ngoudiane",
             "arrondissements_id" =>"106",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiéyène Sirakh",
             "arrondissements_id" =>"106",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Touba Toul",
             "arrondissements_id" =>"106",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Keur Moussa",
             "arrondissements_id" =>"107",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diender",
             "arrondissements_id" =>"107",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Fandène",
             "arrondissements_id" =>"107",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kayar", 
             "arrondissements_id" =>"107",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Notto",
             "arrondissements_id" =>"108",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Tassète",
             "arrondissements_id" =>" 08",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbour",
             "arrondissements_id" =>"109",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Joal Fadiouth",
             "arrondissements_id" =>"109",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Fissel",
             "arrondissements_id" =>"109",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ndiaganiao",
             "arrondissements_id" =>"109",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sessene",
             "arrondissements_id" =>" 110",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sandiara",
             "arrondissements_id" =>"110",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Nguéniène",
             "arrondissements_id" =>"110",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thiadiaye", 
             "arrondissements_id" =>"110",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sindia",
             "arrondissements_id" =>"111",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Malicounda",
             "arrondissements_id" =>" 111",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diass",
             "arrondissements_id" =>"111",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Nguékhokh",
             "arrondissements_id" =>"111",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Saly Portudal",
             "arrondissements_id" =>"111",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ngaparou",
             "arrondissements_id" =>"111",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Somone",
             "arrondissements_id" =>"111",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Popenguine-Ndayane",
             "arrondissements_id" =>"111",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Tivaouane",
             "arrondissements_id" =>"112",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mékhé",
             "arrondissements_id" =>"112",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mboro",
             "arrondissements_id" =>"112",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Méouane",
             "arrondissements_id" =>"112",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Darou Khoudoss",
             "arrondissements_id" =>"112",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Taïba Ndiaye", 
             "arrondissements_id" =>"112",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mérina Dakhar",
             "arrondissements_id" =>"113",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Koul",
             "arrondissements_id" =>"113",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Pékèsse",
             "arrondissements_id" =>"113",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Niakhène",
             "arrondissements_id" =>"114",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mbayène",
             "arrondissements_id" =>"114",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thilmakha",
             "arrondissements_id" =>"114",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ngandiouf", 
             "arrondissements_id" =>"114",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Notto Gouye Diama",
             "arrondissements_id" =>"115",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mont Rolland",
             "arrondissements_id" =>"115",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Pire Goureye",
             "arrondissements_id" =>"115",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Chérif Lo",
             "arrondissements_id" =>"115",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Pambal",
             "arrondissements_id" =>"115",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ziguinchor",
             "arrondissements_id" =>"116",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Niaguis",
             "arrondissements_id" =>"116",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Adéane",
             "arrondissements_id" =>"116",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Boutoupa Camaracounda", 
             "arrondissements_id" =>"116",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Niassia",
             "arrondissements_id" =>"117",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Enampore", 
             "arrondissements_id" =>"117",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Bignona",
             "arrondissements_id" =>"118",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Thionck Essyl",
             "arrondissements_id" =>"118",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kataba 1",
             "arrondissements_id" =>"118",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Djinaky",
             "arrondissements_id" =>"118",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kafountine",
             "arrondissements_id" =>"118",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diouloulou",
             "arrondissements_id" =>"118",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Tenghori",
             "arrondissements_id" =>"119",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Niamone",
             "arrondissements_id" =>"119",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Ouonck",
             "arrondissements_id" =>"119",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Coubalan", 
             "arrondissements_id" =>"119",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Balinghore",
             "arrondissements_id" =>"120",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diégoune",
             "arrondissements_id" =>"120",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Kartiack",
             "arrondissements_id" =>"120",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mangagoulack",
             "arrondissements_id" =>"120",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mlomp", 
             "arrondissements_id" =>"120",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Djibidione",
             "arrondissements_id" =>"121",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Oulampane",
             "arrondissements_id" =>"121",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Sindian",
             "arrondissements_id" =>"121",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Suelle",
             "arrondissements_id" =>"121",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Oussouye",
             "arrondissements_id" =>"122",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Diembéring",
             "arrondissements_id" =>"122",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Santhiaba Manjack", 
             "arrondissements_id" =>"122",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Oukout",
             "arrondissements_id" =>"123",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
        DB::table('communes')->insert([
             "nom" => "Mlomp",
             "arrondissements_id" =>"123",        
             'created_at' => now(),
             'updated_at' => now(),
             'uuid' => Str::uuid(),
              ]);
    }
}
