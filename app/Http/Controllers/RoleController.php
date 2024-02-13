<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Roles::orderBy('created_at', 'desc')->get();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'required|array',
        ]);

        $newRole = Role::create(['name' => $request->input('name')]);

        //$newRole->guard_name = 'web';

        $permissionsRole = Permission::find($request->input('permissions'));
        $newRole->syncPermissions($permissionsRole);

        session()->flash('status', 'Role was created with their permissions!');

        return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,'.$role->id,
            'permissions' => 'nullable|array',
        ]);

        // Actualizar el nombre del rol
        $role->name = $request->input('name');
        $role->save();

        // Actualizar los permisos del rol
        $permissionsRole = Permission::find($request->input('permissions'));
        $role->syncPermissions($permissionsRole);

        session()->flash('statusKey', 'Role was updated successfully!');

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
