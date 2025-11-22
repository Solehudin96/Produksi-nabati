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
        Schema::table('lemburans', function (Blueprint $table) {
            $table->enum('status_approve', ['Menunggu', 'Disetujui', 'Ditolak'])->default('Menunggu')->after('keterangan');
        });
    }

    public function down()
    {
        Schema::table('lemburans', function (Blueprint $table) {
            $table->dropColumn('status_approve');
        });
    }

};
