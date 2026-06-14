<!DOCTYPE html>
<html>
<head>
    <title>AI Apriori Stock System</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f5f7fb;
        }

        .container{
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:250px;
            background:#2563eb;
            color:white;
            padding:20px;
        }

        .sidebar h2{
            margin-bottom:30px;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:12px;
            border-radius:8px;
            margin-bottom:10px;
        }

        .sidebar a:hover{
            background:rgba(255,255,255,0.2);
        }

        .content{
            flex:1;
            padding:30px;
        }

        .card{
            background:white;
            padding:20px;
            border-radius:12px;
            box-shadow:0 2px 8px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>

<div class="container">

    <div class="sidebar">

        <h2> AI Apriori</h2>

        <a href="/"> Dashboard</a>

        <a href="/barang"> Data Barang</a>

        <a href="/import"> Import Excel</a>

        <a href="/transaksi">Data Transaksi</a>
        
        <a href="/apriori">Apriori</a>
        
    </div>

    <div class="content">

        <div class="card">

            @yield('content')

        </div>

    </div>

</div>

</body>
</html>