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
        Schema::table('galeri', function (Blueprint $table) {
            $table->foreignId('kategori_id')->nullable()->after('kategori')->constrained('kategori_galeri')->onDelete('set null');
            $table->dropColumn('kategori'); // Hapus kolom kategori lama
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galeri', function (Blueprint $table) {
            $table->string('kategori')->after('gambar');
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }
};
