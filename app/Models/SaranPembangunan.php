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

    public function up()
    {
        Schema::create('saran_pembangunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('jenis');
            $table->string('lokasi');
            $table->string('lokasi_detail');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

}
