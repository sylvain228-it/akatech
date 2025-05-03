<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ], [
            'login.required' => 'L’adresse email ou le numéro de téléphone est obligatoire.',
            'password.required' => 'Le mot de passe est obligatoire.',
        ]);

        try {
            $login = $request->input('login');
            $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

            if (Auth::attempt([$field => $login, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->intended('/client/dashboard');
            }

            return back()->with('error', 'Identifiants incorrects.')->withInput();
        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }
}