<!doctype html>
<html>
  <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  </head>
  <body>
    @include('admin.sidebar')
    <div class="ml-64 p-6">
      <!-- Main content -->
      <div class="mb-6">
        <div class="flex items-center mb-4">
          <a href="{{ route('admin.dataOrder') }}" class="text-gray-500 hover:text-gray-700 mr-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
          </a>
          <h1 class="text-3xl font-bold text-gray-900">Buat Order Baru</h1>
        </div>
        <p class="text-gray-600">Buat order baru untuk customer</p>
      </div>

      <!-- Success/Error Messages -->
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

      <!-- Error Messages -->
      @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
          <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Create Order Form -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
          <h2 class="text-lg font-semibold text-gray-900">Informasi Order</h2>
        </div>
        
        <form action="{{ route('admin.storeOrder') }}" method="POST" class="p-6 space-y-6" id="orderForm">
          @csrf
          
          <!-- Customer Selection -->
          <div>
            <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">
              Pilih Customer <span class="text-red-500">*</span>
            </label>
            <select 
              id="user_id" 
              name="user_id" 
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('user_id') border-red-500 @enderror" 
              required
            >
              <option value="">-- Pilih Customer --</option>
              @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                  {{ $user->name }} ({{ $user->email }})
                </option>
              @endforeach
            </select>
            @error('user_id')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Product Selection -->
          <div>
            <label for="product_id" class="block text-sm font-medium text-gray-700 mb-2">
              Pilih Produk <span class="text-red-500">*</span>
            </label>
            <select 
              id="product_id" 
              name="product_id" 
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('product_id') border-red-500 @enderror" 
              required
              onchange="updateProductInfo()"
            >
              <option value="">-- Pilih Produk --</option>
              @foreach($products as $product)
                <option value="{{ $product->id }}" 
                        data-price="{{ $product->price }}" 
                        data-stock="{{ $product->stock }}"
                        data-name="{{ $product->name }}"
                        {{ old('product_id') == $product->id ? 'selected' : '' }}>
                  {{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }} (Stock: {{ $product->stock }})
                </option>
              @endforeach
            </select>
            @error('product_id')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Product Info Display -->
          <div id="productInfo" class="hidden bg-blue-50 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-blue-900 mb-2">Informasi Produk:</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-blue-800">
              <div>
                <span class="font-medium">Nama:</span> <span id="productName">-</span>
              </div>
              <div>
                <span class="font-medium">Harga:</span> <span id="productPrice">-</span>
              </div>
              <div>
                <span class="font-medium">Stock Tersedia:</span> <span id="productStock">-</span>
              </div>
            </div>
          </div>

          <!-- Quantity -->
          <div>
            <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2">
              Jumlah <span class="text-red-500">*</span>
            </label>
            <div class="flex items-center space-x-3">
              <button type="button" onclick="decreaseQuantity()" class="px-3 py-2 bg-gray-200 text-gray-600 rounded-md hover:bg-gray-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                </svg>
              </button>
              <input 
                type="number" 
                id="jumlah" 
                name="jumlah" 
                value="{{ old('jumlah', 1) }}"
                min="1"
                class="w-24 px-3 py-2 border border-gray-300 rounded-md text-center shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('jumlah') border-red-500 @enderror" 
                required
                onchange="calculateTotal()"
                oninput="calculateTotal()"
              >
              <button type="button" onclick="increaseQuantity()" class="px-3 py-2 bg-gray-200 text-gray-600 rounded-md hover:bg-gray-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
              </button>
            </div>
            @error('jumlah')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Total Price Display -->
          <div class="bg-green-50 p-4 rounded-lg">
            <div class="flex justify-between items-center">
              <span class="text-lg font-medium text-gray-900">Total Harga:</span>
              <span id="totalPrice" class="text-2xl font-bold text-green-600">Rp 0</span>
            </div>
            <div class="mt-2 text-sm text-gray-600">
              <span id="priceBreakdown">Pilih produk dan masukkan jumlah untuk melihat total</span>
            </div>
          </div>

          <!-- Form Actions -->
          <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <a 
              href="{{ route('admin.dataOrder') }}" 
              class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
            >
              Batal
            </a>
            <button 
              type="submit" 
              class="px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
              id="submitButton"
            >
              <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h2m5-9h2a2 2 0 012 2v6a2 2 0 01-2 2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
              </svg>
              Buat Order
            </button>
          </div>
        </form>
      </div>

      <!-- Quick Stats -->
      <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
          <div class="flex items-center">
            <div class="p-2 bg-blue-100 rounded-lg">
              <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
              </svg>
            </div>
            <div class="ml-4">
              <h3 class="text-lg font-medium text-gray-900">Produk Tersedia</h3>
              <p class="text-2xl font-bold text-blue-600">{{ $products->count() }}</p>
            </div>
          </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
          <div class="flex items-center">
            <div class="p-2 bg-green-100 rounded-lg">
              <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
              </svg>
            </div>
            <div class="ml-4">
              <h3 class="text-lg font-medium text-gray-900">Total Customer</h3>
              <p class="text-2xl font-bold text-green-600">{{ $users->count() }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      function updateProductInfo() {
        const select = document.getElementById('product_id');
        const selectedOption = select.options[select.selectedIndex];
        const productInfo = document.getElementById('productInfo');
        
        if (selectedOption.value) {
          const productName = selectedOption.getAttribute('data-name');
          const productPrice = parseInt(selectedOption.getAttribute('data-price'));
          const productStock = parseInt(selectedOption.getAttribute('data-stock'));
          
          document.getElementById('productName').textContent = productName;
          document.getElementById('productPrice').textContent = 'Rp ' + productPrice.toLocaleString('id-ID');
          document.getElementById('productStock').textContent = productStock;
          
          productInfo.classList.remove('hidden');
          
          // Update quantity max
          const quantityInput = document.getElementById('jumlah');
          quantityInput.max = productStock;
          
          calculateTotal();
        } else {
          productInfo.classList.add('hidden');
          document.getElementById('totalPrice').textContent = 'Rp 0';
          document.getElementById('priceBreakdown').textContent = 'Pilih produk dan masukkan jumlah untuk melihat total';
        }
      }

      function calculateTotal() {
        const select = document.getElementById('product_id');
        const selectedOption = select.options[select.selectedIndex];
        const quantity = parseInt(document.getElementById('jumlah').value) || 0;
        
        if (selectedOption.value && quantity > 0) {
          const price = parseInt(selectedOption.getAttribute('data-price'));
          const stock = parseInt(selectedOption.getAttribute('data-stock'));
          const total = price * quantity;
          
          document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');
          document.getElementById('priceBreakdown').textContent = 
            `${quantity} x Rp ${price.toLocaleString('id-ID')} = Rp ${total.toLocaleString('id-ID')}`;
          
          // Check stock availability
          const submitButton = document.getElementById('submitButton');
          if (quantity > stock) {
            submitButton.disabled = true;
            submitButton.classList.remove('bg-blue-600', 'hover:bg-blue-700');
            submitButton.classList.add('bg-gray-400', 'cursor-not-allowed');
            document.getElementById('priceBreakdown').innerHTML += 
              '<br><span class="text-red-600">⚠️ Jumlah melebihi stock tersedia!</span>';
          } else {
            submitButton.disabled = false;
            submitButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
            submitButton.classList.add('bg-blue-600', 'hover:bg-blue-700');
          }
        } else {
          document.getElementById('totalPrice').textContent = 'Rp 0';
          document.getElementById('priceBreakdown').textContent = 'Pilih produk dan masukkan jumlah untuk melihat total';
        }
      }

      function increaseQuantity() {
        const quantityInput = document.getElementById('jumlah');
        const currentValue = parseInt(quantityInput.value) || 0;
        const maxValue = parseInt(quantityInput.max) || 999;
        
        if (currentValue < maxValue) {
          quantityInput.value = currentValue + 1;
          calculateTotal();
        }
      }

      function decreaseQuantity() {
        const quantityInput = document.getElementById('jumlah');
        const currentValue = parseInt(quantityInput.value) || 0;
        
        if (currentValue > 1) {
          quantityInput.value = currentValue - 1;
          calculateTotal();
        }
      }

      // Initialize on page load
      document.addEventListener('DOMContentLoaded', function() {
        updateProductInfo();
      });
    </script>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</html>
