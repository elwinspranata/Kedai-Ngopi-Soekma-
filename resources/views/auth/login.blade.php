<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('title', 'Login Admin - Kedai Ngopi Soekma')

@section('content')
<style>
    /* Login Page Styles */
    .login-container {
        min-height: 100vh;
        background: linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 50%, var(--coffee-light) 100%);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        padding: 2rem 0;
    }

    .login-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover;
        opacity: 0.15;
        filter: brightness(0.8);
    }

    .login-container::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1.5" fill="rgba(255,255,255,0.08)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.06)"/><circle cx="60" cy="10" r="1.2" fill="rgba(255,255,255,0.05)"/></svg>') repeat;
        animation: sparkleFloat 8s ease-in-out infinite;
    }

    @keyframes sparkleFloat {
        0%, 100% {
            transform: translateX(0) translateY(0);
            opacity: 0.3;
        }
        50% {
            transform: translateX(-20px) translateY(-20px);
            opacity: 0.8;
        }
    }

    .login-card {
        background: rgba(254, 252, 248, 0.95);
        backdrop-filter: blur(20px);
        border: none;
        border-radius: 25px;
        box-shadow: 0 25px 80px rgba(44, 24, 16, 0.3);
        overflow: hidden;
        position: relative;
        z-index: 2;
        max-width: 450px;
        margin: 0 auto;
    }

    .login-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--coffee-dark) 0%, var(--gold-accent) 50%, var(--coffee-dark) 100%);
        animation: gradientShift 3s ease-in-out infinite;
    }

    @keyframes gradientShift {
        0%, 100% { opacity: 0.8; }
        50% { opacity: 1; }
    }

    /* Header Section */
    .login-header {
        text-align: center;
        padding: 3rem 2rem 2rem;
        background: linear-gradient(135deg, rgba(254, 252, 248, 0.9) 0%, rgba(245, 242, 237, 0.8) 100%);
        position: relative;
    }

    .brand-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        box-shadow: 0 15px 40px rgba(44, 24, 16, 0.3);
        animation: brandPulse 3s ease-in-out infinite;
        position: relative;
    }

    @keyframes brandPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .brand-icon::before {
        content: '';
        position: absolute;
        width: 120px;
        height: 120px;
        border: 3px solid rgba(44, 24, 16, 0.2);
        border-radius: 50%;
        animation: rippleEffect 3s ease-out infinite;
    }

    @keyframes rippleEffect {
        0% {
            transform: scale(0.8);
            opacity: 1;
        }
        100% {
            transform: scale(1.2);
            opacity: 0;
        }
    }

    .brand-icon i {
        color: var(--gold-accent);
        font-size: 3rem;
        position: relative;
        z-index: 2;
    }

    .login-title {
        font-family: 'Merriweather', serif;
        font-size: 2rem;
        color: var(--coffee-dark);
        margin-bottom: 0.8rem;
        font-weight: 700;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .login-subtitle {
        color: var(--text-light);
        font-size: 1rem;
        margin: 0;
        line-height: 1.5;
    }

    .admin-badge {
        display: inline-block;
        background: linear-gradient(135deg, var(--gold-accent) 0%, #B8941F 100%);
        color: var(--coffee-dark);
        padding: 0.3rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 1rem;
        box-shadow: 0 3px 10px rgba(212, 175, 55, 0.3);
    }

    /* Form Section */
    .login-form {
        padding: 2rem;
        background: var(--warm-white);
    }

    .form-group {
        margin-bottom: 2rem;
        position: relative;
    }

    .form-label {
        font-weight: 600;
        color: var(--coffee-dark);
        margin-bottom: 0.8rem;
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
        border: 2px solid var(--cream);
        border-radius: 15px;
        padding: 1rem 1.2rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--warm-white);
        box-shadow: 0 4px 15px rgba(44, 24, 16, 0.05);
        position: relative;
    }

    .form-control:focus {
        border-color: var(--coffee-light);
        box-shadow: 0 0 0 0.2rem rgba(139, 111, 71, 0.25);
        background: var(--warm-white);
        transform: translateY(-2px);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        animation: shakeInput 0.5s ease-in-out;
    }

    @keyframes shakeInput {
        0%, 20%, 40%, 60%, 80%, 100% {
            transform: translateX(0);
        }
        10%, 30%, 50%, 70%, 90% {
            transform: translateX(-5px);
        }
    }

    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: 0.5rem;
        font-size: 0.875rem;
        color: #dc3545;
        font-weight: 500;
        background: rgba(220, 53, 69, 0.1);
        padding: 0.5rem 1rem;
        border-radius: 8px;
        border-left: 3px solid #dc3545;
    }

    /* Password Field */
    .password-wrapper {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--text-light);
        cursor: pointer;
        padding: 0.5rem;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .password-toggle:hover {
        color: var(--coffee-dark);
        background: rgba(139, 111, 71, 0.1);
    }

    /* Login Button */
    .login-button {
        background: linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 100%);
        border: none;
        padding: 1rem 2rem;
        border-radius: 25px;
        color: var(--warm-white);
        font-size: 1.1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(44, 24, 16, 0.3);
        position: relative;
        overflow: hidden;
        width: 100%;
        min-height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .login-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .login-button:hover::before {
        left: 100%;
    }

    .login-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(44, 24, 16, 0.4);
        background: linear-gradient(135deg, var(--coffee-medium) 0%, var(--coffee-dark) 100%);
    }

    .login-button:active {
        transform: translateY(-1px);
    }

    .login-button i {
        font-size: 1.2rem;
    }

    /* Demo Credentials */
    .demo-credentials {
        text-align: center;
        margin-top: 2rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, var(--cream) 0%, rgba(245, 242, 237, 0.8) 100%);
        border-radius: 15px;
        border: 1px solid rgba(139, 111, 71, 0.2);
        position: relative;
    }

    .demo-credentials::before {
        content: '';
        position: absolute;
        top: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 4px;
        background: var(--gold-accent);
        border-radius: 2px;
    }

    .demo-title {
        color: var(--coffee-dark);
        font-weight: 600;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .demo-info {
        background: var(--warm-white);
        padding: 1rem;
        border-radius: 10px;
        border: 1px solid rgba(139, 111, 71, 0.1);
        font-family: 'Courier New', monospace;
        font-size: 0.9rem;
        color: var(--coffee-dark);
        line-height: 1.6;
    }

    .copy-credentials {
        background: none;
        border: 1px solid var(--coffee-light);
        color: var(--coffee-dark);
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        margin-top: 1rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .copy-credentials:hover {
        background: var(--coffee-light);
        color: white;
        transform: translateY(-2px);
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

    /* Coffee Steam Animation */
    .coffee-steam {
        position: absolute;
        top: 30px;
        right: 30px;
        color: rgba(255, 255, 255, 0.2);
        font-size: 2.5rem;
        animation: steamRise 4s ease-in-out infinite;
    }

    @keyframes steamRise {
        0%, 100% {
            transform: translateY(0px) scale(1);
            opacity: 0.2;
        }
        25% {
            transform: translateY(-10px) scale(1.1);
            opacity: 0.4;
        }
        50% {
            transform: translateY(-20px) scale(1.2);
            opacity: 0.6;
        }
        75% {
            transform: translateY(-15px) scale(1.1);
            opacity: 0.3;
        }
    }

    /* Security Badge */
    .security-badge {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 0.5rem 1rem;
        border-radius: 20px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .login-container {
            padding: 1rem;
        }
        
        .login-card {
            margin: 1rem;
            max-width: none;
        }
        
        .login-header {
            padding: 2rem 1.5rem 1.5rem;
        }
        
        .brand-icon {
            width: 80px;
            height: 80px;
        }
        
        .brand-icon i {
            font-size: 2.5rem;
        }
        
        .login-title {
            font-size: 1.6rem;
        }
        
        .login-form {
            padding: 1.5rem;
        }
        
        .coffee-steam {
            display: none;
        }
        
        .security-badge {
            position: relative;
            bottom: auto;
            left: auto;
            transform: none;
            margin-top: 1rem;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .form-control {
            padding: 0.8rem 1rem;
        }
        
        .login-button {
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
        }
        
        .demo-credentials {
            padding: 1rem;
        }
    }

    /* Print Styles */
    @media print {
        .login-container::before,
        .login-container::after,
        .coffee-steam,
        .security-badge {
            display: none !important;
        }
        
        .login-container {
            background: white;
        }
        
        .login-card {
            box-shadow: none;
            border: 1px solid #ddd;
        }
    }
</style>

<div class="login-container">
    <!-- Coffee Steam Animation -->
    <div class="coffee-steam">
        <i class="fas fa-coffee"></i>
    </div>
    
    <!-- Security Badge -->
    <div class="security-badge">
        <i class="fas fa-shield-alt"></i>
        <span>Koneksi Aman & Terlindungi</span>
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="card login-card">
                    <!-- Login Header -->
                    <div class="login-header">
                        <div class="brand-icon">
                            <i class="fas fa-coffee"></i>
                        </div>
                        <h1 class="login-title">Admin Portal</h1>
                        <p class="login-subtitle">
                            Selamat datang di sistem manajemen<br>
                            <strong>Kedai Ngopi Soekma</strong>
                        </p>
                        <div class="admin-badge">
                            <i class="fas fa-crown me-1"></i>
                            Admin Access
                        </div>
                    </div>

                    <!-- Login Form -->
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf
                            
                            <div class="form-group">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope"></i>
                                    Alamat Email
                                </label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="Masukkan email admin"
                                       required 
                                       autocomplete="email"
                                       autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock"></i>
                                    Kata Sandi
                                </label>
                                <div class="password-wrapper">
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Masukkan kata sandi"
                                           required 
                                           autocomplete="current-password">
                                    <button type="button" class="password-toggle" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="passwordIcon"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="login-button" id="loginBtn">
                                <i class="fas fa-sign-in-alt"></i>
                                <span id="loginText">Masuk ke Dashboard</span>
                            </button>
                        </form>
                        
                        <!-- Demo Credentials -->
                        <div class="demo-credentials">
                            <div class="demo-title">
                                <i class="fas fa-key text-warning"></i>
                                Demo Credentials
                            </div>
                            <div class="demo-info">
                                <strong>Email:</strong> admin@soekma.com<br>
                                <strong>Password:</strong> password
                            </div>
                            <button type="button" class="copy-credentials" onclick="fillDemoCredentials()">
                                <i class="fas fa-copy me-1"></i>
                                Gunakan Demo Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Toggle password visibility
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('passwordIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.classList.remove('fa-eye');
        passwordIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        passwordIcon.classList.remove('fa-eye-slash');
        passwordIcon.classList.add('fa-eye');
    }
}

// Fill demo credentials
function fillDemoCredentials() {
    document.getElementById('email').value = 'admin@soekma.com';
    document.getElementById('password').value = 'password';
    
    // Add visual feedback
    const button = event.target;
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-check me-1"></i> Berhasil Disalin!';
    button.style.background = '#28a745';
    button.style.color = 'white';
    button.style.borderColor = '#28a745';
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.style.background = 'none';
        button.style.color = 'var(--coffee-dark)';
        button.style.borderColor = 'var(--coffee-light)';
    }, 2000);
    
    // Focus on login button
    setTimeout(() => {
        document.getElementById('loginBtn').focus();
    }, 500);
}

// Form submission with loading state
document.getElementById('loginForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('loginBtn');
    const loginText = document.getElementById('loginText');
    const originalText = loginText.textContent;
    
    // Add loading state
    loginText.textContent = 'Memproses...';
    submitBtn.innerHTML = '<span class="loading-spinner me-2"></span> Memproses Login...';
    submitBtn.disabled = true;
    
    // Re-enable after 10 seconds (fallback)
    setTimeout(() => {
        loginText.textContent = originalText;
        submitBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> <span id="loginText">' + originalText + '</span>';
        submitBtn.disabled = false;
    }, 10000);
});

// Enhanced form validation
function validateForm() {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    let isValid = true;
    
    // Clear previous errors
    document.querySelectorAll('.is-invalid').forEach(input => {
        input.classList.remove('is-invalid');
    });
    
    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailInput.value.trim() || !emailRegex.test(emailInput.value)) {
        emailInput.classList.add('is-invalid');
        isValid = false;
    }
    
    // Validate password
    if (!passwordInput.value.trim() || passwordInput.value.length < 6) {
        passwordInput.classList.add('is-invalid');
        isValid = false;
    }
    
    return isValid;
}

// Real-time validation
document.getElementById('email').addEventListener('input', function() {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailRegex.test(this.value)) {
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    } else {
        this.classList.remove('is-valid');
        if (this.value.length > 0) {
            this.classList.add('is-invalid');
        }
    }
});

document.getElementById('password').addEventListener('input', function() {
    if (this.value.length >= 6) {
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    } else {
        this.classList.remove('is-valid');
        if (this.value.length > 0) {
            this.classList.add('is-invalid');
        }
    }
});

// Page load animations
document.addEventListener('DOMContentLoaded', function() {
    // Animate login card entrance
    const loginCard = document.querySelector('.login-card');
    loginCard.style.opacity = '0';
    loginCard.style.transform = 'translateY(50px) scale(0.9)';
    
    setTimeout(() => {
        loginCard.style.transition = 'all 0.8s ease';
        loginCard.style.opacity = '1';
        loginCard.style.transform = 'translateY(0) scale(1)';
    }, 300);
    
    // Animate form elements
    const formElements = document.querySelectorAll('.form-group, .login-button, .demo-credentials');
    formElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            element.style.transition = 'all 0.5s ease';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, 800 + (index * 150));
    });
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + Enter to submit form
    if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
        e.preventDefault();
        if (validateForm()) {
            document.getElementById('loginForm').submit();
        }
    }
    
    // Ctrl/Cmd + D to fill demo credentials
    if ((e.ctrlKey || e.metaKey) && e.key === 'd') {
        e.preventDefault();
        fillDemoCredentials();
    }
    
    // F1 to focus on email input
    if (e.key === 'F1') {
        e.preventDefault();
        document.getElementById('email').focus();
    }
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

// Add focus ring animation
document.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener('focus', function() {
        this.style.transform = 'translateY(-2px) scale(1.02)';
    });
    
    input.addEventListener('blur', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});

// Add hover effects for interactive elements
document.querySelectorAll('.copy-credentials, .password-toggle').forEach(element => {
    element.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px)';
    });
    
    element.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
    });
});

// Auto-hide any existing alerts
setTimeout(function() {
    const existingAlerts = document.querySelectorAll('.alert');
    existingAlerts.forEach(alert => {
        if (typeof bootstrap !== 'undefined') {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        } else {
            alert.remove();
        }
    });
}, 5000);

// Add coffee brewing animation for brand icon
function addBrewingAnimation() {
    const brandIcon = document.querySelector('.brand-icon i');
    if (brandIcon) {
        setInterval(() => {
            brandIcon.style.transform = 'scale(1.1) rotate(5deg)';
            setTimeout(() => {
                brandIcon.style.transform = 'scale(1) rotate(0deg)';
            }, 200);
        }, 3000);
    }
}

// Start brewing animation
setTimeout(addBrewingAnimation, 2000);

// Add particle effect on login button hover
document.querySelector('.login-button').addEventListener('mouseenter', function() {
    const particles = 5;
    for (let i = 0; i < particles; i++) {
        const particle = document.createElement('div');
        particle.style.cssText = `
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--gold-accent);
            border-radius: 50%;
            top: 50%;
            left: 20%;
            transform: translateY(-50%);
            animation: particleFloat 1s ease-out forwards;
            pointer-events: none;
            opacity: 0;
        `;
        
        const keyframes = `
            @keyframes particleFloat {
                0% {
                    opacity: 1;
                    transform: translateY(-50%) translateX(0);
                }
                100% {
                    opacity: 0;
                    transform: translateY(-70px) translateX(${Math.random() * 100 - 50}px);
                }
            }
        `;
        
        if (!document.getElementById('particle-keyframes')) {
            const style = document.createElement('style');
            style.id = 'particle-keyframes';
            style.textContent = keyframes;
            document.head.appendChild(style);
        }
        
        this.appendChild(particle);
        
        setTimeout(() => {
            if (particle.parentNode) {
                particle.remove();
            }
        }, 1000);
    }
});

// Add success animation for form submission
function showSuccessAnimation() {
    const successOverlay = document.createElement('div');
    successOverlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(40, 167, 69, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10000;
        opacity: 0;
        transition: opacity 0.3s ease;
    `;
    
    successOverlay.innerHTML = `
        <div style="text-align: center; color: white;">
            <i class="fas fa-check-circle" style="font-size: 4rem; margin-bottom: 1rem; animation: successBounce 0.6s ease-out;"></i>
            <h2 style="margin-bottom: 0.5rem;">Login Berhasil!</h2>
            <p>Mengalihkan ke dashboard...</p>
        </div>
    `;
    
    const bounceKeyframes = `
        @keyframes successBounce {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }
    `;
    
    if (!document.getElementById('success-keyframes')) {
        const style = document.createElement('style');
        style.id = 'success-keyframes';
        style.textContent = bounceKeyframes;
        document.head.appendChild(style);
    }
    
    document.body.appendChild(successOverlay);
    
    setTimeout(() => {
        successOverlay.style.opacity = '1';
    }, 100);
    
    return successOverlay;
}

// Add error shake animation
function addErrorShake() {
    const loginCard = document.querySelector('.login-card');
    loginCard.style.animation = 'errorShake 0.5s ease-in-out';
    
    const shakeKeyframes = `
        @keyframes errorShake {
            0%, 20%, 40%, 60%, 80%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-10px);
            }
        }
    `;
    
    if (!document.getElementById('error-keyframes')) {
        const style = document.createElement('style');
        style.id = 'error-keyframes';
        style.textContent = shakeKeyframes;
        document.head.appendChild(style);
    }
    
    setTimeout(() => {
        loginCard.style.animation = '';
    }, 500);
}

// Handle form errors
document.addEventListener('DOMContentLoaded', function() {
    const hasErrors = document.querySelector('.is-invalid');
    if (hasErrors) {
        addErrorShake();
        showAlert('error', 'Silakan periksa kembali data yang Anda masukkan.');
    }
});

// Add smooth transitions for all interactive elements
const style = document.createElement('style');
style.textContent = `
    .form-control.is-valid {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }
    
    .form-control.is-valid:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }
    
    .login-button:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none !important;
    }
    
    .coffee-decoration {
        position: fixed;
        bottom: 30px;
        left: 30px;
        color: rgba(255, 255, 255, 0.1);
        font-size: 2rem;
        animation: coffeeFloat 6s ease-in-out infinite;
        z-index: 1;
    }
    
    @keyframes coffeeFloat {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        50% {
            transform: translateY(-20px) rotate(10deg);
        }
    }
`;
document.head.appendChild(style);

// Add additional coffee decorations
const coffeeDecorations = ['☕', '🫘', '🥐'];
coffeeDecorations.forEach((emoji, index) => {
    const decoration = document.createElement('div');
    decoration.className = 'coffee-decoration';
    decoration.textContent = emoji;
    decoration.style.cssText = `
        position: fixed;
        color: rgba(255, 255, 255, 0.1);
        font-size: 1.5rem;
        animation: coffeeFloat ${6 + index}s ease-in-out infinite;
        animation-delay: ${index * 2}s;
        z-index: 1;
    `;
    
    // Position them at different corners
    if (index === 0) {
        decoration.style.bottom = '30px';
        decoration.style.left = '30px';
    } else if (index === 1) {
        decoration.style.top = '30px';
        decoration.style.left = '30px';
    } else {
        decoration.style.bottom = '30px';
        decoration.style.right = '100px';
    }
    
    document.body.appendChild(decoration);
});

// Add typing animation for placeholder text
function addTypingAnimation() {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    
    const originalEmailPlaceholder = emailInput.placeholder;
    const originalPasswordPlaceholder = passwordInput.placeholder;
    
    function typeText(element, text, callback) {
        element.placeholder = '';
        let i = 0;
        
        const typeInterval = setInterval(() => {
            element.placeholder += text[i];
            i++;
            
            if (i >= text.length) {
                clearInterval(typeInterval);
                if (callback) callback();
            }
        }, 100);
    }
    
    // Start typing animation when inputs are focused for the first time
    let emailTyped = false;
    let passwordTyped = false;
    
    emailInput.addEventListener('focus', function() {
        if (!emailTyped) {
            typeText(this, originalEmailPlaceholder);
            emailTyped = true;
        }
    });
    
    passwordInput.addEventListener('focus', function() {
        if (!passwordTyped) {
            typeText(this, originalPasswordPlaceholder);
            passwordTyped = true;
        }
    });
}

// Initialize typing animation
setTimeout(addTypingAnimation, 2000);

// Add connection status indicator
function addConnectionStatus() {
    const statusIndicator = document.createElement('div');
    statusIndicator.style.cssText = `
        position: fixed;
        top: 20px;
        left: 20px;
        background: rgba(40, 167, 69, 0.9);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        z-index: 1000;
        transition: all 0.3s ease;
        opacity: 0;
    `;
    
    statusIndicator.innerHTML = `
        <i class="fas fa-wifi"></i>
        <span>Koneksi Stabil</span>
    `;
    
    document.body.appendChild(statusIndicator);
    
    // Show status after page load
    setTimeout(() => {
        statusIndicator.style.opacity = '1';
    }, 1000);
    
    // Hide after 3 seconds
    setTimeout(() => {
        statusIndicator.style.opacity = '0';
        setTimeout(() => {
            if (statusIndicator.parentNode) {
                statusIndicator.remove();
            }
        }, 300);
    }, 4000);
}

// Add connection status
addConnectionStatus();

// Add final touches and cleanup
document.addEventListener('beforeunload', function() {
    // Clear any timers and animations
    const decorations = document.querySelectorAll('.coffee-decoration');
    decorations.forEach(decoration => {
        if (decoration.parentNode) {
            decoration.remove();
        }
    });
});

console.log('🎨 Login page initialized with modern coffee shop theme');
console.log('⌨️  Keyboard shortcuts: Ctrl+Enter (submit), Ctrl+D (demo), F1 (focus email)');
</script>
@endpush
@endsection