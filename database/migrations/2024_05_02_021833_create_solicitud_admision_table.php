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
        Schema::create('solicitud_admision', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->default('Pendiente');
            $table->string('username');
            $table->string('password');
            // Puedes agregar más columnas según sea necesario

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_admision');
    }
};