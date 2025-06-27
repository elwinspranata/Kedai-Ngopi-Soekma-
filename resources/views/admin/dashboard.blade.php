<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard Admin - Kedai Ngopi Soekma')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Dashboard Admin</h2>
            <p>Selamat datang, {{ auth()->user()->name }}!</p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Produk</h5>
                    <h2>{{ $products->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Pesanan</h5>
                    <h2>{{ $orders->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Pendapatan Hari Ini</h5>
                    <h2>Rp {{ number_format($orders->where('created_at', '>=', today())->sum('total_harga'), 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Daftar Produk</h5>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Produk
                    </a>
                </div>
                <div class="card-body">
                    @if($products->isEmpty())
                        <p class="text-muted">Belum ada produk.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Jenis</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->nama_produk }}</td>
                                            <td>{{ $product->jenis_produk }}</td>
                                            <td>Rp {{ number_format($product->harga_produk, 0, ',', '.') }}</td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Pesanan Terbaru</h5>
                </div>
                <div class="card-body">
                    @if($orders->isEmpty())
                        <p class="text-muted">Belum ada pesanan.</p>
                    @else
                        @foreach($orders as $order)
                            <div class="border-bottom pb-2 mb-2">
                                <strong>{{ $order->nama_pelanggan }}</strong><br>
                                <small class="text-muted">{{ $order->created_at->format('d/m/Y H:i') }}</small><br>
                                <span class="text-success">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection