<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();

        $totalStok = Barang::sum('stok');

        $barangKritis = Barang::where('stok', '<=', 10)->count();

        return view('dashboard', compact(
            'totalBarang',
            'totalStok',
            'barangKritis'
        ));
    }
}