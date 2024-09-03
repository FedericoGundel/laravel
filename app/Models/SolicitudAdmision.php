<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudAdmision extends Model
{
    protected $table = 'solicitud_admision'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'estado', 'username', 'password',
        // Aquí puedes agregar más campos si los necesitas
    ];
}