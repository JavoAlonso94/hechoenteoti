<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reserva_personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserva_id')->constrained('reservas')->cascadeOnDelete();
            $table->string('nombre');
            $table->string('apellidos');
            $table->decimal('peso', 5, 2);
            $table->date('fecha_nacimiento');
            $table->unsignedTinyInteger('edad');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reserva_personas');
    }
};
