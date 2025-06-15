@extends('layouts.app')
@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profil Saya
            </h2>
        </x-slot>

        <div class="py-6">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                @if (session('status') === 'profil-updated')
                    <div class="mb-4 text-green-600 font-medium">
                        Data profil berhasil diperbarui.
                    </div>
                @endif

                <div class="bg-white shadow p-6 rounded-lg">
                    <!-- Avatar -->
                    <div class="flex items-center mb-6">
                        <div
                            class="w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center text-xl font-bold">
                            {{ strtoupper(substr($user->nama, 0, 1)) }}
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-lg">{{ $user->nama }}</p>
                            <p class="text-sm text-gray-600">{{ $user->role ?? 'user' }}</p>
                        </div>
                    </div>

                    <!-- Info Data -->
                    <table class="table-auto text-sm w-full">
                        <tr>
                            <td class="font-medium w-40">Nama</td>
                            <td>{{ $user->nama }}</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Telepon</td>
                            <td>{{ $user->telepon ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Alamat</td>
                            <td>{{ $user->alamat ?? '-' }}</td>
                        </tr>
                    </table>

                    <!-- Tombol Ubah -->
                    <div class="mt-6">
                        <a href="{{ route('profile.edit') }}"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            ✏️ Ubah Profil
                        </a>
                        <a href="{{ route('dashboard') }}" class="ml-4 text-gray-600 underline">← Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection