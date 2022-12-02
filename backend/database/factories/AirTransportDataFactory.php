<?php

namespace Database\Factories;

use App\Models\AirTransportData;
use Illuminate\Database\Eloquent\Factories\Factory;

class AirTransportDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AirTransportData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->word,
        'number_of_domestic_registered_airlines' => $this->faker->word,
        'number_of_international_registered_airlines' => $this->faker->word,
        'number_of_domestic_deregistered_airlines' => $this->faker->word,
        'number_of_international_deregistered_airlines' => $this->faker->word,
        'number_of_near_accidents' => $this->faker->word,
        'number_of_accidents' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
