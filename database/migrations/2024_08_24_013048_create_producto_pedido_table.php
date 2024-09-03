<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_pedido', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto')
                  ->constrained('productos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('id_pedido') 
                  ->constrained('pedidos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('id_almacen')
                  ->constrained('almacenes')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('id_rack')
                  ->constrained('racks')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('id_estante')
                  ->constrained('estantes')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->integer('cantidad');
            $table->boolean('verificado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_pedido');
    }
}