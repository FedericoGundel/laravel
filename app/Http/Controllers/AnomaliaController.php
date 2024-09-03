<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anomalia;

class AnomaliaController extends Controller
{
    // Método para obtener todas las anomalías
    public function index()
    {
        $anomalias = Anomalia::with('productoPedido')->get();
        return response()->json($anomalias);
    }
    public function get($id = null)
    {
        if ($id == null) {
            // Obtener todos los pedidos con sus relaciones anidadas
            $pedidos = Anomalia::with([
                'productoPedido',
                'productoPedido.pedido',
                'productoPedido.producto'
            ])->get();
            return response()->json($pedidos);
        } else {
            // Obtener un pedido específico con sus relaciones anidadas
            $pedido = Anomalia::with([
                'productoPedido',
                'productoPedido.pedido',
                'productoPedido.producto'
            ])->find($id);
            return response()->json($pedido);
        }
    }
    // Método para crear una nueva anomalía
    public function store(Request $request)
    {
        $request->validate([
            'id_producto_pedido' => 'required|exists:producto_pedido,id',
            'cantidad_i' => 'required|integer',
            'cantidad' => 'required|integer',
        ]);

        $anomalia = Anomalia::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Anomalía creada exitosamente.',
            'anomalia' => $anomalia,
        ]);
    }

    // Método para mostrar una anomalía específica
    public function show($id)
    {
        $anomalia = Anomalia::with('productoPedido')->findOrFail($id);
        return response()->json($anomalia);
    }

    // Método para actualizar una anomalía
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_producto_pedido' => 'required|exists:producto_pedido,id',
            'cantidad_i' => 'required|integer',
            'cantidad' => 'required|integer',
        ]);

        $anomalia = Anomalia::findOrFail($id);
        $anomalia->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Anomalía actualizada exitosamente.',
            'anomalia' => $anomalia,
        ]);
    }

    // Método para eliminar una anomalía
    public function destroy($id)
    {
        $anomalia = Anomalia::findOrFail($id);
        $anomalia->delete();

        return response()->json([
            'success' => true,
            'message' => 'Anomalía eliminada exitosamente.',
        ]);
    }
}