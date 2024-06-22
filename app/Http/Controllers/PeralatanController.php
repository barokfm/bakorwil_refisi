<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\Peralatan;
use App\Models\Perlengkapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeralatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $gedung = Gedung::find($id);
        $peralatans = Peralatan::all();
        // $peralatans = $gedung->peralatan();

        return view('peralatan',[
            'title' => 'Form Peralatan'
        ], compact('peralatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeralatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peminjam = DB::table('peminjams')->orderBy('created_at', 'desc')->first();
        $validated_data = $this->validate($request, [
            'jumlah_kursi' => 'numeric|max:150 required',
            'jumlah_ac' => 'numeric|max:8 required',
            'sound_system' => 'required',
            'space_promotion' => 'required',
            'area_kantor' => 'required'
        ]);

        $sound_system = 0;
        $space_promotion = 0;
        $area_kantor = 0;

        if($request->sound_system === 'ya'){
            $sound_system = 1;
        }

        if($request->space_promotion != 'ya'){
            $space_promotion = 0;
        }else {
            $space_promotion = $request->input_space;
        }

        if($request->area_kantor != 'ya'){
            $area_kantor = 0;
        }else {
            $area_kantor = $request->input_area;
        }

        $peralatans = [
            [
                'peminjam_id' => $peminjam->id,
                'nama' => 'Kursi Varnekel',
                'harga' => 1500,
                'jumlah' => $validated_data['jumlah_kursi']
            ],
            [
                'peminjam_id' => $peminjam->id,
                'nama' => 'AC',
                'harga' => 350000,
                'jumlah' => $validated_data['jumlah_ac']
            ]
        ];

        $perlengkapans = [
            [
                'peminjam_id' => $peminjam->id,
                'nama' => 'Sound System',
                'jumlah' => $sound_system,
                'harga' => 500000
            ],
            [
                'peminjam_id' => $peminjam->id,
                'nama' => 'Space Promotion',
                'jumlah' => $space_promotion,
                'harga' => 100000
            ],
            [
                'peminjam_id' => $peminjam->id,
                'nama' => 'Area kantor dan Halaman',
                'jumlah' => $area_kantor,
                'harga' => 10000
            ],
        ];

        foreach($peralatans as $peralatan){
            Peralatan::create($peralatan);
        };

        foreach($perlengkapans as $perlengkapan){
            Perlengkapan::create($perlengkapan);
        };

        return redirect()->route('home')->with('success', 'Data Peminjam Berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function show(Peralatan $peralatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Peralatan $peralatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peralatan $peralatan)
    {
        //
    }
}
