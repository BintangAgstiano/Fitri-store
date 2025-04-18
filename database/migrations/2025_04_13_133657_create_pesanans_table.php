<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
$table->text('alamat');
$table->string('no_hp');
$table->string('bukti_pembayaran');
$table->string('tanggal_pesan');
$table->string('estimasi');
$table->string('status');
$table->string('uk');
$table->string('title');
$table->string('foto_produk');
$table->string('jumlah_pesanan');
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
        Schema::dropIfExists('pesanans');
    }
};
