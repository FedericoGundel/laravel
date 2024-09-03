<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

use App\Repositories\ConfigurationRepository;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $configRepo;
    function __construct(ConfigurationRepository $configRepo)
    {
        $this->configRepo = $configRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);

        return view('roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function set(Request $request)
    {

         try {
        // Validar los datos de la solicitud
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ], [
            'user_id.required' => 'El ID del usuario es obligatorio.',
            'user_id.exists' => 'El usuario no existe.',
            'role_id.required' => 'El ID del rol es obligatorio.',
            'role_id.exists' => 'El rol no existe.',
        ]);
    
        // Obtener el usuario y el rol
        $user = User::findOrFail($request->input('user_id'));
        $role = Role::findOrFail($request->input('role_id'));
    
        // Remover todos los roles actuales del usuario y asignar el nuevo rol
        $user->syncRoles([$role->name]);
    
        return response()->json([
            'success' => true,
            'message' => 'Rol asignado exitosamente al usuario.',
            'user' => $user,
            'role' => $role,
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
                'message' => 'Se produjo un error al actualizar el rol.',
                'error' => $e->getMessage(),
            ], 500); // Código HTTP 500 Internal Server Error
        }
    }
    
    
    public function default($id)
    {
        // Verificar si el rol con el ID proporcionado existe
        $role = Role::find($id);
    
        if ($role) {
            // Guardar el ID del rol en la configuración
            $this->configRepo->set('role_default', $id);
    
            return response()->json([
                'success' => true,
                'message' => 'Rol por defecto actualizado correctamente.',
                'role' => $role,
            ]);
        } else {
            // Retornar un error si el rol no existe
            return response()->json([
                'success' => false,
                'message' => 'Rol no encontrado.',
            ], 404);
        }
    }
    
    public function get($id = null)
    {

        if ($id == null) {
           /*
            $user = User::find(1);
            $user->assignRole($this->configRepo->get('role_default'));
            */
            $roles = Role::with('permissions')->get()->map(function ($role) {
                $role->default = ($this->configRepo->get('role_default') == $role->id) ? true : false;
                $role->permisos = $role->permissions->pluck('name');
                unset($role->permissions);
                return $role;
            });

            

            return Response::json($roles);
        } else {

            // Obtener un solo rol por su ID
            $role = Role::with('permissions')->find($id);
            if ($role) {
                $role->permisos = $role->permissions->pluck('name');
                unset($role->permissions);
                return response()->json($role);
            } else {
                return response()->json(['error' => 'Rol no encontrado'], 404);
            }
            return Response::json($role);
        }
    }


    public function permisos()
    {
        $permisos = Permission::all();

        return Response::json($permisos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'name' => 'required|unique:roles,name',
                'permission' => 'required|array',
            ], [
                'name.required' => 'El nombre del rol es obligatorio.',
                'name.unique' => 'El nombre del rol ya está en uso.',
                'permission.required' => 'Debes seleccionar al menos un permiso para el rol.',
            ]);
        } catch (ValidationException $e) {
            // En caso de fallo en la validación, devolver los errores
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422); // Código HTTP 422 Unprocessable Entity
        }

        $role = Role::create(['name' => $request->input('name')]);
        // Obtener los permisos por nombre
        $permissionNames = $request->input('permission');
        $permissions = Permission::whereIn('name', $permissionNames)->get();

        // Asignar los permisos al rol
        $role->syncPermissions($permissions);


        return response()->json([
            'success' => true,
            'message' => 'Rol creado exitosamente.',
            'role' => $role
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'name' => 'required|unique:roles,name,' . $id,
                'permission' => 'required|array',
            ], [
                'name.required' => 'El nombre del rol es obligatorio.',
                'name.unique' => 'El nombre del rol ya está en uso.',
                'permission.required' => 'Debes seleccionar al menos un permiso para el rol.',
            ]);
    
            // Encontrar el rol específico que se está editando
            $role = Role::findOrFail($id);
    
            // Actualizar el nombre del rol
            $role->name = $request->input('name');
            $role->save();
    
            // Obtener los permisos por nombre
            $permissionNames = $request->input('permission');
            $permissions = Permission::whereIn('name', $permissionNames)->get();
    
            // Asignar los permisos al rol
            $role->syncPermissions($permissions);
    
            return response()->json([
                'success' => true,
                'message' => 'Rol actualizado exitosamente.',
                'role' => $role,
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
                'message' => 'Se produjo un error al actualizar el rol.',
                'error' => $e->getMessage(),
            ], 500); // Código HTTP 500 Internal Server Error
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->configRepo->get('role_default') == $id){
        return response()->json([
                'success' => false,
                'message' => 'Rol por defecto selecionado'
            ], 422); // Código HTTP 422 Unprocessable Entity
        }else{
            DB::table("roles")->where('id', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Rol eliminado exitosamente.'
            ]);
        }
        
        
    }

    protected function setEnvValue($key, $value)
{
    $path = base_path('.env');

    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            "$key=" . env($key),
            "$key=$value",
            file_get_contents($path)
        ));
    }
}
}