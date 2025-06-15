<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranPembangunan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis',
        'lokasi',
        'lokasi_detail',
        'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
