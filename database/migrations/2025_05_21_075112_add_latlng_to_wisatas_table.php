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
        $table->decimal('latitude', 10, 8)->nullable();
        $table->decimal('longitude', 11, 8)->nullable();
    });
}

public function down(): void
{
    Schema::table('wisatas', function (Blueprint $table) {
        if (Schema::hasColumn('wisatas', 'latitude')) {
            $table->dropColumn('latitude');
        }
        if (Schema::hasColumn('wisatas', 'longitude')) {
            $table->dropColumn('longitude');
        }
    });
}



};
