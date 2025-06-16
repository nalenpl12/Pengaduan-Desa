@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white py-1">
        <div class="max-w-10xl bg-white shadow-md rounded-lg overflow-hidden sm:px-1 lg:px-1">
            <div class="bg-white p-6">
                <h2 class="text-xl font-bold text-black">Edit Saran Pembangunan</h2>
            </div>

            <form action="{{ route('saran.update', $saran->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-3">
                    <!-- Kolom Merah -->
                    <div class="bg-white p-6 text-black">
                        <div class="mb-4">
                            <label for="jenis" class="block font-semibold text-black">Jenis Pembangunan</label>
                            <select name="jenis" id="jenis" class="w-full rounded px-3 py-2" required>
                                <option value="">-- Pilih Jenis Pembangunan --</option>
                                <option value="Jalan Raya" {{ $saran->jenis == 'Jalan Raya' ? 'selected' : '' }}>Jalan Raya
                                </option>
                                <option value="Jembatan" {{ $saran->jenis == 'Jembatan' ? 'selected' : '' }}>Jembatan
                                </option>
                                <option value="Fasilitas Umum" {{ $saran->jenis == 'Fasilitas Umum' ? 'selected' : '' }}>
                                    Fasilitas Umum</option>
                                <option value="Saluran Air" {{ $saran->jenis == 'Saluran Air' ? 'selected' : '' }}>Saluran
                                    Air</option>
                                <option value="Lainnya" {{ $saran->jenis == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="lokasi" class="block font-semibold text-black">Lokasi Pembangunan (RT/RW)</label>
                            <input type="text" name="lokasi" value="{{ $saran->lokasi }}"
                                class="w-full rounded px-3 py-2" required>
                        </div>

                        <div class="mb-4">
                            <label for="lokasi_detail" class="block font-semibold text-black">Lokasi Lebih Detail</label>
                            <textarea name="lokasi_detail" rows="3" class="w-full rounded px-3 py-2" required>{{ $saran->lokasi_detail }}</textarea>
                        </div>
                    </div>

                    <!-- Kolom Hijau -->
                    <div class="bg-white p-6 text-black">
                        <div class="mb-4">
                            <label for="deskripsi" class="block font-semibold">Deskripsi (optional)</label>
                            <textarea id="deskripsi" name="deskripsi" rows="10" class="w-full rounded px-3 py-2">{{ $saran->deskripsi }}</textarea>
                        </div>
                    </div>

                    <!-- Kolom Ilustrasi -->
                    <div class="bg-white p-6 flex items-center justify-center">
                        <img src="{{ asset('img/saran-illustration.png') }}" alt="Ilustrasi Saran" class="max-h-65">
                    </div>
                </div>

                <!-- Catatan -->
                <div class="bg-white px-6 py-4 text-sm text-black font-medium">
                    <span class="text-red-500 font-extrabold">Catatan!!!:</span>
                    Untuk saran pembangunan infrastruktur tidak bisa dibangun secara langsung,<br>namun saran yang diberikan
                    pasti akan ditampung terlebih dahulu dalam sistem dan dipilih<br>berdasarkan skala prioritas pembangunan
                    desa dan kondisi keuangan desa.
                </div>

                <!-- Tombol -->
                <div class="bg-white px-6 py-4 flex justify-start gap-4">
                    <a href="{{ route('saran.index') }}"
                        class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-xl">Kembali</a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded-xl">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
