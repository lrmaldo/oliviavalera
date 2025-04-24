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
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono', 10);
            $table->string('colonia');
            /* otra_colonia */
            $table->string('otra_colonia')->nullable(); // Para el caso de que la colonia no esté en la lista
            /* otra_localidad */
            $table->string('otra_localidad')->nullable(); // Para el caso de que la localidad no esté en la lista
            $table->string('localidad');
            $table->json('necesidades')->nullable(); // Para guardar múltiples opciones
            $table->string('mac_address')->nullable(); // MAC del dispositivo (si la puedes capturar)
            //tipo de dispositivo
            $table->string('tipo_dispositivo')->nullable(); // Tipo de dispositivo (si la puedes capturar)
            //tipo de sistema
            $table->string('tipo_sistema')->nullable(); // Tipo de sistema (si la puedes capturar)
            // navegador
            $table->string('navegador')->nullable(); // Navegador (si la puedes capturar)

            $table->timestamps();
            $table->softDeletes(); // Para manejar eliminaciones suaves
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
