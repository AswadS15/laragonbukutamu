<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pengunjungs', function (Blueprint $table) {
            $table->string('email')->nullable()->after('nama'); // Sesuaikan posisi kolom
        });
    }

    public function down()
    {
        Schema::table('pengunjungs', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
};
