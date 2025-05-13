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
        Schema::create('senbuds', function (Blueprint $table) {
            $table->id('id_senbud');
            $table->varchar('nama');
            $table->varchar('slug');
            $table->varchar('kategori');
            $table->text('deskripsi');
            $table->varchar('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senbuds');
    }
};
