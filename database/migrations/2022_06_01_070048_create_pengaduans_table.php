<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('user_nik');
            $table->string('nama');
            $table->integer('user_id');
            $table->string('judul_pengaduan');
            $table->text('keterangan');
            $table->string('kategori_pengaduan');
            $table->string('tanggal_perizinan');
            $table->string('status')->default('Belum di Proses')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('pengaduans');
    }
}
