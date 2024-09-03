<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estantes extends Model
{
    protected $table = 'estantes';

    // Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'nombre',
        'id_racks'
        // Otros campos si los hay
    ];
    public function Rack()
    {
        return $this->belongsTo(FamiliaProducto::class, 'id_racks');
    }
    // No utilizar marcas de tiempo para este modelo
    public $timestamps = false;
}