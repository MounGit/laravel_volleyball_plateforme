<?php

namespace Database\Factories;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class JoueurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Joueur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lastName(),
            'firstname' => $this->faker->firstName(),
            'age' => $this->faker->numberBetween(18, 35),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'gender' => "Femme",
            'country' => $this->faker->country(),
            'role_id' => $this->faker->numberBetween(1, count(Role::all())),
            'equipe_id' => $this->faker->numberBetween(1, count(Equipe::all()))
        ];
    }
}
