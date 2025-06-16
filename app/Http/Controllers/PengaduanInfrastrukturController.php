<?php

namespace App\Http\Controllers;

use App\Models\PengaduanInfrastruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanInfrastrukturController extends Controller
{
    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|string|max:255',
            'jenis' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'gambar.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['tanggal', 'waktu', 'lokasi', 'jenis', 'deskripsi']);
        $data['user_id'] = Auth::id();
        $data['status'] = 'Diajukan';

        // Upload gambar-gambar jika ada
        for ($i = 0; $i < 5; $i++) {
            if ($request->hasFile("gambar.$i")) {
                $file = $request->file("gambar.$i");
                $data["gambar_" . ($i + 1)] = $file->store('pengaduan', 'public');
            }
        }

        PengaduanInfrastruktur::create($data);

        return redirect()->route('pengaduan.create')->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function index()
    {
        $pengaduan = \App\Models\PengaduanInfrastruktur::where('user_id', auth()->id())->latest()->get();

        return view('pengaduan.index', compact('pengaduan'));
    }

    public function destroy($id)
    {
        $pengaduan = \App\Models\PengaduanInfrastruktur::where('user_id', auth()->id())->findOrFail($id);

        // Hapus gambar jika ada
        for ($i = 1; $i <= 5; $i++) {
            $field = "gambar_$i";
            if ($pengaduan->$field) {
                \Storage::disk('public')->delete($pengaduan->$field);
            }
        }

        $pengaduan->delete();

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }

    public function edit($id)
    {
        $pengaduan = \App\Models\PengaduanInfrastruktur::where('user_id', auth()->id())->findOrFail($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $pengaduan = \App\Models\PengaduanInfrastruktur::where('user_id', auth()->id())->findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|string|max:255',
            'jenis' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'gambar.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['tanggal', 'waktu', 'lokasi', 'jenis', 'deskripsi']);

        // upload gambar baru jika ada
        for ($i = 0; $i < 5; $i++) {
            if ($request->hasFile("gambar.$i")) {
                if ($pengaduan["gambar_" . ($i + 1)]) {
                    \Storage::disk('public')->delete($pengaduan["gambar_" . ($i + 1)]);
                }
                $file = $request->file("gambar.$i");
                $data["gambar_" . ($i + 1)] = $file->store('pengaduan', 'public');
            }
        }

        $pengaduan->update($data);

        return redirect()->route('pengaduan.index')->with('success', 'Data pengaduan berhasil diperbarui.');
    }

    public function status()
    {
        $pengaduan = PengaduanInfrastruktur::where('user_id', Auth::id())->latest()->get();
        return view('pengaduan.status', compact('pengaduan'));
    }


}