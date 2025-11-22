<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('izins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawan_id');
            $table->date('tanggal');
            $table->string('jenis'); // izin / sakit
            $table->text('keterangan')->nullable();
            $table->string('file_bukti')->nullable(); // upload surat
            $table->string('status')->default('pending'); // pending, disetujui, ditolak
            $table->timestamps();

            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
        });
    }

};
