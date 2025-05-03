<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    protected $guard = 'admin';
    protected $fillable = [
        'name',
        'fname',
        'email',
        'phone',
        'adresse',
        'password',
    ];

    protected $hidden = ['password'];
}