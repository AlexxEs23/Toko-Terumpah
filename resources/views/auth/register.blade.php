<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-green-400 to-emerald-400">

  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Register</h2>


    @if ($errors->any())
      <div class="mb-4">
        <ul class="list-disc list-inside text-sm text-red-600">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form class="space-y-4" method="POST" action="{{ route('registerPost') }}">
      @csrf
      <div>
        <label class="block text-sm font-medium text-gray-600">Nama</label>
        <input name="name" type="text" placeholder="Masukkan nama" required
          class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-600">Email</label>
        <input name="email" type="email" placeholder="Masukkan email" required
          class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-600">Password</label>
        <input name="password" type="password" placeholder="Buat password" required
          class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-600">Konfirmasi Password</label>
        <input name="password_confirmation" type="password" placeholder="Konfirmasi password" required
          class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
      </div>
      <button type="submit"
        class="w-full py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">Register</button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
      Sudah punya akun?
      <a href="login.html" class="text-green-500 font-semibold">Login</a>
    </p>
  </div>

</body>
</html>
