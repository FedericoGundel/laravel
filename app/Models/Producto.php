<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'ean',
        'codigo',
        'nombre',
        'id_familia_producto',
        'id_almacenes',
        'id_racks',
        'id_estantes',
        'foto',
        'cantidad',
        'tipo_unidad'
    ];

   

    public function familiaProducto()
    {
        return $this->belongsTo(FamiliaProducto::class, 'id_familia_producto');
    }
    public function Almacen()
    {
        return $this->belongsTo(Almacenes::class, 'id_almacenes');
    }

    public function Rack()
    {
        return $this->belongsTo(Racks::class, 'id_racks');
    }

    public function Estante()
    {
        return $this->belongsTo(Estantes::class, 'id_estantes');
    }

}