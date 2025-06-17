@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Edit Data User</h2>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $user->nama) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $user->telepon) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', $user->alamat) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="flex space-x-4">
                <a href="{{ route('admin.users.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">← Kembali</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
@endsection
