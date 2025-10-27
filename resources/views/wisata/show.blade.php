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
