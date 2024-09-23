<?php

namespace App\Http\Controllers;


use Spatie\Permission\Models\Role;
use App\Models\User; // Import the User model
use Illuminate\Http\Request; // Import the correct Request class

class RolesController extends Controller
{
    public function createRoles()
    {
        // Create roles

        Role::create(['name' => 'manager']);
        Role::create(['name' => 'user']);

        return "Roles created successfully!";
    }

    public function assignRole(Request $request)
    {
        // Validate the incoming request
        // $request->validate([
        //     'email' => 'required|email', // Ensure an email is provided
        //     'role' => 'required|string', // Ensure a role is provided
        // ]);

        // Find the user by email
        // $user = User::first();
        // dd($user);
        // dd($request->user());
        $user = $request->user();


        $role = Role::where('id', 2)->first();

        if (!$user) {
            return "User not found.";
        }

        // Assign the role to the user
        if ($user->hasRole($role)) {
            return "User already has the '{$role}' role.";
        }

        $user->assignRole($role);

        return "Role '{$role}' has been assigned to {$user->name}.";
    }
}
