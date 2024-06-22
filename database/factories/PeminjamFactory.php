<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PeminjamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_peminjam' => $this->faker->name() ,
            'alamat' =>$this->faker->address() ,
            'email' =>$this->faker->email(),
            'no_hp' =>$this->faker->phoneNumber(),
            'no_ktp' =>$this->faker->nik(),
            'foto_ktp' => 'null',
            'agenda' =>$this->faker->words(),
            'tgl_acara' =>$this->faker->date('Y-m-d'),
            'waktu' =>$this->faker->time('H:i:s'),
            'sound_system' => 'ya',
            'kursi' => $this->faker->numberBetween(1,150),
            'area' => 'tidak',
            'ac' => $this->faker->randomDigitNotNull()
        ];
    }
}
