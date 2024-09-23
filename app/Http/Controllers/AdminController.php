<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\MenuItems;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('roles')->get();
        $roles = Role::all();
        $menuItems = MenuItems::all();
        return view('admin.index', compact('users', 'roles', 'menuItems'));
    }

    public function assignRole(Request $request, User $user)
    {
        $user->assignRole($request->role);
        return redirect()->back()->with('success', 'Role assigned successfully');
    }

    public function removeRole(Request $request, User $user)
    {
        $user->removeRole($request->role);
        return redirect()->back()->with('success', 'Role removed successfully');
    }

    
}
