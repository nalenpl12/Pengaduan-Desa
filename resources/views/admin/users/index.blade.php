@extends('layouts.admin')

@section('content')
    <div class="bg-white min-h-screen py-1 p-6">
        <div class="max-w-10xl mx-auto bg-white rounded-lg overflow-hidden sm:px-1 lg:px-1">
            <h2 class="text-2xl font-bold text-black mb-6 mt-4
            ">Data Pengguna Website</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-black text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-black px-3 py-2">Nama</th>
                        <th class="border border-black px-3 py-2">Email</th>
                        <th class="border border-black px-3 py-2">Telepon</th>
                        <th class="border border-black px-3 py-2">Alamat</th>
                        <th class="border border-black px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="border px-3 py-2">{{ $user->nama }}</td>
                            <td class="border px-3 py-2">{{ $user->email }}</td>
                            <td class="border px-3 py-2">{{ $user->telepon }}</td>
                            <td class="border px-3 py-2">{{ $user->alamat }}</td>
                            <td class="border px-3 py-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="text-blue-600 hover:underline font-bold">Ubah</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus user ini?');" class="inline">
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
