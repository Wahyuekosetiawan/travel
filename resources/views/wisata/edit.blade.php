@extends('layouts.app')

@section('title', 'Edit Wisata')

@section('content')
    <h1 class="mb-4">Edit Wisata</h1>
    <form action="{{ route('wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_wisata" class="form-label">Nama Wisata</label>
            <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" value="{{ $wisata->nama_wisata }}" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $wisata->lokasi }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $wisata->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="harga_tiket" class="form-label">Harga Tiket</label>
            <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" step="0.01" value="{{ $wisata->harga_tiket }}" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            @if($wisata->gambar)
                <img src="{{ asset('storage/' . $wisata->gambar) }}" class="img-thumbnail mt-2" width="200" alt="Current Image">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
