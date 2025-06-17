<?php

namespace App\Http\Controllers;

use App\Models\SaranPembangunan;
use Illuminate\Http\Request;

class AdminSaranController extends Controller
{
    public function index()
    {
        $saran = SaranPembangunan::with('user')->latest()->get();
        return view('admin.saran.index', compact('saran'));
    }

    public function destroy($id)
    {
        $saran = SaranPembangunan::findOrFail($id);
        $saran->delete();

        return redirect()->back()->with('success', 'Data saran berhasil dihapus.');
    }

}
