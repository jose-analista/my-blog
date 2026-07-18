<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function autheticated() 

    { 
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Verifica si el usuario está bloqueado antes de permitir el acceso
            if (Auth::user()->blocked == '1') {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Tu cuenta está bloqueada.');
            }
    
            // El usuario no está bloqueado, continua con la lógica de inicio de sesión normal
            return redirect()->intended('/dashboard');
        }
    
        return redirect()->route('login')->with('error', 'Credenciales incorrectas.');

        if(Auth::user()->role_as == '1')
        {
            return redirect('admin/home')->with('status', 'Bienvenido al panel de control');
        }
        else
        {
            return redirect()->back()->with('status', 'Inicio de sesión con éxito');
        }
    
    } 
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 
}
