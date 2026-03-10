<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
{
    DB::table('hotels')->update(['gambar' => '[]']);

    Schema::table('hotels', function (Blueprint $table) {
        $table->json('gambar')->nullable()->change();
    });
}


    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->string('gambar')->nullable()->change();
        });
    }
};