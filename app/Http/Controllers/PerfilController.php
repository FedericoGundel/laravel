<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Asegúrate de importar el modelo User
use Spatie\Permission\Models\Role;
class PerfilController extends Controller
{
    /**
     * Muestra el perfil del usuario.
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // Encuentra el usuario por ID
        $user = User::find($id);
    
        // Verifica si el usuario existe
        if (!$user) {
            // Puedes redirigir o devolver un error si el usuario no se encuentra
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    
        // Obtén los roles y permisos
        $roles = Role::with('permissions')->get()->map(function ($role) use ($user) {
            // Verifica si el usuario tiene el rol
            $role->default = ($user->hasRole($role->name)) ? true : false;
            
            // Mapea los permisos
            $role->permisos = $role->permissions->pluck('name');
            unset($role->permissions);
    
            return $role;
        });
    
        // Devuelve la vista con los datos del usuario
        return view('perfil', ['user' => $user, 'roles' => $roles]);
    }
}