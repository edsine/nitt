<?php

namespace Database\Factories;

use App\Models\CargoImportExport;
use Illuminate\Database\Eloquent\Factories\Factory;

class CargoImportExportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CargoImportExport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'port' => $this->faker->word,
        'year' => $this->faker->randomDigitNotNull,
        'import' => $this->faker->word,
        'export' => $this->faker->word,
        'total_throughput' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
