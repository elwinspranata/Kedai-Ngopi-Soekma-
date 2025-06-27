<!-- resources/views/order/success.blade.php -->
@extends('layouts.app')

@section('title', 'Pesanan Berhasil - Kedai Ngopi Soekma')

@section('content')
<style>
    /* Success Page Styles */
    .success-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        padding: 2rem 0;
        background: linear-gradient(135deg, var(--warm-white) 0%, var(--cream) 100%);
        position: relative;
        overflow: hidden;
    }

    .success-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none"><circle cx="20" cy="20" r="1" fill="rgba(139,111,71,0.1)"/><circle cx="80" cy="40" r="1.5" fill="rgba(139,111,71,0.08)"/><circle cx="40" cy="80" r="1" fill="rgba(139,111,71,0.06)"/><circle cx="60" cy="20" r="0.8" fill="rgba(139,111,71,0.05)"/></svg>') repeat;
        animation: float 8s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .success-card {
        background: var(--warm-white);
        border: none;
        border-radius: 25px;
        box-shadow: 0 20px 60px rgba(44, 24, 16, 0.15);
        overflow: hidden;
        position: relative;
        z-index: 2;
        backdrop-filter: blur(10px);
    }

    .success-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--coffee-dark) 0%, var(--gold-accent) 50%, var(--coffee-dark) 100%);
    }

    .success-header {
        text-align: center;
        padding: 3rem 2rem 2rem;
        background: linear-gradient(135deg, var(--warm-white) 0%, rgba(245, 242, 237, 0.8) 100%);
        position: relative;
    }

    .success-icon {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        box-shadow: 0 15px 35px rgba(40, 167, 69, 0.3);
        animation: successPulse 2s ease-in-out infinite;
        position: relative;
    }

    .success-icon::before {
        content: '';
        position: absolute;
        width: 140px;
        height: 140px;
        border: 3px solid rgba(40, 167, 69, 0.2);
        border-radius: 50%;
        animation: ripple 2s ease-out infinite;
    }

    .success-icon i {
        color: white;
        font-size: 3.5rem;
        animation: checkBounce 0.8s ease-out;
    }

    @keyframes successPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    @keyframes ripple {
        0% {
            transform: scale(0.8);
            opacity: 1;
        }
        100% {
            transform: scale(1.2);
            opacity: 0;
        }
    }

    @keyframes checkBounce {
        0% {
            transform: scale(0);
            opacity: 0;
        }
        50% {
            transform: scale(1.3);
            opacity: 0.8;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .success-title {
        font-family: 'Merriweather', serif;
        font-size: 2.5rem;
        color: var(--coffee-dark);
        margin-bottom: 1rem;
        font-weight: 700;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .success-subtitle {
        font-size: 1.2rem;
        color: var(--text-light);
        margin-bottom: 0;
        line-height: 1.6;
    }

    /* Thank You Section */
    .thank-you-section {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 2rem;
        margin: -1px;
        position: relative;
        overflow: hidden;
    }

    .thank-you-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1447933601403-0c6688de566e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover;
        opacity: 0.1;
        filter: brightness(1.2);
    }

    .thank-you-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .thank-you-title {
        font-family: 'Merriweather', serif;
        font-size: 1.8rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .order-number {
        font-size: 1.4rem;
        font-weight: 700;
        background: rgba(255, 255, 255, 0.2);
        padding: 0.5rem 1.5rem;
        border-radius: 25px;
        display: inline-block;
        margin-top: 1rem;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Order Details Section */
    .order-details {
        padding: 2rem;
    }

    .details-card {
        background: var(--cream);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(139, 111, 71, 0.1);
        box-shadow: 0 4px 15px rgba(44, 24, 16, 0.08);
    }

    .details-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--warm-white);
    }

    .details-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--coffee-medium) 0%, var(--coffee-light) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        box-shadow: 0 4px 12px rgba(93, 63, 38, 0.3);
    }

    .details-icon i {
        color: white;
        font-size: 1.3rem;
    }

    .details-title {
        font-family: 'Merriweather', serif;
        font-size: 1.4rem;
        color: var(--coffee-dark);
        margin: 0;
        font-weight: 600;
    }

    .detail-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid rgba(139, 111, 71, 0.1);
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-weight: 600;
        color: var(--text-dark);
        font-size: 0.95rem;
    }

    .detail-value {
        color: var(--coffee-dark);
        font-weight: 500;
        text-align: right;
    }

    .status-badge {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
    }

    .total-price {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--coffee-dark);
    }

    /* Information Section */
    .info-section {
        background: linear-gradient(135deg, #17a2b8 0%, #20c997 100%);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .info-section::before {
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

    .info-content {
        position: relative;
        z-index: 2;
    }

    .info-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .info-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        backdrop-filter: blur(10px);
    }

    .info-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin: 0;
    }

    .info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .info-list li {
        padding: 0.5rem 0;
        display: flex;
        align-items: center;
        font-size: 1rem;
        line-height: 1.5;
    }

    .info-list li::before {
        content: '✓';
        background: rgba(255, 255, 255, 0.2);
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: bold;
        margin-right: 0.75rem;
        flex-shrink: 0;
    }

    /* Action Buttons */
    .action-section {
        text-align: center;
        padding: 2rem;
        background: linear-gradient(135deg, var(--warm-white) 0%, var(--cream) 100%);
    }

    .home-button {
        background: linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 100%);
        border: none;
        padding: 1rem 3rem;
        border-radius: 50px;
        color: var(--warm-white);
        font-size: 1.1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(44, 24, 16, 0.3);
        position: relative;
        overflow: hidden;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .home-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .home-button:hover::before {
        left: 100%;
    }

    .home-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(44, 24, 16, 0.4);
        color: var(--warm-white);
        text-decoration: none;
    }

    .home-button i {
        font-size: 1.2rem;
    }

    /* Coffee Animation */
    .coffee-steam {
        position: absolute;
        top: 20px;
        right: 30px;
        color: rgba(139, 111, 71, 0.1);
        font-size: 2rem;
        animation: steam 3s ease-in-out infinite;
    }

    @keyframes steam {
        0%, 100% {
            transform: translateY(0) scale(1);
            opacity: 0.1;
        }
        50% {
            transform: translateY(-10px) scale(1.1);
            opacity: 0.3;
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .success-title {
            font-size: 2rem;
        }
        
        .success-subtitle {
            font-size: 1rem;
        }
        
        .success-icon {
            width: 100px;
            height: 100px;
        }
        
        .success-icon i {
            font-size: 3rem;
        }
        
        .thank-you-title {
            font-size: 1.5rem;
        }
        
        .order-number {
            font-size: 1.2rem;
        }
        
        .details-header {
            flex-direction: column;
            text-align: center;
        }
        
        .details-icon {
            margin-right: 0;
            margin-bottom: 1rem;
        }
        
        .detail-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .detail-value {
            text-align: left;
        }
        
        .home-button {
            padding: 0.8rem 2rem;
            font-size: 1rem;
        }
        
        .coffee-steam {
            display: none;
        }
    }

    /* Print Styles */
    @media print {
        .success-container::before,
        .coffee-steam,
        .home-button {
            display: none !important;
        }
        
        .success-card {
            box-shadow: none;
            border: 1px solid #ddd;
        }
    }
</style>

<div class="success-container">
    <!-- Coffee Steam Animation -->
    <div class="coffee-steam">
        <i class="fas fa-coffee"></i>
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class="card success-card">
                    <!-- Success Header -->
                    <div class="success-header">
                        <div class="success-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <h1 class="success-title">Pesanan Berhasil!</h1>
                        <p class="success-subtitle">
                            Terima kasih telah mempercayai Kedai Ngopi Soekma. 
                            Pesanan Anda sedang diproses dengan penuh perhatian.
                        </p>
                    </div>

                    <!-- Thank You Section -->
                    <div class="thank-you-section">
                        <div class="thank-you-content">
                            <h2 class="thank-you-title">Terima kasih, {{ $order->nama_pelanggan }}!</h2>
                            <p>Pesanan Anda telah berhasil dikonfirmasi dan sedang diproses oleh tim kami.</p>
                            <div class="order-number">
                                <i class="fas fa-receipt me-2"></i>
                                Nomor Pesanan: #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div class="order-details">
                        <div class="details-card">
                            <div class="details-header">
                                <div class="details-icon">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                                <h3 class="details-title">Detail Pesanan</h3>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <span class="detail-label">
                                            <i class="fas fa-hashtag me-2"></i>No. Pesanan
                                        </span>
                                        <span class="detail-value">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">
                                            <i class="fas fa-user me-2"></i>Nama Pelanggan
                                        </span>
                                        <span class="detail-value">{{ $order->nama_pelanggan }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">
                                            <i class="fas fa-phone me-2"></i>No. Telepon
                                        </span>
                                        <span class="detail-value">{{ $order->no_telepon }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <span class="detail-label">
                                            <i class="fas fa-calendar me-2"></i>Tanggal & Waktu
                                        </span>
                                        <span class="detail-value">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">
                                            <i class="fas fa-money-bill-wave me-2"></i>Total Pembayaran
                                        </span>
                                        <span class="detail-value total-price">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">
                                            <i class="fas fa-info-circle me-2"></i>Status Pesanan
                                        </span>
                                        <span class="detail-value">
                                            <span class="status-badge">
                                                <i class="fas fa-check-circle me-1"></i>Dikonfirmasi
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Information Section -->
                        <div class="info-section">
                            <div class="info-content">
                                <div class="info-header">
                                    <div class="info-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <h4 class="info-title">Informasi Penting</h4>
                                </div>
                                <ul class="info-list">
                                    <li>Pesanan Anda sedang diproses oleh barista terbaik kami</li>
                                    <li>Estimasi waktu penyiapan: 10-15 menit</li>
                                    <li>Anda akan dipanggil ketika pesanan sudah siap untuk diambil</li>
                                    <li>Mohon tunjukkan nomor pesanan saat pengambilan</li>
                                    <li>Pesanan dapat diambil di counter utama kedai kami</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Action Section -->
                    <div class="action-section">
                        <a href="{{ route('home') }}" class="home-button">
                            <i class="fas fa-home"></i>
                            Kembali ke Beranda
                        </a>
                        <p class="mt-3 text-muted">
                            <i class="fas fa-heart text-danger me-1"></i>
                            Terima kasih telah memilih Kedai Ngopi Soekma
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Page load animations
document.addEventListener('DOMContentLoaded', function() {
    // Add entrance animation to main card
    const successCard = document.querySelector('.success-card');
    successCard.style.opacity = '0';
    successCard.style.transform = 'translateY(30px)';
    
    setTimeout(() => {
        successCard.style.transition = 'all 0.8s ease';
        successCard.style.opacity = '1';
        successCard.style.transform = 'translateY(0)';
    }, 200);
    
    // Animate detail items
    const detailItems = document.querySelectorAll('.detail-item');
    detailItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-20px)';
        
        setTimeout(() => {
            item.style.transition = 'all 0.5s ease';
            item.style.opacity = '1';
            item.style.transform = 'translateX(0)';
        }, 800 + (index * 100));
    });
    
    // Animate info list items
    const infoItems = document.querySelectorAll('.info-list li');
    infoItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-15px)';
        
        setTimeout(() => {
            item.style.transition = 'all 0.4s ease';
            item.style.opacity = '1';
            item.style.transform = 'translateX(0)';
        }, 1200 + (index * 150));
    });
});

// Confetti effect (optional)
function createConfetti() {
    const colors = ['#8B6F47', '#D4AF37', '#28a745', '#20c997'];
    const confettiCount = 50;
    
    for (let i = 0; i < confettiCount; i++) {
        const confetti = document.createElement('div');
        confetti.style.cssText = `
            position: fixed;
            width: 8px;
            height: 8px;
            background: ${colors[Math.floor(Math.random() * colors.length)]};
            top: -10px;
            left: ${Math.random() * 100}%;
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            animation: confettiFall 3s linear forwards;
        `;
        
        document.body.appendChild(confetti);
        
        setTimeout(() => {
            confetti.remove();
        }, 3000);
    }
}

// CSS for confetti animation
const style = document.createElement('style');
style.textContent = `
    @keyframes confettiFall {
        to {
            transform: translateY(100vh) rotate(360deg);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Trigger confetti on page load
setTimeout(createConfetti, 500);

// Print functionality
function printReceipt() {
    window.print();
}

// Add print button if needed
const actionSection = document.querySelector('.action-section');
if (actionSection) {
    const printBtn = document.createElement('button');
    printBtn.className = 'btn btn-outline-secondary ms-3';
    printBtn.innerHTML = '<i class="fas fa-print me-2"></i>Cetak Struk';
    printBtn.onclick = printReceipt;
    actionSection.querySelector('.home-button').parentNode.appendChild(printBtn);
}

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

// Auto refresh page after 5 minutes
setTimeout(() => {
    const refreshNotice = document.createElement('div');
    refreshNotice.className = 'alert alert-info position-fixed';
    refreshNotice.style.cssText = 'top: 20px; right: 20px; z-index: 9999;';
    refreshNotice.innerHTML = `
        <i class="fas fa-info-circle me-2"></i>
        <strong>Info:</strong> Halaman akan dimuat ulang dalam 1 menit.
        <button type="button" class="btn-close ms-2" onclick="this.parentElement.remove()"></button>
    `;
    document.body.appendChild(refreshNotice);
    
    setTimeout(() => {
        location.reload();
    }, 60000);
}, 300000); // 5 minutes
</script>
@endpush
@endsection