<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->date('tanggal_mulai')->nullable()->after('deskripsi');
            $table->date('tanggal_selesai')->nullable()->after('tanggal_mulai');
            $table->string('lokasi')->nullable()->after('tanggal_selesai');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['tanggal_mulai', 'tanggal_selesai', 'lokasi']);
        });
    }
};