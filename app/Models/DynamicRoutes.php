<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicRoutes extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the plural form of the model
    protected $table = 'dynamic_routes';

    // Define the fillable attributes
    protected $fillable = [
        'url',
        'url2',
        'url3', 
        'controller',
        'action', 
        'name',
        'middleware', 
        'is_active',
    ];


    public function getFormattedNameAttribute()
    {
        return strtoupper($this->name);
    }
}
