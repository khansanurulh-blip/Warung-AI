@extends('layouts.app')

@section('content')

<style>
    .upload-card{
        max-width:700px;
        margin:auto;
    }

    .upload-box{
        border:2px dashed #2563eb;
        padding:40px;
        border-radius:15px;
        text-align:center;
        background:#f8fbff;
    }

    .upload-box h3{
        margin-bottom:15px;
    }

    .upload-box input{
        margin-top:15px;
    }

    .btn-upload{
        margin-top:20px;
        background:#2563eb;
        color:white;
        border:none;
        padding:12px 20px;
        border-radius:8px;
        cursor:pointer;
    }

    .btn-upload:hover{
        background:#1d4ed8;
    }
</style>

<div class="upload-card">

    <h2 style="margin-bottom:20px;">
        📥 Import Data Transaksi Excel
    </h2>

    <div class="upload-box">

        <h3>Upload File Excel (.xlsx)</h3>

        <p>
            File harus berisi kolom:
            ID, Minggu, Barang
        </p>

        <form action="/import" method="POST" enctype="multipart/form-data">
            @csrf

            <input
                type="file"
                name="file"
                accept=".xlsx,.xls"
                required
            >

            <br>

            <button type="submit" class="btn-upload">
                Upload Excel
            </button>

        </form>

    </div>

</div>

@endsection