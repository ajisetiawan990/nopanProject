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
        Schema::create('tb_tanggapan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengaduan')->references('id_pengaduan')->on('tb_pengaduan');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->date('tgl_tanggapan');
            $table->string('tanggapan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggapan');
    }
};
