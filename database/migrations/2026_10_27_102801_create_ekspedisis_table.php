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
        Schema::create('ekspedisi', function (Blueprint $table) {
    $table->string('kode')->primary();
    $table->string('nama_ekspedisi');
    $table->string('nomor_telepon');
    $table->string('layanan');
    $table->string('zonasi');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekspedisi');
    }
};
