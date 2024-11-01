<?php

namespace Database\Factories;

use App\Models\MaritimeTransport;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaritimeTransportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MaritimeTransport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->word,
        'containers_count' => $this->faker->word,
        'general_cargo_count' => $this->faker->word,
        'bulk_cargo_count' => $this->faker->word,
        'tankers_count' => $this->faker->word,
        'containers_import_count' => $this->faker->word,
        'containers_export_count' => $this->faker->word,
        'general_cargo_tonnage' => $this->faker->word,
        'bulk_cargo_tonnage' => $this->faker->word,
        'accidents_recorded' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
