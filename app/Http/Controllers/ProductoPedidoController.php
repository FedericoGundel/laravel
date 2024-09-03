<?php

namespace App\Http\Controllers;

use App\Models\ProductoPedido;
use App\Models\Anomalia;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;  // Importar Log
class ProductoPedidoController extends Controller
{
    public function index()
    {
        $productoPedidos = ProductoPedido::all();
        return view('producto_pedido.index', compact('productoPedidos'));
    }

    public function get($id = null)
    {
        if ($id == null) {
            // Obtener todos los pedidos con sus relaciones anidadas
            $pedidos = ProductoPedido::with([
                'pedido',
                'producto',   // Relación con productos
                'rack',       // Relación con racks
                'almacen',    // Relación con almacenes
                'estante'     // Relación con estantes
            ])->get();
            return response()->json($pedidos);
        } else {
            // Obtener un pedido específico con sus relaciones anidadas
            $pedido = ProductoPedido::with([
                'pedido',
                'producto',   // Relación con productos
                'rack',       // Relación con racks
                'almacen',    // Relación con almacenes
                'estante'     // Relación con estantes
            ])->find($id);
            return response()->json($pedido);
        }
    }
    public function create()
    {
        return view('producto_pedido.create');
    }
    public function getByDateRange(Request $request)
    {
        $dates = $request->input('dates'); // Array de fechas pasado por la request

        $result = [];

        // Iterar sobre el arreglo de fechas y crear el arreglo asociativo
        foreach ($dates as $date) {
            $carbonDate = Carbon::parse($date);

            // Obtener los ProductoPedido creados en el día específico
            $productos = ProductoPedido::whereDate('updated_at', $carbonDate->toDateString())->get();

            // Asociar el arreglo de productos a la fecha correspondiente en el arreglo de resultados
            $result[$date] = $productos;
        }

        // Obtener los ProductoPedido del día actual
        $productosHoy = ProductoPedido::whereDate('updated_at', Carbon::today()->toDateString())->get();

        // Retornar el objeto con ambos arreglos
        return response()->json([
            'productosPedidosPorDia' =>$result,
            'dateRange' => $dates,        // Arreglo asociativo de días con sus productos
            'today' => $productosHoy,      // Productos del día actual
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'id_pedido' => 'required|exists:pedidos,id',
            'id_almacen' => 'required|exists:almacenes,id',
            'id_rack' => 'required|exists:racks,id',
            'id_estante' => 'required|exists:estantes,id',
            'cantidad' => 'required|integer',
            'verificado' => 'boolean',
        ]);

        ProductoPedido::create($request->all());

        return redirect()->route('producto_pedido.index')->with('success', 'Producto Pedido creado exitosamente.');
    }

    public function show($id)
    {
        $productoPedido = ProductoPedido::findOrFail($id);
        return view('producto_pedido.show', compact('productoPedido'));
    }





    public function edit(Request $request, $id)
    {
        // Validar los datos de la solicitud
        try {
            $request->validate([
                'id_almacen' => 'nullable|exists:almacenes,id',
                'id_rack' => 'nullable|exists:racks,id',
                'id_estante' => 'nullable|exists:estantes,id',
                'cantidad' => 'required|integer',
                'cantidad_i' => 'required|integer', // Nueva cantidad inicial
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422);
        }
        // Encontrar el registro ProductoPedido por su ID
        $productoPedido = ProductoPedido::findOrFail($id);
        $idUser = Auth::id();

       
        // Actualizar los datos del registro
        $productoPedido->update([
            'id_almacen' => $request->id_almacen,
            'id_rack' => $request->id_rack,
            'id_estante' => $request->id_estante,
            'cantidad' => $request->cantidad,
            'verificado' => true, // Se establece verificado como true
            'id_user' => $idUser, // Se añade el ID del usuario logueado
        ]);
        if ($request->cantidad != $request->cantidad_i) {
            Anomalia::create([
                'id_producto_pedido' => $productoPedido->id,
                'cantidad_i' => $request->cantidad_i,
                'cantidad' => $request->cantidad,
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Producto verificado exitosamente.',
            'producto' => $productoPedido,
        ]);
    }


    public function destroy($id)
    {
        $productoPedido = ProductoPedido::findOrFail($id);
        $productoPedido->delete();

        return redirect()->route('producto_pedido.index')->with('success', 'Producto Pedido eliminado exitosamente.');
    }
}