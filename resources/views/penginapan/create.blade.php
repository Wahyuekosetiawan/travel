@extends('layouts.app')

@section('title', 'Tambah Penginapan')

@section('content')
    <h1 class="mb-4">Tambah Penginapan</h1>
    <form method="POST" action="{{ route('penginapan.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="wisata_id" class="form-label">Wisata</label>
            <select class="form-control" id="wisata_id" name="wisata_id" required>
                <option value="">Pilih Wisata</option>
                @foreach($wisata as $w)
                    <option value="{{ $w->id }}">{{ $w->nama_wisata }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_penginapan" class="form-label">Nama Penginapan</label>
            <input type="text" class="form-control" id="nama_penginapan" name="nama_penginapan" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="harga_per_malam" class="form-label">Harga per Malam</label>
            <input type="number" class="form-control" id="harga_per_malam" name="harga_per_malam" min="0" required>
        </div>
        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" id="kapasitas" name="kapasitas" min="1" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('penginapan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
