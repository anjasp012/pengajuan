<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanDiskonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_diskon', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->timestamp('tanggal_pengajuan');
            $table->foreignId('id_projek')->constrained('projek', 'id_projek');
            $table->foreignId('id_produk');
            $table->foreignId('id_user');
            $table->foreignId('id_manager')->nullable();
            $table->string('harga_produk');
            $table->string('nilai_disc_pengajuan');
            $table->string('keterangan_pengajuan');
            $table->string('alasan_revisi')->nullable();
            $table->string('nilai_disc_disetujui')->nullable();
            $table->string('keterangan_disetujui')->nullable();
            $table->string('keterangan_pengajuan_2')->nullable();
            $table->string('nilai_disc_pengajuan_2')->nullable();
            $table->string('status_manager')->comment('0 = T, 1 = Y')->nullable();
            $table->foreignId('id_general_manager')->nullable();
            $table->string('keterangan_disetujui_2')->nullable();
            $table->string('nilai_setuju_2')->nullable();
            $table->string('tanggal_disetujui')->nullable();
            $table->string('status_disetujui')->comment('0 = proses, 1 = Y, 2 = T')->default(0);
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
        Schema::dropIfExists('pengajuan_diskon');
    }
}
