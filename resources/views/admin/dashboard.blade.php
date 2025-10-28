@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="mb-4">Dashboard Admin</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Wisata</h5>
                    <h2>{{ $totalWisata }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pesanan</h5>
                    <h2>{{ $totalPemesanan }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Penginapan</h5>
                    <h2>{{ $totalPenginapan }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <a href="{{ route('penginapan.index') }}" class="btn btn-primary">Kelola Penginapan</a>
            <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Kelola Wisata</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Pesanan Terbaru</h5>
                </div>
                <div class="card-body">
                    @if($recentPemesanan->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Wisata</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentPemesanan as $item)
                                        <tr>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->wisata->nama_wisata }}</td>
                                            <td>{{ $item->tanggal_pemesanan->format('d/m/Y') }}</td>
                                            <td>{{ $item->jumlah_tiket }}</td>
                                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Tidak ada pesanan terbaru.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
