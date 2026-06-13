@extends('layouts.app')

@section('content')

<h2>Detail Transaksi</h2>

<p>
    <strong>Kode:</strong> {{ $transaksi->kode_transaksi }}
</p>

<p>
    <strong>Total Item:</strong> {{ $transaksi->total_item }}
</p>

<h4>Daftar Barang</h4>

<ul>
    @foreach($transaksi->detailTransaksis as $detail)
        <li>{{ $detail->barang->nama_barang }}</li>
    @endforeach
</ul>

@endsection