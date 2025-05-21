<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Tambahkan kolom polymorphic jika belum ada
        Schema::table('komentars', function (Blueprint $table) {
            if (!Schema::hasColumn('komentars', 'commentable_id')) {
                $table->unsignedBigInteger('commentable_id')->nullable()->after('id_user');
            }
            if (!Schema::hasColumn('komentars', 'commentable_type')) {
                $table->string('commentable_type')->nullable()->after('commentable_id');
            }
        });

        // Hapus foreign key dan kolom id_wisata jika masih ada
        if (Schema::hasColumn('komentars', 'id_wisata')) {
            try {
                DB::statement('ALTER TABLE komentars DROP FOREIGN KEY komentars_id_wisata_foreign');
            } catch (\Exception $e) {
                // Abaikan jika foreign key sudah tidak ada
            }

            Schema::table('komentars', function (Blueprint $table) {
                if (Schema::hasColumn('komentars', 'id_wisata')) {
                    $table->dropColumn('id_wisata');
                }
            });
        }
    }

    public function down(): void
    {
        Schema::table('komentars', function (Blueprint $table) {
            if (Schema::hasColumn('komentars', 'commentable_id')) {
                $table->dropColumn('commentable_id');
            }
            if (Schema::hasColumn('komentars', 'commentable_type')) {
                $table->dropColumn('commentable_type');
            }

            if (!Schema::hasColumn('komentars', 'id_wisata')) {
                $table->foreignId('id_wisata')->nullable()->constrained('wisatas')->onDelete('cascade');
            }
        });
    }
};
