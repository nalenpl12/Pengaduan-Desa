<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - {{ config('app.name', 'Pengaduan Desa') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen">

    <!-- Navbar -->
    <header class="bg-white shadow p-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-14 w-13">
            <div>
                <h1 class="text-x md:text-2xl font-bold text-blue-800 uppercase leading-tight">
                    Admin Website Resmi Pengaduan Infrastruktur<br>Desa Pekarungan
                </h1>
                <p class="text-blue-700 text-sm">Kecamatan Sukodono, Kabupaten Sidoarjo, Provinsi Jawa Timur</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-full">
                Keluar dari Akun
            </button>
        </form>
    </header>

    <!-- Konten -->
    <main class="p-1">
        @yield('content')
    </main>

</body>

</html>
