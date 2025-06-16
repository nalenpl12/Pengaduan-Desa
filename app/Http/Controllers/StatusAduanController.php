<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusAduanController extends Controller
{
    public function index()
    {
        $pengaduan = Auth::user()->pengaduan; // Memanggil relasi dari User model

        return view('status.index', compact('pengaduan'));
    }
}
