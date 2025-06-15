@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen py-1 p-6">
        <div class="max-w-8xl mx-auto bg-white  rounded-lg overflow-hidden sm:px-1 lg:px-1">
            <h2 class="text-2xl font-bold text-black mb-6 mt-4">Data Saran Pembangunanmu {{ Auth::user()->nama ?? 'User' }}</h2>
        </div>
        @if ($saran->isEmpty())
            <div class="bg-white p-6 rounded shadow">
                <p>Belum ada saran pembangunan yang Anda kirimkan.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="table-fixed w-full border-collapse border-2 border-black bg-gray-100 rounded-md">
                    <thead>
                        <tr class="text-center border">
                            <th class="px-4 py-3 font-bold border border-black w-[15%]">Jenis</th>
                            <th class="px-4 py-3 font-bold border border-black w-[10%]">Lokasi RT/RW</th>
                            <th class="px-4 py-3 font-bold border border-black w-[20%]">Lokasi Detail</th>
                            <th class="px-4 py-3 font-bold border border-black w-[25%]">Deskripsi</th>
                            <th class="px-4 py-3 font-bold border border-black w-[9%]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saran as $item)
                            <tr class="border-t">
                                <td class="px-4 py-2 border border-black break-words">{{ $item->jenis }}</td>
                                <td class="px-4 py-2 border border-black break-words">{{ $item->lokasi }}</td>
                                <td class="px-4 py-2 border border-black break-words whitespace-pre-wrap h-[80px] overflow-y-auto">{{ $item->lokasi_detail }}</td>
                                <td class="px-4 py-2 border border-black break-words whitespace-pre-wrap h-[100px] overflow-y-auto">{{ $item->deskripsi }}</td>
                                <td class="px-4 py-2 border border-black">
                                    <a href="{{ route('saran.edit', $item->id) }}"
                                        class="text-blue-600 font-bold hover:underline mr-2">Ubah</a>
                                    <form action="{{ route('saran.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus saran ini?');" class="inline-block">
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
            <a href="{{ route('saran.create') }}"
                class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-8 py-2 rounded">Buat Saran</a>
        </div>
    </div>
@endsection