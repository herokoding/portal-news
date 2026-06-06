<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Define the relationship with the Menu model
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_roles');
    }

    // Define the relationship with the User model
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
