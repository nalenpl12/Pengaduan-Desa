@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen py-1">
        <div class="max-w-10xl mx-auto bg-white shadow-md rounded-lg overflow-hidden sm:px-1 lg:px-1">
            <!-- Header -->
            @if (session('success'))
                <div class="bg-blue-100 text-blue-500 p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white p-6">
                <h2 class="text-xl font-bold text-black">Saran Pembangunan Infrastruktur</h2>
            </div>

            <form action="{{ route('saran.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3">
                    <!-- Kolom Merah -->
                    <div class="bg-white p-6 text-black">
                        <div class="mb-4">
                            <label for="jenis" class="block font-semibold mb-1">Jenis Pembangunan</label>
                            <select id="jenis" name="jenis" class="w-full rounded px-3 py-2" required>
                                <option value="">-- Pilih Jenis Pembangunan --</option>
                                <option value="Jalan Raya">Jalan Raya</option>
                                <option value="Jembatan">Jembatan</option>
                                <option value="Fasilitas Umum">Fasilitas Umum</option>
                                <option value="Saluran Air">Saluran Air</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="lokasi" class="block font-semibold mb-1">Lokasi Pembangunan (RT/RW)</label>
                            <input type="text" id="lokasi" name="lokasi" class="w-full rounded px-3 py-2" required>
                        </div>
                        <div class="mb-4">
                            <label for="detail" class="block font-semibold mb-1">Lokasi Lebih Detail</label>
                            <textarea id="detail" name="lokasi_detail" rows="4" class="w-full rounded px-3 py-2"></textarea>
                        </div>
                    </div>

                    <!-- Kolom Hijau -->
                    <div class="bg-white p-6 text-black">
                        <div class="mb-4">
                            <label for="deskripsi" class="block font-semibold mb-1">Deskripsi (optional)</label>
                            <textarea id="deskripsi" name="deskripsi" rows="8" class="w-full rounded px-3 py-2"></textarea>
                        </div>
                    </div>

                    <!-- Ilustrasi Putih -->
                    <div class="bg-white p-6 flex items-center justify-center">
                        <img src="{{ asset('img/saran-illustration.png') }}" alt="Ilustrasi Saran" class="max-h-65">
                    </div>
                </div>

                <!-- Catatan Biru Muda -->
                <div class="bg-white px-6 py-4 text-sm text-black font-medium">
                    <span class="text-red-500 font-extrabold">Catatan!!!:</span>
                    Untuk saran pembangunan infrastruktur tidak bisa dibangun secara langsung,<br>namun saran yang diberikan
                    pasti akan ditampung terlebih dahulu dalam sistem dan dipilih<br>berdasarkan skala prioritas pembangunan
                    desa dan kondisi keuangan desa.
                </div>

                <!-- Tombol Kuning -->
                <div class="bg-white px-6 py-4 flex justify-left space-x-6">
                    <a href="{{ route('dashboard') }}"
                        class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-xl max-w-30">
                        Kembali
                    </a>
                    <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-6 rounded-xl">
                        Kirim
                    </button>
                    {{-- <a href="{{ route('saran.index') }}"
                        class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded-xl max-w-30">
                        Lihat Saran Saya
                    </a> --}}
                </div>
            </form>
        </div>
    </div>
@endsection
