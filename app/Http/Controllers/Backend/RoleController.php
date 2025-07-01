<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // Show the form for creating a new resource.
    public function create()
    {
        return Inertia::render('Admin/Pages/Role/Create');
    }

    public function index(){
        return Inertia::render('Admin/Pages/Role/Index');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $allPermissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        // var_dump($rolePermissions);

        return Inertia::render('Admin/Pages/Role/Edit', [
            'role' => $role,
            'permissions' => $allPermissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }
}
