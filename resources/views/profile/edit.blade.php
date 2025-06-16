@extends('layouts.app')

@section('content')
<div class="bg-white min-h-screen py-4 px-6">
    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-black mb-8">Ubah Informasi Pengguna</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Kolom kiri -->
                <div>
                    <div class="mb-4">
                        <label for="nama" class="block font-semibold mb-1">Nama Baru</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $user->nama) }}"
                            class="w-full border rounded px-4 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block font-semibold mb-1">Alamat Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            class="w-full border rounded px-4 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="telepon" class="block font-semibold mb-1">Nomor Telepon</label>
                        <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $user->telepon) }}"
                            class="w-full border rounded px-4 py-2">
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="block font-semibold mb-1">Alamat Rumah</label>
                        <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $user->alamat) }}"
                            class="w-full border rounded px-4 py-2">
                    </div>
                </div>

                <!-- Kolom kanan -->
                <div>
                    <div class="mb-4">
                        <label for="current_password" class="block font-semibold mb-1">Password Lama</label>
                        <input type="password" name="current_password" id="current_password"
                            class="w-full border rounded px-4 py-2">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block font-semibold mb-1">Password Baru</label>
                        <input type="password" name="password" id="password"
                            class="w-full border rounded px-4 py-2">
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block font-semibold mb-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full border rounded px-4 py-2">
                    </div>

                    <div class="text-sm text-red-600 mt-2">
                        <strong>Catatan!!!</strong> <div class="text-black">Pastikan anda mengingat password yang sudah dibuat dan jika mengalami kendala silahkan hubungi admin<a href="https://wa.me/6289526424405" class="text-blue-600 font-medium hover:underline"> Klik disini.</a></div>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex gap-4">
                <a href="{{ route('profile.show') }}"
                    class="bg-red-600 text-white px-6 py-2 rounded-xl hover:bg-red-800 font-semibold">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-800 font-semibold">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
