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
       Schema::create('wisatas', function (Blueprint $table) {
    $table->id('id_wisata');

    $table->foreignId('id_kategori')
          ->constrained('kategoris', 'id_kategori')
          ->onDelete('cascade');

    $table->string('nama');
    $table->string('slug')->unique();
    $table->text('deskripsi');
    $table->decimal('harga', 12, 2)->nullable();
    $table->text('lokasi');
    $table->string('gambar');

    // Koordinat (untuk rekomendasi terdekat)
    $table->decimal('latitude', 10, 7)->nullable();
    $table->decimal('longitude', 10, 7)->nullable();

    // Fasilitas
    $table->boolean('toilet')->default(false);
    $table->boolean('parkir')->default(false);
    $table->boolean('tempat_ibadah')->default(false);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};
