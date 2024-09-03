<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table = 'estados';

    // Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'nombre',
        // Otros campos si los hay
    ];
 
    // No utilizar marcas de tiempo para este modelo
    public $timestamps = false;
}