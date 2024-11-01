<?php

namespace Database\Factories;

use App\Models\DriverLicenseProduction;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverLicenseProductionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DriverLicenseProduction::class;

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
        'value' => $this->faker->word
        ];
    }
}
