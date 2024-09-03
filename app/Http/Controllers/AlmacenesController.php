<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Importar la excepción de validación
use App\Models\Almacenes;
use App\Models\Racks;
use App\Models\Estantes;
use App\Models\ProductoPedido;
use Illuminate\Support\Facades\Log;
class AlmacenesController extends Controller
{
    public function get($id = null)
    {
        if ($id == null) {
            // Obtener todos los almacenes
            $almacenes = Almacenes::all();

            // Iterar sobre cada almacén para cargar sus racks y estantes correspondientes
            $almacenes->each(function ($almacen) {
                // Cargar los racks para este almacén
                $racks = Racks::where('id_almacenes', $almacen->id)->get();
                $productos = ProductoPedido::with([
                    'pedido',
                    'producto'
                ])
                    ->where('id_almacen', $almacen->id)
                    ->get();
                // Iterar sobre cada rack para cargar sus estantes correspondientes
                $racks->each(function ($rack) {
                    // Cargar los estantes para este rack
                    $estantes = Estantes::where('id_racks', $rack->id)->get();

                    // Adjuntar los estantes al rack
                    $rack->setAttribute('estantes', $estantes);
                });

                // Adjuntar los racks al almacén
                $almacen->setAttribute('racks', $racks);
                $almacen->setAttribute('productos', $productos);
            });
            return response()->json($almacenes);
        } else {
            $almacen = Almacenes::all()->find($id);
            $racks = Racks::where('id_almacenes', $almacen->id)->get();
            $productos = ProductoPedido::with([
                'pedido',
                'producto',
                'rack',
                'estante'
            ])
                ->where('id_almacen', $almacen->id)
                ->get();
            // Iterar sobre cada rack para cargar sus estantes correspondientes
            $racks->each(function ($rack) {
                // Cargar los estantes para este rack
                $estantes = Estantes::where('id_racks', $rack->id)->get();

                // Adjuntar los estantes al rack
                $rack->setAttribute('estantes', $estantes);
            });

            // Adjuntar los racks al almacén
            $almacen->setAttribute('racks', $racks);
            $almacen->setAttribute('productos', $productos);

            return response()->json($almacen);
        }
    }
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|min:1|max:255|unique:almacenes,nombre,' . $id,
        ], [
            'nombre.required' => 'El nombre de almacen es requerido.',
            'nombre.min' => 'El nombre de almacen debe tener al menos un carácter.',
            'nombre.max' => 'El nombre de almacen no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre de almacen ya está en uso.',
        ]);

        // Buscar el Almacenes por su ID
        $familiaProducto = Almacenes::find($id);

        // Verificar si el Almacenes existe
        if (!$familiaProducto) {
            return response()->json([
                'success' => false,
                'message' => 'Almacen no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Actualizar el nombre del Almacenes
        $familiaProducto->nombre = $request->nombre;
        $familiaProducto->save();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Almacen actualizado exitosamente.',
            'familiaProducto' => $familiaProducto,
        ]);
    }
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|min:1|max:255|unique:almacenes',
            ], [
                'nombre.required' => 'El nombre de almacen es requerido.',
                'nombre.min' => 'El nombre de almacen debe tener al menos un carácter.',
                'nombre.max' => 'El nombre de almacen no puede exceder los 255 caracteres.',
                'nombre.unique' => 'El nombre de almacen ya está en uso.',
            ]);
        } catch (ValidationException $e) {
            // En caso de fallo en la validación, devolver los errores
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422); // Código HTTP 422 Unprocessable Entity
        }

        // Crear un nuevo registro de Almacenes
        $familiaProducto = Almacenes::create([
            'nombre' => $request->nombre,
        ]);

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Almacen creado exitosamente.',
            'familiaProducto' => $familiaProducto,
        ]);
    }

    public function delete($id)
    {
        Log::info('Actualización iniciada para ProductoPedido con ID: ' . $id);
        // Buscar el Almacenes por su ID
        $familiaProducto = Almacenes::find($id);

        // Verificar si el Almacenes existe
        if (!$familiaProducto) {
            return response()->json([
                'success' => false,
                'message' => 'Almacen no encontrado.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Eliminar el Almacenes
        $familiaProducto->delete();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Almacen eliminado exitosamente.',
        ]);
    }
}