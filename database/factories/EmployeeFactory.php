<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Direction;
use App\Models\Fonction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories_id = Category::all()->random()->id;
        $fonctions_id = Fonction::all()->random()->id;
        $directions_id = Direction::all()->random()->id;

        $letter = chr(rand(65, 90));
        $nombre1 = rand(1, 2);
        $nombre2 = rand(100, 999);
        $nombre3 = rand(1965, 1998);
        $nombre4 = rand(1, 9);
        $nombre5 = rand(0, 9);
        $nombre6 = rand(0, 9);
        $nombre7 = rand(0, 9);
        $nombre8 = rand(0, 9);
        $nombre9 = rand(0, 9);

        $matricule = $nombre4 . $nombre5 . $nombre6 . $nombre7 . $nombre8 . $nombre9 . '/' . $letter;
        /* $cin = $nombre1 . $nombre2 . $nombre3 . $nombre4 . $nombre5 . $nombre6 . $nombre7 . $nombre8 . $nombre9; */
        return [
            'matricule' => $matricule,
            'adresse' => $this->faker->address,
            /* 'cin' =>  $cin, */
            'date_embauche' => $this->faker->dateTime(),
            'classification' => $this->faker->word,
            'categorie_salaire' => $this->faker->word,
            'users_id' => function () {
                return User::factory()->create()->id;
            },
            'categories_id' => function () use ($categories_id) {
                return $categories_id;
            },
            'fonctions_id' => function () use ($fonctions_id) {
                return $fonctions_id;
            },
            'directions_id' => function () use ($directions_id) {
                return $directions_id;
            },
        ];
    }
}
