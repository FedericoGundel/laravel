<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Importar la excepción de validación
use App\Models\Proveedores;


class ProveedoresController extends Controller
{
    public function get($id = null)
    {
     
            // Obtener todos los proveedores
            $proveedores = Proveedores::all();

            
            return response()->json($proveedores);
        
    }
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'nombre' => 'required|string|min:1|max:255',
            'numero' => 'required|string|min:1|max:255|unique:proveedores,numero,' . $id,
        ], [
            'nombre.required' => 'El nombre de proveedor es requerido.',
            'nombre.min' => 'El nombre de proveedor debe tener al menos un carácter.',
            'nombre.max' => 'El nombre de proveedor no puede exceder los 255 caracteres.',
           
            'numero.required' => 'El número de proveedor es requerido.',
            'numero.min' => 'El número de proveedor debe tener al menos un carácter.',
            'numero.max' => 'El número de proveedor no puede exceder los 255 caracteres.',
            'numero.unique' => 'El número de proveedor ya está en uso.',
        ]);
        // Buscar el Proveedores por su ID
        $Proveedor = Proveedores::find($id);

        // Verificar si el Proveedores existe
        if (!$Proveedor) {
            return response()->json([
                'success' => false,
                'message' => 'Proveedor no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Actualizar el nombre del Proveedores
        $Proveedor->nombre = $request->nombre;
        $Proveedor->numero = $request->numero;
        $Proveedor->save();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Proveedor actualizado exitosamente.',
            'Proveedor' => $Proveedor,
        ]);
    }
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|min:1|max:255',
                'numero' => 'required|string|min:1|max:255|unique:proveedores',
            ], [
                'nombre.required' => 'El nombre de proveedor es requerido.',
                'nombre.min' => 'El nombre de proveedor debe tener al menos un carácter.',
                'nombre.max' => 'El nombre de proveedor no puede exceder los 255 caracteres.',
               
                'numero.required' => 'El número de proveedor es requerido.',
                'numero.min' => 'El número de proveedor debe tener al menos un carácter.',
                'numero.max' => 'El número de proveedor no puede exceder los 255 caracteres.',
                'numero.unique' => 'El número de proveedor ya está en uso.',
            ]);
        } catch (ValidationException $e) {
            // En caso de fallo en la validación, devolver los errores
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422); // Código HTTP 422 Unprocessable Entity
        }

        // Crear un nuevo registro de Proveedores
        $Proveedor = Proveedores::create([
            'nombre' => $request->nombre,
            'numero' => $request->numero,
        ]);

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Proveedor creado exitosamente.',
            'Proveedor' => $Proveedor,
        ]);
    }

    public function delete($id)
    {
        // Buscar el Proveedores por su ID
        $Proveedor = Proveedores::find($id);

        // Verificar si el Proveedores existe
        if (!$Proveedor) {
            return response()->json([
                'success' => false,
                'message' => 'Proveedor no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Eliminar el Proveedores
        $Proveedor->delete();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Proveedor eliminado exitosamente.',
        ]);
    }
}