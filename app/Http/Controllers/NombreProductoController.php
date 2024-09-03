<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Importar la excepción de validación
use App\Models\NombreProducto;

class NombreProductoController extends Controller
{
    public function get()
    {
        $familiaProductos = NombreProducto::all();
        return response()->json($familiaProductos);
    }
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|min:1|max:255|unique:nombre_producto,nombre,' . $id,
        ], [
            'nombre.required' => 'El nombre de producto es requerido.',
            'nombre.min' => 'El nombre de producto debe tener al menos un carácter.',
            'nombre.max' => 'El nombre de producto no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre de producto ya está en uso.',
        ]);

        // Buscar el NombreProducto por su ID
        $familiaProducto = NombreProducto::find($id);

        // Verificar si el NombreProducto existe
        if (!$familiaProducto) {
            return response()->json([
                'success' => false,
                'message' => 'Nombre de producto no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Actualizar el nombre del NombreProducto
        $familiaProducto->nombre = $request->nombre;
        $familiaProducto->save();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Nombre de producto actualizado exitosamente.',
            'familiaProducto' => $familiaProducto,
        ]);
    }
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|min:1|max:255|unique:nombre_producto',
            ], [
                'nombre.required' => 'El nombre de producto es requerido.',
                'nombre.min' => 'El nombre de producto debe tener al menos un carácter.',
                'nombre.max' => 'El nombre de producto no puede exceder los 255 caracteres.',
                'nombre.unique' => 'El nombre de producto ya está en uso.',
            ]);
        } catch (ValidationException $e) {
            // En caso de fallo en la validación, devolver los errores
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422); // Código HTTP 422 Unprocessable Entity
        }

        // Crear un nuevo registro de NombreProducto
        $familiaProducto = NombreProducto::create([
            'nombre' => $request->nombre,
        ]);

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Nombre de producto creado exitosamente.',
            'familiaProducto' => $familiaProducto,
        ]);
    }

    public function delete($id)
    {
        // Buscar el NombreProducto por su ID
        $familiaProducto = NombreProducto::find($id);

        // Verificar si el NombreProducto existe
        if (!$familiaProducto) {
            return response()->json([
                'success' => false,
                'message' => 'Nombre de producto no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Eliminar el NombreProducto
        $familiaProducto->delete();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Nombre de producto eliminado exitosamente.',
        ]);
    }
}