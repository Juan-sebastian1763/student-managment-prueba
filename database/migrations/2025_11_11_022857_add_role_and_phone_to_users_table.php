<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Se asume que 'phone' será un string (VARCHAR en MySQL)
            $table->string('phone', 15)->nullable()->after('email'); 
            
            // 'role' se define como un ENUM o un string, dependiendo de tus necesidades
            $table->enum('role', ['admin', 'student'])->default('student')->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Importante: Debes eliminar las columnas en down()
            $table->dropColumn(['phone', 'role']);
        });
    }
};