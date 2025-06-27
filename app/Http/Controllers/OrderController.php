<?php
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $productIds = $request->input('products', []);
        $quantities = $request->input('quantities', []);
        
        if (empty($productIds)) {
            return redirect()->route('home')->with('error', 'Pilih minimal satu produk.');
        }

        $products = Product::whereIn('id', $productIds)->get();
        $orderItems = [];
        $totalHarga = 0;

        foreach ($products as $product) {
            $quantity = $quantities[$product->id] ?? 1;
            $subtotal = $product->harga_produk * $quantity;
            
            $orderItems[] = [
                'id' => $product->id,
                'nama_produk' => $product->nama_produk,
                'harga_produk' => $product->harga_produk,
                'quantity' => $quantity,
                'subtotal' => $subtotal
            ];
            
            $totalHarga += $subtotal;
        }

        return view('order.create', compact('orderItems', 'totalHarga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'items' => 'required|json',
            'total_harga' => 'required|numeric'
        ]);

        $order = Order::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_telepon' => $request->no_telepon,
            'items' => json_decode($request->items, true),
            'total_harga' => $request->total_harga
        ]);

        return redirect()->route('order.payment', $order->id);
    }

    public function payment(Order $order)
    {
        return view('order.payment', compact('order'));
    }

    public function confirmPayment(Order $order)
    {
        $order->update(['status' => 'completed']);
        
        return view('order.success', compact('order'));
    }
}