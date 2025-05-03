<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function liste()
    {
        $users = User::orderByDesc('created_at')->get();
        return view('admin.utilisateurs.index', compact('users'));
    }
    public function show($email)
    {
        $user = User::where('email', $email)->firstOrFail();
        return view('admin.utilisateurs.show', compact('user'));
    }
}