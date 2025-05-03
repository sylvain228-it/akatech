<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use Spatie\Permission\Models\Permission;

class AdminPermissionController extends Controller
{
    public function edit(Admin $admin)
    {
        $permissions = Permission::all();
        $adminPermissions = $admin->permissions->pluck('id')->toArray();

        return view('admin.admin-list.permissions', compact('admin', 'permissions', 'adminPermissions'));
    }

    public function update(Request $request, Admin $admin)
    {
        try {
            $permissionIds = $request->permissions ?? [];

            $permissionNames = Permission::whereIn('id', $permissionIds)
                ->where('guard_name', 'admin')
                ->pluck('name')
                ->toArray();

            $admin->syncPermissions($permissionNames);
            return redirect()->route('admin.admin.permissions.edit', $admin->id)->with('success', 'Permissions mises à jour.');
        } catch (Exception $e) {
            return response("Error : Quelques choses s'est mal passées");
        }
    }
}