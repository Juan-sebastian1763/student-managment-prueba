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
        // Usa la sintaxis recomendada y limpia para especificar el motor
        Schema::create('course_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Clave única compuesta: Un usuario solo puede estar inscrito una vez en un curso.
            $table->unique(['user_id', 'course_id']); 
        
        // La propiedad 'engine' se especifica como un tercer argumento (opcional) en algunas versiones 
        // o con el método chaineado, pero en versiones modernas, es mejor incluirla aquí:
        }); 
        
        // Si tu versión de Laravel es antigua y necesitas especificar el motor:
        // Opción 1 (más compatible con las versiones recientes):
        Schema::getConnection()->statement('ALTER TABLE course_user ENGINE = InnoDB;');

        // Opcional: Si quieres usar la sintaxis sencilla que falló, quítala de arriba
        // y úsala aquí, si funciona en tu versión de Laravel:
        // Schema::table('course_user', function (Blueprint $table) {
        //     $table->engine = 'InnoDB'; 
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Asegura que la tabla se borra si existe
        Schema::dropIfExists('course_user');
    }
};