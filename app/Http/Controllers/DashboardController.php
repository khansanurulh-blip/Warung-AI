<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();

        $totalStok = Barang::sum('stok');

        $barangKritis = Barang::where('stok', '<=', 10)->count();

        $totalTransaksi = Transaksi::count();

        $totalDetailTransaksi = DetailTransaksi::count();

        return view('dashboard', compact(
            'totalBarang',
            'totalStok',
            'barangKritis',
            'totalTransaksi',
            'totalDetailTransaksi'
        ));
    }
}