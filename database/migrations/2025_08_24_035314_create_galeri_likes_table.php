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
        Schema::create('galeri_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('galeri_id')->constrained('galeri')->onDelete('cascade');
            $table->string('ip_address');
            $table->string('user_agent')->nullable();
            $table->timestamps();

            // Kombinasi galeri_id dan ip_address harus unique untuk mencegah spam like
            $table->unique(['galeri_id', 'ip_address']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri_likes');
    }
};
