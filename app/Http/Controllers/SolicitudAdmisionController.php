<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; // Importar la excepción de validación
use App\Models\SolicitudAdmision;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Repositories\ConfigurationRepository;
class SolicitudAdmisionController extends Controller
{
     protected $configRepo;
    function __construct(ConfigurationRepository $configRepo)
    {
        $this->configRepo = $configRepo;
    }
    public function get($id = null)
    {

        $solicitudes = SolicitudAdmision::where('estado', 'pendiente')->get();

    return response()->json($solicitudes);
    }

    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'username' => ['required', 'string', 'max:255', 'unique:users', 'unique:solicitud_admision'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ], [
                'username.required' => 'El nombre de usuario es obligatorio.',
                'username.string' => 'El nombre de usuario debe ser una cadena de caracteres.',
                'username.max' => 'El nombre de usuario no puede exceder los 255 caracteres.',
                'username.unique' => 'Este nombre de usuario ya está en uso.',
                'password.required' => 'La contraseña es obligatoria.',
                'password.string' => 'La contraseña debe ser una cadena de caracteres.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            ]);
        } catch (ValidationException $e) {
            // En caso de fallo en la validación, devolver los errores
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->validator->errors(),
            ], 422); // Código HTTP 422 Unprocessable Entity
        }

        // Crear un nuevo registro de SolicitudAdmision
        $solicitud = SolicitudAdmision::create([
            'estado' => 'pendiente', // Por defecto 'pendiente'
            'username' => $request->username, // Puedes modificar según tus necesidades
            'password' => Hash::make($request->password) // Hash del password
            // Agrega más campos si es necesario
        ]);

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Solicitud de admisión creada exitosamente.',
            'SolicitudAdmision' => $solicitud,
        ]);
    }
    public function aceptar($id)
    {
        $solicitud = SolicitudAdmision::findOrFail($id);
        $solicitud->estado = 'aceptado';
        $solicitud->save();

        // Crear el usuario
        $usuario = new User();
        $usuario->username = $solicitud->username; // Usar el mismo nombre de usuario
        $usuario->password = $solicitud->password; // Usar la misma contraseña
        // Puedes asignar otros campos del usuario según sea necesario
        $usuario->save();
        $usuario->assignRole($this->configRepo->get('role_default'));

        return response()->json([
            'success' => true,
            'message' => 'Usuario creado exitosamente.',
            'familiaProducto' => $usuario,
        ]);
    }
    public function usernameRules()
    {
        return ['required', 'string', 'max:255', 'unique:users'];
    }
    public function delete($id)
    {
        // Buscar el SolicitudAdmision por su ID
        $SolicitudAdmision = SolicitudAdmision::find($id);

        // Verificar si el SolicitudAdmision existe
        if (!$SolicitudAdmision) {
            return response()->json([
                'success' => false,
                'message' => 'Solicitud admisión no encontrada.',
            ], 404); // Código HTTP 404 Not Found
        }

        // Eliminar el SolicitudAdmision
        $SolicitudAdmision->delete();

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Solicitud de admisión eliminada exitosamente.',
        ]);
    }
}