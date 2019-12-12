<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Factura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('mesa');
            $table->timestamp('horadeinicio');
            $table->unsignedBigInteger('idempleadoinicio');
            $table->timestamp('horadecierre')->nullable();
            $table->unsignedBigInteger('idempleadocierre')->nullable();
            $table->double('total', 8, 2);
            $table->foreign('idempleadoinicio')->references('id')->on('empleado');
            $table->foreign('idempleadocierre')->references('id')->on('empleado');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}