<?php

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
        Schema::create('servis_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_servis');
            $table->string('nama_pelanggan');
            $table->string('nomor_hp');
            $table->string('nama_unit');
            $table->string('nomor_unit')->nullable();
            $table->timestamp('tanggal_masuk')->default(now());
            $table->text('keluhan');
            $table->string('nama_teknisi');
            $table->enum('status', ['Dalam antrian', 'Pengecekan', 'Pengerjaan', 'Selesai'])
                  ->default('Dalam antrian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servis_masuk');
    }
};
