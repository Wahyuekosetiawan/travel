<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Wisata;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!Session::has('user') || !Session::get('user')->isAdmin()) {
            return redirect('/')->with('error', 'Akses ditolak!');
        }

        $totalWisata = Wisata::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalPemesanan = Pemesanan::count();
        $totalPenginapan = Penginapan::count();

        // ✅ Tambahkan query untuk ambil pesanan terbaru
        $recentPemesanan = Pemesanan::with(['user', 'wisata'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalWisata',
            'totalUsers',
            'totalPemesanan',
            'totalPenginapan',
            'recentPemesanan' // ✅ kirim ke view
        ));
    }
}
