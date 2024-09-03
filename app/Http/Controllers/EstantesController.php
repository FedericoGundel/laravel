<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Importar la excepción de validación
use App\Models\Estantes;

class EstantesController extends Controller
{
    public function get()
    {
        $familiaProductos = Estantes::all();
        return response()->json($familiaProductos);
    }
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|min:1|max:255|unique:estantes,nombre,' . $id,
        ], [
            'nombre.required' => 'El nombre de estante es requerido.',
            'nombre.min' => 'El nombre de estante debe tener al menos un carácter.',
            'nombre.max' => 'El nombre de estante no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre de estante ya está en uso.',
        ]);

        // Buscar el Estantes por su ID
        $familiaProducto = Estantes::find($id);

        // Verificar si el Estantes existe
        if (!$familiaProducto) {
            return response()->json([
                'success' => false,
                'message' => 'Estante no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Actualizar el nombre del Estantes
        $familiaProducto->nombre = $request->nombre;
        $familiaProducto->save();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Estante actualizado exitosamente.',
            'estante' => $familiaProducto,
        ]);
    }
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|min:1|max:255|unique:estantes',
            ], [
                'nombre.required' => 'El nombre de estante es requerido.',
                'nombre.min' => 'El nombre de estante debe tener al menos un carácter.',
                'nombre.max' => 'El nombre de estante no puede exceder los 255 caracteres.',
                'nombre.unique' => 'El nombre de estante ya está en uso.',
            ]);
        } catch (ValidationException $e) {
            // En caso de fallo en la validación, devolver los errores
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422); // Código HTTP 422 Unprocessable Entity
        }

        // Crear un nuevo registro de Estantes
        $Estante = Estantes::create([
            'nombre' => $request->nombre,
            'id_racks' => $request->id_racks,
        ]);

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Estante creado exitosamente.',
            'estante' => $Estante,
        ]);
    }

    public function delete($id)
    {
        // Buscar el Estantes por su ID
        $familiaProducto = Estantes::find($id);

        // Verificar si el Estantes existe
        if (!$familiaProducto) {
            return response()->json([
                'success' => false,
                'message' => 'Estante no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Eliminar el Estantes
        $familiaProducto->delete();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Estante eliminado exitosamente.',
        ]);
    }
}