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
        Schema::table('sambutan_kepala_desa', function (Blueprint $table) {
            // Drop kolom yang tidak diperlukan
            $table->dropColumn(['nama', 'jabatan', 'periode', 'foto']);

            // Tambah foreign key ke struktur organisasi
            $table->foreignId('struktur_organisasi_id')->constrained('struktur_organisasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sambutan_kepala_desa', function (Blueprint $table) {
            // Drop foreign key
            $table->dropForeign(['struktur_organisasi_id']);
            $table->dropColumn('struktur_organisasi_id');

            // Restore kolom yang dihapus
            $table->string('nama');
            $table->string('jabatan');
            $table->string('periode');
            $table->string('foto');
        });
    }
};
