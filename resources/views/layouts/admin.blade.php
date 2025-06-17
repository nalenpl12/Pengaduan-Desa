<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | {{ config('app.name', 'Pengaduan Desa') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen">
        <!-- Admin Navbar -->
        <nav class="bg-blue-900 text-white px-6 py-4 flex justify-between items-center shadow">
            <div class="font-bold text-xl">Admin Panel</div>
            <div>
                <span class="mr-4">{{ Auth::user()->nama }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white">
                        Keluar
                    </button>
                </form>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</body>

</html>
