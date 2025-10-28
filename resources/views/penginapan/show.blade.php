@extends('layouts.app')

@section('title', 'Detail Penginapan')

@section('content')
    <h1 class="mb-4">{{ $penginapan->nama_penginapan }}</h1>
    @if($penginapan->gambar)
        <img src="{{ asset('storage/' . $penginapan->gambar) }}" class="img-fluid mb-4" alt="{{ $penginapan->nama_penginapan }}">
    @else
        <img src="https://via.placeholder.com/600x400?text=No+Image" class="img-fluid mb-4" alt="No Image">
    @endif
    <p><strong>Wisata:</strong> {{ $penginapan->wisata->nama_wisata }}</p>
    <p><strong>Deskripsi:</strong> {{ $penginapan->deskripsi }}</p>
    <p><strong>Harga per Malam:</strong> Rp {{ number_format($penginapan->harga, 0, ',', '.') }}</p>
    <p><strong>Kapasitas:</strong> {{ $penginapan->kapasitas }} orang</p>
    @if(Session::has('user'))
        <a href="{{ route('pemesanan.create', $penginapan->wisata_id) }}" class="btn btn-success">Pesan Wisata dengan Penginapan Ini</a>
    @else
        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Pesan</a>
    @endif
    <a href="{{ route('wisata.show', $penginapan->wisata_id) }}" class="btn btn-secondary">Kembali ke Wisata</a>
@endsection
