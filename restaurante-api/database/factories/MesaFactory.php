<?php

namespace Database\Factories;

use App\Models\Mesa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mesa>
 */
class MesaFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mesa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     *
     */
    public function definition()
    {

        return [
            'numero' => $this->faker->numerify(),
        ];
    }
}
