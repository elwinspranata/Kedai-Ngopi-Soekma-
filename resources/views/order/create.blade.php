<!-- resources/views/order/create.blade.php -->
@extends('layouts.app')

@section('title', 'Konfirmasi Pesanan - Kedai Ngopi Soekma')

@section('content')
<style>
    /* Order Create Page Styles */
    .order-create-container {
        min-height: 90vh;
        background: linear-gradient(135deg, var(--warm-white) 0%, var(--cream) 100%);
        padding: 2rem 0;
        position: relative;
        overflow: hidden;
    }

    .order-create-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none"><circle cx="20" cy="30" r="1" fill="rgba(139,111,71,0.08)"/><circle cx="80" cy="20" r="1.5" fill="rgba(139,111,71,0.06)"/><circle cx="60" cy="80" r="1.2" fill="rgba(139,111,71,0.05)"/><circle cx="30" cy="70" r="0.8" fill="rgba(139,111,71,0.07)"/></svg>') repeat;
        animation: patternMove 25s linear infinite;
    }

    @keyframes patternMove {
        0% { transform: translateX(0) translateY(0); }
        100% { transform: translateX(-100px) translateY(-100px); }
    }

    .order-card {
        background: var(--warm-white);
        border: none;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(44, 24, 16, 0.15);
        overflow: hidden;
        position: relative;
        z-index: 2;
        backdrop-filter: blur(10px);
    }

    .order-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--coffee-dark) 0%, var(--gold-accent) 50%, var(--coffee-dark) 100%);
    }

    /* Header Section */
    .order-header {
        background: linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 100%);
        color: var(--warm-white);
        padding: 2.5rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .order-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1442512595331-e89e73853f31?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover;
        opacity: 0.1;
        filter: brightness(1.2);
    }

    .order-header-content {
        position: relative;
        z-index: 2;
    }

    .header-icon {
        width: 90px;
        height: 90px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        backdrop-filter: blur(10px);
        border: 3px solid rgba(255, 255, 255, 0.3);
        animation: headerIconFloat 3s ease-in-out infinite;
    }

    @keyframes headerIconFloat {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .header-icon i {
        font-size: 2.5rem;
        color: var(--gold-accent);
    }

    .order-title {
        font-family: 'Merriweather', serif;
        font-size: 2.2rem;
        margin-bottom: 0.8rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .order-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin: 0;
        line-height: 1.5;
    }

    /* Order Details Section */
    .order-details {
        padding: 2rem;
    }

    .section-header {
        display: flex;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--cream);
    }

    .section-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--coffee-medium) 0%, var(--coffee-light) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        box-shadow: 0 6px 20px rgba(93, 63, 38, 0.3);
    }

    .section-icon i {
        color: white;
        font-size: 1.4rem;
    }

    .section-title {
        font-family: 'Merriweather', serif;
        font-size: 1.6rem;
        color: var(--coffee-dark);
        margin: 0;
        font-weight: 600;
    }

    /* Order Items Table */
    .order-table {
        background: var(--warm-white);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(44, 24, 16, 0.1);
        margin-bottom: 3rem;
        border: 1px solid rgba(139, 111, 71, 0.1);
    }

    .table-header {
        background: linear-gradient(135deg, var(--coffee-medium) 0%, var(--coffee-light) 100%);
        color: var(--warm-white);
        padding: 1.2rem;
        display: grid;
        grid-template-columns: 2fr 1.5fr 1fr 1.5fr;
        gap: 1rem;
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-body {
        padding: 0;
    }

    .table-row {
        display: grid;
        grid-template-columns: 2fr 1.5fr 1fr 1.5fr;
        gap: 1rem;
        padding: 1.2rem;
        border-bottom: 1px solid var(--cream);
        align-items: center;
        transition: all 0.3s ease;
    }

    .table-row:hover {
        background: linear-gradient(135deg, var(--cream) 0%, rgba(245, 242, 237, 0.5) 100%);
        transform: translateX(5px);
    }

    .table-row:last-child {
        border-bottom: none;
    }

    .product-name {
        font-weight: 600;
        color: var(--coffee-dark);
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .product-name::before {
        content: '☕';
        font-size: 1.2rem;
        opacity: 0.7;
    }

    .price-text {
        color: var(--text-dark);
        font-weight: 500;
    }

    .quantity-display {
        background: linear-gradient(135deg, var(--coffee-light) 0%, var(--coffee-medium) 100%);
        color: white;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        text-align: center;
        display: inline-block;
        min-width: 50px;
        box-shadow: 0 3px 10px rgba(93, 63, 38, 0.3);
    }

    .subtotal-text {
        color: var(--coffee-dark);
        font-weight: 700;
        font-size: 1.1rem;
    }

    .table-footer {
        background: linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 100%);
        color: var(--warm-white);
        padding: 1.5rem;
        display: grid;
        grid-template-columns: 2fr 1.5fr 1fr 1.5fr;
        gap: 1rem;
        align-items: center;
    }

    .total-label {
        grid-column: 1 / 4;
        font-size: 1.3rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .total-amount {
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--gold-accent);
        text-align: right;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    /* Customer Form Section */
    .customer-form {
        background: var(--cream);
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        border: 1px solid rgba(139, 111, 71, 0.1);
        box-shadow: 0 6px 20px rgba(44, 24, 16, 0.08);
    }

    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-label {
        font-weight: 600;
        color: var(--coffee-dark);
        margin-bottom: 0.5rem;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-label i {
        color: var(--coffee-light);
        font-size: 1.1rem;
    }

    .form-control {
        border: 2px solid var(--warm-white);
        border-radius: 12px;
        padding: 0.8rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--warm-white);
        box-shadow: 0 2px 8px rgba(44, 24, 16, 0.05);
    }

    .form-control:focus {
        border-color: var(--coffee-light);
        box-shadow: 0 0 0 0.2rem rgba(139, 111, 71, 0.25);
        background: var(--warm-white);
        transform: translateY(-2px);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: 0.5rem;
        font-size: 0.875rem;
        color: #dc3545;
        font-weight: 500;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 2rem;
        background: linear-gradient(135deg, var(--warm-white) 0%, var(--cream) 100%);
        gap: 1rem;
    }

    .back-button {
        background: linear-gradient(135deg, var(--text-light) 0%, var(--text-dark) 100%);
        border: none;
        padding: 0.8rem 2rem;
        border-radius: 25px;
        color: white;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 6px 20px rgba(107, 107, 107, 0.3);
    }

    .back-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(107, 107, 107, 0.4);
        color: white;
        text-decoration: none;
        background: linear-gradient(135deg, var(--text-dark) 0%, var(--text-light) 100%);
    }

    .submit-button {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        padding: 1rem 2.5rem;
        border-radius: 30px;
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
        position: relative;
        overflow: hidden;
        min-width: 200px;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        justify-content: center;
    }

    .submit-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .submit-button:hover::before {
        left: 100%;
    }

    .submit-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(40, 167, 69, 0.4);
        background: linear-gradient(135deg, #20c997 0%, #28a745 100%);
    }

    .submit-button:active {
        transform: translateY(-1px);
    }

    .submit-button i {
        font-size: 1.2rem;
    }

    /* Progress Indicator */
    .progress-indicator {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem 2rem;
        background: var(--cream);
        margin-bottom: 0;
    }

    .progress-step {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-light);
        font-size: 0.9rem;
        font-weight: 500;
    }

    .progress-step.active {
        color: var(--coffee-dark);
        font-weight: 600;
    }

    .progress-step-icon {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: var(--text-light);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .progress-step.active .progress-step-icon {
        background: linear-gradient(135deg, var(--coffee-medium) 0%, var(--coffee-light) 100%);
        animation: activeStepPulse 2s ease-in-out infinite;
    }

    @keyframes activeStepPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    .progress-connector {
        width: 50px;
        height: 2px;
        background: var(--cream);
        margin: 0 1rem;
        position: relative;
    }

    .progress-connector.active::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: linear-gradient(90deg, var(--coffee-medium), var(--coffee-light));
        animation: progressFlow 2s ease-in-out infinite;
    }

    @keyframes progressFlow {
        0% { width: 0%; }
        100% { width: 100%; }
    }

    /* Coffee decoration */
    .coffee-decoration {
        position: absolute;
        top: 20px;
        right: 30px;
        color: rgba(139, 111, 71, 0.1);
        font-size: 3rem;
        animation: coffeeFloat 4s ease-in-out infinite;
    }

    @keyframes coffeeFloat {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 0.1;
        }
        50% {
            transform: translateY(-15px) rotate(5deg);
            opacity: 0.2;
        }
    }

    /* Loading state */
    .loading-spinner {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 1s ease-in-out infinite;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .order-title {
            font-size: 1.8rem;
        }
        
        .order-subtitle {
            font-size: 1rem;
        }
        
        .table-header,
        .table-row,
        .table-footer {
            grid-template-columns: 1fr;
            gap: 0.5rem;
            text-align: center;
        }
        
        .table-header {
            display: none;
        }
        
        .table-row {
            border: 1px solid var(--cream);
            border-radius: 10px;
            margin-bottom: 1rem;
            padding: 1.5rem;
        }
        
        .table-row > div::before {
            content: attr(data-label) ': ';
            font-weight: 600;
            color: var(--coffee-dark);
            display: inline-block;
            min-width: 80px;
        }
        
        .action-buttons {
            flex-direction: column-reverse;
            gap: 1rem;
        }
        
        .back-button,
        .submit-button {
            width: 100%;
            justify-content: center;
        }
        
        .progress-indicator {
            flex-direction: column;
            gap: 1rem;
        }
        
        .progress-connector {
            transform: rotate(90deg);
            width: 30px;
            margin: 0.5rem 0;
        }
        
        .coffee-decoration {
            display: none;
        }
    }

    @media (max-width: 576px) {
        .order-create-container {
            padding: 1rem 0;
        }
        
        .order-details,
        .customer-form,
        .action-buttons {
            padding: 1.5rem;
        }
        
        .section-header {
            flex-direction: column;
            text-align: center;
        }
        
        .section-icon {
            margin-right: 0;
            margin-bottom: 1rem;
        }
    }

    /* Print styles */
    @media print {
        .order-create-container::before,
        .coffee-decoration,
        .action-buttons {
            display: none !important;
        }
        
        .order-card {
            box-shadow: none;
            border: 1px solid #ddd;
        }
    }
</style>

<div class="order-create-container">
    <!-- Coffee decoration -->
    <div class="coffee-decoration">
        <i class="fas fa-coffee"></i>
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card order-card">
                    <!-- Progress Indicator -->
                    <div class="progress-indicator">
                        <div class="progress-step">
                            <div class="progress-step-icon">1</div>
                            <span>Pilih Menu</span>
                        </div>
                        <div class="progress-connector"></div>
                        <div class="progress-step active">
                            <div class="progress-step-icon">2</div>
                            <span>Konfirmasi Pesanan</span>
                        </div>
                        <div class="progress-connector"></div>
                        <div class="progress-step">
                            <div class="progress-step-icon">3</div>
                            <span>Pembayaran</span>
                        </div>
                    </div>

                    <!-- Order Header -->
                    <div class="order-header">
                        <div class="order-header-content">
                            <div class="header-icon">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h1 class="order-title">Konfirmasi Pesanan</h1>
                            <p class="order-subtitle">
                                Periksa kembali pesanan Anda dan lengkapi data untuk melanjutkan ke pembayaran
                            </p>
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div class="order-details">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <h2 class="section-title">Detail Pesanan Anda</h2>
                        </div>
                        
                        <div class="order-table">
                            <div class="table-header">
                                <div>Produk</div>
                                <div>Harga</div>
                                <div>Jumlah</div>
                                <div>Subtotal</div>
                            </div>
                            <div class="table-body">
                                @foreach($orderItems as $item)
                                    <div class="table-row">
                                        <div class="product-name" data-label="Produk">{{ $item['nama_produk'] }}</div>
                                        <div class="price-text" data-label="Harga">Rp {{ number_format($item['harga_produk'], 0, ',', '.') }}</div>
                                        <div data-label="Jumlah">
                                            <span class="quantity-display">{{ $item['quantity'] }}</span>
                                        </div>
                                        <div class="subtotal-text" data-label="Subtotal">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="table-footer">
                                <div class="total-label">
                                    <i class="fas fa-calculator"></i>
                                    Total Pembayaran:
                                </div>
                                <div class="total-amount">Rp {{ number_format($totalHarga, 0, ',', '.') }}</div>
                            </div>
                        </div>

                        <!-- Customer Form -->
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            <h2 class="section-title">Data Pelanggan</h2>
                        </div>

                        <form action="{{ route('order.store') }}" method="POST" id="orderForm">
                            @csrf
                            <input type="hidden" name="items" value="{{ json_encode($orderItems) }}">
                            <input type="hidden" name="total_harga" value="{{ $totalHarga }}">

                            <div class="customer-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_pelanggan" class="form-label">
                                                <i class="fas fa-user"></i>
                                                Nama Lengkap
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('nama_pelanggan') is-invalid @enderror" 
                                                   id="nama_pelanggan" 
                                                   name="nama_pelanggan" 
                                                   value="{{ old('nama_pelanggan') }}" 
                                                   placeholder="Masukkan nama lengkap Anda"
                                                   required>
                                            @error('nama_pelanggan')
                                                <div class="invalid-feedback">
                                                    <i class="fas fa-exclamation-circle me-1"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_telepon" class="form-label">
                                                <i class="fas fa-phone"></i>
                                                No. Telepon
                                            </label>
                                            <input type="tel" 
                                                   class="form-control @error('no_telepon') is-invalid @enderror" 
                                                   id="no_telepon" 
                                                   name="no_telepon" 
                                                   value="{{ old('no_telepon') }}" 
                                                   placeholder="Contoh: 08123456789"
                                                   required>
                                            @error('no_telepon')
                                                <div class="invalid-feedback">
                                                    <i class="fas fa-exclamation-circle me-1"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="alert alert-info" style="background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%); border: none; border-radius: 10px;">
                                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                        <i class="fas fa-info-circle" style="color: #0c5460; font-size: 1.2rem;"></i>
                                        <strong style="color: #0c5460;">Informasi Penting</strong>
                                    </div>
                                    <ul style="margin: 0; padding-left: 1.5rem; color: #0c5460;">
                                        <li>Pastikan data yang Anda masukkan sudah benar</li>
                                        <li>Nomor telepon akan digunakan untuk konfirmasi pesanan</li>
                                        <li>Anda akan menerima notifikasi ketika pesanan siap</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <a href="{{ route('home') }}" class="back-button">
                                    <i class="fas fa-arrow-left"></i>
                                    Kembali ke Menu
                                </a>
                                <button type="submit" class="submit-button" id="submitBtn">
                                    <i class="fas fa-credit-card"></i>
                                    Lanjut ke Pembayaran
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Form submission with validation and loading state
document.getElementById('orderForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.innerHTML;
    
    // Basic validation
    const namaInput = document.getElementById('nama_pelanggan');
    const teleponInput = document.getElementById('no_telepon');
    
    if (!namaInput.value.trim()) {
        e.preventDefault();
        namaInput.focus();
        showAlert('error', 'Nama lengkap harus diisi!');
        return false;
    }
    
    if (!teleponInput.value.trim()) {
        e.preventDefault();
        teleponInput.focus();
        showAlert('error', 'Nomor telepon harus diisi!');
        return false;
    }
    
    // Phone number validation
    const phoneRegex = /^[0-9+\-\s()]+$/;
    if (!phoneRegex.test(teleponInput.value)) {
        e.preventDefault();
        teleponInput.focus();
        showAlert('error', 'Format nomor telepon tidak valid!');
        return false;
    }
    
    // Add loading state
    submitBtn.innerHTML = '<span class="loading-spinner me-2"></span> Memproses Pesanan...';
    submitBtn.disabled = true;
    
    // Re-enable after 10 seconds (fallback)
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 10000);
});

// Show alert function
function showAlert(type, message) {
    const alertClass = type === 'error' ? 'alert-danger' : 'alert-success';
    const alertIcon = type === 'error' ? 'fas fa-exclamation-circle' : 'fas fa-check-circle';
    
    const alert = document.createElement('div');
    alert.className = `alert ${alertClass} alert-dismissible fade show position-fixed`;
    alert.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 350px; max-width: 400px;';
    alert.innerHTML = `
        <i class="${alertIcon} me-2"></i>
        <strong>${type === 'error' ? 'Error!' : 'Berhasil!'}</strong> ${message}
        <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
    `;
    document.body.appendChild(alert);
    
    // Auto remove after 4 seconds
    setTimeout(() => {
        if (alert.parentNode) {
            alert.remove();
        }
    }, 4000);
}

// Enhanced form validation
function validateForm() {
    const namaInput = document.getElementById('nama_pelanggan');
    const teleponInput = document.getElementById('no_telepon');
    let isValid = true;
    
    // Clear previous errors
    document.querySelectorAll('.is-invalid').forEach(input => {
        input.classList.remove('is-invalid');
    });
    
    // Validate name
    if (!namaInput.value.trim() || namaInput.value.trim().length < 2) {
        namaInput.classList.add('is-invalid');
        isValid = false;
    }
    
    // Validate phone
    const phoneRegex = /^(\+62|62|0)[0-9]{9,12}$/;
    if (!teleponInput.value.trim() || !phoneRegex.test(teleponInput.value.replace(/[\s\-()]/g, ''))) {
        teleponInput.classList.add('is-invalid');
        isValid = false;
    }
    
    return isValid;
}

// Real-time validation
document.getElementById('nama_pelanggan').addEventListener('input', function() {
    const value = this.value.trim();
    if (value.length >= 2) {
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    } else {
        this.classList.remove('is-valid');
        if (value.length > 0) {
            this.classList.add('is-invalid');
        }
    }
});

document.getElementById('no_telepon').addEventListener('input', function() {
    const value = this.value.replace(/[\s\-()]/g, '');
    const phoneRegex = /^(\+62|62|0)[0-9]{9,12}$/;
    
    if (phoneRegex.test(value)) {
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    } else {
        this.classList.remove('is-valid');
        if (value.length > 0) {
            this.classList.add('is-invalid');
        }
    }
});

// Auto-format phone number
document.getElementById('no_telepon').addEventListener('input', function() {
    let value = this.value.replace(/\D/g, '');
    
    // Auto-add country code if starting with 8
    if (value.startsWith('8')) {
        value = '0' + value;
    }
    
    // Format with dashes for better readability
    if (value.length > 4) {
        value = value.substring(0, 4) + '-' + value.substring(4);
    }
    if (value.length > 9) {
        value = value.substring(0, 9) + '-' + value.substring(9);
    }
    
    this.value = value;
});

// Page load animations
document.addEventListener('DOMContentLoaded', function() {
    // Animate order items
    const orderRows = document.querySelectorAll('.table-row');
    orderRows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateX(-30px)';
        
        setTimeout(() => {
            row.style.transition = 'all 0.6s ease';
            row.style.opacity = '1';
            row.style.transform = 'translateX(0)';
        }, index * 150);
    });
    
    // Animate form elements
    const formElements = document.querySelectorAll('.form-group');
    formElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            element.style.transition = 'all 0.5s ease';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, 800 + (index * 200));
    });
    
    // Focus on first input
    setTimeout(() => {
        document.getElementById('nama_pelanggan').focus();
    }, 1200);
});

// Progress indicator animation
function animateProgress() {
    const activeStep = document.querySelector('.progress-step.active');
    const connector = activeStep.nextElementSibling;
    
    if (connector && connector.classList.contains('progress-connector')) {
        connector.classList.add('active');
    }
}

// Run progress animation after page load
setTimeout(animateProgress, 1000);

// Add order summary animation
function animateOrderSummary() {
    const totalAmount = document.querySelector('.total-amount');
    if (totalAmount) {
        const finalAmount = totalAmount.textContent;
        let currentAmount = 0;
        const targetAmount = parseInt(finalAmount.replace(/[^\d]/g, ''));
        const increment = targetAmount / 50;
        
        const counter = setInterval(() => {
            currentAmount += increment;
            if (currentAmount >= targetAmount) {
                currentAmount = targetAmount;
                clearInterval(counter);
            }
            totalAmount.textContent = 'Rp ' + Math.floor(currentAmount).toLocaleString('id-ID');
        }, 30);
    }
}

// Run total animation
setTimeout(animateOrderSummary, 1500);

// Add keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + Enter to submit form
    if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
        e.preventDefault();
        if (validateForm()) {
            document.getElementById('orderForm').submit();
        }
    }
    
    // Escape to go back
    if (e.key === 'Escape') {
        e.preventDefault();
        if (confirm('Apakah Anda yakin ingin kembali ke menu? Data yang sudah diisi akan hilang.')) {
            window.location.href = document.querySelector('.back-button').href;
        }
    }
});

// Add smooth scroll for any internal links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Auto-save form data to localStorage for recovery
function saveFormData() {
    const formData = {
        nama_pelanggan: document.getElementById('nama_pelanggan').value,
        no_telepon: document.getElementById('no_telepon').value,
        timestamp: Date.now()
    };
    localStorage.setItem('orderFormData', JSON.stringify(formData));
}

function loadFormData() {
    try {
        const savedData = localStorage.getItem('orderFormData');
        if (savedData) {
            const data = JSON.parse(savedData);
            // Only restore if saved within last 30 minutes
            if (Date.now() - data.timestamp < 30 * 60 * 1000) {
                document.getElementById('nama_pelanggan').value = data.nama_pelanggan || '';
                document.getElementById('no_telepon').value = data.no_telepon || '';
            } else {
                localStorage.removeItem('orderFormData');
            }
        }
    } catch (e) {
        console.log('Could not load saved form data');
    }
}

// Auto-save on input
document.getElementById('nama_pelanggan').addEventListener('input', saveFormData);
document.getElementById('no_telepon').addEventListener('input', saveFormData);

// Load saved data on page load
loadFormData();

// Clear saved data on successful submission
document.getElementById('orderForm').addEventListener('submit', function() {
    if (validateForm()) {
        localStorage.removeItem('orderFormData');
    }
});

// Add mobile-specific enhancements
if (window.innerWidth <= 768) {
    // Add mobile table labels
    const headers = ['Produk', 'Harga', 'Jumlah', 'Subtotal'];
    const rows = document.querySelectorAll('.table-row');
    
    rows.forEach(row => {
        const cells = row.children;
        for (let i = 0; i < cells.length; i++) {
            cells[i].setAttribute('data-label', headers[i]);
        }
    });
}

// Add print functionality
function printOrderSummary() {
    window.print();
}

// Add copy order details functionality
function copyOrderDetails() {
    const orderItems = Array.from(document.querySelectorAll('.table-row')).map(row => {
        const cells = row.children;
        return `${cells[0].textContent.trim()} - Qty: ${cells[2].textContent.trim()} - ${cells[3].textContent.trim()}`;
    }).join('\n');
    
    const totalAmount = document.querySelector('.total-amount').textContent.trim();
    const orderSummary = `RINGKASAN PESANAN\n\n${orderItems}\n\nTotal: ${totalAmount}`;
    
    navigator.clipboard.writeText(orderSummary).then(() => {
        showAlert('success', 'Detail pesanan telah disalin ke clipboard!');
    }).catch(() => {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = orderSummary;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        showAlert('success', 'Detail pesanan telah disalin!');
    });
}

// Add additional action buttons
const actionButtons = document.querySelector('.action-buttons');
if (actionButtons) {
    const additionalActions = document.createElement('div');
    additionalActions.style.cssText = 'position: absolute; top: 10px; right: 10px; display: flex; gap: 0.5rem;';
    additionalActions.innerHTML = `
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="printOrderSummary()" title="Cetak">
            <i class="fas fa-print"></i>
        </button>
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="copyOrderDetails()" title="Salin Detail">
            <i class="fas fa-copy"></i>
        </button>
    `;
    document.querySelector('.order-card').style.position = 'relative';
    document.querySelector('.order-card').appendChild(additionalActions);
}
</script>
@endpush
@endsection