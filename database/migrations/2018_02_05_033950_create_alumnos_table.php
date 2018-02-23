<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
			$table->string('apellido');
			$table->string('telefono');
			$table->string('mail');
			$table->string('ciudad');
			$table->string('procedencia');
			$table->string('observaciones');
			$table->string('condicion');
            $table->integer('actividad_id')->unsigned();
            $table->foreign('actividad_id')
      ->references('id')->on('actividades');
      $table->string('localidad_convenio');
      $table->string('titulo_profesional');
      $table->string('numero_matricula');
      $table->string('presento_tif');


		
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
