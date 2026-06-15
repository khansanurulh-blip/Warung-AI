@extends('layouts.app')

@section('content')

<style>
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
    padding:14px;
    text-align:left;
}

.table-modern td{
    padding:14px;
    border-bottom:1px solid #eee;
}

.table-modern tr:hover{
    background:#f9fafb;
}

.btn-detail{
    background:#2563eb;
    color:white;
    text-decoration:none;
    padding:6px 12px;
    border-radius:6px;
}

.btn-detail:hover{
    opacity:0.9;
}
</style>

<h2 style="margin-bottom:5px;">
    Data Transaksi
</h2>

<p style="color:#6b7280;margin-bottom:25px;">
    Daftar transaksi yang telah diimpor ke sistem
</p>

<table class="table-modern">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Tanggal</th>
            <th>Total Item</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($transaksis as $transaksi)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaksi->kode_transaksi }}</td>
            <td>{{ $transaksi->tanggal }}</td>
            <td>{{ $transaksi->total_item }}</td>

            <td>
                <a href="/transaksi/{{ $transaksi->id }}"
                    class="btn-detail">
                        Detail
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection