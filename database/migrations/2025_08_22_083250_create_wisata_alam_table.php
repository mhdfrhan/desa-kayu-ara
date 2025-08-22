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
        Schema::create('wisata_alam', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->string('gambar');
            $table->string('kategori');
            $table->string('lokasi');
            $table->text('fasilitas')->nullable();
            $table->text('cara_menuju')->nullable();
            $table->string('jam_operasional')->nullable();
            $table->string('harga_tiket')->nullable();
            $table->string('kontak')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('aktif')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisata_alam');
    }
};
