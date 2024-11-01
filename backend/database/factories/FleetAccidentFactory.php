<?php

namespace Database\Factories;

use App\Models\FleetAccident;
use Illuminate\Database\Eloquent\Factories\Factory;

class FleetAccidentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FleetAccident::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'year' => $this->faker->randomDigitNotNull,
        'transport_company' => $this->faker->text,
        'vehicle' => $this->faker->word,
        'number_of_accidents' => $this->faker->word
        ];
    }
}
