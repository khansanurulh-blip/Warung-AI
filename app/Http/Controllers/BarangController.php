<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();

        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ],[
            'kode_barang.required' => 'Kode barang wajib diisi',
            'nama_barang.required' => 'Nama barang wajib diisi',
            'kategori.required' => 'Kategori wajib diisi',
            'stok.required' => 'Stok wajib diisi',
            'harga.required' => 'Harga wajib diisi',
        ]);

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);

        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ],[
            'kode_barang.required' => 'Kode barang wajib diisi',
            'nama_barang.required' => 'Nama barang wajib diisi',
            'kategori.required' => 'Kategori wajib diisi',
            'stok.required' => 'Stok wajib diisi',
            'harga.required' => 'Harga wajib diisi',
        ]);

        $barang = Barang::findOrFail($id);

        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return redirect('/barang');
    }
}
