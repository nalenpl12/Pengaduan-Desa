<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Pengaduan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data"
                class="bg-white p-6 rounded shadow">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="jenis" class="block font-medium">Jenis Infrastruktur</label>
                    <select name="jenis" id="jenis" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="Jalan Rusak" {{ $pengaduan->jenis == 'Jalan Rusak' ? 'selected' : '' }}>Jalan Rusak
                        </option>
                        <option value="Lampu Mati" {{ $pengaduan->jenis == 'Lampu Mati' ? 'selected' : '' }}>Lampu Mati
                        </option>
                        <option value="Saluran Air" {{ $pengaduan->jenis == 'Saluran Air' ? 'selected' : '' }}>Saluran Air
                        </option>
                        <option value="Jembatan" {{ $pengaduan->jenis == 'Jembatan' ? 'selected' : '' }}>Jembatan</option>
                        <option value="Fasilitas Umum" {{ $pengaduan->jenis == 'Fasilitas Umum' ? 'selected' : '' }}>Fasilitas Umum</option>
                        <option value="Lainnya" {{ $pengaduan->jenis == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="lokasi" class="block font-medium">Lokasi (RT/RW)</label>
                    <input type="text" name="lokasi" value="{{ $pengaduan->lokasi }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="tanggal" class="block font-medium">Tanggal Kejadian</label>
                    <input type="date" name="tanggal" value="{{ $pengaduan->tanggal }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="waktu" class="block font-medium">Waktu Kejadian</label>
                    <input type="time" name="waktu" value="{{ $pengaduan->waktu }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block font-medium">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border rounded px-3 py-2"
                        rows="4">{{ $pengaduan->deskripsi }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block font-medium">Upload Gambar Baru (opsional)</label>
                    <input type="file" name="gambar[]" multiple class="w-full border rounded px-3 py-2"
                        accept="image/*">
                    <small class="text-sm text-gray-500">Kosongkan jika tidak ingin mengganti gambar</small>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan Perubahan
                </button>

                <a href="{{ route('pengaduan.index') }}" class="ml-4 text-gray-600 underline">← Kembali</a>
            </form>
        </div>
    </div>
</x-app-layout>