<!doctype html>
<html>
  <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  </head>
  <body>
    @include('admin.sidebar')
    <div class="ml-64 p-6">
      <!-- Main content -->
      <div class="mb-6">
        <div class="flex items-center mb-4">
          <a href="{{ route('admin.dataProduct') }}" class="text-gray-500 hover:text-gray-700 mr-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
          </a>
          <h1 class="text-3xl font-bold text-gray-900">Edit Produk</h1>
        </div>
        <p class="text-gray-600">Update informasi produk</p>
      </div>

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

      <!-- Update Product Form -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
          <h2 class="text-lg font-semibold text-gray-900">Informasi Produk</h2>
        </div>
        
        <form action="{{ route('admin.updateProductProcess', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
          @csrf
          
          <!-- Product Name -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
              Nama Produk <span class="text-red-500">*</span>
            </label>
            <input 
              type="text" 
              id="name" 
              name="name" 
              value="{{ old('name', $product->name) }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror" 
              placeholder="Masukkan nama produk"
              required
            >
            @error('name')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Product Description -->
          <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
              Deskripsi Produk <span class="text-red-500">*</span>
            </label>
            <textarea 
              id="description" 
              name="description" 
              rows="4"
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror" 
              placeholder="Masukkan deskripsi produk"
              required
            >{{ old('description', $product->description) }}</textarea>
            @error('description')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Price and Stock Row -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Product Price -->
            <div>
              <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                Harga (Rp) <span class="text-red-500">*</span>
              </label>
              <div class="relative">
                <span class="absolute left-3 top-2 text-gray-500">Rp</span>
                <input 
                  type="number" 
                  id="price" 
                  name="price" 
                  value="{{ old('price', $product->price) }}"
                  step="0.01"
                  min="0"
                  class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror" 
                  placeholder="0.00"
                  required
                >
              </div>
              @error('price')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <!-- Product Stock -->
            <div>
              <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">
                Stok <span class="text-red-500">*</span>
              </label>
              <input 
                type="number" 
                id="stock" 
                name="stock" 
                value="{{ old('stock', $product->stock) }}"
                min="0"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('stock') border-red-500 @enderror" 
                placeholder="0"
                required
              >
              @error('stock')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <!-- Upload Gambar -->
          <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
              <i class="fas fa-image mr-1 text-gray-500"></i>
              Gambar Produk
            </label>
            
            <!-- Current Image Display -->
            @if($product->image)
              <div class="mb-4">
                <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg border">
              </div>
            @endif
            
            <!-- Upload New Image -->
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition duration-200">
              <div class="space-y-1 text-center">
                <div id="upload-placeholder">
                  <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                  <div class="flex text-sm text-gray-600">
                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                      <span>Upload gambar baru</span>
                      <input id="image" name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                    </label>
                    <p class="pl-1">atau drag and drop</p>
                  </div>
                  <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                </div>
                <div id="image-preview" class="hidden">
                  <img id="preview" src="" alt="Preview" class="max-w-xs max-h-48 rounded-lg mx-auto">
                  <button type="button" onclick="removeImage()" class="mt-2 text-sm text-red-600 hover:text-red-800">
                    <i class="fas fa-trash mr-1"></i>Hapus gambar baru
                  </button>
                </div>
              </div>
            </div>
            @error('image')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Product Info Display -->
          <div class="bg-gray-50 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-gray-700 mb-2">Informasi Produk Saat Ini:</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
              <div>
                <span class="font-medium">ID Produk:</span> {{ $product->id }}
              </div>
              <div>
                <span class="font-medium">Dibuat:</span> {{ $product->created_at->format('d M Y H:i') }}
              </div>
              <div>
                <span class="font-medium">Terakhir Update:</span> {{ $product->updated_at->format('d M Y H:i') }}
              </div>
            </div>
          </div>

          <!-- Form Actions -->
          <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <a 
              href="{{ route('admin.dataProduct') }}" 
              class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
            >
              Batal
            </a>
            <button 
              type="submit" 
              class="px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
            >
              <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              Update Produk
            </button>
          </div>
        </form>
      </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('image-preview').classList.remove('hidden');
                document.getElementById('upload-placeholder').classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    function removeImage() {
        document.getElementById('image').value = '';
        document.getElementById('image-preview').classList.add('hidden');
        document.getElementById('upload-placeholder').classList.remove('hidden');
    }
  </script>
</html>
