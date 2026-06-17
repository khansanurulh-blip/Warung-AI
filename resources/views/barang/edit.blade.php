@extends('layouts.app')

@section('content')

<style>
.form-card{
    max-width:700px;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:bold;
}

.form-control{
    width:100%;
    padding:12px;
    border:1px solid #d1d5db;
    border-radius:8px;
    font-size:15px;
}

.form-control:focus{
    outline:none;
    border-color:#2563eb;
}

.error{
    color:#dc2626;
    font-size:14px;
    margin-top:5px;
}

.btn{
    padding:10px 18px;
    border:none;
    border-radius:8px;
    text-decoration:none;
    cursor:pointer;
    font-size:14px;
}

.btn-primary{
    background:#2563eb;
    color:white;
}

.btn-primary:hover{
    background:#1d4ed8;
}

.btn-secondary{
    background:#6b7280;
    color:white;
    margin-right:10px;
}
</style>

<a href="/barang" class="btn btn-secondary">
    ← Kembali
</a>

<h2 style="margin-top:20px;margin-bottom:10px;">
    Edit Barang
</h2>

<p style="color:#6b7280;margin-bottom:25px;">
    Ubah informasi barang yang dipilih
</p>

<div class="form-card">

<form action="/barang/{{ $barang->id }}" method="POST">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Kode Barang</label>

        <input
            type="text"
            name="kode_barang"
            class="form-control"
            value="{{ old('kode_barang', $barang->kode_barang) }}">

        @error('kode_barang')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Nama Barang</label>

        <input
            type="text"
            name="nama_barang"
            class="form-control"
            value="{{ old('nama_barang', $barang->nama_barang) }}">

        @error('nama_barang')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Kategori</label>

        <input
            type="text"
            name="kategori"
            class="form-control"
            value="{{ old('kategori', $barang->kategori) }}">

        @error('kategori')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Stok</label>

        <input
            type="number"
            name="stok"
            class="form-control"
            value="{{ old('stok', $barang->stok) }}">

        @error('stok')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Harga</label>

        <input
            type="number"
            name="harga"
            class="form-control"
            value="{{ old('harga', $barang->harga) }}">

        @error('harga')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        Simpan Perubahan
    </button>

</form>

</div>

@endsection