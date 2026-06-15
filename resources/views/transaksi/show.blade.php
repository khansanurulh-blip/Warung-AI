@extends('layouts.app')

@section('content')

<style>
.info-card{
    background:#f8fafc;
    padding:20px;
    border-radius:12px;
    margin-bottom:25px;
}

.table-modern{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
}

.table-modern th{
    background:#2563eb;
    color:white;
    padding:12px;
    text-align:left;
}

.table-modern td{
    padding:12px;
    border-bottom:1px solid #eee;
}

.table-modern tr:hover{
    background:#f9fafb;
}

.btn-back{
    display:inline-block;
    margin-bottom:20px;
    background:#6b7280;
    color:white;
    text-decoration:none;
    padding:8px 14px;
    border-radius:8px;
}
</style>

<a href="/transaksi" class="btn-back">
    ← Kembali
</a>

<h2 style="margin-bottom:5px;">
    Detail Transaksi
</h2>

<p style="color:#6b7280;margin-bottom:25px;">
    Informasi lengkap transaksi dan daftar barang
</p>

<div class="info-card">

    <p>
        <strong>Kode Transaksi:</strong>
        {{ $transaksi->kode_transaksi }}
    </p>

    <br>

    <p>
        <strong>Total Item:</strong>
        {{ $transaksi->total_item }}
    </p>

</div>

<h3 style="margin-bottom:15px;">
    Daftar Barang
</h3>

<table class="table-modern">

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
        </tr>
    </thead>

    <tbody>

        @foreach($transaksi->detailTransaksis as $detail)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $detail->barang->nama_barang }}</td>
        </tr>

        @endforeach

    </tbody>

</table>

@endsection