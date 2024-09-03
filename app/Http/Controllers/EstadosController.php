<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Importar la excepción de validación
use App\Models\Estados;


class EstadosController extends Controller
{
    public function get($id = null)
    {
     
            // Obtener todos los estados
            $estados = Estados::all();

            
            return response()->json($estados);
        
    }
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|min:1|max:255|unique:estados,nombre,' . $id,
        ], [
            'nombre.required' => 'El nombre de estado es requerido.',
            'nombre.min' => 'El nombre de estado debe tener al menos un carácter.',
            'nombre.max' => 'El nombre de estado no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre de estado ya está en uso.',
        ]);

        // Buscar el Estados por su ID
        $Estado = Estados::find($id);

        // Verificar si el Estados existe
        if (!$Estado) {
            return response()->json([
                'success' => false,
                'message' => 'Estado no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Actualizar el nombre del Estados
        $Estado->nombre = $request->nombre;
        $Estado->save();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Estado actualizado exitosamente.',
            'Estado' => $Estado,
        ]);
    }
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|min:1|max:255|unique:estados',
            ], [
                'nombre.required' => 'El nombre de estado es requerido.',
                'nombre.min' => 'El nombre de estado debe tener al menos un carácter.',
                'nombre.max' => 'El nombre de estado no puede exceder los 255 caracteres.',
                'nombre.unique' => 'El nombre de estado ya está en uso.',
            ]);
        } catch (ValidationException $e) {
            // En caso de fallo en la validación, devolver los errores
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422); // Código HTTP 422 Unprocessable Entity
        }

        // Crear un nuevo registro de Estados
        $Estado = Estados::create([
            'nombre' => $request->nombre,
        ]);

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Estado creado exitosamente.',
            'Estado' => $Estado,
        ]);
    }

    public function delete($id)
    {
        // Buscar el Estados por su ID
        $Estado = Estados::find($id);

        // Verificar si el Estados existe
        if (!$Estado) {
            return response()->json([
                'success' => false,
                'message' => 'Estado no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Eliminar el Estados
        $Estado->delete();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Estado eliminado exitosamente.',
        ]);
    }
}