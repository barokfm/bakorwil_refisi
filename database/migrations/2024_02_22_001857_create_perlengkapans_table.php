<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerlengkapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perlengkapans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjam_id')->references('id')->on('peminjams');
            $table->string('nama');
            $table->smallInteger('jumlah');
            $table->Integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perlengkapans');
    }
}
