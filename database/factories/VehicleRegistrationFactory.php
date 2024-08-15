<?php

namespace Database\Factories;

use App\Models\VehicleRegistration;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleRegistrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VehicleRegistration::class;

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
        'vehicle_type' => $this->faker->randomDigitNotNull,
        'private_count' => $this->faker->word,
        'commercial_count' => $this->faker->word,
        'government_count' => $this->faker->word,
        'diplomatic_count' => $this->faker->word,
        'schools_count' => $this->faker->word
        ];
    }
}
