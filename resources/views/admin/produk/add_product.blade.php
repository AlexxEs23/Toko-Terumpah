

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800">
                <!-- Logo -->
                <div class="flex items-center ps-2.5 mb-5">
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Admin Panel</span>
                </div>
                
                <!-- Navigation Menu -->
                <ul class="space-y-2 font-medium">
                    <!-- Dashboard -->
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-gray-700 group">
                            <i class="fas fa-tachometer-alt w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100"></i>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>

                    <!-- Users -->
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-gray-700 group">
                            <i class="fas fa-users w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100"></i>
                            <span class="ms-3">Users</span>
                        </a>
                    </li>

                    <!-- Products -->
                    <li>
                        <button type="button" class="flex items-center w-full p-2 text-base text-gray-100 transition duration-75 rounded-lg group hover:bg-gray-700 bg-gray-700" aria-controls="dropdown-products" data-collapse-toggle="dropdown-products">
                            <i class="fas fa-box w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100"></i>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Products</span>
                            <i class="fas fa-chevron-down w-3 h-3"></i>
                        </button>
                        <ul id="dropdown-products" class="py-2 space-y-2">
                            <li>
                                <a href="{{url('admin/produk/data_product')}}" class="flex items-center w-full p-2 text-gray-100 transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Data Produk</a>
                            </li>
                            <li>
                                <a href="{{url('admin/produk/add_product')}}" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group bg-blue-600">Tambah Produk</a>
                            </li>
                            <li>
                                <a href="{{url('admin/produk/categories')}}" class="flex items-center w-full p-2 text-gray-100 transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Kategori</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Orders -->
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-gray-700 group">
                            <i class="fas fa-shopping-cart w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100"></i>
                            <span class="ms-3">Orders</span>
                        </a>
                    </li>

                    <!-- Logout -->
                    <li class="pt-4 mt-4 border-t border-gray-700">
                        <a href="#" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-red-600 group">
                            <i class="fas fa-sign-out-alt w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100"></i>
                            <span class="ms-3">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="p-4 sm:ml-64 w-full">
            <!-- Header -->
            <div class="mb-6">
                <nav class="flex mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                <i class="fas fa-home w-3 h-3 mr-2.5"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right w-3 h-3 text-gray-400 mx-1"></i>
                                <a href="{{url('admin/produk/data_product')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Products</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right w-3 h-3 text-gray-400 mx-1"></i>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Tambah Produk</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-3xl font-bold text-gray-900">Tambah Produk Baru</h1>
                <p class="text-gray-600 mt-1">Tambahkan produk baru ke dalam sistem</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800">
                        <i class="fas fa-plus-circle mr-2 text-blue-600"></i>
                        Informasi Produk
                    </h2>
                </div>
                
                <div class="p-6">
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                            <div class="flex">
                                <i class="fas fa-exclamation-circle mt-0.5 mr-2"></i>
                                <div>
                                    <p class="font-medium">Terdapat kesalahan:</p>
                                    <ul class="mt-2 list-disc list-inside text-sm">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ url('/admin/produk/addProductProcess') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <!-- Nama Produk -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-tag mr-1 text-gray-500"></i>
                                Nama Produk
                            </label>
                            <input type="text" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('name') border-red-500 @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   placeholder="Masukkan nama produk"
                                   required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-align-left mr-1 text-gray-500"></i>
                                Deskripsi Produk
                            </label>
                            <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('description') border-red-500 @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4"
                                      placeholder="Masukkan deskripsi produk"
                                      required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga dan Stok -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Harga -->
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-dollar-sign mr-1 text-gray-500"></i>
                                    Harga
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                                    <input type="number" 
                                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('price') border-red-500 @enderror" 
                                           id="price" 
                                           name="price" 
                                           value="{{ old('price') }}"
                                           placeholder="0"
                                           min="0"
                                           step="0.01"
                                           required>
                                </div>
                                @error('price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Stok -->
                            <div>
                                <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-boxes mr-1 text-gray-500"></i>
                                    Jumlah Stok
                                </label>
                                <input type="number" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('stock') border-red-500 @enderror" 
                                       id="stock" 
                                       name="stock" 
                                       value="{{ old('stock') }}"
                                       placeholder="0"
                                       min="0"
                                       required>
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
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition duration-200">
                                <div class="space-y-1 text-center">
                                    <div id="upload-placeholder">
                                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                <span>Upload gambar</span>
                                                <input id="image" name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                                            </label>
                                            <p class="pl-1">atau drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                                    </div>
                                    <div id="image-preview" class="hidden">
                                        <img id="preview" src="" alt="Preview" class="max-w-xs max-h-48 rounded-lg mx-auto">
                                        <button type="button" onclick="removeImage()" class="mt-2 text-sm text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash mr-1"></i>Hapus gambar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol Action -->
                        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                            <a href="{{ url('admin/produk/data_product') }}" 
                               class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mobile menu button -->
        <button data-drawer-target="sidebar" data-drawer-toggle="sidebar" aria-controls="sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 fixed top-4 left-4 z-50">
            <span class="sr-only">Open sidebar</span>
            <i class="fas fa-bars w-6 h-6"></i>
        </button>
    </div>

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
</body>
</html>
