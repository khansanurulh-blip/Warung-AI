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
    margin-bottom:25px;
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
</style>

<h2 style="margin-bottom:5px;">
    Analisis Apriori
</h2>

<p style="color:#6b7280;margin-bottom:25px;">
    Temukan pola pembelian pelanggan berdasarkan data transaksi
</p>
<form method="GET" action="/apriori"
      style="
        margin-bottom:25px;
        background:white;
        padding:20px;
        border-radius:12px;
        box-shadow:0 2px 10px rgba(0,0,0,0.08);
      ">

    <label>Minimum Support (%)</label>
    <input
        type="number"
        name="min_support"
        value="{{ $minSupport }}"
        min="1"
        max="100"
    >

    <label style="margin-left:15px;">
        Minimum Confidence (%)
    </label>

    <input
        type="number"
        name="min_confidence"
        value="{{ $minConfidence }}"
        min="1"
        max="100"
    >

    <button type="submit">
        Proses
    </button>

</form>
<p>
    <strong>Minimum Support:</strong>
    {{ $minSupport }}%

    <br>

    <strong>Minimum Confidence:</strong>
    {{ $minConfidence }}%
</p>

<table class="table-modern">
    <thead>
        <tr>
            <th>Kombinasi Barang</th>
            <th>Frekuensi</th>
            <th>Support (%)</th>
        </tr>
    </thead>

    <tbody>
        @foreach($frekuensi as $items)
        @php
            $support = ($items->count() / $totalTransaksi) * 100;
        @endphp

        @if($support >= $minSupport)
        <tr>
            <td>{{ $items->first()->barang->nama_barang }}</td>
            <td>{{ $items->count() }}</td>
            <td>{{ round($support, 2) }}%</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<h3 style="margin-top:30px;">
    2-Itemset
</h3>

<table class="table">
    <thead>
        <tr>
            <th>Kombinasi Barang</th>
            <th>Frekuensi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($itemset2Support as $kombinasi => $data)
        <tr>
            <td>{{ $kombinasi }}</td>
            <td>{{ $data['jumlah'] }}</td>
            <td>{{ $data['support'] }}%</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3 style="
    margin-top:30px;
    background:#ede9fe;
    color:#6d28d9;
    padding:12px 16px;
    border-radius:10px;
">
    Association Rules
</h3>

<table class="table">
    <thead>
        <tr>
            <th>Rule</th>
            <th>Support (%)</th>
            <th>Confidence (%)</th>
        </tr>
    </thead>

    <tbody>
        @foreach($rules as $rule)
        <tr>
            <td>{{ $rule['rule'] }}</td>
            <td>{{ $rule['support'] }}%</td>
            <td>
                <span style="
                    background:#dcfce7;
                    color:#166534;
                    padding:4px 10px;
                    border-radius:999px;
                    font-weight:bold;
                ">
                    {{ $rule['confidence'] }}%
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection