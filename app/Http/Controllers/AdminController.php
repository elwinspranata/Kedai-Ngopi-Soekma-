<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // WAJIB ditambahkan agar pewarisan Controller benar
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!auth()->user() || !auth()->user()->isAdmin()) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $products = Product::all();
        $orders = Order::latest()->take(10)->get();
        return view('admin.dashboard', compact('products', 'orders'));
    }
}
