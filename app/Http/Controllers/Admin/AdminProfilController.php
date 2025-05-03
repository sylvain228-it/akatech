<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\CountValidator\Exception;

class AdminProfilController extends Controller
{
    //
    public function profile()
    {
        return view('admin.profile.profile');
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:100',
            'fname' => 'nullable|string|max:100',
            // 'email' => 'required|email|unique:admins,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'adresse' => 'nullable|string|max:255',
        ]);

        $user->update($request->all());
        return redirect()->back()->with('success', "Informations enregistrées avec succès!");
    }
    public function updatePass(Request $request)
    {
        try {
            $user = Auth::user();
            $request->validate([
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:6|confirmed',
            ]);
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Mot de passe actuel incorrect.']);
            }

            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            return back()->with('success', 'Mot de passe changé avec succès.');

        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }
}