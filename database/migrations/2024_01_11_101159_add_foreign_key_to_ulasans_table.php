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
        Schema::table('ulasans', function (Blueprint $table) {
            // Menambah kolom foreign key
            $table->unsignedBigInteger('id_tujuan')->nullable();

            // Menambah constraint foreign key
            $table->foreign('id_tujuan')
                ->after('id')
                ->references('id')
                ->on('tujuans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ulasans', function (Blueprint $table) {
            // Menghapus constraint foreign key
            $table->dropForeign(['id_tujuan']);

            // Menghapus kolom foreign key
            $table->dropColumn('id_tujuan');
        });
    }
};
