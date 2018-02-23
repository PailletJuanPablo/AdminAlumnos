<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')
      ->references('id')->on('alumnos');
      $table->integer('clase_id')->unsigned();
      $table->foreign('clase_id')
->references('id')->on('clases');
$table->string('asistio');
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
        Schema::dropIfExists('alumno__clases');
    }
}
