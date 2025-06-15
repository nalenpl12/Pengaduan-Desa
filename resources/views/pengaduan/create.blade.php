@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen py-1">
        <div class="max-w-10xl mx-auto bg-white shadow-md rounded-lg overflow-hidden sm:px-1 lg:px-1">
            <!-- Header -->
            @if (session('success'))
                <div class="bg-green-100 text-green-500 p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white p-6">
                <h2 class="text-xl font-bold text-black">Laporkan infrastruktur yang rusak atau bermasalah</h2>
            </div>

            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3">
                    <!-- Kolom Merah -->
                    <div class="bg-white p-6 text-black">
                        <div class="mb-4">
                            <label for="tanggal" class="block font-semibold mb-1">Tanggal Kejadian</label>
                            <input type="date" id="tanggal" name="tanggal" class="w-full rounded px-3 py-2" required>
                        </div>
                        <div class="mb-4">
                            <label for="waktu" class="block font-semibold mb-1">Waktu Kejadian</label>
                            <input type="time" id="waktu" name="waktu" class="w-full rounded px-3 py-2" required>
                        </div>
                        <div class="mb-4">
                            <label for="lokasi" class="block font-semibold mb-1">Lokasi Kejadian</label>
                            <input type="text" id="lokasi" name="lokasi" class="w-full rounded px-3 py-2" required>
                        </div>
                        <div class="mb-4">
                            <label for="jenis" class="block font-semibold mb-1">Jenis Infrastruktur</label>
                            <select id="jenis" name="jenis" class="w-full rounded px-3 py-2" required>
                                <option value="">-- Pilih Jenis Infrastruktur --</option>
                                <option value="Jalan Rusak">Jalan Rusak</option>
                                <option value="Jembatan">Jembatan</option>
                                <option value="Lampu Jalan">Lampu Jalan</option>
                                <option value="Fasilitas Umum">Fasilitas Umum</option>
                                <option value="Saluran Air">Saluran Air</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <!-- Kolom Hijau -->
                    <div class="bg-white p-6 text-black">
                        <div class="mb-4">
                            <label for="deskripsi" class="block font-semibold mb-1">Deskripsi Pengaduan (optional)</label>
                            <textarea id="deskripsi" name="deskripsi" rows="6" class="w-full rounded px-3 py-2"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="gambar" class="block font-semibold mb-1">Bukti Pendukung</label>
                            <input type="file" id="gambar" name="gambar[]" multiple class="w-full rounded px-3 py-2">
                        </div>
                    </div>

                    <!-- Ilustrasi Putih -->
                    <div class="bg-white p-6 flex items-center justify-center">
                        <img src="{{ asset('img/form-illustration.png') }}" alt="Ilustrasi Form" class="max-h-70">
                    </div>
                </div>

                <!-- Tombol Kuning -->
                <div class="bg-white px-6 py-4 flex justify-left space-x-6">
                    <a href="{{ route('dashboard') }}"
                        class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-xl">
                        Kembali
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded-xl">
                        Kirim
                    </button>
                    <a href="{{ route('pengaduan.index') }}"
                        class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-6 rounded-xl">
                        Lihat Data Aduan
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection