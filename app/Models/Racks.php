<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Racks extends Model
{
    protected $table = 'racks';

    // Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'nombre',
        'id_almacenes'
        // Otros campos si los hay
    ];
    public function Almacen()
    {
        return $this->belongsTo(FamiliaProducto::class, 'id_almacenes');
    }
    // No utilizar marcas de tiempo para este modelo
    public $timestamps = false;
}