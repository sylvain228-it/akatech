<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'login' => 'required|string',
                'password' => 'required|string',
            ]);

            $login = $request->input('login');
            $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

            if (Auth::guard('admin')->attempt([$field => $login, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->intended('/tech-admin/dashboard');
            }

            return back()->withErrors(['login' => 'Identifiants incorrects.'])->withInput();

        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}