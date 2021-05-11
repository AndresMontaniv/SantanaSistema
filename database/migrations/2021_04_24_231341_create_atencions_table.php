<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atencions', function (Blueprint $table) {
            $table->id();
            $table->float('montoTotal');
            $table->unsignedBigInteger('clienteId');
            $table->unsignedBigInteger('empleadoId');
            $table->unsignedBigInteger('servicioId');
            $table->unsignedBigInteger('metodoId');
            $table->timestamps();

            // $table->foreign('clienteId')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('set null');
            // $table->foreign('empleadoId')->references('id')->on('empleados')->onUpdate('cascade')->onDelete('set null');
            // $table->foreign('servicioId')->references('id')->on('servicios')->onUpdate('cascade')->onDelete('set null');
            // $table->foreign('metodoId')->references('id')->on('metodos')->onUpdate('cascade')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atencions');
    }
}
