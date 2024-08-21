<?php

namespace Database\Factories;

use App\Models\RoadCrashCausativeFactor;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoadCrashCausativeFactorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoadCrashCausativeFactor::class;

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
        'state' => $this->faker->text,
        'speed_violation' => $this->faker->word,
        'lost_control' => $this->faker->word,
        'dangerous_driving' => $this->faker->word,
        'tyre_burst' => $this->faker->word,
        'brake_failure' => $this->faker->word,
        'wrongful_overtaking' => $this->faker->word,
        'route_violation' => $this->faker->word,
        'mechanically_deficient_vehicle' => $this->faker->word,
        'bad_road' => $this->faker->word,
        'road_obstruction_violation' => $this->faker->word,
        'dangerous_overtaking' => $this->faker->word,
        'overloading' => $this->faker->word,
        'sleeping_on_steering' => $this->faker->word,
        'driving_under_alcohol_drug' => $this->faker->word,
        'use_of_phone_driving' => $this->faker->word,
        'night_journey' => $this->faker->word,
        'fatigue' => $this->faker->word,
        'poor_weather' => $this->faker->word,
        'sign_light_violation' => $this->faker->word,
        'others' => $this->faker->word
        ];
    }
}
