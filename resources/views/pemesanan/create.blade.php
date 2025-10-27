@extends('layouts.app')

@section('title', 'Pesan Wisata')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pesan Wisata: {{ $wisata->nama_wisata }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Detail Wisata</h5>
                            <p><strong>Lokasi:</strong> {{ $wisata->lokasi }}</p>
                            <p><strong>Harga Tiket:</strong> Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</p>
                        </div>
                        <div class="col-md-6">
                            @if($wisata->gambar)
                                <img src="{{ asset('storage/' . $wisata->gambar) }}" class="img-fluid rounded" alt="{{ $wisata->nama_wisata }}">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" class="img-fluid rounded" alt="No Image">
                            @endif
                        </div>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('pemesanan.store') }}">
                        @csrf
                        <input type="hidden" name="wisata_id" value="{{ $wisata->id }}">
                        <div class="mb-3">
                            <label for="tanggal_pemesanan" class="form-label">Tanggal Pemesanan</label>
                            <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                            <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_harga" class="form-label">Total Harga</label>
                            <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
                        </div>
                        <button type="submit" class="btn btn-success">Pesan Sekarang</button>
                        <a href="{{ route('wisata.show', $wisata->id) }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('jumlah_tiket').addEventListener('input', function() {
            const jumlah = this.value;
            const harga = {{ $wisata->harga_tiket }};
            const total = jumlah * harga;
            document.getElementById('total_harga').value = 'Rp ' + total.toLocaleString('id-ID');
        });
    </script>
@endsection
