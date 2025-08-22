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
        Schema::create('produk_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->string('gambar');
            $table->string('kategori');
            $table->decimal('harga', 10, 2);
            $table->string('satuan');
            $table->decimal('harga_diskon', 10, 2)->nullable();
            $table->integer('persentase_diskon')->nullable();
            $table->string('nomor_wa');
            $table->text('pesan_wa');
            $table->string('rating')->default('4.5');
            $table->integer('terjual')->default(0);
            $table->boolean('featured')->default(false);
            $table->boolean('best_seller')->default(false);
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
        Schema::dropIfExists('produk_desa');
    }
};
