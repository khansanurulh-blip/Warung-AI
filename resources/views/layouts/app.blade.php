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
            position:relative;
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

        .sidebar a.active{
            background:white;
            color:#2563eb;
            font-weight:bold;
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

        <div style="margin-bottom:30px;">
            <h2 style="margin-bottom:5px;">
                AI Apriori
            </h2>

            <small style="opacity:0.8;">
                Stock Recommendation System
            </small>
        </div>

        <a href="/"
            class="{{ request()->is('/') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="/barang"
            class="{{ request()->is('barang*') ? 'active' : '' }}">
            Data Barang
        </a>

        <a href="/import"
            class="{{ request()->is('import*') ? 'active' : '' }}">
            Import Excel
        </a>

        <a href="/transaksi"
            class="{{ request()->is('transaksi*') ? 'active' : '' }}">
            Data Transaksi
        </a>
        
        <a href="/apriori"
            class="{{ request()->is('apriori*') ? 'active' : '' }}">
            Apriori
        </a>
        
        <div style="
            position:absolute;
            bottom:20px;
            left:20px;
            font-size:12px;
            opacity:0.7;
        ">
            Version 1.0
        </div>
    </div>

    <div class="content">

        <div class="card">

            @yield('content')

        </div>

    </div>

</div>

</body>
</html>