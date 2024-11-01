<?php

namespace Database\Factories;

use App\Models\ShipContainerTraffic;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipContainerTrafficFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShipContainerTraffic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->randomDigitNotNull,
        'ship_traffic' => $this->faker->word,
        'container_traffic' => $this->faker->word,
        'cargo_throughput' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
