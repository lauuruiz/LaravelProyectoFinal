<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comanda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('comanda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idfactura');
            $table->unsignedBigInteger('idproducto');
            $table->unsignedBigInteger('idempleado');
            $table->tinyInteger('unidades');
            $table->double('precio', 8, 2);
            $table->boolean('entregada');
            $table->foreign('idfactura')->references('id')->on('factura');
            $table->foreign('idproducto')->references('id')->on('producto');
            $table->foreign('idempleado')->references('id')->on('empleado');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comanda');
    }
}
