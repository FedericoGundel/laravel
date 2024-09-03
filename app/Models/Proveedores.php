<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedores';

    // Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'nombre',
        'numero',
        // Otros campos si los hay
    ];
 
    // No utilizar marcas de tiempo para este modelo
    public $timestamps = false;
}