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
        Schema::table('postagens', function (Blueprint $table) {
            $table->unsignedBigInteger('aprovado_por')->nullable()->after('situacao');
            $table->foreign('aprovado_por')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postagens', function (Blueprint $table) {
            $table->dropForeign(['aprovado_por']);
            $table->dropColumn('aprovado_por');
        });
    }
};
