@extends('layouts.app')

@section('content')

<h2>Edit Barang</h2>

<form action="/barang/{{ $barang->id }}" method="POST">

    @csrf
    @method('PUT')

    <p>
        <label>Kode Barang</label><br>
        <input type="text" name="kode_barang"
            value="{{ $barang->kode_barang }}">
    </p>

    <p>
        <label>Nama Barang</label><br>
        <input type="text" name="nama_barang"
            value="{{ $barang->nama_barang }}">
    </p>

    <p>
        <label>Kategori</label><br>
        <input type="text" name="kategori"
            value="{{ $barang->kategori }}">
    </p>

    <p>
        <label>Stok</label><br>
        <input type="number" name="stok"
            value="{{ $barang->stok }}">
    </p>

    <p>
        <label>Harga</label><br>
        <input type="number" name="harga"
            value="{{ $barang->harga }}">
    </p>

    <button type="submit">
        Simpan
    </button>

</form>

@endsection