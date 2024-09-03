<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUserToProductoPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('producto_pedido', function (Blueprint $table) {
            // Añadir la columna id_user como FK
            $table->unsignedBigInteger('id_user')->nullable(); // Cambia 'some_existing_column' por una columna existente si es necesario

            // Definir la clave foránea
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null')
                  ->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producto_pedido', function (Blueprint $table) {
            // Eliminar la clave foránea y la columna
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');
        });
    }
}