<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Importar la excepción de validación
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class ProductoController extends Controller
{
    public function get($id = null)
    {
      
      
        if ($id == null) {
            $Productos = Producto::with('familiaProducto', 'Almacen', 'Rack', 'Estante')->get();
            return response()->json($Productos);
            }else{
                $Productos = Producto::all()->find($id);
                return response()->json($Productos);
            }
           
        
    }
    public function get_ean($ean = null)
    {
        if ($ean == null) {
            $productos = Producto::with('familiaProducto', 'Almacen', 'Rack', 'Estante')->get();
            return response()->json($productos);
        } else {
            $producto = Producto::where('ean', $ean)->with('familiaProducto', 'Almacen', 'Rack', 'Estante')->first();
            
            if ($producto) {
                return response()->json($producto);
            } else {
                Log::info('Producto no encontrado con EAN: ' . $ean);
                return response()->json(['message' => 'Producto no encontrado'], 404);
            }
        }
    }

    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'codigo' => 'required|string|min:1|max:255|unique:productos',
                'nombre' => 'required|string|min:1|max:255',
            ], [
                'codigo.required' => 'El código es requerido.',
                'codigo.min' => 'El código debe tener al menos un carácter.',
                'codigo.max' => 'El código no puede exceder los 255 caracteres.',
                'codigo.unique' => 'El código ya existe.',
                'nombre.required' => 'El nombre es requerido.',
                'nombre.min' => 'El nombre debe tener al menos un carácter.',
                'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',
                
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
        $Producto = Producto::create([
            'ean' => $request->ean,
            'codigo' => $request->codigo,
            'nombre' => ($request->nombre == "null") ? null : $request->nombre,
            'id_familia_producto' => ($request->id_familia_producto == "null") ? null : $request->id_familia_producto,
            'id_almacenes' => ($request->id_almacenes == "null") ? null : $request->id_almacenes,
            'id_racks' => ($request->id_racks == "null") ? null : $request->id_racks,
            'id_estantes' => ($request->id_estantes == "null") ? null : $request->id_estantes,
            'foto' => ($request->hasFile('foto')) ? $request->file('foto')->getClientOriginalExtension() : "0",
            'cantidad' => $request->cantidad,
            'tipo_unidad' => $request->tipo_unidad,
        ]);
        // Guardar la imagen si se proporcionó una
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $Producto->codigo . '.' . $file->getClientOriginalExtension(); // Nombre del archivo como el ID del producto
            $filePath = $file->storeAs('', $fileName, 'product_images'); // Guardar el archivo en el disco 'product_images'

           
        }
        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Producto creado exitosamente.',
            'Producto' => $Producto,
        ]);
    }
}