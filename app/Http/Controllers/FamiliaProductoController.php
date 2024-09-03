<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Importar la excepción de validación
use App\Models\FamiliaProducto;

class FamiliaProductoController extends Controller
{
    public function get()
    {
        $familiaProductos = FamiliaProducto::all();
        return response()->json($familiaProductos);
    }
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|min:1|max:255|unique:familia_producto,nombre,' . $id,
        ], [
            'nombre.required' => 'El nombre de la familia de productos es requerido.',
            'nombre.min' => 'El nombre de la familia de productos debe tener al menos un carácter.',
            'nombre.max' => 'El nombre de la familia de productos no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre de la familia de productos ya está en uso.',
        ]);

        // Buscar el FamiliaProducto por su ID
        $familiaProducto = FamiliaProducto::find($id);

        // Verificar si el FamiliaProducto existe
        if (!$familiaProducto) {
            return response()->json([
                'success' => false,
                'message' => 'Familia de producto no encontrada.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Actualizar el nombre del FamiliaProducto
        $familiaProducto->nombre = $request->nombre;
        $familiaProducto->save();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Nombre de familia de producto actualizado exitosamente.',
            'familiaProducto' => $familiaProducto,
        ]);
    }
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|min:1|max:255|unique:familia_producto',
            ], [
                'nombre.required' => 'El nombre de la familia de productos es requerido.',
                'nombre.min' => 'El nombre de la familia de productos debe tener al menos un carácter.',
                'nombre.max' => 'El nombre de la familia de productos no puede exceder los 255 caracteres.',
                'nombre.unique' => 'El nombre de la familia de productos ya está en uso.',
            ]);
        } catch (ValidationException $e) {
            // En caso de fallo en la validación, devolver los errores
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422); // Código HTTP 422 Unprocessable Entity
        }

        // Crear un nuevo registro de FamiliaProducto
        $familiaProducto = FamiliaProducto::create([
            'nombre' => $request->nombre,
        ]);

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Familia de producto creada exitosamente.',
            'familiaProducto' => $familiaProducto,
        ]);
    }

    public function delete($id)
    {
        // Buscar el FamiliaProducto por su ID
        $familiaProducto = FamiliaProducto::find($id);

        // Verificar si el FamiliaProducto existe
        if (!$familiaProducto) {
            return response()->json([
                'success' => false,
                'message' => 'Familia de producto no encontrada.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Eliminar el FamiliaProducto
        $familiaProducto->delete();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Familia de producto eliminada exitosamente.',
        ]);
    }
}