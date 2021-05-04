<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('idVentas')->nullable();
            $table->unsignedBigInteger('idPagos')->nullable();
            $table->float('total');
            $table->timestamps();

            /* $table->foreign('idVentas')->references('id')->on('ventas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idPagos')->references('id')->on('pagos')->onDelete('cascade')->onUpdate('cascade');
         */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
}
