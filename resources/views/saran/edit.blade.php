<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Saran Pembangunan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('saran.update', $saran->id) }}" method="POST" class="bg-white p-6 rounded shadow">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <select name="jenis" id="jenis" class="w-full border rounded px-3 py-2" required>
                        <option value="{{ $saran->jenis }}" selected disabled>-- {{ $saran->jenis }} (terpilih) --
                        </option>
                        <option value="Jalan Raya">Jalan Raya</option>
                        <option value="Jembatan">Jembatan</option>
                        <option value="Fasilitas Umum">Fasilitas Umum</option>
                        <option value="Saluran Air">Saluran Air</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="lokasi" class="block font-medium">Lokasi (RT/RW)</label>
                    <input type="text" name="lokasi" value="{{ $saran->lokasi }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="lokasi_detail" class="block font-medium">Detail Lokasi</label>
                    <input type="text" name="lokasi_detail" value="{{ $saran->lokasi_detail }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block font-medium">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border rounded px-3 py-2"
                        rows="4">{{ $saran->deskripsi }}</textarea>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan Perubahan
                </button>

                <a href="{{ route('saran.index') }}" class="ml-4 text-gray-600 underline">← Kembali</a>
            </form>
        </div>
    </div>
</x-app-layout>