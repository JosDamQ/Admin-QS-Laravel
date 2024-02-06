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
        $role1 = Role::create(['name' => 'master']);
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
        Permission::create(['name' => 'users.destroy'])->assignRole($role1);

        
    }
}
