<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nuevoscursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_pago', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

         
$table->string('nombre');	





        });

        Schema::table('pagos', function (Blueprint $table) {
            $table->integer('tipos_pago_id')->unsigned();
            $table->foreign('tipos_pago_id')
      ->references('id')->on('tipos_pago');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
