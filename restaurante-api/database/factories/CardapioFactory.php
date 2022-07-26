<?php

namespace Database\Factories;

use App\Models\Cardapio;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardapioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cardapio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     *
     */
    public function definition()
    {

        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
        return [
            'item' => $this->faker->foodName(),
        ];
    }
}


