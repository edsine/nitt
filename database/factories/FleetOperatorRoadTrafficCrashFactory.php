<?php

namespace Database\Factories;

use App\Models\FleetOperatorRoadTrafficCrash;
use Illuminate\Database\Eloquent\Factories\Factory;

class FleetOperatorRoadTrafficCrashFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FleetOperatorRoadTrafficCrash::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fleet_operator' => $this->faker->word,
        'number_of_cases' => $this->faker->word,
        'number_killed' => $this->faker->word,
        'number_injured' => $this->faker->word,
        'number_of_persons' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
