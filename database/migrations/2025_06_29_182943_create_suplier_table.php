<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('telepon');
            $table->integer('jumlah');
            $table->unsignedBigInteger('buah_id')->nullable();
            $table->string('keterangan')->nullable(); // akan diisi otomatis dari relasi buah
            $table->timestamps();

            $table->foreign('buah_id')->references('id')->on('buah')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
