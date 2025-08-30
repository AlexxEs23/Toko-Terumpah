<!doctype html>
<html>
  <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  </head>
  <body>
    @include('admin.sidebar')
    <div class="ml-64 p-6">
      <!-- Main content -->
      <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Data Order</h1>
        <p class="text-gray-600">Kelola semua order yang masuk di sistem</p>
      </div>

      <!-- Success Message -->
      @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
          <span class="block sm:inline">{{ session('success') }}</span>
        </div>
      @endif

      @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
          <span class="block sm:inline">{{ session('error') }}</span>
        </div>
      @endif

      <!-- Add Order Button -->
      <div class="mb-6">
        <a href="{{ route('admin.createOrder') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
          </svg>
          Buat Order Baru
        </a>
      </div>

      <!-- Add Order Button -->
      <div class="mb-6">
        <a href="{{ route('admin.createOrder') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
          </svg>
          Buat Order Baru
        </a>
      </div>

      <!-- Orders Table -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Order ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Customer
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Produk
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Jumlah
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Total Harga
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Tanggal Order
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @forelse($orders as $order)
              <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  #ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                        <span class="text-sm font-medium text-gray-700">
                          {{ $order->user ? strtoupper(substr($order->user->name, 0, 1)) : 'N/A' }}
                        </span>
                      </div>
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ $order->user ? $order->user->name : 'User Deleted' }}
                      </div>
                      <div class="text-sm text-gray-500">
                        {{ $order->user ? $order->user->email : 'N/A' }}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">
                    {{ $order->product ? $order->product->name : 'Product Deleted' }}
                  </div>
                  @if($order->product)
                    <div class="text-sm text-gray-500">
                      Rp {{ number_format($order->product->price, 0, ',', '.') }} per item
                    </div>
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                  <span class="px-2 py-1 text-sm font-semibold bg-blue-100 text-blue-800 rounded-full">
                    {{ $order->jumlah }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-semibold text-green-600">
                    Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div>{{ $order->created_at->format('d M Y') }}</div>
                  <div class="text-xs text-gray-400">{{ $order->created_at->format('H:i') }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  @php
                    $statusClasses = [
                      'pending' => 'bg-yellow-100 text-yellow-800',
                      'processing' => 'bg-blue-100 text-blue-800', 
                      'shipped' => 'bg-purple-100 text-purple-800',
                      'delivered' => 'bg-green-100 text-green-800',
                      'cancelled' => 'bg-red-100 text-red-800'
                    ];
                    $statusText = [
                      'pending' => 'Pending',
                      'processing' => 'Processing',
                      'shipped' => 'Shipped', 
                      'delivered' => 'Delivered',
                      'cancelled' => 'Cancelled'
                    ];
                  @endphp
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
                    {{ $statusText[$order->status] ?? ucfirst($order->status) }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex space-x-2">
                    <button onclick="showOrderDetail({{ $order->id }})" 
                            class="text-indigo-600 hover:text-indigo-900 font-medium flex items-center">
                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                      </svg>
                      Detail
                    </button>
                    <form action="{{ route('admin.deleteOrder', $order->id) }}" method="POST" class="inline" 
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus order ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-600 hover:text-red-900 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="8" class="px-6 py-12 text-center">
                  <div class="text-gray-500">
                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h2m5-9h2a2 2 0 012 2v6a2 2 0 01-2 2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada order</h3>
                    <p class="text-gray-500">Belum ada order yang masuk ke sistem.</p>
                  </div>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Summary Stats -->
      <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
          <div class="flex items-center">
            <div class="p-2 bg-blue-100 rounded-lg">
              <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h2m5-9h2a2 2 0 012 2v6a2 2 0 01-2 2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
              </svg>
            </div>
            <div class="ml-4">
              <h3 class="text-lg font-medium text-gray-900">Total Order</h3>
              <p class="text-2xl font-bold text-blue-600">{{ $orders->count() }}</p>
            </div>
          </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
          <div class="flex items-center">
            <div class="p-2 bg-green-100 rounded-lg">
              <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
              </svg>
            </div>
            <div class="ml-4">
              <h3 class="text-lg font-medium text-gray-900">Total Pendapatan</h3>
              <p class="text-2xl font-bold text-green-600">
                @if($orders->count() > 0)
                  Rp {{ number_format($orders->sum('total_harga'), 0, ',', '.') }}
                @else
                  Rp 0
                @endif
              </p>
            </div>
          </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
          <div class="flex items-center">
            <div class="p-2 bg-yellow-100 rounded-lg">
              <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
              </svg>
            </div>
            <div class="ml-4">
              <h3 class="text-lg font-medium text-gray-900">Total Produk Terjual</h3>
              <p class="text-2xl font-bold text-yellow-600">
                {{ $orders->sum('jumlah') }}
              </p>
            </div>
          </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
          <div class="flex items-center">
            <div class="p-2 bg-purple-100 rounded-lg">
              <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
              </svg>
            </div>
            <div class="ml-4">
              <h3 class="text-lg font-medium text-gray-900">Rata-rata Order</h3>
              <p class="text-2xl font-bold text-purple-600">
                @if($orders->count() > 0)
                  Rp {{ number_format($orders->avg('total_harga'), 0, ',', '.') }}
                @else
                  Rp 0
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Orders -->
      <div class="mt-6 bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
          <h2 class="text-lg font-semibold text-gray-900">Order Terbaru</h2>
        </div>
        <div class="p-6">
          @if($orders->take(5)->count() > 0)
            <div class="space-y-4">
              @foreach($orders->take(5) as $recentOrder)
                <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-b-0">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-8 w-8 bg-gray-300 rounded-full flex items-center justify-center">
                      <span class="text-xs font-medium text-gray-700">
                        {{ $recentOrder->user ? strtoupper(substr($recentOrder->user->name, 0, 1)) : 'N' }}
                      </span>
                    </div>
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">
                        #ORD-{{ str_pad($recentOrder->id, 4, '0', STR_PAD_LEFT) }} - {{ $recentOrder->user ? $recentOrder->user->name : 'User Deleted' }}
                      </p>
                      <p class="text-xs text-gray-500">
                        {{ $recentOrder->product ? $recentOrder->product->name : 'Product Deleted' }} ({{ $recentOrder->jumlah }}x)
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center space-x-2">
                    <span class="text-sm font-semibold text-green-600">
                      Rp {{ number_format($recentOrder->total_harga, 0, ',', '.') }}
                    </span>
                    <span class="text-xs text-gray-500">{{ $recentOrder->created_at->diffForHumans() }}</span>
                  </div>
                </div>
              @endforeach
            </div>
          @else
            <p class="text-gray-500 text-center py-4">Belum ada order</p>
          @endif
        </div>
      </div>
    </div>

    <!-- Order Detail Modal -->
    <div id="orderDetailModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
      <div class="bg-white rounded-lg w-full max-w-2xl max-h-screen overflow-y-auto">
        <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
          <h3 class="text-lg font-semibold text-gray-900">Detail Order</h3>
          <button onclick="closeOrderDetail()" class="text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
        <div id="orderDetailContent" class="p-6">
          <!-- Order detail content will be loaded here -->
        </div>
      </div>
    </div>

    <script>
      function showOrderDetail(orderId) {
        // Find the order data from the orders array
        const orders = @json($orders);
        const order = orders.find(o => o.id === orderId);
        
        if (!order) {
          document.getElementById('orderDetailContent').innerHTML = `
            <div class="text-center py-4">
              <p class="text-red-600">Order tidak ditemukan!</p>
            </div>
          `;
        } else {
          document.getElementById('orderDetailContent').innerHTML = `
            <div class="space-y-4">
              <!-- Order Info -->
              <div class="border-b pb-4">
                <h4 class="font-semibold text-gray-900 mb-2">Informasi Order</h4>
                <div class="grid grid-cols-2 gap-4 text-sm">
                  <div>
                    <span class="text-gray-500">Order ID:</span>
                    <span class="font-medium ml-2">#ORD-${orderId.toString().padStart(4, '0')}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Status:</span>
                    <span class="ml-2 px-2 py-1 text-xs font-semibold rounded-full ${getStatusClass(order.status)}">${getStatusText(order.status)}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Tanggal Order:</span>
                    <span class="font-medium ml-2">${new Date(order.created_at).toLocaleDateString('id-ID')}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Waktu:</span>
                    <span class="font-medium ml-2">${new Date(order.created_at).toLocaleTimeString('id-ID')}</span>
                  </div>
                </div>
              </div>

              <!-- Customer Info -->
              <div class="border-b pb-4">
                <h4 class="font-semibold text-gray-900 mb-2">Informasi Customer</h4>
                <div class="space-y-2 text-sm">
                  <div>
                    <span class="text-gray-500">Nama:</span>
                    <span class="font-medium ml-2">${order.user ? order.user.name : 'User Deleted'}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Email:</span>
                    <span class="font-medium ml-2">${order.user ? order.user.email : 'N/A'}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">No. Telepon:</span>
                    <span class="font-medium ml-2">${order.phone || 'Tidak ada'}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Alamat:</span>
                    <div class="mt-1 ml-2 p-2 bg-gray-50 rounded text-gray-700">
                      ${order.address || 'Alamat tidak tersedia'}
                    </div>
                  </div>
                </div>
              </div>

              <!-- Product Info -->
              <div class="border-b pb-4">
                <h4 class="font-semibold text-gray-900 mb-2">Informasi Produk</h4>
                <div class="space-y-2 text-sm">
                  <div>
                    <span class="text-gray-500">Nama Produk:</span>
                    <span class="font-medium ml-2">${order.product ? order.product.name : 'Product Deleted'}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Harga Satuan:</span>
                    <span class="font-medium ml-2">Rp ${order.product ? new Intl.NumberFormat('id-ID').format(order.product.price) : '0'}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Jumlah:</span>
                    <span class="font-medium ml-2">${order.jumlah} item</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Total Harga:</span>
                    <span class="font-bold text-green-600 ml-2">Rp ${new Intl.NumberFormat('id-ID').format(order.total_harga)}</span>
                  </div>
                </div>
              </div>

              <!-- Status Update Form -->
              <div>
                <h4 class="font-semibold text-gray-900 mb-2">Update Status</h4>
                <form action="{{ url('admin/order/update_status') }}/${orderId}" method="POST" class="flex items-center space-x-3">
                  <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'}">
                  <select name="status" class="border border-gray-300 rounded px-3 py-2 text-sm">
                    <option value="pending" ${order.status === 'pending' ? 'selected' : ''}>Pending</option>
                    <option value="processing" ${order.status === 'processing' ? 'selected' : ''}>Processing</option>
                    <option value="shipped" ${order.status === 'shipped' ? 'selected' : ''}>Shipped</option>
                    <option value="delivered" ${order.status === 'delivered' ? 'selected' : ''}>Delivered</option>
                    <option value="cancelled" ${order.status === 'cancelled' ? 'selected' : ''}>Cancelled</option>
                  </select>
                  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                    Update Status
                  </button>
                </form>
              </div>
            </div>
          `;
        }
        
        document.getElementById('orderDetailModal').classList.remove('hidden');
      }

      function getStatusClass(status) {
        switch(status) {
          case 'pending': return 'bg-yellow-100 text-yellow-800';
          case 'processing': return 'bg-blue-100 text-blue-800';
          case 'shipped': return 'bg-purple-100 text-purple-800';
          case 'delivered': return 'bg-green-100 text-green-800';
          case 'cancelled': return 'bg-red-100 text-red-800';
          default: return 'bg-gray-100 text-gray-800';
        }
      }

      function getStatusText(status) {
        switch(status) {
          case 'pending': return 'Pending';
          case 'processing': return 'Processing';
          case 'shipped': return 'Shipped';
          case 'delivered': return 'Delivered';
          case 'cancelled': return 'Cancelled';
          default: return 'Unknown';
        }
      }

      function closeOrderDetail() {
        document.getElementById('orderDetailModal').classList.add('hidden');
      }
    </script>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</html>