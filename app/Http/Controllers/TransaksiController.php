<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::latest()->get();

        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $barangs = Barang::orderBy('nama_barang')->get();

        return view('transaksi.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang' => 'required'
        ],[
            'barang.required' => 'Pilih minimal satu barang'
        ]);

        $transaksi = Transaksi::create([
            'kode_transaksi' => 'TRX-' . date('YmdHis'),
            'tanggal' => now(),
            'total_item' => count($request->barang),
            'total_harga' => 0
        ]);

        foreach ($request->barang as $barangId) {

            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $barangId,
                'qty' => 1,
                'subtotal' => 0
            ]);
        }

        return redirect('/transaksi');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load('detailTransaksis.barang');

        return view('transaksi.show', compact('transaksi'));
    }

    public function destroy(Transaksi $transaksi)
    {
        DetailTransaksi::where('transaksi_id', $transaksi->id)->delete();

        $transaksi->delete();

        return redirect('/transaksi');
    }
}