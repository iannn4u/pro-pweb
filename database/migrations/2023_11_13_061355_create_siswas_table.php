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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('nis');
            $table->string('nama_siswa');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('agama');
            $table->integer('id_kelas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
