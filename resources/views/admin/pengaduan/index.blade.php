@extends('layouts.admin')

@section('content')
    <div class="bg-white min-h-screen py-1 p-6">
        <div class="max-w-10xl mx-auto bg-white rounded-lg overflow-hidden sm:px-1 lg:px-1">
            <h2 class="text-2xl font-bold text-black mb-6 mt-4">Data Pengaduan Masyarakat</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-black text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-black px-3 py-2">Nama User</th>
                        <th class="border border-black px-3 py-2">Tanggal</th>
                        <th class="border border-black px-3 py-2">Waktu</th>
                        <th class="border border-black px-3 py-2">Lokasi</th>
                        <th class="border border-black px-3 py-2">Jenis</th>
                        <th class="border border-black px-3 py-2">Deskripsi</th>
                        <th class="border border-black px-3 py-2">Bukti</th>
                        <th class="border border-black px-3 py-2">Status</th>
                        <th class="border border-black px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $item)
                        <tr>
                            <td class="border px-3 py-2">{{ $item->user->nama }}</td>
                            <td class="border px-3 py-2">{{ $item->tanggal }}</td>
                            <td class="border px-3 py-2">{{ $item->waktu }}</td>
                            <td class="border px-3 py-2 break-words max-w-[180px]">{{ $item->lokasi }}</td>
                            <td class="border px-3 py-2">{{ $item->jenis }}</td>
                            <td class="border px-3 py-2 break-words max-w-[180px]">{{ $item->deskripsi }}</td>
                            <td class="border px-3 py-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    @php $gambar = "gambar_$i"; @endphp
                                    @if ($item->$gambar)
                                        <a href="#"
                                            onclick="showImageModal('{{ asset('storage/' . $item->$gambar) }}'); return false;"
                                            class="text-blue-600 underline mr-2">
                                            Gambar {{ $i }}
                                        </a><br>
                                    @endif
                                @endfor
                            </td>
                            <td class="border px-3 py-2">
                                <form method="POST" action="{{ route('admin.pengaduan.updateStatus', $item->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="px-8 py-1 border rounded text-sm"
                                        onchange="this.form.submit()">
                                        <option value="Diajukan" {{ $item->status === 'Diajukan' ? 'selected' : '' }}>
                                            Diajukan</option>
                                        <option value="Diproses" {{ $item->status === 'Diproses' ? 'selected' : '' }}>
                                            Diproses</option>
                                        <option value="Selesai" {{ $item->status === 'Selesai' ? 'selected' : '' }}>
                                            Selesai
                                        </option>
                                    </select>
                                </form>
                            </td>
                            <td class="border px-3 py-2">
                                <form action="{{ route('admin.pengaduan.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-bold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-8 flex flex-wrap gap-4 p-6">
            <a href="{{ route('admin.dashboard') }}"
                class="bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-2 rounded-xl">Dashboard</a>
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
                <img id="modalImage" src="" alt="Gambar Pengaduan"
                    class="w-full max-h-[80vh] object-contain rounded">
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
