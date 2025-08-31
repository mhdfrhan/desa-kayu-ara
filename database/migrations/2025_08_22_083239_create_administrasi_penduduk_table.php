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
        Schema::create('administrasi_penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('nilai');
            $table->string('satuan');
            $table->string('deskripsi');
            $table->string('warna_icon')->default('green');
            $table->string('icon')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrasi_penduduk');
    }
};
