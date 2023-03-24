<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {

        $roles = Role::whereNotIn('name', ['super-admin'])->get();
        $users = User::with('roles')->get();
        // return $users;
        return view('superadmin.Roles.index', [
            'roles' => $roles,
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);
        flash()->addSuccess('Role Succesfully Added!');
        return back();
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Role $role)
    {
        $role->delete();
        flash()->addSuccess('Role Deleted!');
        return back();
    }
}
