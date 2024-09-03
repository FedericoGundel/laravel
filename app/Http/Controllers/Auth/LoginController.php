<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
    protected function attemptLogin(Request $request)
{
    $credentials = $this->credentials($request);

    if (!Auth::attempt($credentials, $request->filled('remember'))) {
        $user = \App\Models\User::where('username', $credentials['username'])->first();

        if ($user) {
            throw ValidationException::withMessages([
                'password' => ['La contraseña proporcionada es incorrecta.'],
            ]);
        } else {
            throw ValidationException::withMessages([
                'username' => ['El nombre de usuario proporcionado no existe.'],
            ]);
        }
    }

    // Si la autenticación es exitosa y el usuario seleccionó "Recordarme"
    if ($request->filled('remember')) {
        // Almacenar el nombre de usuario y la contraseña en cookies
        cookie()->queue('username', $credentials['username'], 43200); // 30 días
        cookie()->queue('password', $credentials['password'], 43200); // 30 días
    } else {
        // Eliminar las cookies si el usuario no seleccionó "Recordarme"
        cookie()->queue(cookie()->forget('username'));
        cookie()->queue(cookie()->forget('password'));
    }

    return true;
}


    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    public function username()
    {
        return 'username';
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
}