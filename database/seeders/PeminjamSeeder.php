<?php

namespace Database\Seeders;

use App\Models\Peminjam;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PeminjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img = "C:\Users\AlifCom\Pictures\Screenshots\contoh.png";
        $peminjam = [
            [
                'nama_peminjam' => 'Ahmad Hamdani',
                'alamat' => 'Pragaan Sumenep',
                'email' => 'hamdani@gmail.com',
                'no_hp' => '087623562322',
                'no_ktp' => '35988763423423',
                'foto_ktp' => $img,
                'agenda' => 'Seminar',
                'tgl_awal' => date('Y-m-d'),
                'tgl_akhir' => date('Y-m-d'),
                'waktu' => date('H:i:s'),
                'jam_operasional' => 5
            ],
            [
                'nama_peminjam' => 'Fiqo Hidayat',
                'alamat' => 'Kadur Pemekasan',
                'email' => 'fiqo@gmail.com',
                'no_hp' => '082345576756',
                'no_ktp' => '35823492802934',
                'foto_ktp' => md5('fiqo_ktp.jpg'),
                'agenda' => 'Pengajian',
                'tgl_awal' => date('Y-m-d'),
                'tgl_akhir' => date('Y-m-d'),
                'waktu' => date('H:i:s'),
                'jam_operasional' => 5
            ],
            [
                'nama_peminjam' => 'Ulil Abshar',
                'gedung_id' => 1,
                'alamat' => 'Dungkek Pamekasan',
                'email' => 'ulil@gmail.com',
                'no_hp' => '08321332423',
                'no_ktp' => '35827282539263',
                'foto_ktp' => md5('ulil_ktp.jpg'),
                'agenda' => 'Rapat Bisnis',
                'tgl_awal' => date('Y-m-d'),
                'tgl_akhir' => date('Y-m-d'),
                'waktu' => time('H:i:S'),
                'jam_operasional' => 5
            ],
            [
                'nama_peminjam' => 'Gus Ipul',
                'gedung_id' => 1,
                'alamat' => 'Karduluk Sumenep',
                'email' => 'gus@gmail.com',
                'no_hp' => '081762386678',
                'no_ktp' => '358172812787120',
                'foto_ktp' => md5('gus_ktp.jpg'),
                'agenda' => 'Resepsi Pernikahan',
                'tgl_awal' => date('Y-m-d'),
                'tgl_akhir' => date('Y-m-d'),
                'waktu' => time('H:i:S'),
                'jam_operasional' => 5
            ],
            [
                'nama_peminjam' => 'Ach. Tufaily',
                'gedung_id' => 1,
                'alamat' => 'Ganding Sumenep',
                'email' => 'tufaili@gmail.com',
                'no_hp' => '087233672819',
                'no_ktp' => '3527816429172893',
                'foto_ktp' => md5('tufaili_ktp.jpg'),
                'agenda' => 'Lomba Slot Barokah',
                'tgl_awal' => date('Y-m-d'),
                'tgl_akhir' => date('Y-m-d'),
                'waktu' => time('H:i:S'),
                'jam_operasional' => 15
            ],
            [
                'nama_peminjam' => 'Khoironi',
                'gedung_id' => 1,
                'alamat' => 'Pakong Pamekasan',
                'email' => 'roni@gmail.com',
                'no_hp' => '08566273822',
                'no_ktp' => '358237293820938',
                'foto_ktp' => md5('roni_ktp.jpg'),
                'agenda' => 'Pertemuan Bani',
                'tgl_awal' => date('Y-m-d'),
                'tgl_akhir' => date('Y-m-d'),
                'waktu' => time('H:i:S'),
                'jam_operasional' => 10
            ]
        ];

        foreach($peminjam as $val){
            Peminjam::create($val);
        }
    }
}
