@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen py-1">
        <div class="max-w-10xl mx-auto bg-white shadow-md rounded-lg overflow-hidden sm:px-1 lg:px-1">
            @if (session('success'))
                <div class="bg-green-100 text-green-500 p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-6">
                <h2 class="text-xl font-bold text-black">Edit Laporan Infrastruktur</h2>
            </div>

            <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-3">
                    <!-- Kolom Merah -->
                    <div class="bg-white p-6 text-black">
                        <div class="mb-4">
                            <label for="tanggal" class="block font-semibold mb-1">Tanggal Kejadian</label>
                            <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $pengaduan->tanggal) }}"
                                class="w-full rounded px-3 py-2" required>
                        </div>
                        <div class="mb-4">
                            <label for="waktu" class="block font-semibold mb-1">Waktu Kejadian</label>
                            <input type="time" id="waktu" name="waktu" value="{{ old('waktu', $pengaduan->waktu) }}"
                                class="w-full rounded px-3 py-2" required>
                        </div>
                        <div class="mb-4">
                            <label for="lokasi" class="block font-semibold mb-1">Lokasi Kejadian</label>
                            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $pengaduan->lokasi) }}"
                                class="w-full rounded px-3 py-2" required>
                        </div>
                        <div class="mb-4">
                            <label for="jenis" class="block font-semibold mb-1">Jenis Infrastruktur</label>
                            <select id="jenis" name="jenis" class="w-full rounded px-3 py-2" required>
                                <option value="">-- Pilih Jenis Infrastruktur --</option>
                                <option value="Jalan Rusak" {{ $pengaduan->jenis == 'Jalan Rusak' ? 'selected' : '' }}>Jalan
                                    Rusak</option>
                                <option value="Jembatan" {{ $pengaduan->jenis == 'Jembatan' ? 'selected' : '' }}>Jembatan
                                </option>
                                <option value="Lampu Jalan" {{ $pengaduan->jenis == 'Lampu Jalan' ? 'selected' : '' }}>Lampu
                                    Jalan</option>
                                <option value="Fasilitas Umum" {{ $pengaduan->jenis == 'Fasilitas Umum' ? 'selected' : '' }}>
                                    Fasilitas Umum</option>
                                <option value="Saluran Air" {{ $pengaduan->jenis == 'Saluran Air' ? 'selected' : '' }}>Saluran
                                    Air</option>
                                <option value="Lainnya" {{ $pengaduan->jenis == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Kolom Hijau -->
                    <div class="bg-white p-6 text-black">
                        <div class="mb-4">
                            <label for="deskripsi" class="block font-semibold mb-1">Deskripsi Pengaduan (optional)</label>
                            <textarea id="deskripsi" name="deskripsi" rows="6"
                                class="w-full rounded px-3 py-2">{{ old('deskripsi', $pengaduan->deskripsi) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block font-semibold mb-1">Bukti Gambar (tidak dapat diubah)</label>
                            <div class="space-y-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    @php $gambar = "gambar_$i"; @endphp
                                    @if ($pengaduan->$gambar)
                                        <a href="{{ asset('storage/' . $pengaduan->$gambar) }}" target="_blank"
                                            class="text-blue-600 underline block">Lihat Gambar {{ $i }}</a>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>

                    <!-- Ilustrasi Putih -->
                    <div class="bg-white p-6 flex items-center justify-center">
                        <img src="{{ asset('img/form-illustration.png') }}" alt="Ilustrasi Form" class="max-h-70">
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="bg-white px-6 py-4 flex justify-left space-x-6">
                    <a href="{{ route('pengaduan.index') }}"
                        class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-xl">Batal</a>
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-6 rounded-xl">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection