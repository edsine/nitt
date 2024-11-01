<?php

namespace Database\Factories;

use App\Models\RailwayRollingStock;
use Illuminate\Database\Eloquent\Factories\Factory;

class RailwayRollingStockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RailwayRollingStock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number_of_coaches_rolling_stock' => $this->faker->word,
        'number_of_wagon_rolling_stock' => $this->faker->word,
        'average_loco_availability' => $this->faker->word,
        'average_coaches_maintenance_cost' => $this->faker->word,
        'average_wagon_maintenance_cost' => $this->faker->word,
        'annual_average_km_travel_coaches' => $this->faker->word,
        'annual_average_km_travel_wagon' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'year' => $this->faker->word
        ];
    }
}
