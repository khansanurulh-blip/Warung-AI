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
        <input type="text" name="kode_barang">

        <label>Nama Barang</label>
        <input type="text" name="nama_barang">

        <label>Kategori</label>
        <input type="text" name="kategori">

        <label>Stok</label>
        <input type="number" name="stok">

        <label>Harga</label>
        <input type="number" name="harga">

        <button type="submit">
            Simpan Barang
        </button>

    </form>

</div>

</body>
</html>