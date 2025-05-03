<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:permissions,name'
            ]);

            Permission::create(['name' => $request->name, 'guard_name' => 'admin']);

            return redirect()->route('admin.permissions.index')->with('success', 'Permission créée avec succès.');

        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        try {
            $request->validate([
                'name' => 'required|unique:permissions,name,' . $permission->id
            ]);

            $permission->update(['name' => $request->name]);

            return redirect()->route('admin.permissions.index')->with('success', 'Permission mise à jour avec succès.');

        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }

    public function destroy(Permission $permission)
    {
        try {
            $permission->delete();

            return redirect()->route('admin.permissions.index')->with('success', 'Permission supprimée avec succès.');
        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }
}