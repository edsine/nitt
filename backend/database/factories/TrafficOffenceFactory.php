<?php

namespace Database\Factories;

use App\Models\TrafficOffence;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrafficOffenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrafficOffence::class;

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
        'offence' => $this->faker->text,
        'year' => $this->faker->randomDigitNotNull,
        'state' => $this->faker->text,
        'count' => $this->faker->word
        ];
    }
}
