@extends('layouts.app')

@section('content')

<style>
.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.stat-card{
    padding:20px;
    border-radius:15px;
    color:white;
}

.stat-card{
    transition:0.3s;
}

.stat-card:hover{
    transform:translateY(-5px);
}

.blue{
    background:#2563eb;
}

.green{
    background:#10b981;
}

.red{
    background:#ef4444;
}

.orange{
    background:#f97316;
}

.purple{
    background:#7c3aed;
}

.stat-card h3{
    font-size:16px;
    margin-bottom:10px;
}

.stat-card h1{
    font-size:36px;
    margin:0;
    font-weight:bold;
}

</style>

<h2 style="margin-bottom:5px;">Dashboard</h2>

<p style="color:#6b7280;margin-bottom:25px;">
    Ringkasan data barang dan transaksi warung
</p>

<div class="stats">

    <div class="stat-card blue">
        <h3>Total Barang</h3>
        <h1>{{ $totalBarang }}</h1>
    </div>

    <div class="stat-card green">
        <h3>Total Stok</h3>
        <h1>{{ $totalStok }}</h1>
    </div>

    <div class="stat-card red">
        <h3>Barang Kritis</h3>
        <h1>{{ $barangKritis }}</h1>
    </div>

    <div class="stat-card orange">
        <h3>Total Transaksi</h3>
        <h1>{{ $totalTransaksi }}</h1>
    </div>

    <div class="stat-card purple">
        <h3>Detail Transaksi</h3>
        <h1>{{ $totalDetailTransaksi }}</h1>
    </div>

</div>

@endsection