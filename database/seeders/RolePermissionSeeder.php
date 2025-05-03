<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guard = 'admin';

        // 1. Créer les permissions
        $permissions = [

            'view users',
            'create withdraw',
            'edit withdraw',
            'delete withdraw',

            'view roles',
            'create roles',
            'edit roles',
            'delete roles',

            'Ct0',

            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',

            'view classes',
            'create classes',
            'edit classes',
            'delete classes',

            'view admins',

            'view transactions',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => $guard,
            ]);
        }

        // 2. Créer les rôles et leur assigner les permissions
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => $guard]);
        $CTOAdmin = Role::firstOrCreate(['name' => 'Ct0', 'guard_name' => $guard]);
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => $guard]);

        $allPermissions = Permission::where('guard_name', $guard)->pluck('name')->toArray();

        $CTOAdmin->syncPermissions($allPermissions);

        // admin aura un sous-ensemble des permissions
        $admin->syncPermissions([
            'view users',
            'create withdraw',
            'delete withdraw',
            'view classes',
            'create classes',
            'edit classes',
            'delete classes',
            'view transactions',
        ]);
        $superAdmin->syncPermissions([
            'view users',
            'view classes',
            'view transactions',
        ]);




        $firstAdmin = Admin::factory()->create([
            'username' => 'Admin',
            'email' => 'webdeveloppeur.fr@gmail.com',
            'password' => Hash::make('@228admin@gmail.Com'),
        ]);


        $firstAdmin->assignRole('admin');
        $firstAdmin->assignRole('Ct0');
    }
}