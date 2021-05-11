<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productoId')->nullable();
            $table->unsignedBigInteger('ventaId');
            $table->integer('cantidad');
            $table->float('montoTotal');
            // $table->foreign('productoId')->references('id')->on('productos')->onUpdate('cascade')->onDelete('set null');
            // $table->foreign('ventaId')->references('id')->on('ventas')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('nota_ventas');
    }
}
