@extends('layouts.app')

@section('title', 'Edit Penginapan')

@section('content')
    <h1 class="mb-4">Edit Penginapan</h1>
    <form method="POST" action="{{ route('penginapan.update', $penginapan->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="wisata_id" class="form-label">Wisata</label>
            <select class="form-control" id="wisata_id" name="wisata_id" required>
                <option value="">Pilih Wisata</option>
                @foreach($wisata as $w)
                    <option value="{{ $w->id }}" {{ $w->id == $penginapan->wisata_id ? 'selected' : '' }}>{{ $w->nama_wisata }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_penginapan" class="form-label">Nama Penginapan</label>
            <input type="text" class="form-control" id="nama_penginapan" name="nama_penginapan" value="{{ $penginapan->nama_penginapan }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $penginapan->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga per Malam</label>
            <input type="number" class="form-control" id="harga" name="harga" min="0" value="{{ $penginapan->harga }}" required>
        </div>
        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" id="kapasitas" name="kapasitas" min="1" value="{{ $penginapan->kapasitas }}" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            @if($penginapan->gambar)
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('penginapan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
