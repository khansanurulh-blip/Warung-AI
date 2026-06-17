@extends('layouts.app')

@section('content')

<style>
.form-card{
    max-width:700px;
}

.barang-item{
    padding:10px;
    border:1px solid #e5e7eb;
    border-radius:8px;
    margin-bottom:10px;
}

.btn{
    padding:10px 18px;
    border:none;
    border-radius:8px;
    text-decoration:none;
    cursor:pointer;
}

.btn-primary{
    background:#2563eb;
    color:white;
}

.btn-secondary{
    background:#6b7280;
    color:white;
}
</style>

<a href="/transaksi" class="btn btn-secondary">
    ← Kembali
</a>

<h2 style="margin-top:20px;">
    Tambah Transaksi
</h2>

<p style="color:#6b7280;margin-bottom:20px;">
    Pilih barang yang dibeli pelanggan
</p>

@if ($errors->any())
    <div style="
        background:#fee2e2;
        color:#b91c1c;
        padding:12px;
        border-radius:8px;
        margin-bottom:20px;
    ">
        {{ $errors->first() }}
    </div>
@endif

<form action="/transaksi" method="POST">

    @csrf

    @foreach($barangs as $barang)

        <div class="barang-item">

            <label>

                <input
                    type="checkbox"
                    name="barang[]"
                    value="{{ $barang->id }}">

                {{ $barang->nama_barang }}

            </label>

        </div>

    @endforeach

    <button type="submit" class="btn btn-primary">
        Simpan Transaksi
    </button>

</form>

@endsection