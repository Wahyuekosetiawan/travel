@extends('layouts.app')

@section('title', 'Detail Wisata')

@section('content')
    <h1 class="mb-4">{{ $wisata->nama_wisata }}</h1>
    @if($wisata->gambar)
        <img src="{{ asset('storage/' . $wisata->gambar) }}" class="img-fluid mb-4" alt="{{ $wisata->nama_wisata }}">
    @else
        <img src="https://via.placeholder.com/600x400?text=No+Image" class="img-fluid mb-4" alt="No Image">
    @endif
    <p><strong>Lokasi:</strong> {{ $wisata->lokasi }}</p>
    <p><strong>Deskripsi:</strong> {{ $wisata->deskripsi }}</p>
    <p><strong>Harga Tiket:</strong> Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</p>

    <h3 class="mt-4">Penginapan Tersedia</h3>
    @if($wisata->penginapan->count() > 0)
        <div class="row">
            @foreach($wisata->penginapan as $penginapan)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        @if($penginapan->gambar)
                            <img src="{{ asset('storage/' . $penginapan->gambar) }}" class="card-img-top" alt="{{ $penginapan->nama_penginapan }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $penginapan->nama_penginapan }}</h5>
                            <p class="card-text">{{ Str::limit($penginapan->deskripsi, 100) }}</p>
                            <p><strong>Harga:</strong> Rp {{ number_format($penginapan->harga, 0, ',', '.') }}/malam</p>
                            <p><strong>Kapasitas:</strong> {{ $penginapan->kapasitas }} orang</p>
                            <a href="{{ route('penginapan.show', $penginapan->id) }}" class="btn btn-info">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Tidak ada penginapan tersedia untuk wisata ini.</p>
    @endif

    @if(Session::has('user'))
        <a href="{{ route('pemesanan.create', $wisata->id) }}" class="btn btn-success">Pesan Tiket</a>
    @else
        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Pesan</a>
    @endif
    <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Kembali</a>
    @if(Session::has('user') && Session::get('user')->isAdmin())
        <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-warning">Edit</a>
    @endif
@endsection
