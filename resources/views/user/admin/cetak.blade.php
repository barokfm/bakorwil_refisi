<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Name: {{ $peminjam->nama_peminjam }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="font-family: Book Antiqua">
    <div class="container-fluid p-1">
        <div class="container-fluid pt-3 d-flex justify-content-around align-items-center">
            <img src="/img/kop.png" alt="kop" width="100">
            <div class="container grid text-center">
                <h5 class="" style="line-height: 1">PEMERINTAH PROVINSI JAWA TIMUR</h5>
                <h5 class="" style="line-height: 1"><b>BADAN KOORDINASI WILAYAH PEMERINTAHAN DAN</b></h5>
                <h5 class="" style="line-height: .5"><b>PEMBANGUNAN PAMEKASAN</b></h5>
                <div class="" style="line-height: 0">
                    <small class="">Alamat: Jalan Slamet Riyadi No. 1 Pamekasan</small>
                    <br>
                    <small class="" style="line-height: 2">Email: bakorwil4@jatimprov.go.id</small>
                </div>
                <h5 class="" style="line-height: .5"><b>PAMEKASAN</b></h5>
                <div position-relative pb-3">
                    <small class=" col-7 position-absolute"><b>Kode Pos 69313</b></small>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <hr class="border-top border-dark" style="height: 5px">
        </div>
        <div class="text-center">
            <h5><b><u>PERINCIAN PESEWAAN</u></b></h5>
        </div>
        <div class="container-fluid pt-2">
            <div class="container-fluid overflow-hidden">
                <div class="container d-flex justify-content-between">
                    <div>
                        <tr><b>Nama &emsp;&emsp;: </b></tr>
                        <td>{{ $peminjam->nama_peminjam }}</td><br>
                        <tr><b>Alamat &emsp;&ensp;: </b></tr>
                        <td>{{ $peminjam->alamat }}</td><br>
                        <tr><b>No. Hp &ensp;&emsp;: </b></tr>
                        <td>{{ $peminjam->no_hp }}</td><br>
                        <tr><b>No. KTP &emsp;: </b></tr>
                        <td>{{ $peminjam->no_ktp }}</td><br>
                    </div>
                    <div>
                        <tr><b>Keperluan &emsp;&ensp;: </b></tr>
                        <td>{{ $peminjam->agenda }}</td> <br>
                        <tr><b>Tgl. Dipakai &ensp;&nbsp;: </b></tr>
                        <td>{{ $peminjam->tgl_awal }}</td><br>
                        <tr><b>Pukul &emsp;&emsp;&emsp;&ensp;: </b></tr>
                        <td>{{ $peminjam->waktu }}</td><br>
                        <tr><b>Email &emsp;&emsp;&emsp;&ensp;: </b></tr>
                        <td>{{ $peminjam->email }}</td><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-3">
            <table class="table border table-striped">
                <thead>
                    <tr>
                        <th scope="col">NO.</th>
                        <th scope="col">URAIAN PERALATAN</th>
                        <th scope="col">SATUAN PESANAN</th>
                        <th scope="col">TARIF SEWA</th>
                        <th scope="col">JUMLAH</th>
                        <th scope="col">KET.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <th class="fw-light">{{ $gedung->nama }}</th>
                        <th class="fw-light">{{ $peminjam->jam_operasional }} Jam</th>
                        <th class="fw-light">Rp.{{ number_format(3000000, 0, ',', '.') }}</th>
                        <th class="fw-light">@php
                            $hargaGedung = $gedung->harga * $peminjam->jam_operasional;
                        @endphp
                            Rp.{{ number_format($hargaGedung, 0, ',', '.') }}</th>
                        <th class="fw-light">.......</th>
                    </tr>
                    @for ($i = 0; $i < count($peralatan); $i++)
                        <tr>
                            <th scope="row">{{ $i + 2 }}</th>
                            <th class="fw-light">{{ $peralatan[$i]->nama }}</th>
                            <th class="fw-light">{{ $peralatan[$i]->jumlah }} buah</th>
                            <th class="fw-light">Rp.{{ number_format($peralatan[$i]->harga, 0, ',', '.') }}</th>
                            <th class="fw-light"><?php $harga = $peralatan[$i]->harga * $peralatan[$i]->jumlah; ?>
                                Rp.{{ number_format($harga, 0, ',', '.') }}</th>
                            <th class="fw-light">.......</th>
                        </tr>
                    @endfor
                    @for ($i = 0; $i < count($perlengkapan); $i++)
                        <tr>
                            <th scope="row">{{ $i + 4 }}</th>
                            <th class="fw-light">{{ $perlengkapan[$i]->nama }}</th>
                            <th class="fw-light">{{ $perlengkapan[$i]->jumlah }} @if ($i == 0)
                                    hari
                                @else
                                    m<sup>2</sup>
                                @endif
                            </th>
                            <th class="fw-light">Rp.{{ number_format($perlengkapan[$i]->harga, 0, ',', '.') }}</th>
                            <th class="fw-light"><?php $harga = $perlengkapan[$i]->harga * $perlengkapan[$i]->jumlah; ?>
                                Rp.{{ number_format($harga, 0, ',', '.') }}</th>
                            <th class="fw-light">.......</th>
                        </tr>
                    @endfor
                    <tr>
                        <th colspan="6"><br></th>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <th colspan="3" class="text-center"><i>JUMLAH BIAYA JASA SEWA DAN PERALATANNYA</i></th>
                        <th>Rp.{{ number_format($total, 2, ',', '.') }}</th>
                    </tr>
                </tbody>
            </table>
            <div class="container-fluid mt-5">
                <b><h6 class="text-uppercase">TERBILANG: {{ $terbilang }}</h6></b>
            </div>

            <div class="container " style="margin-top: 70px">
                <div class="row">
                    <div class="col">
                        <div class="col-lg text-center">
                            <small>Mengetahui: <br></small>
                            <span>BENDAHARA PENERIMAAN</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col-lg text-center">
                            <span><br></span>
                            <span>Penyewa:</span>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 100px">
                    <div class="col text-center">
                        <span class="fw-bold"><u>SULAIMAN</u><br></span>
                        <small>NIP. 19780807 201001 1 004</small>
                    </div>
                    <div class="col text-center">
                        {{ $peminjam->nama_peminjam }}
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="container-fluid pt-3 d-flex justify-content-around align-items-center">
        <img src="/img/kop.png" alt="kop" width="100">
        <div class="container grid text-center">
            <h5 class="" style="line-height: 1">PEMERINTAH PROVINSI JAWA TIMUR</h5>
            <h5 class="" style="line-height: 1"><b>BADAN KOORDINASI WILAYAH PEMERINTAHAN DAN</b></h5>
            <h5 class="" style="line-height: .5"><b>PEMBANGUNAN PAMEKASAN</b></h5>
            <div class="" style="line-height: 0">
                <small class="">Alamat: Jalan Slamet Riyadi No. 1 Pamekasan</small>
                <br>
                <small class="" style="line-height: 2">Email: bakorwil4@jatimprov.go.id</small>
            </div>
            <h5 class="" style="line-height: .5"><b>PAMEKASAN</b></h5>
            <div position-relative pb-3">
                <small class=" col-7 position-absolute"><b>Kode Pos 69313</b></small>
            </div>
        </div>
    </div>
    <div class="container-fluid text-center mt-3" style="font-family: Book Antiqua">
        <h5><b><u>SURAT PERNYATAAN</u></b></h5>
    </div>
    <div class="container-fluid mt-3">
        <pre><p style="font-family: Book Antiqua; height: 10px;">Pemekasan, ......../......../
            <p style="font-family: Book Antiqua; height: 10px;">Perihal : Permohonan izin menempati balai Pertemuan Bakorwil Pamekasan</p>
            <p style="font-family: Book Antiqua; margin-top: -60px;">
            Kepada
            Yth. Ibu KEPALA BAKORWIL PAMEKASAN
                Jl. Slamet Riyadi no. 1
            di</p></p></pre>
        <div>
            <p><b><u>PAMEKASAN</u></b></p>
            <br>
        </div>
    </div>

    <div class="container-fluid">
        <p style="text-indent: 50px; height: 10px;">Yang bertanda tangan di bawah ini: </p>
        <div class="container-fluid">
            <tr><b>Nama &emsp;&emsp;: </b></tr>
            <td>{{ $peminjam->nama_peminjam }}</td><br>
            <tr><b>Alamat &emsp;&ensp;: </b></tr>
            <td>{{ $peminjam->alamat }}</td><br>
            <tr><b>No. Hp &ensp;&emsp;: </b></tr>
            <td>{{ $peminjam->no_hp }}</td><br>
        </div>
        <p style="text-indent: 50px;">Dengan hormat kami mengajukan izin untuk menempati balai pertemuan
            Badan Koordinasi Wilayah Pemerintah dan Pembangunan Pamekasan pada :</p>
        <div class="container-fluid" style="margin-top: -20px">
            <tr><b>Tanggal &ensp;&nbsp;&emsp;&emsp;: </b></tr>
            <td>{{ $peminjam->tgl_awal }}</td><br>
            <tr><b>Waktu &emsp;&emsp;&emsp;&ensp;: </b></tr>
            <td>{{ $peminjam->waktu }}</td><br>
            <tr><b>Keperluan &emsp;&ensp;: </b></tr>
            <td>{{ $peminjam->agenda }}</td> <br>
        </div>
    </div>
    <div class="container-fluid">
        <p style="text-indent: 50px; height: 10px;">
            Adapun peralatan yang akan kami pergunakan, antara lain :
        </p>
        <div class="container-fluid">
            @for ($i = 0; $i < count($peralatan); $i++)
            <div class="row">
                <div class="col col-2"><b>{{ $peralatan[$i]->nama }}</b></div>
                @if ($peralatan[$i]->nama != 'AC')
                    <div class="col col-2">: {{ $peralatan[$i]->jumlah }} Buah</div><br>
                @else
                    <div class="col col-2">: {{ $peralatan[$i]->jumlah }} Unit</div><br>
                @endif
            </div>
            @endfor
            @for ($i = 0; $i < count($perlengkapan); $i++)
            <div class="row">
                <div class="col col-2"><b>{{ $perlengkapan[$i]->nama }}</b></div>
                @if ($perlengkapan[$i]->nama !== 'Sound System')
                    <div class="col">: {{ $perlengkapan[$i]->jumlah }} m <sup>2</sup></div><br>
                @else
                    <div class="col">: {{ $perlengkapan[$i]->jumlah }} Unit</div><br>
                @endif
            </div>
            @endfor
        </div>
        <p style="text-indent: 50px">
            Demikian surat permohonan ini diajukan dan atas perkenan Bapak, kami menyampaikan terima kasih.
        </p>
    </div>
    <div class="container-fluid" style="margin-top: -10px">
        <p style="font-family: Book Antiqua; text-indent: 10px">SURAT PENYATAAN PEMAKAIAN GEDUNG BAKORWIL PAMEKASAN</p>
        <div class="container-fluid px-5">
            <ol style="margin-top: -20px;">
                <li>Kami akan menempati Gedung Bakorwil IV Pamekasan setelah mendaftarkan diri ke
                    petugas Gedung serta sudah memperoleh surat izin dari Kepala Bakorwil IV
                    Pamekasan;</li>
                <li>Kami bersedia membayar Retribusi Gedung dan Perlengkapan yang dibutuhkan
                    setelah izin Pemakaian Gedung dikeluarkan;</li>
                <li>
                    Kami akan segera memberitahukan kepada petugas Gedung apabila sewaktu-waktu
                    terjadi pembatalan pemakaian Gedung dan tidak akan menuntut pengembalian uang
                    retribusi yang telah kami setor;
                </li>
                <li>Kami bersedia membatalkan kegiatan/pemekaian Gedung yang telah dipesan apabila
                    sewaktu-waktu Gedung akan dipakai untuk kepentingan Pemerintah dan dapat
                    berkoordinasi dengan baik dengan pihak penyedia layanan;</li>
                <li>Kami siap mengganti peralatan/perlengkapan yang rusak yang diakibatkan oleh
                    karena pekerjaan kegiatan kami;</li>
                <li>Kami bersedia diberi sanksi apabila melanggar surat pernyataan yang telah disepakati
                    bersama.</li>
            </ol>
        </div>
    </div>
    <div class="container " style="margin-top: 70px">
        <div class="row">
        </div>
    </div>
    <div class="col text-center">
        <div class="col-lg text-center">
            <span><br></span>
            <span>Penyewa:</span>
        </div>
    </div>
    </div>
    <div class="row" style="margin-top: 70px">
        <div class="col text-center">
            <h6><b><u>{{ $peminjam->nama_peminjam }}</u></b></h6>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
