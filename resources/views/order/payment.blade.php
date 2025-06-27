<!-- resources/views/order/payment.blade.php -->
@extends('layouts.app')

@section('title', 'Pembayaran - Kedai Ngopi Soekma')

@section('content')
<style>
    /* Payment Page Styles */
    .payment-container {
        min-height: 90vh;
        background: linear-gradient(135deg, var(--warm-white) 0%, var(--cream) 100%);
        padding: 2rem 0;
        position: relative;
        overflow: hidden;
    }

    .payment-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none"><circle cx="25" cy="25" r="1.5" fill="rgba(139,111,71,0.1)"/><circle cx="75" cy="35" r="1" fill="rgba(139,111,71,0.08)"/><circle cx="45" cy="75" r="1.2" fill="rgba(139,111,71,0.06)"/></svg>') repeat;
        animation: backgroundMove 20s linear infinite;
    }

    @keyframes backgroundMove {
        0% { transform: translateX(0) translateY(0); }
        100% { transform: translateX(-100px) translateY(-100px); }
    }

    .payment-card {
        background: var(--warm-white);
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 45px rgba(44, 24, 16, 0.15);
        overflow: hidden;
        position: relative;
        z-index: 2;
        backdrop-filter: blur(10px);
    }

    .payment-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--coffee-dark) 0%, var(--gold-accent) 50%, var(--coffee-dark) 100%);
    }

    /* Header Section */
    .payment-header {
        background: linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 100%);
        color: var(--warm-white);
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .payment-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover;
        opacity: 0.1;
        filter: brightness(1.2);
    }

    .payment-header-content {
        position: relative;
        z-index: 2;
    }

    .payment-title {
        font-family: 'Merriweather', serif;
        font-size: 2rem;
        margin-bottom: 0.5rem;
        font-weight: 700;
    }

    .payment-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin: 0;
    }

    .header-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .header-icon i {
        font-size: 2.5rem;
        color: var(--gold-accent);
    }

    /* Order Summary Section */
    .order-summary {
        background: linear-gradient(135deg, #17a2b8 0%, #20c997 100%);
        color: white;
        padding: 2rem;
        margin: 0 2rem 2rem;
        border-radius: 15px;
        position: relative;
        overflow: hidden;
    }

    .order-summary::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover;
        opacity: 0.1;
        filter: brightness(1.1);
    }

    .summary-content {
        position: relative;
        z-index: 2;
    }

    .summary-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }

    .summary-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        backdrop-filter: blur(10px);
    }

    .summary-title {
        font-family: 'Merriweather', serif;
        font-size: 1.4rem;
        margin: 0;
        font-weight: 600;
    }

    .customer-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .info-item {
        background: rgba(255, 255, 255, 0.1);
        padding: 1rem;
        border-radius: 10px;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .info-label {
        font-size: 0.9rem;
        opacity: 0.8;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .info-value {
        font-size: 1.1rem;
        font-weight: 600;
    }

    /* Order Items Table */
    .order-items {
        padding: 0 2rem 2rem;
    }

    .items-table {
        background: var(--warm-white);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(44, 24, 16, 0.1);
        margin-bottom: 2rem;
    }

    .table-header {
        background: linear-gradient(135deg, var(--coffee-medium) 0%, var(--coffee-light) 100%);
        color: var(--warm-white);
        padding: 1rem;
        display: grid;
        grid-template-columns: 2fr 1fr 1.5fr 1.5fr;
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
        grid-template-columns: 2fr 1fr 1.5fr 1.5fr;
        gap: 1rem;
        padding: 1rem;
        border-bottom: 1px solid var(--cream);
        align-items: center;
        transition: all 0.3s ease;
    }

    .table-row:hover {
        background: var(--cream);
    }

    .table-row:last-child {
        border-bottom: none;
    }

    .product-name {
        font-weight: 600;
        color: var(--coffee-dark);
        font-size: 1rem;
    }

    .quantity-badge {
        background: linear-gradient(135deg, var(--coffee-light) 0%, var(--coffee-medium) 100%);
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 600;
        text-align: center;
        display: inline-block;
        min-width: 40px;
    }

    .price-text {
        color: var(--text-dark);
        font-weight: 500;
    }

    .subtotal-text {
        color: var(--coffee-dark);
        font-weight: 600;
        font-size: 1.05rem;
    }

    .table-footer {
        background: linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 100%);
        color: var(--warm-white);
        padding: 1.5rem;
        display: grid;
        grid-template-columns: 2fr 1fr 1.5fr 1.5fr;
        gap: 1rem;
        align-items: center;
    }

    .total-label {
        grid-column: 1 / 4;
        font-size: 1.2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .total-amount {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--gold-accent);
        text-align: right;
    }

    /* Payment Methods Section */
    .payment-methods {
        padding: 0 2rem 2rem;
    }

    .methods-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .methods-title {
        font-family: 'Merriweather', serif;
        font-size: 1.8rem;
        color: var(--coffee-dark);
        margin-bottom: 1rem;
        font-weight: 600;
        position: relative;
        display: inline-block;
    }

    .methods-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--coffee-medium) 0%, var(--gold-accent) 100%);
        border-radius: 2px;
    }

    .methods-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .payment-method {
        background: var(--warm-white);
        border: 3px solid var(--cream);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .payment-method::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(139, 111, 71, 0.1), transparent);
        transition: left 0.5s;
    }

    .payment-method:hover::before {
        left: 100%;
    }

    .payment-method:hover {
        transform: translateY(-5px);
        border-color: var(--coffee-light);
        box-shadow: 0 15px 35px rgba(44, 24, 16, 0.15);
    }

    .payment-method.cash {
        border-color: #28a745;
    }

    .payment-method.cash:hover {
        border-color: #28a745;
        box-shadow: 0 15px 35px rgba(40, 167, 69, 0.2);
    }

    .payment-method.transfer {
        border-color: #17a2b8;
    }

    .payment-method.transfer:hover {
        border-color: #17a2b8;
        box-shadow: 0 15px 35px rgba(23, 162, 184, 0.2);
    }

    .method-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
        position: relative;
        z-index: 2;
    }

    .method-icon.transfer-icon {
        background: linear-gradient(135deg, #17a2b8 0%, #20c997 100%);
        box-shadow: 0 8px 25px rgba(23, 162, 184, 0.3);
    }

    .method-icon i {
        color: white;
        font-size: 2rem;
    }

    .method-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--coffee-dark);
        margin-bottom: 0.5rem;
    }

    .method-description {
        color: var(--text-light);
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .bank-info {
        background: var(--cream);
        padding: 1rem;
        border-radius: 10px;
        margin-top: 1rem;
        border: 1px solid rgba(139, 111, 71, 0.2);
    }

    .bank-details {
        font-weight: 600;
        color: var(--coffee-dark);
        font-size: 0.9rem;
        line-height: 1.6;
    }

    /* Instructions Section */
    .instructions {
        background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
        color: white;
        padding: 2rem;
        margin: 0 2rem 2rem;
        border-radius: 15px;
        position: relative;
        overflow: hidden;
    }

    .instructions::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1447933601403-0c6688de566e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover;
        opacity: 0.1;
        filter: brightness(1.1);
    }

    .instructions-content {
        position: relative;
        z-index: 2;
    }

    .instructions-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .instructions-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        backdrop-filter: blur(10px);
    }

    .instructions-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin: 0;
    }

    .instructions-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .instructions-list li {
        padding: 0.75rem 0;
        display: flex;
        align-items: flex-start;
        font-size: 1rem;
        line-height: 1.5;
    }

    .instructions-list li::before {
        content: '✓';
        background: rgba(255, 255, 255, 0.2);
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        font-weight: bold;
        margin-right: 1rem;
        flex-shrink: 0;
        margin-top: 0.1rem;
    }

    .order-number-highlight {
        background: rgba(255, 255, 255, 0.3);
        padding: 0.2rem 0.5rem;
        border-radius: 5px;
        font-weight: 700;
    }

    /* Confirmation Section */
    .confirmation-section {
        text-align: center;
        padding: 2rem;
        background: linear-gradient(135deg, var(--cream) 0%, var(--warm-white) 100%);
    }

    .confirm-button {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        padding: 1.2rem 3rem;
        border-radius: 50px;
        color: white;
        font-size: 1.2rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
        position: relative;
        overflow: hidden;
        min-width: 250px;
    }

    .confirm-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .confirm-button:hover::before {
        left: 100%;
    }

    .confirm-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(40, 167, 69, 0.4);
        background: linear-gradient(135deg, #20c997 0%, #28a745 100%);
    }

    .confirm-button:active {
        transform: translateY(-1px);
    }

    .confirm-button i {
        margin-right: 0.5rem;
        font-size: 1.1rem;
    }

    .security-note {
        margin-top: 1.5rem;
        color: var(--text-light);
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    /* Loading State */
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
        .payment-title {
            font-size: 1.6rem;
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
        
        .table-row::before {
            content: attr(data-label);
            font-weight: 600;
            color: var(--coffee-dark);
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
        }
        
        .methods-grid {
            grid-template-columns: 1fr;
        }
        
        .customer-info {
            grid-template-columns: 1fr;
        }
        
        .confirm-button {
            width: 100%;
            max-width: 300px;
        }
    }

    @media (max-width: 576px) {
        .payment-container {
            padding: 1rem 0;
        }
        
        .order-summary,
        .instructions {
            margin: 0 1rem 1rem;
            padding: 1.5rem;
        }
        
        .order-items,
        .payment-methods {
            padding: 0 1rem 1rem;
        }
        
        .confirmation-section {
            padding: 1.5rem;
        }
    }
</style>

<div class="payment-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card payment-card">
                    <!-- Payment Header -->
                    <div class="payment-header">
                        <div class="payment-header-content">
                            <div class="header-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <h1 class="payment-title">Pembayaran Pesanan</h1>
                            <p class="payment-subtitle">
                                Selesaikan pembayaran untuk memproses pesanan Anda
                            </p>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="order-summary">
                        <div class="summary-content">
                            <div class="summary-header">
                                <div class="summary-icon">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <h2 class="summary-title">Ringkasan Pesanan</h2>
                            </div>
                            
                            <div class="customer-info">
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-user"></i>
                                        Nama Pelanggan
                                    </div>
                                    <div class="info-value">{{ $order->nama_pelanggan }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-phone"></i>
                                        No. Telepon
                                    </div>
                                    <div class="info-value">{{ $order->no_telepon }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-hashtag"></i>
                                        No. Pesanan
                                    </div>
                                    <div class="info-value">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="order-items">
                        <div class="items-table">
                            <div class="table-header">
                                <div>Produk</div>
                                <div>Qty</div>
                                <div>Harga</div>
                                <div>Subtotal</div>
                            </div>
                            <div class="table-body">
                                @foreach($order->items as $item)
                                    <div class="table-row">
                                        <div class="product-name">{{ $item['nama_produk'] }}</div>
                                        <div>
                                            <span class="quantity-badge">{{ $item['quantity'] }}</span>
                                        </div>
                                        <div class="price-text">Rp {{ number_format($item['harga_produk'], 0, ',', '.') }}</div>
                                        <div class="subtotal-text">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="table-footer">
                                <div class="total-label">Total Pembayaran:</div>
                                <div class="total-amount">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="payment-methods">
                        <div class="methods-header">
                            <h3 class="methods-title">Pilih Metode Pembayaran</h3>
                            <p class="text-muted">Pilih metode pembayaran yang paling nyaman untuk Anda</p>
                        </div>
                        
                        <div class="methods-grid">
                            <div class="payment-method cash">
                                <div class="method-icon">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <h4 class="method-title">Bayar Tunai</h4>
                                <p class="method-description">
                                    Bayar langsung di kasir kedai kami dengan uang tunai. 
                                    Metode yang cepat dan mudah.
                                </p>
                                <div class="method-features">
                                    <small class="text-muted">
                                        <i class="fas fa-check text-success me-1"></i> Proses cepat
                                        <br>
                                        <i class="fas fa-check text-success me-1"></i> Tanpa biaya tambahan
                                    </small>
                                </div>
                            </div>
                            
                            <div class="payment-method transfer">
                                <div class="method-icon transfer-icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <h4 class="method-title">Transfer Bank</h4>
                                <p class="method-description">
                                    Transfer ke rekening bank kami untuk pembayaran yang aman dan terpercaya.
                                </p>
                                <div class="bank-info">
                                    <div class="bank-details">
                                        <strong>Bank BCA</strong><br>
                                        No. Rekening: <strong>1234567890</strong><br>
                                        A.n: <strong>Kedai Ngopi Soekma</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="instructions">
                        <div class="instructions-content">
                            <div class="instructions-header">
                                <div class="instructions-icon">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <h4 class="instructions-title">Petunjuk Pembayaran</h4>
                            </div>
                            <ul class="instructions-list">
                                <li>
                                    Tunjukkan nomor pesanan 
                                    <span class="order-number-highlight">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span> 
                                    kepada kasir saat pembayaran
                                </li>
                                <li>Pesanan akan mulai diproses setelah pembayaran dikonfirmasi oleh kasir</li>
                                <li>Estimasi waktu penyiapan pesanan Anda adalah 10-15 menit</li>
                                <li>Anda akan dipanggil ketika pesanan sudah siap untuk diambil</li>
                                <li>Mohon simpan nomor pesanan sampai pengambilan selesai</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Confirmation Button -->
                    <div class="confirmation-section">
                        <form action="{{ route('order.confirm', $order) }}" method="POST" id="confirmForm">
                            @csrf
                            <button type="submit" class="btn confirm-button" id="confirmBtn">
                                <i class="fas fa-check-circle"></i>
                                Konfirmasi Pembayaran
                            </button>
                        </form>
                        
                        <div class="security-note">
                            <i class="fas fa-shield-alt text-success"></i>
                            <span>Transaksi Anda aman dan terlindungi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Form submission with loading state
document.getElementById('confirmForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('confirmBtn');
    const originalText = submitBtn.innerHTML;
    
    // Add loading state
    submitBtn.innerHTML = '<span class="loading-spinner me-2"></span> Memproses...';
    submitBtn.disabled = true;
    
    // Re-enable after 10 seconds (fallback)
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 10000);
});

// Payment method selection animation
document.querySelectorAll('.payment-method').forEach(method => {
    method.addEventListener('click', function() {
        // Remove previous selections
        document.querySelectorAll('.payment-method').forEach(m => {
            m.classList.remove('selected');
        });
        
        // Add selection to clicked method
        this.classList.add('selected');
        
        // Add selection styling
        const style = document.createElement('style');
        if (!document.getElementById('payment-selection-style')) {
            style.id = 'payment-selection-style';
            style.textContent = `
                .payment-method.selected {
                    border-color: var(--gold-accent) !important;
                    background: linear-gradient(135deg, var(--warm-white) 0%, var(--cream) 100%);
                    box-shadow: 0 15px 35px rgba(212, 175, 55, 0.3) !important;
                    transform: translateY(-5px) scale(1.02);
                }
                .payment-method.selected .method-icon {
                    box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
                    animation: selectedPulse 2s ease-in-out infinite;
                }
                @keyframes selectedPulse {
                    0%, 100% { transform: scale(1); }
                    50% { transform: scale(1.05); }
                }
            `;
            document.head.appendChild(style);
        }
    });
});

// Copy bank account number functionality
function copyBankAccount() {
    const bankNumber = '1234567890';
    navigator.clipboard.writeText(bankNumber).then(() => {
        // Show success notification
        const notification = document.createElement('div');
        notification.className = 'alert alert-success position-fixed';
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            <i class="fas fa-check-circle me-2"></i>
            <strong>Berhasil!</strong> Nomor rekening telah disalin ke clipboard.
            <button type="button" class="btn-close ms-2" onclick="this.parentElement.remove()"></button>
        `;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 3000);
    }).catch(() => {
        // Fallback for older browsers
        const tempInput = document.createElement('input');
        tempInput.value = bankNumber;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        
        alert('Nomor rekening: ' + bankNumber);
    });
}

// Add copy button to bank info
document.addEventListener('DOMContentLoaded', function() {
    const bankInfo = document.querySelector('.bank-info');
    if (bankInfo) {
        const copyButton = document.createElement('button');
        copyButton.type = 'button';
        copyButton.className = 'btn btn-sm btn-outline-primary mt-2';
        copyButton.innerHTML = '<i class="fas fa-copy me-1"></i> Salin Nomor Rekening';
        copyButton.onclick = copyBankAccount;
        bankInfo.appendChild(copyButton);
    }
    
    // Add entrance animations
    const elementsToAnimate = [
        '.order-summary',
        '.items-table',
        '.payment-method',
        '.instructions',
        '.confirmation-section'
    ];
    
    elementsToAnimate.forEach((selector, index) => {
        const elements = document.querySelectorAll(selector);
        elements.forEach((element, elementIndex) => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                element.style.transition = 'all 0.6s ease';
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }, (index * 200) + (elementIndex * 100));
        });
    });
});

// Auto-scroll to payment methods when page loads
window.addEventListener('load', function() {
    setTimeout(() => {
        const paymentMethods = document.querySelector('.payment-methods');
        if (paymentMethods) {
            paymentMethods.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    }, 1000);
});

// Add hover sound effect (optional)
function playHoverSound() {
    // Create a subtle click sound for better UX
    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
    const oscillator = audioContext.createOscillator();
    const gainNode = audioContext.createGain();
    
    oscillator.connect(gainNode);
    gainNode.connect(audioContext.destination);
    
    oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
    gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.1);
    
    oscillator.start(audioContext.currentTime);
    oscillator.stop(audioContext.currentTime + 0.1);
}

// Add sound to payment method clicks
document.querySelectorAll('.payment-method').forEach(method => {
    method.addEventListener('click', playHoverSound);
});

// Form validation
document.getElementById('confirmForm').addEventListener('submit', function(e) {
    const selectedMethod = document.querySelector('.payment-method.selected');
    
    if (!selectedMethod) {
        e.preventDefault();
        
        // Show warning
        const warning = document.createElement('div');
        warning.className = 'alert alert-warning alert-dismissible fade show position-fixed';
        warning.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 350px;';
        warning.innerHTML = `
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Perhatian!</strong> Silakan pilih metode pembayaran terlebih dahulu.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        document.body.appendChild(warning);
        
        // Scroll to payment methods
        document.querySelector('.payment-methods').scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
        
        // Auto remove after 4 seconds
        setTimeout(() => {
            if (warning.parentNode) {
                warning.remove();
            }
        }, 4000);
        
        return false;
    }
});

// Add loading animation to table rows
document.querySelectorAll('.table-row').forEach((row, index) => {
    row.style.opacity = '0';
    row.style.transform = 'translateX(-20px)';
    
    setTimeout(() => {
        row.style.transition = 'all 0.5s ease';
        row.style.opacity = '1';
        row.style.transform = 'translateX(0)';
    }, 600 + (index * 100));
});

// Add responsive table labels for mobile
function addMobileTableLabels() {
    if (window.innerWidth <= 768) {
        const headers = ['Produk', 'Qty', 'Harga', 'Subtotal'];
        const rows = document.querySelectorAll('.table-row');
        
        rows.forEach(row => {
            const cells = row.children;
            for (let i = 0; i < cells.length; i++) {
                cells[i].setAttribute('data-label', headers[i]);
            }
        });
    }
}

// Run on load and resize
addMobileTableLabels();
window.addEventListener('resize', addMobileTableLabels);

// Smooth scroll for internal links
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

// Auto-hide alerts
setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    });
}, 5000);

// Add print functionality
function printPaymentDetails() {
    window.print();
}

// Add print button
const confirmationSection = document.querySelector('.confirmation-section');
if (confirmationSection) {
    const printBtn = document.createElement('button');
    printBtn.type = 'button';
    printBtn.className = 'btn btn-outline-secondary ms-3';
    printBtn.innerHTML = '<i class="fas fa-print me-2"></i>Cetak Detail';
    printBtn.onclick = printPaymentDetails;
    confirmationSection.querySelector('form').appendChild(printBtn);
}
</script>
@endpush
@endsection