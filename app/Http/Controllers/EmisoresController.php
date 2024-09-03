<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Importar la excepción de validación
use App\Models\Emisores;


class EmisoresController extends Controller
{
    public function get($id = null)
    {
     
            // Obtener todos los emisores
            $emisores = Emisores::all();

            
            return response()->json($emisores);
        
    }
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|min:1|max:255|unique:emisores,nombre,' . $id,
        ], [
            'nombre.required' => 'El nombre de emisor es requerido.',
            'nombre.min' => 'El nombre de emisor debe tener al menos un carácter.',
            'nombre.max' => 'El nombre de emisor no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre de emisor ya está en uso.',
        ]);

        // Buscar el Emisores por su ID
        $Emisor = Emisores::find($id);

        // Verificar si el Emisores existe
        if (!$Emisor) {
            return response()->json([
                'success' => false,
                'message' => 'Emisor no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Actualizar el nombre del Emisores
        $Emisor->nombre = $request->nombre;
        $Emisor->save();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Emisor actualizado exitosamente.',
            'Emisor' => $Emisor,
        ]);
    }
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|min:1|max:255|unique:emisores',
            ], [
                'nombre.required' => 'El nombre de emisor es requerido.',
                'nombre.min' => 'El nombre de emisor debe tener al menos un carácter.',
                'nombre.max' => 'El nombre de emisor no puede exceder los 255 caracteres.',
                'nombre.unique' => 'El nombre de emisor ya está en uso.',
            ]);
        } catch (ValidationException $e) {
            // En caso de fallo en la validación, devolver los errores
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422); // Código HTTP 422 Unprocessable Entity
        }

        // Crear un nuevo registro de Emisores
        $Emisor = Emisores::create([
            'nombre' => $request->nombre,
        ]);

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Emisor creado exitosamente.',
            'Emisor' => $Emisor,
        ]);
    }

    public function delete($id)
    {
        // Buscar el Emisores por su ID
        $Emisor = Emisores::find($id);

        // Verificar si el Emisores existe
        if (!$Emisor) {
            return response()->json([
                'success' => false,
                'message' => 'Emisor no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Eliminar el Emisores
        $Emisor->delete();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Emisor eliminado exitosamente.',
        ]);
    }
}