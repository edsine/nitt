<?php

namespace Database\Factories;

use App\Models\VehiclePlateProduction;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiclePlateProductionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VehiclePlateProduction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vehicle_category' => $this->faker->randomDigitNotNull,
        'year' => $this->faker->randomDigitNotNull,
        'value' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
