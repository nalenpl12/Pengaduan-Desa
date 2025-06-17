@extends('layouts.admin')

@section('content')
    <div class="bg-white min-h-screen py-1 p-6">
        <div class="max-w-10xl mx-auto bg-white rounded-lg overflow-hidden sm:px-1 lg:px-1">
            <h2 class="text-2xl font-bold text-black mb-6 mt-4">Data Saran Pembangunan Infrastruktur</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-black text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-black px-3 py-2">Nama User</th>
                        <th class="border border-black px-3 py-2">Jenis</th>
                        <th class="border border-black px-3 py-2">Lokasi RT/RW</th>
                        <th class="border border-black px-3 py-2">Detail Lokasi</th>
                        <th class="border border-black px-3 py-2">Deskripsi</th>
                        <th class="border border-black px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saran as $item)
                        <tr>
                            <td class="border px-3 py-2">{{ $item->user->nama }}</td>
                            <td class="border px-3 py-2">{{ $item->jenis }}</td>
                            <td class="border px-3 py-2">{{ $item->lokasi }}</td>
                            <td class="border px-3 py-2">{{ $item->lokasi_detail }}</td>
                            <td class="border px-3 py-2 break-words max-w-[200px]">{{ $item->deskripsi }}</td>
                            <td class="border px-3 py-2">
                                <form action="{{ route('admin.saran.destroy', $item->id) }}" method="POST"
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
@endsection
