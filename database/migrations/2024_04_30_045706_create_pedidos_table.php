<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->date('fecha');
            $table->unsignedBigInteger('id_estados')->nullable();
            $table->unsignedBigInteger('id_proveedores')->nullable();
            $table->unsignedBigInteger('id_emisores')->nullable();
            $table->unsignedBigInteger('id_receptores')->nullable();
            $table->string('numero_albaran')->nullable();
            $table->text('observaciones')->nullable();
            $table->json('inventario')->nullable();
            $table->timestamps();

            $table->foreign('id_estados')->references('id')->on('estados')->onDelete('set null')->onUpdate('set null');
            $table->foreign('id_proveedores')->references('id')->on('proveedores')->onDelete('set null')->onUpdate('set null');
            $table->foreign('id_emisores')->references('id')->on('emisores')->onDelete('set null')->onUpdate('set null');
            $table->foreign('id_receptores')->references('id')->on('receptores')->onDelete('set null')->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}