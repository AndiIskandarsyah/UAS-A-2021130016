<?php
// app/Http/Controllers/AppController.php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function welcome()
    {
        $totalOrders = Order::count();
        $totalMenus = Menu::count();

        return view('index', compact('totalOrders', 'totalMenus'));
    }
}


