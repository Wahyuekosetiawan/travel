<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $fillable = [
        'user_id',
        'wisata_id',
        'tanggal_pemesanan',
        'jumlah_tiket',
        'total_harga',
    ];

    // ✅ Tambahkan ini
    protected $casts = [
        'tanggal_pemesanan' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}
