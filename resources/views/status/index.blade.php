@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen py-1 p-6">
        <div class="max-w-10xl mx-auto bg-white rounded-lg overflow-hidden sm:px-1 lg:px-1">
            <h2 class="text-2xl font-bold text-black mb-6 mt-4">Status Pengaduanmu {{ Auth::user()->nama ?? 'User' }}</h2>
        </div>
        @if ($pengaduan->isEmpty())
            <div class="bg-white p-6 rounded shadow">
                <p>Belum ada pengaduan yang Anda kirimkan.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="table-fixed w-full border-collapse border border-gray-400 bg-white rounded-md">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="w-[10%] px-4 py-2 border">Tanggal</th>
                            <th class="w-[10%] px-4 py-2 border">Waktu</th>
                            <th class="w-[20%] px-4 py-2 border">Lokasi</th>
                            <th class="w-[15%] px-4 py-2 border">Jenis</th>
                            <th class="w-[25%] px-4 py-2 border">Deskripsi</th>
                            <th class="w-[15%] px-4 py-2 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $item)
                            <tr class="border-t ">
                                <td class="px-4 py-2 border text-center">{{ $item->tanggal }}</td>
                                <td class="px-4 py-2 border text-center">{{ $item->waktu }}</td>
                                <td class="px-4 py-2 border break-words">{{ $item->lokasi }}</td>
                                <td class="px-4 py-2 border text-center">{{ $item->jenis }}</td>
                                <td class="px-4 py-2 border break-words">{{ $item->deskripsi }}</td>
                                <td class="px-4 py-2 border text-center">
                                    {{-- Status Pengaduan --}}
                                    @if ($item->status == 'Diajukan')
                                        <span
                                            class="bg-yellow-400 text-black px-3 py-1 rounded-full text-sm font-medium">{{ $item->status }}</span>
                                    @elseif ($item->status == 'Diproses')
                                        <span
                                            class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">{{ $item->status }}</span>
                                    @elseif ($item->status == 'Selesai')
                                        <span
                                            class="bg-green-200 text-green-800 px-3 py-1 rounded-full text-sm font-medium">{{ $item->status }}</span>
                                    @else
                                        <span class="text-gray-600">{{ $item->status }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <div class="mt-8 flex flex-wrap gap-4 p-6">
            <a href="{{ route('dashboard') }}"
                class="inline-block bg-red-600 hover:bg-red-800 text-white font-bold px-6 py-2 rounded-xl shadow">
                Kembali
            </a>
            <a href="{{ route('pengaduan.create') }}"
                class="inline-block bg-blue-600 hover:bg-blue-800 text-white font-bold px-6 py-2 rounded-xl shadow">
                Buat Pengaduan Baru
            </a>
        </div>
    </div>
@endsection
