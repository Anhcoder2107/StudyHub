<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Pages/User/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = \Spatie\Permission\Models\Role::all();
        return Inertia::render('Admin/Pages/User/Create',[
            'role' => $role,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $role = \Spatie\Permission\Models\Role::all();
        $userRoles = $user->getRoleNames()->toArray();

        return Inertia::render('Admin/Pages/User/Edit', [
            'user' => $user,
            'roles' => $role,
            'userRoles' => $userRoles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function roles(string $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $roles = \Spatie\Permission\Models\Role::all();
        $userRoles = $user->getRoleNames()->toArray();

        return Inertia::render('Admin/Pages/User/UserHasRole', [
            'id' => $id,
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
        ]);
    }
}
