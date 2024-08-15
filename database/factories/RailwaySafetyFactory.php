<?php

namespace Database\Factories;

use App\Models\RailwaySafety;
use Illuminate\Database\Eloquent\Factories\Factory;

class RailwaySafetyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RailwaySafety::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->word,
        'number_of_near_accidents' => $this->faker->word,
        'number_of_accidents' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
