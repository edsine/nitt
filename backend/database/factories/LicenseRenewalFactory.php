<?php

namespace Database\Factories;

use App\Models\LicenseRenewal;
use Illuminate\Database\Eloquent\Factories\Factory;

class LicenseRenewalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LicenseRenewal::class;

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
        'year' => $this->faker->randomDigitNotNull,
        'car' => $this->faker->word,
        'van' => $this->faker->word,
        'lorry' => $this->faker->word,
        'mini_bus' => $this->faker->word,
        'big_bus' => $this->faker->word,
        'tanker' => $this->faker->word,
        'trailer' => $this->faker->word,
        'tipper' => $this->faker->word,
        'tractor' => $this->faker->word,
        'state' => $this->faker->text
        ];
    }
}
