<?php

namespace Database\Factories;

use App\Models\PortVehicularTraffic;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortVehicularTrafficFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PortVehicularTraffic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'port' => $this->faker->word,
        'traffic' => $this->faker->word,
        'year' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
