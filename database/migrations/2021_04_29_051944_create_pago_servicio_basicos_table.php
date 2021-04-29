<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoServicioBasicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_servicio_basicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servicioBasico_id')->nullable();
            $table->float('monto');
            $table->foreign('servicioBasico_id')->references('id')->on('servicio_basicos')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('pago_servicio_basicos');
    }
}
