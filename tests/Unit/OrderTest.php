<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    private array $sampleData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->sampleData = [
            'nama_pelanggan' => 'Firdausy Tama',
            'no_telepon' => '08123456789',
            'items' => [
                ['nama_produk' => 'Kopi Hitam', 'jumlah' => 2, 'harga' => 15000],
                ['nama_produk' => 'Roti Bakar', 'jumlah' => 1, 'harga' => 12000],
            ],
            'total_harga' => 42000,
            'status' => 'pending'
        ];
    }

    #[Test]
    public function it_can_create_an_order(): void
    {
        $order = Order::create($this->sampleData);

        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals('Firdausy Tama', $order->nama_pelanggan);
    }

    #[Test]
    public function order_data_is_saved_to_database(): void
    {
        Order::create($this->sampleData);

        $this->assertDatabaseHas('orders', [
            'nama_pelanggan' => 'Firdausy Tama',
            'no_telepon' => '08123456789',
            'total_harga' => 42000,
            'status' => 'pending'
        ]);
    }

    #[Test]
    public function items_are_casted_as_array(): void
    {
        $order = Order::create($this->sampleData);

        $this->assertIsArray($order->items);
        $this->assertEquals('Kopi Hitam', $order->items[0]['nama_produk']);
    }
}
