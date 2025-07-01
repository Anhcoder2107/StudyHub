<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PermissionController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Pages/Permission/Index', [
            'permissions' => \Spatie\Permission\Models\Permission::all(),
        ]);
    }
    public function create()
    {
        return Inertia::render('Admin/Pages/Permission/Create');
    }

    public function edit($permission){
        return Inertia::render('Admin/Pages/Permission/Edit', ['id' => $permission]);
    }
}
