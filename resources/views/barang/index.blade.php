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
        opacity:0.9;
    }

    .btn-edit{
        background:#f59e0b;
        color:white;
        padding:6px 12px;
        border-radius:6px;
        text-decoration:none;
    }

    table{
        width:100%;
        border-collapse:collapse;
        background:white;
        border-radius:12px;
        overflow:hidden;
        box-shadow:0 2px 10px rgba(0,0,0,0.08);
    }

    th{
        background:#2563eb;
        color:white;
        padding:12px;
        text-align:left;
    }

    td{
        padding:14px 12px;
        border-bottom:1px solid #eee;
    }

    tr:hover{
        background:#f9fafb;
    }
</style>

<div class="header">
    <h2>Data Barang</h2>

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
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($barangs as $barang)
            <tr>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->kategori }}</td>
                <td>
                    @if($barang->stok <= 10)
                        <span style="
                            background:#fee2e2;
                            color:#dc2626;
                            padding:4px 10px;
                            border-radius:999px;
                            font-weight:bold;
                        ">
                            {{ $barang->stok }}
                        </span>
                    @else
                        <span style="
                            background:#dcfce7;
                            color:#16a34a;
                            padding:4px 10px;
                            border-radius:999px;
                            font-weight:bold;
                        ">
                            {{ $barang->stok }}
                        </span>
                    @endif
                </td>
                <td>{{ $barang->harga }}</td>

                <td>
                    <a href="/barang/{{ $barang->id }}/edit"
                        class="btn-edit">
                        Edit
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">
                    Belum ada data barang
                </td>
            </tr>
        @endforelse

    </tbody>
</table>

@endsection