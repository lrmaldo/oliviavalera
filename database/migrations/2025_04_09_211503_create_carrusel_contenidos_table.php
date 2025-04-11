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
        Schema::create('carrusel_contenidos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('archivo'); // ruta del archivo (imagen o video)
            $table->enum('tipo', ['imagen', 'video']); // tipo de contenido
            $table->integer('orden')->default(0); // orden de aparición
            $table->boolean('activo')->default(true); // mostrar o no en el carrusel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrusel_contenidos');
    }
};
