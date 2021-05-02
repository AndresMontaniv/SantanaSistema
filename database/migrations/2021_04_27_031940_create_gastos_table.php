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
            $table->unsignedBigInteger('idGastosPersonales')->nullable();
            $table->unsignedBigInteger('idPagosSB')->nullable();
            $table->timestamps();
        
           /*  $table->foreign('idGastosPersonales')->references('id')->on('gastosPersonales')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idPagoSV')->references('id')->on('pagoSV')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('gastos');
    }
}
