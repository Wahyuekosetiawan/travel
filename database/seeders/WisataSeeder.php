<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wisata::create([
            'nama_wisata' => 'Borobudur',
            'lokasi' => 'Magelang, Jawa Tengah',
            'deskripsi' => 'Candi Borobudur adalah sebuah candi Buddha yang terletak di Magelang, Jawa Tengah, Indonesia. Candi ini merupakan salah satu situs warisan dunia UNESCO dan merupakan candi Buddha terbesar di dunia.',
            'harga_tiket' => 50000,
            'gambar' => null,
        ]);

        Wisata::create([
            'nama_wisata' => 'Gunung Bromo',
            'lokasi' => 'Probolinggo, Jawa Timur',
            'deskripsi' => 'Gunung Bromo adalah gunung berapi aktif yang terletak di Taman Nasional Bromo Tengger Semeru, Jawa Timur. Dikenal dengan pemandangan matahari terbit yang spektakuler.',
            'harga_tiket' => 35000,
            'gambar' => null,
        ]);

        Wisata::create([
            'nama_wisata' => 'Pantai Kuta',
            'lokasi' => 'Badung, Bali',
            'deskripsi' => 'Pantai Kuta adalah pantai terkenal di Bali yang menawarkan pasir putih, ombak besar untuk berselancar, dan kehidupan malam yang vibrant.',
            'harga_tiket' => 0,
            'gambar' => null,
        ]);
    }
}
