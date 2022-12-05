<?php

namespace Database\Factories;

use App\Models\RailwayPassenger;
use Illuminate\Database\Eloquent\Factories\Factory;

class RailwayPassengerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RailwayPassenger::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->word,
        'number_of_urban_passengers_carried' => $this->faker->word,
        'number_of_regional_passengers_carried' => $this->faker->word,
        'freight_carried' => $this->faker->word,
        'number_of_freight_trains' => $this->faker->word,
        'number_of_passenger_trains' => $this->faker->word,
        'freight_revenue_generation' => $this->faker->word,
        'passenger_revenue_generation' => $this->faker->word,
        'passenger_fuel_consumption_rate' => $this->faker->word,
        'freight_fuel_consumption_rate' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
