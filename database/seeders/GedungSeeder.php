<?php

namespace Database\Seeders;

use App\Models\Gedung;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gedung = [
            [
                'nama' => 'Gedung Pertemuan',
                'harga' => 600000,
                'image' => Hash::make('bakorwil.jpg')
            ],
            // [
            //     'nama' => 'Gedung Rapat',
            //     'harga' => 600000,
            //     'image' => Hash::make('rapat.jpg')
            // ]
        ];
        foreach ($gedung as $ged) {
            Gedung::create($ged);
        }
    }
}
