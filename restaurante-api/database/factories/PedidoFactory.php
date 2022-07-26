<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Mesa;
use App\Models\Cardapio;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cliente_id' => Cliente::factory()->create(),
            'mesa_id' => Mesa::factory()->create(),
            'cardapio_id' => Cardapio::factory()->create(),
            'status' => $this->faker->boolean,
            'dataDoPedido' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
        ];
    }
}



