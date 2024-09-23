<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the plural form of the model
    protected $table = 'menu_items';

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'url',
        'role_id', 
        'is_active',
    ];

    // Optionally, define any relationships (if applicable)
    // Example: If you have a relationship with another model
    public function role()
    {
        return $this->belongsTo(Role::class); // Assuming 'Role' is the model for the roles table
    }
    //how to use
    // $menuItem = MenuItem::find(1);
    // $role = $menuItem->role; // Fetches the associated Role

    // $role = Role::find(1);
    // $menuItem = $role->menuItem; // Fetches the associated MenuItem

    // You can also define accessor or mutator methods if needed
    // Example: Accessor to get a formatted name
    public function getFormattedNameAttribute()
    {
        return strtoupper($this->name);
    }
}
