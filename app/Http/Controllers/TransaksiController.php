<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Peminjam;
use App\Models\Peralatan;
use App\Models\Rent;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    public function index(){
        $peminjam = Peminjam::find(1);
        $rent = Rent::find(1);
        $gedung = $rent->gedung;
        $peralatan = $peminjam->peralatan;
        $perlengkapan = $peminjam->perlengkapan;

        $hargaAlat = $peralatan[0]->harga * $peralatan[0]->jumlah;
        $hargaAlat2 = $peralatan[1]->harga * $peralatan[0]->jumlah;
        $hargaPerlengkapan1 = $perlengkapan[0]->harga * $perlengkapan[0]->jumlah;
        $hargaPerlengkapan2 = $perlengkapan[1]->harga * $perlengkapan[0]->jumlah;
        $hargaPerlengkapan3 = $perlengkapan[2]->harga * $perlengkapan[0]->jumlah;
        $total = $hargaAlat + $hargaAlat2 + $hargaPerlengkapan1 + $hargaPerlengkapan2 + $hargaPerlengkapan3;

        return view('transaksi', [
            'peminjam' => $peminjam,
            'gedung' => $gedung,
            'peralatan' => $peralatan,
            'perlengkapan' => $perlengkapan,
            'total' => $total
        ]);
    }
}
