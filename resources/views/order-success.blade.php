<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Sederhana</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('index') }}" class="text-2xl font-bold text-blue-600">Sederhana</a>
                </div>
                <div>
                    <a href="{{ route('index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        <i class="fas fa-home mr-2"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Success Content -->
    <div class="min-h-screen py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Header -->
            <div class="text-center mb-8">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                    <i class="fas fa-check text-green-600 text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Pesanan Berhasil!</h1>
                <p class="text-lg text-gray-600">Terima kasih atas pesanan Anda. Kami akan segera memproses pesanan ini.</p>
            </div>

            <!-- Order Details -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
                <div class="px-6 py-4 bg-blue-50 border-b border-blue-200">
                    <h2 class="text-xl font-semibold text-gray-900">Detail Pesanan</h2>
                </div>
                <div class="p-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Order Info -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pesanan</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">ID Pesanan:</span>
                                    <span class="font-semibold">#ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tanggal Pesanan:</span>
                                    <span class="font-semibold">{{ $order->created_at->format('d M Y, H:i') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-sm font-medium rounded-full">
                                        Menunggu Konfirmasi
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Info -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pelanggan</h3>
                            <div class="space-y-3">
                                <div>
                                    <span class="text-gray-600">Nama:</span>
                                    <p class="font-semibold">{{ $customerDetails['name'] ?? $order->user->name }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-600">Email:</span>
                                    <p class="font-semibold">{{ $customerDetails['email'] ?? $order->user->email }}</p>
                                </div>
                                @if(isset($customerDetails['phone']))
                                <div>
                                    <span class="text-gray-600">Telepon:</span>
                                    <p class="font-semibold">{{ $customerDetails['phone'] }}</p>
                                </div>
                                @endif
                                @if(isset($customerDetails['address']))
                                <div>
                                    <span class="text-gray-600">Alamat:</span>
                                    <p class="font-semibold">{{ $customerDetails['address'] }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-900">Detail Produk</h2>
                </div>
                <div class="p-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $order->product->name }}</h3>
                            <p class="text-gray-600 mt-1">{{ $order->product->description }}</p>
                            <div class="mt-4 grid grid-cols-2 gap-4">
                                <div>
                                    <span class="text-gray-600">Harga per item:</span>
                                    <p class="font-semibold text-green-600">Rp {{ number_format($order->product->price, 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-600">Jumlah:</span>
                                    <p class="font-semibold">{{ $order->jumlah }} pcs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-t pt-4 mt-4">
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-semibold text-gray-900">Total Harga:</span>
                            <span class="text-2xl font-bold text-blue-600">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-blue-900 mb-3">
                    <i class="fas fa-info-circle mr-2"></i>
                    Langkah Selanjutnya
                </h3>
                <div class="space-y-2 text-blue-800">
                    <p>• Kami akan mengirimkan konfirmasi pesanan ke email Anda dalam 1x24 jam</p>
                    <p>• Tim kami akan menghubungi Anda untuk konfirmasi lebih lanjut</p>
                    <p>• Pembayaran akan dilakukan setelah konfirmasi</p>
                    <p>• Pengiriman akan diproses setelah pembayaran diterima</p>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Butuh Bantuan?</h3>
                    <p class="text-gray-600 mb-4">Tim customer service kami siap membantu Anda</p>
                    <div class="flex justify-center space-x-6">
                        <div class="text-center">
                            <i class="fas fa-phone text-blue-600 text-xl mb-2"></i>
                            <p class="text-sm font-medium">+62 123 456 789</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-envelope text-blue-600 text-xl mb-2"></i>
                            <p class="text-sm font-medium">info@sederhana.com</p>
                        </div>
                        <div class="text-center">
                            <i class="fab fa-whatsapp text-green-600 text-xl mb-2"></i>
                            <p class="text-sm font-medium">WhatsApp</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="text-center mt-8">
                <a href="{{ route('index') }}" 
                   class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 font-medium mr-4">
                    <i class="fas fa-home mr-2"></i>
                    Kembali ke Beranda
                </a>
                <button onclick="window.print()" 
                        class="inline-block bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300 font-medium">
                    <i class="fas fa-print mr-2"></i>
                    Cetak Pesanan
                </button>
            </div>
        </div>
    </div>

    <script>
        // Auto scroll to top
        window.scrollTo(0, 0);

        // Clear customer details from session after displaying
        @if(session()->has('customer_details'))
            // This will clear the session data after the page loads
            setTimeout(() => {
                fetch('{{ route('user.orderSuccess', $order->id) }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({action: 'clear_session'})
                });
            }, 1000);
        @endif
    </script>
</body>
</html>
