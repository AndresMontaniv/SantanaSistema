<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productoId');
            $table->unsignedBigInteger('compraId');
            $table->integer('cantidad');
            $table->float('montoTotal');
            // $table->foreign('productoId')->references('id')->on('productos')->onUpdate('cascade')->onDelete('set null');
            // $table->foreign('compraId')->references('id')->on('compras')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('nota_compras');
    }
}
