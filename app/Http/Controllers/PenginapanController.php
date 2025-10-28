<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::has('user') || !Session::get('user')->isAdmin()) {
            return redirect('/')->with('error', 'Akses ditolak!');
        }

        $penginapan = Penginapan::with('wisata')->get();
        return view('penginapan.index', compact('penginapan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::has('user') || !Session::get('user')->isAdmin()) {
            return redirect('/')->with('error', 'Akses ditolak!');
        }

        $wisata = Wisata::all();
        return view('penginapan.create', compact('wisata'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Session::has('user') || !Session::get('user')->isAdmin()) {
            return redirect('/')->with('error', 'Akses ditolak!');
        }

        $request->validate([
            'wisata_id' => 'required|exists:wisata,id',
            'nama_penginapan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_per_malam' => 'required|numeric|min:0',
            'kapasitas' => 'required|integer|min:1',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('penginapan', 'public');
        }

        Penginapan::create($data);

        return redirect('/penginapan')->with('success', 'Penginapan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penginapan = Penginapan::with('wisata')->findOrFail($id);
        return view('penginapan.show', compact('penginapan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Session::has('user') || !Session::get('user')->isAdmin()) {
            return redirect('/')->with('error', 'Akses ditolak!');
        }

        $penginapan = Penginapan::findOrFail($id);
        $wisata = Wisata::all();
        return view('penginapan.edit', compact('penginapan', 'wisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Session::has('user') || !Session::get('user')->isAdmin()) {
            return redirect('/')->with('error', 'Akses ditolak!');
        }

        $request->validate([
            'wisata_id' => 'required|exists:wisata,id',
            'nama_penginapan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_per_malam' => 'required|numeric|min:0',
            'kapasitas' => 'required|integer|min:1',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $penginapan = Penginapan::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('penginapan', 'public');
        }

        $penginapan->update($data);

        return redirect('/penginapan')->with('success', 'Penginapan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Session::has('user') || !Session::get('user')->isAdmin()) {
            return redirect('/')->with('error', 'Akses ditolak!');
        }

        $penginapan = Penginapan::findOrFail($id);
        $penginapan->delete();

        return redirect('/penginapan')->with('success', 'Penginapan berhasil dihapus!');
    }
}
