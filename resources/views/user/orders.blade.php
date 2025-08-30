<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Terumpah Kulit</title>
    
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

        .order-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .order-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-pending { background: #fff3cd; color: #856404; }
        .status-processing { background: #cce5ff; color: #0066cc; }
        .status-shipped { background: #d1ecf1; color: #0c5460; }
        .status-delivered { background: #d4edda; color: #155724; }
        .status-cancelled { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <i class="fas fa-shoe-prints me-2"></i>
                Terumpah Kulit
            </a>
            <div class="ms-auto">
                <a href="{{ route('index') }}" class="btn btn-outline-light">
                    <i class="fas fa-home me-2"></i>Kembali ke Beranda
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center mb-4">
                    <h2 class="mb-0 me-3">
                        <i class="fas fa-shopping-bag me-2"></i>Pesanan Saya
                    </h2>
                    <span class="badge bg-primary">{{ $orders->count() }} Pesanan</span>
                </div>

                @if($orders->count() > 0)
                    @foreach($orders as $order)
                        <div class="order-card">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <small class="text-muted">Order ID</small>
                                        <div class="fw-bold">#{{ $order->id }}</div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <small class="text-muted">Produk</small>
                                        <div class="fw-bold">{{ $order->product->name }}</div>
                                        <small class="text-muted">{{ $order->jumlah }} item</small>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <small class="text-muted">Total</small>
                                        <div class="fw-bold text-primary">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <small class="text-muted">Tanggal</small>
                                        <div>{{ $order->created_at->format('d M Y') }}</div>
                                        <small class="text-muted">{{ $order->created_at->format('H:i') }}</small>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <small class="text-muted">Status</small>
                                        <div>
                                            @switch($order->status)
                                                @case('pending')
                                                    <span class="status-badge status-pending">
                                                        <i class="fas fa-clock me-1"></i>Pending
                                                    </span>
                                                    @break
                                                @case('processing')
                                                    <span class="status-badge status-processing">
                                                        <i class="fas fa-cog me-1"></i>Diproses
                                                    </span>
                                                    @break
                                                @case('shipped')
                                                    <span class="status-badge status-shipped">
                                                        <i class="fas fa-shipping-fast me-1"></i>Dikirim
                                                    </span>
                                                    @break
                                                @case('delivered')
                                                    <span class="status-badge status-delivered">
                                                        <i class="fas fa-check-circle me-1"></i>Terkirim
                                                    </span>
                                                    @break
                                                @case('cancelled')
                                                    <span class="status-badge status-cancelled">
                                                        <i class="fas fa-times-circle me-1"></i>Dibatalkan
                                                    </span>
                                                    @break
                                                @default
                                                    <span class="status-badge status-pending">
                                                        <i class="fas fa-clock me-1"></i>Pending
                                                    </span>
                                            @endswitch
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-1">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#order{{ $order->id }}" aria-expanded="false">
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Order Details Collapse -->
                                <div class="collapse mt-3" id="order{{ $order->id }}">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="mb-2">Detail Produk:</h6>
                                            <p class="text-muted mb-2">{{ $order->product->description }}</p>
                                            <p><strong>Harga Satuan:</strong> Rp {{ number_format($order->product->price, 0, ',', '.') }}</p>
                                            <p><strong>Jumlah:</strong> {{ $order->jumlah }} item</p>
                                            <p><strong>Total Harga:</strong> Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="mb-2">Detail Pengiriman:</h6>
                                            <p><strong>No. Telepon:</strong> {{ $order->phone ?? 'Tidak ada' }}</p>
                                            <p><strong>Alamat:</strong></p>
                                            <div class="bg-light p-2 rounded mb-3">
                                                {{ $order->address ?? 'Alamat tidak tersedia' }}
                                            </div>
                                            <h6 class="mb-2">Timeline:</h6>
                                            <div class="small">
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="fas fa-circle text-success me-2" style="font-size: 8px;"></i>
                                                    <span>Pesanan dibuat: {{ $order->created_at->format('d M Y, H:i') }}</span>
                                                </div>
                                                @if($order->updated_at != $order->created_at)
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-circle text-primary me-2" style="font-size: 8px;"></i>
                                                        <span>Terakhir update: {{ $order->updated_at->format('d M Y, H:i') }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-shopping-bag" style="font-size: 4rem; color: var(--brown-light); opacity: 0.5;"></i>
                        </div>
                        <h4 class="mb-3">Belum Ada Pesanan</h4>
                        <p class="text-muted mb-4">Anda belum melakukan pesanan apapun. Mulai berbelanja sekarang!</p>
                        <a href="{{ route('index') }}#produk" class="btn btn-primary" style="background: var(--gold); border-color: var(--gold);">
                            <i class="fas fa-shopping-cart me-2"></i>Mulai Belanja
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
