<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnomaliasTable extends Migration
{
    public function up()
    {
        Schema::create('anomalias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto_pedido')
                ->constrained('producto_pedido')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('cantidad_i');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anomalias');
    }
}