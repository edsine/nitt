<?php

namespace Database\Factories;

use App\Models\DriverLicenseIssuance;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverLicenseIssuanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DriverLicenseIssuance::class;

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
        'state' => $this->faker->randomDigitNotNull,
        'year' => $this->faker->randomDigitNotNull,
        'male_count' => $this->faker->word,
        'female_count' => $this->faker->word,
        'vehicle_class' => $this->faker->randomDigitNotNull
        ];
    }
}
