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
        Schema::table('prisions', function (Blueprint $table) {
            //
            $table->string('comentario', 400)->nullable($value = true);
            $table->bigInteger("puerto_portserver")->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prisions', function (Blueprint $table) {
            //
            $table->dropColumn(['comentario', 'puerto_portserver']);
        });
    }
};
