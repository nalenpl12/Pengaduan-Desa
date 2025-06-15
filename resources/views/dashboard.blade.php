@extends('layouts.app')

@section('content')
    <div class="bg-cover bg-no-repeat bg-bottom min-h-screen py-6 px-6"
        style="background-image: url('{{ asset('img/bg-dashboard.png') }}')">
        {{-- konten dashboard --}}
        <div class="max-w-7xl mx-auto bg-transparent text-blue-800">
            <!-- <h2 class="text-lg sm:text-xl font-semibold mb-5">Selamat datang {{ Auth::user()->nama ?? 'User' }}</h2> -->

            <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight mb-4">
                Bersama Membangun Desa: Sampaikan Aspirasi,<br class="hidden sm:block">
                Awasi Pembangunan, Wujudkan Perubahan.
            </h1>

            <p class="text-xl sm:text-lg mb-10">
                Suara Anda, Masa Depan Desa. Desa Pekarungan kini hadir dengan platform khusus
                untuk mewujudkan <br> pembangunan yang lebih baik, bersama masyarakat.
            </p>

            <div class="w-60 space-y-4">
                <a href="{{ route('pengaduan.create') }}"
                    class="block w-full text-center bg-blue-600 hover:bg-blue-800 text-white font-bold px-6 py-2 rounded-2xl shadow">
                    Laporkan Sekarang
                </a>
                <a href="{{ route('saran.create') }}"
                    class="block w-full text-center bg-blue-600 hover:bg-blue-800 text-white font-bold px-6 py-2 rounded-2xl shadow">
                    Saran Infrastruktur
                </a>
            </div>
        </div>
    </div>
@endsection