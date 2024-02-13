<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $statusPermissions = [
            'status.index',
            'status.create',
            'status.store',
            'status.edit',
            'status.update',
            'status.destroy',
        ];

        // Definir permisos para las rutas de Customers
        $customerPermissions = [
            'customers.index',
            'customers.create',
            'customers.store',
            'customers.edit',
            'customers.update',
            'customers.destroy',
        ];

        // Definir permisos para las rutas de Packages
        $packagePermissions = [
            'packages.index',
            'packages.create',
            'packages.store',
            'packages.edit',
            'packages.update',
            'packages.destroy',
        ];

        // Definir permisos para las rutas de Users
        $userPermissions = [
            'users.index',
            'users.create',
            'users.store',
            'users.edit',
            'users.update',
            'users.destroy',
        ];

        //Definir permisos para las rutas de Roles
        $rolePermissions = [
            'roles.index',
            'roles.create',
            'roles.store',
            'roles.edit',
            'roles.update',
            'roles.destroy',
        ];

        // Insertar permisos en la base de datos
        Permission::insert(array_map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        }, array_merge(
            $statusPermissions,
            $customerPermissions,
            $packagePermissions,
            $userPermissions,
            $rolePermissions
        )));

        // Crear roles
        $master = Role::create(['name' => 'master']);

        // Asignar permisos a los roles
        $master->givePermissionTo(array_merge(
            $statusPermissions,
            $customerPermissions,
            $packagePermissions,
            $userPermissions,
            $rolePermissions
        ));

        $master->givePermissionTo(array_merge(
            $statusPermissions,
            $customerPermissions,
            $packagePermissions
        ));
    }
}
