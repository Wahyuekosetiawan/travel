@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@section('content')
    <h1 class="mb-4">Riwayat Pesanan</h1>
    @if($pemesanan->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Wisata</th>
                        <th>Penginapan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Jumlah Tiket</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesanan as $item)
                        <tr>
                            <td>{{ $item->wisata->nama_wisata }}</td>
                            <td>{{ $item->penginapan ? $item->penginapan->nama_penginapan : '-' }}</td>
                            <td>{{ $item->tanggal_pemesanan->format('d/m/Y') }}</td>
                            <td>{{ $item->jumlah_tiket }}</td>
                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            <td><span class="badge bg-success">Berhasil</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            Anda belum memiliki pesanan.
        </div>
    @endif
@endsection
