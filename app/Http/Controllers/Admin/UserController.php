<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::with('roles')->latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6|confirmed',
            'roles'      => 'nullable|array',
            'permissions'=> 'nullable|array',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Assign roles & permissions
        if (!empty($data['roles'])) {
            $user->syncRoles($data['roles']);
        }

        if (!empty($data['permissions'])) {
            $user->syncPermissions($data['permissions']);
        }

        return redirect()->route('admin.users.index')
                         ->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,'.$user->id,
            'password'   => 'nullable|string|min:6|confirmed',
            'roles'      => 'nullable|array',
            'permissions'=> 'nullable|array',
        ]);

        $user->update([
            'name'  => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'] ? Hash::make($data['password']) : $user->password,
        ]);

        // Sync roles & permissions
        if (isset($data['roles'])) {
            $user->syncRoles($data['roles']);
        } else {
            $user->syncRoles([]); // remove all roles if none selected
        }

        if (isset($data['permissions'])) {
            $user->syncPermissions($data['permissions']);
        } else {
            $user->syncPermissions([]); // remove all permissions if none selected
        }

        return redirect()->route('admin.users.index')
                         ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        // Prevent deleting self
        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }
}
