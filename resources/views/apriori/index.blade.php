@extends('layouts.app')

@section('content')

<h2>Proses Apriori</h2>
<form method="GET" action="/apriori" style="margin-bottom:20px;">

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

<table class="table">
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

<h3 style="margin-top:30px;">
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
            <td>{{ $rule['confidence'] }}%</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection