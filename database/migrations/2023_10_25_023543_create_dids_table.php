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
        Schema::create('dids', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',10);
            $table->string('comentario',50);
            $table->unsignedBigInteger('prision_id');
            $table->foreign('prision_id')->references('id')->on('prisions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dids');
    }
};
