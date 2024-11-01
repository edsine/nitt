<?php

namespace Database\Factories;

use App\Models\MaritimeAdministration;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaritimeAdministrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MaritimeAdministration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->word,
        'nigerian_sea_fearers_count' => $this->faker->word,
        'foreign_sea_fearers_count' => $this->faker->word,
        'number_of_vessels_registered' => $this->faker->word,
        'number_of_ships_cabotage' => $this->faker->word,
        'number_of_accidents' => $this->faker->word,
        'number_of_piracy_attacks' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
