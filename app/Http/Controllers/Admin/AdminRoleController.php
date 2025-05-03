<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use Spatie\Permission\Models\Role;

class AdminRoleController extends Controller
{
    public function edit(Admin $admin)
    {
        $roles = Role::all();
        $adminRoles = $admin->roles->pluck('id')->toArray();

        return view('admin.admin-list.roles', compact('admin', 'roles', 'adminRoles'));
    }

    public function update(Request $request, Admin $admin)
    {
        try {
            $roleIds = $request->roles ?? [];

            $roleNames = Role::whereIn('id', $roleIds)
                ->where('guard_name', 'admin')
                ->pluck('name')
                ->toArray();

            $admin->syncRoles($roleNames);

            return redirect()->route('admin.admin.roles.edit', $admin->id)->with('success', 'Rôles mis à jour.');
        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }
}