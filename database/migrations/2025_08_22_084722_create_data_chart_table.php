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
        Schema::create('data_chart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chart_id')->constrained('chart_statistik')->onDelete('cascade');
            $table->string('label');
            $table->decimal('nilai', 10, 2);
            $table->string('warna')->nullable();
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('data_chart');
    }
};
