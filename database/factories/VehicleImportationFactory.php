<?php

namespace Database\Factories;

use App\Models\VehicleImportation;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleImportationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VehicleImportation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->word,
        'vehicle_category' => $this->faker->randomDigitNotNull,
        'new_vehicle_count' => $this->faker->word,
        'used_vehicle_count' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
