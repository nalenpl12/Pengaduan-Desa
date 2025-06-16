<nav class="bg-white shadow-md">
    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo dan Judul -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}"> <img src="{{ asset('img/logo.png') }}" alt="Logo Desa" class="w-14 h-13"></a>
                <div>
                    <h1 class="text-base sm:text-lg font-bold text-blue-800 leading-tight uppercase">
                        WEBSITE RESMI PENGADUAN INFRASTRUKTUR DESA PEKARUNGAN
                    </h1>
                    <p class="text-sm text-blue-600">
                        Kecamatan Sukodono, Kabupaten Sidoarjo, Provinsi Jawa Timur
                    </p>
                </div>
            </div>

            <!-- Status Aduan + Avatar -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('dashboard') }}" class="text-blue-800 font-semibold hover:underline text-sm sm:text-base">
                    Dashboard
                </a>
                <a href="{{ route('pengaduan.index') }}" class="text-blue-800 font-semibold hover:underline text-sm sm:text-base">
                    Data Aduan
                </a>
                <a href="{{ route('pengaduan.status') }}" class="text-blue-800 font-semibold hover:underline text-sm sm:text-base">
                    Status Aduan
                </a>

                <!-- Avatar -->
                <div class="relative group">
                    <button
                        class="w-10 h-10 bg-blue-700 text-white rounded-full flex items-center justify-center font-bold">
                        {{ strtoupper(substr(Auth::user()->nama ?? 'U', 0, 1)) }}
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg hidden group-hover:block z-50">
                        <a href="{{ route('profile.show') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>