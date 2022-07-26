<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model

{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = ['status', 'dataDoPedido'];

    public function clientes(){
        return $this->hasOne(Cliente::class, 'cliente_id', 'id');
    }

    public function mesas(){
        return $this->hasOne(Mesa::class, 'mesa_id', 'id');
    }

    public function cardapios(){
        return $this->hasMany(Cardapio::class, 'cardapio_id', 'id');
    }

    public function getPublishFmtAttribute() {

        return date('d/m/Y', strtotime($this->dataDoPedido));
    }

    public function setPublishAtAttribute($value) {

        $date = str_replace('/', '-', $value);

        $this->attributes['dataDoPedido'] = date('Y-m-d', strtotime($date));
    }


}
