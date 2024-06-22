<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjams', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_hp');
            $table->string('no_ktp');
            $table->string('foto_ktp')->nullable();
            $table->string('agenda');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->time('waktu');
            $table->integer('jam_operasional');
            $table->boolean('status_sekertaris')->default(false);
            $table->boolean('status_kepala')->default(false);
            $table->timestamps();
        });
    }
    // public function

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjams');
    }
}
