<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('komentars', function (Blueprint $table) {
        // Tambahkan kolom polymorphic
        $table->unsignedBigInteger('commentable_id')->nullable()->after('id_user');
        $table->string('commentable_type')->nullable()->after('commentable_id');
    });

    // Drop foreign key dan kolom di luar closure
    if (Schema::hasColumn('komentars', 'id_wisata')) {
        // Hapus foreign key kalau ada
        DB::statement('ALTER TABLE komentars DROP FOREIGN KEY komentars_id_wisata_foreign');

        // Baru hapus kolomnya
        Schema::table('komentars', function (Blueprint $table) {
            $table->dropColumn('id_wisata');
        });
    }
}


    public function down(): void
    {
        Schema::table('komentars', function (Blueprint $table) {
            $table->dropColumn(['commentable_id', 'commentable_type']);
            $table->foreignId('id_wisata')->nullable()->constrained('wisatas')->onDelete('cascade');
        });
    }
};
