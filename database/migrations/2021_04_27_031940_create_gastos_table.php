<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('gastosPersonales')->nullable();
            $table->unsignedBigInteger('sb')->nullable();
            $table->unsignedBigInteger('compras')->nullable();
            $table->float('total');
            $table->timestamps();
            // $table->foreign('gastosPersonales')->references('id')->on('gasto_personals')->onUpdate('cascade')->onDelete('set null');
            // $table->foreign('sb')->references('id')->on('servicio_basicos')->onUpdate('cascade')->onDelete('set null');
            // $table->foreign('compras')->references('id')->on('compras')->onUpdate('cascade')->onDelete('set null');

        
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}
