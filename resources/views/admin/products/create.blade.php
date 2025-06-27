<!-- resources/views/admin/products/create.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Produk - Admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Produk Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" 
                                   id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}" required>
                            @error('nama_produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis_produk" class="form-label">Jenis Produk</label>
                            <select class="form-control @error('jenis_produk') is-invalid @enderror" 
                                   id="jenis_produk" name="jenis_produk" required>
                                <option value="">Pilih Jenis Produk</option>
                                <option value="Kopi Panas" {{ old('jenis_produk') == 'Kopi Panas' ? 'selected' : '' }}>Kopi Panas</option>
                                <option value="Kopi Dingin" {{ old('jenis_produk') == 'Kopi Dingin' ? 'selected' : '' }}>Kopi Dingin</option>
                                <option value="Non Kopi" {{ old('jenis_produk') == 'Non Kopi' ? 'selected' : '' }}>Non Kopi</option>
                                <option value="Makanan Ringan" {{ old('jenis_produk') == 'Makanan Ringan' ? 'selected' : '' }}>Makanan Ringan</option>
                            </select>
                            @error('jenis_produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga_produk" class="form-label">Harga Produk</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control @error('harga_produk') is-invalid @enderror" 
                                       id="harga_produk" name="harga_produk" value="{{ old('harga_produk') }}" 
                                       min="0" step="0.01" required>
                            </div>
                            @error('harga_produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi (Opsional)</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection