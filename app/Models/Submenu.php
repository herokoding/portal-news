<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Define the relationship with the Menu model
    public function menu()
    {
        // A submenu belongs to a menu
        return $this->belongsTo(Menu::class);
    }
}
