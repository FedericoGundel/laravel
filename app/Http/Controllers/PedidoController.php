<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Pedido;
use App\Models\ProductoPedido;

class PedidoController extends Controller
{
    public function get($id = null)
{
    if ($id == null) {
        // Obtener todos los pedidos con sus relaciones anidadas
        $pedidos = Pedido::with([
            'estado', 
            'proveedor', 
            'emisor', 
            'receptor',
            'productosPedido.producto',   // Relación con productos
            'productosPedido.rack',       // Relación con racks
            'productosPedido.almacen',    // Relación con almacenes
            'productosPedido.estante'     // Relación con estantes
        ])->get();
        return response()->json($pedidos);
    } else {
        // Obtener un pedido específico con sus relaciones anidadas
        $pedido = Pedido::with([
            'estado', 
            'proveedor', 
            'emisor', 
            'receptor',
            'productosPedido.producto',   // Relación con productos
            'productosPedido.rack',       // Relación con racks
            'productosPedido.almacen',    // Relación con almacenes
            'productosPedido.estante'     // Relación con estantes
        ])->find($id);
        return response()->json($pedido);
    }
}


    public function store(Request $request)
    {
        try {
            $request->validate([
                'numero' => 'required|string|unique:pedidos',
                'fecha' => 'required|date',
                'numero_albaran' => 'nullable|string',
                'observaciones' => 'nullable|string',
                'productos' => 'nullable|json', // Se espera un JSON string
            ], [
                'numero.required' => 'El número es requerido.',
                'numero.unique' => 'El número ya existe.',
                'fecha.required' => 'La fecha es requerida.',
                'fecha.date' => 'La fecha debe ser una fecha válida.',
                // Añadir los mensajes de validación para los otros campos si es necesario
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422);
        }

        $pedido = Pedido::create([
            'numero' => $request->numero,
            'fecha' => $request->fecha,
            'id_estados' => ($request->id_estados != "null") ? $request->id_estados : null,
            'id_proveedores' => ($request->id_proveedores != "null") ? $request->id_proveedores : null,
            'id_emisores' => ($request->id_emisores != "null") ? $request->id_emisores : null,
            'id_receptores' => ($request->id_receptores != "null") ? $request->id_receptores : null,
            'numero_albaran' => $request->numero_albaran,
            'observaciones' => $request->observaciones,
        ]);

        // Decodificar el JSON de productos
        $productos = json_decode($request->productos, true);

        // Procesar los productos del pedido y crear registros en producto_pedido
        if (!empty($productos)) {
            foreach ($productos as $producto) {
                ProductoPedido::create([
                    'id_producto' => $producto['id'],
                    'id_pedido' => $pedido->id,
                    'id_almacen' => $producto['id_almacen'] ?? null,
                    'id_rack' => $producto['id_rack'] ?? null,
                    'id_estante' => $producto['id_estante'] ?? null,
                    'cantidad' => $producto['cantidad'],
                    'verificado' => false, // Valor por defecto
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Pedido creado exitosamente.',
            'pedido' => $pedido,
        ]);
    }
}