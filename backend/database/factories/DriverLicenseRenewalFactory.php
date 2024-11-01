<?php

namespace Database\Factories;

use App\Models\DriverLicenseRenewal;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverLicenseRenewalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DriverLicenseRenewal::class;

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
        'vehicle_class' => $this->faker->randomDigitNotNull,
        'male_count' => $this->faker->randomDigitNotNull,
        'female_count' => $this->faker->randomDigitNotNull
        ];
    }
}
