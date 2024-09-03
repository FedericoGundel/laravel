<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;
use App\Models\ProductoPedido;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;  // Importar Log
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);
        
        $role = Role::pluck('name','name')->all();

        return view('users.index',compact('user','role'));
    }
    public function get()
    {
        $users = User::select(['id', 'username', 'profile_image'])->with('productosPedido') // Cargar la relación con productos_pedido
        ->get();
    
        return response()->json($users);
    }

    public function getByDateRange(Request $request)
{
    $dates = $request->input('dates'); // Array de fechas pasado por la request
    $result = [];

    foreach ($dates as $date) {
        // Formatear la fecha para asegurar que se compara correctamente
        $formattedDate = \Carbon\Carbon::parse($date)->format('Y-m-d');

        // Obtener los usuarios con sus ProductoPedido asociados actualizados en la fecha específica
        $users = User::with(['productosPedido' => function ($query) use ($formattedDate) {
            $query->whereDate('updated_at', $formattedDate);
        }])->get();

        // Agregar la fecha y los usuarios al resultado
        $result[$formattedDate] = $users;
    }
    return response()->json([
        'productosPedidosPorDia' =>$result,
        'dateRange' => $dates      // Productos del día actual
    ]);
   
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $role = Role::find($id);
        return view('users.index',compact('user,role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    

     public function edit(Request $request)
     {
 
          try {
         // Validar los datos de la solicitud
         $request->validate([
             'user_id' => 'required|exists:users,id',
             'atributo' => 'required|string'
           
         ], [
             'user_id.required' => 'El ID del usuario es obligatorio.',
             'user_id.exists' => 'El usuario no existe.',
             'user_id.required' => 'El atributo es obligatorio.'
           
         ]);
     
         $userId = $request->input('user_id');
         $atributo = $request->input('atributo');
         $valor = $request->input('valor');
 
         // Buscar el usuario
         $user = User::find($userId);
 
         
            $user->$atributo = ($atributo != "password") ? $valor : Hash::make($valor);
            $user->save();

    
     
         // Remover todos los roles actuales del usuario y asignar el nuevo rol
       
     
         return response()->json([
             'success' => true,
             'message' => 'Atributo asignado exitosamente al usuario.',
             'user' => $user
         ]);
         } catch (ValidationException $e) {
             // En caso de fallo en la validación, devolver los errores
             return response()->json([
                 'success' => false,
                 'message' => 'Error de validación',
                 'errors' => $e->validator->errors(),
                 'objeto' => $request
             ], 422); // Código HTTP 422 Unprocessable Entity
         } catch (\Exception $e) {
             return response()->json([
                 'success' => false,
                 'message' => 'Se produjo un error al editar el usuario.',
                 'error' => $e->getMessage(),
             ], 500); // Código HTTP 500 Internal Server Error
         }
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required'
        ]);
    
        $user = User::find($id);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
    
        $user->assignRole($request->input('role'));
    
        return redirect('users')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::find($id)->delete();
        return redirect('users')->with('success','User deleted successfully');
    }

    public function set_img(Request $request)
    {
        try {
        // Validar los datos del formulario
        $request->validate([
          'user_id' => 'required|exists:users,id',
        ], [
             'user_id.required' => 'El ID del usuario es obligatorio.',
            'user_id.exists' => 'El usuario no existe.',
            
        ]);
    } catch (ValidationException $e) {
        // En caso de fallo en la validación, devolver los errores
        return response()->json([
            'success' => false,
            'message' => 'Error de validación',
            'errors' => $e->validator->errors(),
        ], 422); // Código HTTP 422 Unprocessable Entity
    }
     // Obtener el usuario y el rol
     $user = User::findOrFail($request->input('user_id'));
     $user->profile_image = ($request->hasFile('archivo')) ? 1 : 0;
     $user->save();
     if ($request->hasFile('archivo')) {
        $file = $request->file('archivo');
        $fileName = $user->id . '.' . strtolower($file->getClientOriginalExtension()); // Nombre del archivo como el ID del producto
        $filePath = $file->storeAs('', $fileName, 'profile_images'); // Guardar el archivo en el disco 'product_images'
        Log::error($filePath);
        Log::error(strtolower($file->getClientOriginalExtension()));
        Log::error($file->getClientOriginalExtension());
    }
    // Devolver una respuesta JSON
    return response()->json([
        'success' => true,
        'message' => 'Producto creado exitosamente.'
    ]);
    }
}