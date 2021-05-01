<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idGastos');
            $table->unsignedBigInteger('idIngresos');
            
            $table->timestamps();

            /* $table->foreign('idGastos')->references('id')->on('gastos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idIngresos')->references('id')->on('pagos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reportes');
    }
}
