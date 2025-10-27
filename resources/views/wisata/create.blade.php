@extends('layouts.app')

@section('title', 'Tambah Wisata')

@section('content')
    <h1 class="mb-4">Tambah Wisata</h1>
    <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_wisata" class="form-label">Nama Wisata</label>
            <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="harga_tiket" class="form-label">Harga Tiket</label>
            <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
