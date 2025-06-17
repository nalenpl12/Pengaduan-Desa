@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen py-10">
        <div class="max-w-6xl mx-auto px-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Dashboard Admin</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-100 p-6 rounded shadow">
                    <h2 class="text-xl font-semibold mb-2">Total Pengaduan</h2>
                    <p class="text-2xl font-bold text-blue-800">123</p>
                </div>
                <div class="bg-yellow-100 p-6 rounded shadow">
                    <h2 class="text-xl font-semibold mb-2">Saran Masuk</h2>
                    <p class="text-2xl font-bold text-yellow-800">45</p>
                </div>
                <div class="bg-green-100 p-6 rounded shadow">
                    <h2 class="text-xl font-semibold mb-2">User Terdaftar</h2>
                    <p class="text-2xl font-bold text-green-800">89</p>
                </div>
            </div>
        </div>
    </div>
@endsection
