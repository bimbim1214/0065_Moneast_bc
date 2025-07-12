<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('buah', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_buah_id')->nullable()->after('id');
            $table->foreign('kategori_buah_id')->references('id')->on('kategori_buah')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('buah', function (Blueprint $table) {
            $table->dropForeign(['kategori_buah_id']);
            $table->dropColumn('kategori_buah_id');
        });
    }
};
