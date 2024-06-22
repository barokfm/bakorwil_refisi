<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\Peminjam;
use App\Models\Perlengkapan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $jabatan = [
            [
                'nama_jabatan' => 'Admin'
            ],
            [
                'nama_jabatan' => 'Kepala'
            ],
            [
                'nama_jabatan' => 'Sekretaris'
            ],
        ];
        foreach($jabatan as $j){
            Jabatan::create($j);
        }

        $userData = [
            [
                'jabatan_id' => 1,
                'name' => 'Mas Admin',
                'email' => 'admin@gmail.com',
                'avatar' => 'avatar/RFZX3F4JBRIsdr5dVwbaw9lcuYJQirA4TSkIZ6Y8.png',
                'password' => bcrypt('123456')
            ],
            [
                'jabatan_id' => 2,
                'name' => 'Mas kepala',
                'email' => 'kepala@gmail.com',
                'avatar' => 'avatar/snG0Q84140gZ5qq3RhY4SSFH6rgqW9M2WdHQSxGN.png',
                'password' => bcrypt('123456')
            ],
            [
                'jabatan_id' => 3,
                'name' => 'Mas sekertaris',
                'email' => 'sekertaris@gmail.com',
                'avatar' => 'avatar/Ln42gl4TUr3TRuKznFSJNPGZNCxMQhh8H3F8S8BV.png',
                'password' => bcrypt('123456')

            ],
        ];
        foreach ($userData as $user) {
            User::create($user);
        }

        $this->call([
            GedungSeeder::class,
            // PeminjamSeeder::class,
            // PeralatanSeeder::class,
            // PerlengkapanSeeder::class,
            // RentSeeder::class
        ]);
        // \App\Models\Peminjam::factory(2)->create();
    }
}
