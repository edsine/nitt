<?php

namespace Database\Factories;

use App\Models\ShipTrafficGRT;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipTrafficGRTFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShipTrafficGRT::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->randomDigitNotNull,
        'number_of_vessels' => $this->faker->word,
        'grt' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'port' => $this->faker->word
        ];
    }
}
