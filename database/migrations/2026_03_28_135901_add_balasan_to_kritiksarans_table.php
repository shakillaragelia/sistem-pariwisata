<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kritiksarans', function (Blueprint $table) {
            $table->string('email_pengirim')->nullable()->after('konten');
            $table->text('balasan')->nullable()->after('email_pengirim');
            $table->timestamp('dibalas_at')->nullable()->after('balasan');
        });
    }

    public function down(): void
    {
        Schema::table('kritiksarans', function (Blueprint $table) {
            $table->dropColumn(['email_pengirim', 'balasan', 'dibalas_at']);
        });
    }
};