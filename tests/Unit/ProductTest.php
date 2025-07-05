<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    public function test_harga_produk_memiliki_format_dua_digit()
    {
        $produk = new Product([
            'nama_produk' => 'Kopi Hitam',
            'jenis_produk' => 'Minuman',
            'harga_produk' => 15000.456,
            'deskripsi' => 'Kopi hitam asli'
        ]);

        $formatted = number_format($produk->harga_produk, 2, '.', '');
        $this->assertEquals('15000.46', $formatted);
    }
}
