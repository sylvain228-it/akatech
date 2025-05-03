<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:roles,name',
                'permissions' => 'required|array',
            ]);

            $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);
            $role->syncPermissions($request->permissions);

            return redirect()->route('admin.roles.index')->with('success', 'Rôle créé avec succès.');
        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        try {
            $request->validate([
                'name' => 'required|unique:roles,name,' . $role->id,
                'permissions' => 'required|array',
            ]);

            $role->update(['name' => $request->name]);
            $role->syncPermissions($request->permissions);

            return redirect()->route('admin.roles.index')->with('success', 'Rôle mis à jour avec succès.');

        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return redirect()->route('admin.roles.index')->with('success', 'Rôle supprimé avec succès.');
        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }
}