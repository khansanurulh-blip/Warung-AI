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

.btn-hapus{
    background:#ef4444;
    color:white;
    border:none;
    padding:6px 12px;
    border-radius:6px;
    cursor:pointer;
}

.btn-hapus:hover{
    background:#dc2626;
}

</style>

<div class="header">

    <div>
        <h2 style="margin-bottom:5px;">
            Data Transaksi
        </h2>

        <p style="color:#6b7280;">
            Daftar transaksi yang telah masuk ke sistem
        </p>
    </div>

    <a href="/transaksi/create" class="btn-tambah">
        + Tambah Transaksi
    </a>

</div>

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

        @forelse($transaksis as $transaksi)

        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>
                {{ $transaksi->kode_transaksi }}
            </td>

            <td>
                {{ $transaksi->tanggal }}
            </td>

            <td>
                {{ $transaksi->total_item }}
            </td>

            <td style="display:flex;gap:8px;">

                <a
                    href="/transaksi/{{ $transaksi->id }}"
                    class="btn-detail">
                    Detail
                </a>

                <form
                    action="/transaksi/{{ $transaksi->id }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn-hapus">

                        Hapus

                    </button>

                </form>

            </td>
        </tr>

        @empty

        <tr>
            <td colspan="5">
                Belum ada transaksi
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection