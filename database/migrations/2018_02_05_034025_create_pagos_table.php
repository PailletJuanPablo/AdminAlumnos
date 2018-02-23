<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha_pago');
            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')
      ->references('id')->on('alumnos');
      $table->mediumInteger('monto_pagado')->unsigned();
      $table->integer('numero_cuota');	
      $table->string('observaciones');	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
