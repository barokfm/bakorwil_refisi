<?php

namespace Database\Seeders;

use App\Models\Gedung;
use App\Models\Peminjam;
use App\Models\Rent;
use Illuminate\Database\Seeder;

class RentSeeder extends Seeder
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
                'gedung_id' => 1,
                'peminjam_id' => 1
            ],
            [
                'gedung_id' => 2,
                'peminjam_id' => 2
            ]
        ];

        foreach($value as $v){
            Rent::create($v);
        }
    }
}
