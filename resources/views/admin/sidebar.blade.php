<!doctype html>
<html>
  <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  </head>
  <body>
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
                <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                </svg>
                <span class="ms-3">Dashboard</span>
              </a>
            </li>

            <!-- Users -->
            <li>
              <a href="{{ url('admin/user/data_user') }}" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-gray-700 group">
                <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="ms-3">Users</span>
              </a>
            </li>

            <!-- Products -->
            <li>
              <button type="button" class="flex items-center w-full p-2 text-base text-gray-100 transition duration-75 rounded-lg group hover:bg-gray-700" aria-controls="dropdown-products" data-collapse-toggle="dropdown-products">
                <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                  <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                </svg>
                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Products</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
              </button>
              <ul id="dropdown-products" class="hidden py-2 space-y-2">
                <li>
                  <a href="{{url('admin/produk/data_product')}}" class="flex items-center w-full p-2 text-gray-100 transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Data Produk</a>
                </li>
                <li>
                  <a href="{{url('admin/produk/add_product')}}" class="flex items-center w-full p-2 text-gray-100 transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Tambah Produk</a>
                </li>
                <li>
                  <a href="{{url('admin/produk/categories')}}" class="flex items-center w-full p-2 text-gray-100 transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Kategori</a>
                </li>
              </ul>
            </li>
             
            <!-- Orders -->
            <li>
              <button type="button" class="flex items-center w-full p-2 text-base text-gray-100 transition duration-75 rounded-lg group hover:bg-gray-700" aria-controls="dropdown-orders" data-collapse-toggle="dropdown-orders">
                <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2a2 2 0 1 0-4 0v1.047a6.7 6.7 0 0 0-2.4.568l-.018.008-2.08.833a2 2 0 0 0-1.147 1.81v9.565a2 2 0 0 0 1.147 1.81l2.08.833.018.008a6.7 6.7 0 0 0 2.4.568V20a2 2 0 1 0 4 0v-1.047a6.7 6.7 0 0 0 2.4-.568l.018-.008 2.08-.833a2 2 0 0 0 1.147-1.81V6.169a2 2 0 0 0-1.147-1.81l-2.08-.833ZM10 9a1 1 0 1 1 2 0v.5a1 1 0 1 1-2 0V9Zm2 3a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                </svg>
                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Orders</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
              </button>
              <ul id="dropdown-orders" class="hidden py-2 space-y-2">
                <li>
                  <a href="{{url('admin/order/data_order')}}" class="flex items-center w-full p-2 text-gray-100 transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Data Order</a>
                </li>
                <li>
                  <a href="{{url('admin/order/create_order')}}" class="flex items-center w-full p-2 text-gray-100 transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Buat Order</a>
                </li>
              </ul>
                <li>
                  <a href="{{url('admin/order/create_order')}}" class="flex items-center w-full p-2 text-gray-100 transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Buat Order</a>
                </li>
              </ul>
            </li>


            <!-- Logout -->
            <li class="pt-4 mt-4 border-t border-gray-700">
              <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-red-600 group">
                  <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                  </svg>
                  <span class="ms-3">Logout</span>
                </a>
              </form>
            </li>
          </ul>
        </div>
      </aside>

    
 

      <!-- Mobile menu button -->
      <button data-drawer-target="sidebar" data-drawer-toggle="sidebar" aria-controls="sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
      </button>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</html>