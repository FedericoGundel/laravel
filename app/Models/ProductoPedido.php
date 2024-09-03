<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoPedido extends Model
{
    use HasFactory;

    protected $table = 'producto_pedido';

    protected $fillable = [
        'id_producto',
        'id_pedido',
        'id_almacen',
        'id_rack',
        'id_estante',
        'cantidad',
        'verificado',
        'id_user',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }

    public function almacen()
    {
        return $this->belongsTo(Almacenes::class, 'id_almacen');
    }

    public function rack()
    {
        return $this->belongsTo(Racks::class, 'id_rack');
    }

    public function estante()
    {
        return $this->belongsTo(Estantes::class, 'id_estante');
    }
}