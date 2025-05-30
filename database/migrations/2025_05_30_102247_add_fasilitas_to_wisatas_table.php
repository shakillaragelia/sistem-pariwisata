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
        Schema::table('wisatas', function (Blueprint $table) {
            $table->boolean('toilet')->default(false);
            $table->boolean('parkir')->default(false);
            $table->boolean('tempat_ibadah')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('wisatas', function (Blueprint $table) {
        $table->dropColumn(['toilet', 'parkir', 'tempat_ibadah']);
    });
}
};
