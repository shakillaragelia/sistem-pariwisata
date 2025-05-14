@extends('layouts.main')

@section('content-admin')
<div class="container mt-4">
    <h4>Tambah Data Wisata</h4>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Tambah --}}
    <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="nama">Nama Wisata</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="id_kategori">Kategori Wisata</label>
            <select name="id_kategori" id="id_kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                {{-- Contoh kategori statis, nanti bisa dinamis --}}
                <option value="1">Sejarah</option>
                <option value="2">Alam</option>
                <option value="3">Kuliner</option>
                <option value="4">Seni & </option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="harga">Harga Tiket</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="gambar">Upload Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
