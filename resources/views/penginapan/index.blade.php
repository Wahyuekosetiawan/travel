@extends('layouts.app')

@section('title', 'Kelola Penginapan')

@section('content')
    <h1 class="mb-4">Kelola Penginapan</h1>
    <a href="{{ route('penginapan.create') }}" class="btn btn-primary mb-3">Tambah Penginapan</a>
    @if($penginapan->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Penginapan</th>
                        <th>Wisata</th>
                        <th>Harga</th>
                        <th>Kapasitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penginapan as $item)
                        <tr>
                            <td>
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="img-thumbnail" width="80" alt="{{ $item->nama_penginapan }}">
                                @else
                                    <img src="https://via.placeholder.com/80x60?text=No+Image" class="img-thumbnail" alt="No Image">
                                @endif
                            </td>
                            <td>{{ $item->nama_penginapan }}</td>
                            <td>{{ $item->wisata->nama_wisata }}</td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->kapasitas }} orang</td>
                            <td>
                                <a href="{{ route('penginapan.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('penginapan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('penginapan.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus penginapan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            Belum ada penginapan yang ditambahkan.
        </div>
    @endif
@endsection
