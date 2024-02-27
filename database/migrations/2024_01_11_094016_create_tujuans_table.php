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
        Schema::create('tujuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengunjungs');
            $table->foreign('id_pengunjungs')->references('id')->on('pengunjungs')->nullable();
            $table->unsignedBigInteger('id_divisi');
            $table->foreign('id_divisi')->references('id')->on('divisis')->nullable();
            $table->boolean('status')->default(0);
            $table->string('tujuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tujuans');
    }
};
