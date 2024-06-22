<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Peminjam;
use App\Models\Peralatan;
use App\Models\Perlengkapan;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Terbilang;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $gedung = Gedung::find($id);

        return view('formulir', [
            'title' => 'Form Peminjam',
            'gedung' => $gedung
        ]);
    }

    public function cetak($id)
    {
        $peminjam = Peminjam::find($id);
        $rent = Rent::find($id);
        $gedung = $rent->gedung;
        $peralatan = $peminjam->peralatan;
        $perlengkapan = $peminjam->perlengkapan;

        $hargaGedung = $gedung->harga * $peminjam->jam_operasional;

        $hargaAlat = $peralatan[0]->harga * $peralatan[0]->jumlah;
        $hargaAlat2 = $peralatan[1]->harga * $peralatan[1]->jumlah;
        // $hargaAlat3 = $peralatan[2]->harga * $peralatan[2]->jumlah;

        $hargaPerlengkapan1 = $perlengkapan[0]->harga * $perlengkapan[0]->jumlah;
        $hargaPerlengkapan2 = $perlengkapan[1]->harga * $perlengkapan[1]->jumlah;
        $hargaPerlengkapan3 = $perlengkapan[2]->harga * $perlengkapan[2]->jumlah;
        $total = $hargaGedung + $hargaAlat + $hargaAlat2 + $hargaPerlengkapan1 + $hargaPerlengkapan2 + $hargaPerlengkapan3;
        $terbilang = Terbilang::angka($total);

        return view('user.admin.cetak', [
            'peminjam' => $peminjam,
            'gedung' => $gedung,
            'peralatan' => $peralatan,
            'perlengkapan' => $perlengkapan,
            'total' => $total,
            'terbilang' => $terbilang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('formulir');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeminjamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'nama_peminjam' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required|digits_between:11,12',
            'no_ktp' => 'required|digits:16',
            'foto_ktp' => 'image|file|max:1024',
            'agenda' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'jam_operasional' => 'numeric|min:5'
        ]);
        // store image
        $validatedData['foto_ktp'] = $request->file('foto_ktp')->store('/peminjam');
        Peminjam::create([
            'nama_peminjam' => $request->nama_peminjam,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'foto_ktp' => $validatedData['foto_ktp'],
            'agenda' => $request->agenda,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'waktu' => $request->waktu,
            'jam_operasional' => $request->jam_operasional,
        ]);
        $peminjam = DB::table('peminjams')->orderBy('created_at', 'desc')->first();
        Rent::create([
            'gedung_id' => $request->gedung_id,
            'peminjam_id' => $peminjam->id
        ]);
        smilify('success', 'Data berhasil disimpan!');
        return redirect()->route('peralatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjam $peminjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): View
    {
        // Get the data by ID
        $peminjam = Peminjam::findOrFail($id);

        return view('user.admin.edit', [
            'title' => 'Edit Data'
        ], compact('peminjam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeminjamRequest  $request
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'nama_peminjam' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'no_ktp' => 'required',
            'agenda' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'waktu' => 'required',
            'jam_operasional' => 'required'
        ]);

        $peminjam = Peminjam::findOrFail($id);

        // cek apakah ada gambar dalam request
        if($request->hasFile('foto_ktp')){

            // Upload gambar baru
            $validatedData['foto_ktp'] = $request->file('foto_ktp')->store('/peminjam');

            // Hapus gambar lama
            Storage::delete($peminjam->foto_ktp);

            // update data dengan gambar yang baru
            $peminjam->update($validatedData, [
                'foto_ktp' => $validatedData['foto_ktp'],
            ]);
        }else {
            $peminjam->update($validatedData);
        }

        notify()->success('success', 'Data berhasil diedit!');
        return redirect()->route('data');
    }

    public function izinkan($id)
    {
        $peminjam = Peminjam::find($id);
        if (auth()->user()->jabatan_id == 2) {
            $peminjam->update([
                'status_kepala' => true
            ]);

            $peminjam->save();
        } else {
            $peminjam->update([
                'status_sekertaris' => true
            ]);

            $peminjam->save();
        }

        smilify('success', 'Peminjam berhasil disetujui!');
        return redirect()->route('data');

    }

    public function tolak($id)
    {
        $peminjam = Peminjam::find($id);

        $peminjam->update([
            'status_kepala' => false
        ]);

        $peminjam->save();
        notify()->warning('success', 'Peminjam berhasil ditolak!!');
        return redirect()->route('data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $peminjam = Peminjam::findOrFail($id);
        $peralatan = DB::delete('delete from peralatans where peminjam_id = '. $id);
        $rent = DB::delete('delete from rents where peminjam_id = '.$id);
        $perlengkapan = DB::delete('delete from perlengkapans where peminjam_id = '.$id);
        // dd($peralatan);

        Storage::delete($peminjam->foto_ktp);

        $peminjam->delete();

        return redirect()->route('data')->with(['success' => 'Data berhasil Dihapus']);
    }
}
