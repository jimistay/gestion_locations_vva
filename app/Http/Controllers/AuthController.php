<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Récupérer l'utilisateur authentifié
            $user = Auth::user();

            // Stocker TYPECOMPTE en session
            session(['TYPECOMPTE' => $user->TYPECOMPTE]);

            if ($user->TYPECOMPTE == 'vac' && $user->DATEFERME != null) {
                Auth::logout();
                return redirect()->route('auth.login')->withErrors([
                    'email' => "Vous n'avez pas accès à cette page."
                ])->onlyInput('email');
            }

            return redirect()->intended(route('index'));
        }

        return redirect()->route('auth.login')->withErrors([
            'email' => "Email invalide"
        ])->onlyInput('email');
    }
    /*
    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }
    */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
