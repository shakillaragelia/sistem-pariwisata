<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        //tambah kolom tipe di wisatas
        Schema::table('wisatas', function (Blueprint $table) {
            $table->string('tipe')->default('wisata')->after('id_kategori');
        });

        //pindah data kuliner ke wisatas
        $kuliners = DB::table('kuliners')->get();
        foreach ($kuliners as $k) {
            DB::table('wisatas')->insert([
                'id_kategori' => $k->id_kategori,
                'tipe'        => 'kuliner',
                'nama'        => $k->nama,
                'slug'        => $k->slug,
                'deskripsi'   => $k->deskripsi,
                'harga'       => 0,
                'lokasi'      => '-',
                'gambar'      => $k->gambar,
                'created_at'  => $k->created_at,
                'updated_at'  => $k->updated_at,
            ]);
        }

        //pindah data senbud ke wisatas
        $senbuds = DB::table('senbuds')->get();
        foreach ($senbuds as $s) {
            DB::table('wisatas')->insert([
                'id_kategori' => $s->id_kategori,
                'tipe'        => 'senbud',
                'nama'        => $s->nama,
                'slug'        => $s->slug,
                'deskripsi'   => $s->deskripsi,
                'harga'       => 0,
                'lokasi'      => '-',
                'gambar'      => $s->gambar,
                'created_at'  => $s->created_at,
                'updated_at'  => $s->updated_at,
            ]);
        }
    }

    public function down(): void
    {
        //hapus data kuliner & senbud dari wisatas
        DB::table('wisatas')->whereIn('tipe', ['kuliner', 'senbud'])->delete();

        //hapus kolom tipe
        Schema::table('wisatas', function (Blueprint $table) {
            $table->dropColumn('tipe');
        });
    }
};