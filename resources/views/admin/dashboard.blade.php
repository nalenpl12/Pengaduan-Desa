@extends('layouts.admin')

@section('content')
    <div class="flex min-h-screen">
        <!-- Bagian Kiri (Kuning - Grafik) -->
        <div class="w-2/3 bg-white p-5">
            <div class="mb-10">
                <h3 class="font-bold mb-2">Grafik Pengaduan Infrastruktur :</h3>
                <!-- Nanti tempat grafik -->
                <div class="bg-white h-64 rounded shadow-md flex items-center justify-center text-gray-500">
                    Grafik pengaduan akan ditampilkan di sini
                </div>
            </div>

            <div>
                <h3 class="font-bold mb-2">Grafik Saran Pembangunan :</h3>
                <!-- Nanti tempat grafik -->
                <div class="bg-white h-64 rounded shadow-md flex items-center justify-center text-gray-500">
                    Grafik saran akan ditampilkan di sini
                </div>
            </div>
        </div>

        <!-- Bagian Kanan (Putih - Fitur Admin) -->
        <div class="w-1/3 bg-white p-8 space-y-6">
            <!-- Kartu: Data Pengaduan -->
            <a href="{{ route('admin.pengaduan.index') }}"
                class="flex items-center bg-gray-200 rounded-lg shadow p-4 hover:bg-gray-300">
                <img src="{{ asset('img/admin-aduan.png') }}" alt="Pengaduan" class="w-16 h-16 mr-4">
                <div>
                    <h4 class="font-bold">Data Pengaduan Masyarakat</h4>
                    <span class="text-sm text-gray-600">Lihat lebih lengkap &gt;</span>
                </div>
            </a>

            <!-- Kartu: Data Saran -->
            <a href="{{ route('admin.saran.index') }}"
                class="flex items-center bg-gray-200 rounded-lg shadow p-4 hover:bg-gray-300">
                <img src="{{ asset('img/admin-saran.png') }}" alt="Saran" class="w-16 h-16 mr-4">
                <div>
                    <h4 class="font-bold">Data Saran Pembangunan</h4>
                    <span class="text-sm text-gray-600">Lihat lebih lengkap &gt;</span>
                </div>
            </a>

            <!-- Kartu: Data Pengguna -->
            <a href="{{ route('admin.users.index') }}"
                class="flex items-center bg-gray-200 rounded-lg shadow p-4 hover:bg-gray-300">
                <img src="{{ asset('img/admin-user.png') }}" alt="User" class="w-16 h-16 mr-4">
                <div>
                    <h4 class="font-bold">Data Pengguna Website</h4>
                    <span class="text-sm text-gray-600">Lihat lebih lengkap &gt;</span>
                </div>
            </a>
        </div>
    </div>
@endsection
