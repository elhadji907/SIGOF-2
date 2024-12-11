<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Departement;
use App\Helpers\SnNameGenerator as SnmG;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();
       /*  $gender = $faker->randomElement(['1', '2']); */
        $nombre1 = rand(1, 2);
        $nombre2 = rand(100, 999);
        $nombre3 = rand(1965, 1998);
        $nombre4 = rand(1, 9);
        $nombre5 = rand(0, 9);
        $nombre6 = rand(0, 9);
        $nombre7 = rand(0, 9);
        $nombre8 = rand(0, 9);
        /* $nombre9 = rand(0, 9); */

        $departements_id   =   Departement::all()->random()->id;
        $departement       =   Departement::findOrFail($departements_id);
        $cin = $nombre1.$nombre2.$nombre3.$nombre4.$nombre5.$nombre6.$nombre7.$nombre8;


        return [
            /* 'civilite' => $gender, */
            /* 'firstname' => fake()->name(),
            'name' => fake()->name(), */
            /* 'telephone' => $this->faker->unique(true)->numberBetween(70, 79) . rand(10, 99) . rand(10, 99) . rand(0, 9) . rand(0, 9) . rand(0, 9),
            'adresse' => fake()->address(),
            'lieu_naissance' => fake()->address(), */
            'civilite'                          => $this->faker->randomElement($array = array('M.', 'Mme')),
            'cin'                               => $cin,
            'firstname'                         => SnmG::getFirstName(),
            'name'                              => SnmG::getName(),
            'date_naissance'                    => $this->faker->dateTimeBetween('-35 years', '-18 years'),
            'telephone'                         => $this->faker->unique(true)->numberBetween(70, 79) . rand(10, 99) . rand(10, 99) . rand(0, 9) . rand(0, 9) . rand(0, 9),
            'fixe'                              => $this->faker->unique(true)->numberBetween(70, 79) . rand(10, 99) . rand(10, 99) . rand(0, 9) . rand(0, 9) . rand(0, 9),
            'telephone_secondaire'              => $this->faker->unique(true)->numberBetween(70, 79) . rand(10, 99) . rand(10, 99) . rand(0, 9) . rand(0, 9) . rand(0, 9),
            'situation_familiale'               => $this->faker->randomElement($array = array('Marié(e)', 'Célibataire', 'Veuf(ve)', 'Divorsé(e)')),
            'situation_professionnelle'         => $this->faker->randomElement($array = array('Employé(e)', 'Informel', 'Elève ou étudiant', 'Chercheur emploi', 'Stage ou période essai', 'Entrepreneur ou freelance')),
            'adresse'                           => fake()->address(),
            'lieu_naissance'                    => $departement->nom,
            'email'                             => fake()->unique()->safeEmail(),
            'username'                          => $faker->username,
            /* 'email_verified_at'                 => now(), */
            'password'                          => static::$password ??= Hash::make('password'),
            'remember_token'                    => Str::random(10),
            /* 'date_naissance' => $faker->date($format = 'Y-m-d', $max = '-20 years'), */
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
