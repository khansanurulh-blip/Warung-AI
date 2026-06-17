<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f7fb;
            padding:40px;
        }

        .card{
            max-width:600px;
            background:white;
            padding:25px;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        h1{
            color:#2563eb;
        }

        label{
            display:block;
            margin-top:15px;
            margin-bottom:5px;
            font-weight:bold;
        }

        input{
            width:100%;
            padding:10px;
            border:1px solid #ddd;
            border-radius:8px;
        }

        button{
            margin-top:20px;
            background:#2563eb;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:8px;
            cursor:pointer;
        }

        button:hover{
            background:#1d4ed8;
        }
    </style>
</head>
<body>

<div class="card">

    <h1>Tambah Barang</h1>

    <form action="/barang" method="POST">

        @csrf

        <label>Kode Barang</label>
        <input
            type="text"
            name="kode_barang"
            value="{{ old('kode_barang') }}">

        @error('kode_barang')
            <small style="color:red;">
                {{ $message }}
            </small>
        @enderror

        <label>Nama Barang</label>
        <input
            type="text"
            name="nama_barang"
            value="{{ old('nama_barang') }}">

        @error('nama_barang')
            <small style="color:red;">
                {{ $message }}
            </small>
        @enderror

        <label>Kategori</label>
        <input
            type="text"
            name="kategori"
            value="{{ old('kategori') }}">

        @error('kategori')
            <small style="color:red;">
                {{ $message }}
            </small>
        @enderror

        <label>Stok</label>
        <input
            type="number"
            name="stok"
            value="{{ old('stok') }}">

        @error('stok')
            <small style="color:red;">
                {{ $message }}
            </small>
        @enderror

        <label>Harga</label>
        <input
            type="number"
            name="harga"
            value="{{ old('harga') }}">

        @error('harga')
            <div style="color:red;margin-top:5px;">
                {{ $message }}
            </div>
        @enderror

        <div style="margin-top:25px;">
            <button type="submit">
                Simpan Barang
            </button>
        </div>

    </form>

</div>

</body>
</html>