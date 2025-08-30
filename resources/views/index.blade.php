<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terumpah Kulit - Produk Kulit Berkualitas Premium</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --brown-dark: #4E342E;
            --brown-light: #A1887F;
            --cream: #FBF8F6;
            --gold: #D4AF37;
            --gradient: linear-gradient(135deg, #4E342E 0%, #6D4C41 100%);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--cream);
            color: var(--brown-dark);
        }

        /* Navbar */
        .navbar {
            background: var(--brown-dark) !important;
            padding: 1rem 0;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: #fff !important;
        }

        .navbar-nav .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--gold) !important;
            transform: translateY(-2px);
        }

        /* Dropdown Styling */
        .dropdown-menu {
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            margin-top: 10px;
        }

        .dropdown-item {
            padding: 10px 20px;
            border-radius: 5px;
            margin: 5px;
        }

        .dropdown-item:hover {
            background-color: var(--gold) !important;
            color: white !important;
            transform: translateX(5px);
        }

        /* Hero Section */
        .hero {
            background: var(--gradient);
            min-height: 80vh;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="80" cy="40" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .btn-hero {
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            margin: 0 10px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-primary-hero {
            background: var(--gold);
            color: white;
            border: none;
        }

        .btn-primary-hero:hover {
            background: #b8941f;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
        }

        .btn-secondary-hero {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary-hero:hover {
            background: white;
            color: var(--brown-dark);
            transform: translateY(-3px);
        }

        /* Stats Section */
        .stats-card {
            background: var(--gradient);
            color: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(78, 52, 46, 0.3);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            display: block;
        }

        /* Product Cards */
        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .product-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #6c757d;
        }

        .btn-product {
            background: var(--gold);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            width: 100%;
        }

        .btn-product:hover {
            background: #b8941f;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-title {
            font-weight: 700;
            color: var(--brown-dark);
            margin-bottom: 0.5rem;
        }

        .product-price {
            font-weight: 700;
            color: var(--brown-dark);
            font-size: 1.1rem;
        }

        .product-stock {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            padding: 4px 8px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Features */
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
        }

        /* Sections */
        .section-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--brown-dark);
            margin-bottom: 1rem;
        }

        /* Footer */
        .footer {
            background: var(--brown-dark);
            color: white;
            padding: 3rem 0 1rem;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: var(--gold);
            color: white;
            transform: translateY(-3px);
        }

        /* WhatsApp Button */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #25d366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.3);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .whatsapp-float:hover {
            transform: scale(1.1) translateY(-3px);
            color: white;
            box-shadow: 0 12px 35px rgba(37, 211, 102, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .btn-hero {
                display: block;
                margin: 10px 0;
            }
            
            .stats-card {
                margin-bottom: 20px;
            }
            
            .whatsapp-float {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-shoe-prints me-2"></i>
                Terumpah Kulit
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#keunggulan">Keunggulan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-1"></i>
                            @auth
                                {{ Auth::user()->name }}
                            @else
                                Account
                            @endauth
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown" style="background-color: var(--brown-dark); border: none;">
                            @auth
                                @if(Auth::user()->role === 'user')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.orders') }}" style="color: white; transition: all 0.3s ease;">
                                            <i class="fas fa-shopping-bag me-2"></i>My Orders
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider" style="border-color: rgba(255,255,255,0.2);"></li>
                                    <li>
                                        <form method="POST" action="{{ route('user.logout') }}" id="user-logout-form">
                                            @csrf
                                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('user-logout-form').submit();" style="color: white; transition: all 0.3s ease;">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </a>
                                        </form>
                                    </li>
                                @elseif(Auth::user()->role === 'admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.dataProduct') }}" style="color: white; transition: all 0.3s ease;">
                                            <i class="fas fa-tachometer-alt me-2"></i>Admin Panel
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider" style="border-color: rgba(255,255,255,0.2);"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" id="admin-logout-form">
                                            @csrf
                                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();" style="color: white; transition: all 0.3s ease;">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </a>
                                        </form>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a class="dropdown-item" href="{{url('/login')}}" style="color: white; transition: all 0.3s ease;">
                                        <i class="fas fa-sign-in-alt me-2"></i>Login
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{url('/register')}}" style="color: white; transition: all 0.3s ease;">
                                        <i class="fas fa-user-plus me-2"></i>Sign Up
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content text-center">
                        <h1 class="hero-title">
                            <i class="fas fa-shoe-prints me-3"></i>
                            Produk Kulit <span style="color: var(--gold);">Berkualitas Premium</span>
                        </h1>
                        <p class="hero-subtitle">
                            Koleksi terumpah, sandal, dan produk kulit terbaik dengan kerajinan tradisional
                        </p>
                        <div class="mt-4">
                            <a href="#produk" class="btn-hero btn-primary-hero">
                                <i class="fas fa-shopping-bag me-2"></i>
                                Belanja Sekarang
                            </a>
                            <a href="#tentang" class="btn-hero btn-secondary-hero">
                                <i class="fas fa-info-circle me-2"></i>
                                Lihat Koleksi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5" style="background: rgba(255,255,255,0.9);">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6 mb-3">
                    <div class="stats-card">
                        <span class="stats-number">{{ $products->count() }}</span>
                        <p class="mb-0">Produk Tersedia</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="stats-card">
                        <span class="stats-number">20+</span>
                        <p class="mb-0">Tahun Pengalaman</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="stats-card">
                        <span class="stats-number">1000+</span>
                        <p class="mb-0">Produk Terjual</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="stats-card">
                        <span class="stats-number">100%</span>
                        <p class="mb-0">Kulit Asli</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Keunggulan Section -->
    <section id="keunggulan" class="py-5" style="background-color: var(--cream);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Keunggulan Kami</h2>
                <p class="text-muted">Mengapa memilih produk kulit kami</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-hand-paper"></i>
                        </div>
                        <h5 class="fw-bold">Handmade Premium</h5>
                        <p class="text-muted">Dibuat dengan tangan oleh pengrajin berpengalaman menggunakan teknik tradisional</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h5 class="fw-bold">Kulit Berkualitas</h5>
                        <p class="text-muted">Menggunakan kulit asli pilihan dengan kualitas terbaik yang tahan lama</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h5 class="fw-bold">Pengiriman Cepat</h5>
                        <p class="text-muted">Pengiriman ke seluruh Indonesia dengan kemasan aman dan rapi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="produk" class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Koleksi Produk Kulit</h2>
                <p class="text-muted">Pilihan produk kulit berkualitas untuk kebutuhan Anda</p>
            </div>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Products Grid -->
            <div class="row">
                @forelse($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="product-card">
                            <div class="product-image">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                                @else
                                    <div class="product-placeholder">
                                        <i class="fas fa-shoe-prints" style="font-size: 3rem;"></i>
                                        <p class="mt-2">No Image</p>
                                    </div>
                                @endif
                            </div>
                            <div class="product-info">
                                <h6 class="product-title">{{ $product->name }}</h6>
                                <p class="text-muted mb-3">{{ Str::limit($product->description, 80) }}</p>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    <span class="product-stock">
                                        <i class="fas fa-box me-1"></i>{{ $product->stock }}
                                    </span>
                                </div>
                                @auth
                                    <button class="btn-product" onclick="openOrderModal({{ $product->id }})">
                                        <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
                                    </button>
                                @else
                                    <button class="btn-product" onclick="showLoginAlert()">
                                        <i class="fas fa-lock me-2"></i>Login untuk Pesan
                                    </button>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-shoe-prints" style="font-size: 4rem; color: #dee2e6;"></i>
                            <h5 class="mt-3">Tidak ada produk tersedia</h5>
                            <p class="text-muted">Produk kulit sedang dalam proses produksi.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-5" style="background-color: var(--cream);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Tentang Terumpah Kulit</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <p class="lead text-muted mb-4">
                        Kami adalah pengrajin kulit tradisional yang telah berpengalaman puluhan tahun dalam membuat 
                        produk kulit berkualitas tinggi. Setiap produk dibuat dengan penuh perhatian terhadap detail 
                        dan menggunakan bahan kulit asli pilihan.
                    </p>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check text-success me-3 fs-5"></i>
                                <span>Pengalaman 20+ tahun</span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check text-success me-3 fs-5"></i>
                                <span>1000+ produk berkualitas</span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check text-success me-3 fs-5"></i>
                                <span>Pengrajin terampil</span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check text-success me-3 fs-5"></i>
                                <span>Kulit asli premium</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card h-100" style="background: var(--gradient); color: white;">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-4">Statistik Kami</h5>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="fs-1 fw-bold">1000+</div>
                                    <small>Produk Terjual</small>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="fs-1 fw-bold">500+</div>
                                    <small>Pelanggan Puas</small>
                                </div>
                                <div class="col-6">
                                    <div class="fs-1 fw-bold">20+</div>
                                    <small>Tahun Pengalaman</small>
                                </div>
                                <div class="col-6">
                                    <div class="fs-1 fw-bold">100%</div>
                                    <small>Kulit Asli</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-5" style="background: white;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Hubungi Kami</h2>
                <p class="text-muted">Siap membantu Anda menemukan produk kulit terbaik</p>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h5 class="fw-bold mb-3">Informasi Kontak</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt me-3" style="color: var(--gold); font-size: 1.2rem;"></i>
                                <span>Jl. Kerajinan Kulit No. 123, Yogyakarta</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-phone me-3" style="color: var(--gold); font-size: 1.2rem;"></i>
                                <span>+62 274 555 123</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-envelope me-3" style="color: var(--gold); font-size: 1.2rem;"></i>
                                <span>info@terumpahkulit.com</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-clock me-3" style="color: var(--gold); font-size: 1.2rem;"></i>
                                <span>Senin - Sabtu: 08:00 - 17:00 WIB</span>
                            </div>
                        </div>
                    </div>
                    
                    <h6 class="fw-bold mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a href="#" class="social-icon me-2" style="background: #3b5998;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon me-2" style="background: #e4405f;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon me-2" style="background: #25d366;">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="social-icon" style="background: #ff0000;">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kirim Pesan</h5>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pesan</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" style="background: var(--gold); border-color: var(--gold);">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-shoe-prints me-2"></i>
                        Terumpah Kulit
                    </h5>
                    <p class="mb-3">Produk kulit berkualitas dengan sentuhan tradisional. Menghadirkan kerajinan terbaik untuk kebutuhan fashion dan gaya hidup Anda.</p>
                    <div class="d-flex">
                        <a href="#" class="social-icon me-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon me-2">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon me-2">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Menu</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#beranda" style="color: #A1887F; text-decoration: none;">Beranda</a></li>
                        <li class="mb-2"><a href="#keunggulan" style="color: #A1887F; text-decoration: none;">Keunggulan</a></li>
                        <li class="mb-2"><a href="#produk" style="color: #A1887F; text-decoration: none;">Produk</a></li>
                        <li class="mb-2"><a href="#tentang" style="color: #A1887F; text-decoration: none;">Tentang</a></li>
                        <li class="mb-2"><a href="#kontak" style="color: #A1887F; text-decoration: none;">Kontak</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Produk</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#produk" style="color: #A1887F; text-decoration: none;">Terumpah Kulit</a></li>
                        <li class="mb-2"><a href="#produk" style="color: #A1887F; text-decoration: none;">Sandal Kulit</a></li>
                        <li class="mb-2"><a href="#produk" style="color: #A1887F; text-decoration: none;">Tas Kulit</a></li>
                        <li class="mb-2"><a href="#produk" style="color: #A1887F; text-decoration: none;">Dompet Kulit</a></li>
                        <li class="mb-2"><a href="#produk" style="color: #A1887F; text-decoration: none;">Sabuk Kulit</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Kontak</h6>
                    <div class="mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        <span style="color: #A1887F;">Jl. Kerajinan Kulit No. 123, Yogyakarta</span>
                    </div>
                    <div class="mb-2">
                        <i class="fas fa-phone me-2"></i>
                        <span style="color: #A1887F;">+62 274 555 123</span>
                    </div>
                    <div class="mb-2">
                        <i class="fas fa-envelope me-2"></i>
                        <span style="color: #A1887F;">info@terumpahkulit.com</span>
                    </div>
                    <div class="mb-2">
                        <i class="fas fa-clock me-2"></i>
                        <span style="color: #A1887F;">Sen-Sab: 08:00-17:00</span>
                    </div>
                </div>
            </div>
            
            <hr style="border-color: rgba(255,255,255,0.1); margin: 2rem 0 1rem;">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0" style="color: var(--gold);">&copy; 2024 Terumpah Kulit. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0" style="color: #A1887F;">
                        Dibuat dengan <i class="fas fa-heart text-danger"></i> untuk pelanggan terbaik
                    </p>
                </div>
            </div>      
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/6274555123" class="whatsapp-float" title="Chat via WhatsApp">
        <i class="fab fa-whatsapp fa-lg"></i>
    </a>

    <!-- Order Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Product Info -->
                    <div id="productInfo" class="p-3 mb-4 bg-light rounded">
                        <!-- Product details will be loaded here -->
                    </div>

                    <!-- Order Form -->
                    <form action="{{ route('user.storeOrder') }}" method="POST">
                        @csrf
                        <input type="hidden" id="product_id" name="product_id">
                        
                        @auth
                            <!-- User Info Display -->
                            <div class="mb-4 p-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 rounded">
                                <h6 class="text-primary mb-2">
                                    <i class="fas fa-user me-2"></i>Detail Pembeli
                                </h6>
                                <p class="mb-1"><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                                <p class="mb-0"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            </div>
                        @endauth
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. Telepon *</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jumlah *</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="1" required onchange="updateTotal()">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap *</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>

                        <div class="border-top pt-3 mb-3">
                            <div class="d-flex justify-content-between fs-5 fw-bold">
                                <span>Total Harga:</span>
                                <span id="totalPrice" style="color: var(--brown-dark);">Rp 0</span>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-secondary flex-fill" data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn flex-fill" style="background: var(--gold); border-color: var(--gold); color: white;">
                                <i class="fas fa-shopping-cart me-2"></i>Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        let selectedProduct = null;
        const products = @json($products);

        // Smooth scrolling
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

        function openOrderModal(productId) {
            selectedProduct = products.find(p => p.id === productId);
            if (!selectedProduct) return;

            // Set product info
            document.getElementById('productInfo').innerHTML = `
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1">${selectedProduct.name}</h6>
                        <p class="text-muted mb-2">${selectedProduct.description}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-5 fw-bold" style="color: var(--brown-dark);">Rp ${new Intl.NumberFormat('id-ID').format(selectedProduct.price)}</span>
                            <small class="text-muted">Stok: ${selectedProduct.stock}</small>
                        </div>
                    </div>
                </div>
            `;

            document.getElementById('product_id').value = productId;
            document.getElementById('jumlah').max = selectedProduct.stock;
            updateTotal();

            // Show modal using Bootstrap 5
            new bootstrap.Modal(document.getElementById('orderModal')).show();
        }

        function showLoginAlert() {
            if (confirm('Anda harus login untuk melakukan pemesanan. Apakah Anda ingin login sekarang?')) {
                window.location.href = '{{ route("login") }}';
            }
        }

        function updateTotal() {
            if (!selectedProduct) return;
            
            const quantity = parseInt(document.getElementById('jumlah').value) || 1;
            const total = selectedProduct.price * quantity;
            
            document.getElementById('totalPrice').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
        }
    </script>
</body>
</html>
