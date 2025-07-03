<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|max:50',
        ]);

        Role::create([
            'role' => $request->role,
        ]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|string|max:50',
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'role' => $request->role,
        ]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }
}
