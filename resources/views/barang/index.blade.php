@extends('layouts.app')

@section('content')

<style>
    .header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    }

    .btn-tambah{
        background:#2563eb;
        color:white;
        padding:10px 16px;
        border-radius:8px;
        text-decoration:none;
    }

    .btn-tambah:hover{
        background:#1d4ed8;
    }

    table{
        width:100%;
        border-collapse:collapse;
        background:white;
    }

    th{
        background:#2563eb;
        color:white;
        padding:12px;
        text-align:left;
    }

    td{
        padding:12px;
        border-bottom:1px solid #eee;
    }

    tr:hover{
        background:#f9fafb;
    }
</style>

<div class="header">
    <h2>📦 Data Barang</h2>

    <a href="/barang/create" class="btn-tambah">
        + Tambah Barang
    </a>
</div>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
        </tr>
    </thead>

    <tbody>

        @forelse($barangs as $barang)
            <tr>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->kategori }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->harga }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    Belum ada data barang
                </td>
            </tr>
        @endforelse

    </tbody>
</table>

@endsection