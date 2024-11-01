<?php

namespace Database\Factories;

use App\Models\RoadTrafficCrash;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoadTrafficCrashFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoadTrafficCrash::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fatal_cases' => $this->faker->word,
        'serious_cases' => $this->faker->word,
        'minor_cases' => $this->faker->word,
        'total_cases' => $this->faker->word,
        'persons_injured' => $this->faker->word,
        'total_casualty' => $this->faker->word,
        'year' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'persons_killed' => $this->faker->word
        ];
    }
}
