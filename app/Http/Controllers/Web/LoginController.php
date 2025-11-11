<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; 


class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        // Si el usuario ya está autenticado, redirige al dashboard.
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Se asume que esta vista existe en resources/views/auth/login.blade.php
        return view('auth.login');
    }

    /**
     * Procesa la solicitud de inicio de sesión (Ruta: login.post).
     */
    public function login(Request $request)
    {
        // 1. Validar los campos de entrada, incluyendo el rol
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role_access' => ['required', 'in:admin,student'],
        ]);

        // 2. Extraer solo las credenciales de autenticación
        $credentials = $request->only('email', 'password');

        // 3. Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // 4. Verificar que el rol del usuario coincide con el seleccionado
            if ($user->role === $request->role_access) {
                // Roles coinciden: regenerar sesión y redirigir
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            } else {
                // Roles no coinciden: cerrar sesión y devolver error de rol
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'role_access' => 'El rol seleccionado no es válido para esta cuenta.',
                ])->withInput($request->only('email', 'role_access'));
            }
        }

        // 5. Falla en la autenticación (credenciales incorrectas)
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->withInput($request->only('email', 'role_access'));
    }
    
    /**
     * Cierra la sesión del usuario.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}