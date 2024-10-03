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
        Schema::create('rawats', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->date('tanggal_masuk'); 
            $table->date('tanggal_keluar')->nullable(); 
            $table->uuid('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasien');
            $table->uuid('ruang_id');
            $table->foreign('ruang_id')->references('id')->on('ruang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawats');
    }
};
