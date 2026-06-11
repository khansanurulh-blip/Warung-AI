@extends('layouts.app')

@section('content')

<style>
.stats{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}

.stat-card{
    padding:20px;
    border-radius:15px;
    color:white;
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

.stat-card h3{
    font-size:16px;
    margin-bottom:10px;
}

.stat-card h1{
    font-size:32px;
}
</style>

<h2 style="margin-bottom:20px;">📊 Dashboard</h2>

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

</div>

@endsection