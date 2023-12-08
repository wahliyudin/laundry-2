<?php

use App\Enums\StatusBayar;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->dateTime('tanggal_masuk');
            $table->dateTime('tanggal_ambil')->nullable();
            $table->foreignId('konsumen_id');
            $table->foreignId('paket_id');
            $table->integer('berat');
            $table->string('status_bayar')->default(StatusBayar::BELUM_LUNAS);
            $table->integer('jumlah_bayar')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
