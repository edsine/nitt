<?php

namespace Database\Factories;

use App\Models\FleetSizeComposition;
use Illuminate\Database\Eloquent\Factories\Factory;

class FleetSizeCompositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FleetSizeComposition::class;

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
        '4pc' => $this->faker->word,
        '7pc' => $this->faker->word,
        '10pc' => $this->faker->word,
        '14pc' => $this->faker->word,
        '18pc' => $this->faker->word,
        'coaster' => $this->faker->word,
        'big_bus' => $this->faker->word
        ];
    }
}
