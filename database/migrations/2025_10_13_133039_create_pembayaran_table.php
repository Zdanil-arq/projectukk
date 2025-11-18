<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('jenis_pembayaran', 64); // contoh: kas, kaos kelas, iuran snack, dsb
            $table->decimal('jumlah_bayar', 15, 2);
            $table->date('tanggal_bayar')->default(DB::raw('CURRENT_DATE'));
            $table->string('keterangan')->nullable(); // opsional, bisa isi “Cicilan ke-1” dsb
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
