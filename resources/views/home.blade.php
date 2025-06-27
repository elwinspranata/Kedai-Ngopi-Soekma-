<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Beranda - Kedai Ngopi Soekma')

@section('content')
<style>
    /* Hero Section Styles */
    .hero-section {
        background: linear-gradient(135deg, rgba(44, 24, 16, 0.9) 0%, rgba(93, 63, 38, 0.8) 100%), 
                    url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
        min-height: 500px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        margin-bottom: 3rem;
        box-shadow: 0 15px 35px rgba(44, 24, 16, 0.2);
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1.5" fill="rgba(255,255,255,0.08)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.06)"/></svg>') repeat;
        animation: sparkle 4s linear infinite;
    }

    @keyframes sparkle {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.8; }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        color: var(--warm-white);
        text-align: center;
        padding: 3rem;
    }

    .hero-title {
        font-family: 'Merriweather', serif;
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        font-weight: 300;
        margin-bottom: 2rem;
        opacity: 0.95;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
    }

    .hero-stats {
        display: flex;
        justify-content: center;
        gap: 3rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .stat-item {
        text-align: center;
        color: var(--warm-white);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--gold-accent);
        display: block;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Menu Section Styles */
    .menu-section {
        margin-bottom: 4rem;
    }

    .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-title {
        font-family: 'Merriweather', serif;
        font-size: 2.5rem;
        color: var(--coffee-dark);
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, var(--coffee-medium) 0%, var(--gold-accent) 100%);
        border-radius: 2px;
    }

    .section-subtitle {
        font-size: 1.1rem;
        color: var(--text-light);
        max-width: 500px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Product Card Styles */
    .product-card {
        height: 100%;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        background: var(--warm-white);
        box-shadow: 0 8px 25px rgba(44, 24, 16, 0.1);
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(44, 24, 16, 0.2);
    }

    .product-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 200px;
        background: linear-gradient(135deg, var(--cream) 0%, var(--warm-white) 100%);
        background-image: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        background-size: cover;
        background-position: center;
        filter: opacity(0.9);
    }

    .product-card.coffee::before {
        background-image: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
    }

    .product-card.food::before {
        background-image: url('https://images.unsplash.com/photo-1586444248902-2f64eddc13df?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
    }

    .product-card.snack::before {
        background-image: url('https://images.unsplash.com/photo-1558961363-fa8fdf82db35?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
    }

    .product-body {
        position: relative;
        z-index: 2;
        padding: 1.5rem;
        margin-top: 180px;
        background: var(--warm-white);
        border-radius: 15px 15px 0 0;
    }

    .product-title {
        font-family: 'Merriweather', serif;
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--coffee-dark);
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .product-type {
        display: inline-block;
        padding: 0.3rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1rem;
    }

    .product-type.coffee {
        background: linear-gradient(135deg, var(--coffee-light) 0%, var(--coffee-medium) 100%);
        color: var(--warm-white);
    }

    .product-type.food {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
    }

    .product-type.snack {
        background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%);
        color: white;
    }

    .product-description {
        color: var(--text-light);
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 1rem;
        height: 60px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .product-price {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--coffee-dark);
        margin-bottom: 1.5rem;
    }

    .product-price::before {
        content: 'Rp ';
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--text-light);
    }

    /* Product Footer Styles */
    .product-footer {
        background: var(--cream);
        padding: 1.5rem;
        border-top: 1px solid rgba(44, 24, 16, 0.1);
    }

    .product-select {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .custom-checkbox {
        position: relative;
        display: flex;
        align-items: center;
        cursor: pointer;
        font-weight: 500;
        color: var(--coffee-dark);
    }

    .custom-checkbox input[type="checkbox"] {
        opacity: 0;
        position: absolute;
        left: -9999px;
    }

    .checkbox-mark {
        width: 20px;
        height: 20px;
        border: 2px solid var(--coffee-light);
        border-radius: 4px;
        margin-right: 0.5rem;
        position: relative;
        transition: all 0.3s ease;
        background: var(--warm-white);
    }

    .custom-checkbox input[type="checkbox"]:checked + .checkbox-mark {
        background: var(--coffee-medium);
        border-color: var(--coffee-medium);
    }

    .custom-checkbox input[type="checkbox"]:checked + .checkbox-mark::after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 12px;
        font-weight: bold;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .quantity-label {
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--coffee-dark);
        margin-bottom: 0;
    }

    .quantity-input {
        width: 70px;
        border: 2px solid var(--cream);
        border-radius: 8px;
        padding: 0.5rem;
        text-align: center;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .quantity-input:focus {
        border-color: var(--coffee-light);
        outline: none;
        box-shadow: 0 0 0 3px rgba(139, 111, 71, 0.1);
    }

    /* Order Button Styles */
    .order-section {
        text-align: center;
        margin-top: 4rem;
        padding: 3rem 0;
        background: linear-gradient(135deg, var(--cream) 0%, var(--warm-white) 100%);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(44, 24, 16, 0.1);
    }

    .order-button {
        background: linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 100%);
        border: none;
        padding: 1rem 3rem;
        border-radius: 50px;
        color: var(--warm-white);
        font-size: 1.2rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(44, 24, 16, 0.3);
        position: relative;
        overflow: hidden;
    }

    .order-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .order-button:hover::before {
        left: 100%;
    }

    .order-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(44, 24, 16, 0.4);
        background: linear-gradient(135deg, var(--coffee-medium) 0%, var(--coffee-dark) 100%);
    }

    .order-button:active {
        transform: translateY(-1px);
    }

    .order-button i {
        margin-right: 0.5rem;
        font-size: 1.1rem;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: var(--cream);
        border-radius: 20px;
        margin: 2rem 0;
    }

    .empty-icon {
        font-size: 4rem;
        color: var(--coffee-light);
        margin-bottom: 1.5rem;
        opacity: 0.7;
    }

    .empty-title {
        font-size: 1.5rem;
        color: var(--coffee-dark);
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .empty-message {
        color: var(--text-light);
        font-size: 1.1rem;
    }

    /* Floating Action Styles */
    .floating-cart {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .floating-cart.show {
        opacity: 1;
        visibility: visible;
    }

    .floating-cart-btn {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--gold-accent) 0%, #B8941F 100%);
        border: none;
        color: var(--coffee-dark);
        font-size: 1.5rem;
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
        transition: all 0.3s ease;
        position: relative;
    }

    .floating-cart-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 12px 35px rgba(212, 175, 55, 0.6);
    }

    .cart-count {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #dc3545;
        color: white;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        font-size: 0.8rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Animation Classes */
    .fade-in {
        animation: fadeIn 0.6s ease-out;
    }

    .slide-up {
        animation: slideUp 0.8s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }
        
        .hero-stats {
            gap: 2rem;
        }
        
        .stat-number {
            font-size: 2rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .product-body {
            margin-top: 160px;
        }
        
        .hero-content {
            padding: 2rem 1rem;
        }
        
        .floating-cart {
            bottom: 20px;
            right: 20px;
        }
        
        .floating-cart-btn {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }
    }

    @media (max-width: 576px) {
        .hero-stats {
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .product-select {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .quantity-control {
            width: 100%;
            justify-content: space-between;
        }
    }
</style>

<div class="container-fluid px-0">
    <!-- Hero Section -->
    <div class="container">
        <div class="hero-section fade-in">
            <div class="hero-content">
                <h1 class="hero-title">Selamat Datang di Kedai Ngopi Soekma</h1>
                <p class="hero-subtitle">
                    Nikmati pengalaman kopi terbaik dengan biji kopi pilihan, 
                    suasana yang hangat, dan pelayanan yang ramah di hati Yogyakarta
                </p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">150+</span>
                        <span class="stat-label">Cup Terjual/Hari</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">4.9</span>
                        <span class="stat-label">Rating Pelanggan</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">24</span>
                        <span class="stat-label">Menu Pilihan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Menu Section -->
    <div class="menu-section slide-up">
        <div class="section-header">
            <h2 class="section-title">Menu Pilihan Kami</h2>
            <p class="section-subtitle">
                Setiap sajian dibuat dengan penuh cinta menggunakan bahan-bahan terbaik 
                untuk memberikan pengalaman rasa yang tak terlupakan
            </p>
        </div>
        
        <form action="{{ route('order.create') }}" method="POST" id="orderForm">
            @csrf
            <div class="row g-4">
                @forelse($products as $index => $product)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card product-card {{ strtolower($product->jenis_produk) }}" 
                             style="animation-delay: {{ $index * 0.1 }}s">
                            <div class="product-body">
                                <h5 class="product-title">{{ $product->nama_produk }}</h5>
                                <span class="product-type {{ strtolower($product->jenis_produk) }}">
                                    {{ $product->jenis_produk }}
                                </span>
                                @if($product->deskripsi)
                                    <p class="product-description">{{ $product->deskripsi }}</p>
                                @else
                                    <p class="product-description">
                                        Minuman berkualitas tinggi dengan cita rasa yang autentik dan menyegarkan.
                                    </p>
                                @endif
                                <div class="product-price">
                                    {{ number_format($product->harga_produk, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="product-footer">
                                <div class="product-select">
                                    <label class="custom-checkbox" for="product{{ $product->id }}">
                                        <input type="checkbox" 
                                               name="products[]" 
                                               value="{{ $product->id }}" 
                                               id="product{{ $product->id }}"
                                               onchange="updateCartCount()">
                                        <span class="checkbox-mark"></span>
                                        Pilih Item
                                    </label>
                                </div>
                                <div class="quantity-control">
                                    <label for="quantity{{ $product->id }}" class="quantity-label">Jumlah:</label>
                                    <input type="number" 
                                           class="form-control quantity-input" 
                                           name="quantities[{{ $product->id }}]" 
                                           id="quantity{{ $product->id }}" 
                                           value="1" 
                                           min="1" 
                                           max="99"
                                           onchange="updateCartCount()">
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-coffee"></i>
                            </div>
                            <h3 class="empty-title">Menu Sedang Dipersiapkan</h3>
                            <p class="empty-message">
                                Kami sedang menyiapkan menu-menu istimewa untuk Anda. 
                                Silakan kembali lagi nanti.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($products->count() > 0)
                <div class="order-section">
                    <button type="submit" class="btn order-button" id="orderButton">
                        <i class="fas fa-shopping-cart"></i>
                        Pesan Sekarang
                    </button>
                    <p class="mt-3 text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Pilih minimal satu item untuk melanjutkan pesanan
                    </p>
                </div>
            @endif
        </form>
    </div>
</div>

<!-- Floating Cart Button -->
<div class="floating-cart" id="floatingCart">
    <button type="button" class="btn floating-cart-btn" onclick="scrollToOrder()">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count" id="cartCount">0</span>
    </button>
</div>

@push('scripts')
<script>
// Form validation and cart functionality
document.getElementById('orderForm').addEventListener('submit', function(e) {
    const checkboxes = document.querySelectorAll('input[name="products[]"]:checked');
    const submitButton = document.getElementById('orderButton');
    
    if (checkboxes.length === 0) {
        e.preventDefault();
        
        // Show animated alert
        const alert = document.createElement('div');
        alert.className = 'alert alert-warning alert-dismissible fade show position-fixed';
        alert.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        alert.innerHTML = `
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Oops!</strong> Pilih minimal satu produk untuk dipesan.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        document.body.appendChild(alert);
        
        // Auto remove after 4 seconds
        setTimeout(() => {
            if (alert.parentNode) {
                alert.remove();
            }
        }, 4000);
        
        return false;
    }
    
    // Add loading state
    submitButton.innerHTML = '<span class="loading-spinner me-2"></span> Memproses Pesanan...';
    submitButton.disabled = true;
});

// Update cart count and floating button
function updateCartCount() {
    const checkboxes = document.querySelectorAll('input[name="products[]"]:checked');
    const floatingCart = document.getElementById('floatingCart');
    const cartCount = document.getElementById('cartCount');
    
    let totalItems = 0;
    checkboxes.forEach(checkbox => {
        const productId = checkbox.value;
        const quantity = parseInt(document.getElementById(`quantity${productId}`).value) || 1;
        totalItems += quantity;
    });
    
    cartCount.textContent = totalItems;
    
    if (totalItems > 0) {
        floatingCart.classList.add('show');
    } else {
        floatingCart.classList.remove('show');
    }
}

// Scroll to order section
function scrollToOrder() {
    const orderSection = document.querySelector('.order-section');
    if (orderSection) {
        orderSection.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    }
}

// Initialize animations
document.addEventListener('DOMContentLoaded', function() {
    // Staggered animation for product cards
    const cards = document.querySelectorAll('.product-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
    
    // Initial cart count update
    updateCartCount();
});

// Add quantity change listeners
document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('change', updateCartCount);
});

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

// Add hover effects for product cards
document.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
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

// Add loading animation to checkboxes
document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        const card = this.closest('.product-card');
        if (this.checked) {
            card.classList.add('selected');
            card.style.boxShadow = '0 20px 40px rgba(212, 175, 55, 0.3)';
        } else {
            card.classList.remove('selected');
            card.style.boxShadow = '0 8px 25px rgba(44, 24, 16, 0.1)';
        }
    });
});
</script>
@endpush
@endsection