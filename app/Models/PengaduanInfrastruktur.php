<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaduanInfrastruktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal',
        'waktu',
        'lokasi',
        'jenis',
        'deskripsi',
        'gambar_1',
        'gambar_2',
        'gambar_3',
        'gambar_4',
        'gambar_5',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
