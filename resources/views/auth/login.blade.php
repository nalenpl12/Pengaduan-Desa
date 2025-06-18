<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pengaduan Desa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
</head>

<body class="bg-gradient-to-b from-blue-200 to-white">
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col md:flex-row w-full max-w-5xl bg-white rounded-2xl shadow-lg overflow-hidden">

            <!-- Bagian kiri -->
            <div class="md:w-1/2 bg-blue-800 text-white p-10 flex flex-col justify-center">
                <h2 class="text-3xl font-bold mb-6 leading-tight">
                    Selamat Datang di sistem<br>Pengaduan Infrastruktur<br>Desa Pekarungan
                </h2>
                <img src="{{ asset('img/login-illustration.png') }}" alt="Ilustrasi Login" class="w-full mt-4">
            </div>

            <!-- Bagian kanan -->
            <div class="md:w-1/2 bg-[#FFF6E9] p-10">
                <h2 class="text-2xl font-bold text-blue-800 mb-6 mt-14">MASUK</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input type="email" name="email" required
                        class="w-full px-3 py-2 mb-4 bg-gray-200 border-b-4 border-black rounded"
                        placeholder="Email" />

                    <input type="password" name="password" required
                        class="w-full px-3 py-2 mb-6 bg-gray-200 border-b-4 border-black rounded"
                        placeholder="Kata Sandi" />

                    <button type="submit"
                        class="w-full bg-blue-700 text-white font-bold py-2 rounded-xl hover:bg-blue-800 transition">
                        Masuk
                    </button>
                </form>

                <p class="mt-6 text-sm text-gray-700">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-700 font-semibold hover:underline">Buat Akun</a>
                </p>
            </div>

        </div>
    </div>
</body>

</html>
