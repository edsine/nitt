<?php

namespace Database\Factories;

use App\Models\RouteRoadCrash;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteRoadCrashFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RouteRoadCrash::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'route' => $this->faker->text,
        'number_of_crashes' => $this->faker->word,
        'year' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
