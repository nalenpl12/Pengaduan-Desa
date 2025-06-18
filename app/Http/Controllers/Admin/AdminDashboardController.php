<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengaduanInfrastruktur;
use App\Models\SaranPembangunan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $pengaduan = PengaduanInfrastruktur::selectRaw('jenis, COUNT(*) as total')
            ->groupBy('jenis')
            ->pluck('total', 'jenis');

        $saran = SaranPembangunan::selectRaw('jenis, COUNT(*) as total')
            ->groupBy('jenis')
            ->pluck('total', 'jenis');

        return view('admin.dashboard', compact('pengaduan', 'saran'));
    }
}
