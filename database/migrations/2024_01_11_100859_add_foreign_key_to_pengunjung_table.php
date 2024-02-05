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
        Schema::table('pengunjungs', function (Blueprint $table) {
            // Menambah kolom foreign key
            $table->unsignedBigInteger('id_divisi')->nullable();

            // Menambah constraint foreign key
            $table->foreign('id_divisi')
                ->after('id')
                ->references('id')
                ->on('divisis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengunjung', function (Blueprint $table) {
            // Menghapus constraint foreign key
            $table->dropForeign(['id_divisi']);

            // Menghapus kolom foreign key
            $table->dropColumn('id_divisi');
        });
    }
};
