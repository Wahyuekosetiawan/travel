<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Wisata;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PemesananController extends Controller
{
    public function create($wisata_id)
    {
        if (!Session::has('user')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $wisata = Wisata::findOrFail($wisata_id);
        return view('pemesanan.create', compact('wisata'));
    }

    public function store(Request $request)
    {
        if (!Session::has('user')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $request->validate([
            'wisata_id' => 'required|exists:wisata,id',
            'tanggal_pemesanan' => 'required|date|after:today',
            'jumlah_tiket' => 'required|integer|min:1',
            'penginapan_id' => 'nullable|exists:penginapans,id',
        ]);

        $wisata = Wisata::findOrFail($request->wisata_id);
        $total_harga = $wisata->harga_tiket * $request->jumlah_tiket;

        if ($request->penginapan_id) {
            $penginapan = Penginapan::findOrFail($request->penginapan_id);
            $total_harga += $penginapan->harga;
        }

        Pemesanan::create([
            'user_id' => Session::get('user')->id,
            'wisata_id' => $request->wisata_id,
            'penginapan_id' => $request->penginapan_id,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $total_harga,
        ]);

        return redirect('/pemesanan/history')->with('success', 'Pemesanan berhasil dibuat!');
    }

    public function history()
    {
        if (!Session::has('user')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $pemesanan = Pemesanan::where('user_id', Session::get('user')->id)
            ->with(['wisata', 'penginapan'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pemesanan.history', compact('pemesanan'));
    }
}
