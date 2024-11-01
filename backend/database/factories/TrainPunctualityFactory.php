<?php

namespace Database\Factories;

use App\Models\TrainPunctuality;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainPunctualityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrainPunctuality::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->word,
        'number_of_train_delay' => $this->faker->word,
        'number_of_late_arrival' => $this->faker->word,
        'number_of_prompt_arrival' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
