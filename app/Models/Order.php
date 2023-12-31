<?php
// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['id','status'];

    public function orderMenus()
    {
        return $this->hasMany(OrderMenu::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withPivot('quantity');
    }
}
