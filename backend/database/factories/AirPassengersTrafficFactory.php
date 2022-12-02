<?php

namespace Database\Factories;

use App\Models\AirPassengersTraffic;
use Illuminate\Database\Eloquent\Factories\Factory;

class AirPassengersTrafficFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AirPassengersTraffic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'domestic_passengers_traffic' => $this->faker->word,
        'international_passengers_traffic' => $this->faker->word,
        'domestic_freight_traffic' => $this->faker->word,
        'international_freight_traffic' => $this->faker->word,
        'year' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
