<?php

namespace Database\Factories;

use App\Models\CorporationPassengerTraffic;
use Illuminate\Database\Eloquent\Factories\Factory;

class CorporationPassengerTrafficFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CorporationPassengerTraffic::class;

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
        'source' => $this->faker->text,
        'destination' => $this->faker->text,
        'year' => $this->faker->randomDigitNotNull,
        'count' => $this->faker->word
        ];
    }
}
