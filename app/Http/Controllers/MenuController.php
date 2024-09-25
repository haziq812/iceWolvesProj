<?php

namespace App\Http\Controllers;

use App\Models\MenuItems;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\DynamicRoutes;


class MenuController extends Controller
{
    public function index(Request $request)
    {
        dd($request->all());
        $menuItems = MenuItems::all(); // Or any query to get your menu items

        $roles = Role::all();
        return view('/menu', compact('menuItems', 'roles'));
    }

    public function menusetting()
    {
        $menuItems = MenuItems::all();
        $roles = Role::all();
        return view('admin.menusetting', compact('menuItems', 'roles'));
    }

    public function activedMenu(Request $request, MenuItems $menu)
    {
        $menu->update(['is_active' => true]);


        return redirect()->back()->with('success', 'Role removed successfully');
    }

    public function deactivedMenu(Request $request, MenuItems $menu)
    {
        $menu->update(['is_active' => false]);


        return redirect()->back()->with('success', 'Role removed successfully');
    }

    public function storeMenu(Request $request)
    {
        // Validate the request
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'url' => 'required|url',
        //     'role_id' => 'required|int',
        // ]);
        
        $roles = Role::where('name', $request->role)->first();
   
        // Create a new menu item
        $menuItem = MenuItems::create([
            'name' => $request->name,
            'url' => $request->url,
            'role_id' => $roles->id,
        ]);

        // Return a response (you can adjust the response as needed)
        return redirect()->back()->with('success', 'Role assigned successfully');
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
    

    public function RoutesInsert(Request $request)
    {
        
        DynamicRoutes::create([
            'url' => '/home',
            'controller' => 'HomeController',
            'action' => 'index',
            'name' => 'home',
            'middleware' => json_encode(['auth', 'admin']), // Store as JSON
        ]);

        // Return a response (you can adjust the response as needed)
        return redirect()->back()->with('success', 'Role assigned successfully');
        
    }
}
