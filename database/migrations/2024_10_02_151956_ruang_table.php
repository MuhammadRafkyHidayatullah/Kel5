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
        Schema::create('ruang', function (Blueprint $table) {
            $table->uuid('id_ruangan');
            $table->primary('id_ruangan');
            $table->string('ruangan');
            $table->string('nama_gedung');
            $table->uuid('dokter_id');
            $table->foreign('dokter_id')->references('id')->on('dokter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
