<?php

namespace Database\Factories;

use App\Models\MaritimeAcademy;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaritimeAcademyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MaritimeAcademy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->word,
        'number_of_staff' => $this->faker->word,
        'number_of_admitted_students' => $this->faker->word,
        'number_of_graduands' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
