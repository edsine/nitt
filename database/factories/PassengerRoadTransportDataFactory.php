<?php

namespace Database\Factories;

use App\Models\PassengerRoadTransportData;
use Illuminate\Database\Eloquent\Factories\Factory;

class PassengerRoadTransportDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PassengerRoadTransportData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->word,
        'number_of_passengers_carried' => $this->faker->word,
        'number_of_vehicles_in_fleet' => $this->faker->word,
        'revenue_from_operation' => $this->faker->word,
        'number_of_employees' => $this->faker->word,
        'annual_cost_of_vehicle_maintenance' => $this->faker->word,
        'number_of_accidents' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
