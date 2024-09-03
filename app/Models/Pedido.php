<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'numero',
        'fecha',
        'id_estados',
        'id_proveedores',
        'id_emisores',
        'id_receptores',
        'numero_albaran',
        'observaciones'
    ];

    public function productosPedido()
    {
        return $this->hasMany(ProductoPedido::class, 'id_pedido');
    }
    public function estado()
    {
        return $this->belongsTo(Estados::class, 'id_estados');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'id_proveedores');
    }
    public function emisor()
    {
        return $this->belongsTo(Emisores::class, 'id_emisores');
    }

    public function receptor()
    {
        return $this->belongsTo(Receptores::class, 'id_receptores');
    }
}
