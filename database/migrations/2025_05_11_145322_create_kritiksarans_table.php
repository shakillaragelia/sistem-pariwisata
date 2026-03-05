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
        Schema::create('kritiksarans', function (Blueprint $table) {
            $table->string('nama')->nullable()->after('id_user');
    $table->string('email')->nullable()->after('nama');
            $table->id('id_kritiksaran');
            $table->foreignId('id_user');
            $table->string('subjek');
            $table->text('konten');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kritiksarans');
    }
};
