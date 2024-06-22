<?php

namespace Database\Seeders;

use App\Models\Perlengkapan;
use Illuminate\Database\Seeder;

class PerlengkapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $value = [
            [
                'peminjam_id' => 1,
                'nama' => 'Sound System',
                'jumlah' => 1,
                'harga' => 500000
            ],
            [
                'peminjam_id' => 1,
                'nama' => 'Space Promotion',
                'jumlah' => 1,
                'harga' => 100000
            ],
            [
                'peminjam_id' => 1,
                'nama' => 'Area kantor dan Halaman',
                'jumlah' => 1,
                'harga' => 10000
            ],
            [
                'peminjam_id' => 2,
                'nama' => 'Sound System',
                'jumlah' => 1,
                'harga' => 500000
            ],
            [
                'peminjam_id' => 2,
                'nama' => 'Space Promotion',
                'jumlah' => 1,
                'harga' => 100000
            ],
            [
                'peminjam_id' => 2,
                'nama' => 'Area kantor dan Halaman',
                'jumlah' => 1,
                'harga' => 10000
            ]
        ];

        foreach($value as $v){
            Perlengkapan::create($v);
        }
    }
}
