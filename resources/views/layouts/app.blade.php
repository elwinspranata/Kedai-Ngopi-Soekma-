<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kedai Ngopi Soekma')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --coffee-dark: #2C1810;
            --coffee-medium: #5D3F26;
            --coffee-light: #8B6F47;
            --cream: #F5F2ED;
            --warm-white: #FEFCF8;
            --gold-accent: #D4AF37;
            --text-dark: #2C2C2C;
            --text-light: #6B6B6B;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: var(--warm-white);
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Styles */
        .navbar {
            background: linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 100%);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(44, 24, 16, 0.1);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-family: 'Merriweather', serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--warm-white) !important;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--gold-accent) !important;
            transform: translateY(-2px);
        }

        .navbar-brand i {
            font-size: 1.8rem;
            color: var(--gold-accent);
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        }

        .navbar-nav .nav-link {
            color: var(--cream) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 25px;
            transition: all 0.3s ease;
            margin: 0 0.25rem;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--gold-accent) !important;
            transform: translateY(-2px);
        }

        .btn-logout {
            background: linear-gradient(135deg, var(--gold-accent) 0%, #B8941F 100%);
            border: none;
            color: var(--coffee-dark) !important;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(212, 175, 55, 0.3);
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);
            background: linear-gradient(135deg, #B8941F 0%, var(--gold-accent) 100%);
        }

        /* Main Content */
        main {
            flex: 1;
            background: linear-gradient(135deg, var(--warm-white) 0%, var(--cream) 100%);
            position: relative;
            overflow: hidden;
        }

        main::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%23F5F2ED" opacity="0.1"><path d="M0,50 C200,80 300,20 500,50 C700,80 800,20 1000,50 L1000,0 L0,0 Z"/></svg>') repeat-x;
            background-size: 1000px 100px;
            z-index: 0;
        }

        .content-wrapper {
            position: relative;
            z-index: 1;
            padding: 2rem 0;
            min-height: calc(100vh - 200px);
        }

        /* Coffee Bean Decorations */
        .coffee-decoration {
            position: fixed;
            color: var(--coffee-light);
            opacity: 0.05;
            font-size: 2rem;
            animation: float 6s ease-in-out infinite;
            pointer-events: none;
            z-index: 0;
        }

        .coffee-decoration:nth-child(1) {
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .coffee-decoration:nth-child(2) {
            top: 20%;
            right: 10%;
            animation-delay: 2s;
        }

        .coffee-decoration:nth-child(3) {
            bottom: 30%;
            left: 10%;
            animation-delay: 4s;
        }

        .coffee-decoration:nth-child(4) {
            bottom: 20%;
            right: 5%;
            animation-delay: 1s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(44, 24, 16, 0.1);
            background-color: var(--warm-white);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(44, 24, 16, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--coffee-medium) 0%, var(--coffee-light) 100%);
            color: var(--warm-white);
            border: none;
            padding: 1.5rem;
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, var(--coffee-medium) 0%, var(--coffee-light) 100%);
            border: none;
            border-radius: 25px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(93, 63, 38, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(93, 63, 38, 0.4);
            background: linear-gradient(135deg, var(--coffee-light) 0%, var(--coffee-medium) 100%);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--text-light) 0%, var(--text-dark) 100%);
            border: none;
            border-radius: 25px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, var(--text-dark) 0%, var(--text-light) 100%);
        }

        /* Alert Styles */
        .alert {
            border: none;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
        }

        .alert-warning {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            color: #856404;
        }

        /* Form Styles */
        .form-control {
            border: 2px solid var(--cream);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            background-color: var(--warm-white);
        }

        .form-control:focus {
            border-color: var(--coffee-light);
            box-shadow: 0 0 0 0.2rem rgba(139, 111, 71, 0.25);
            background-color: var(--warm-white);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        /* Table Styles */
        .table {
            background-color: var(--warm-white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(44, 24, 16, 0.1);
        }

        .table thead th {
            background: linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 100%);
            color: var(--warm-white);
            border: none;
            font-weight: 600;
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            border-color: var(--cream);
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: var(--cream);
            transition: background-color 0.3s ease;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem;
            }
            
            .navbar-brand i {
                font-size: 1.4rem;
            }
            
            .content-wrapper {
                padding: 1rem 0;
            }
            
            .card {
                margin-bottom: 1rem;
            }
            
            .coffee-decoration {
                display: none;
            }
        }

        /* Loading Animation */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid var(--cream);
            border-radius: 50%;
            border-top-color: var(--coffee-dark);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--cream);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--coffee-light);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--coffee-medium);
        }

        /* Coffee Cup Animation for Brand */
        @keyframes steam {
            0% {
                transform: translateY(0) scaleX(1);
                opacity: 0.8;
            }
            50% {
                transform: translateY(-10px) scaleX(1.2);
                opacity: 0.4;
            }
            100% {
                transform: translateY(-20px) scaleX(0.8);
                opacity: 0;
            }
        }

        .navbar-brand::after {
            content: '☕';
            position: absolute;
            top: -5px;
            right: -10px;
            font-size: 0.8rem;
            animation: steam 2s ease-in-out infinite;
            opacity: 0.6;
        }
    </style>
</head>
<body>
    <!-- Coffee Bean Decorations -->
    <div class="coffee-decoration">
        <i class="fas fa-coffee"></i>
    </div>
    <div class="coffee-decoration">
        <i class="fas fa-seedling"></i>
    </div>
    <div class="coffee-decoration">
        <i class="fas fa-coffee"></i>
    </div>
    <div class="coffee-decoration">
        <i class="fas fa-leaf"></i>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-coffee"></i> Kedai Ngopi Soekma
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-1"></i> Dashboard Admin
                            </a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-logout btn-sm ms-2">
                                <i class="fas fa-sign-out-alt me-1"></i> Logout
                            </button>
                        </form>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-user me-1"></i> Login Admin
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="content-wrapper">
            @if(session('success'))
                <div class="container">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="container">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="container">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
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

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Add loading state to buttons
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<span class="loading-spinner me-2"></span> Memproses...';
                    submitBtn.disabled = true;
                    
                    // Re-enable after 5 seconds (fallback)
                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }, 5000);
                }
            });
        });

        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'linear-gradient(135deg, rgba(44, 24, 16, 0.95) 0%, rgba(93, 63, 38, 0.95) 100%)';
                navbar.style.backdropFilter = 'blur(15px)';
            } else {
                navbar.style.background = 'linear-gradient(135deg, var(--coffee-dark) 0%, var(--coffee-medium) 100%)';
                navbar.style.backdropFilter = 'blur(10px)';
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>