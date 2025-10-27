<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';

    protected $fillable = [
        'nama_wisata',
        'lokasi',
        'deskripsi',
        'harga_tiket',
        'gambar',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
