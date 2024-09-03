<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeColumnsNullableInProductoPedidoTable extends Migration
{
    public function up()
    {
        Schema::table('producto_pedido', function (Blueprint $table) {
            $table->foreignId('id_almacen')->nullable()->change();
            $table->foreignId('id_rack')->nullable()->change();
            $table->foreignId('id_estante')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('producto_pedido', function (Blueprint $table) {
            $table->foreignId('id_almacen')->nullable(false)->change();
            $table->foreignId('id_rack')->nullable(false)->change();
            $table->foreignId('id_estante')->nullable(false)->change();
        });
    }
}