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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('ativo')->after('tipo')->default(true);
        });

        Schema::table('postagens', function (Blueprint $table) {
            $table->boolean('ativo')->after('user_id')->default(true);
        });

        Schema::table('comentarios', function (Blueprint $table) {
            $table->boolean('ativo')->after('postagem_id')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ativo');
        });

        Schema::table('postagens', function (Blueprint $table) {
            $table->dropColumn('ativo');
        });

        Schema::table('comentarios', function (Blueprint $table) {
            $table->dropColumn('ativo');
        });
    }
};
