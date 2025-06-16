@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen py-6 px-8 flex justify-between">
        <!-- Kiri: Info User -->
        <div class="w-full md:w-2/3">
            <div class="flex items-center mb-6">
                <div
                    class="w-20 h-20 rounded-full border-2 border-black bg-gray-300 text-3xl font-bold text-black flex items-center justify-center mr-4">
                    {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
                </div>
                <h2 class="text-2xl font-bold">{{ Auth::user()->nama ?? 'User' }}</h2>
            </div>

            <div class="mb-6">
                <h3 class="font-semibold text-lg mb-2">Informasi Pengguna</h3>
                <p><span class="font-semibold">Alamat Email</span> : {{ Auth::user()->email }}</p>
                <p><span class="font-semibold">Nomor Telepon</span> : {{ Auth::user()->telepon ?? 'Belum diisi' }}</p>
                <p><span class="font-semibold">Alamat Rumah</span> : {{ Auth::user()->alamat ?? 'Belum diisi' }}</p>
            </div>

            <a href="{{ route('profile.edit') }}"
                class="bg-blue-600 text-white px-6 py-2 rounded-xl mb-3 inline-block hover:bg-blue-800">
                Ubah Profil
            </a>

            <div class="mt-6">
                <h3 class="font-semibold text-lg mb-2">Aduan dan Saran</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('pengaduan.index') }}"
                        class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-800">Daftar Aduan</a>
                    <a href="{{ route('saran.index') }}"
                        class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-800">Daftar Saran</a>
                    <a href="{{ route('status.index') }}"
                        class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-800">Status Aduan</a>
                </div>
            </div>

            <div class="mt-10">
                <h3 class="font-semibold text-lg mb-2">Akun</h3>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white font-bold px-6 py-2 rounded-xl hover:bg-red-800">
                        Keluar dari Akun
                    </button>
                </form>
            </div>
        </div>

        <!-- Kanan: Ilustrasi -->
        <div class="bg-white p-6 flex items-center justify-center">
            <img src="{{ asset('img/profile-illustration.png') }}" alt="Ilustrasi Profil" class="max-w-full h-auto">
        </div>
    </div>
@endsection
