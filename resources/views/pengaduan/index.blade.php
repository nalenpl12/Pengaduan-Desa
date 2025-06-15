@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen py-1 p-6">
        <div class="max-w-10xl mx-auto bg-white rounded-lg overflow-hidden sm:px-1 lg:px-1">
            <h2 class="text-2xl font-bold text-black mb-6 mt-4">Data Pengaduanmu {{ Auth::user()->nama ?? 'User' }}</h2>
        </div>
        @if ($pengaduan->isEmpty())
            <div class="bg-white p-6 rounded shadow">
                <p>Belum ada pengaduan yang Anda kirimkan.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="table-fixed w-full border-collapse border-2 border-black bg-gray-100 rounded-md">
                    <thead>
                        <tr class="text-center border">
                            <th class="px-4 py-3 font-bold border border-black w-[10%]">Tanggal</th>
                            <th class="px-4 py-3 font-bold border border-black w-[10%]">Waktu</th>
                            <th class="px-4 py-3 font-bold border border-black w-[20%]">Lokasi</th>
                            <th class="px-4 py-3 font-bold border border-black w-[15%]">Jenis</th>
                            <th class="px-4 py-3 font-bold border border-black w-[25%]">Deskripsi</th>
                            <th class="px-4 py-3 font-bold border border-black w-[9%]">Bukti</th>
                            <th class="px-4 py-3 font-bold border border-black w-[12%]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $item)
                            <tr class="border-t">
                                <td class="px-4 py-2 border border-black break-words">{{ $item->tanggal }}</td>
                                <td class="px-4 py-2 border border-black break-words">{{ $item->waktu }}</td>
                                <td class="px-4 py-2 border border-black break-words">{{ $item->lokasi }}</td>
                                <td class="px-4 py-2 border border-black break-words">{{ $item->jenis }}</td>
                                <td class="px-4 py-2 border border-black break-words">{{ $item->deskripsi }}</td>
                                <td class="px-4 py-2 border border-black break-words">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @php $gambar = "gambar_$i"; @endphp
                                        @if ($item->$gambar)
                                            <a href="#" onclick="showImageModal('{{ asset('storage/' . $item->$gambar) }}'); return false;"
                                                class="text-blue-600 underline mr-2">
                                                Gambar {{ $i }}
                                            </a><br>
                                        @endif
                                    @endfor
                                </td>
                                <td class="px-4 py-2 border border-black">
                                    <a href="{{ route('pengaduan.edit', $item->id) }}"
                                        class="text-blue-600 font-bold hover:underline mr-2">Ubah</a>
                                    <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 font-bold hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <div class="mt-8 flex flex-wrap gap-4 p-6">
            <a href="{{ route('dashboard') }}"
                class="bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-2 rounded">Kembali</a>
            <a href="{{ route('pengaduan.create') }}"
                class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-8 py-2 rounded">Buat Aduan</a>
        </div>
    </div>
    <div class="max-w-10xl mx-auto px-4 py-8">
        <!-- Modal Gambar -->
        <div id="imageModal" class="fixed z-50 inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden">
            <div class="bg-white rounded p-4 max-w-xl w-full relative">
                <button onclick="closeImageModal()"
                    class="absolute top-2 right-2 text-white bg-red-600 hover:bg-red-700 font-bold text-3xl w-10 h-10 rounded-full flex items-center justify-center shadow-lg">
                    &times;
                </button>
                <img id="modalImage" src="" alt="Gambar Pengaduan" class="w-full max-h-[80vh] object-contain rounded">
            </div>
        </div>
        <script>
            function showImageModal(src) {
                document.getElementById('modalImage').src = src;
                document.getElementById('imageModal').classList.remove('hidden');
            }
            function closeImageModal() {
                document.getElementById('imageModal').classList.add('hidden');
                document.getElementById('modalImage').src = '';
            }
        </script>
    </div>
@endsection