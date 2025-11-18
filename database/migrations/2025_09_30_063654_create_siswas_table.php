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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis', length:6)->unique();
            $table->string('nama_siswa', length:64);
            $table->enum('kelas', ['X', 'XI', 'XII']);
            $table->enum('jurusan', ['TSM', 'TKR', 'TKJ', 'RPL', 'TB']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
