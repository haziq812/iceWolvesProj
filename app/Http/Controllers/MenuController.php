<?php

namespace App\Http\Controllers;

use App\Models\MenuItems;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuItems::all(); // Or any query to get your menu items

        
        return view('/menu', compact('menuItems'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        // Create a new menu item
        $menuItem = MenuItems::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        // Return a response (you can adjust the response as needed)
        return response()->json($menuItem, 201);
    }

    public function createMenu(Request $request)
    {
        // Create roles

        $role = Role::where('id', 1)->first();
        
        $user = $request->user();
        if($user->hasRole($role)){
            MenuItems::create(['name' => 'Menu Settings', 'url' => '/menusetting', 'role_id' => 1,]);
            return "Roles created successfully!";
        }

        return "unsuccessfully!";
    }
}
