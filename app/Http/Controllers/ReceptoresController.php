<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Importar la excepción de validación
use App\Models\Receptores;


class ReceptoresController extends Controller
{
    public function get($id = null)
    {
     
            // Obtener todos los receptores
            $receptores = Receptores::all();

            
            return response()->json($receptores);
        
    }
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|min:1|max:255|unique:receptores,nombre,' . $id,
        ], [
            'nombre.required' => 'El nombre de receptor es requerido.',
            'nombre.min' => 'El nombre de receptor debe tener al menos un carácter.',
            'nombre.max' => 'El nombre de receptor no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre de receptor ya está en uso.',
        ]);

        // Buscar el Receptores por su ID
        $Receptor = Receptores::find($id);

        // Verificar si el Receptores existe
        if (!$Receptor) {
            return response()->json([
                'success' => false,
                'message' => 'Receptor no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Actualizar el nombre del Receptores
        $Receptor->nombre = $request->nombre;
        $Receptor->save();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Receptor actualizado exitosamente.',
            'Receptor' => $Receptor,
        ]);
    }
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|min:1|max:255|unique:receptores',
            ], [
                'nombre.required' => 'El nombre de receptor es requerido.',
                'nombre.min' => 'El nombre de receptor debe tener al menos un carácter.',
                'nombre.max' => 'El nombre de receptor no puede exceder los 255 caracteres.',
                'nombre.unique' => 'El nombre de receptor ya está en uso.',
            ]);
        } catch (ValidationException $e) {
            // En caso de fallo en la validación, devolver los errores
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422); // Código HTTP 422 Unprocessable Entity
        }

        // Crear un nuevo registro de Receptores
        $Receptor = Receptores::create([
            'nombre' => $request->nombre,
        ]);

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Receptor creado exitosamente.',
            'Receptor' => $Receptor,
        ]);
    }

    public function delete($id)
    {
        // Buscar el Receptores por su ID
        $Receptor = Receptores::find($id);

        // Verificar si el Receptores existe
        if (!$Receptor) {
            return response()->json([
                'success' => false,
                'message' => 'Receptor no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Eliminar el Receptores
        $Receptor->delete();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Receptor eliminado exitosamente.',
        ]);
    }
}