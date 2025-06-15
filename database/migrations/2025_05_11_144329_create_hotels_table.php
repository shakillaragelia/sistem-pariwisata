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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id('id_hotel');
            $table->string('nama');
            $table->string('slug');
            $table->text('deskripsi');
            $table->text('lokasi');
            $table->string('gambar');
            $table->tinyInteger('bintang')->nullable();
            $table->integer('harga_max');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
