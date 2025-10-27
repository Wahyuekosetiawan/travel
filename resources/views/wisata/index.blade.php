@extends('layouts.app')

@section('title', 'Daftar Wisata')

@section('content')
    <h1 class="mb-4">Daftar Wisata</h1>
    <a href="{{ route('wisata.create') }}" class="btn btn-primary mb-3">Tambah Wisata</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        @foreach($wisata as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama_wisata }}">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_wisata }}</h5>
                        <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                        <p class="card-text"><strong>Lokasi:</strong> {{ $item->lokasi }}</p>
                        <p class="card-text"><strong>Harga Tiket:</strong> Rp {{ number_format($item->harga_tiket, 0, ',', '.') }}</p>
                        <a href="{{ route('wisata.show', $item->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('wisata.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('wisata.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus wisata ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
