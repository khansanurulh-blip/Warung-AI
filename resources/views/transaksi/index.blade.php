@extends('layouts.app')

@section('content')

<h2 style="margin-bottom:20px;">
    Data Transaksi
</h2>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Tanggal</th>
            <th>Total Item</th>
        </tr>
    </thead>

    <tbody>
        @foreach($transaksis as $transaksi)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaksi->kode_transaksi }}</td>
            <td>{{ $transaksi->tanggal }}</td>
            <td>{{ $transaksi->total_item }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection