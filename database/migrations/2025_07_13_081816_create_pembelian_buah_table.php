<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buah_id');
            $table->unsignedBigInteger('supplier_id');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('buah_id')->references('id')->on('buah')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('pembelian');
    }
};
