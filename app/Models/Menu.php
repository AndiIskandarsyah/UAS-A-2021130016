<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = ['id', 'nama', 'harga', 'rekomendasi', 'kategori'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($menu) {
            // Generate the ID based on the first 3 characters of the category and 3 digits
            $menu->id = strtolower(substr($menu->kategori, 0, 3)) . sprintf('%03d', Menu::count() + 1);
        });
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_menu', 'menu_id', 'order_id')
            ->withPivot('quantity', 'status');
    }
}
