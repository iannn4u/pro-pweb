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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->integer('nis');
            $table->string('kelas');
            $table->string('kd_mapel');
            $table->decimal('kehadiran',10,0);
            $table->decimal('tugas',10,0);
            $table->decimal('formatif',10,0);
            $table->decimal('uts',10,0);
            $table->decimal('uas',10,0);
            $table->decimal('nilai_akhir',10,0);
            $table->string('grade', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
