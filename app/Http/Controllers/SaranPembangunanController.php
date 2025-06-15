<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaranPembangunan;
use Illuminate\Support\Facades\Auth;

class SaranPembangunanController extends Controller
{
    public function create()
    {
        return view('saran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'lokasi_detail' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        SaranPembangunan::create([
            'user_id' => Auth::id(),
            'jenis' => $request->jenis,
            'lokasi' => $request->lokasi,
            'lokasi_detail' => $request->lokasi_detail,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('saran.create')->with('success', 'Saran berhasil dikirim.');
    }

    public function index()
    {
        $saran = \App\Models\SaranPembangunan::where('user_id', auth()->id())->latest()->get();

        return view('saran.index', compact('saran'));
    }

    public function edit($id)
    {
        $saran = \App\Models\SaranPembangunan::where('user_id', auth()->id())->findOrFail($id);
        return view('saran.edit', compact('saran'));
    }

    public function update(Request $request, $id)
    {
        $saran = \App\Models\SaranPembangunan::where('user_id', auth()->id())->findOrFail($id);

        $request->validate([
            'jenis' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'lokasi_detail' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $saran->update($request->only(['jenis', 'lokasi', 'lokasi_detail', 'deskripsi']));

        return redirect()->route('saran.index')->with('success', 'Data saran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $saran = \App\Models\SaranPembangunan::where('user_id', auth()->id())->findOrFail($id);
        $saran->delete();

        return redirect()->route('saran.index')->with('success', 'Saran berhasil dihapus.');
    }

}
