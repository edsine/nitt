<?php

namespace Database\Factories;

use App\Models\DrivingTestRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class DrivingTestRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DrivingTestRecord::class;

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
        'year' => $this->faker->randomDigitNotNull,
        'renewal_count' => $this->faker->word,
        'fresh_count' => $this->faker->word,
        '3y_count' => $this->faker->word,
        '5y_count' => $this->faker->word,
        'failure' => $this->faker->word,
        'collected' => $this->faker->word,
        'due_for' => $this->faker->word,
        'lp' => $this->faker->word,
        'total_captured' => $this->faker->word
        ];
    }
}
