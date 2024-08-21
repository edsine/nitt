<?php

namespace Database\Factories;

use App\Models\AirModeData;
use Illuminate\Database\Eloquent\Factories\Factory;

class AirModeDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AirModeData::class;

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
        'airport' => $this->faker->word,
        'year' => $this->faker->randomDigitNotNull,
        'domestic_passengers_traffic' => $this->faker->word,
        'international_passengers_traffic' => $this->faker->word,
        'aircraft_traffic_domestic' => $this->faker->word,
        'aircraft_traffic_international' => $this->faker->word,
        'cargo_traffic_domestic' => $this->faker->word,
        'cargo_traffic_international' => $this->faker->word,
        'mail_traffic_domestic' => $this->faker->word,
        'mail_traffic_international' => $this->faker->word
        ];
    }
}
