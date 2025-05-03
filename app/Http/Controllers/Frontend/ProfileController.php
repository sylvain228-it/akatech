<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Mockery\CountValidator\Exception;
class ProfileController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        return view('frontend.profile.dashboard');
    }
    public function profile()
    {
        return view('frontend.profile.profile');
    }






    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:100',
            'fname' => 'nullable|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'adresse' => 'nullable|string|max:255',
        ]);

        try {
            $user->update($request->only('name', 'email', 'phone', 'fname', 'adresse'));
            return back()->with('success', 'Profil mis à jour avec succès.');

        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }

    public function updatePhoto(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'photo_profile' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048']
        ]);
        try {
            if ($request->hasFile('photo_profile')) {
                $file = $request->file('photo_profile');
                $exe = '.' . $file->getClientOriginalExtension();
                $imageName = uniqid() . '_' . 'media' . $exe;
                $folder = "photo-profile";
                $path = $file->storeAs($folder, $imageName, 'public');

                if (Storage::disk('public')->exists($user->photo_profile)) {
                    Storage::disk('public')->delete($user->photo_profile);
                }
                $user->photo_profile = $path;
            }
            $user->update();
            return back()->with('success', 'Photo profile changé avec succès.');

        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }

    }

    public function resetPass(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);
        try {
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
    public function guides()
    {
        return view('frontend.profile.guides');
    }

}