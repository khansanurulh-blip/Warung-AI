<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;

class AprioriController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $totalTransaksi = Transaksi::count();

        $frekuensi = DetailTransaksi::with('barang')
            ->get()
            ->groupBy('barang_id');

        $minSupport = $request->min_support ?? 10;

        $transaksis = Transaksi::with('detailTransaksis.barang')->get();

        $itemset2 = [];

        foreach ($transaksis as $transaksi) {

            $barang = $transaksi->detailTransaksis
                ->pluck('barang.nama_barang')
                ->toArray();

            sort($barang);

            for ($i = 0; $i < count($barang); $i++) {

                for ($j = $i + 1; $j < count($barang); $j++) {

                    $kombinasi = $barang[$i] . ' & ' . $barang[$j];

                    if (!isset($itemset2[$kombinasi])) {
                        $itemset2[$kombinasi] = 0;
                    }

                    $itemset2[$kombinasi]++;
                }
            }
        }

        $itemset2Support = [];

        foreach ($itemset2 as $kombinasi => $jumlah) {

            $support = ($jumlah / $totalTransaksi) * 100;

            if ($support >= $minSupport) {
                $itemset2Support[$kombinasi] = [
                    'jumlah' => $jumlah,
                    'support' => round($support, 2)
                ];
            }
        }

        $rules = [];
        $minConfidence = $request->min_confidence ?? 60;

        foreach ($itemset2Support as $kombinasi => $data) {

            [$a, $b] = explode(' & ', $kombinasi);

            $frekA = collect($frekuensi)
                ->first(function ($items) use ($a) {
                    return $items->first()->barang->nama_barang === $a;
                });

            if ($frekA) {

                $confidence = ($data['jumlah'] / $frekA->count()) * 100;

               if ($confidence >= $minConfidence) {

                    $rules[] = [
                        'rule' => $a . ' → ' . $b,
                        'support' => $data['support'],
                        'confidence' => round($confidence, 2)
                    ];
                }
            }
        }
        $grafikBarang = [];

        foreach ($frekuensi as $items) {

            $grafikBarang[] = [
                'nama' => $items->first()->barang->nama_barang,
                'jumlah' => $items->count()
            ];
        }

        usort($grafikBarang, function ($a, $b) {
            return $b['jumlah'] <=> $a['jumlah'];
        });

        return view('apriori.index', compact(
            'frekuensi',
            'totalTransaksi',
            'minSupport',
            'itemset2',
            'itemset2Support',
            'rules',
            'minConfidence',
            'grafikBarang'
        ));
    }
}