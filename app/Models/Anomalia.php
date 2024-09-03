<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anomalia extends Model
{
    protected $table = 'anomalias';

    protected $fillable = [
        'id_producto_pedido',
        'cantidad_i',
        'cantidad',
    ];

    // Definir la relación con ProductoPedido
    public function productoPedido()
    {
        return $this->belongsTo(ProductoPedido::class, 'id_producto_pedido');
    }
}