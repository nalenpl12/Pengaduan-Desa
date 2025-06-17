<?php

namespace App\Http\Controllers;

use App\Models\PengaduanInfrastruktur;
use Illuminate\Http\Request;

class AdminPengaduanController extends Controller
{
    // Menampilkan semua data pengaduan
    public function index()
    {
        $pengaduan = PengaduanInfrastruktur::with('user')->latest()->get();
        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    // Mengubah status pengaduan
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diajukan,Diproses,Selesai',
        ]);

        $pengaduan = PengaduanInfrastruktur::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengaduan = PengaduanInfrastruktur::findOrFail($id);

        // Hapus file gambar jika ada
        for ($i = 1; $i <= 5; $i++) {
            $gambar = "gambar_$i";
            if ($pengaduan->$gambar) {
                \Storage::disk('public')->delete($pengaduan->$gambar);
            }
        }

        $pengaduan->delete();
        return redirect()->back()->with('success', 'Data pengaduan berhasil dihapus.');
    }

}
