<?php

namespace Database\Factories;

use App\Models\RasHewan;
use Illuminate\Database\Eloquent\Factories\Factory;

class RasHewanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RasHewan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_ras_hewan' => $this->faker->name
        ];
    }
}
