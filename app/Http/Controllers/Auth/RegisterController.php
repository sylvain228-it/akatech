<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\NotifyAdmin;
use App\Notifications\NotifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\CountValidator\Exception;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits_between:8,15|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L’adresse email est obligatoire.',
            'email.email' => 'L’adresse email n’est pas valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'phone.unique' => 'Ce numéro de téléphone est déjà utilisé.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);


            $messagesLines = [
                "Nous sommes ravis de vous accueillir sur notre plateforme d'investissement.",
                'Merci de nous faire confiance !'
            ];
            $user->notify(new NotifyUser(
                "Bienvenue sur notre plateforme",
                $messagesLines
            ));
            $admin = Admin::findOrFail(1);
            $admin->notify(new NotifyAdmin(
                "Nouveau utilisateur",
                "Un nouvau utilisateur sur SPACE MW",
                'Voir ces informations',
                '/tech-admin/user/' . $user->email
            ), );

            Auth::login($user);

            $user->sendEmailVerificationNotification();
            return redirect()->route('verification.notice');

        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }

    }


}