<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produksis', function (Blueprint $table) {
            // Tambahkan kolom planing, actual, dan tanggal_produksi
            if (!Schema::hasColumn('produksis', 'planing')) {
                $table->integer('planing')->default(0);
            }
            if (!Schema::hasColumn('produksis', 'actual')) {
                $table->integer('actual')->default(0);
            }
            if (!Schema::hasColumn('produksis', 'tanggal_produksi')) {
                $table->date('tanggal_produksi')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('produksis', function (Blueprint $table) {
            $table->dropColumn(['planing', 'actual', 'tanggal_produksi']);
        });
    }
};
