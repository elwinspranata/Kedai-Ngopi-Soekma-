<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'jenis_produk',
        'harga_produk',
        'deskripsi'
    ];

    protected $casts = [
        'harga_produk' => 'decimal:2'
    ];
}