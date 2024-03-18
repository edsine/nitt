<?php

namespace Database\Factories;

use App\Models\FleetOperatorBrand;
use Illuminate\Database\Eloquent\Factories\Factory;

class FleetOperatorBrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FleetOperatorBrand::class;

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
        'state' => $this->faker->randomDigitNotNull,
        'toyota_count' => $this->faker->randomDigitNotNull,
        'mercedes_count' => $this->faker->randomDigitNotNull,
        'nissan_count' => $this->faker->randomDigitNotNull,
        'peugeot_count' => $this->faker->randomDigitNotNull,
        'volkswagen_count' => $this->faker->randomDigitNotNull,
        'sharon_count' => $this->faker->randomDigitNotNull
        ];
    }
}
