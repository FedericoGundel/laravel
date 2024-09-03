<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FamiliaProducto extends Model
{
   // Nombre de la tabla en la base de datos
   protected $table = 'familia_producto';

   // Campos que se pueden asignar de forma masiva
   protected $fillable = [
       'nombre',
       // Otros campos si los hay
   ];

   // No utilizar marcas de tiempo para este modelo
   public $timestamps = false;
}