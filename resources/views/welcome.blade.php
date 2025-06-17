<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan Infrastruktur</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-[Inter] bg-white text-gray-800">
    <div class="min-h-screen flex flex-col justify-between">
        <!-- Header -->
        <header class="flex items-center justify-between px-8 py-6">
            <div class="flex items-center gap-4">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-20 h-20">
                <div>
                    <h1 class="text-5xl py-3 font-bold text-blue-800">Sistem Pengaduan Infrastruktur</h1>
                    <p class="text-blue-600 text-3x1">Desa Pekarungan, Kabupaten Sidoarjo, Provinsi Jawa Timur</p>
                </div>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('login') }}"
                    class="bg-blue-600 hover:bg-blue-800 text-white px-5 py-2 rounded-xl font-semibold text-sm">Masuk</a>
                <a href="{{ route('register') }}"
                    class="bg-blue-600 hover:bg-blue-800 text-white px-5 py-2 rounded-xl font-semibold text-sm">Daftar</a>
            </div>
        </header>

        <!-- Ilustrasi -->
        <main class="flex-grow flex items-center justify-center">
            <img src="{{ asset('img/landingpage-illustration.png') }}" alt="Ilustrasi Pengaduan" class="w-full">
        </main>
    </div>
</body>

</html>
