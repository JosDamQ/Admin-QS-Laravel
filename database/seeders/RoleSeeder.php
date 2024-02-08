<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            //'roles.destroy',
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

        //Crear roles
        $roleMastes = Role::create(['name' => 'master']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $rolPrueba = Role::create(['name' => 'prueba']);

        //Asignar permisos a los roles
        $roleMastes->givePermissionTo(array_merge(
            $statusPermissions,
            $customerPermissions,
            $packagePermissions,
            $userPermissions,
            $rolePermissions
        ));

        $roleAdmin->givePermissionTo(array_merge(
            $statusPermissions,
            $customerPermissions,
            $packagePermissions
        ));



        /*$role1 = Role::create(['name' => 'master']);
        $role2 = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'status.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'status.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'status.store'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'status.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'status.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'status.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'customers.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'customers.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'customers.store'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'customers.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'customers.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'customers.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'packages.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'packages.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'packages.store'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'packages.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'packages.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'packages.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'users.index'])->assignRole($role1);
        Permission::create(['name' => 'users.create'])->assignRole($role1);
        Permission::create(['name' => 'users.store'])->assignRole($role1);
        Permission::create(['name' => 'users.edit'])->assignRole($role1);
        Permission::create(['name' => 'users.update'])->assignRole($role1);
        Permission::create(['name' => 'users.destroy'])->assignRole($role1);*/

        
    }
}
