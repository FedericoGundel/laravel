<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Importar la excepción de validación
use App\Models\Racks;

class RacksController extends Controller
{
    public function get()
    {
        $familiaProductos = Racks::all();
        return response()->json($familiaProductos);
    }
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|min:1|max:255|unique:racks,nombre,' . $id,
        ], [
            'nombre.required' => 'El nombre de rack es requerido.',
            'nombre.min' => 'El nombre de rack debe tener al menos un carácter.',
            'nombre.max' => 'El nombre de rack no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre de rack ya está en uso.',
        ]);

        // Buscar el Racks por su ID
        $familiaProducto = Racks::find($id);

        // Verificar si el Racks existe
        if (!$familiaProducto) {
            return response()->json([
                'success' => false,
                'message' => 'Rack no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Actualizar el nombre del Racks
        $familiaProducto->nombre = $request->nombre;
        $familiaProducto->save();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Rack actualizado exitosamente.',
            'rack' => $familiaProducto,
        ]);
    }
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|min:1|max:255|unique:racks',
            ], [
                'nombre.required' => 'El nombre de rack es requerido.',
                'nombre.min' => 'El nombre de rack debe tener al menos un carácter.',
                'nombre.max' => 'El nombre de rack no puede exceder los 255 caracteres.',
                'nombre.unique' => 'El nombre de rack ya está en uso.',
            ]);
        } catch (ValidationException $e) {
            // En caso de fallo en la validación, devolver los errores
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422); // Código HTTP 422 Unprocessable Entity
        }

        // Crear un nuevo registro de Racks
        $Rack = Racks::create([
            'nombre' => $request->nombre,
            'id_almacenes' => $request->id_almacenes,
        ]);

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Rack creado exitosamente.',
            'rack' => $Rack,
        ]);
    }

    public function delete($id)
    {
        // Buscar el Racks por su ID
        $familiaProducto = Racks::find($id);

        // Verificar si el Racks existe
        if (!$familiaProducto) {
            return response()->json([
                'success' => false,
                'message' => 'Rack no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Eliminar el Racks
        $familiaProducto->delete();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Rack eliminado exitosamente.',
        ]);
    }
}