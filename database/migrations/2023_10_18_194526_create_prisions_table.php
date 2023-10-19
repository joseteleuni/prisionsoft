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
        Schema::create('prisions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->string('codigo', 3);
            $table->string('did', 10);
            $table->unsignedInteger('num_gw');
            $table->unsignedInteger('num_tpe');
            $table->string('ubicacion');
            $table->enum('implementacion', ['directo', 'dni-pin','saldo']);
            $table->enum('fo', ['ok', 'nok']);
            $table->enum('starlink', ['ok', 'nok']);
            $table->enum('vpn', ['ok', 'nok']);
            $table->timestamps();

            //
            //Calculados
            $table->bigInteger("puerto_pbx")->nullable($value = true);
            $table->bigInteger("puerto_winbox")->nullable($value = true);
            $table->string("dominio")->nullable($value = true);
            $table->string("ip")->nullable($value = true);
            //
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prisions');
    }
};
