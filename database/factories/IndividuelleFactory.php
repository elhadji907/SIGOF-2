<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Module;
use App\Models\Departement;
use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Individuelle>
 */
class IndividuelleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $modules_id        =   Module::where('name', 'Mécanique')
            ->orwhere('name', "Conduite d'engins de TP")
            ->orwhere('name', "Bétonnage")
            ->orwhere('name', "Topographie")
            ->orwhere('name', "Ferraillage")
            ->orwhere('name', "Plomberie (Installations sanitaires)")
            ->orwhere('name', "Electricité")
            ->orwhere('name', "Techniques de pose de pavés")
            ->get()
            ->random()
            ->id;

        $departements_id   =   Departement::all()->random()->id;
        $departement       =   Departement::findOrFail($departements_id);
        $regions_id        =   $departement->region->id;


        $annee = date('y');
        $rand = rand(0, 999);
        $letter1 = chr(rand(65, 90));
        $letter2 = chr(rand(65, 90));
        $random = $letter1 . '' . $rand . '' . $letter2;
        $longueur = strlen($random);

        if ($longueur == 1) {
            $numero_individuelle   =   strtoupper("0000" . $random);
        } elseif ($longueur >= 2 && $longueur < 3) {
            $numero_individuelle   =   strtoupper("000" . $random);
        } elseif ($longueur >= 3 && $longueur < 4) {
            $numero_individuelle   =   strtoupper("00" . $random);
        } elseif ($longueur >= 4 && $longueur < 5) {
            $numero_individuelle   =   strtoupper("0" . $random);
        } else {
            $numero_individuelle   =   strtoupper($random);
        }
        $numero_individuelle = 'I' . $annee . $numero_individuelle;

        return [
            'date_depot'                            =>      $this->faker->dateTimeBetween('-1 years', '-0 years'),
            'niveau_etude'                          =>      $this->faker->randomElement($array = array('Aucun', 'Arabe', 'Elementaire', 'Secondaire', 'Supérieur', 'Moyen')),
            'numero'                                =>      $numero_individuelle,
            'telephone'                             =>      $this->faker->unique(true)->numberBetween(70, 79) . rand(10, 99) . rand(10, 99) . rand(0, 9) . rand(0, 9) . rand(0, 9),
            'statut'                                =>      $this->faker->randomElement($array = array('nouvelle', 'attente')),
            'qualification'                         =>      $this->faker->word,
            'projetprofessionnel'                   =>      $this->faker->text,
            'projet_poste_formation'                =>      $this->faker->randomElement($array = array('Poursuivre mes études', 'Chercher un emploi', 'Lancer mon entreprise', 'Retourner dans mon entreprise', 'Aucun de ces projets')),
            'diplome_academique'                    =>      $this->faker->randomElement($array = array('Aucun', 'Arabe', 'CFEE', 'BFEM', 'BAC', 'Licence', 'Master 2', 'Doctorat', 'Autre')),
            'autre_diplome_academique'              =>      $this->faker->randomElement($array = array('Aucun', 'Arabe', 'CFEE', 'BFEM', 'BAC', 'Licence', 'Master 2', 'Doctorat', 'Autre')),
            'option_diplome_academique'             =>      $this->faker->randomElement($array = array('Littéraire', 'Science', 'Technologie', 'Arabe')),
            'etablissement_professionnel'           =>      SnmG::getEtablissement(),
            'diplome_professionnel'                 =>      SnmG::getDiplome(),
            'autre_diplome_professionnel'           =>      SnmG::getDiplome(),
            'etablissement_academique'              =>      SnmG::getEtablissement(),
            'specialite_diplome_professionnel'      =>      $this->faker->word,
            'adresse'                               =>      fake()->address(),

            'regions_id'            => function () use ($regions_id) {
                return $regions_id;
            },
            'departements_id'       => function () use ($departements_id) {
                return $departements_id;
            },
            'modules_id'            => function () use ($modules_id) {
                return $modules_id;
            },
            'users_id'              => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
