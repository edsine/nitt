<?php

namespace Database\Factories;

use App\Models\GrossDomesticProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrossDomesticProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GrossDomesticProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->randomDigitNotNull,
        'transportation_and_storage' => $this->faker->randomDigitNotNull,
        'road_transport' => $this->faker->randomDigitNotNull,
        'rail_transport_and_pipelines' => $this->faker->randomDigitNotNull,
        'water_transport' => $this->faker->randomDigitNotNull,
        'air_transport' => $this->faker->randomDigitNotNull,
        'transport_services' => $this->faker->randomDigitNotNull,
        'post_and_courier_services' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
