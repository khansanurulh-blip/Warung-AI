<?php

namespace App\Imports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Barang;
use App\Models\DetailTransaksi;

class TransaksiImport implements ToModel, WithHeadingRow
{
  public function model(array $row)
    {
        $transaksi = Transaksi::create([
            'kode_transaksi' => $row['id'],
            'tanggal' => now(),
            'total_item' => 0,
            'total_harga' => 0,
        ]);

        $daftarBarang = explode(',', $row['barang']);

        foreach ($daftarBarang as $namaBarang) {
    $namaBarang = trim($namaBarang);

    $barang = Barang::firstOrCreate(
        ['nama_barang' => $namaBarang],
        [
            'kode_barang' => 'BRG-' . strtoupper(substr(md5($namaBarang), 0, 6)),
            'kategori' => 'Umum',
            'stok' => 0,
            'harga' => 0,
        ]
    );

        DetailTransaksi::create([
        'transaksi_id' => $transaksi->id,
        'barang_id' => $barang->id,
        'qty' => 1,
        'subtotal' => 0,
    ]);
}
        $transaksi->update([
        'total_item' => count($daftarBarang),
    ]);

        return $transaksi;
    }
}