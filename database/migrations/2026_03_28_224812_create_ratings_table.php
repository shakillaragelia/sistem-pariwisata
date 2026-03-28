<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->morphs('rateable');
            $table->tinyInteger('rating')->unsigned();
            $table->timestamps();

            // Satu user hanya bisa rating sekali per item
            $table->unique(['id_user', 'rateable_id', 'rateable_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};