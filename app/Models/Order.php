<?php
// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'no_telepon',
        'items',
        'total_harga',
        'status'
    ];

    protected $casts = [
        'items' => 'array',
        'total_harga' => 'decimal:2'
    ];
}