<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin Soekma',
            'email' => 'admin@soekma.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Sample Products
        $products = [
            [
                'nama_produk' => 'Espresso',
                'jenis_produk' => 'Kopi Panas',
                'harga_produk' => 15000,
                'deskripsi' => 'Kopi hitam pekat dengan rasa yang kuat dan aroma yang khas.'
            ],
            [
                'nama_produk' => 'Cappuccino',
                'jenis_produk' => 'Kopi Panas',
                'harga_produk' => 22000,
                'deskripsi' => 'Kopi dengan campuran susu steamed dan foam yang lembut.'
            ],
            [
                'nama_produk' => 'Latte',
                'jenis_produk' => 'Kopi Panas',
                'harga_produk' => 25000,
                'deskripsi' => 'Kopi dengan susu steamed yang creamy dan sedikit foam.'
            ],
            [
                'nama_produk' => 'Americano',
                'jenis_produk' => 'Kopi Panas',
                'harga_produk' => 18000,
                'deskripsi' => 'Espresso yang dicampur dengan air panas.'
            ],
            [
                'nama_produk' => 'Iced Coffee',
                'jenis_produk' => 'Kopi Dingin',
                'harga_produk' => 20000,
                'deskripsi' => 'Kopi dingin yang menyegarkan dengan es batu.'
            ],
            [
                'nama_produk' => 'Cold Brew',
                'jenis_produk' => 'Kopi Dingin',
                'harga_produk' => 23000,
                'deskripsi' => 'Kopi yang diseduh dengan air dingin selama 12 jam.'
            ],
            [
                'nama_produk' => 'Iced Latte',
                'jenis_produk' => 'Kopi Dingin',
                'harga_produk' => 27000,
                'deskripsi' => 'Latte dingin dengan susu dan es yang menyegarkan.'
            ],
            [
                'nama_produk' => 'Hot Chocolate',
                'jenis_produk' => 'Non Kopi',
                'harga_produk' => 20000,
                'deskripsi' => 'Minuman cokelat panas yang creamy dan manis.'
            ],
            [
                'nama_produk' => 'Teh Tarik',
                'jenis_produk' => 'Non Kopi',
                'harga_produk' => 12000,
                'deskripsi' => 'Teh dengan susu yang dicampur dengan teknik tarik.'
            ],
            [
                'nama_produk' => 'Croissant',
                'jenis_produk' => 'Makanan Ringan',
                'harga_produk' => 15000,
                'deskripsi' => 'Roti berbentuk bulan sabit yang renyah dan buttery.'
            ],
            [
                'nama_produk' => 'Sandwich Club',
                'jenis_produk' => 'Makanan Ringan',
                'harga_produk' => 28000,
                'deskripsi' => 'Sandwich dengan daging, sayuran segar, dan saus.'
            ],
            [
                'nama_produk' => 'Kue Brownies',
                'jenis_produk' => 'Makanan Ringan',
                'harga_produk' => 18000,
                'deskripsi' => 'Kue cokelat yang lembut dan fudgy.'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}