<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User; // Importa el modelo de usuario si necesitas datos de usuarios

class MiembrosController extends Controller
{
    public function index()
    {
        $usuarios = User::all(); // Ejemplo de obtener todos los usuarios

        // Puedes realizar cualquier otra lógica necesaria para obtener datos

        return view('miembros', ['usuarios' => $usuarios]); // Pasar los datos a la vista
    }
}