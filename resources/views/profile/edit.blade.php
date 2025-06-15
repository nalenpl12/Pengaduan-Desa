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
                        {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
                    </div>
                    <div class="ml-4">
                        <p class="font-semibold text-lg">{{ Auth::user()->nama }}</p>
                        <p class="text-sm text-gray-600">{{ Auth::user()->role ?? 'user' }}</p>
                    </div>
                </div>

                <!-- Form Edit Profil -->
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="block font-medium">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', Auth::user()->nama) }}" required
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Nomor Telepon</label>
                        <input type="text" name="telepon" value="{{ old('telepon', Auth::user()->telepon) }}"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Alamat</label>
                        <textarea name="alamat" class="w-full border rounded px-3 py-2"
                            rows="3">{{ old('alamat', Auth::user()->alamat) }}</textarea>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('dashboard') }}" class="text-gray-600 underline">← Kembali ke Dashboard</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>