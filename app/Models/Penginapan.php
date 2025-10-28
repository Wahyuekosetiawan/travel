<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'wisata_id',
        'nama_penginapan',
        'deskripsi',
        'harga_per_malam',
        'kapasitas',
        'gambar',
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
