<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paquete_id')->constrained('paquetes');
            $table->string('contacto_nombre');
            $table->string('contacto_telefono');
            $table->string('contacto_correo');
            $table->unsignedInteger('num_personas');
            $table->unsignedInteger('total');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
