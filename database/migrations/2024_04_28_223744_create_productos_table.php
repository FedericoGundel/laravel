<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('ean')->nullable();
            $table->string('codigo')->unique();
            $table->string('nombre')->nullable();
            $table->unsignedBigInteger('id_familia_producto')->nullable();
            $table->unsignedBigInteger('id_almacenes')->nullable();
            $table->unsignedBigInteger('id_racks')->nullable();
            $table->unsignedBigInteger('id_estantes')->nullable();
            $table->string('foto')->default("0");
            $table->integer('cantidad')->default(0)->nullable();
            $table->string('tipo_unidad')->nullable();
            $table->timestamps();

            // Definir las claves foráneas con las restricciones necesarias
           
            $table->foreign('id_familia_producto')->references('id')->on('familia_producto')->onDelete('set null')->onUpdate('set null');
            $table->foreign('id_almacenes')->references('id')->on('almacenes')->onDelete('set null')->onUpdate('set null');
            $table->foreign('id_racks')->references('id')->on('racks')->onDelete('set null')->onUpdate('set null');
            $table->foreign('id_estantes')->references('id')->on('estantes')->onDelete('set null')->onUpdate('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}